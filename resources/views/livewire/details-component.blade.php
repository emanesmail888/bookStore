<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        {{-- <div class="product-gallery">
                          <ul class="slides">

                            <li data-thumb="assets/images/products/digital_18.jpg">
                                <img src="assets/images/products/digital_18.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="assets/images/products/digital_17.jpg">
                                <img src="assets/images/products/digital_17.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="assets/images/products/digital_15.jpg">
                                <img src="assets/images/products/digital_15.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="assets/images/products/digital_02.jpg">
                                <img src="assets/images/products/digital_02.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="assets/images/products/digital_08.jpg">
                                <img src="assets/images/products/digital_08.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="assets/images/products/digital_10.jpg">
                                <img src="assets/images/products/digital_10.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="assets/images/products/digital_12.jpg">
                                <img src="assets/images/products/digital_12.jpg" alt="product thumbnail" />
                            </li>

                            <li data-thumb="assets/images/products/digital_14.jpg">
                                <img src="assets/images/products/digital_14.jpg" alt="product thumbnail" />
                            </li>

                          </ul>
                        </div> --}}
                        <div class="product-thumnail ">
                                <figure><img src="{{asset('assets/images/books')}}/{{$book->image}}" style="height: 380px; width:380px;"  alt="{{$book->name}}"></figure>
                        </div>

                    </div>
                    <div class="detail-info">
                        <div class="product-rating">
                            <style>
                                .color-gray{
                                    color: #e6e6e6 !important;
                                }
                                .width-0-percent{
                                    width: 0%;
                                }
                                .width-20-percent{
                                    width: 20%;
                                }
                                .width-40-percent{
                                    width: 40%;
                                }
                                .width-60-percent{
                                    width: 60%;
                                }
                                .width-80-percent{
                                    width: 80%;
                                }
                                .width-100-percent{
                                    width: 100%;
                                }
                            </style>
                            @php
                                $avgrating=0;
                            @endphp
                            @foreach ($book->orderItems->where('rstatus',1) as $orderItem)
                            @php
                                $avgrating= $avgrating + $orderItem->review->rating;
                            @endphp
                            @endforeach

                            @for ($i=1;$i<=5;$i++)
                            @if ($i<=$avgrating)
                            <i class="fa fa-star" aria-hidden="true" ></i>
                            @else
                            <i class="fa fa-star color-gray" aria-hidden="true"></i>



                            @endif

                            @endfor
                            {{-- <i class="fa fa-star" aria-hidden="true" wire:model="rating"></i>
                            <i class="fa fa-star" aria-hidden="true"  wire:model="rating"></i>
                            <i class="fa fa-star" aria-hidden="true"  wire:model="rating"></i>
                            <i class="fa fa-star" aria-hidden="true"  wire:model="rating"></i>
                            <i class="fa fa-star" aria-hidden="true"  wire:model="rating"></i> --}}
                            <a href="#" class="count-review">{{$book->orderItems->where('rstatus',1)->count()}}review</a>
                        </div>
                        <h2 class="product-name">{{$book->name}}</h2>
                        {{-- <div class="short-desc">
                            <ul>
                                <li>7,9-inch LED-backlit, 130Gb</li>
                                <li>Dual-core A7 with quad-core graphics</li>
                                <li>FaceTime HD Camera 7.0 MP Photos</li>
                            </ul>
                        </div> --}}
                        <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{asset('assets/images/social-list.png')}}" alt=""></a>
                        </div>
                        @if($book->sale_price>0 && $sale->status==1 && $sale->sale_date> Carbon\Carbon::now())

                        <div class="wrap-price"><span class="product-price">{{$book->sale_price}}</span></div>
                        @else
                        <div class="wrap-price"><span class="product-price">{{$book->price}}</span></div>

                        @endif
                        <div class="stock-info in-stock">
                            <p class="availability">Availability: <b>{{$book->stock_status}}</b></p>
                        </div>
                        <div>
                            @foreach ($book->attributeValues->unique('attribute_id') as $av )
                            <div class="row" style="margin-top: 20px;">
                            <div class="col-xs-2">
                            </div>
                            <p></p>
                            {{$av->bookAttribute->name}}


                            <div class="col-xs-10">

                                <select name="" id="" class="form-control" style="width: 200px;" wire:model="satt.{{$av->bookAttribute->name}}">
                                 @foreach ($book->attributeValues->where('attribute_id',$av->bookAttribute->id) as $pav )
                                    <option value="{{$pav->value}}">{{$pav->value}}</option>

                                @endforeach
                            </select>
                            </div>
                            </div>

                            @endforeach
                        </div>
                        <div class="quantity mt-4" >
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" wire:model="qty" >

                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity"></a>
                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity" ></a>
                            </div>
                        </div>
                        <div class="wrap-butons">
                            @if($book->sale_price>0 && $sale->status==1 && $sale->sale_date> Carbon\Carbon::now())
                            {{-- <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$book->id}},'{{$book->name}}',{{$book->price}})">Add To Cart</a> --}}
                            <a href=""  class="btn add-to-cart" wire:click.prevent="store({{$book->id}},'{{$book->name}}',{{$book->sale_price}})">Add To Cart</a>
                             @else
                             <a href=""  class="btn add-to-cart" wire:click.prevent="store({{$book->id}},'{{$book->name}}',{{$book->price}})">Add To Cart</a>

                             @endif

                            {{-- <a href="#" class="btn add-to-cart" wire::click="store({{$book->id}},'{{$book->name}}',{{$book->price}})">Add to Cart</a> --}}
                            <div class="wrap-btn">
                                <a href="#" class="btn btn-compare">Add Compare</a>
                                <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                            </div>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">description</a>
                            <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                            <a href="#review" class="tab-control-item">Reviews</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                <p>{{$book->description}}</p>
                                {{-- <p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum eque. Est cu nibh clita. Sed an nominavi, et stituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus taria . </p>
                                <p>experian soleat maluisset per. Has eu idque similique, et blandit scriptorem tatibus mea. Vis quaeque ocurreret ea.cu bus  scripserit, modus voluptaria ex per.</p> --}}
                            </div>
                            <div class="tab-content-item " id="add_infomation">
                                <table class="shop_attributes">
                                    <tbody>
                                        @foreach ($book->attributeValues->unique('attribute_id') as $av )
                                        <tr>
                                            <th>{{$av->bookAttribute->name}}</th>
                                            <td class="product_weight">
                                                @foreach ($book->attributeValues->where('attribute_id',$av->bookAttribute->id) as $pav )
                                                {{$pav->value}}
                                                @endforeach

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-content-item " id="review">

                                <div class="wrap-review-form">

                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">{{$book->orderItems->where('rstatus',1)->count()}} review for <span> {{$book->name}}</span></h2>
                                        <ol class="commentlist">
                                            @foreach ($book->orderItems->where('rstatus',1) as $orderItem )

                                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                <div id="comment-20" class="comment_container">
                                                    <img alt="" src="{{asset('assets/images/profile')}}/{{$orderItem->order->user->profile->image}}" alt="{{$orderItem->order->user->name}}" height="80" width="80">
                                                    <div class="comment-text">
                                                        <div class="star-rating">
                                                            <span class="width-{{$orderItem->review->rating*20}}-percent">Rated <strong class="rating">{{$orderItem->review->rating}}</strong> out of 5</span>
                                                        </div>
                                                        <p class="meta">
                                                            <strong class="woocommerce-review__author">{{$orderItem->order->user->name}}</strong>
                                                            <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F y g:i A');}}</time>
                                                        </p>
                                                        <div class="description">
                                                            <p>{{$orderItem->review->comment}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach

                                        </ol>
                                    </div><!-- #comments -->

                                    {{-- <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">

                                                <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
                                                    <p class="comment-notes">
                                                        <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                                    </p>
                                                    <div class="comment-form-rating">
                                                        <span>Your rating</span>
                                                        <p class="stars">

                                                            <label for="rated-1"></label>
                                                            <input type="radio" id="rated-1" name="rating" value="1">
                                                            <label for="rated-2"></label>
                                                            <input type="radio" id="rated-2" name="rating" value="2">
                                                            <label for="rated-3"></label>
                                                            <input type="radio" id="rated-3" name="rating" value="3">
                                                            <label for="rated-4"></label>
                                                            <input type="radio" id="rated-4" name="rating" value="4">
                                                            <label for="rated-5"></label>
                                                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                                                        </p>
                                                    </div>
                                                    <p class="comment-form-author">
                                                        <label for="author">Name <span class="required">*</span></label>
                                                        <input id="author" name="author" type="text" value="">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <label for="email">Email <span class="required">*</span></label>
                                                        <input id="email" name="email" type="email" value="" >
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Your review <span class="required">*</span>
                                                        </label>
                                                        <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                                                    </p>
                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                                    </p>
                                                </form>

                                            </div><!-- .comment-respond-->
                                        </div><!-- #review_form -->
                                    </div><!-- #review_form_wrapper --> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">On Oder Over $99</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Special Offer</b>
                                        <span class="subtitle">Get a gift!</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Order Return</b>
                                        <span class="subtitle">Return within 7 days</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($popular_books as $popular_book )
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="{{route('book.details',['slug'=>$popular_book->slug])}}" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{asset('assets/images/books')}}/{{$popular_book->image}}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$popular_book->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{$popular_book->price}}</span></div>
                                    </div>
                                </div>
                            </li>

                            @endforeach



                        </ul>
                    </div>
                </div>

            </div><!--end sitebar-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >


                            @foreach ($related_books as $related_book)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('book.details',['slug'=>$related_book->slug])}}" title="{{$related_book->name}}">
                                        <figure><img src="{{asset('assets/images/books')}}/{{$related_book->image}}"style="width:900px; height:250px" alt=""></figure>
                                    </a>
                                    {{-- <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div> --}}
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>{{$related_book->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">{{$related_book->price}}</span></div>
                                </div>
                            </div>

                            @endforeach


                        </div>
                    </div><!--End wrap-products-->
                </div>
            </div>

        </div><!--end row-->

    </div><!--end container-->

</main>
