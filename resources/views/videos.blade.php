<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Video Gallery</title>
    @vite(['resources/css/app.css', 'resources/css/gallery-videos.css']) 
</head>
<body>
    <header class="navbar">
        <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"></div>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="#">Videos</a></li>
            </ul>
        </nav>
    </header>

    <!-- Disclaimer Section -->
    <section class="disclaimer">
        <p>
            <strong>Disclaimer:</strong> The images, audios, and video footage provided in this gallery are available for media download and use, and must be credited to <strong>BrickMMO</strong> or the photographer specified in the image caption. They cannot be used for advertising, marketing, or to imply endorsement.
        </p>
    </section>

    <section class="video-grid">
        @foreach($data as $index => $item)
            <div class="video-container" onclick="openModal({{ $index }})">
                <iframe width="250" height="150" src="https://drive.google.com/file/d/{{ $item->google_id }}/preview" allowfullscreen></iframe>
                <div class="overlay">
                    <p>{{ $item->name }}</p>
                    <div class="circle">▶</div>
                </div>
            </div>
        @endforeach
    </section>

    <section class="modal" id="videoModal">
        <button class="close" onclick="closeModal()">&times;</button>
        <button class="prev" onclick="prevVideo()">&#10094;</button>
        <div class="modal-content">
            <iframe id="modalVideo" width="560" height="315" allowfullscreen></iframe>
            <p id="modalText"></p>
            <p id="modalDetails"></p>
            <a id="downloadLink" class="download-btn" download>DOWNLOAD</a>
        </div>
        <button class="next" onclick="nextVideo()">&#10095;</button>
    </section>

    <footer class="footer-section">
        <div class="footer-container">
            <img src="{{ asset('images/logo.png') }}" alt="Footer Logo" class="footer-logo">
            <nav class="footer-nav"><a href="/">Home</a><a href="/about">About</a><a href="#">Videos</a></nav>
            <div class="footer-copy">&copy; 2025 BrickMMO</div>
        </div>
    </footer>

    <script>
        let videos = @json($data);
        let currentIndex = 0;
        function openModal(index) {
            currentIndex = index;
            document.getElementById('modalVideo').src = `https://drive.google.com/file/d/${videos[index].google_id}/preview`;
            document.getElementById('modalText').innerText = videos[index].name;
            document.getElementById('modalDetails').innerHTML = `
                <div class="modal-info">
                    <p><strong>Approval Status:</strong> ${videos[index].approved == 1 ? '✅ Approved' : '❌ Not Approved'}</p>
                    <p><strong>Type:</strong> ${videos[index].type}</p>
                    <p><strong>Uploaded By:</strong> ${videos[index].first} ${videos[index].last}</p>
                    <p><strong>Email:</strong> <a href="mailto:${videos[index].email}">${videos[index].email}</a></p>
                    <p><strong>Uploaded On:</strong> ${new Date(videos[index].created_at).toLocaleDateString()}</p>
                </div>
            `;
            document.getElementById('downloadLink').href = `https://drive.google.com/uc?id=${videos[index].google_id}`;
            document.getElementById('videoModal').style.display = 'flex';
        }
        function closeModal() { document.getElementById('videoModal').style.display = 'none'; }
        function prevVideo() { if (currentIndex > 0) openModal(currentIndex - 1); }
        function nextVideo() { if (currentIndex < videos.length - 1) openModal(currentIndex + 1); }
    </script>
</body>
</html>
