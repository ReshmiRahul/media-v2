<!-- resources/views/media/index.blade.php -->

<form method="GET" action="{{ route('media.index') }}">
    <div>
        <input type="text" name="search" placeholder="Search by name" value="{{ request('search') }}">
        <select name="type">
            <option value="">All Types</option>
            <option value="image" {{ request('type') == 'image' ? 'selected' : '' }}>Image</option>
            <option value="video" {{ request('type') == 'video' ? 'selected' : '' }}>Video</option>
            <option value="audio" {{ request('type') == 'audio' ? 'selected' : '' }}>Audio</option>
        </select>
        <select name="approved">
            <option value="">All Approvals</option>
            <option value="1" {{ request('approved') == '1' ? 'selected' : '' }}>Approved</option>
            <option value="0" {{ request('approved') == '0' ? 'selected' : '' }}>Pending</option>
        </select>
        <button type="submit">Filter</button>
    </div>
</form>

<div class="media-list">
    @foreach ($media as $item)
        <div class="media-item">
            <a href="{{ route('media.show', $item->id) }}">
                <h3>{{ $item->name }}</h3>
                <p>{{ $item->type }} - {{ $item->approved ? 'Approved' : 'Pending' }}</p>
            </a>
        </div>
    @endforeach
</div>

<!-- Pagination links -->
{{ $media->links() }}
