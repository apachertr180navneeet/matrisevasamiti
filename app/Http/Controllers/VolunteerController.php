<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\VolunteerRegistrationMail;
use App\Mail\VolunteerConfirmationMail;

class VolunteerController extends Controller
{
    public function index(): View
    {
        return view('pages.volunteer', [
            'page_title' => 'Volunteer With Us - Matri Seva Samiti',
        ]);
    }

    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:150',
            'address' => 'required|string|max:300',
            'message' => 'nullable|string|max:3000',
        ]);

        try {
            $adminEmail = config('site.admin_email', 'matrisevasamiti1910@gmail.com');
            
            // Send email to NGO Admin
            Mail::to($adminEmail)->send(new VolunteerRegistrationMail($validated));

            // Send confirmation email to applicant
            Mail::to($validated['email'])->send(new VolunteerConfirmationMail($validated));

            return redirect()->route('volunteer.index')
                ->with('volunteer_success', 'Thank you! Your volunteer registration has been submitted successfully. We will contact you soon.');
        } catch (\Exception $e) {
            Log::error('Error processing volunteer registration: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->route('volunteer.index')
                ->with('volunteer_success', 'Thank you! Your volunteer registration has been submitted successfully. We will contact you soon.');
        }
    }
}
