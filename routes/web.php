 <?php

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
Route::resource('cart', 'Admin\\CartController');
Route::get('/cart','Admin\\CartController@index')->name('cart.index');
Route::Post('/cart/pro','Admin\\CartController@store')->name('cart.store');


route::get('/fproduct/{id}','Frontend\\ProductDisplayController@show')->name('product');

route::get('/account',function(){
  return view('Frontend.account');
})->name('account');


route::get('/productlist/{id}',function(){
  return view('Frontend.productlist');
})->name('productlist');
///cart //////////////////////////////////////////
 
///checkout and order///////////////////////////////////
route::get('checkout',function(){
    return view('Frontend.checkout');
});

Route::post('/submit-checkout','CheckOutcontroller@submitcheckout');
// Route::get('/checkout','ApplyCouponController@Finaldiscount');

 // Route::post('/submit-order','OrdersControllers@order');
 //    Route::get('/cod','OrdersControllers@cod');
 //    Route::get('/paypal','OrdersControllers@paypal');
Route::get('/order-review','OrdersControllers@index');
Route::POST('/order-review','OrdersControllers@store')->name('order.store');

//////////////////////////////////////////////////
///accpunt information////////////////////////////
// Route::get('/myaccount','Admin\\UsersController@account');

// Route::get('/orderinfo',function(){
//   return view('Frontend.orderinfo');
// });

//update user infromation//
Route::put('/account/{id?}','Admin\\UserController@updateprofile')->name('uppro');
Route::put('/account/Changepass/{id}','Admin\\UserController@updatepassword')->name('uppass');
////////////////////////////////////////////////////////////////////

/////////order info/////////////////////////////////////////////
Route::get('account/orderinfo','OrderInfoController@index')->name('orderinfo');
////////////////////////////////////////////////////////////////
///////contact us /////////////////////////////////////////////
Route::get('account/contact-us','ContactusController@index')->name('cus');
Route::POST('account/contact-us/ticket','ContactusController@store')->name('cstore');

//ajax call//
route::get('productCat','Admin\\productController@ProCat');
route::get('productprice','Admin\\productController@ProPrice');

///////////Coupon procedure////////////////////////////////////
Route::post('/cart','ApplyCouponController@store')->name('Coupon');
Route::delete('/cart','ApplyCouponController@destroy')->name('Coupon.destroy');
Auth::routes();

// Route::post('login','HomeController@index')->name('frontend.login');
// /route::group('/home',function(){
 route::get('/',function(){
  return view('welcome');

   })->name('welcome');

 route::get('/home','Frontend\\Frontendshow@show')->name('home');
 // route::get('/home',function(){
 //  return view('home');
 // });
 route::get('newsletter','Frontend\\NewsLetterController@index')->name('newsletter');
    
 
  route::group(['middleware'=>'web'],function(){
   
    // Route::get('/home', 'HomeController@index')->name('home');

 });




 
Route::put('configuration','configurationcontroller@store');
Route::group(['middleware' => ['auth','admin']], function () 
 {
Route::get('admin',function(){
        return view('content');
	});
// route::get('/home',function(){
//    return view('home');
// });
  Route::get('admin/user/config',function()
	{
 		return view('content2');
 	});
  Route::resource('admin/user', 'Admin\\UserController');
  Route::resource('admin/banners', 'Admin\\bannersController');
	Route::resource('admin/categories', 'Admin\\categoriesController');
  Route::resource('admin/product', 'Admin\\productController');
  Route::resource('admin/coupons', 'Admin\\CouponController');
  Route::resource('admin/ManageOrders','Admin\\ManageOrderController');
  
  Route::post('admin/product/{product?}/images','Admin\\ProductImagesController@store')->name('image');
  Route::get('admin/product/{product?}/images','Admin\\ProductImagesController@create')->name('images');
  Route::delete('admin/product/{product?}/images','Admin\\ProductImagesController@delete')->name('delete'); 
  Route::resource('admin/product/product_attribute','Admin\\ProductAtrrController');
  Route::get('delete-attribute/{id}','ProductAtrrController@deleteAttr');
    


 });

