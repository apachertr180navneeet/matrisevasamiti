@extends('admin.layouts.app')

@section('title', 'News & Events')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">News, Events &amp; Press Releases</h4>
            <p class="text-muted small mb-0">Publish stories, field updates, and upcoming events.</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Post
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Post Title</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $post)
                            <tr>
                                <td style="width: 80px;">
                                    <img src="{{ asset($post->image ?? 'images/student1.jpeg') }}" alt="{{ $post->title }}" style="width: 70px; height: 50px; object-fit: cover; border-radius: 8px;">
                                </td>
                                <td>
                                    <strong>{{ $post->title }}</strong>
                                </td>
                                <td><span class="badge bg-light text-dark border text-uppercase">{{ $post->type }}</span></td>
                                <td>{{ $post->category ?? 'General' }}</td>
                                <td class="small text-muted">{{ optional($post->published_date)->format('d M, Y') ?? 'N/A' }}</td>
                                <td>
                                    @if($post->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.news.edit', $post->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.news.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No news or media articles published yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
