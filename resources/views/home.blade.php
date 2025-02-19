<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Home Page</title>
    @vite(['resources/css/app.css'])
    @vite(['resources/css/home.css'])
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Background Image Rotation
        const images = [
            '{{ asset('images/img1.png') }}',
            '{{ asset('images/img4.jpg') }}',
            '{{ asset('images/img3.jpg') }}'
        ];

        function changeBackgroundImage() {
            const randomIndex = Math.floor(Math.random() * images.length);
            document.querySelector('.hero-section').style.backgroundImage = `url('${images[randomIndex]}')`;
        }

        setInterval(changeBackgroundImage, 5000);
        changeBackgroundImage();

        // Sidebar Menu Toggle
        const menuIcon = document.querySelector(".menu-icon");
        const sideMenu = document.querySelector(".side-menu");
        const closeMenu = document.querySelector(".close-menu");

        // Open menu when clicking the menu icon
        menuIcon.addEventListener("click", function(event) {
            event.stopPropagation(); // Prevents click from bubbling up
            sideMenu.classList.add("active");
        });

        // Close menu when clicking the close button
        closeMenu.addEventListener("click", function() {
            sideMenu.classList.remove("active");
        });

        // Close menu when clicking outside of it
        document.addEventListener("click", function(event) {
            if (!sideMenu.contains(event.target) && !menuIcon.contains(event.target)) {
                sideMenu.classList.remove("active");
            }
        });

        const categoryDropdown = document.getElementById("categoryDropdown");
        const selectedCategory = document.getElementById("selectedCategory");
        const categoryOptions = document.getElementById("categoryOptions");
        const dropdownArrow = document.getElementById("dropdownArrow");

        // Toggle dropdown menu when clicking the category box
        categoryDropdown.addEventListener("click", function (event) {
            event.stopPropagation();
            categoryOptions.style.display = categoryOptions.style.display === "block" ? "none" : "block";
        });

        // Handle category selection
        categoryOptions.addEventListener("click", function (event) {
            if (event.target.classList.contains("dropdown-item")) {
                selectedCategory.textContent = event.target.getAttribute("data-value");
                categoryOptions.style.display = "none";
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", function (event) {
            if (!categoryDropdown.contains(event.target)) {
                categoryOptions.style.display = "none";
            }
        });

    });
</script>

