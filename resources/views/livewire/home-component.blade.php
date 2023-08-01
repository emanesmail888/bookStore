<main id="main">
    <div class="container">

        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                @foreach ($sliders as $slide)

                <div class="item-slide">
                    <img src="{{asset('assets/images/sliders')}}/{{$slide->image}}" style="height:500px;" alt="" class="img-slide">
                    <div class="slide-info slide-1 ">
                        <h2 class="f-title" >{{$slide->title}}</h2>
                        <span class="subtitle">{{$slide->subtitle}}.</span>
                        <p class="sale-info">Only price: <span class="price">{{$slide->price}}</span></p>
                        <a href="{{$slide->link}}" class="btn-link">Shop Now</a>
                    </div>
                </div>
                @endforeach



            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{asset('assets/images/book bbaner.jpg')}}" alt="" width="580" style="height:200px;"></figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{asset('assets/images/people reading.jpeg')}}" alt="" width="580" style="height:200px;" ></figure>
                </a>
            </div>
        </div>

        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">On Sale</h3>
            <?php use Carbon\Carbon; ?>

            @if($sbooks->count()>0 && $sale->status==1 && $sale->sale_date > Carbon::now())

            <div class="wrap-countdown mercado-countdown" data-expire="{{Carbon::parse( $sale->sale_date)->format('Y/m/d ')}}"></div>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                 @foreach ($sbooks as $sbook)


                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{route('book.details',['slug'=>$sbook->slug])}}" title="{{$sbook->name}}">
                            <figure><img src="{{asset('assets/images/books')}}/{{$sbook->image}}"  style="height: 240px; width:800px;" alt="{{$sbook->name}}"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label">sale</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>{{$sbook->name}}</span></a>
                        <div class="wrap-price"><span class="product-price">{{$sbook->price}}</span></div>
                    </div>
                </div>
                @endforeach
                @endif




            </div>
        </div>

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Latest Books</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{asset('assets/images/2022-best-books-2.jpg')}}" width="1170" style="height:350px ;" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                             @foreach ( $lbooks as $lbook )
                             <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('book.details',['slug'=>$lbook->slug])}}" title="{{$lbook->name}}">
                                        <figure><img src="{{asset('assets/images/books')}}/{{$lbook->image}}"  style="height: 240px; width:200px;" alt="{{$lbook->name}}"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>{{$lbook->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">{{$lbook->price}}</span></div>
                                </div>
                            </div>

                             @endforeach





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Book Categories</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{asset('assets/images/books categories.jpg')}}" width="1170"  style="height:300px" alt=""></figure>
                </a>
            </div>


            <div class="wrap-products ">
                <div class="wrap-product-tab tab-style-1" >
                    <div class="tab-control">
                        @foreach ($categories as $key=>$category )

                        <a href="#category_{{$category->id}}" class=" tab-control-item {{$key==0 ? 'active':''}}">{{$category->name}}</a>
                        @endforeach

                    </div><!--tab-control  -->
                    <div class="tab-contents">
                        @foreach ($categories as $key=>$category )

                        <div class="tab-content-item active" id="category_{{$category->id}}">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                              @php
                              $c_books=DB::table('books')->where('category_id',$category->id)->get()->take($no_of_books);

                               @endphp
                               @foreach ($c_books as $c_book )

                                <div class="product product-style-2 equal-elem ">

                                    <div class="product-thumnail">
                                        <a href="{{route('book.details',['slug'=>$c_book->slug])}}" title="{{$c_book->name}}">
                                            <figure><img src="{{asset('assets/images/books')}}/{{$c_book->image}}"  style="height: 240px; width:200px;" alt="{{$c_book->name}}"></figure>
                                        </a>

                                    </div>

                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$c_book->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{$c_book->price}}</span></div>
                                    </div>

                                </div>
                                @endforeach








                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div><!-- wrap-products -->


        </div>

    </div>

</main>
