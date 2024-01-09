<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>wishlist</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{asset('assets/images/wishlist.png')}}" class="w-100" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Wishlist</h1>

                    <div class="wrap-right">




                        <div class="sort-item orderby " >


                            <select name="sorting" class="use-chosen"  wire:model="sorting" >

                                <option value="default"   >Default sorting</option>
                                <option value="date" >Sort by newness</option>
                                <option value="price"  >Sort by price: low to high</option>
                                <option value="price-desc" >Sort by price: high to low</option>
                            </select>
                    </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model="pageSize">
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="18">18 per page</option>
                                <option value="21">21 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 per page</option>
                                <option value="32">32 per page</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div><!--end wrap shop control-->


                <style>
                    .product-wish{
                        position: absolute;
                        top: 10%;
                        left: 0;
                        z-index: 99;
                        right: 30px;
                        text-align: right;
                        padding-top: 0;

                    }
                    .product-wish .fa{
                        color: #cbcbcb;
                        font-size: 33px;
                    }
                    .product-wish .fa:hover{
                        color:#ff7007;
                    }
                    .fill-heart{
                        color: #ff7007 !important;
                    }

                </style>

                <div class="row">
                    @if (Cart::instance('wishlist')->content()->count()>0)


                    <ul class="product-list grid-products equal-container">
                        @foreach ( Cart::instance('wishlist')->content() as $item )


                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem " >
                                <div class="product-thumnail ">
                                    <a href="{{route('book.details',['slug'=>$item->model->slug])}}" title="{{$item->name}}">
                                        <figure><img src="{{asset('assets/images/books')}}/{{$item->model->image}}" style="height: 240px; width:200px;"  alt="{{$item->name}}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>{{$item->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">{{$item->price}}</span></div>
                                    <a href=""  class="btn add-to-cart" wire:click.prevent="moveBookFromWishlistToCart('{{$item->rowId}}')">Add To Cart</a>
                                    <div class="product-wish">
                                        <a href="#" wire:click.prevent="removeFromWishlist({{$item->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        @endforeach





                    </ul>
                    @else
                    <h4>No Item In WhishList</h4>


                    @endif


                </div>

                <div class="wrap-pagination-info">
                    {{-- {{$books->links()}} --}}


                </div>
            </div><!--end main products area-->
        </div>
    </div>
</main>
