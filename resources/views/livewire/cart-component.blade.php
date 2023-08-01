<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>


        <div class=" main-content-area">
            @if (Cart::instance('cart')->count() > 0)

                @if (Session::has('success_message'))
                    <div class="alert alert-success">
                        <strong>Success</strong>{{ Session::get('success_message') }}

                    </div>
                @endif

                <div class="wrap-item-in-cart">
                    @if (Cart::instance('cart')->content()->count() > 0)

                        <div class="table-responsive cart_info">

                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Image</td>
                                        <td class="description">Product</td>
                                        <td class="price">Price</td>
                                        <td class="quantity">Quantity</td>
                                        <td class="total">Total</td>
                                        <td class="delete">Delete</td>
                                    </tr>





                                </thead>


                                @foreach (Cart::instance('cart')->content() as $cartItem)
                                    <tbody>
                                        <tr>
                                            <td class="cart">

                                                <div class="product-image">
                                                    <figure><img
                                                            src="{{ asset('assets/images/books') }}/{{ $cartItem->model->image }}"
                                                            alt="{{ $cartItem->name }}"
                                                            style="height: 50px; width:50px;">
                                                    </figure>
                                                </div>
                                            </td>
                                            <td class="cart_description">
                                                <a href="{{ url('/product_details') }}/{{ $cartItem->id }}">
                                                    <h4>
                                                        <div class="product-name">
                                                            <a class="link-to-product"
                                                                href="{{ route('book.details', ['slug' => $cartItem->name]) }}">{{ $cartItem->name }}</a>
                                                                @foreach ($cartItem->options as $key=>$value)
                                                                <div style="vertical-align: middle; width:100px;">
                                                                  <p><b>{{$key}}:{{$value}}</b></p>
                                                                </div>

                                                                @endforeach
                                                        </div>
                                                    </h4>
                                                    <p> ID: {{ $cartItem->id }}</p>


                                            </td>
                                            <td class="cart_price">
                                                <p>${{ $cartItem->price }}</p>
                                            </td>


                                            <td>
                                                <div class="quantity">


                                                    <div class="quantity-input">
                                                        <input type="text" name="product-quatity"
                                                            value="{{ $cartItem->qty }}" data-max="120"
                                                            pattern="[0-9]*">
                                                        <a class="btn btn-increase" href="#"
                                                            wire:click.prevent="increaseQuantity('{{ $cartItem->rowId }}')"><i
                                                                class="fa fa-plus-circle fa-x fa-secondary"></i></a>
                                                        <a class="btn btn-reduce" href="#"
                                                            wire:click.prevent="decreaseQuantity('{{ $cartItem->rowId }}')"><i
                                                                class="fa fa-minus-circle fa-x bg-secondary"></i></a>
                                                    </div>
                                                </div>
                                            </td>



                                            <td class="cart_total">
                                                <p class="cart_total_price">${{ $cartItem->subtotal }}</p>
                                            </td>
                                            <td class="cart_delete">
                                                <button class="btn btn-danger">
                                                    <a class="cart_quantity_delete text-white "
                                                        wire:click.prevent="destroy('{{ $cartItem->rowId }}')">Delete</a>
                                                </button>
                                            </td>
                                        </tr>






                                    </tbody>
                                @endforeach
                            </table>
                        @else
                            <p>No Item In Cart</p>

                    @endif
                </div>





                <div class="summary">
                    <div class="order-summary">
                        <h4 class="title-box">Order Summary</h4>
                        <p class="summary-info"><span class="title">Subtotal</span><b
                                class="index">${{ Cart::subtotal() }}</b>
                        </p>

                        @if (Session::has('coupon'))
                            <p class="summary-info"><span class="title">Discount({{ Session::get('coupon')['code'] }})
                                    <a href="#" wire:click.prevent="removeCoupon"><i
                                            class=" fa fa-times text-danger"></i></a></span><b
                                    class="index">${{ number_format($discount, 2) }}</b></p>
                            <p class="summary-info"><span class="title">Subtotal with Discount</span><b
                                    class="index">${{ number_format($subtotalAfterDiscount, 2) }}</b></p>

                            <p class="summary-info"><span class="title">Tax({{ config('cart.tax') }}%)</span><b
                                    class="index">${{ number_format($taxAfterDiscount, 2) }}</b></p>
                            <p class="summary-info"><span class="title">total with Discount</span><b
                                    class="index">${{ number_format($totalAfterDiscount, 2) }}</b></p>
                        @else
                            <p class="summary-info"><span class="title">Subtotal</span><b
                                    class="index">${{ Cart::instance('cart')->subtotal() }}</b></p>
                            <p class="summary-info"><span class="title">Tax</span><b
                                    class="index">${{ Cart::instance('cart')->tax() }}</b></p>
                            <p class="summary-info"><span class="title">Shipping</span><b class="index">Free
                                    Shipping</b>
                            </p>
                            <p class="summary-info total-info "><span class="title">Total</span><b
                                    class="index">{{ Cart::instance('cart')->total() }}</b></p>
                        @endif
                    </div>
                    <div class="checkout-info">
                        @if (!Session::has('coupon'))

                            <label class="checkbox-field">
                                <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox"
                                    wire:model="haveCouponCode">
                                <span>I have Coupon code</span>
                            </label>
                            @if ($haveCouponCode == 1)

                                <div class="summary-item">
                                    <form action="" wire:submit.prevent="applyCouponCode">
                                        <h4 class="title-box">Coupon Code</h4>
                                        @if (Session::has('coupon_message'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ Session::get('coupon_message') }}
                                            </div>
                                        @endif
                                        <p class="row-in-form">
                                            <label for="coupon-code">Enter Your Coupon Code</label>
                                            <input type="text" name="coupon-code" id=""
                                                wire:model="couponCode">
                                        </p>
                                        <button type="submit" class="btn btn-small">Apply</button>
                                    </form>
                                </div>

                            @endif
                        @endif



                        <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Check out</a>
                        <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right"
                                aria-hidden="true"></i></a>
                    </div>
                    <div class="update-clear">
                        <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping
                            Cart</a>
                        <a class="btn btn-update" href="#">Update Shopping Cart</a>
                    </div>
                </div>
            @else
                <div class="text-center" style="padding:30px 0;">
                    <h1>Your Cart Is Empty!</h1>
                    <p>Add Items To It Now</p>
                    <a href="/shop" class="btn btn-success">Shop Now</a>
                </div>
            @endif




            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Featured Books</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                        data-loop="false" data-nav="true" data-dots="false"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                   @foreach ($is_featured_books as $featured)

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">

                                    <a href="{{route('book.details',['slug'=>$featured->slug])}}" title="{{$featured->name}}">
                                        <figure><img src="{{asset('assets/images/books')}}/{{$featured->image}}"  style="height: 260px; width:800px;" alt="{{$featured->name}}"></figure>
                                    </a>

                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$featured->name}}</span></a>
                                <div class="wrap-price"><span class="product-price">${{$featured->price}}</span></div>
                            </div>
                        </div>
                        @endforeach




                    </div>
                </div>
                <!--End wrap-products-->
            </div>
        </div>








    {{-- <div class=" main-content-area">
            @if (Session::has('success_message'))
                <div class="alert alert-success">
                    <strong>Success</strong>{{ Session::get('success_message') }}

                </div>
            @endif

            <div class="wrap-item-in-cart">
                @if (Cart::instance('cart')->content()->count() > 0)

                         <div class="table-responsive cart_info">

                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Image</td>
                                        <td class="description">Product</td>
                                        <td class="price">Price</td>
                                        <td class="quantity">Quantity</td>
                                        <td class="total">Total</td>
                                        <td class="delete">Delete</td>
                                    </tr>





                                </thead>


                                @foreach (Cart::instance('cart')->content() as $cartItem)
                                    <tbody>
                                        <tr>
                                            <td class="cart">

                                                <div class="product-image">
                                                    <figure><img
                                                            src="{{ asset('assets/images/books') }}/{{ $cartItem->model->image }}"
                                                            alt="{{ $cartItem->name }}"
                                                            style="height: 50px; width:50px;">
                                                    </figure>
                                                </div>
                                            </td>
                                            <td class="cart_description">
                                                <a href="{{ url('/product_details') }}/{{ $cartItem->id }}">
                                                    <h4>
                                                        <div class="product-name">
                                                            <a class="link-to-product"
                                                                href="{{ route('book.details', ['slug' => $cartItem->name]) }}">{{ $cartItem->name }}</a>
                                                        </div>
                                                    </h4>
                                                    <p> ID: {{ $cartItem->id }}</p>


                                            </td>
                                            <td class="cart_price">
                                                <p>${{ $cartItem->price }}</p>
                                            </td>


                                            <td>
                                                <div class="quantity">
                                                    <div class="quantity-input">
                                                        <input type="text" name="product-quatity"
                                                            value="{{ $cartItem->qty }}" data-max="120"
                                                            pattern="[0-9]*">
                                                        <a class="btn btn-increase" href="#"
                                                            wire:click.prevent="increaseQuantity('{{ $cartItem->rowId }}')"><i
                                                                class="fa fa-plus-circle fa-x"></i></a>
                                                        <a class="btn btn-reduce" href="#"
                                                            wire:click.prevent="decreaseQuantity('{{ $cartItem->rowId }}')"><i
                                                                class="fa fa-minus-circle fa-x"></i></a>
                                                    </div>
                                                </div>
                                            </td>



                                            <td class="cart_total">
                                                <p class="cart_total_price">${{ $cartItem->subtotal }}</p>
                                            </td>
                                            <td class="cart_delete">
                                                <button class="btn btn-danger">
                                                    <a class="cart_quantity_delete text-white "
                                                        wire:click.prevent="destroy('{{ $cartItem->rowId }}')">Delete</a>
                                                </button>
                                            </td>
                                        </tr>






                                    </tbody>
                                @endforeach
                            </table>

                @else
                    <p>No Item In Cart</p>

                @endif
            </div>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b
                            class="index">${{ Cart::subtotal() }}</b></p>
                    <p class="summary-info"><span class="title">Tax</span><b
                            class="index">${{ Cart::tax() }}</b></p>
                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b>
                    </p>
                    <p class="summary-info total-info "><span class="title">Total</span><b
                            class="index">{{ Cart::total() }}</b></p>
                </div>
                <div class="checkout-info">
                    <label class="checkbox-field">
                        <input class="frm-input " name="have-code" id="have-code" value=""
                            type="checkbox"><span>I have promo code</span>
                    </label>
                    <a class="btn btn-checkout" href="checkout.html">Check out</a>
                    <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right"
                            aria-hidden="true"></i></a>
                </div>
                <div class="update-clear">
                    <a class="btn btn-clear" href="#">Clear Shopping Cart</a>
                    <a class="btn btn-update" href="#">Update Shopping Cart</a>
                </div>
            </div>

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Viewed Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                        data-loop="false" data-nav="true" data-dots="false"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_04.jpg" width="214"
                                            height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                        Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_17.jpg" width="214"
                                            height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                        Speaker [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_15.jpg" width="214"
                                            height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                        Speaker [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_01.jpg" width="214"
                                            height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                        Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_21.jpg" width="214"
                                            height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                        Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_03.jpg" width="214"
                                            height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                        Speaker [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_04.jpg" width="214"
                                            height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                        Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_05.jpg" width="214"
                                            height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                        Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End wrap-products-->
            </div>

        </div> --}}
    <!--end main content area-->






    </div>
    <!--end container-->

</main>
