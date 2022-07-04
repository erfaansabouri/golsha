<section id="bannerSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bannrSecBox">
                    <a href="{{ (new \App\Models\Setting())->getHrefByKey('home-banners-3') }}" class="bannerBox">
                        <img src="{{ (new \App\Models\Setting())->findByKey('home-banners-3') }}" alt="img">
                    </a>
                    <a href="{{ (new \App\Models\Setting())->getHrefByKey('home-banners-4') }}" class="bannerBox">
                        <img src="{{ (new \App\Models\Setting())->findByKey('home-banners-4') }}" alt="img">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
