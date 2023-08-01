<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>shop</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{asset('assets/images/shop books.png')}}" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Shop</h1>

                    <div class="wrap-right">




                            <div class="sort-item orderby ">

                              <select name="orderby" class="use-chosen" wire:model="sorting" >

                                <option value="default" selected="selected">Default sorting</option>
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

                    <ul class="product-list grid-products equal-container">
                        @php
                        $witems=Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        @foreach ( $books as $book )
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem " >
                                <div class="product-thumnail ">
                                    <a href="{{route('book.details',['slug'=>$book->slug])}}" title="{{$book->name}}">
                                        <figure><img src="{{asset('assets/images/books')}}/{{$book->image}}" style="height: 240px; width:200px;"  alt="{{$book->name}}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>{{$book->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">{{$book->price}}</span></div>
                                    <a href=""  class="btn add-to-cart" wire:click.prevent="store({{$book->id}},'{{$book->name}}',{{$book->price}})">Add To Cart</a>
                                    <div class="product-wish">
                                        @if($witems->contains($book->id))
                                        <a href="#" wire:click.prevent="removeFromWishlist({{$book->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                        @else
                                        <a href="#" wire:click.prevent="addToWishlist({{$book->id}},'{{$book->name}}',{{$book->price}})"><i class="fa fa-heart "></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>

                        @endforeach





                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{$books->links()}}

                    {{-- <ul class="page-numbers">
                        <li><span class="page-number-item current" ></span></li>
                        <li><a class="page-number-item" href="#" >2</a></li>
                        <li><a class="page-number-item" href="#" >3</a></li>
                        <li><a class="page-number-item next-link" href="#" >Next</a></li>
                    </ul>
                    <p class="result-count">Showing 1-8 of 12 result</p> --}}
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">All Categories</h2>
                    <div class="widget-content">

                        <ul class="list-category">
                            @foreach ($categories as  $category)
                            <li class="category-item  {{count($category->subcategories) >0? 'has-child-cate':''}}">
                                <a href="{{route('book.category',['category_slug'=>$category->slug])}}" class="cate-link">{{$category->name}}</a>
                                @if (count($category->subcategories)>0)
                                <span class="toggle-control">+</span>
                                <ul class="sub-cate">
                                    @foreach ($category->subcategories as $scategory)
                                    <li class="category-item ">
                                        <a href="{{route('book.category',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}" class="cat-link">
                                            <i class="fa fa-caret-right"></i>{{$scategory->name}}
                                        </a>
                                    </li>

                                    @endforeach

                                </ul>

                                @endif

                            </li>

                            @endforeach


                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget filter-widget price-filter pb-5">
                    <h2 class="widget-title">Price <span class="text-info">${{$min_price}}-{{$max_price}}</span></h2>

                    <div class="widget-content">
                        <div id="slider" wire:ignore></div>

                        {{-- <p>
                            <label for="amount">Price:</label>
                            <input type="text" id="amount" readonly>
                            <button class="filter-submit">Filter</button>
                        </p> --}}
                    </div>
                </div><!-- Price-->





                <div class="widget mercado-widget widget-product ">
                    <h2 class="widget-title">Popular Books</h2>
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

        </div><!--end row-->

    </div><!--end container-->

</main>
@push('scripts')
<script type="text/javascript">
    $(function() {
        $(".chosen").chosen();
    });
    </script>
<script>
    var slider=document.getElementById('slider');
    noUiSlider.create(slider,{
        start:[1,1000],
        connect:true,
        range:{
            'min':1,
            'max':500,
        },
        pips:{
            mode:'steps',
            stepped:true,
            density:4
        }
    });
    slider.noUiSlider.on('update',function(value)
    {
        @this.set('min_price',value[0]);
        @this.set('min_price',value[1]);
    });
</script>

@endpush
