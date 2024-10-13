<!-- Gallery Section -->
<section id="gallery" class="gallery section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Video</h2>
        <p><span>Check</span> <span class="description-title">Our Video Gallery</span></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "centeredSlides": true,
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 1,
                            "spaceBetween": 0
                        },
                        "768": {
                            "slidesPerView": 3,
                            "spaceBetween": 20
                        },
                        "1200": {
                            "slidesPerView": 5,
                            "spaceBetween": 20
                        }
                    }
                }

            </script>
            <div class="swiper-wrapper align-items-center">
                @foreach ($videos as $video)
                <div class="swiper-slide">
                    <a class="glightbox" href="{{ asset('storage/' . $video->file) }}" data-gallery="videos-gallery"
                        data-type="video">
                        <video width="100%" controls>
                            <source src="{{ asset('storage/' . $video->file) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section><!-- /Gallery Section -->