</head>
<body>
    <header class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <div class="menu-icon">
            <img src="{{ asset('images/menus.png') }}" alt="Menu Icon">
        </div>
        <!-- Side Menu -->
        <div class="side-menu">
            <div class="close-menu">&times;</div>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/">Gallery</a></li>
            </ul>
        </div>

    </header>

    <section class="hero-section">
        <h1>BrickMMO Media Hub: <br> Building Smart Cities, One Innovation at a Time!</h1>
        <p class="scroll-text">Scroll for more</p>
        <div class="arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="31" viewBox="0 0 21 31" fill="none">
                <path d="M10.5013 30.375V1M10.5013 30.375C7.81706 30.375 2.80216 24.5167 0.917969 23.0313M10.5013 30.375C13.1855 30.375 18.2004 24.5167 20.0846 23.0312" stroke="#FFFBFB" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </section>

    <section class="media-section">
        <div class="overlay">
            <img src="{{ asset('images/img5.webp') }}" alt="Media Background">
        </div>
        <div class="media-content">
            <h2>Discover the Perfect Media</h2>
            <p>Search, Filter, and Find with Ease!</p>
            
            <!-- Search Bar -->
            <div class="search-bar">
                <!-- Dropdown Category -->
                <!-- Dropdown Category with Interactive Selection -->
                <div class="search-category" id="categoryDropdown">
                    <span id="selectedCategory">Select</span>
                    <svg id="dropdownArrow" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.5">
                            <path d="M3 6.75L9 12.75L15 6.75" stroke="black" stroke-width="2" stroke-linecap="square"/>
                        </g>
                    </svg>
                    <ul class="dropdown-menu" id="categoryOptions">
                        <li class="dropdown-item" data-value="Images">Images</li>
                        <li class="dropdown-item" data-value="Videos">Videos</li>
                        <li class="dropdown-item" data-value="Audios">Audios</li>
                    </ul>
                </div>

                <!-- Search Icon -->
                <div class="search-icon">
                <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.8">
                        <path d="M20.8266 2.40014C20.667 2.35073 20.667 2.14142 20.8266 2.09201L21.7639 1.8023C21.9699 1.73853 22.1571 1.63109 22.3106 1.48849C22.4642 1.34589 22.5798 1.17206 22.6484 0.980765L22.9605 0.11117C23.0137 -0.0370557 23.2392 -0.0370557 23.2924 0.11117L23.6045 0.981214C23.6732 1.17247 23.7889 1.34625 23.9425 1.48877C24.0961 1.63129 24.2834 1.73863 24.4895 1.8023L25.4262 2.09201C25.4612 2.10266 25.4916 2.1233 25.5132 2.15096C25.5348 2.17863 25.5464 2.21192 25.5464 2.24608C25.5464 2.28024 25.5348 2.31353 25.5132 2.34119C25.4916 2.36886 25.4612 2.38949 25.4262 2.40014L24.489 2.68986C24.283 2.75358 24.0958 2.86096 23.9423 3.00347C23.7888 3.14599 23.6731 3.31973 23.6045 3.51094L23.2924 4.38099C23.2809 4.41344 23.2587 4.44171 23.2289 4.46175C23.1991 4.48178 23.1632 4.49257 23.1264 4.49257C23.0896 4.49257 23.0538 4.48178 23.024 4.46175C22.9942 4.44171 22.9719 4.41344 22.9605 4.38099L22.6484 3.51094C22.5797 3.31973 22.4641 3.14599 22.3105 3.00347C22.157 2.86096 21.9699 2.75358 21.7639 2.68986L20.8266 2.40014ZM18.3594 4.13529C18.3385 4.12885 18.3202 4.11644 18.3073 4.09983C18.2944 4.08322 18.2874 4.06325 18.2874 4.04276C18.2874 4.02227 18.2944 4.0023 18.3073 3.98569C18.3202 3.96908 18.3385 3.95667 18.3594 3.95023L18.9217 3.7764C19.1723 3.6987 19.3688 3.51633 19.4525 3.28366L19.6397 2.76173C19.6467 2.74227 19.66 2.72535 19.6779 2.71335C19.6958 2.70135 19.7173 2.69489 19.7394 2.69489C19.7615 2.69489 19.783 2.70135 19.8009 2.71335C19.8188 2.72535 19.8321 2.74227 19.8391 2.76173L20.0263 3.28366C20.0675 3.39841 20.1369 3.50268 20.2291 3.58821C20.3212 3.67374 20.4335 3.73817 20.5571 3.7764L21.1194 3.95023C21.1403 3.95667 21.1586 3.96908 21.1715 3.98569C21.1844 4.0023 21.1914 4.02227 21.1914 4.04276C21.1914 4.06325 21.1844 4.08322 21.1715 4.09983C21.1586 4.11644 21.1403 4.12885 21.1194 4.13529L20.5571 4.30912C20.4335 4.34735 20.3212 4.41178 20.2291 4.49731C20.1369 4.58284 20.0675 4.68711 20.0263 4.80186L19.8391 5.32379C19.8321 5.34325 19.8188 5.36017 19.8009 5.37217C19.783 5.38417 19.7615 5.39062 19.7394 5.39062C19.7173 5.39062 19.6958 5.38417 19.6779 5.37217C19.66 5.36017 19.6467 5.34325 19.6397 5.32379L19.4525 4.80186C19.4113 4.68711 19.3419 4.58284 19.2498 4.49731C19.1576 4.41178 19.0453 4.34735 18.9217 4.30912L18.3594 4.13529ZM17.8519 0.960103C17.8381 0.955669 17.8261 0.94736 17.8177 0.936332C17.8092 0.925303 17.8047 0.912103 17.8047 0.898567C17.8047 0.885031 17.8092 0.87183 17.8177 0.860802C17.8261 0.849774 17.8381 0.841465 17.8519 0.83703L18.2264 0.721144C18.3938 0.66949 18.5249 0.547765 18.5806 0.392352L18.7054 0.0446941C18.7102 0.0319045 18.7191 0.0208137 18.731 0.0129648C18.7429 0.00511585 18.7571 0.000898369 18.7717 0.000898369C18.7863 0.000898368 18.8005 0.00511584 18.8124 0.0129648C18.8242 0.0208137 18.8332 0.0319045 18.838 0.0446941L18.9628 0.392352C18.9903 0.468941 19.0366 0.538535 19.098 0.595609C19.1595 0.652683 19.2345 0.695666 19.317 0.721144L19.6915 0.83703C19.7053 0.841464 19.7172 0.849773 19.7257 0.860802C19.7341 0.87183 19.7387 0.885031 19.7387 0.898567C19.7387 0.912103 19.7341 0.925303 19.7257 0.936332C19.7172 0.94736 19.7053 0.955669 19.6915 0.960103L19.317 1.07599C19.2345 1.10147 19.1595 1.14445 19.098 1.20152C19.0366 1.2586 18.9903 1.32819 18.9628 1.40478L18.838 1.75199C18.8332 1.76478 18.8242 1.77587 18.8124 1.78372C18.8005 1.79157 18.7863 1.79579 18.7717 1.79579C18.7571 1.79579 18.7429 1.79157 18.731 1.78372C18.7191 1.77587 18.7102 1.76478 18.7054 1.75199L18.5806 1.40433C18.5249 1.24892 18.3938 1.12719 18.2264 1.07554L17.8519 0.960103Z" fill="white"/>
                        <path d="M22.4881 20.7996L17.3108 15.83C18.5573 14.2372 19.2302 12.2985 19.2279 10.3064C19.2279 5.21794 14.915 1.07812 9.61394 1.07812C4.31285 1.07812 0 5.21794 0 10.3064C0 15.3948 4.31285 19.5346 9.61394 19.5346C11.6893 19.5368 13.7091 18.8909 15.3684 17.6944L20.5457 22.664C20.8078 22.8889 21.1496 23.0089 21.501 22.9995C21.8524 22.99 22.1867 22.8518 22.4352 22.6132C22.6838 22.3747 22.8278 22.0538 22.8376 21.7165C22.8474 21.3792 22.7224 21.0511 22.4881 20.7996ZM2.74684 10.3064C2.74684 9.00266 3.14959 7.72824 3.90416 6.64426C4.65872 5.56028 5.73122 4.71542 6.98601 4.21652C8.24081 3.71762 9.62156 3.58708 10.9536 3.84142C12.2857 4.09576 13.5093 4.72354 14.4697 5.64539C15.4301 6.56725 16.0841 7.74176 16.3491 9.0204C16.6141 10.299 16.4781 11.6244 15.9583 12.8288C15.4386 14.0333 14.5584 15.0628 13.4291 15.7871C12.2998 16.5114 10.9721 16.8979 9.61394 16.8979C7.79334 16.8959 6.04794 16.2007 4.76058 14.965C3.47322 13.7293 2.74902 12.0539 2.74684 10.3064Z" fill="#8E8181"/>
                    </g>
                </svg>
                </div>

                <!-- Search Input -->
                <select name="tag" id="tagDropdown" class="search-category">
                    <option value="">Select Category</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                <button class="search-button">Search</button>
                <!-- Search Button -->
            </div>
        </div>
    </section>
