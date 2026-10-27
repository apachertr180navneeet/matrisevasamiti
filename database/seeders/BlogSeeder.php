<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Categories
        $categoriesData = [
            [
                'name' => 'Women Empowerment',
                'slug' => 'women-empowerment',
                'description' => 'Stories and initiatives helping rural women achieve financial freedom and leadership.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Rural Education',
                'slug' => 'rural-education',
                'description' => 'Transforming educational access, libraries, and digital literacy in underserved villages.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Healthcare & Nutrition',
                'slug' => 'healthcare-nutrition',
                'description' => 'Medical outreach camps, maternal wellness, and community nutrition drives.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Skill & Livelihood',
                'slug' => 'skill-livelihood',
                'description' => 'Vocational training, handicrafts development, and sustainable livelihood programs.',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        $categories = [];
        foreach ($categoriesData as $data) {
            $categories[$data['slug']] = BlogCategory::updateOrCreate(['slug' => $data['slug']], $data);
        }

        // 2. Create Sample Blogs
        $blogsData = [
            [
                'blog_category_id' => $categories['women-empowerment']->id,
                'title' => 'Breaking Barriers: How Rural Women in Chandauli Are Becoming Micro-Entrepreneurs',
                'slug' => 'breaking-barriers-rural-women-micro-entrepreneurs',
                'image' => 'images/women-empowerment.jpg',
                'short_description' => 'Discover how Matri Seva Samiti’s self-help group programs have trained over 450 rural women in handicrafts and micro-business management.',
                'content' => '<p>Financial independence is the true cornerstone of societal transformation. For decades, women in the villages of Chandauli and Varanasi faced deep socio-economic barriers. Today, through structured vocational workshops and community self-help groups (SHGs), hundreds of women are breaking these barriers and becoming household breadwinners.</p>
<h2>Empowering Through Practical Skills</h2>
<p>Through our dedicated skill development centers, women undergo intensive training in tailoring, eco-friendly cloth bag production, organic incense manufacturing, and food processing. By equipping them with marketable artisan skills and basic bookkeeping knowledge, they gain the confidence to lead their own small enterprises.</p>
<blockquote>"Before this program, I had never stepped out of my courtyard. Today, I contribute to my children’s school fees and have a savings account in my own name." — <em>Sunita Devi, Program Beneficiary</em></blockquote>
<h2>Creating Sustainable Market Linkages</h2>
<p>To ensure long-term sustainability, Matri Seva Samiti bridges the gap between rural artisans and local urban markets. Products crafted by our women’s collectives are showcased at cultural exhibitions and community stores, providing a steady, dignified monthly income.</p>
<p>Together with our donors and volunteers, we are continuing to expand these training clusters to empower 1,000 more women by the end of 2026.</p>',
                'meta_title' => 'Rural Women Micro-Entrepreneurs in Chandauli | Matri Seva Samiti',
                'meta_keywords' => 'women empowerment, rural micro-entrepreneurs, self help groups, vocational training, chandauli ngo, matri seva samiti',
                'meta_description' => 'Discover how Matri Seva Samiti empowers rural women in Eastern Uttar Pradesh through vocational skill training, SHGs, and sustainable micro-enterprise support.',
                'author_name' => 'Matri Seva Samiti',
                'views_count' => 142,
                'published_date' => now()->subDays(3),
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'blog_category_id' => $categories['rural-education']->id,
                'title' => 'Project Shiksha Uday: Bringing Digital Classrooms and Libraries to Village Schools',
                'slug' => 'project-shiksha-uday-digital-classrooms-village-schools',
                'image' => 'images/Educationimage.png',
                'short_description' => 'Modern education shouldn’t be a privilege reserved for cities. Learn how our mobile digital learning labs are bridging the rural learning divide.',
                'content' => '<p>In rural India, millions of bright young minds lack access to quality textbooks, computer literacy, and interactive learning tools. Under Project Shiksha Uday, Matri Seva Samiti is actively transforming rural government schools into vibrant centers of modern learning.</p>
<h2>Interactive STEM & Digital Literacy</h2>
<p>Through our mobile smart learning vans and refurbished computer labs, students from primary and upper-primary schools gain hands-on experience with technology. We introduce foundational concepts of mathematics, science, and English through interactive audio-visual modules designed in Hindi and regional dialects.</p>
<h2>Reviving the Joy of Reading with Village Libraries</h2>
<p>Beyond digital tools, fostering a reading culture is essential. We have established 12 community reading libraries stocked with storybooks, encyclopedias, and competitive exam preparation materials, allowing both children and older youth to expand their horizons.</p>
<p>Our commitment remains steadfast: ensuring every rural child has the opportunity to dream big and build a brighter tomorrow.</p>',
                'meta_title' => 'Project Shiksha Uday: Digital Classrooms in Village Schools | Matri Seva Samiti',
                'meta_keywords' => 'rural education, digital classrooms, village libraries, child education ngo, varanasi, shiksha uday',
                'meta_description' => 'Learn how Project Shiksha Uday by Matri Seva Samiti is transforming rural education with smart learning vans, digital classrooms, and village libraries.',
                'author_name' => 'MSS Education Wing',
                'views_count' => 238,
                'published_date' => now()->subDays(8),
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'blog_category_id' => $categories['healthcare-nutrition']->id,
                'title' => 'Mobile Health Camps: Delivering Preventative Healthcare to Doorsteps',
                'slug' => 'mobile-health-camps-preventative-healthcare-doorsteps',
                'image' => 'images/healthimage.png',
                'short_description' => 'A comprehensive review of our monthly preventative medical checkups, free medicine distribution, and maternal health consultations in remote villages.',
                'content' => '<p>Access to timely primary healthcare remains a critical challenge for remote farming hamlets. Basic ailments, if left untreated, frequently develop into severe medical complications. To address this, Matri Seva Samiti conducts regular free medical camps equipped with diagnostic equipment and volunteer doctors.</p>
<h2>Comprehensive Diagnostic & Pediatric Care</h2>
<p>Each camp provides free screenings for anemia, blood sugar, hypertension, and vision problems. Expectant mothers receive prenatal counseling, essential nutritional supplements, and guidance on institutional deliveries.</p>
<h2>Clean Water & Hygiene Awareness</h2>
<p>Preventative health goes hand-in-hand with sanitation. Our teams organize interactive demonstrations on water purification, handwashing techniques, and waste disposal to prevent waterborne illnesses during the monsoon season.</p>',
                'meta_title' => 'Preventative Healthcare and Mobile Medical Camps | Matri Seva Samiti',
                'meta_keywords' => 'mobile health camps, rural medical aid, free health checkup, maternal wellness, matri seva samiti ngo',
                'meta_description' => 'Explore how Matri Seva Samiti brings free preventative health camps, doctor consultations, and medicine distribution to remote rural communities.',
                'author_name' => 'MSS Healthcare Team',
                'views_count' => 189,
                'published_date' => now()->subDays(14),
                'is_published' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($blogsData as $blog) {
            Blog::updateOrCreate(['slug' => $blog['slug']], $blog);
        }
    }
}
