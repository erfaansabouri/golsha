<section id="prdctTabSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="prdctTabBox">
                    <div class="">
                        <div id="ProductNav" class="ProductNav" role="tablist">
                            <div id="ProductNavContents" class="nav">
                                <a class="ProductNav_Link active" href="#tabOne" role="tab" aria-controls="tabOne" aria-selected="true">معرفی</a>
                                <a class="ProductNav_Link" href="#tabTwo" role="tab" aria-controls="tabTwo" aria-selected="false">مشخصات محصول</a>
                                <a class="ProductNav_Link" href="#tabThre" role="tab" aria-controls="tabThre" aria-selected="false">سوالات متداول</a>
                                <a class="ProductNav_Link" href="#tabFour" role="tab" aria-controls="tabFour" aria-selected="false">نظرات</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabOne">
                            <h4>معرفی</h4>
                            <p>{!! $product->introduction !!}</p>
                        </div>
                        <div class="tab-pane" id="tabTwo">
                            <h4>مشخصات محصول</h4>
                            @if($product->attributes()->exists())
                            <ul class="prdctdInfoList">
                                @foreach($product->attributes()->get() as $attribute)
                                    <li>
                                        <span>{{ $attribute->key }}</span>
                                        <p>{{ $attribute->value }}</p>
                                    </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="tab-pane" id="tabThre">
                            <h4>سوالات متداول</h4>
                            @if($product->faqs()->exists())
                            <div id="accordion">
                                @foreach($product->faqs()->get() as $faq)
                                    <div class="card">
                                        <div class="card-header" id="heading{{$faq->id}}">
                                            <a class="cardLink btn-link" data-toggle="collapse" href="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">
                                                <div>
                                                    <h5>{{ $faq->question }}</h5>
                                                </div>
                                                <p class="expandIconBx">
                                                    <span class="material-icons-outlined">chevron_left</span>
                                                </p>
                                            </a>
                                        </div>
                                        <div id="collapse{{ $faq->id  }}" class="collapse " aria-labelledby="heading{{$faq->id}}" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="tabAcordBdy">{{ $faq->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="tab-pane" id="tabFour">
                            <div class="tabCntntHdr">
                                <h4>نظرات</h4>
                                @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                <a data-toggle="modal" data-target="#create-comment">ثبت نظر</a>
                                @else
                                    <a href="{{ route('user.auth.login.form') }}">ثبت نظر</a>
                                @endif
                                <h6 class="text-success mr-2 ml-2">
                                    @if (session('success'))
                                        {{ session('success') }}
                                    @endif
                                </h6>
                                <div class="modal fade" id="create-comment">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">ثبت نظر</h4>
                                            </div>

                                            <div class="modal-body">
                                                <form action="{{ route('products.store-comment', $product->id) }}" method="post">
                                                    @csrf
                                                    @method('post')
                                                    <div class="form-group">
                                                        <label for="title">عنوان نظر خود را وارد نمایید:</label>
                                                        <input required class="form-control" id="comment" name="title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="comment">متن نظر خود را وارد نمایید:</label>
                                                        <textarea required="required" class="form-control" rows="5" id="comment" name="body"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">ثبت</button>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="prdctTabCmnt">
                                @foreach($product->verifiedComments()->get() as $comment)
                                    <li>
                                        <div class="prdctCmntTitl">
                                            <h6>{{ $comment->title }}</h6>
                                            <span>({{ $comment->user->full_name }})</span>
                                        </div>
                                        <div class="prdctCmntTxt">
                                            {{ $comment->body }}
                                        </div>
                                        @if($comment->answer)
                                        <div class="prdctCmntRply">
                                            <span>پاسخ گلشا</span>
                                            <p>{{ $comment->answer->body }}</p>
                                        </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <a href="#" class="addToCartBtn">
                        <span class="icon-shopping_bag_black_24dp"></span>
                        <i>افزودن به سبد خرید</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
