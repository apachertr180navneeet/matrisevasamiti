<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | Matri Seva Samiti</title>
    <link rel="shortcut icon" href="{{ asset(config('site.favicon', 'logo/Logo.png')) }}" type="image/x-icon">
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --admin-primary: #0F2B5B;
            --admin-primary-hover: #0a1f42;
            --admin-secondary: #E35E25;
            --admin-dark-bg: #0b1a30;
            --admin-sidebar-width: 270px;
            --admin-body-bg: #f4f6fa;
            --admin-card-bg: #ffffff;
            --admin-border-color: #e5e9f2;
            --admin-text-main: #1f2937;
            --admin-text-muted: #6b7280;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--admin-body-bg);
            color: var(--admin-text-main);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* SIDEBAR STYLES */
        .admin-sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: var(--admin-sidebar-width);
            background: linear-gradient(180deg, #0b192e 0%, #081324 100%);
            color: #d1d5db;
            z-index: 1045;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            box-shadow: 4px 0 25px rgba(0,0,0,0.12);
        }

        .admin-sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.15);
            border-radius: 4px;
        }

        .sidebar-brand {
            padding: 20px 22px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            background: rgba(0,0,0,0.15);
        }

        .sidebar-brand img {
            height: 40px;
            width: auto;
            background: #fff;
            padding: 4px;
            border-radius: 8px;
        }

        .sidebar-brand-text {
            font-size: 1.05rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.2;
        }

        .sidebar-brand-text small {
            font-size: 0.72rem;
            color: var(--admin-secondary);
            display: block;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sidebar-menu {
            padding: 18px 14px;
            list-style: none;
            margin: 0;
        }

        .menu-header {
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #64748b;
            padding: 12px 14px 6px;
        }

        .menu-item {
            margin-bottom: 4px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 10px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .menu-link i {
            font-size: 1.15rem;
            min-width: 22px;
            text-align: center;
        }

        .menu-link:hover {
            color: #ffffff;
            background: rgba(255,255,255,0.08);
            transform: translateX(3px);
        }

        .menu-link.active {
            color: #ffffff;
            background: linear-gradient(135deg, var(--admin-secondary) 0%, #f37740 100%);
            box-shadow: 0 4px 14px rgba(227, 94, 37, 0.4);
            font-weight: 600;
        }

        .menu-badge {
            margin-left: auto;
            font-size: 0.75rem;
            padding: 2px 8px;
            border-radius: 12px;
        }

        /* MAIN CONTENT AREA */
        .admin-main {
            margin-left: var(--admin-sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* TOP NAVBAR */
        .admin-navbar {
            height: 70px;
            background: #ffffff;
            border-bottom: 1px solid var(--admin-border-color);
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        .admin-content {
            padding: 28px;
            flex: 1;
        }

        /* CARDS & UI ELEMENTS */
        .admin-card {
            background: var(--admin-card-bg);
            border-radius: 16px;
            border: 1px solid var(--admin-border-color);
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .admin-card-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--admin-border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
        }

        .admin-card-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
            color: #0f172a;
        }

        .admin-card-body {
            padding: 24px;
        }

        /* STAT CARDS */
        .stat-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid var(--admin-border-color);
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 18px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.03);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.07);
        }

        .stat-icon {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .stat-icon.primary { background: rgba(15, 43, 91, 0.1); color: var(--admin-primary); }
        .stat-icon.warning { background: rgba(227, 94, 37, 0.1); color: var(--admin-secondary); }
        .stat-icon.success { background: rgba(16, 185, 129, 0.1); color: #10b981; }
        .stat-icon.info { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }

        .stat-number {
            font-size: 1.65rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.1;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--admin-text-muted);
            font-weight: 500;
            margin: 0;
        }

        /* TABLES */
        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
        }

        .admin-table {
            margin-bottom: 0;
            vertical-align: middle;
        }

        .admin-table th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 600;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 14px 18px;
            border-bottom: 1px solid var(--admin-border-color);
        }

        .admin-table td {
            padding: 14px 18px;
            color: #334155;
            font-size: 0.9rem;
            border-bottom: 1px solid var(--admin-border-color);
        }

        .admin-table tr:hover td {
            background-color: #f8fafc;
        }

        /* BUTTONS */
        .btn-admin-primary {
            background-color: var(--admin-primary);
            color: #ffffff;
            font-weight: 600;
            border-radius: 10px;
            padding: 8px 18px;
            border: none;
            transition: all 0.2s ease;
        }
        .btn-admin-primary:hover {
            background-color: var(--admin-primary-hover);
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-admin-secondary {
            background-color: var(--admin-secondary);
            color: #ffffff;
            font-weight: 600;
            border-radius: 10px;
            padding: 8px 18px;
            border: none;
            transition: all 0.2s ease;
        }
        .btn-admin-secondary:hover {
            background-color: #c94c1a;
            color: #ffffff;
            transform: translateY(-1px);
        }

        /* MOBILE RESPONSIVENESS (< 992px) */
        .sidebar-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(3px);
            z-index: 1040;
        }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
            }
            .sidebar-backdrop.show {
                display: block;
            }
            .admin-content {
                padding: 16px;
            }
            .admin-navbar {
                padding: 0 16px;
            }
        }

        /* FORM CONTROLS */
        .form-label {
            font-weight: 600;
            font-size: 0.88rem;
            color: #334155;
            margin-bottom: 6px;
        }
        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            padding: 10px 14px;
            font-size: 0.92rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 3px rgba(15, 43, 91, 0.12);
        }

        /* IMAGE PREVIEW BOX */
        .img-preview-box {
            width: 100%;
            max-width: 220px;
            height: 140px;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            position: relative;
        }
        .img-preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <!-- Mobile Backdrop -->
    <div class="sidebar-backdrop" id="sidebarBackdrop" onclick="toggleSidebar()"></div>

    <!-- SIDEBAR -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <img src="{{ asset(config('site.logo', 'logo/Logo.png')) }}" alt="Matri Seva Samiti Logo">
            <div class="sidebar-brand-text">
                Matri Seva Samiti
                <small>Admin Panel</small>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Overview</li>
            <li class="menu-item">
                <a href="{{ route('admin.dashboard') }}" class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Leads &amp; Inquiries</li>
            <li class="menu-item">
                <a href="{{ route('admin.contacts.index') }}" class="menu-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <i class="bi bi-envelope-paper-fill"></i>
                    <span>Contact Inbox</span>
                    @php $unreadCount = \App\Models\Contact::where('status', 'unread')->count(); @endphp
                    @if($unreadCount > 0)
                        <span class="badge bg-danger menu-badge">{{ $unreadCount }}</span>
                    @endif
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.volunteers.index') }}" class="menu-link {{ request()->routeIs('admin.volunteers.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Volunteers</span>
                    @php $pendingVolunteers = \App\Models\Volunteer::where('status', 'pending')->count(); @endphp
                    @if($pendingVolunteers > 0)
                        <span class="badge bg-warning text-dark menu-badge">{{ $pendingVolunteers }}</span>
                    @endif
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.donations.index') }}" class="menu-link {{ request()->routeIs('admin.donations.*') ? 'active' : '' }}">
                    <i class="bi bi-heart-fill"></i>
                    <span>Donations &amp; CCAvenue</span>
                </a>
            </li>

            <li class="menu-header">Content Management</li>
            <li class="menu-item">
                <a href="{{ route('admin.banners.index') }}" class="menu-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                    <i class="bi bi-image-fill"></i>
                    <span>Hero Banners</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.causes.index') }}" class="menu-link {{ request()->routeIs('admin.causes.*') ? 'active' : '' }}">
                    <i class="bi bi-cash-coin"></i>
                    <span>Urgent Causes</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.programs.index') }}" class="menu-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
                    <i class="bi bi-mortarboard-fill"></i>
                    <span>Programs</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.projects.index') }}" class="menu-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="bi bi-kanban-fill"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.news.index') }}" class="menu-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i>
                    <span>News &amp; Events</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.gallery.index') }}" class="menu-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i>
                    <span>Photo Gallery</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.members.index') }}" class="menu-link {{ request()->routeIs('admin.members.*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Team &amp; Board</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.testimonials.index') }}" class="menu-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="bi bi-chat-quote-fill"></i>
                    <span>Testimonials</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.certificates.index') }}" class="menu-link {{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                    <span>Certificates (80G/12A)</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.faqs.index') }}" class="menu-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <i class="bi bi-question-circle-fill"></i>
                    <span>FAQs</span>
                </a>
            </li>

            <li class="menu-header">Administration</li>
            <li class="menu-item">
                <a href="{{ route('admin.settings.index') }}" class="menu-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="bi bi-gear-fill"></i>
                    <span>Site Settings</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.profile') }}" class="menu-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <i class="bi bi-person-circle"></i>
                    <span>Admin Profile</span>
                </a>
            </li>
            <li class="menu-item">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="menu-link border-0 bg-transparent w-100 text-start text-danger">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- MAIN CONTAINER -->
    <div class="admin-main">
        <!-- TOP NAVBAR -->
        <header class="admin-navbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-outline-secondary d-lg-none" type="button" onclick="toggleSidebar()" aria-label="Toggle Sidebar">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-primary d-none d-sm-inline-flex align-items-center gap-2 rounded-pill px-3">
                    <i class="bi bi-box-arrow-up-right"></i>
                    <span>View Public Website</span>
                </a>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-light position-relative rounded-circle p-2" title="Unread Inquiries">
                    <i class="bi bi-bell text-secondary"></i>
                    @if($unreadCount > 0)
                        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                    @endif
                </a>

                <div class="dropdown">
                    <button class="btn btn-light d-flex align-items-center gap-2 rounded-pill px-3 py-1 border" type="button" data-bs-toggle="dropdown">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:30px; height:30px; font-weight:700; font-size: 0.8rem;">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <span class="d-none d-md-inline font-weight-600 text-dark small">{{ Auth::user()->name ?? 'Administrator' }}</span>
                        <i class="bi bi-chevron-down small text-muted"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-2">
                        <li><a class="dropdown-item py-2" href="{{ route('admin.profile') }}"><i class="bi bi-person me-2"></i> My Profile</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('admin.settings.index') }}"><i class="bi bi-gear me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="admin-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show rounded-3 shadow-sm border-0" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i> {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0" role="alert">
                    <strong class="d-block mb-1"><i class="bi bi-x-circle-fill me-2"></i> Please fix the following errors:</strong>
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- FOOTER -->
        <footer class="py-3 px-4 text-center text-muted border-top bg-white small">
            &copy; {{ date('Y') }} <strong>Matri Seva Samiti</strong>. All Rights Reserved. Built with Laravel 11.
        </footer>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            sidebar.classList.toggle('show');
            backdrop.classList.toggle('show');
        }

        // Live image preview helper
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById(previewId);
                    if (img) {
                        img.src = e.target.result;
                        img.style.display = 'block';
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @yield('scripts')
</body>
</html>
