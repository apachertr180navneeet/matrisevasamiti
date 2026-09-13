@extends('layouts.app')

@section('content')
<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Featured Grassroots Projects</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Projects</li>
            </ul>
        </div>
    </section>

    <!-- PROJECTS GALLERY SECTION -->
    <section class="ul-projects ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center mb-4">
                <div>
                    <span class="ul-section-sub-title">"मिलकर करें प्रयास, खुशहाल हो समाज"</span>
                    <h2 class="ul-section-title">Active &amp; Completed Grassroots Projects</h2>
                    <p class="ul-section-descr">Transforming rural communities across Uttar Pradesh through structured skill training, healthcare camps, and women empowerment.</p>
                </div>
            </div>

            <!-- FILTER BUTTONS -->
            <div class="d-flex justify-content-center flex-wrap gap-2 mb-5">
                <button type="button" class="btn btn-outline-danger active rounded-pill px-4 project-filter-btn" data-filter="all">All Projects</button>
                <button type="button" class="btn btn-outline-danger rounded-pill px-4 project-filter-btn" data-filter="completed">Completed</button>
                <button type="button" class="btn btn-outline-danger rounded-pill px-4 project-filter-btn" data-filter="ongoing">Ongoing</button>
                <button type="button" class="btn btn-outline-danger rounded-pill px-4 project-filter-btn" data-filter="upcoming">Upcoming</button>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4" id="projects-grid">
                @forelse($projects as $proj)
                    @php
                        $statusKey = strtolower($proj->status ?? 'ongoing');
                        $badgeClass = match($statusKey) {
                            'completed' => 'bg-success',
                            'upcoming' => 'bg-info text-dark',
                            default => 'bg-warning text-dark',
                        };
                    @endphp
                    <div class="col project-card-item" data-status="{{ $statusKey }}">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 p-0 hover-lift transition">
                            <img src="{{ asset($proj->image ?? 'images/project1.jpeg') }}" alt="{{ $proj->title }}" style="height: 240px; width: 100%; object-fit: cover;">
                            <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge {{ $badgeClass }} px-3 py-2 rounded-pill">{{ ucfirst($proj->status ?? 'Ongoing') }}</span>
                                        @if($proj->project_date)
                                            <span class="text-muted small"><i class="flaticon-calendar text-danger me-1"></i>{{ \Carbon\Carbon::parse($proj->project_date)->format('M Y') }}</span>
                                        @endif
                                    </div>
                                    <h3 class="h5 mb-2 text-dark fw-bold">{{ $proj->title }}</h3>
                                    <p class="text-muted small mb-3">{{ $proj->summary ?? Str::limit(strip_tags($proj->details), 120) }}</p>
                                    @if($proj->location || $proj->beneficiaries)
                                        <div class="d-flex justify-content-between text-muted small border-top pt-2 mb-3">
                                            @if($proj->location)
                                                <span><i class="flaticon-pin text-danger me-1"></i> {{ $proj->location }}</span>
                                            @endif
                                            @if($proj->beneficiaries)
                                                <span><i class="flaticon-account text-primary me-1"></i> {{ $proj->beneficiaries }}</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                                <a href="{{ route('donate.index') }}" class="btn btn-outline-danger btn-sm rounded-pill w-100 fw-semibold">Support This Project &rarr;</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No projects found at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</main>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.project-filter-btn');
    const projectCards = document.querySelectorAll('.project-card-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active', 'btn-danger', 'text-white'));
            filterBtns.forEach(b => b.classList.add('btn-outline-danger'));
            
            this.classList.remove('btn-outline-danger');
            this.classList.add('active', 'btn-danger', 'text-white');

            const filter = this.getAttribute('data-filter');
            projectCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-status') === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endpush
@endsection
