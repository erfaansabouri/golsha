<section id="bannerSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bannrSecBox">
                    @if(!empty((new \App\Models\Setting())->getHrefByKey('home-banners-3')))
                        <a href="{{ (new \App\Models\Setting())->getHrefByKey('home-banners-3') }}" class="bannerBox">
                            <img src="{{ (new \App\Models\Setting())->findByKey('home-banners-3') }}" alt="img">
                        </a>
                    @endif
                    @if(!empty((new \App\Models\Setting())->getHrefByKey('home-banners-4')))
                    <a href="{{ (new \App\Models\Setting())->getHrefByKey('home-banners-4') }}" class="bannerBox">
                        <img src="{{ (new \App\Models\Setting())->findByKey('home-banners-4') }}" alt="img">
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
