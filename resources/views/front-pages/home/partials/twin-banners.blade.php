<section id="bannerSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bannrSecBox">
                    @if(!empty((new \App\Models\Setting())->getHrefByKey('home-banners-1')))
                        <a href="{{ (new \App\Models\Setting())->getHrefByKey('home-banners-1') }}" class="bannerBox">
                            <img src="{{ (new \App\Models\Setting())->findByKey('home-banners-1') }}" alt="img">
                        </a>
                    @endif
                    @if(!empty((new \App\Models\Setting())->getHrefByKey('home-banners-2')))
                        <a href="{{ (new \App\Models\Setting())->getHrefByKey('home-banners-2') }}" class="bannerBox">
                            <img src="{{ (new \App\Models\Setting())->findByKey('home-banners-2') }}" alt="img">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
