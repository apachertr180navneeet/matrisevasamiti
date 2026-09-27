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

    public function news(): View
    {
        $news = Cache::remember('page_news_all', 1800, function () {
            return NewsEvent::where('is_published', true)->orderBy('sort_order', 'asc')->latest('published_date')->get();
        });
        return view('pages.news', compact('news'));
    }

    public function blogs(): View
    {
        $blogs = Cache::remember('page_blogs_all', 1800, function () {
            $b = NewsEvent::where('is_published', true)->where('type', 'blog')->orderBy('sort_order', 'asc')->latest('published_date')->get();
            if ($b->isEmpty()) {
                $b = NewsEvent::where('is_published', true)->orderBy('sort_order', 'asc')->latest('published_date')->get();
            }
            return $b;
        });
        return view('pages.blogs', compact('blogs'));
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
}
