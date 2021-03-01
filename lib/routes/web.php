<?php
 
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
//backend view
Route::get('/admin/401',function(){
    return view('backend/401');
});
Route::get('/admin/404',function(){
    return view('backend/404');
});
Route::get('/admin/500',function(){
    return view('backend/500');
});

//

//frontend view
Route::get('/huong-dan-mua-hang',function(){
    return view('frontend/huong-dan-mua-hang');
});
Route::get('/huong-dan-giao-hang',function(){
    return view('frontend/huong-dan-giao-hang');
});
Route::get('/policy',function(){
    return view('frontend/policy');
});
Route::get('/chinh-sach-bao-mat',function(){
    return view('frontend/chinh-sach-bao-mat');
});
Route::get('/dieu-khoan-dich-vu',function(){
    return view('frontend/dieu-khoan-dich-vu');
});
Route::get('/gioi-thieu',function(){
    return view('frontend/gioi-thieu');
});

Route::get('/portfolio',function(){
    return view('frontend/portfolio');
});
Route::get('/faq',function(){
    return view('frontend/faq');
});
Route::get('/contact',function(){
    return view('frontend/contact');
});
Route::get('/blogdetails',function(){
    return view('frontend/blog-details');
});
Route::get('/blogfullwidth',function(){
    return view('frontend/blog-fullwidth');
});
Route::get('/blogsidebar',function(){
    return view('frontend/blog-sidebar');
});
Route::get('/about2',function(){
    return view('frontend/about2');
});
Route::get('/errors',function(){
    return view('frontend/404');
});
Route::get('/myaccount',function(){
    return view('frontend/my-account');
});
Route::get('/login1',function(){
    return view('frontend/login');
});
Route::get('checkout',[
    'uses'=>'FrontendController@getcheckout',
    'as'=>'checkout'
]);
Route::get('shopone',[
    'uses'=>'FrontendController@shop',
    'as'=>'shop'
]);
Route::get('blog',[
    'uses'=>'FrontendController@blog',
    'as'=>'blog'
]);
Route::get('chi-tiet/blog/{id}',[
    'uses'=>'FrontendController@blog_detail',
    'as'=>'blog_detail'
]);
Route::post('checkout',[
    'uses'=>'FrontendController@postcheckout',
    'as'=>'postcheckout'
]);
Route::get('about',[
    'uses'=>'FrontendController@about',
    'as'=>'about'
]);
Route::get('service',[
    'uses'=>'FrontendController@service',
    'as'=>'service'
]);
Route::get('/','FrontendController@gethome');
Route::post('/','FrontendController@follow');
Route::post('/contact','FrontendController@contact');
Route::get('detail/{id}','FrontendController@getDetail');
Route::post('detail/{id}','FrontendController@postComment');
Route::post('chi-tiet/blog/{id}','FrontendController@post_comment_blog');

Route::get('category/{id}','FrontendController@getCategory');
Route::post('/confirm-order','CartController@confirm_order');
Route::get('search','FrontendController@getSearch');
Route::post('insert-rating','FrontendController@insert_rating');
//cart
Route::group(['prefix'=>'cart'],function(){
    Route::get('add/{id}','CartController@getAddCart');
    Route::get('show','CartController@getShowCart');
    Route::get('delete/{id}','CartController@getDeleteCart');
    Route::get('update/{qty?}/{id}','CartController@getUpdateCart');
    Route::post('update-cart','CartController@update_cart_ajax');
    Route::post('show','CartController@postComplete');
    Route::post('/save-cart','CartController@savecart');
    Route::post('/add-cart-ajax','CartController@add_cart_ajax');
    Route::get('/delete-cart/{session_id}','CartController@delete_cart_ajax');
    Route::get('/delete-all','CartController@delete_all_cart_ajax');
    Route::get('/gio-hang','CartController@gio_hang');
    Route::post('/check_coupon','CartController@check_coupon');
    Route::get('/delete-coupon','CartController@delete_coupon');
    Route::get('/check-out-ajax','CartController@check_out_ajax');
    Route::post('/select-delivery','CartController@selectdelivery');
    Route::post('/calculate-free','CartController@calculate_free');
    Route::get('/delete-free','CartController@delete_free');
    Route::get('/login-checkout','CartController@login_checkout');
    Route::post('/add-customer','CartController@add_customer');
    Route::post('/save-checkout','CartController@save_checkout');
    Route::get('/logout-checkout','CartController@logout_checkout');
    Route::post('/login','CartController@login');
    Route::post('/thanh-toan','CartController@thanh_toan');
    Route::get('/my-account','CartController@my_account');
    Route::get('/view-history/{order_code}','CartController@view_history');
    Route::get('/save-user','CartController@save_user');
    Route::get('order/delete/{order_code}','CartController@delete');
});
//withlist
Route::group(['prefix'=>'withlist'],function(){
    Route::post('add-withlist','CartController@add_withlist');
    Route::get('/muc-yeu-thich','CartController@muc_yeu_thich');
    Route::get('/delete-withlist/{session_id}','CartController@delete_withlist');

});
Route::get('complete','CartController@getComplete');

