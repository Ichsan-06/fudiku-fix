<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

Route::get('/','HomeController@index')->name('home');

Route::get('/email',function(){ 
        $email_data = array(
                'name' => "Ichsan",
                'metode'=>"BRI", 
                'jumlah'=>"30000", 
                'paket'=>"Srifgala",
                'duration'=>"3",
                'subsName'=>"HAh",
            );
        // return new \App\Mail\WelcomeMail($email_data);
       $data =  Mail::to("013ichsanm@gmail.com")->send(new \App\Mail\WelcomeMail($email_data));
            if ($data) {
                echo "Ber";
        }
        else echo"Gal";
});

Route::get('/login','LoginController@index');
Route::post('/login','LoginController@logout')->name('logout');
Route::get('/register','RegisterController@showRegistrationForm')->name('register.form');
Route::post('/register','RegisterController@register')->name('register');

Route::get('/location','LocationController@index')->name('location');
Route::post('/searchLocation','LocationController@search')->name('autocomplete');
Route::post('/postLocation','LocationController@post')->name('postLocation');



Route::get('/menu/{location}','MenuController@index')->name('menu');

Route::post('/menu/search','MenuController@search');

Route::get('/menu/{slug}/{location}','MenuController@byCategory')->name('menu');



Route::get('/order/{location}/{id}','OrderController@index')->name('order');
Route::post('/schedule','ScheduleController@index')->name('schedule');
Route::post('/form','FormController@index')->name('form');
Route::post('/postForm','FormController@post')->name('postForm');
Route::post('/formLocation','FormController@formLocation');


Route::get('/payment/{code}','PaymentController@index')->name('payment');
Route::post('/payment/post/','PaymentController@post')->name('payment.post');

Route::get('payment/cod/{code}','PaymentController@cod');

Route::get('/payment/update/{code}','PaymentController@change');
Route::post('/payment/postUpdate/','PaymentController@postChange')->name('paymentpostUpdate');

Route::get('/payment/detail/{code}','PaymentController@detail')->name('payment.detail');
Route::post('/payment/postDetail/','PaymentController@postDetail')->name('postDetailPayment');


Route::get('/payment/confirm','PaymentController@confirm')->name('payment.confirm');
Route::get('/finish','FinishController@index')->name('finish');

Route::get('/profile','ProfileController@index')->name('profile');
Route::get('/profile/edit','ProfileController@edit')->name('profile.edit');

Route::get('/cart','CartController@index')->name('cart');
Route::get('/cart/detail','CartController@detail')->name('cart.detail');

Route::get('/about','AboutController@index')->name('about');

Route::get('/contact','ContactController@index')->name('contact');

Auth::routes();


// Middleware Admin
Route::get('/loginadmin','LoginAdminController@index')->name('loginAdmin');
Route::post('/postLoginAdmin','LoginAdminController@post')->name('postAdmin');

Route::middleware('role:admin')->group(function () {
        Route::get('/admin','DashboardController@index')->name('dashboard');

        Route::get('/admin/category','CategoryController@index')->name('category');
        Route::post('/admin/tambahCategory','CategoryController@tambah')->name('tambahCategory');
        Route::get('/admin/deleteCategory/{id}','CategoryController@destroy');
        // Route::get('/admin/updateCategory/{id}','CategoryController@update')->name('upCategory');
        Route::post('/admin/updateCategory/{id}','CategoryController@update')->name('upCategory');
        Route::post('/admin/changeIsActive/{id}','CategoryController@active');

        Route::post('/admin/storeCategory','CategoryController@store');
        Route::post('/admin/activeCategory','CategoryController@activation');


        Route::get('/admin/subCategory','SubCategoryController@index')->name('SubCategory');
        Route::post('/admin/tambahSubCategory','SubCategoryController@tambah')->name('tambahSubCategory');
        Route::get('/admin/deleteSubCategory/{id}','SubCategoryController@destroy');
        Route::post('/admin/updateSubCategory/{id}','SubCategoryController@update')->name('upSubCategory');
        Route::post('/admin/changeSubIsActive/{id}','SubCategoryController@active');

        Route::get('/admin/product','ProductController@index')->name('product');
        Route::get('/admin/deleteProduct/{id}','ProductController@destroy');
        Route::post('/admin/insertProduct','ProductController@create')->name('insertProduct');
        Route::get('/admin/updateProduct/{id}','ProductController@edit');
        Route::post('/admin/storeUpdateProduct/','ProductController@update');

        Route::get('/admin/subscription','SubscriptionController@index')->name('subscription');
        Route::post('/admin/tambahSubscription','SubscriptionController@create')->name('tambahSubscription');
        Route::get('/admin/updateSubscription/{id}','SubscriptionController@update');
        Route::post('/admin/storeSubscription/','SubscriptionController@store');
        Route::get('/admin/deleteSubscription/{id}','SubscriptionController@destroy');

        Route::get('/admin/customer','CustomerController@index')->name('customer');
        // Route::post('/admin/tambahSubcription','CustomerController@create')->name('tambahSubcription');
        Route::get('/admin/seeCustomer/{id}','CustomerController@see');

        Route::get('/admin/administrator','AdminController@index')->name('admin');
        // Route::post('/admin/tambahSubcription','CustomerController@create')->name('tambahSubcription');
        Route::get('/admin/seeCustomer/{id}','AdminController@see');

        Route::get('/admin/map','MapController@index')->name('map');
        Route::post('/admin/tambahMap','MapController@create')->name('tambahMap');
        Route::post('/admin/updateMap/{id}','MapController@update');
        Route::get('/admin/deleteMap/{id}','MapController@delete');

        Route::get('/admin/transfer','TransferController@index')->name('transfer');
        Route::post('/admin/postTransfer','TransferController@post')->name('postTransfer');
        Route::get('/admin/deleteTransfer/{id}','TransferController@delete');
        Route::get('/admin/updateTransfer/{id}','TransferController@update');
        Route::post('/admin/postUpdateTransfer/','TransferController@postUpdate');


        Route::post('/admin/updateMap/{id}','MapController@update');
        // Route::get('/admin/deleteMap/{id}','MapController@delete');

        Route::get('/admin/ordering','OrderingController@index')->name('ordering');
});
