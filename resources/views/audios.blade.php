function openModal(index) {
            currentIndex = index;
            document.getElementById('modalVideo').src = `https://drive.google.com/file/d/${videos[index].google_id}/preview?autoplay=1`;
            document.getElementById('modalTitle').innerText = videos[index].name;

            let videoUrl = `https://drive.google.com/uc?export=download&id=${videos[index].google_id}`;
            let videoName = `${videos[index].name.replace(/\s+/g, '_')}.mp4`; 

            let downloadBtn = document.getElementById('downloadLink');
            downloadBtn.href = videoUrl;
            downloadBtn.download = videoName;

            document.getElementById('videoModal').style.display = 'flex';
        }

        function closeModal() { 
            document.getElementById('modalVideo').src = ""; 
            document.getElementById('videoModal').style.display = 'none'; 
        }

        function prevVideo() { if (currentIndex > 0) openModal(currentIndex - 1); }
        function nextVideo() { if (currentIndex < videos.length - 1) openModal(currentIndex + 1); }
    </script>

    function openModal(index) {
            currentIndex = index;
            document.getElementById('modalVideo').src = `https://drive.google.com/file/d/${videos[index].google_id}/preview?autoplay=1`;
            document.getElementById('modalTitle').innerText = videos[index].name;
            document.getElementById('modalDetails').innerHTML = `
                <div class="modal-info">
                    <p><strong>Approval Status:</strong> ${videos[index].approved == 1 ? '✅ Approved' : '❌ Not Approved'}</p>
                    <p><strong>Type:</strong> ${videos[index].type}</p>
                    <p><strong>Uploaded By:</strong> ${videos[index].first} ${videos[index].last}</p>
                    <p><strong>Email:</strong> <a href="mailto:${videos[index].email}">${videos[index].email}</a></p>
                    <p><strong>Uploaded On:</strong> ${new Date(videos[index].created_at).toLocaleDateString()}</p>
                </div>
            `;
            let videoUrl = `https://drive.google.com/uc?export=download&id=${videos[index].google_id}`;
            let videoName = `${videos[index].name.replace(/\s+/g, '_')}.mp4`; 

            let downloadBtn = document.getElementById('downloadLink');
            downloadBtn.href = videoUrl;
            downloadBtn.setAttribute('download', videoName);
            downloadBtn.addEventListener('click', function(event) {
                event.preventDefault();
                
                fetch(videoUrl)
                    .then(response => response.blob())
                    .then(blob => {
                        let link = document.createElement('a');
                        link.href = URL.createObjectURL(blob);
                        link.download = videoName;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    })
                    .catch(error => console.error('Download failed:', error));
            });

        document.getElementById('videoModal').style.display = 'flex';
        }
        ffunction closeModal() { 
            document.getElementById('modalVideo').src = ""; 
            document.getElementById('videoModal').style.display = 'none'; 
        }
        function prevVideo() { if (currentIndex > 0) openModal(currentIndex - 1); }
        function nextVideo() { if (currentIndex < videos.length - 1) openModal(currentIndex + 1); }
    </script>