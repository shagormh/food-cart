@extends('layouts.app')

@section("content")
<main>

    <section class="swiper-container js-swiper-slider slideshow" data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true,
        "navigation": {
          "nextEl": ".swiper-button-next",
          "prevEl": ".swiper-button-prev"
        }
      }'>
        <div class="swiper-wrapper">
          @foreach ($sliders as $slider)
          <div class="swiper-slide position-relative w-100">
            <div class="position-relative w-100" style="height: 100vh; background-color: #000;">
              <!-- Dark Overlay -->
              <div class="position-absolute w-100 h-100" style="background: rgba(0,0,0,0.3); z-index: 1;"></div>

              <!-- Background Image -->
              <img
                loading="lazy"
                src="{{ asset('uploads/sliders') }}/{{ $slider->image }}"
                alt="Iftar Party Banner"
                class="w-100 h-100"
                style="object-fit: cover; object-position: center;"
              />

              <!-- Content Container -->
              <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3 w-100" style="z-index: 2;">
                <!-- Tagline -->
                <div class="animate animate_fade animate_btt animate_delay-3">
                  <h6 class="text-uppercase fs-5 fw-light mb-2" style="color: #f5d393; letter-spacing: 3px;">
                    {{ $slider->tagline }}
                  </h6>
                </div>

                <!-- Main Title -->
                <div class="animate animate_fade animate_btt animate_delay-4">
                  <h1 class="display-2 fw-bold my-4" style="font-family: 'Playfair Display', serif;color: #fafaf9; text-shadow: 1px 1px 4px rgb(10, 10, 10);">
                    {{ $slider->title }}
                  </h1>
                </div>

                <!-- Subtitle -->
                <div class="animate animate_fade animate_btt animate_delay-5">
                  <p class="fs-3 mb-0" style="font-family: 'Poppins', sans-serif; max-width: 700px; margin: 0 auto;">
                    {{ $slider->subtitle }}
                  </p>
                </div>
              </div>

              <!-- Event Details -->
              <div class="position-absolute bottom-0 start-0 w-100 text-center pb-5" style="z-index: 2;">
                <div class="d-flex justify-content-center align-items-center mb-3">
                  <div style="width: 50px; height: 1px; background: #f5d393;"></div>
                  <i class="bi bi-moon-stars-fill mx-3" style="color: #f5d393; font-size: 1.2rem;"></i>
                  <div style="width: 50px; height: 1px; background: #f5d393;"></div>
                </div>


              </div>
            </div>
          </div>
          @endforeach
        </div>

        <!-- Navigation Arrows -->
        <div class="swiper-button-next" style="color: #f5d393; right: 30px; width: 50px; height: 50px;"></div>
        <div class="swiper-button-prev" style="color: #f5d393; left: 30px; width: 50px; height: 50px;"></div>
    </section>
      {{-- ===================================== --}}


      <div class="container mw-1620 bg-white border-radius-10">
      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
      <section class="category-carousel container">
        <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">You Might Like</h2>

        <div class="position-relative">
          <div class="swiper-container js-swiper-slider" data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 8,
              "slidesPerGroup": 1,
              "effect": "none",
              "loop": true,
              "navigation": {
                "nextEl": ".products-carousel__next-1",
                "prevEl": ".products-carousel__prev-1"
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 15
                },
                "768": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 4,
                  "spaceBetween": 30
                },
                "992": {
                  "slidesPerView": 6,
                  "slidesPerGroup": 1,
                  "spaceBetween": 45,
                  "pagination": false
                },
                "1200": {
                  "slidesPerView": 8,
                  "slidesPerGroup": 1,
                  "spaceBetween": 60,
                  "pagination": false

                }
              }
            }'>
            <div class="swiper-wrapper">
            @foreach ($categories as $category)
              <div class="swiper-slide">
                <img loading="lazy" class="w-100 h-auto mb-3" src="{{ asset('uploads/categories') }}/{{ $category->image }}" width="124" height="124" alt="{{ $category->name }}" />
                <div class="text-center">


                <a href="{{ route('home.shop') }}?categories={{ $category->id }}" class="d-block text-center text-decoration-none">
                    {{ $category->name }}
                </a>



                </div>
              </div>
            @endforeach
            </div><!-- /.swiper-wrapper -->
          </div><!-- /.swiper-container js-swiper-slider -->

          <div
            class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_prev_md" />
            </svg>
          </div><!-- /.products-carousel__prev -->
          <div
            class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_next_md" />
            </svg>
          </div><!-- /.products-carousel__next -->
        </div><!-- /.position-relative -->
      </section>

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>


      <section class="hot-deals container">
        <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Hot Deals</h2>
        <div class="row">
            <div class="col-12">
                <div class="position-relative">
                    <div class="swiper-container js-swiper-slider" data-settings='{
                        "autoplay": {
                          "delay": 5000
                        },
                        "slidesPerView": 4,
                        "slidesPerGroup": 4,
                        "effect": "none",
                        "loop": false,
                        "breakpoints": {
                          "320": {
                            "slidesPerView": 2,
                            "slidesPerGroup": 2,
                            "spaceBetween": 14
                          },
                          "768": {
                            "slidesPerView": 2,
                            "slidesPerGroup": 3,
                            "spaceBetween": 24
                          },
                          "992": {
                            "slidesPerView": 3,
                            "slidesPerGroup": 1,
                            "spaceBetween": 30,
                            "pagination": false
                          },
                          "1200": {
                            "slidesPerView": 4,
                            "slidesPerGroup": 1,
                            "spaceBetween": 30,
                            "pagination": false
                          }
                        }
                      }'>
                        <div class="swiper-wrapper">
                            @foreach ($products as $sproduct)
                                <div class="swiper-slide product-card product-card_style3">
                                    <div class="pc__img-wrapper">
                                        <a href="{{ route('home.shop.details', $sproduct->slug) }}">
                                            <img loading="lazy" src="{{ asset('uploads/products') }}/{{ $sproduct->image }}" width="258" height="313" alt="{{ $sproduct->name }}" class="pc__img">
                                        </a>
                                    </div>
                                    <div class="pc__info position-relative">
                                        <h6 class="pc__title"><a href="{{ route('home.shop.details', $sproduct->slug) }}">{{ $sproduct->name }}</a></h6>
                                        <div class="product-card__price d-flex">
                                            <span class="money price text-secondary">
                                                @if($sproduct->sale_price)
                                                    <s>tk{{ $sproduct->regular_price }}</s> tk{{ $sproduct->sale_price }}
                                                @else
                                                    tk{{ $sproduct->regular_price }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- /.swiper-wrapper -->
                    </div><!-- /.swiper-container -->
                </div><!-- /.position-relative -->
            </div><!-- /.col-12 -->
        </div><!-- /.row -->
    </section>


      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

      <section class="products-grid container">
        <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Featured Products</h2>

        <div class="row">
        @foreach ($feature_products as $feature_product)
          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="{{ route('home.shop.details',$feature_product->slug) }}">
                  <img loading="lazy" src="{{ asset('uploads/products') }}/{{ $feature_product->image }}" width="330" height="400"
                    alt="{{ $feature_product->name }}" class="pc__img">
                </a>
              </div>

              <div class="pc__info position-relative">
                <h6 class="pc__title"><a href="{{ route('home.shop.details',$feature_product->slug) }}">{{ $feature_product->name }}</a></h6>
                <div class="product-card__price d-flex align-items-center">
                  <span class="money price text-secondary">
                    @if($feature_product->sale_price)
                        <s>tk{{ $feature_product->regular_price }}</s>tk{{ $feature_product->sale_price }}
                    @else
                        tk{{ $feature_product->regular_price }}
                    @endif
                  </span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div><!-- /.row -->

        <div class="text-center mt-2">
          <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="{{ route('home.shop') }}">Load More</a>
        </div>
      </section>
    </div>

    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

  </main>
@endsection
