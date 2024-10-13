<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>TESTIMONIALS</h2>
        <p>What Are They <span class="description-title">Saying About Us</span></p>
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
      "pagination": {
        "el": ".swiper-pagination",
        "type": "bullets",
        "clickable": true
      }
    }
  </script>
            <div class="swiper-wrapper">

                {{-- @if (isset($reviews)) --}}
                @forelse ($reviews as $review)
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>{{ $review->comment }}</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <h3>{{ $review->transaction->name }}</h3>
                                    <h4>{{ $review->transaction->type }}</h4>
                                    <div class="stars">
                                        @for ($i = 0; $i < $review->rate; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-center">
                                <img src="{{ asset('frontend') }}/img/testimonials/testimonials-{{ ($loop->index + 1) % 4 + 1 }}.jpg"
                                    class="img-fluid testimonial-img" alt="">
                            </div>
                        </div>
                    </div>
                </div><!-- End testimonial review -->
                @empty
                    <div class="swiper-slide">
                        <h3>No reviews found</h3>
                    </div>
                @endforelse
                {{-- @endif --}}

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section>
<!-- /Testimonials Section -->
