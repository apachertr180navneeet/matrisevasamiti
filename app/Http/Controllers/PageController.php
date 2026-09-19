<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
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
        $banners = Banner::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $causes = Cause::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $programs = Program::where('is_active', true)->orderBy('sort_order', 'asc')->take(4)->get();
        $projects = Project::where('is_active', true)->orderBy('sort_order', 'asc')->take(3)->get();
        $members = Member::where('is_active', true)->orderBy('sort_order', 'asc')->take(4)->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $gallery = GalleryItem::where('is_active', true)->orderBy('sort_order', 'asc')->take(10)->get();
        $events = NewsEvent::where('is_published', true)->where('type', 'event')->orderBy('sort_order', 'asc')->latest('published_date')->take(4)->get();
        $news = NewsEvent::where('is_published', true)->orderBy('sort_order', 'asc')->latest('published_date')->take(6)->get();

        return view('pages.home', compact('banners', 'causes', 'programs', 'projects', 'members', 'testimonials', 'gallery', 'events', 'news'));
    }

    public function about(): View
    {
        $members = Member::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('pages.about', compact('members', 'testimonials'));
    }

    public function programs(): View
    {
        $programs = Program::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('pages.programs', compact('programs'));
    }

    public function projects(): View
    {
        $projects = Project::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('pages.projects', compact('projects'));
    }

    public function impact(): View
    {
        $projects = Project::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('pages.impact', compact('projects', 'testimonials'));
    }

    public function certificate(): View
    {
        $certificates = Certificate::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('pages.certificate', compact('certificates'));
    }

    public function grants(): View
    {
        $grants = Grant::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('pages.grants', compact('grants'));
    }

    public function gallery(): View
    {
        $gallery = GalleryItem::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $categories = $gallery->pluck('category')->unique();
        return view('pages.gallery', compact('gallery', 'categories'));
    }

    public function products(): View
    {
        try {
            $products = Product::where('is_active', true)->orderBy('sort_order', 'asc')->latest()->get();
        } catch (\Throwable $e) {
            $products = collect();
        }

        if ($products->isEmpty()) {
            $defaults = [
                [
                    'id' => 1,
                    'name' => 'Handcrafted Eco-Friendly Jute Bag',
                    'slug' => 'handcrafted-eco-friendly-jute-bag',
                    'price' => 349.00,
                    'original_price' => 499.00,
                    'category' => 'Jute & Bags',
                    'sku' => 'MSS-JUTE-01',
                    'image' => 'images/project1.jpeg',
                    'short_description' => '100% natural, biodegradable golden jute tote bag hand-stitched by rural women artisans with reinforced handles.',
                    'description' => "Our Eco-Friendly Jute Tote Bag is 100% biodegradable, stylish, and highly durable. Hand-crafted with reinforced cotton webbed handles and sturdy stitching by self-help group women in Prayagraj.\n\n• Material: 100% Pure Natural Golden Jute\n• Size: 15\" x 14\" x 4\"\n• Capacity: Holds up to 10kg with ease\n• Handcrafted by: Matri Seva Samiti Women Empowerment Center\n• Impact: Directly supports rural women livelihoods.",
                    'sort_order' => 1,
                    'is_active' => true,
                ],
                [
                    'id' => 2,
                    'name' => 'Handmade Embroidered Chikankari Kurti',
                    'slug' => 'handmade-embroidered-chikankari-kurti',
                    'price' => 899.00,
                    'original_price' => 1299.00,
                    'category' => 'Apparel & Textiles',
                    'sku' => 'MSS-TEXT-02',
                    'image' => 'images/skill-development-news.jpg',
                    'short_description' => 'Traditional fine thread needlework on pure breathable cotton fabric handcrafted by trained rural artisan women.',
                    'description' => "Elegant handmade Chikankari Kurti featuring intricate traditional shadow-work and floral embroidery on soft, skin-friendly cotton.\n\n• Fabric: 100% Breathable Pure Cotton\n• Available Sizes: M, L, XL, XXL\n• Care: Gentle handwash recommended\n• Craft origin: Uttar Pradesh Artisans\n• Empowering: Each purchase provides fair wages to village artisans.",
                    'sort_order' => 2,
                    'is_active' => true,
                ],
                [
                    'id' => 3,
                    'name' => 'Organic Cow Dung Herbal Dhoop & Incense',
                    'slug' => 'organic-cow-dung-herbal-dhoop-incense',
                    'price' => 199.00,
                    'original_price' => 280.00,
                    'category' => 'Organic & Wellness',
                    'sku' => 'MSS-ORGN-03',
                    'image' => 'images/slider1.jpg',
                    'short_description' => '100% charcoal-free, non-toxic organic incense sticks made with indigenous desi cow dung, neem, and pure essential oils.',
                    'description' => "Chemical-free, purifying natural dhoop sticks made using indigenous gaushala cow dung, herbs, camphor, and dried flower extracts collected from local temples.\n\n• 100% Natural & Charcoal Free\n• Pack contains: 40 long-burning sticks + ceramic holder\n• Key ingredients: Desi Cow Dung, Guggal, Loban, Camphor, Rose Petals\n• Environment: Zero chemical smoke, air-purifying aroma.",
                    'sort_order' => 3,
                    'is_active' => true,
                ],
                [
                    'id' => 4,
                    'name' => 'Handmade Terracotta Tea Kulhad Set (Set of 6)',
                    'slug' => 'handmade-terracotta-tea-kulhad-set',
                    'price' => 249.00,
                    'original_price' => 350.00,
                    'category' => 'Home Decor & Pottery',
                    'sku' => 'MSS-POT-04',
                    'image' => 'images/project2.jpg',
                    'short_description' => 'Authentic unglazed natural clay cups baked in traditional kilns, giving pure earthy aroma to Indian chai.',
                    'description' => "Experience the authentic rich aroma of traditional Indian Chai with these wheel-thrown, kiln-baked terracotta kulhads.\n\n• Set of 6 clay cups (150ml each)\n• 100% Natural terracotta clay, non-toxic, eco-friendly\n• Supports local potters and traditional craft preservation.",
                    'sort_order' => 4,
                    'is_active' => true,
                ],
                [
                    'id' => 5,
                    'name' => 'Handwoven Bamboo Multipurpose Basket',
                    'slug' => 'handwoven-bamboo-multipurpose-basket',
                    'price' => 299.00,
                    'original_price' => 420.00,
                    'category' => 'Home Decor & Pottery',
                    'sku' => 'MSS-BAMB-05',
                    'image' => 'images/project3.jpg',
                    'short_description' => 'Lightweight and durable eco-friendly bamboo basket for dining, fruit display, and handcrafted home organization.',
                    'description' => "Crafted from locally sourced matured bamboo canes, this multipurpose storage basket is lightweight, sturdy, and adds a rustic charm to your dining space.\n\n• Material: Natural Organic Bamboo\n• Dimensions: Diameter 10 inches, Height 4 inches\n• Handcrafted by tribal & rural artisans.",
                    'sort_order' => 5,
                    'is_active' => true,
                ],
                [
                    'id' => 6,
                    'name' => 'Handmade Scented Soy Wax Clay Candle',
                    'slug' => 'handmade-scented-soy-wax-clay-candle',
                    'price' => 399.00,
                    'original_price' => 550.00,
                    'category' => 'Organic & Wellness',
                    'sku' => 'MSS-CNDL-06',
                    'image' => 'images/community-work.jpg',
                    'short_description' => 'Smokeless 100% soy wax candle hand-poured in a reusable rustic clay bowl with natural sandalwood & lavender aroma.',
                    'description' => "Hand-poured using clean, smokeless 100% soy wax and therapeutic essential oils. Features a natural cotton wick for a clean 30+ hour burn time.\n\n• Fragrance: Royal Sandalwood & French Lavender\n• Container: Handcrafted reusable clay bowl\n• Burn Time: 30-35 Hours.",
                    'sort_order' => 6,
                    'is_active' => true,
                ],
            ];

            $products = collect($defaults)->map(function ($item) {
                return new Product($item);
            });
        }

        $categories = $products->pluck('category')->filter()->unique();

        return view('pages.products', compact('products', 'categories'));
    }

    public function news(): View
    {
        $news = NewsEvent::where('is_published', true)->orderBy('sort_order', 'asc')->latest('published_date')->get();
        return view('pages.news', compact('news'));
    }

    public function blogs(): View
    {
        $blogs = NewsEvent::where('is_published', true)->where('type', 'blog')->orderBy('sort_order', 'asc')->latest('published_date')->get();
        if ($blogs->isEmpty()) {
            $blogs = NewsEvent::where('is_published', true)->orderBy('sort_order', 'asc')->latest('published_date')->get();
        }
        return view('pages.blogs', compact('blogs'));
    }

    public function career(): View
    {
        $careers = Career::where('is_active', true)->orderBy('sort_order', 'asc')->latest()->get();
        return view('pages.career', compact('careers'));
    }

    public function faq(): View
    {
        $faqs = Faq::where('is_active', true)->orderBy('sort_order', 'asc')->get();
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
}
