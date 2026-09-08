<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\SiteSetting;
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

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@matrisevasamiti.org'],
            [
                'name' => 'Matri Seva Samiti Admin',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Global Site Settings
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'Matri Seva Samiti', 'group' => 'general'],
            ['key' => 'tagline', 'value' => 'मिलकर करें प्रयास, खुशहाल हो समाज', 'group' => 'general'],
            ['key' => 'org_established', 'value' => '2019', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'A registered non-profit organization dedicated to uplifting rural and marginalized communities across India through education, healthcare, women empowerment, and skill development.', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => 'logo/Logo.png', 'group' => 'general'],
            ['key' => 'site_favicon', 'value' => 'logo/Logo.png', 'group' => 'general'],

            // Contact
            ['key' => 'contact_phone_primary', 'value' => '+91 94152 00000', 'group' => 'contact'],
            ['key' => 'contact_phone_secondary', 'value' => '+91 98390 00000', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'info@matrisevasamiti.org', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Matri Seva Samiti, Head Office, Lucknow / Varanasi, Uttar Pradesh, India', 'group' => 'contact'],
            ['key' => 'working_hours', 'value' => 'Mon - Sat: 9:00 AM - 6:00 PM', 'group' => 'contact'],

            // Social
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/matrisevasamiti', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/matrisevasamiti', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/matrisevasamiti', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => 'https://youtube.com', 'group' => 'social'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com', 'group' => 'social'],

            // Legal & Registration
            ['key' => 'ngo_darpan_id', 'value' => 'UP/2019/0234567', 'group' => 'legal'],
            ['key' => 'tax_exemption_80g', 'value' => 'AAATM1234EF20214', 'group' => 'legal'],
            ['key' => 'tax_exemption_12a', 'value' => 'AAATM1234EE20214', 'group' => 'legal'],
            ['key' => 'csr_registration_no', 'value' => 'CSR00012345', 'group' => 'legal'],
            ['key' => 'pan_number', 'value' => 'AAATM1234E', 'group' => 'legal'],

            // Bank Information
            ['key' => 'bank_name', 'value' => 'State Bank of India', 'group' => 'bank'],
            ['key' => 'bank_account_name', 'value' => 'MATRI SEVA SAMITI', 'group' => 'bank'],
            ['key' => 'bank_account_no', 'value' => '39876543210', 'group' => 'bank'],
            ['key' => 'bank_ifsc_code', 'value' => 'SBIN0001234', 'group' => 'bank'],
            ['key' => 'bank_branch', 'value' => 'Main Branch, Lucknow', 'group' => 'bank'],
            ['key' => 'upi_id', 'value' => 'matrisevasamiti@sbi', 'group' => 'bank'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // 3. Hero Banners / Sliders
        Banner::truncate();
        Banner::create([
            'title' => 'Matri Seva Samiti',
            'subtitle' => 'मिलकर करें प्रयास, खुशहाल हो समाज',
            'description' => 'Dedicated to uplifting rural and marginalized communities across India through education, healthcare, women empowerment, and skill development.',
            'image' => 'images/herobg.png',
            'btn_text' => 'Donate Now',
            'btn_link' => '/donate',
            'secondary_btn_text' => 'Explore Our Work',
            'secondary_btn_link' => '/projects',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        // 4. Urgent Causes
        Cause::truncate();
        $causes = [
            [
                'title' => 'Girl Child Education & Smart Classrooms',
                'slug' => 'girl-child-education',
                'category' => 'Education',
                'goal_amount' => 500000,
                'raised_amount' => 385000,
                'image' => 'images/student1.jpeg',
                'short_description' => 'Providing quality learning kits, digital smart tools, and scholarships to rural girl students.',
                'description' => 'Every girl deserves access to quality schooling, safe learning environments, and essential stationery.',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Free Rural Health & Eye Screening Camps',
                'slug' => 'rural-health-camps',
                'category' => 'Healthcare',
                'goal_amount' => 350000,
                'raised_amount' => 245000,
                'image' => 'images/project1.jpeg',
                'short_description' => 'Free doctor consultations, diagnostic tests, eye screenings, and medicine distributions.',
                'description' => 'Bridging the healthcare gap in remote villages by organizing weekly free health diagnosis camps.',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Women Livelihood & Tailoring Centers',
                'slug' => 'women-livelihood-tailoring',
                'category' => 'Empowerment',
                'goal_amount' => 400000,
                'raised_amount' => 310000,
                'image' => 'images/student2.jpeg',
                'short_description' => 'Empowering rural women with sewing machines and self-help artisan training.',
                'description' => 'Vocational training programs empowering women to achieve economic independence and support their families.',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Clean Drinking Water in Remote Villages',
                'slug' => 'clean-drinking-water',
                'category' => 'Sanitation',
                'goal_amount' => 600000,
                'raised_amount' => 450000,
                'image' => 'images/student3.jpeg',
                'short_description' => 'Installing solar water filtration plants to prevent waterborne diseases.',
                'description' => 'Providing clean potable water infrastructure to eliminate fluorosis and water contamination in underserved hamlets.',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ]
        ];
        foreach ($causes as $cause) {
            Cause::create($cause);
        }

        // 5. Programs
        Program::truncate();
        $programs = [
            [
                'title' => 'Education & Child Development',
                'slug' => 'education-child-development',
                'category' => 'शिक्षा एवं बाल विकास',
                'icon' => 'flaticon-graduation-cap',
                'image' => 'images/Educationimage.png',
                'short_description' => 'Ensuring inclusive, equitable education while promoting digital literacy, learning kits, and school retention.',
                'description' => 'Our education initiatives focus on zero drop-out rates, STEM exposure, and modern digital classrooms in government schools.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Women Empowerment',
                'slug' => 'women-empowerment',
                'category' => 'महिला सशक्तिकरण',
                'icon' => 'flaticon-love',
                'image' => 'images/womenimpormentimage.png',
                'short_description' => 'Empowering women socially and economically through vocational skills, micro-finance, and Self-Help Groups (SHGs).',
                'description' => 'Catalyzing grassroots leadership and financial self-sufficiency for rural women through tailoring hubs and literacy.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Health & Nutrition',
                'slug' => 'health-nutrition',
                'category' => 'स्वास्थ्य एवं पोषण',
                'icon' => 'flaticon-healthcare',
                'image' => 'images/healthimage.png',
                'short_description' => 'Improving village health via regular doctor camps, eye screenings, and maternal malnutrition prevention.',
                'description' => 'Ensuring accessible basic healthcare, free medicines, blood drives, and preventive health awareness across underserved communities.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Skill Development & Livelihood',
                'slug' => 'skill-development-livelihood',
                'category' => 'कौशल विकास एवं आजीविका',
                'icon' => 'flaticon-briefcase',
                'image' => 'images/skill-development-news.jpg',
                'short_description' => 'Enhancing employability and creating entrepreneurial livelihood opportunities for rural youths.',
                'description' => 'Offering computer and digital literacy courses, commercial sewing, and placement guidance for youth.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Environment & Water Conservation',
                'slug' => 'environment-water-conservation',
                'category' => 'पर्यावरण एवं जल संरक्षण',
                'icon' => 'flaticon-tree',
                'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 5.52.20 PM.jpeg',
                'short_description' => 'Promoting village tree plantation, plastic-free campaigns, and rainwater conservation.',
                'description' => 'Large-scale sapling plantation drives, pond rejuvenation, rainwater harvesting, and community hygiene awareness.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Social Justice & Legal Awareness',
                'slug' => 'social-justice-legal-awareness',
                'category' => 'सामाजिक न्याय एवं विधिक जागरूकता',
                'icon' => 'flaticon-law',
                'image' => 'images/community-development-news.jpg',
                'short_description' => 'Educating marginalized citizens about government schemes, legal rights, and social security.',
                'description' => 'Free legal awareness workshops, government welfare scheme facilitation, and child & women rights protection.',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Agriculture & Rural Development',
                'slug' => 'agriculture-rural-development',
                'category' => 'कृषि एवं ग्रामीण विकास',
                'icon' => 'flaticon-sprout',
                'image' => 'images/rural-development-news.jpg',
                'short_description' => 'Training smallholder farmers in organic agriculture, crop management, and allied farm activities.',
                'description' => 'Soil health testing, micro-irrigation demonstrations, organic farming workshops, and producer group linkages.',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Relief & Disaster Management',
                'slug' => 'relief-disaster-management',
                'category' => 'राहत एवं आपदा प्रबंधन',
                'icon' => 'flaticon-shield',
                'image' => 'images/project1.jpeg',
                'short_description' => 'Swift humanitarian assistance during floods, extreme winter cold waves, and crises.',
                'description' => 'Emergency ration kits, blanket distributions, clean drinking water, and post-disaster rehabilitation support.',
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'title' => 'Youth Development & Sports',
                'slug' => 'youth-development-sports',
                'category' => 'युवा विकास एवं खेल',
                'icon' => 'flaticon-trophy',
                'image' => 'images/blog2.jpg',
                'short_description' => 'Channeling youth energy positively through sports, personality development, and leadership camps.',
                'description' => 'Organizing rural sports meets, athletic coaching, youth volunteer leadership councils, and anti-drug rallies.',
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'title' => 'Art, Culture & Heritage',
                'slug' => 'art-culture-heritage',
                'category' => 'कला, संस्कृति एवं विरासत',
                'icon' => 'flaticon-art',
                'image' => 'images/cultureimage.png',
                'short_description' => 'Preserving traditional folk arts, promoting local crafts, and organizing cultural events.',
                'description' => 'Traditional folk art exhibitions, cultural heritage festivals, and artisan skill advancement and market linkages.',
                'sort_order' => 10,
                'is_active' => true,
            ],
        ];
        foreach ($programs as $prog) {
            Program::create($prog);
        }

        // 6. Projects
        Project::truncate();
        $projects = [
            [
                'title' => 'Project Shiksha Uday: 20 Model Village Schools',
                'slug' => 'project-shiksha-uday',
                'location' => 'Varanasi & Chandauli District, UP',
                'beneficiaries' => '3,500+ Students',
                'project_date' => '2023-08-15',
                'image' => 'images/project1.jpeg',
                'summary' => 'Transforming primary schools with modern libraries, clean sanitation, and computer labs.',
                'details' => 'Comprehensive school transformation project targeting primary education infrastructure.',
                'status' => 'Ongoing',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Project Swasthya Rath: Mobile Telemedicine Unit',
                'slug' => 'project-swasthya-rath',
                'location' => 'Mirzapur & Sonbhadra, UP',
                'beneficiaries' => '8,200+ Villagers',
                'project_date' => '2022-11-20',
                'image' => 'images/student1.jpeg',
                'summary' => 'Bringing specialized doctors to remote tribal villages through GPS-equipped mobile diagnostic vans.',
                'details' => 'Providing point-of-care testing and direct consultation with specialist doctors.',
                'status' => 'Completed',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Project Sakhi: Women Artisan Handloom Cluster',
                'slug' => 'project-sakhi',
                'location' => 'Lucknow & Barabanki, UP',
                'beneficiaries' => '450+ Rural Women',
                'project_date' => '2023-01-10',
                'image' => 'images/student2.jpeg',
                'summary' => 'Establishing traditional Chikankari and Zari-Zardozi production clusters with direct e-commerce market links.',
                'details' => 'Connecting rural artisan women with national buyers and fair wages.',
                'status' => 'Ongoing',
                'sort_order' => 3,
                'is_active' => true,
            ]
        ];
        foreach ($projects as $proj) {
            Project::create($proj);
        }

        // 7. News & Events
        NewsEvent::truncate();
        $newsItems = [
            [
                'title' => 'Annual Blood Donation & Eye Checkup Camp Draws Over 500 Participants',
                'slug' => 'annual-blood-donation-camp-2024',
                'type' => 'event',
                'category' => 'Health Camp',
                'published_date' => '2024-05-12',
                'image' => 'images/project1.jpeg',
                'excerpt' => 'Over 500 local community members attended the free medical and eye checkup camp organized by Matri Seva Samiti.',
                'content' => 'The mega healthcare drive offered comprehensive checkups, cataract screenings, and free medicines to senior citizens and underprivileged children.',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => '100 Bicycles Distributed to Rural Schoolgirls to Prevent Dropouts',
                'slug' => 'bicycles-distributed-rural-schoolgirls',
                'type' => 'news',
                'category' => 'Education',
                'published_date' => '2024-03-08',
                'image' => 'images/student1.jpeg',
                'excerpt' => 'On International Women\'s Day, Matri Seva Samiti distributed 100 new bicycles to high-school girls traveling long distances.',
                'content' => 'Distance to secondary schools is one of the primary causes of dropouts for young girls. This project helps bridge that gap.',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Matri Seva Samiti Awarded CSR Excellence Recognition for Rural Impact',
                'slug' => 'csr-excellence-award-2024',
                'type' => 'media',
                'category' => 'Recognition',
                'published_date' => '2024-01-26',
                'image' => 'images/student2.jpeg',
                'excerpt' => 'Honored for outstanding grassroots implementation and transparent fund utilization in community development.',
                'content' => 'The recognition underscores the collective resolve of our team, volunteers, and generous donors in driving measurable impact.',
                'is_published' => true,
                'sort_order' => 3,
            ]
        ];
        foreach ($newsItems as $item) {
            NewsEvent::create($item);
        }

        // 8. Gallery Items
        GalleryItem::truncate();
        $gallery = [
            ['title' => 'Classroom Digital Learning Session', 'category' => 'Education', 'image' => 'images/student1.jpeg', 'caption' => 'Students engaging with digital tablets and interactive quizzes.'],
            ['title' => 'Women Tailoring & Skill Batch', 'category' => 'Skill Development', 'image' => 'images/student2.jpeg', 'caption' => 'Graduates receiving their sewing certification and startup kits.'],
            ['title' => 'Rural Health Diagnosis Drive', 'category' => 'Healthcare', 'image' => 'images/project1.jpeg', 'caption' => 'Free consultations with volunteer physicians in remote villages.'],
            ['title' => 'Child Nutrition & Milk Distribution', 'category' => 'Nutrition', 'image' => 'images/student3.jpeg', 'caption' => 'Weekly nutrition enhancement program for primary school children.'],
            ['title' => 'Community Awareness Gathering', 'category' => 'Events', 'image' => 'images/herobg.png', 'caption' => 'Community meeting discussing sanitation and drinking water solutions.'],
        ];
        foreach ($gallery as $idx => $g) {
            GalleryItem::create(array_merge($g, ['sort_order' => $idx + 1, 'is_active' => true]));
        }

        // 9. Members / Team
        Member::truncate();
        $members = [
            [
                'name' => 'Dr. R. K. Sharma',
                'designation' => 'President & Founder',
                'category' => 'Board',
                'photo' => 'images/student1.jpeg',
                'bio' => 'Social visionary and retired educationist with 30+ years of grassroots community development experience.',
                'email' => 'president@matrisevasamiti.org',
                'phone' => '+91 94152 00001',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Smt. Ananya Verma',
                'designation' => 'General Secretary',
                'category' => 'Board',
                'photo' => 'images/student2.jpeg',
                'bio' => 'Advocate for women rights and rural livelihood clusters across northern India.',
                'email' => 'secretary@matrisevasamiti.org',
                'phone' => '+91 94152 00002',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Shri Sunil Pandey',
                'designation' => 'Treasurer & Financial Officer',
                'category' => 'Board',
                'photo' => 'images/student3.jpeg',
                'bio' => 'Chartered Accountant overseeing NGO compliance, FCRA/80G filings, and fiscal auditing.',
                'email' => 'finance@matrisevasamiti.org',
                'phone' => '+91 94152 00003',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Pooja Srivastava',
                'designation' => 'Program Director - Healthcare',
                'category' => 'Core',
                'photo' => 'images/student1.jpeg',
                'bio' => 'Public health specialist coordinating volunteer medical teams and free mobile clinic circuits.',
                'email' => 'health@matrisevasamiti.org',
                'phone' => '+91 94152 00004',
                'sort_order' => 4,
                'is_active' => true,
            ]
        ];
        foreach ($members as $m) {
            Member::create($m);
        }

        // 10. Testimonials
        Testimonial::truncate();
        $testimonials = [
            [
                'name' => 'Sunita Devi',
                'designation' => 'Artisan Beneficiary, Chandauli',
                'location' => 'Uttar Pradesh',
                'photo' => 'images/student2.jpeg',
                'quote' => 'Joining the Matri Seva Samiti tailoring center transformed my life. Today, I earn independently and pay for my daughter\'s higher secondary education.',
                'rating' => 5,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Rajesh Kumar Singh',
                'designation' => 'CSR Partner & Donor',
                'location' => 'New Delhi',
                'photo' => 'images/student1.jpeg',
                'quote' => 'The transparency, regular photo updates, and 80G tax receipts from Matri Seva Samiti give us complete confidence that our contributions create real change.',
                'rating' => 5,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Deepak Mishra',
                'designation' => 'Youth Volunteer',
                'location' => 'Lucknow',
                'photo' => 'images/student3.jpeg',
                'quote' => 'Volunteering with the health camps opened my eyes to rural healthcare needs. It is truly a blessing to work with such a dedicated team.',
                'rating' => 5,
                'sort_order' => 3,
                'is_active' => true,
            ]
        ];
        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // 11. FAQs
        Faq::truncate();
        $faqs = [
            [
                'question' => 'Is my donation to Matri Seva Samiti eligible for 80G tax exemption?',
                'answer' => 'Yes! Matri Seva Samiti is registered under Section 80G of the Indian Income Tax Act. All Indian taxpayers are eligible for a 50% tax deduction on donations. A computerized 80G tax receipt will be sent to your email immediately.',
                'category' => 'Donations',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'What payment methods are supported on your website?',
                'answer' => 'We accept all major payment modes via the secure CCAvenue Payment Gateway including UPI (Google Pay, PhonePe, Paytm), Credit Cards, Debit Cards, Net Banking, and NEFT/RTGS direct bank transfers.',
                'category' => 'Donations',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'How can I volunteer with Matri Seva Samiti?',
                'answer' => 'You can apply anytime through our "Become a Volunteer" form on the website. We offer both on-ground volunteer opportunities (medical camps, teaching drives) and virtual/remote opportunities (content, design, fundraising).',
                'category' => 'Volunteer',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Can corporate companies partner with you for CSR projects?',
                'answer' => 'Absolutely. We are registered with the Ministry of Corporate Affairs (MCA) under CSR-1 and NITI Aayog NGO Darpan. We provide end-to-end CSR implementation, baseline studies, and impact reports.',
                'category' => 'CSR',
                'sort_order' => 4,
                'is_active' => true,
            ]
        ];
        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        // 12. Certificates
        Certificate::truncate();
        $certs = [
            [
                'title' => '80G Tax Exemption Certificate',
                'type' => '80G',
                'file_path' => 'logo/Logo.png',
                'year' => '2021-2026',
                'description' => 'Income Tax Department Approval under Section 80G(5)(vi).',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => '12A Registration Certificate',
                'type' => '12A',
                'file_path' => 'logo/Logo.png',
                'year' => '2021-Permanent',
                'description' => 'Income Tax Trust Exemption under Section 12A.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'NITI Aayog NGO Darpan Registration',
                'type' => 'NITI-Aayog',
                'file_path' => 'logo/Logo.png',
                'year' => '2019',
                'description' => 'Registration under Government of India NITI Aayog Portal.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Ministry of Corporate Affairs CSR-1 Approval',
                'type' => 'CSR-1',
                'file_path' => 'logo/Logo.png',
                'year' => '2022',
                'description' => 'Eligible for Corporate Social Responsibility funding projects.',
                'sort_order' => 4,
                'is_active' => true,
            ]
        ];
        foreach ($certs as $c) {
            Certificate::create($c);
        }
    }
}
