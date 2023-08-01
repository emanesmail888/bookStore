<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Coupon;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class CartComponent extends Component
{
    public $qty;
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $totalAfterDiscount;
    public $taxAfterDiscount;
    public $satt;
    public function render()
    {
        if(Session()->has('coupon')){
            if(Cart::instance('cart')->subtotal()< Session()->get('coupon')['cart_value'])
            {
              Session()->forget('coupon');

            }
            else{
                $this->calculateDiscounts();

            }

    }
    $this->setAmountForCheckout();
    $is_featured_books=Book::where('featured',1)->inRandomOrder()->get()->take(8);

    return view('livewire.cart-component',['is_featured_books'=>$is_featured_books])->layout('layouts.master');


}



public function destroy($id){
    Cart::instance('cart')->remove($id);
    $this->emitTo('cart-count-component','refreshComponent');

    // echo $id;
    return back();
}
public function destroyAll(){
    Cart::instance('cart')->destroy();
    $this->emitTo('cart-count-component','refreshComponent');

    // echo $id;
    return back();
}


public function increaseQuantity($rowId){
    $cart=Cart::instance('cart')->get($rowId);
    $qty=$cart->qty+1;
    Cart::update($rowId,$qty);
    $this->emitTo('cart-count-component','refreshComponent');


}
public function decreaseQuantity($rowId){
    $cart=Cart::instance('cart')->get($rowId);
    $qty=$cart->qty-1;
    Cart::update($rowId,$qty);
    $this->emitTo('cart-count-component','refreshComponent');


}



public function update($rowId)

{
  Cart::instance('cart')->update($rowId, $this->qty);
  $this->emitTo('cart-count-component','refreshComponent');
   return back()->with('success', 'Item quantity updated in your cart');



}

public function applyCouponCode(){
    $coupon=Coupon::where('code',$this->couponCode)->where('expiry_date','>',Carbon::today())->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
    if(!$coupon){
        Session()->flash('coupon_message','Coupon Code Is Invalid!');
        return;
    }
    Session()->put('coupon',[
        'code'=>$coupon->code,
        'type'=>$coupon->type,
        'value'=>$coupon->value,
        'cart_value'=>$coupon->cart_value,
    ]);
}


public function calculateDiscounts(){
    if(Session()->has('coupon')){
        if(Session()->get('coupon')['type']=='fixed')
        {
            $this->discount=Session()->get('coupon')['value'];

        }
        else{
            $this->discount=(Cart::instance('cart')->subtotal()* Session()->get('coupon')['value'])/100;

        }
        $this->subtotalAfterDiscount=(Cart::instance('cart')->subtotal() - $this->discount);
        $this->taxAfterDiscount=($this->subtotalAfterDiscount * config('cart.tax'))/100;
        $this->totalAfterDiscount=$this->subtotalAfterDiscount + $this->taxAfterDiscount;


    }
}
public function removeCoupon(){
    Session()->forget('coupon');
}

public function checkout(){
    if(Auth::check())
    {
        return redirect()->route('checkout');
    }
    else{
        return redirect()->route('login');
    }
}
public function setAmountForCheckout(){
    if(Session()->has('coupon'))
    {
        Session()->put('checkout',[
            'discount'=>$this->discount,
            'subtotal'=>$this->subtotalAfterDiscount,
            'tax'=>$this->taxAfterDiscount,
            'total'=>$this->totalAfterDiscount,
        ]);
    }
    else{
        Session()->put('checkout',[
            'discount'=>0,
            'subtotal'=>Cart::instance('cart')->subtotal(),
            'tax'=>Cart::instance('cart')->tax(),
            'total'=>Cart::instance('cart')->total(),
        ]);

    }

    if(!Cart::instance('cart')->count() >0)
    {
        Session()->forget('checkout');
        return;

    }
}



}
