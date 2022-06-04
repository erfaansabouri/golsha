<section id="bannerSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bannrSecBox">
                    @foreach($twoRandomProducts as $product)
                        <a href="#" class="bannerBox">
                            <img src="{{ $product->first_image_path }}" alt="img">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
