<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'page_title' => 'Matri Seva Samiti - Non Profit NGO',
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'page_title' => 'About Us - Matri Seva Samiti',
        ]);
    }

    public function programs(): View
    {
        return view('pages.programs', [
            'page_title' => 'Our Programs - Matri Seva Samiti',
        ]);
    }

    public function projects(): View
    {
        return view('pages.projects', [
            'page_title' => 'Our Projects - Matri Seva Samiti',
        ]);
    }

    public function impact(): View
    {
        return view('pages.impact', [
            'page_title' => 'Our Impact - Matri Seva Samiti',
        ]);
    }

    public function certificate(): View
    {
        return view('pages.certificate', [
            'page_title' => 'Trust Certificate & Documents - Matri Seva Samiti',
        ]);
    }

    public function grants(): View
    {
        return view('pages.grants', [
            'page_title' => 'Grants & Funding - Matri Seva Samiti',
        ]);
    }

    public function gallery(): View
    {
        return view('pages.gallery', [
            'page_title' => 'Photo & Video Gallery - Matri Seva Samiti',
        ]);
    }

    public function media(): View
    {
        return view('pages.media', [
            'page_title' => 'Media Coverage - Matri Seva Samiti',
        ]);
    }

    public function news(): View
    {
        return view('pages.news', [
            'page_title' => 'NGO News & Updates - Matri Seva Samiti',
        ]);
    }

    public function career(): View
    {
        return view('pages.career', [
            'page_title' => 'Careers - Matri Seva Samiti',
        ]);
    }

    public function faq(): View
    {
        return view('pages.faq', [
            'page_title' => 'FAQ - Matri Seva Samiti',
        ]);
    }

    public function privacy(): View
    {
        return view('pages.privacy', [
            'page_title' => 'Privacy Policy - Matri Seva Samiti',
        ]);
    }

    public function terms(): View
    {
        return view('pages.terms', [
            'page_title' => 'Terms & Conditions - Matri Seva Samiti',
        ]);
    }

    public function disclaimer(): View
    {
        return view('pages.disclaimer', [
            'page_title' => 'Disclaimer - Matri Seva Samiti',
        ]);
    }
}
