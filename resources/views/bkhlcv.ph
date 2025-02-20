<script>
    let mediaItems = @json($mediaItems);
    let currentIndex = 0;

    function hideLoader(element) {
        let loader = element.closest('.media-container')?.querySelector('.loader');
        if (loader) loader.style.display = 'none';
    }

    function openModal(index) {
        currentIndex = index;
        const mediaItem = mediaItems[index];

        document.getElementById('modalTitle').innerText = mediaItem.name;
        document.getElementById('modalDetails').innerHTML = `
            <div class="modal-info">
                <p><strong>Type:</strong> ${mediaItem.type}</p>
                <p><strong>Uploaded By:</strong> ${mediaItem.user ? `${mediaItem.user.first} ${mediaItem.user.last}` : 'Unknown'}</p>
                <p><strong>Email:</strong> <a href="mailto:${mediaItem.user ? mediaItem.user.email : ''}">${mediaItem.user ? mediaItem.user.email : 'N/A'}</a></p>
                <p><strong>Uploaded On:</strong> ${new Date(mediaItem.created_at).toLocaleDateString()}</p>
            </div>
        `;

        // Reset modal display
        document.getElementById('modalVideo').style.display = 'none';
        document.getElementById('modalAudio').style.display = 'none';
        document.getElementById('modalImage').style.display = 'none';

        let mediaUrl;

        if (mediaItem.type === 'image') {
            mediaUrl = `https://lh3.googleusercontent.com/d/${mediaItem.google_id}=w1200-h800`;
            let imgElement = document.getElementById('modalImage');
            imgElement.src = mediaUrl;
            imgElement.style.display = 'block';
        } 
        else if (mediaItem.type === 'video') {
            mediaUrl = `https://drive.google.com/file/d/${mediaItem.google_id}/preview`;
            let videoElement = document.getElementById('modalVideo');
            videoElement.src = mediaUrl;
            videoElement.style.display = 'block';

            videoElement.onerror = function () {
                alert("Video preview failed. Please try downloading instead.");
            };
        } 
        else if (mediaItem.type === 'audio') {
            mediaUrl = `https://drive.google.com/uc?export=view&id=${mediaItem.google_id}`;
            let audioElement = document.getElementById('modalAudio');
            audioElement.src = mediaUrl;
            audioElement.style.display = 'block';

            audioElement.onerror = function () {
                alert("Audio preview not available. Try downloading instead.");
            };
        }

        document.getElementById('downloadLink').onclick = function(event) {
            event.preventDefault();
            downloadMedia(mediaItem.google_id, mediaItem.name, mediaItem.type);
        };

        document.getElementById('mediaModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modalVideo').src = "";
        document.getElementById('modalAudio').src = "";
        document.getElementById('modalImage').src = "";
        document.getElementById('mediaModal').style.display = 'none';
    }

    function prevMedia() { 
        if (currentIndex > 0) openModal(currentIndex - 1); 
    }

    function nextMedia() { 
        if (currentIndex < mediaItems.length - 1) openModal(currentIndex + 1); 
    }

    function downloadMedia(fileId, fileName, fileType) {
        let formattedFileName = fileName.replace(/\s+/g, '_') + '.' + (fileType === 'image' ? 'jpg' : fileType === 'video' ? 'mp4' : 'mp3');
        
        // Force Google Drive to download the file
        let mediaUrl = `https://drive.google.com/uc?export=download&id=${fileId}`;

        fetch(mediaUrl)
            .then(response => {
                if (!response.ok) throw new Error("Download failed. Try opening in a new tab.");
                return response.blob();
            })
            .then(blob => {
                let link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = formattedFileName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            })
            .catch(error => {
                alert("Download failed. Try opening the file manually.");
                console.error(error);
                window.open(mediaUrl, '_blank'); // Opens Google Drive download page
            });
    }
</script>
