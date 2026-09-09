@extends('layouts.app')

@section('content')
<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Careers &amp; Opportunities</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Careers</li>
            </ul>
        </div>
    </section>

    <!-- CAREERS SECTION -->
    <section class="ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center">
                <div>
                    <span class="ul-section-sub-title">Work With Purpose</span>
                    <h2 class="ul-section-title">Current Job &amp; Internship Openings</h2>
                    <p class="ul-section-descr">Join our mission-driven team to create lasting positive impact across rural education, health, and women empowerment.</p>
                </div>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4">
                @forelse($careers as $job)
                    <div class="col">
                        <div class="card p-4 border-0 shadow-sm rounded-4 h-100 d-flex flex-column" style="background: #ffffff;">
                            <div class="mb-3">
                                <div class="d-flex flex-wrap gap-1 mb-2">
                                    <span class="badge bg-primary text-white">{{ $job->job_type }}</span>
                                    @if($job->location)
                                        <span class="badge bg-light text-dark border">{{ $job->location }}</span>
                                    @endif
                                </div>
                                <h4 class="text-dark mb-1">{{ $job->title }}</h4>
                            </div>
                            
                            @if($job->short_description)
                                <p class="text-muted" style="font-size: 14px;">{{ $job->short_description }}</p>
                            @endif

                            <div class="p-3 bg-light rounded-3 mb-3 mt-auto" style="font-size: 13px;">
                                @if($job->qualification)
                                    <div><strong>Qualification:</strong> {{ $job->qualification }}</div>
                                @endif
                                @if($job->experience)
                                    <div><strong>Experience:</strong> {{ $job->experience }}</div>
                                @endif
                                @if($job->stipend_salary)
                                    <div><strong>Stipend / Salary:</strong> {{ $job->stipend_salary }}</div>
                                @endif
                                @if($job->deadline)
                                    <div class="text-danger mt-1"><strong>Deadline:</strong> {{ $job->deadline->format('d M, Y') }}</div>
                                @endif
                            </div>

                            <a href="{{ route('contact.index', ['subject' => 'Job Application: ' . $job->title]) }}" class="ul-btn mt-2 justify-content-center">
                                <i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Apply Now
                            </a>
                        </div>
                    </div>
                @empty
                    <!-- Fallback default vacancies if none in database yet -->
                    <div class="col-12 text-center py-5">
                        <div class="p-5 bg-white rounded-4 shadow-sm border">
                            <i class="flaticon-account text-primary mb-3" style="font-size: 48px; display: inline-block;"></i>
                            <h3 class="h4 text-dark mb-2">No Active Openings at This Moment</h3>
                            <p class="text-muted mx-auto" style="max-width: 500px;">We are always looking for passionate volunteers and changemakers. Send us your resume and we will contact you when a suitable position opens.</p>
                            <a href="{{ route('contact.index', ['subject' => 'General Job / Resume Submission']) }}" class="ul-btn mt-3">
                                <i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Submit Your Resume
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection
