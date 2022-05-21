<div>
    <section id="frqntlyQuSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="frqntlyQuTtl">
                        <h1>سوالات متداول</h1>
                        <p>سوالی دارید؟ با جستجو موضوع سوال خود، یا با کمک دسته بندی های زیر به راحتی پاسختان را پیدا کنید</p>
                    </div>
                    <div class="frqntlyQuSrch">
                        <button><span class="icon-search_black_24dp"></span></button>
                        <input wire:model.lazy="searchText" type="text" placeholder="سوال خود را جستجو کنید">
                    </div>
                    <div class="frqntlyQuBox">
                        <div class="tabSection">
                            <div class="ProductNav_Wrapper">
                                <nav id="ProductNav" class="ProductNav dragscroll mouse-scroll" role="tablist">
                                    <div id="ProductNavContents" class="nav ProductNav_Contents">
                                        @foreach($faqCategories as $faqCategory)
                                            <a wire:key="{{ rand().$faqCategory->id }}" class="ProductNav_Link" id="profile-tab" data-toggle="tab" href="#faqCategory{{ $faqCategory->id }}" role="tab" aria-controls="faqCategory{{ $faqCategory->id }}" aria-selected="false" >{{ $faqCategory->title }}</a>
                                        @endforeach
                                      <span id="Indicator" class="ProductNav_Indicator"></span>
                                    </div>
                                </nav>
                                <button id="AdvancerLeft" class="Advancer Advancer_Left" type="button">
                                    <svg class="Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z"/></svg>
                                </button>
                                <button id="AdvancerRight" class="Advancer Advancer_Right" type="button">
                                    <svg class="Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z"/></svg>
                                </button>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                @foreach($faqCategories as $faqCategory)
                                    <div class="tab-pane fade" id="faqCategory{{ $faqCategory->id }}" role="tabpanel" aria-labelledby="tabTwo-tab">
                                        <div class="frqntlyQus">
                                            @foreach($faqCategory->faqs()->where('question', 'like', '%'.@$searchText.'%')->get() ?? [] as $faq)
                                                <div wire:key="{{ rand().$faq->id }}" id="tab-faq-{{ $faq->id }}" class="frqntlyQusCrd">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <a class="card-link cardLink collapsed" data-toggle="collapse" href="#faq-collapse-{{ $faq->id }}">
                                                                <h3>{{ $faq->question }}</h3>
                                                                <span class="material-icons-outlined">chevron_left</span>
                                                            </a>
                                                        </div>
                                                        <div id="faq-collapse-{{ $faq->id }}" class="collapse" data-parent="#tab-faq-{{ $faq->id }}">
                                                            <div class="card-body">
                                                                <p>
                                                                    {{ $faq->answer }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <div class="qNotFoundBox">
                        <div class="qNotFondTxt">پاسخ خود را پیدا نکردید؟ از طریق کادر زیر با مشاورین گلشا تماس بگیرید</div>
                        @include('front-pages.partials.socials')
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