<section class="about-section">
        <div class="overlay">
            <img src="{{ asset('images/img6.png') }}" alt="About Us Background">
        </div>
        <div class="about-content">
            <h2>EXPLORE & DOWNLOAD,<br>INSPIRE & CONNECT</h2>
            <p>Welcome to BrickMMO Media Hub, your go-to platform <br> for accessing high-quality media related to the <br> BrickMMO project. Our mission is to provide an extensive <br> library of images, videos, and audio that showcase the <br> creativity and impact of BrickMMO participants and <br>organizations. Explore, download, and share these <br> moments to inspire and connect with the community!</p>
            <a href="{{ url('/about') }}" style="text-decoration: none; color: inherit;">
                <div class="about-button">
                    <div class="about">About us</div>
                </div>
            </a>
                        
        </div>
    </section>
    <section class="explore-section">
        <div class="explore-container">
        <img src="{{ asset('images/img7.jpg') }}" alt="Explore Content Background">
            <div class="explore-content">
                <h2>EXPLORE THE <br>CONTENT</h2>
                <div class="explore-options">
                    <div class="explore-item">Images</div>
                    <div class="explore-item">Videos</div>
                    <div class="explore-item">Audios</div>
                </div>
            </div>
        </div>
    </section>
    <section class="discover-section">
        <div class="discover-container">
            <img src="{{ asset('images/img8.jpg') }}" alt="Discover Top Picks Background" class="discover-background">
            <div class="discover-content">
                <h2>DISCOVER<br>TOP PICKS</h2>
                <p>Explore our curated collection of top-rated images, videos, and audios designed to spark your creativity.</p>
                <div class="discover-button">More</div>
            </div>
        </div>
    </section>
    <section class="contact-section">
        <div class="contact-container">
            <h2>Like to know more?</h2>
            <p class="email">thomasadam83@hotmail.com</p>
            <div class="contact-details">
                <p class="contact-title">Humber College</p>
                <p class="contact-info">North Campus, Toronto, M8V 1K8</p>
            </div>
        </div>
    </section>
    <footer class="footer-section">
        <div class="footer-container">
        <img src="{{ asset('images/logo.png') }}" alt="Footer Logo" class="footer-logo">
            <nav class="footer-nav">
                <a href="#" class="footer-link">Home</a>
                <a href="/about" class="footer-link">About</a>
                <a href="#" class="footer-link">Gallery</a>
                <a href="#" class="footer-link">Contact</a>
            </nav>
            <div class="footer-copy">© 2025 BrickMMO</div>
        </div>
    </footer>
</body>
</html>
