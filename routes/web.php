<?php
use App\Models\Bills;
use App\Models\Users;
use App\Models\Transaction;
use App\Models\BillProduct;


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

Route::get('bulk', function () {
     return view('admin.images.bulk-upload');
  });


Route::get('/', function () {
  if (Auth::check()) {

         if(Auth::user()->usertype == 'admin'||Auth::user()->usertype == 'moderator')
        {
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('instructor.dashboard');
        }

  }else{
    return view('welcome');
  }
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

 Route::group(['middleware' => ['auth','admin']], function (){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    //dashboard
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

  //Users
  Route::get('users','UserController@index');
  Route::post('users_insert', [
    'uses' => 'UserController@insert'
  ]);
  Route::get('/users-edit/{id}','UserController@edit');
  Route::PUT('/users-update/{id}','UserController@update');
  Route::delete('/users-delete/{id}','UserController@delete');

     //Address
    Route::get('/address','CustomerAddressController@index');
    Route::post('address_insert', [
        'uses' => 'CustomerAddressController@insert'
      ]);
    Route::get('/addres-edit/{id}','CustomerAddressController@edit');
    Route::PUT('/address-update/{id}','CustomerAddressController@update');
    Route::delete('/addres-delete/{id}','CustomerAddressController@destroy');
    


  //Customers
  Route::get('/customers','CustomerController@index');
  Route::post('customers_insert', [
    'uses' => 'CustomerController@store'
  ]);
  Route::get('/customers-edit/{id}','CustomerController@edit');
  Route::PUT('/customers-update/{id}','CustomerController@update');
  Route::delete('/customers-delete/{id}','CustomerController@delete');

   //Products
   Route::get('/imagesnew','ImagesController@index');
   Route::post('/bulkinsert/{type}/{sub_cat_id}/{img_type}','ImagesController@bulkinsert');
   Route::post('images_insert', [
     'uses' => 'ImagesController@insert'
   ]);
   Route::get('/imagesnew-edit/{product_id}','ImagesController@edit');
   Route::PUT('imagesnew-update/{product_id}','ImagesController@update');
   Route::delete('/imagesnew-delete/{product_id}','ImagesController@delete');

   //Bulk Edit
   Route::get('/bulkproducts','ImagesController@bulkedit');
   Route::post('bulkproducts_insert','ImagesController@create');

   //Categories
   Route::get('/categories','CategoriesController@index');
   Route::post('categories_insert', [
     'uses' => 'CategoriesController@insert'
   ]);
   Route::get('/categories-edit/{id}','CategoriesController@edit');
   Route::PUT('/categories-update/{id}','CategoriesController@update');
   Route::delete('/categories-delete/{id}','CategoriesController@destroy');
    Route::get('getsubcat/{id}', 'SubCategoriesController@subcategories');
Route::resource('categories', 'CategoriesController');

       //SubCategories
   Route::get('/subcategories','SubCategoriesController@index');
   Route::post('subcategories_insert', [
     'uses' => 'SubCategoriesController@insert'
   ]);
   Route::get('/subcategory-edit/{id}','SubCategoriesController@edit');
   Route::PUT('/subcategory-update/{id}','SubCategoriesController@update');
   Route::delete('/subcategory-delete/{id}','SubCategoriesController@destroy');
  
    //Pages
    Route::get('/pages','PagesController@index');
    Route::post('pages_store', [
       'uses' => 'PagesController@store'
     ]);
     Route::get('/pages-edit/{id}','PagesController@edit');
     Route::PUT('/pages-update/{id}','PagesController@update');
     Route::delete('/pages-delete/{id}','PagesController@destroy');


   //Offers Slider
      Route::get('/slider','OffersController@showslider');
      Route::post('slider_store', [
         'uses' => 'OffersController@slider'
       ]);
       Route::get('/slider-edit/{id}','OffersController@editslide');
       Route::PUT('/slider-update/{id}','OffersController@updateslide');
       Route::delete('/slider-delete/{id}','OffersController@destroyslide');

    //Notification   
    Route::resource('notification', 'NotificationController');


  //subscription
        Route::get('/subscriptions','SubscriptionController@index');
        Route::post('save-subscriptions','SubscriptionController@store');
        Route::get('/edit-subscriptions/{subscription_id}','SubscriptionController@edit');
        Route::put('/subscriptions-update/{subscription_id}', 'SubscriptionController@update');
        Route::delete('/subscriptions-delete/{subscription_id}', 'SubscriptionController@delete');

  // //Notification Message
  // Route::resource('notification-message', 'NotificationMessageController');
  // Route::post('/notification-message/store','NotificationMessageController@store')->name('notification-message.store');
  // Route::get('/notification-message/edit/{i_notification_message_id}', 'NotificationMessageController@edit');

  // Route::post('/notification-message/update','NotificationMessageController@update')->name('notification-message.update');
  // Route::get('/notification-message/destroy/{i_notification_message_id}', 'NotificationMessageController@destroy');

  //Send Notification
  Route::get('/send-notification','NotificationController@get_admin_student_list');
  Route::post('/send-notification/filter','NotificationController@get_subscription_list');
  Route::put('/send-notification/send','NotificationController@send_admin_notification');

  Route::get('/send-all-notification','NotificationController@get_all_student_list');
  
  Route::post('/send-all-notification/send','NotificationController@send_all_student_notification')->name('all-notification.send');  
  
     //Notifications
     Route::get('/notification','NotificationController@index');

     //Notifications Messages
     Route::get('/notification-message','NotificationController@show');
     Route::post('notification-message-store', [
        'uses' => 'NotificationController@store'
      ]);
      Route::get('/notificationmessage-edit/{id}','NotificationController@edit');

    // Video
    Route::get('videos','VideoController@index');
    Route::post('videos_insert','VideoController@store');
    Route::get('/videos-edit/{id}','VideoController@edit');
    Route::PUT('/videos-update/{id}','VideoController@update');
    Route::delete('/videos-delete/{id}','VideoController@destroy');

  
    //Transaction
    Route::get('/transaction', 'TransactionController@index');

    });

    //Set All Users Todays Downloads = 0
    Route::get('/settodaydownloads', 'UserController@settodaydownloads');

    