<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\Contact;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact', [
            'page_title' => 'Contact Us - Matri Seva Samiti',
        ]);
    }

    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        try {
            // Save to MySQL Database
            Contact::create($validated);
        } catch (\Exception $e) {
            Log::error('Error saving contact to MySQL: ' . $e->getMessage());
        }

        try {
            $adminEmail = config('site.admin_email', 'matrisevasamiti1910@gmail.com');
            Mail::to($adminEmail)->send(new ContactFormMail($validated));

            return redirect()->route('contact.index')
                ->with('contact_success', "Thank you for your message! We'll get back to you soon.");
        } catch (\Exception $e) {
            Log::error('Error sending contact email: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->route('contact.index')
                ->with('contact_success', "Thank you for your message! We'll get back to you soon.");
        }
    }
}