Route::group(['namespace'=>'Admin'],function(){
//admin

//login
    Route::group(['prefix'=>'admin','middleware'=>'CheckLogerIn'],function(){
        Route::get('/','LoginController@getlogin');
        Route::post('/','LoginController@postlogin');
    });
//logout
    Route::get('/admin/logout','HomeController@getlogout');
//comment&fllow
    Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
     	Route::get('home','HomeController@gethome');
        Route::get('comment','HomeController@Comment');
        Route::get('follow','HomeController@Follow');
        Route::post('fiter-by-date','HomeController@fiter_by_date');
        Route::post('dashboard-filter','HomeController@dashboard_filter');
        Route::post('days-order','HomeController@days_order');

//brand
        Route::group(['prefix'=>'brand'],function(){
            Route::get('/add-brand','BrandController@addBrand');
            Route::get('/','BrandController@allBrand');
            Route::get('/edit/{id}','BrandController@editbrand');
            Route::get('/delete/{id}','BrandController@deletebrand');
            Route::post('/savebrand','BrandController@saveBrand');
            Route::get('/active/{id}','BrandController@active');
            Route::get('/actived/{id}','BrandController@actived');
            Route::post('/updatebrand/{id}','BrandController@updateBrand');

        });
//blog
        Route::group(['prefix'=>'blog'],function(){
            Route::get('/add-blog','BlogController@addblog');
            Route::get('/','BlogController@allblog');
            Route::get('/edit/{id}','BlogController@editblog');
            Route::get('/delete/{id}','BlogController@deleteblog');
            Route::post('/saveblog','BlogController@saveblog');
            Route::get('/active/{id}','BlogController@active');
            Route::get('/actived/{id}','BlogController@actived');
            Route::post('/updateblog/{id}','BlogController@updateblog');

 });
//slidebar
        Route::group(['prefix'=>'slidebar'],function(){
            Route::get('/add-slidebar','SlidebarController@addSlide');
            Route::get('/','SlidebarController@allSlide');
            Route::get('/edit/{id}','SlidebarController@editSlide');
            Route::get('/delete/{id}','SlidebarController@deleteSlide');
            Route::post('/saveslide','SlidebarController@saveSlide');
            Route::get('/active/{id}','SlidebarController@active');
            Route::get('/actived/{id}','SlidebarController@actived');
            Route::post('/updateslide/{id}','SlidebarController@updateSlide');

        });
        
//orders 
        Route::group(['prefix'=>'order'],function(){
            Route::get('/','OrderController@all_order');
            Route::get('/view-order/{order_code}','OrderController@view_order');
            Route::get('/print-order/{checkout_code}','OrderController@print_order');
            Route::post('/update-order-qty','OrderController@update_order_qty');
            Route::post('/update-quantity','OrderController@update_quantity');
            Route::get('/delete/{order_code}','OrderController@delete_order');
        });
       
//contact
        Route::group(['prefix'=>'contact'],function(){
            Route::get('/','ContactController@allcontact');
        });
       
//customer
//coupon
        Route::group(['prefix'=>'coupon'],function(){
            Route::get('/add-coupon','CouponController@addCoupon');
            Route::get('/','CouponController@allCoupon');
            Route::get('/edit/{id}','CouponController@editCoupon');
            Route::get('/delete/{id}','CouponController@deleteCoupon');
            Route::post('/savecoupon','CouponController@saveCoupon');
            Route::post('/updatecoupon/{id}','CouponController@updateCoupon');           

        });  
//category
     	Route::group(['prefix'=>'category'],function(){
     		Route::get('/','CategoryController@getCate');
     		Route::post('/','CategoryController@postCate');

     		Route::get('edit/{id}','CategoryController@getEditCate');
     		Route::post('edit/{id}','CategoryController@postEditCate');


     		Route::get('delete/{id}','CategoryController@getDeleteCate');
     	});
//product
     	Route::group(['prefix'=>'product'],function(){
     		Route::get('/','ProductController@getProduct');

     		Route::get('/add','ProductController@getAddProduct');
     		Route::post('/add','ProductController@postAddProduct');

     		Route::get('/edit/{id}','ProductController@getEditProduct');
     		Route::post('/edit/{id}','ProductController@postEditProduct');

             Route::get('/active/{id}','ProductController@active');
            Route::get('/actived/{id}','ProductController@actived');


     		Route::get('delete/{id}','ProductController@getDeleteProduct');
     	});
//van chuyen
        Route::group(['prefix'=>'delivery'],function(){
            Route::get('/','DeliveryController@delivery');
            Route::post('/select-delivery','DeliveryController@select_delivery');
            Route::post('/insert-delivery','DeliveryController@insert_delivery');
            Route::post('/select-freeship','DeliveryController@select_freeship');
            Route::post('/update-delivery','DeliveryController@update_delivery');

        });
    });
});




