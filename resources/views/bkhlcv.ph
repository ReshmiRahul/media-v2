<!-- <!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search-results.css') }}">
</head>
<body>
    @if(isset($type) && $type)
        <h1>Search Results for "{{ ucfirst($type) }}"</h1>
    @else
        <h1>All Media</h1>
    @endif

    <div class="media-grid">
        @forelse ($mediaItems as $media)
            @if($media->type === 'video')
                <!-- Using iframe for video preview -->
                <!-- <iframe src="https://drive.google.com/file/d/{{ $media->google_id }}/preview" frameborder="0" allowfullscreen></iframe>
            @elseif($media->type === 'audio')
                <audio controls>
                    <source src="https://drive.google.com/uc?export=view&id={{ $media->google_id }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            @else
                <img src="https://lh3.googleusercontent.com/d/{{ $media->google_id }}=w500-h500" alt="{{ $media->name }}">
            @endif
        @empty -->
            <!-- <p>No media found for the selected tag.</p>
        @endforelse
    </div>
    <a href="{{ url('/') }}">Back to Home</a>
</body>
</html> -->
 -->

