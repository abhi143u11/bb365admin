<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Creating Customer Along With wallet and Card 
Route::post('insert','API\CustomerController@create');

//Displaying All Users 
Route::get('users','API\CustomerController@index');



//Displaying particuler Pages based on Id
Route::get('page/{id}','API\PageController@pagesdetails');

//Displaying All-Offers Slides
Route::get('slides','API\OfferController@showslider');

//Displaying All-Products
Route::get('allproducts2','API\ProductController@allproducts2');
Route::get('products/categorynew/{id}','API\ProductController@allproductspaginate');

Route::get('products/featured','API\ProductController@productsfeatured');
Route::get('products/lowprice','API\ProductController@productslowprice');
Route::get('allproducts','API\ProductController@allproductslist');

//updating customer Device-Token with phone number
Route::post('customer/update','API\CustomerController@customerupdate');

//notification 
Route::get('notification/{phone}','API\NotificationController@Notification');

//updating customer Device-Token with card number
Route::post('customer-card/update','API\CustomerController@updatewithcard');

//All Categories 
Route::get('categories','API\CategoriesController@allcategories');
Route::get('catwithsub','API\CategoriesController@categorieswithsub');

//Transaction
Route::get('transaction','API\TransactionController@transaction');
Route::post('transaction/add','API\TransactionController@transactionstore');

//Bills
Route::post('bill/add','API\BillController@addbill');
Route::post('bill/cancel','API\BillController@cancelbill');
Route::get('orders/{id}','API\BillController@Orders');


Route::get('product/search/{data}','API\ProductController@productssearch2');

//All Blogs
Route::get('blogs','API\BlogController@allblogs');

//All Videos
Route::get('allvideos','API\VideoController@allvideos');


//Email & Notificaton Not Sent
Route::get('notsent','API\BillController@allnotsent');
