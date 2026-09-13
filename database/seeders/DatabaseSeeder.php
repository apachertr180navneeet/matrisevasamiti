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
use App\Models\Grant;
use App\Models\Career;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User (Preserve / update admin account - DO NOT wipe users table)
        User::updateOrCreate(
            ['email' => 'admin@matrisevasamiti.org'],
            [
                'name' => 'Matri Seva Samiti Admin',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Global Site Settings (Exact details from perviouswebsite/config.php & about.php)
        $settings = [
            // General Details
            ['key' => 'site_name', 'value' => 'Matri Seva Samiti', 'group' => 'general'],
            ['key' => 'tagline', 'value' => 'मिलकर करें प्रयास, खुशहाल हो समाज', 'group' => 'general'],
            ['key' => 'org_owner', 'value' => 'GYAN SHANKAR PAL', 'group' => 'general'],
            ['key' => 'org_established', 'value' => '1995', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Established in April 1995, Matri Seva Samiti is a registered non-profit organization dedicated to empowering rural and marginalized communities through skill development, healthcare, education, and women empowerment across India.', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => 'logo/Logo.png', 'group' => 'general'],
            ['key' => 'site_favicon', 'value' => 'logo/Logo.png', 'group' => 'general'],
            ['key' => 'about_image', 'value' => 'images/about-us.jpg', 'group' => 'general'],

            // Contact & Office Addresses (From config.php & contact.php)
            ['key' => 'contact_phone_primary', 'value' => '+91 9415451910', 'group' => 'contact'],
            ['key' => 'contact_phone_secondary', 'value' => '+91 9838291910', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'matrisevasamiti1910@gmail.com', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => '01 NAIKA CHHATNAG ROAD NEAR RAM SHIV COLONY JHUNSI PRAYAGRAJ UTTAR PRADESH 211019', 'group' => 'contact'],
            ['key' => 'address_primary', 'value' => '01 NAIKA CHHATNAG ROAD NEAR RAM SHIV COLONY JHUNSI PRAYAGRAJ UTTAR PRADESH 211019', 'group' => 'contact'],
            ['key' => 'address_secondary', 'value' => 'USTAPUR PATHSHALA ROAD BHAJNANAND ASHRAM NEAR, PANI TANKI JHUNSI PRAYAGRAJ UTTAR PRADESH 211019', 'group' => 'contact'],
            ['key' => 'working_hours', 'value' => 'Mon - Sat: 9:00 AM - 6:00 PM', 'group' => 'contact'],

            // Social Media Links (From config.php)
            ['key' => 'facebook_url', 'value' => 'https://www.facebook.com/share/18Z1iLkmnA/', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://x.com/Official_Matri', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => 'https://youtube.com/@matrisevasamiti?si=f11QpU1HAHZemBZX', 'group' => 'social'],
            ['key' => 'linkedin_url', 'value' => 'https://www.linkedin.com/in/matri-seva-samiti-b228b3381', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => '#', 'group' => 'social'],

            // Legal, Statutory & Registration
            ['key' => 'ngo_darpan_id', 'value' => 'UP/2021/0291910', 'group' => 'legal'],
            ['key' => 'tax_exemption_80g', 'value' => 'AA090722075773U', 'group' => 'legal'],
            ['key' => 'tax_exemption_12a', 'value' => '12A Verified Perpetual', 'group' => 'legal'],
            ['key' => 'csr_registration_no', 'value' => 'CSR00012345', 'group' => 'legal'],
            ['key' => 'pan_number', 'value' => 'AAATM1234E', 'group' => 'legal'],
            ['key' => 'society_reg_act', 'value' => 'Societies Registration Act, 1860 (Central Act, 21 of 1860)', 'group' => 'legal'],

            // Bank Information (Exact details from perviouswebsite/donate.php & index.php)
            ['key' => 'bank_name', 'value' => 'HDFC Bank Ltd.', 'group' => 'bank'],
            ['key' => 'bank_account_name', 'value' => 'Matri Seva Samiti', 'group' => 'bank'],
            ['key' => 'bank_account_no', 'value' => '50200072951175', 'group' => 'bank'],
            ['key' => 'bank_ifsc_code', 'value' => 'HDFC0002434', 'group' => 'bank'],
            ['key' => 'bank_branch', 'value' => 'House No 1/1, Awas Vikas Jhusi, Scheme No 3, Dist-Allahabad, Allahabad-211019, Uttar Pradesh', 'group' => 'bank'],
            ['key' => 'upi_id', 'value' => '9415451910@ybl', 'group' => 'bank'],

            // CCAvenue Gateway Credentials (From config.php)
            ['key' => 'ccavenue_merchant_id', 'value' => '4438174', 'group' => 'payment'],
            ['key' => 'ccavenue_access_code', 'value' => 'AVQM90ND88AU58MQUA', 'group' => 'payment'],
            ['key' => 'ccavenue_working_key', 'value' => '23E5332DE7E9D33452155CD40C048001', 'group' => 'payment'],

            // Impact Stats (From previous website)
            ['key' => 'impact_years', 'value' => '5+', 'group' => 'about'],
            ['key' => 'impact_projects', 'value' => '50+', 'group' => 'about'],
            ['key' => 'impact_beneficiaries', 'value' => '15,000+', 'group' => 'about'],
            ['key' => 'impact_volunteers', 'value' => '120+', 'group' => 'about'],
            ['key' => 'stat_1_number', 'value' => '15,000+', 'group' => 'about'],
            ['key' => 'stat_1_title', 'value' => 'Beneficiaries Reached', 'group' => 'about'],
            ['key' => 'stat_1_icon', 'value' => 'flaticon-costumer', 'group' => 'about'],
            ['key' => 'stat_2_number', 'value' => '50+', 'group' => 'about'],
            ['key' => 'stat_2_title', 'value' => 'Projects Completed', 'group' => 'about'],
            ['key' => 'stat_2_icon', 'value' => 'flaticon-package', 'group' => 'about'],
            ['key' => 'stat_3_number', 'value' => '120+', 'group' => 'about'],
            ['key' => 'stat_3_title', 'value' => 'Active Volunteers', 'group' => 'about'],
            ['key' => 'stat_3_icon', 'value' => 'flaticon-team', 'group' => 'about'],
            ['key' => 'stat_4_number', 'value' => '5+', 'group' => 'about'],
            ['key' => 'stat_4_title', 'value' => 'Years of Service', 'group' => 'about'],
            ['key' => 'stat_4_icon', 'value' => 'flaticon-relationship', 'group' => 'about'],

            // Mission, Vision, Values (From perviouswebsite/about.php & impact.php)
            ['key' => 'org_vision', 'value' => 'To create a society where every individual, especially in rural areas, has access to basic needs, quality education, healthcare, and opportunities for sustainable livelihood and personal growth.', 'group' => 'general'],
            ['key' => 'org_mission', 'value' => 'Empowering rural communities through innovative skill development programs, health initiatives, and educational support that foster self-reliance and sustainable development.', 'group' => 'general'],
            ['key' => 'org_values', 'value' => 'Integrity and Transparency, Community Participation, Sustainable Development, Compassion and Service, Innovation and Excellence.', 'group' => 'general'],

            // Home Page Dynamic Section Content
            ['key' => 'home_about_subtitle', 'value' => 'About Us', 'group' => 'home_section'],
            ['key' => 'home_about_title', 'value' => 'Serving Humanity with Soft Hearts & Strong Resolve', 'group' => 'home_section'],
            ['key' => 'home_about_description', 'value' => 'Established in April 1995, Matri Seva Samiti is a registered non-profit organization dedicated to uplifting rural and marginalized communities across India. Inspired by Mahatma Gandhi\'s vision that "real India is in villages", we work tirelessly in education, healthcare, women empowerment, and skill development.', 'group' => 'home_section'],
            ['key' => 'home_about_block_title', 'value' => 'Key Accreditations & Impact', 'group' => 'home_section'],
            ['key' => 'home_about_point_1', 'value' => 'Registered under 80G, 12A, CSR-1 & NITI Aayog NGO Darpan', 'group' => 'home_section'],
            ['key' => 'home_about_point_2', 'value' => '50+ Projects Completed & 15,000+ Rural Lives Empowered', 'group' => 'home_section'],
            ['key' => 'home_about_btn_text', 'value' => 'Read More', 'group' => 'home_section'],
            ['key' => 'home_about_call_title', 'value' => 'Call For Inquiries', 'group' => 'home_section'],
            ['key' => 'home_about_phone', 'value' => '+91 9415451910', 'group' => 'home_section'],
            ['key' => 'home_causes_subtitle', 'value' => 'Help & Donate', 'group' => 'home_section'],
            ['key' => 'home_causes_title', 'value' => 'Inspiring and Helping for a Better Lifestyle', 'group' => 'home_section'],
            ['key' => 'home_causes_stat_number', 'value' => '15K+', 'group' => 'home_section'],
            ['key' => 'home_causes_stat_label', 'value' => 'Active Donors', 'group' => 'home_section'],
            ['key' => 'home_donate_form_title', 'value' => 'Support Our Cause - Donate Now', 'group' => 'home_section'],
            ['key' => 'home_donate_subtitle', 'value' => '100% Tax Deductible (80G)', 'group' => 'home_section'],
            ['key' => 'home_donate_title', 'value' => 'Support Rural India With 80G Tax Exemption', 'group' => 'home_section'],
            ['key' => 'home_donate_description', 'value' => 'Donations made to Matri Seva Samiti are eligible for tax deduction under Section 80G. UPI ID: 9415451910@ybl', 'group' => 'home_section'],
            ['key' => 'home_donate_progress_percent', 'value' => '85', 'group' => 'home_section'],
            ['key' => 'home_donate_progress_label_1', 'value' => 'Beneficiaries Reached : 15,000+', 'group' => 'home_section'],
            ['key' => 'home_donate_progress_label_2', 'value' => 'Projects : 50+ Completed', 'group' => 'home_section'],
            ['key' => 'home_events_subtitle', 'value' => 'Upcoming Events', 'group' => 'home_section'],
            ['key' => 'home_events_title', 'value' => 'Join Our Community Outreach Schedule', 'group' => 'home_section'],
            ['key' => 'home_events_btn_text', 'value' => 'Join An Event', 'group' => 'home_section'],
            ['key' => 'home_why_subtitle', 'value' => 'Join Us', 'group' => 'home_section'],
            ['key' => 'home_why_title', 'value' => 'Why We Need You To Become A Volunteer', 'group' => 'home_section'],
            ['key' => 'home_why_description', 'value' => 'Volunteers are the heart and soul of Matri Seva Samiti. Together, we reach the most remote households to spark lasting smiles.', 'group' => 'home_section'],
            ['key' => 'home_why_acc1_title', 'value' => 'Direct Grassroot Fulfillment & Experience', 'group' => 'home_section'],
            ['key' => 'home_why_acc1_text', 'value' => 'Work directly on the field with educators, healthcare specialists, and women mentors. Gain hands-on leadership experience and official volunteering certification.', 'group' => 'home_section'],
            ['key' => 'home_why_acc2_title', 'value' => 'Flexible Virtual & On-Field Roles', 'group' => 'home_section'],
            ['key' => 'home_why_acc2_text', 'value' => 'Contribute on weekends or remotely in content writing, digital awareness, campaign management, and teaching sessions.', 'group' => 'home_section'],
            ['key' => 'home_why_acc3_title', 'value' => 'Be Part of a Transparent National Network', 'group' => 'home_section'],
            ['key' => 'home_why_acc3_text', 'value' => 'Join over 120+ passionate changemakers across India working with verifiable accountability, regular audit reports, and heartfelt passion.', 'group' => 'home_section'],
            ['key' => 'home_team_subtitle', 'value' => 'Our Team', 'group' => 'home_section'],
            ['key' => 'home_team_title', 'value' => 'Dedicated Social Workers & Leaders', 'group' => 'home_section'],
            ['key' => 'home_team_btn_text', 'value' => 'Join MSS', 'group' => 'home_section'],
            ['key' => 'home_testi_subtitle', 'value' => 'Testimonials', 'group' => 'home_section'],
            ['key' => 'home_testi_title', 'value' => 'What Beneficiaries & Donors Say', 'group' => 'home_section'],
            ['key' => 'home_blogs_subtitle', 'value' => 'Latest Updates', 'group' => 'home_section'],
            ['key' => 'home_blogs_title', 'value' => 'Read Our Impact Stories', 'group' => 'home_section'],
            ['key' => 'home_blogs_description', 'value' => 'Discover how your contributions bring tangible transformation to underprivileged communities across India.', 'group' => 'home_section'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // 3. Hero Banners / Sliders (From perviouswebsite/index.php)
        Banner::truncate();
        Banner::create([
            'title' => 'MATRI SEVA SAMITI',
            'subtitle' => 'मिलकर करें प्रयास, खुशहाल हो समाज',
            'description' => 'Dedicated to uplifting rural and marginalized communities across India through skill development, healthcare, and educational initiatives.',
            'image' => 'images/herobg.png',
            'btn_text' => 'Donate Now',
            'btn_link' => '/donate',
            'secondary_btn_text' => 'Explore Our Work',
            'secondary_btn_link' => '/projects',
            'sort_order' => 1,
            'is_active' => true,
        ]);
        Banner::create([
            'title' => 'Skill Development For Rural Youth',
            'subtitle' => 'Empowering Communities Across India',
            'description' => 'Training rural youth in vocational skills, computer literacy, and handicrafts to foster self-reliance and economic independence.',
            'image' => 'images/herobg1.png',
            'btn_text' => 'Support Our Cause',
            'btn_link' => '/donate',
            'secondary_btn_text' => 'Our Programs',
            'secondary_btn_link' => '/programs',
            'sort_order' => 2,
            'is_active' => true,
        ]);
        Banner::create([
            'title' => 'Healthcare & Women Empowerment',
            'subtitle' => 'Transforming Lives at Grassroots',
            'description' => 'Free medical camps, hygiene awareness, and Self-Help Group support for women across rural Uttar Pradesh.',
            'image' => 'images/herobg2.png',
            'btn_text' => 'Join as Volunteer',
            'btn_link' => '/volunteer',
            'secondary_btn_text' => 'View Impact',
            'secondary_btn_link' => '/impact',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // 4. Urgent Causes (From previous website)
        Cause::truncate();
        $causes = [
            [
                'title' => 'Skill Development For Rural Youth',
                'slug' => 'skill-development-for-rural-youth',
                'category' => 'Skill Development',
                'goal_amount' => 500000,
                'raised_amount' => 385000,
                'image' => 'images/student1.jpeg',
                'short_description' => 'Empowerment through vocational skills, computer training, and career guidance for 200+ rural youths.',
                'description' => 'A comprehensive skill development program focusing on rural youth empowerment through vocational training, technical certifications, and capacity building.',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Rural Healthcare Awareness & Free Clinics',
                'slug' => 'rural-healthcare-initiative',
                'category' => 'Healthcare',
                'goal_amount' => 350000,
                'raised_amount' => 245000,
                'image' => 'images/project3.jpg',
                'short_description' => 'Accessible medical care, doctor consultations, diagnostic tests, and medicine distributions for 1000+ villagers.',
                'description' => 'Community health initiatives focusing on preventive healthcare, free health diagnosis camps, maternal care, and hygiene awareness.',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Women Self-Help Groups & Tailoring Centers',
                'slug' => 'women-self-help-groups',
                'category' => 'Women Empowerment',
                'goal_amount' => 400000,
                'raised_amount' => 310000,
                'image' => 'images/student2.jpeg',
                'short_description' => 'Financial independence and entrepreneurship through self-help groups and commercial tailoring training for 500+ women.',
                'description' => 'Empowering rural women through the formation of self-help groups, tailoring hubs, handicraft clusters, and microfinance support for small businesses.',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Girl Child Education & Smart Classrooms',
                'slug' => 'girl-child-education',
                'category' => 'Education',
                'goal_amount' => 600000,
                'raised_amount' => 450000,
                'image' => 'images/student3.jpeg',
                'short_description' => 'Providing quality learning kits, digital smart tools, and scholarships to rural girl students.',
                'description' => 'Every girl deserves access to quality schooling, safe learning environments, and essential stationery to prevent dropouts.',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ]
        ];
        foreach ($causes as $cause) {
            Cause::create($cause);
        }

        // 5. ALL 10 Programs (Exact details from perviouswebsite/programs.php)
        Program::truncate();
        $programs = [
            [
                'title' => '1. Education & Child Development',
                'slug' => 'education-child-development',
                'category' => 'शिक्षा एवं बाल विकास',
                'icon' => 'flaticon-graduation-cap',
                'image' => 'images/Educationimage.png',
                'short_description' => 'To ensure inclusive, equitable and quality education while promoting digital literacy, life skills and holistic development among children and adolescents.',
                'description' => "<strong>Objective:</strong> To ensure inclusive, equitable and quality education while promoting digital literacy, life skills and holistic development among children and adolescents, especially from underserved communities.<br><br><strong>Key Activities:</strong><ul><li>Free Educational Support</li><li>School Enrolment & Retention Campaigns</li><li>Digital Literacy Programs</li><li>Distribution of Books & Learning Materials</li><li>Career Guidance & Mentorship</li><li>Life Skills Education</li><li>Child Rights Awareness</li><li>Scholarship & Educational Assistance</li></ul><strong>Target Beneficiaries:</strong> Children, Adolescents, Students, School Dropouts, Underprivileged Families",
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => '2. Women Empowerment',
                'slug' => 'women-empowerment',
                'category' => 'महिला सशक्तिकरण',
                'icon' => 'flaticon-love',
                'image' => 'images/womenimpormentimage.png',
                'short_description' => 'To empower women socially, economically and politically through skill development, entrepreneurship, financial inclusion and leadership initiatives.',
                'description' => "<strong>Objective:</strong> To empower women socially, economically and politically through skill development, entrepreneurship, financial inclusion and leadership initiatives.<br><br><strong>Key Activities:</strong><ul><li>Self Help Group (SHG) Promotion</li><li>Skill Development Training</li><li>Entrepreneurship Development</li><li>Financial Literacy</li><li>Livelihood Promotion</li><li>Legal & Gender Awareness</li><li>Digital Literacy for Women</li><li>Leadership Development</li></ul><strong>Target Beneficiaries:</strong> Women, SHGs, Rural Women, Adolescent Girls",
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => '3. Health & Nutrition',
                'slug' => 'health-nutrition',
                'category' => 'स्वास्थ्य एवं पोषण',
                'icon' => 'flaticon-healthcare',
                'image' => 'images/healthimage.png',
                'short_description' => 'To improve community health through preventive healthcare, nutrition awareness and accessible health services.',
                'description' => "<strong>Objective:</strong> To improve community health through preventive healthcare, nutrition awareness and accessible health services.<br><br><strong>Key Activities:</strong><ul><li>Health Check-up Camps</li><li>Blood Donation Camps</li><li>Nutrition Awareness Programs</li><li>Maternal & Child Health</li><li>Immunization Awareness</li><li>Mental Health Awareness</li><li>Hygiene & Sanitation Promotion</li><li>Health Screening Camps</li></ul><strong>Target Beneficiaries:</strong> Women, Children, Elderly, Rural & Urban Communities",
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => '4. Skill Development & Livelihood',
                'slug' => 'skill-development-livelihood',
                'category' => 'कौशल विकास एवं आजीविका',
                'icon' => 'flaticon-briefcase',
                'image' => 'images/skill-development-news.jpg',
                'short_description' => 'To enhance employability and promote sustainable livelihoods through vocational and entrepreneurial training.',
                'description' => "<strong>Objective:</strong> To enhance employability and promote sustainable livelihoods through vocational and entrepreneurial training.<br><br><strong>Key Activities:</strong><ul><li>Computer Training</li><li>Digital Skills</li><li>Tailoring & Fashion Designing</li><li>Entrepreneurship Development</li><li>Employment Counselling</li><li>Soft Skills Training</li><li>Career Development</li><li>Placement Support</li></ul><strong>Target Beneficiaries:</strong> Youth, Women, Job Seekers, Students",
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => '5. Environment & Water Conservation',
                'slug' => 'environment-water-conservation',
                'category' => 'पर्यावरण एवं जल संरक्षण',
                'icon' => 'flaticon-tree',
                'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 5.52.20 PM.jpeg',
                'short_description' => 'To promote environmental sustainability and responsible natural resource management.',
                'description' => "<strong>Objective:</strong> To promote environmental sustainability and responsible natural resource management.<br><br><strong>Key Activities:</strong><ul><li>Tree Plantation Drives</li><li>Cleanliness Campaigns</li><li>Plastic-Free Awareness</li><li>Rainwater Harvesting</li><li>Water Conservation Programs</li><li>Waste Management</li><li>Climate Change Awareness</li><li>Environmental Education</li></ul><strong>Target Beneficiaries:</strong> Communities, Schools, Youth, Farmers",
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => '6. Social Justice & Legal Awareness',
                'slug' => 'social-justice-legal-awareness',
                'category' => 'सामाजिक न्याय एवं विधिक जागरूकता',
                'icon' => 'flaticon-law',
                'image' => 'images/community-development-news.jpg',
                'short_description' => 'To promote equal rights, legal awareness and access to justice for vulnerable communities.',
                'description' => "<strong>Objective:</strong> To promote equal rights, legal awareness and access to justice for vulnerable communities.<br><br><strong>Key Activities:</strong><ul><li>Legal Awareness Camps</li><li>Human Rights Awareness</li><li>Child Rights Promotion</li><li>Women Rights Awareness</li><li>Government Scheme Awareness</li><li>Social Security Awareness</li><li>Consumer Rights Awareness</li><li>Community Legal Support</li></ul><strong>Target Beneficiaries:</strong> Women, Children, Youth, Marginalized Communities",
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'title' => '7. Rural Development',
                'slug' => 'rural-development',
                'category' => 'ग्रामीण विकास',
                'icon' => 'flaticon-sprout',
                'image' => 'images/rural-development-news.jpg',
                'short_description' => 'To strengthen rural communities through integrated development initiatives and sustainable livelihoods.',
                'description' => "<strong>Objective:</strong> To strengthen rural communities through integrated development initiatives and sustainable livelihoods.<br><br><strong>Key Activities:</strong><ul><li>Village Development Programs</li><li>Drinking Water Initiatives</li><li>Agriculture & Farmer Support</li><li>Livelihood Promotion</li><li>Community Infrastructure Development</li><li>Sanitation Awareness</li><li>Rural Capacity Building</li><li>Government Scheme Facilitation</li></ul><strong>Target Beneficiaries:</strong> Farmers, Rural Families, SHGs, Village Communities",
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'title' => '8. Disaster Relief & Humanitarian Support',
                'slug' => 'disaster-relief-humanitarian-support',
                'category' => 'आपदा राहत एवं मानवीय सहायता',
                'icon' => 'flaticon-shield',
                'image' => 'images/project1.jpeg',
                'short_description' => 'To provide timely humanitarian assistance and strengthen disaster preparedness.',
                'description' => "<strong>Objective:</strong> To provide timely humanitarian assistance and strengthen disaster preparedness.<br><br><strong>Key Activities:</strong><ul><li>Emergency Relief Distribution</li><li>Food & Medical Assistance</li><li>Rehabilitation Support</li><li>Disaster Preparedness Training</li><li>Community Resilience Programs</li><li>Emergency Response Coordination</li></ul><strong>Target Beneficiaries:</strong> Disaster-Affected Communities",
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'title' => '9. Senior Citizens & Persons with Disabilities',
                'slug' => 'senior-citizens-disabilities',
                'category' => 'वरिष्ठ नागरिक एवं दिव्यांगजन',
                'icon' => 'flaticon-heart',
                'image' => 'images/blog2.jpg',
                'short_description' => 'To improve the quality of life of senior citizens and persons with disabilities through care, rehabilitation and social inclusion.',
                'description' => "<strong>Objective:</strong> To improve the quality of life of senior citizens and persons with disabilities through care, rehabilitation and social inclusion.<br><br><strong>Key Activities:</strong><ul><li>Health Support Services</li><li>Rehabilitation Programs</li><li>Distribution of Assistive Devices</li><li>Accessibility Awareness</li><li>Social Inclusion Programs</li><li>Welfare Scheme Facilitation</li></ul><strong>Target Beneficiaries:</strong> Senior Citizens, Persons with Disabilities, Caregivers",
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'title' => '10. Culture, Sports & Youth Development',
                'slug' => 'culture-sports-youth-development',
                'category' => 'संस्कृति, खेल एवं युवा विकास',
                'icon' => 'flaticon-trophy',
                'image' => 'images/cultureimage.png',
                'short_description' => 'To encourage youth leadership, cultural preservation, sports participation and positive community engagement.',
                'description' => "<strong>Objective:</strong> To encourage youth leadership, cultural preservation, sports participation and positive community engagement.<br><br><strong>Key Activities:</strong><ul><li>Sports Competitions</li><li>Youth Leadership Programs</li><li>Cultural Events</li><li>Personality Development</li><li>Drug De-addiction Awareness</li><li>Volunteer Development</li><li>Community Engagement Activities</li></ul><strong>Target Beneficiaries:</strong> Youth, Students, Community Members",
                'sort_order' => 10,
                'is_active' => true,
            ],
        ];
        foreach ($programs as $prog) {
            Program::create($prog);
        }

        // 6. ALL 6 Projects (Exact details from perviouswebsite/projects.php)
        Project::truncate();
        $projects = [
            [
                'title' => 'Empowering Economically Weaker Rural Youths Through Skill Development',
                'slug' => 'empowering-rural-youths-skill-development',
                'location' => 'Prayagraj, UP',
                'beneficiaries' => '150 Beneficiaries',
                'project_date' => '2023-05-10',
                'image' => 'images/project1.jpeg',
                'summary' => 'A comprehensive skill development program focusing on rural youth empowerment through vocational training and capacity building.',
                'details' => 'A comprehensive skill development program focusing on rural youth empowerment through vocational training, commercial skills, and employment placement.',
                'status' => 'Completed',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Documentation Executive Training Program',
                'slug' => 'documentation-executive-training-program',
                'location' => 'Bhadohi, UP',
                'beneficiaries' => '75 Beneficiaries',
                'project_date' => '2023-09-15',
                'image' => 'images/project2.jpg',
                'summary' => 'Training program for rural youth in documentation, digital data entry, and administrative skills to enhance direct employment.',
                'details' => 'Training program for rural youth in documentation and administrative skills to enhance direct employment opportunities in offices and businesses.',
                'status' => 'Completed',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Rural Healthcare Awareness Program',
                'slug' => 'rural-healthcare-awareness-program',
                'location' => 'Prayagraj, UP',
                'beneficiaries' => '500+ Beneficiaries',
                'project_date' => '2024-01-20',
                'image' => 'images/project3.jpg',
                'summary' => 'Community health initiatives focusing on preventive healthcare and hygiene awareness in rural areas.',
                'details' => 'Community health initiatives delivering free doctor consultations, diagnostic screenings, preventive health awareness, and essential medicines.',
                'status' => 'Ongoing',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => "Women's Self-Help Group Initiative",
                'slug' => 'womens-self-help-group-initiative',
                'location' => 'Multiple Villages',
                'beneficiaries' => '200+ Women',
                'project_date' => '2024-02-14',
                'image' => 'images/womenimpormentimage.png',
                'summary' => 'Empowering rural women through formation of self-help groups and microfinance support for small businesses.',
                'details' => 'Empowering rural women through the formation of self-help groups, tailoring hubs, handicraft clusters, and microfinance support for small enterprises.',
                'status' => 'Ongoing',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Digital Literacy Program',
                'slug' => 'digital-literacy-program',
                'location' => 'Rural Schools',
                'beneficiaries' => '300+ Students',
                'project_date' => '2024-06-01',
                'image' => 'images/student1.jpeg',
                'summary' => 'Introducing digital literacy and computer skills training for rural youth to bridge the digital divide.',
                'details' => 'Introducing computer education, tablet-based learning, digital curriculum, and smart tools in rural schools to bridge the digital divide.',
                'status' => 'Upcoming',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Sustainable Agriculture Training',
                'slug' => 'sustainable-agriculture-training',
                'location' => 'Rural Areas',
                'beneficiaries' => '100+ Farmers',
                'project_date' => '2024-08-01',
                'image' => 'images/rural-development-news.jpg',
                'summary' => 'Training farmers in sustainable agricultural practices and organic farming techniques for better yield and income.',
                'details' => 'Training smallholder farmers in sustainable agricultural practices, organic fertilizers, vermicompost, and water-efficient crop techniques.',
                'status' => 'Upcoming',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];
        foreach ($projects as $proj) {
            Project::create($proj);
        }

        // 7. ALL News & ALL Blogs (Exact articles from perviouswebsite/ngo-news.php & blogs.php)
        NewsEvent::truncate();
        $newsItems = [
            // 6 Articles from perviouswebsite/ngo-news.php
            [
                'title' => 'New Skill Development Center Inaugurated in Jhunsi',
                'slug' => 'new-skill-development-center-inaugurated-jhunsi',
                'type' => 'news',
                'category' => 'Programs',
                'published_date' => '2025-12-15',
                'image' => 'images/skill-development-news.jpg',
                'excerpt' => 'Matri Seva Samiti proudly announces the opening of our latest skill development center in Jhunsi equipped with computer training, tailoring, and handicrafts.',
                'content' => 'Matri Seva Samiti (मिलकर करें प्रयास, खुशहाल हो समाज) proudly announces the opening of our latest skill development center, equipped with modern facilities for computer training, tailoring, and handicrafts. This initiative aims to empower 200+ rural youth with employable skills.',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Free Health Camp Serves 500+ Villagers',
                'slug' => 'free-health-camp-serves-500-villagers',
                'type' => 'news',
                'category' => 'Healthcare',
                'published_date' => '2025-12-10',
                'image' => 'images/healthcare-camp-news.jpg',
                'excerpt' => 'Our recent health camp in collaboration with local medical practitioners provided free consultations, medicines, and health awareness to 500+ villagers.',
                'content' => 'Our recent health camp in collaboration with local medical practitioners provided free consultations, medicines, and health awareness sessions to over 500 villagers across remote hamlets.',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Digital Library Project Reaches 10 Villages',
                'slug' => 'digital-library-project-reaches-10-villages',
                'type' => 'news',
                'category' => 'Education',
                'published_date' => '2025-12-05',
                'image' => 'images/education-initiative-news.jpg',
                'excerpt' => 'Our digital library initiative has successfully established learning centers in 10 villages, providing online learning resources for rural students.',
                'content' => 'Our digital library initiative has successfully established learning centers in 10 villages, providing access to educational resources and online learning platforms for rural students.',
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'title' => "Women's Self-Help Groups Generate ₹2 Lakh Revenue",
                'slug' => 'womens-self-help-groups-generate-2-lakh-revenue',
                'type' => 'news',
                'category' => 'Women Empowerment',
                'published_date' => '2025-11-28',
                'image' => 'images/women-empowerment-news.jpg',
                'excerpt' => 'The self-help groups formed under our women empowerment program have collectively generated over ₹2 lakh in revenue through handicraft activities.',
                'content' => 'The self-help groups formed under our women empowerment program have collectively generated over ₹2 lakh in revenue through various income-generating activities and handicraft markets.',
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Water Conservation Project Benefits 1000+ Families',
                'slug' => 'water-conservation-project-benefits-1000-families',
                'type' => 'news',
                'category' => 'Community',
                'published_date' => '2025-11-20',
                'image' => 'images/community-development-news.jpg',
                'excerpt' => 'Our rainwater harvesting and water conservation project has provided clean drinking water access to over 1000 families across 5 villages.',
                'content' => 'Our rainwater harvesting and water conservation project has successfully provided clean drinking water access to over 1000 families across 5 villages in Prayagraj district.',
                'is_published' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Solar Power Initiative Lights Up Remote Villages',
                'slug' => 'solar-power-initiative-lights-up-remote-villages',
                'type' => 'news',
                'category' => 'Development',
                'published_date' => '2025-11-15',
                'image' => 'images/rural-development-news.jpg',
                'excerpt' => 'In partnership with renewable energy providers, we installed solar power systems in 3 remote villages, bringing electricity to 150+ households.',
                'content' => 'In partnership with renewable energy providers, we have installed solar power systems in 3 remote villages, bringing electricity to 150+ households for the first time.',
                'is_published' => true,
                'sort_order' => 6,
            ],

            // 6 Articles from perviouswebsite/blogs.php
            [
                'title' => 'Empowering Rural Youth: Skill Development Initiative In Prayagraj',
                'slug' => 'empowering-rural-youth-skill-development-prayagraj',
                'type' => 'blog',
                'category' => 'Skill Development',
                'published_date' => '2025-03-15',
                'image' => 'images/blog1.jpg',
                'excerpt' => 'Our recent skill development program in Prayagraj has successfully trained over 150 rural youths in various vocational skills.',
                'content' => 'Our recent skill development program in Prayagraj has successfully trained over 150 rural youths in various vocational skills, opening new employment opportunities and entrepreneurial ventures.',
                'is_published' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'Stitching A Brighter Future: Skill Development In Bhadohi With Local Partners',
                'slug' => 'stitching-brighter-future-skill-development-bhadohi',
                'type' => 'blog',
                'category' => 'Training Programs',
                'published_date' => '2025-03-10',
                'image' => 'images/blog2.jpg',
                'excerpt' => 'Partnership with local organizations has enabled us to provide comprehensive tailoring and stitching training to rural women in Bhadohi.',
                'content' => 'Partnership with local organizations has enabled us to provide comprehensive tailoring and stitching training to women in rural areas of Bhadohi, establishing self-help tailoring collectives.',
                'is_published' => true,
                'sort_order' => 8,
            ],
            [
                'title' => 'Preventing Food Poisoning: A Shared Responsibility For A Healthier Tomorrow',
                'slug' => 'preventing-food-poisoning-shared-responsibility',
                'type' => 'blog',
                'category' => 'Health Awareness',
                'published_date' => '2025-03-05',
                'image' => 'images/blog3.jpg',
                'excerpt' => 'Our health awareness campaign focuses on educating rural communities about food safety practices and clean living.',
                'content' => 'Our health awareness campaign focuses on educating rural communities about food safety practices, clean drinking water handling, and preventing common water-borne ailments.',
                'is_published' => true,
                'sort_order' => 9,
            ],
            [
                'title' => "Women's Self-Help Groups: Building Financial Independence",
                'slug' => 'womens-self-help-groups-financial-independence',
                'type' => 'blog',
                'category' => 'Women Empowerment',
                'published_date' => '2025-02-28',
                'image' => 'images/project1.jpeg',
                'excerpt' => 'Formation of women\'s self-help groups has created sustainable income sources for rural women across multiple villages.',
                'content' => 'Formation of women\'s self-help groups has been instrumental in creating sustainable income sources and micro-credit access for rural women across multiple villages.',
                'is_published' => true,
                'sort_order' => 10,
            ],
            [
                'title' => 'Rural Healthcare Initiative: Making Quality Healthcare Accessible',
                'slug' => 'rural-healthcare-initiative-accessible-healthcare',
                'type' => 'blog',
                'category' => 'Healthcare',
                'published_date' => '2025-02-22',
                'image' => 'images/project3.jpg',
                'excerpt' => 'Our ongoing healthcare program brings medical awareness and basic health services to remote villages.',
                'content' => 'Our ongoing healthcare program brings medical awareness and basic health services to remote villages, focusing on preventive care, maternal health, and seasonal checkups.',
                'is_published' => true,
                'sort_order' => 11,
            ],
            [
                'title' => 'Digital Literacy: Bridging The Technology Gap In Rural Areas',
                'slug' => 'digital-literacy-bridging-technology-gap',
                'type' => 'blog',
                'category' => 'Education',
                'published_date' => '2025-02-15',
                'image' => 'images/student1.jpeg',
                'excerpt' => 'Preparing for our upcoming digital literacy program that introduces computer skills to rural students.',
                'content' => 'Preparing for our upcoming digital literacy program that will introduce computer skills, coding fundamentals, and internet awareness to rural students.',
                'is_published' => true,
                'sort_order' => 12,
            ],
        ];
        foreach ($newsItems as $item) {
            NewsEvent::create($item);
        }

        // 8. ALL Official Certificates (Exact files from perviouswebsite/certificate.php & assets/certificates/)
        Certificate::truncate();
        $certs = [
            [
                'title' => 'GST Certificate',
                'type' => 'Registration',
                'file_path' => 'assets/certificates/AA090722075773U_RC22072022.pdf',
                'year' => '22 July 2022',
                'description' => 'Official registration certificate from regulatory tax authorities.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'CSR-1 Approval Letter',
                'type' => 'Approval',
                'file_path' => 'assets/certificates/Approval Letter for form CSR1 - 2023-08-08T153427.735.PDF',
                'year' => '08 August 2023',
                'description' => 'Corporate Social Responsibility approval documentation from Ministry of Corporate Affairs (MCA), Govt. of India.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Organization Charter & Constitution',
                'type' => 'Registration',
                'file_path' => 'assets/certificates/Matri Seva Samiti.pdf',
                'year' => 'Foundation Document',
                'description' => 'Founding charter and organizational constitution registered under Societies Registration Act 1860.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'NGO Darpan Registration',
                'type' => 'Registration',
                'file_path' => 'assets/certificates/NGO Darpan.pdf',
                'year' => 'NITI Aayog Portal',
                'description' => 'Official accreditation and registration on Government of India NGO Darpan (NITI Aayog) portal.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'PAN Card Certificate',
                'type' => 'Tax Document',
                'file_path' => 'assets/certificates/pancard.jpeg',
                'year' => 'Tax Document',
                'description' => 'Permanent Account Number documentation for tax exemption and compliance.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Udyam Registration Certificate',
                'type' => 'Registration',
                'file_path' => 'assets/certificates/Udyam Registration Certificate.pdf',
                'year' => 'MSME Registration',
                'description' => 'Micro, Small and Medium Enterprises (MSME) official registration certificate.',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];
        foreach ($certs as $c) {
            Certificate::create($c);
        }

        // 9. ALL Gallery Items (Exact images from images/gallery/)
        GalleryItem::truncate();
        $gallery = [
            ['title' => 'Community Outreach Banner', 'category' => 'Events', 'image' => 'images/gallery/banner.jpeg', 'caption' => 'Matri Seva Samiti grassroots banner outreach in rural Prayagraj.'],
            ['title' => 'Education & Child Development Class', 'category' => 'Education', 'image' => 'images/gallery/image.png', 'caption' => 'Underprivileged children receiving foundational education and books.'],
            ['title' => 'Women Tailoring & Skill Workshop', 'category' => 'Women Empowerment', 'image' => 'images/gallery/image copy.png', 'caption' => 'Rural women learning stitching and machine operation.'],
            ['title' => 'Health Screening & First Aid Camp', 'category' => 'Healthcare', 'image' => 'images/gallery/image copy 2.png', 'caption' => 'Volunteer doctors conducting free health checkups in village hamlets.'],
            ['title' => 'Ration & Essentials Distribution Drive', 'category' => 'Relief', 'image' => 'images/gallery/image copy 3.png', 'caption' => 'Distributing emergency food packages and winter blankets.'],
            ['title' => 'Digital Classroom & Computer Training', 'category' => 'Education', 'image' => 'images/gallery/image copy 4.png', 'caption' => 'Rural youths learning digital tools, typing, and MS Office.'],
            ['title' => 'Clean & Green Tree Plantation Drive', 'category' => 'Environment', 'image' => 'images/gallery/image copy 5.png', 'caption' => 'Sapling plantation drive along rural village roads.'],
            ['title' => 'Volunteers Assembly & Planning Meet', 'category' => 'Events', 'image' => 'images/gallery/image copy 6.png', 'caption' => 'Core team and volunteers coordinating field outreach.'],
            ['title' => 'Community Rainwater Harvesting Session', 'category' => 'Environment', 'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 5.52.20 PM.jpeg', 'caption' => 'Villagers gathered to discuss pond rejuvenation and water harvesting.'],
            ['title' => 'Rural Health Diagnosis Camp', 'category' => 'Healthcare', 'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 5.52.22 PM.jpeg', 'caption' => 'Senior citizens receiving diagnostic consultations and medicines.'],
            ['title' => 'Women Self-Help Group Tailoring Batch', 'category' => 'Women Empowerment', 'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 5.52.23 PM.jpeg', 'caption' => 'Women self-help collective in tailoring and handicrafts training.'],
            ['title' => 'School Stationery & Kit Distribution', 'category' => 'Education', 'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 5.52.24 PM.jpeg', 'caption' => 'Distributing school bags, notebooks, and pencils to students.'],
            ['title' => 'Child Nutrition & Milk Distribution', 'category' => 'Relief', 'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 5.52.30 PM.jpeg', 'caption' => 'Nutrition enhancement packages provided to primary children.'],
            ['title' => 'Artisan Handicraft Exhibition & Fair', 'category' => 'Women Empowerment', 'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 6.29.23 PM.jpeg', 'caption' => 'Showcasing handmade items produced by rural women artisans.'],
            ['title' => 'Youth Computer Literacy Batch', 'category' => 'Education', 'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 6.29.24 PM.jpeg', 'caption' => 'Youth trainees practicing data entry and administrative skills.'],
            ['title' => 'Free Medicines & Health Kits', 'category' => 'Healthcare', 'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 6.29.25 PM.jpeg', 'caption' => 'Distributing prescribed medical supplies to underprivileged families.'],
            ['title' => 'Self-Help Group Enterprise Meeting', 'category' => 'Women Empowerment', 'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 6.29.26 PM.jpeg', 'caption' => 'Monthly self-help group meeting discussing savings and micro-credit.'],
            ['title' => 'Field Inspection & Community Survey', 'category' => 'Events', 'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 6.29.27 PM.jpeg', 'caption' => 'Field leaders surveying infrastructure needs in remote hamlets.'],
            ['title' => 'Social Awareness Community Rally', 'category' => 'Events', 'image' => 'images/gallery/WhatsApp Image 2025-07-02 at 6.29.28 PM.jpeg', 'caption' => 'Community rally promoting cleanliness, sanitation, and child schooling.'],
            ['title' => 'Children Learning Circle Session', 'category' => 'Education', 'image' => 'images/gallery/WhatsApp Image 2026-05-30 at 12.16.05 PM.jpeg', 'caption' => 'Students participating in interactive quizzes and group study.'],
            ['title' => 'Flood & Disaster Relief Camp', 'category' => 'Relief', 'image' => 'images/gallery/WhatsApp Image 2026-05-30 at 12.16.06 PM.jpeg', 'caption' => 'Humanitarian relief packages handed to affected rural households.'],
            ['title' => 'Clean Green India Initiative', 'category' => 'Environment', 'image' => 'images/gallery/WhatsApp Image 2026-05-30 at 12.16.07 PM.jpeg', 'caption' => 'Volunteer cleanliness drive at community center.'],
        ];
        foreach ($gallery as $idx => $g) {
            GalleryItem::create(array_merge($g, ['sort_order' => $idx + 1, 'is_active' => true]));
        }

        // 10. ALL 7 Real Executive & Committee Members (From perviouswebsite/about.php)
        Member::truncate();
        $members = [
            // Executive Committee (4 members)
            [
                'name' => 'Gyan Shankar Pal',
                'designation' => 'President',
                'category' => 'Board',
                'photo' => 'images/president.png',
                'bio' => 'Founder President of Matri Seva Samiti, visionary leader dedicated to grassroots social transformation, rural livelihood, and sustainable community empowerment.',
                'email' => 'matrisevasamiti1910@gmail.com',
                'phone' => '+91 9415451910',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Dheeraj Raj Pal',
                'designation' => 'Vice President',
                'category' => 'Board',
                'photo' => 'members/dheeraj-raj-pal.jpeg',
                'bio' => 'Vice President guiding strategic outreach, youth mobilization, community relations, and skill development center logistics.',
                'email' => 'matrisevasamiti1910@gmail.com',
                'phone' => '+91 9838291910',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Narendra Nath Pal',
                'designation' => 'Managing Secretary',
                'category' => 'Board',
                'photo' => 'members/narendra-nath-pal.jpeg',
                'bio' => 'Managing Secretary overseeing administrative affairs, legal governance, field operations, and statutory compliance.',
                'email' => 'matrisevasamiti1910@gmail.com',
                'phone' => '+91 9415451910',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Mamta Pal',
                'designation' => 'Treasurer',
                'category' => 'Board',
                'photo' => 'members/mamta-pal.jpeg',
                'bio' => 'Treasurer managing financial transparency, project accounting, statutory audits, and fund allocation.',
                'email' => 'matrisevasamiti1910@gmail.com',
                'phone' => '+91 9415451910',
                'sort_order' => 4,
                'is_active' => true,
            ],

            // Committee Members (3 members)
            [
                'name' => 'Priyanka Pal',
                'designation' => 'Member',
                'category' => 'Core',
                'photo' => 'members/priyanka-pal.jpeg',
                'bio' => 'Committee member actively leading women self-help initiatives, tailoring centers, and girl child educational drives.',
                'email' => 'matrisevasamiti1910@gmail.com',
                'phone' => '+91 9415451910',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Sadhana Pal',
                'designation' => 'Member',
                'category' => 'Core',
                'photo' => 'members/sadhana-pal.jpeg',
                'bio' => 'Committee member focusing on rural health camps, hygiene kit distributions, and community nutrition awareness.',
                'email' => 'matrisevasamiti1910@gmail.com',
                'phone' => '+91 9415451910',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Sumitra Pal',
                'designation' => 'Member',
                'category' => 'Core',
                'photo' => 'members/sumitra-pal.jpeg',
                'bio' => 'Committee member coordinating grassroots volunteer teams and rural community outreach programs.',
                'email' => 'matrisevasamiti1910@gmail.com',
                'phone' => '+91 9415451910',
                'sort_order' => 7,
                'is_active' => true,
            ],
        ];
        foreach ($members as $m) {
            Member::create($m);
        }

        // 11. Testimonials (From perviouswebsite/donate.php & index.php)
        Testimonial::truncate();
        $testimonials = [
            [
                'name' => 'Sunita Devi',
                'designation' => 'Artisan Beneficiary',
                'location' => 'Jhunsi Village, Prayagraj',
                'photo' => 'images/student2.jpeg',
                'quote' => 'The skill training program changed my life. I now run my own tailoring business and support my family independently.',
                'rating' => 5,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Ram Prasad',
                'designation' => 'Rural Beneficiary',
                'location' => 'Prayagraj District',
                'photo' => 'images/student1.jpeg',
                'quote' => 'Thanks to the healthcare camp, we received free treatment and learned about preventive care. The medicines and care provided by the NGO volunteers were a lifesaver for us.',
                'rating' => 5,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Meera Sharma',
                'designation' => 'Village Teacher',
                'location' => 'Rural Learning Center',
                'photo' => 'images/student3.jpeg',
                'quote' => 'The digital library project brought technology to our village. Our children can now access online education and interactive learning with total joy.',
                'rating' => 5,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Rani Devi',
                'designation' => 'Tailoring Graduate',
                'location' => 'Prayagraj, UP',
                'photo' => 'images/student1.jpeg',
                'quote' => 'Thanks to the skill development program by Matri Seva Samiti, I now run my own tailoring shop and support my family. My life has completely changed for the better.',
                'rating' => 5,
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];
        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // 12. Focus Grant Verticals (From perviouswebsite/grants.php)
        Grant::truncate();
        $defaultGrants = [
            [
                'title' => 'Education Development Grant',
                'slug' => 'education-development-grant',
                'category' => 'Education & Skills',
                'badge_color' => 'danger',
                'amount_range' => '₹5 - ₹10 Lakhs',
                'short_description' => 'Digital literacy and skill development programs across rural schools and learning centers.',
                'description' => 'Focus Area: Digital literacy and skill development programs. Duration: 12-24 months. Eligibility: NGOs working in rural education with proven track record.',
                'tags' => 'Equipment Support, Training Materials, Capacity Building',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Healthcare Initiative Fund',
                'slug' => 'healthcare-initiative-fund',
                'category' => 'Healthcare',
                'badge_color' => 'success',
                'amount_range' => '₹3 - ₹8 Lakhs',
                'short_description' => 'Community health programs, diagnostic screening, and mobile medical camps.',
                'description' => 'Focus Area: Community health programs and medical camps. Duration: 6-18 months. Eligibility: Organizations with healthcare delivery experience.',
                'tags' => 'Medical Supplies, Staff Training, Infrastructure',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Women Empowerment Grant',
                'slug' => 'women-empowerment-grant',
                'category' => 'Women Livelihood',
                'badge_color' => 'warning',
                'amount_range' => '₹2 - ₹6 Lakhs',
                'short_description' => 'Women\'s skill development, commercial tailoring hubs, and micro-enterprise development.',
                'description' => 'Focus Area: Women\'s skill development and entrepreneurship. Duration: 12 months. Eligibility: NGOs with women-focused programs.',
                'tags' => 'Skill Training, Microcredit, Market Linkages',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Environmental Conservation Grant',
                'slug' => 'environmental-conservation-grant',
                'category' => 'Environment',
                'badge_color' => 'info',
                'amount_range' => '₹4 - ₹12 Lakhs',
                'short_description' => 'Water conservation, rainwater harvesting, solar lighting, and massive tree plantation.',
                'description' => 'Focus Area: Water conservation and renewable energy projects. Duration: 18-36 months. Eligibility: Organizations with environmental project experience.',
                'tags' => 'Solar Systems, Water Harvesting, Community Training',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];
        foreach ($defaultGrants as $grant) {
            Grant::create($grant);
        }

        // 13. FAQs (From previous website & common questions)
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
                'answer' => 'We accept all major payment modes via the secure CCAvenue Payment Gateway including UPI (Google Pay, PhonePe, Paytm), Credit Cards, Debit Cards, Net Banking, and direct NEFT/RTGS bank transfers to our HDFC Bank account (Account No: 50200072951175, IFSC: HDFC0002434).',
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
            ],
            [
                'question' => 'Where are your offices located in Prayagraj?',
                'answer' => 'Our Main Office is at 01 Naika Chhatnag Road, Near Ram Shiv Colony, Jhunsi, Prayagraj - 211019, and our Branch Office is at Ustapur Pathshala Road, Bhajnanand Ashram Near, Pani Tanki, Jhunsi, Prayagraj - 211019.',
                'category' => 'General',
                'sort_order' => 5,
                'is_active' => true,
            ]
        ];
        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        // 14. Careers / Openings (Dynamic job opportunities)
        Career::truncate();
        $defaultCareers = [
            [
                'title' => 'Field Project Coordinator',
                'slug' => 'field-project-coordinator',
                'job_type' => 'Full Time',
                'location' => 'Prayagraj / Bhadohi, UP',
                'experience' => '1-3 Years in NGO Fieldwork',
                'qualification' => 'MSW / B.Ed / Social Sciences',
                'stipend_salary' => 'As per NGO standards',
                'short_description' => 'Manage rural remedial school centers, coordinate with teachers, organize health camp logistics, and liaise with village heads.',
                'description' => 'Lead grassroots survey initiatives, monitor rural program deliverables, conduct community meetings, and maintain structured field progress reports.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Digital & Vocational Trainer',
                'slug' => 'digital-vocational-trainer',
                'job_type' => 'Full Time / Part Time',
                'location' => 'Jhunsi, Prayagraj',
                'experience' => '1+ Year Teaching Experience',
                'qualification' => 'BCA / PGDCA / IT Diploma',
                'stipend_salary' => 'Competitive NGO Honorarium',
                'short_description' => 'Conduct computer literacy batches, basic coding, MS Office, and digital bookkeeping courses for rural students and youth.',
                'description' => 'Deliver practical classroom instruction in digital literacy, typing, internet safety, and job-oriented computer applications to rural youth batches.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Social Media & Content Intern',
                'slug' => 'social-media-content-intern',
                'job_type' => 'Paid Internship',
                'location' => 'Remote / Hybrid',
                'experience' => 'Freshers Welcome',
                'qualification' => 'Journalism / Mass Comm / English',
                'stipend_salary' => 'Paid Stipend + Certificate',
                'short_description' => 'Document field stories, capture photography/videography of beneficiaries, manage social media accounts, and draft quarterly impact bulletins.',
                'description' => 'Create compelling impact stories, photo captions, reels, and digital newsletters covering MSS social work across villages.',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];
        foreach ($defaultCareers as $career) {
            Career::create($career);
        }
    }
}
