<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Banner;
use App\Models\Cause;
use App\Models\Program;
use App\Models\Project;
use App\Models\NewsEvent;
use App\Models\GalleryItem;
use App\Models\Member;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Certificate;
use App\Models\Grant;
use App\Models\Career;
use App\Models\Donation;
use App\Models\Product;

class PageController extends Controller
{
    public function home(): View
    {
        $banners = Cache::remember('page_home_banners', 1800, function () {
            return Banner::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        $causes = Cache::remember('page_home_causes', 1800, function () {
            return Cause::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        $programs = Cache::remember('page_home_programs', 1800, function () {
            return Program::where('is_active', true)->orderBy('sort_order', 'asc')->take(4)->get();
        });
        $projects = Cache::remember('page_home_projects', 1800, function () {
            return Project::where('is_active', true)->orderBy('sort_order', 'asc')->take(3)->get();
        });
        $members = Cache::remember('page_home_members', 1800, function () {
            return Member::where('is_active', true)->orderBy('sort_order', 'asc')->take(4)->get();
        });
        $testimonials = Cache::remember('page_home_testimonials', 1800, function () {
            return Testimonial::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        $gallery = Cache::remember('page_home_gallery', 1800, function () {
            return GalleryItem::where('is_active', true)->orderBy('sort_order', 'asc')->take(10)->get();
        });
        $events = Cache::remember('page_home_events', 1800, function () {
            return NewsEvent::where('is_published', true)->where('type', 'event')->orderBy('sort_order', 'asc')->latest('published_date')->take(4)->get();
        });
        $news = Cache::remember('page_home_news', 1800, function () {
            return NewsEvent::where('is_published', true)->orderBy('sort_order', 'asc')->latest('published_date')->take(6)->get();
        });

        return view('pages.home', compact('banners', 'causes', 'programs', 'projects', 'members', 'testimonials', 'gallery', 'events', 'news'));
    }

    public function about(): View
    {
        $members = Cache::remember('page_about_members', 1800, function () {
            return Member::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        $testimonials = Cache::remember('page_about_testimonials', 1800, function () {
            return Testimonial::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        return view('pages.about', compact('members', 'testimonials'));
    }

    public function programs(): View
    {
        $programs = Cache::remember('page_programs_all', 1800, function () {
            return Program::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        return view('pages.programs', compact('programs'));
    }

    public function projects(): View
    {
        $projects = Cache::remember('page_projects_all', 1800, function () {
            return Project::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        return view('pages.projects', compact('projects'));
    }

    public function impact(): View
    {
        $projects = Cache::remember('page_impact_projects', 1800, function () {
            return Project::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        $testimonials = Cache::remember('page_impact_testimonials', 1800, function () {
            return Testimonial::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        return view('pages.impact', compact('projects', 'testimonials'));
    }

    public function certificate(): View
    {
        $certificates = Cache::remember('page_certificates_all', 1800, function () {
            return Certificate::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        return view('pages.certificate', compact('certificates'));
    }

    public function grants(): View
    {
        $grants = Cache::remember('page_grants_all', 1800, function () {
            return Grant::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        return view('pages.grants', compact('grants'));
    }

    public function gallery(): View
    {
        $gallery = Cache::remember('page_gallery_all', 1800, function () {
            return GalleryItem::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        $categories = $gallery->pluck('category')->unique();
        return view('pages.gallery', compact('gallery', 'categories'));
    }

    public function products(): View
    {
        $products = Cache::remember('page_products_all', 1800, function () {
            return Product::where('is_active', true)->orderBy('sort_order', 'asc')->latest()->get();
        });
        $categories = $products->pluck('category')->filter()->unique();

        return view('pages.products', compact('products', 'categories'));
    }

    public function news(Request $request): View
    {
        $selectedCategory = trim((string) $request->get('category', ''));
        $search = trim((string) $request->get('search', ''));

        $query = NewsEvent::where('is_published', true);

        if (!empty($selectedCategory) && $selectedCategory !== 'all') {
            $query->where('category', $selectedCategory);
        }

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $news = $query->orderBy('sort_order', 'asc')->latest('published_date')->paginate(9)->withQueryString();

        // If DB is completely empty and no search applied, use fallback items
        if ($news->isEmpty() && empty($search) && empty($selectedCategory)) {
            $fallback = collect($this->getFallbackNews())->map(fn($item) => (object) $item);
            $news = new \Illuminate\Pagination\LengthAwarePaginator(
                $fallback->forPage(1, 9),
                $fallback->count(),
                9,
                1,
                ['path' => url()->current()]
            );
        }

        // Categories with article count (migrated from blog logic)
        $categoriesWithCount = NewsEvent::where('is_published', true)
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category', \Illuminate\Support\Facades\DB::raw('count(*) as count'))
            ->groupBy('category')
            ->orderBy('category', 'asc')
            ->get();

        $totalCount = NewsEvent::where('is_published', true)->count();

        // Recent news for widgets / sidebar
        $recentNews = NewsEvent::where('is_published', true)
            ->orderBy('sort_order', 'asc')
            ->latest('published_date')
            ->take(5)
            ->get();

        $page_title = 'News & Field Updates - Matri Seva Samiti';
        $meta_description = 'Official News and Grassroots Field Updates from Matri Seva Samiti. Explore our latest rural skill center inaugurations, healthcare camps, education drives, and community stories.';

        return view('pages.news', compact(
            'news',
            'search',
            'selectedCategory',
            'categoriesWithCount',
            'totalCount',
            'recentNews',
            'page_title',
            'meta_description'
        ));
    }

    public function newsDetail(string $slug): View
    {
        $article = null;

        // 1. Try finding by slug or id in DB
        try {
            $article = NewsEvent::where('is_published', true)
                ->where(function ($query) use ($slug) {
                    $query->where('slug', $slug)->orWhere('id', $slug);
                })
                ->first();
        } catch (\Throwable $e) {
            $article = null;
        }

        // 2. If not found in DB, check fallback items
        if (!$article) {
            $fallbackList = $this->getFallbackNews();
            foreach ($fallbackList as $item) {
                if ($item['slug'] === $slug || (string)$item['id'] === (string)$slug) {
                    $article = (object) $item;
                    break;
                }
            }
        }

        if (!$article) {
            abort(404, 'The requested news article could not be found.');
        }

        // 3. Related News (same category or recent, excluding current)
        $relatedNews = collect();
        try {
            $relatedNews = NewsEvent::where('is_published', true)
                ->where('id', '!=', $article->id ?? 0)
                ->orderBy('sort_order', 'asc')
                ->latest('published_date')
                ->take(3)
                ->get();
        } catch (\Throwable $e) {
            $relatedNews = collect();
        }

        if ($relatedNews->isEmpty()) {
            $relatedNews = collect($this->getFallbackNews())
                ->filter(function ($i) use ($article) {
                    $curSlug = $article->slug ?? '';
                    $curId = $article->id ?? 0;
                    return $i['slug'] !== $curSlug && $i['id'] !== $curId;
                })
                ->take(3)
                ->map(fn($item) => (object) $item);
        }

        // 4. Recent News for Sidebar
        $recentNews = collect();
        try {
            $recentNews = NewsEvent::where('is_published', true)
                ->orderBy('sort_order', 'asc')
                ->latest('published_date')
                ->take(5)
                ->get();
        } catch (\Throwable $e) {
            $recentNews = collect();
        }

        if ($recentNews->isEmpty()) {
            $recentNews = collect($this->getFallbackNews())->take(5)->map(fn($item) => (object) $item);
        }

        // 5. Previous and Next Article Links
        $prevArticle = null;
        $nextArticle = null;
        try {
            $prevArticle = NewsEvent::where('is_published', true)
                ->where('id', '<', $article->id ?? 0)
                ->orderBy('id', 'desc')
                ->first();

            $nextArticle = NewsEvent::where('is_published', true)
                ->where('id', '>', $article->id ?? 0)
                ->orderBy('id', 'asc')
                ->first();
        } catch (\Throwable $e) {
            // fallback navigation
        }

        if (!$prevArticle || !$nextArticle) {
            $fallbackList = array_values($this->getFallbackNews());
            $currentIndex = 0;
            foreach ($fallbackList as $idx => $fb) {
                if ($fb['slug'] === ($article->slug ?? '') || (string)$fb['id'] === (string)($article->id ?? '')) {
                    $currentIndex = $idx;
                    break;
                }
            }
            if (!$prevArticle && isset($fallbackList[$currentIndex - 1])) {
                $prevArticle = (object) $fallbackList[$currentIndex - 1];
            }
            if (!$nextArticle && isset($fallbackList[$currentIndex + 1])) {
                $nextArticle = (object) $fallbackList[$currentIndex + 1];
            }
        }

        $page_title = ($article->title ?? 'News Detail') . ' - Matri Seva Samiti';

                $categoriesWithCount = NewsEvent::where('is_published', true)
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category', \Illuminate\Support\Facades\DB::raw('count(*) as count'))
            ->groupBy('category')
            ->orderBy('category', 'asc')
            ->get();

        return view('pages.news-detail', compact('article', 'relatedNews', 'recentNews', 'prevArticle', 'nextArticle', 'categoriesWithCount', 'page_title'));
    }



    public function career(): View
    {
        $careers = Cache::remember('page_careers_all', 1800, function () {
            return Career::where('is_active', true)->orderBy('sort_order', 'asc')->latest()->get();
        });
        return view('pages.career', compact('careers'));
    }

    public function faq(): View
    {
        $faqs = Cache::remember('page_faqs_all', 1800, function () {
            return Faq::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        });
        $categories = $faqs->pluck('category')->unique();
        return view('pages.faq', compact('faqs', 'categories'));
    }

    public function privacy(): View
    {
        return view('pages.privacy');
    }

    public function terms(): View
    {
        return view('pages.terms');
    }

    public function disclaimer(): View
    {
        return view('pages.disclaimer');
    }

    /**
     * Fallback news items if the database table is unseeded.
     */
    protected function getFallbackNews(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'New Skill Development Center Inaugurated in Jhunsi',
                'slug' => 'new-skill-development-center-inaugurated-jhunsi',
                'type' => 'news',
                'category' => 'Skill Training',
                'published_date' => \Carbon\Carbon::parse('2025-12-15'),
                'image' => 'images/skill-development-news.jpg',
                'excerpt' => 'Matri Seva Samiti proudly announces the opening of our latest skill development center in Jhunsi equipped with modern computer training setups and tailoring workstations to empower 200+ rural youths.',
                'content' => "<p><strong>Matri Seva Samiti (मिलकर करें प्रयास, खुशहाल हो समाज)</strong> proudly announces the official inauguration of our modern <strong>Grassroots Skill Development Center</strong> in Jhunsi, Prayagraj. This landmark initiative is designed to bridge the rural-urban opportunities divide by equipping underprivileged rural youths and women with market-ready vocational and digital capabilities.</p>
                <p>The inauguration ceremony was attended by local community elders, village sarpanches, education advocates, and enthusiastic young trainees from neighboring hamlets. The center is purpose-built to provide free, high-impact vocational courses, life skills coaching, and financial literacy mentorship.</p>
                <blockquote>\"True grassroots transformation begins when we put tools of self-reliance directly into the hands of youth and women. Economic independence breeds dignity and generational hope.\"</blockquote>
                <h4>Key Facilities & Training Modules</h4>
                <ul>
                    <li><strong>Computer & Digital Literacy Lab:</strong> 25+ modern workstations featuring foundational digital literacy, office productivity software, internet safety, and essential business communication.</li>
                    <li><strong>Industrial Tailoring & Stitching Unit:</strong> Professional sewing machinery and cutting tables where rural women master dressmaking, embroidery, and handicraft textile production.</li>
                    <li><strong>Soft Skills & Career Guidance:</strong> Weekly workshops covering interview preparation, basic English speaking, micro-finance management, and entrepreneurship incubation.</li>
                    <li><strong>Job Placement & SHG Linkages:</strong> Direct collaboration with regional retail cooperatives, tailoring firms, and local enterprises to ensure graduates secure sustainable livelihood opportunities.</li>
                </ul>
                <p>Over 200 youths have already registered for the inaugural batch. Matri Seva Samiti extends its deepest gratitude to our generous donors, corporate patrons, and dedicated grassroots volunteers whose relentless support brought this project to life.</p>",
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Free Health Camp Serves 500+ Villagers',
                'slug' => 'free-health-camp-serves-500-villagers',
                'type' => 'news',
                'category' => 'Healthcare',
                'published_date' => \Carbon\Carbon::parse('2025-12-10'),
                'image' => 'images/healthcare-camp-news.jpg',
                'excerpt' => 'Delivered free doctor consultations, essential medicines, diagnostic screenings, and maternal care across 3 remote village clusters in Bhadohi.',
                'content' => "<p>Ensuring accessible, compassionate healthcare for rural families remains at the core of Matri Seva Samiti's humanitarian mandate. On December 10, our medical outreach mission organized a <strong>Mega Free Multi-Speciality Health Camp</strong> serving more than 500 villagers across remote hamlets of Bhadohi district.</p>
                <p>In rural pockets where healthcare infrastructure is distant and costly, preventive checkups and timely diagnosis often make the difference between life and death. A multidisciplinary panel of volunteer physicians, optometrists, pediatricians, and nurses worked tirelessly from sunrise to evening.</p>
                <blockquote>\"Quality healthcare is a fundamental human right, never a luxury reserved for those who can afford urban hospitals.\"</blockquote>
                <h4>Services & Milestones Delivered:</h4>
                <ul>
                    <li><strong>General Health & Diagnostic Screenings:</strong> Comprehensive physical examinations, blood pressure monitoring, random blood sugar tests, and hemoglobin evaluations for 520+ attendees.</li>
                    <li><strong>Optometry & Eye Care:</strong> Vision examinations for elderly citizens, diagnosing cataract progression, and distributing free corrective reading spectacles to 140 individuals.</li>
                    <li><strong>Maternal & Child Nutrition:</strong> Specialist pediatric consultations and distribution of nutrient-dense dietary kits to expecting and nursing mothers.</li>
                    <li><strong>Free Medicine Distribution:</strong> Prescribed vital antibiotics, analgesics, multi-vitamins, iron supplements, and water-purification tablets at no cost.</li>
                </ul>
                <p>MSS expresses heartfelt appreciation to the volunteer doctors from regional medical colleges who generously offered their professional expertise without charging a single rupee.</p>",
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'id' => 3,
                'title' => 'Digital Library Project Reaches 10 Villages',
                'slug' => 'digital-library-project-reaches-10-villages',
                'type' => 'news',
                'category' => 'Education',
                'published_date' => \Carbon\Carbon::parse('2025-12-05'),
                'image' => 'images/education-initiative-news.jpg',
                'excerpt' => 'Established smart e-learning corners and digital books collections for rural schoolchildren and dropouts across 10 villages in Prayagraj district.',
                'content' => "<p>Education is the greatest equalizer of all. Matri Seva Samiti is thrilled to report that our <strong>Rural Digital Library Project (ज्ञान दीप अभियान)</strong> has now officially expanded into its tenth village in Prayagraj district, bringing rich educational resources directly to more than 850 rural schoolchildren.</p>
                <p>Many remote schools lack updated reference libraries, computer terminals, or supplementary reading books. Our digital library project introduces solar-powered e-learning tablets loaded with curriculum-aligned interactive content, bilingual encyclopedias, audio stories, and STEM video demonstrations.</p>
                <blockquote>\"When a child in a remote hamlet discovers the joy of digital learning, an entire world of possibilities unfolds before their eyes.\"</blockquote>
                <h4>Key Accomplishments & Impact:</h4>
                <ul>
                    <li>10 village digital hubs activated with durable tablet computers and solar charging stations.</li>
                    <li>Curated regional libraries featuring 500+ physical Hindi and English storybooks, competitive exam guides, and reference volumes.</li>
                    <li>Remedial evening study circles conducted daily by local college-educated youth volunteers.</li>
                    <li>Over 850 active child learners enrolled, with school retention rates improving by 28% in target zones.</li>
                </ul>
                <p>We are actively seeking CSR partners and individual benefactors to help scale this initiative to 25 villages in the coming financial year.</p>",
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'id' => 4,
                'title' => "Women's Self-Help Groups Generate ₹2 Lakh Revenue",
                'slug' => 'womens-self-help-groups-generate-2-lakh-revenue',
                'type' => 'news',
                'category' => 'Women SHGs',
                'published_date' => \Carbon\Carbon::parse('2025-11-28'),
                'image' => 'images/women-empowerment-news.jpg',
                'excerpt' => 'Rural women artisans and tailoring groups achieve financial self-reliance through local market stalls, craft exhibitions, and eco-friendly products.',
                'content' => "<p>In an inspiring testament to rural enterprise, women artisans organized under Matri Seva Samiti's Self-Help Group (SHG) initiative have collectively generated over <strong>₹2 Lakh in direct revenue</strong> through their handicraft, garment production, and eco-friendly products venture.</p>
                <p>Before joining MSS training cohorts, many of these women had never possessed independent bank accounts or earned personal income. Through comprehensive stitching training, quality control mentorship, and collective marketing, they produce premium cloth bags, traditional embroidery, and festive handicrafts.</p>
                <blockquote>\"When you empower a rural mother financially, every rupee is reinvested into her children's schooling, health, and family nutrition.\"</blockquote>
                <h4>Program Highlights:</h4>
                <ul>
                    <li>7 active Self-Help Groups encompassing 85+ rural women entrepreneurs.</li>
                    <li>Exhibition stalls set up at district craft fairs, religious festivals, and urban eco-markets.</li>
                    <li>Complete financial inclusion: 100% of participants operate individual savings accounts with zero-debt discipline.</li>
                    <li>Sustainable income of ₹3,500 to ₹7,000 per month earned directly by each participating artisan.</li>
                </ul>
                <p>Matri Seva Samiti continues to organize monthly leadership and market-readiness sessions to expand these groups into registered artisan producer companies.</p>",
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'id' => 5,
                'title' => 'Water Conservation Project Benefits 1,000+ Families',
                'slug' => 'water-conservation-project-benefits-1000-families',
                'type' => 'news',
                'category' => 'Environment',
                'published_date' => \Carbon\Carbon::parse('2025-11-20'),
                'image' => 'images/community-development-news.jpg',
                'excerpt' => 'Rainwater harvesting systems and pond deepening completed across 5 drought-prone village hamlets to replenish aquifers and secure drinking water.',
                'content' => "<p>Climate unpredictability and dropping water tables pose existential challenges to rural agriculture and daily domestic life. Under the <strong>Jal Sanchay Abhiyan</strong>, Matri Seva Samiti has successfully completed rejuvenation works on three communal percolation ponds and installed rooftop rainwater collection units across five vulnerable hamlets.</p>
                <p>This comprehensive water conservation drive directly safeguards clean drinking and domestic water security for more than 1,000 families in rural Prayagraj district.</p>
                <blockquote>\"Protecting water sources today is the highest form of community seva, securing agriculture and life for generations to come.\"</blockquote>
                <h4>Accomplishments:</h4>
                <ul>
                    <li>Deepened and cleared silt from 3 ancient village water bodies, increasing water holding capacity by over 45,000 cubic meters.</li>
                    <li>Constructed 8 recharge pits around dried-up community hand pumps to revive localized groundwater aquifers.</li>
                    <li>Established village 'Pani Panchayats' (Water Vigilance Committees) to oversee equitable distribution and prevent waste.</li>
                    <li>Conducted water purification workshops teaching safe chlorination, filtration, and storage techniques.</li>
                </ul>",
                'is_published' => true,
                'sort_order' => 5,
            ],
            [
                'id' => 6,
                'title' => 'Solar Power Initiative Lights Up Remote Villages',
                'slug' => 'solar-power-initiative-lights-up-remote-villages',
                'type' => 'news',
                'category' => 'Rural Energy',
                'published_date' => \Carbon\Carbon::parse('2025-11-15'),
                'image' => 'images/rural-development-news.jpg',
                'excerpt' => 'Installed clean solar lighting units in 150+ households to enable evening study circles for village children and well-lit village pathways.',
                'content' => "<p>Darkness after sunset no longer halts learning and productivity in three remote village hamlets. Matri Seva Samiti's <strong>Gramodaya Solar Power Initiative</strong> has provided clean, decentralized solar lighting systems to 150+ rural households that previously relied on dim, toxic kerosene wick lamps.</p>
                <p>With clean illumination available inside their homes, school students can study comfortably during evening hours, while women can cook and manage household chores in clean, smoke-free conditions.</p>
                <blockquote>\"Clean light in a village home fosters safety, eliminates kerosene fumes, and doubles the productive learning hours of young students.\"</blockquote>
                <h4>Project Scope & Benefits:</h4>
                <ul>
                    <li>150 dual-LED home solar kits installed with built-in USB mobile charging ports.</li>
                    <li>12 high-output solar street fixtures installed along prominent village pathways and meeting chowks.</li>
                    <li>Youth apprentices from each village trained in routine solar panel maintenance, wire checks, and battery upkeep.</li>
                    <li>Total elimination of monthly kerosene expenditure for beneficiary families, saving ₹300-₹500 per household.</li>
                </ul>",
                'is_published' => true,
                'sort_order' => 6,
            ],
        ];
    }
}

