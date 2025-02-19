document.addEventListener("DOMContentLoaded", function() {
    const imageURL = 'http://127.0.0.1:8000/images/img1.png';  // Directly use the image URL

    // Apply background image immediately on load
    document.querySelector('.hero-section').style.backgroundImage = `url('${imageURL}')`;
});
