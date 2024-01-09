<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\ReturnPolicyComponent;
use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\PrivacyPolicyComponent;
use App\Http\Livewire\TermsConditionComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminBookComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddBookComponent;
use App\Http\Livewire\Admin\AdminEditBookComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminEditCouponsComponent;
use App\Http\Livewire\Admin\AdminAddCouponsComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\User\ProfileComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminEditAttributeComponent;
use App\Http\Livewire\Admin\AdminAddAttributeComponent;
use App\Http\Livewire\Admin\AdminAttributesComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',HomeComponent::class);
Route::get('/shop',ShopComponent::class);
Route::get('/book/{slug}',DetailsComponent::class)->name('book.details');
Route::get('/book-category/{category_slug}/{scategory_slug?}',CategoryComponent::class)->name('book.category');
Route::get('/cart',CartComponent::class)->name('book.cart');
Route::put('/cart/update/{id}', CartComponent::class)->name('cart.update');
Route::get('/cart/remove/{id}', CartComponent::class)->name('cart.remove');
Route::get('/search', SearchComponent::class)->name('book.search');
Route::get('/wishlist', WishlistComponent::class)->name('book.wishlist');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');
Route::get('/contact-us', ContactComponent::class)->name('contact');
Route::get('/about-us', AboutUsComponent::class)->name('about-us');
Route::get('/terms-condition', TermsConditionComponent::class)->name('terms-condition');
Route::get('/return-policy', ReturnPolicyComponent::class)->name('return-policy');
Route::get('/privacy-policy', PrivacyPolicyComponent::class)->name('privacy-policy');
// Route::get('/change-event', ShopComponent::class);



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders',UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.orderDetails');
    Route::get('/user/review/{order_item_id}',UserReviewComponent::class)->name('user.review');
    Route::get('/user/change-password',UserChangePasswordComponent::class)->name('user.changePassword');
    Route::get('/user/profile',ProfileComponent::class)->name('user.profile');
    Route::get('/user/profile/edit',UserEditProfileComponent::class)->name('user.editProfile');

});
Route::middleware(['auth:sanctum','verified'])->group(function () {
Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addCategory');
Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
Route::get('/admin/coupons',AdminCouponsComponent::class)->name('admin.coupons');
Route::get('/admin/coupon/add',AdminAddCouponsComponent::class)->name('admin.addCoupon');
Route::get('/admin/coupon/edit/{coupon_id}',AdminEditCouponsComponent::class)->name('admin.editCoupon');
Route::get('/admin/contact-us', AdminContactComponent::class)->name('admin.contact');
Route::get('/admin/setting', AdminSettingComponent::class)->name('admin.settings');
Route::get('/admin/books',AdminBookComponent::class)->name('admin.books');
Route::get('/admin/book/add',AdminAddBookComponent::class)->name('admin.addBook');
Route::get('/admin/book/edit/{book_slug}',AdminEditBookComponent::class)->name('admin.editBook');
Route::get('/admin/category/edit/{category_slug}/{scategory_slug?}',AdminEditCategoryComponent::class)->name('admin.editCategory');
Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeSlider');
Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addHomeSlider');
Route::get('/admin/slider/edit/{slide_id}',AdminEditHomeSliderComponent::class)->name('admin.editHomeSlider');
Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homeCategories');
Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');
Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');
Route::get('/admin/orders/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderDetails');
Route::get('/admin/attributes',AdminAttributesComponent::class)->name('admin.attributes');
Route::get('/admin/attribute/add',AdminAddAttributeComponent::class)->name('admin.add_attribute');
Route::get('/admin/attribute/edit/{attribute_id}',AdminEditAttributeComponent::class)->name('admin.edit_attribute');
// Route::get('/dashboard', function () {
//              return view('dashboard');
//          })->name('dashboard');



});
Route::get('/dashboard', function () {
             return view('dashboard');
         })->name('dashboard');
