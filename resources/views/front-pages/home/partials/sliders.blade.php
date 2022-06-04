<section id="topSliderSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="topSliderBox">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($sliders as $slider)
                                <div class="swiper-slide">
                                    <a href="{{ $slider->href }}"><img src="{{ $slider->image_path }}" /></a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
