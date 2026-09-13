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
