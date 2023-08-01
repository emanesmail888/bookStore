<main id="main" class="main-site">
    <style>
        .summary-item .row-in-form input[type=password],
        .summary-item .row-in-form input[type=text],
        .summary-item .row-in-form input[type=tel] {
            font-size: 13px;
            line-height: 19px;
            display: inline-block;
            height: 43px;
            padding: 2px 20px;
            max-width: 300px;
            width: 100%;
            border: 1px solid #e6e6e6;
        }
    </style>

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form action="#" method="get" name="frm-billing" wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">

                <div class="row">
                    <div class="col-md-12">

                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Address</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input id="fname" type="text" name="fname"
                                        value=""placeholder="Your name" wire:model="firstname">
                                    @error('firstname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input id="lname" type="text" name="lname" value=""
                                        placeholder="Your last name" wire:model="lastname">
                                    @error('lastname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input id="email" type="email" name="email" value=""
                                        placeholder="Type your email" wire:model="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input id="phone" type="number" name="phone"
                                        value=""placeholder="10 digits format" wire:model="mobile">
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line1:</label>
                                    <input id="add" type="text" name="add" value=""
                                        placeholder="Street at apartment number" wire:model="line1">
                                    @error('line1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line2:</label>
                                    <input id="add" type="text" name="add"
                                        value=""placeholder="Street at apartment number" wire:model="line2">
                                    @error('line2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input id="country" type="text" name="country" value=""
                                        placeholder="United States" wire:model="country">
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="province">Province<span>*</span></label>
                                    <input id="province" type="text" name="province" value=""
                                        placeholder="United States" wire:model="province">
                                    @error('province')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>

                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input id="zip-code" type="number" name="zip-code" value=""
                                        placeholder="Your postal code" wire:model="zipcode">
                                    @error('zipcode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input id="city" type="text" name="city"
                                        value=""placeholder="City name" wire:model="city">
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form fill-wife">
                                    {{-- <label class="checkbox-field">
                                    <input name="create-account" id="create-account" value="forever" type="checkbox">
                                    <span>Create an account?</span>
                                </label>  --}}
                                    <label class="checkbox-field">
                                        <input name="different-add" id="different-add" value="1"
                                            type="checkbox" wire:model="ship_to_different">

                                        <span>Ship to a different address?</span>
                                    </label>
                                </p>
                            </div><!-- billing-address -->
                        </div>
                    </div><!-- col-md-12 -->

                    @if ($ship_to_different)
                        <div class="col-md-12">

                            <div class="wrap-address-billing">
                                <h3 class="box-title">shipping Address</h3>
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input id="fname" type="text" name="fname"
                                        value=""placeholder="Your name" wire:model="s_firstname">
                                    @error('s_firstname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input id="lname" type="text" name="lname" value=""
                                        placeholder="Your last name" wire:model="s_lastname">
                                    @error('s_lastname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input id="email" type="email" name="email" value=""
                                        placeholder="Type your email" wire:model="s_email">
                                    @error('s_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input id="phone" type="number" name="phone"
                                        value=""placeholder="10 digits format" wire:model="s_mobile">
                                    @error('s_mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line1:</label>
                                    <input id="add" type="text" name="add" value=""
                                        placeholder="Street at apartment number" wire:model="s_line1">
                                    @error('s_line1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line2:</label>
                                    <input id="add" type="text" name="add"
                                        value=""placeholder="Street at apartment number" wire:model="s_line2">
                                    @error('s_line2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input id="country" type="text" name="country" value=""
                                        placeholder="United States" wire:model="s_country">
                                    @error('s_country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="province">Province<span>*</span></label>
                                    <input id="province" type="text" name="province" value=""
                                        placeholder="United States" wire:model="s_province">
                                    @error('s_province')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>

                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input id="zip-code" type="number" name="zip-code" value=""
                                        placeholder="Your postal code" wire:model="s_zipcode">
                                    @error('s_zipcode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input id="city" type="text" name="city"
                                        value=""placeholder="City name" wire:model="s_city">
                                    @error('s_city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>

                            </div>
                        </div><!-- col-md-12 -->
                    @endif
                </div>

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method</h4>
                        @if ($paymentmode == 'card')
                            @if (Session::has('stripe_error'))
                                <div class="alert alert-danger" role="alert">{{ Session::get('stripe_error') }}
                                </div>
                            @endif

                            <div class="wrap-address-billing">
                                <p class="row-in-form">
                                    <label for="card_no">Card Number<span>*</span></label>
                                    <input id="card_no" type="text" name="card_no"
                                        value=""placeholder="Card Number" wire:model="card_no">
                                    @error('card_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </p>
                                <p class="row-in-form">
                                    <label for="exp_month">Expiry Month<span>*</span></label>
                                    <input id="exp_month" type="text" name="exp_month"
                                        value=""placeholder="MM " wire:model="exp_month">
                                    @error('exp_month')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </p>
                                <p class="row-in-form">
                                    <label for="exp_year">Expiry Year<span>*</span></label>
                                    <input id="exp_year" type="text" name="exp_year"
                                        value=""placeholder="YYYY" wire:model="exp_year">
                                    @error('exp_year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </p>
                                <p class="row-in-form">
                                    <label for="cvc">CVC<span>*</span></label>
                                    <input id="cvc" type="password" name="cvc"
                                        value=""placeholder="YYYY" wire:model="cvc">
                                    @error('cvc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </p>

                            </div>

                        @endif

                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-bank" value="cod" type="radio"
                                    wire:model="paymentmode">
                                <span>Cash On Delivery</span>
                                <span class="payment-desc">order now Pay On Delivery</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-visa" value="card" type="radio"
                                    wire:model="paymentmode">
                                <span>Card</span>
                                <span class="payment-desc">Debit /Credit Card</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-paypal" value="paypal"
                                    type="radio" wire:model="paymentmode">
                                <span>Paypal</span>
                                <span class="payment-desc">You can pay with your credit</span>
                                <span class="payment-desc">card if you don't have a paypal account</span>
                            </label>
                        </div>
                        @if (Session::has('checkout'))
                            <p class="summary-info grand-total"><span>Grand Total</span> <span
                                    class="grand-total-price">{{ Session::get('checkout')['total'] }}</span></p>
                        @endif

                        {{-- <a href="thankyou.html" class="btn btn-medium">Place order now</a> --}}


                       @if ($errors->isEmpty())
                       <div id="processing" style="font-size: 22px; margin-bottom:20px; display:none; color:green; padding-left:37px;" wire:ignore>
                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                        <span>processing ......</span>
                     </div>

                       @endif
                        <button type="submit" class="btn btn-medium">Place order Now</button>
                    </div>
                    {{-- <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Shipping method</h4>
                        <p class="summary-info"><span class="title">Flat Rate</span></p>
                        <p class="summary-info"><span class="title">Fixed $0.00</span></p>

                    </div> --}}
                </div>

            </form>


            {{-- <div class="wrap-show-advance-info-box style-1 box-in-site">
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
            </div> --}}

        </div>
        <!--end main content area-->
    </div>
    <!--end container-->

</main>
