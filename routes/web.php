<?php

use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('welcome');
}); */

//front end
Route::get('/',[
    'uses'=>'IslamicBookBdController@index',
    'as'=> '/'
]);


Route::get('/books',[
    'uses'=>'IslamicBookBdController@allBooks',
    'as'=>'all-books'
]);

/*Route::get('/ajax-sort-page-check/{sortShowPage}',[
    'uses'=>'IslamicBookBdController@ajaxSortPageCheck',
    'as'=>'ajax-sort-page-check'
]);*/

Route::get('/contact',[
    'uses'=>'IslamicBookBdController@contact',
    'as'=> 'contact'
]);

Route::post('/contact-message',[
    'uses'=>'IslamicBookBdController@contactMessage',
    'as'=>'contact-message'
]);

Route::get('/subcategory-page/{id}',[
    'uses'=>'IslamicBookBdController@subcategoryPage',
    'as'=> 'subcategory-page'
]);


Route::get('/book-details/{id}/{categoryId}',[
    'uses'=>'IslamicBookBdController@detailsPage',
    'as'=>'details-page'
]);

Route::post('/customers-comment',[
    'uses'=>'IslamicBookBdController@customerComment',
    'as'=>'customers-comment'
]);

/*Route::get('/book-details/{id}/{categoryId}',[
    'uses'=>'IslamicBookBdController@commentShow',
    'as'=>'details-page'
]);*/



Route::get('/author-page/{authorName}',[
    'uses'=>'IslamicBookBdController@authorPage',
    'as'=>'author-page'
]);

Route::get('/search-page',[
    'uses'=>'IslamicBookBdController@searchPage',
    'as'=>'search-page'
]);

Route::post('/cart/add',[
    'uses'=>'CartController@addToCart',
    'as'=>'add-to-cart'
]);

Route::get('/add-cart/{id}',[
    'uses'=>'CartController@addCart',
    'as'=>'add-cart'
]);

Route::get('/cart/show',[
    'uses'=>'CartController@showCart',
    'as'=>'show-cart'
]);

Route::get('/cart/delete/{rowId}',[
    'uses'=>'CartController@deleteCartItem',
    'as'=>'delete-cart-item'
]);


Route::get('/add-wishlist/{id}',[
    'uses'=>'CartController@addWishlist',
    'as'=>'add-wishlist'
]);

Route::get('/wishlist/show',[
    'uses'=>'CartController@showWishlist',
    'as'=>'show-wishlist'
]);

Route::get('/wishlist/delete/{rowId}',[
    'uses'=>'CartController@deleteWishlistItem',
    'as'=>'delete-wishlist-item'
]);

Route::get('/checkout',[
    'uses'=>'CheckoutController@checkout',
    'as'=>'checkout'
]);

Route::get('/register-login',[
    'uses'=>'RegisterLoginController@registerLogin',
    'as'=>'register-login'
]);
Route::post('/register-customer',[
    'uses'=>'RegisterLoginController@registerCustomer',
    'as'=>'register-customer'
]);

Route::post('/customer-login',[
    'uses'=>'RegisterLoginController@customerLogin',
    'as'=>'customer-login'
]);

Route::post('/customer-logout',[
    'uses'=>'RegisterLoginController@customerLogout',
    'as'=>'customer-logout'
]);

Route::get('/my-account',[
    'uses'=>'RegisterLoginController@myAccount',
    'as'=>'my-account'
]);

Route::get('/download-book/{id}',[
    'uses'=>'RegisterLoginController@downloadBook',
    'as'=>'download-book'
]);

Route::post('/update-customer-info',[
    'uses'=>'RegisterLoginController@updateCustomerInfo',
    'as'=>'update-customer-info'
]);

Route::post('/complete-order',[
    'uses'=>'CheckoutController@completeOrder',
    'as'=>'complete-order'
]);





//admin panel
Route::get('/category/add',[
    'uses'=>'CategoryController@addCategory',
    'as'=>'add-category'
]);

Route::post('/category/save',[
    'uses'=>'CategoryController@saveCategory',
    'as'=>'new-category'
]);

Route::get('/category/manage',[
    'uses'=>'CategoryController@manageCategory',
    'as'=>'manage-category'
]);

Route::get('/category/unpublished/{id}',[
    'uses'=>'CategoryController@unpublishedCategoryInfo',
    'as'=>'unpublished-category'
]);

Route::get('/category/published/{id}',[
    'uses'=>'CategoryController@publishedCategoryInfo',
    'as'=>'published-category'
]);

Route::get('/category/edit/{id}',[
    'uses'=>'CategoryController@editCategoryInfo',
    'as'=>'edit-category'
]);

Route::post('/category/update',[
    'uses'=>'CategoryController@updateCategory',
    'as'=>'update-category'
]);

Route::get('/category/delete/{id}',[
    'uses'=>'CategoryController@removeCategoryInfo',
    'as'=>'delete-category'
]);

Route::get('/subcategory/add',[
    'uses'=>'SubcategoryController@addSubcategory',
    'as'=>'add-subcategory'
]);

Route::post('/subcategory/save',[
    'uses'=>'SubcategoryController@saveSubcategory',
    'as'=>'new-subcategory'
]);

Route::get('/subcategory/manage',[
    'uses'=>'SubcategoryController@manageSubcategory',
    'as'=>'manage-subcategory'
]);

Route::get('/subcategory/unpublished/{id}',[
    'uses'=>'SubcategoryController@unpublishedSubcategory',
    'as'=>'unpublished-subcategory'
]);

Route::get('/subcategory/published/{id}',[
    'uses'=>'SubcategoryController@publishedSubcategory',
    'as'=>'published-subcategory'
]);

Route::get('/subcategory/edit/{id}',[
    'uses'=>'SubcategoryController@editSubcategory',
    'as'=>'edit-subcategory'
]);

Route::post('/subcategory/update',[
    'uses'=>'SubcategoryController@updateSubcategory',
    'as'=>'update-subcategory'
]);

Route::get('/subcategory/remove/{id}',[
    'uses'=>'SubcategoryController@removeSubCategoryInfo',
    'as'=>'delete-subcategory'
]);

Route::get('/book/add',[
    'uses'=>'BookController@addBook',
    'as'=>'add-book'
]);

Route::post('/book/save',[
    'uses'=>'BookController@saveBook',
    'as'=>'new-book'
]);

Route::get('/book/manage',[
    'uses'=>'BookController@manageBook',
    'as'=>'manage-book'
]);

Route::get('/book/view/{id}',[
    'uses'=>'BookController@viewBooks',
    'as'=>'view-books'
]);

Route::get('/book/unpublished/{id}',[
    'uses'=>'BookController@unpublishedBook',
    'as'=>'unpublished-book'
]);

Route::get('/book/published/{id}',[
    'uses'=>'BookController@publishedBook',
    'as'=>'published-book'
]);

Route::get('/book/edit/{id}',[
    'uses'=>'BookController@editBook',
    'as'=>'edit-book'
]);

Route::post('/book/update',[
    'uses'=>'BookController@updateBook',
    'as'=>'update-book'
]);

Route::get('/book/remove/{id}',[
    'uses'=>'BookController@deleteBook',
    'as'=>'delete-books'
]);

Route::get('/order/manage-order',[
    'uses'=>'OrderController@manageOrder',
    'as'=>'manage-order'
]);

Route::get('/order/order-details/{id}',[
    'uses'=>'OrderController@orderDetails',
    'as'=>'order-details'
]);

Route::post('/order/status-update',[
    'uses'=>'OrderController@statusUpdate',
    'as'=>'status-update'
]);

Route::get('/order/order-remove/{id}',[
    'uses'=>'OrderController@orderRemove',
    'as'=>'order-remove'
]);

Route::get('/order/view-invoice/{id}',[
    'uses'=>'OrderController@viewInvoice',
    'as'=>'view-invoice'
]);

Route::get('/order/download-invoice/{id}',[
    'uses'=>'OrderController@downloadInvoice',
    'as'=>'download-invoice'
]);

Route::get('/view-comments-admin-page',[
    'uses'=>'CommentsController@viewCommentsAdminPage',
    'as'=>'view-comments-admin-page'
]);

Route::get('/remove-comments/{id}',[
    'uses'=>'CommentsController@removeComments',
    'as'=>'remove-comments'
]);

Route::get('/truncate-comments',[
    'uses'=>'CommentsController@truncateComments',
    'as'=>'truncate-comments'
]);

Route::get('/view-messages-admin-page',[
    'uses'=>'CommentsController@viewMessagesAdminPage',
    'as'=>'view-messages-admin-page'
]);

Route::get('/remove-message/{id}',[
    'uses'=>'CommentsController@removeMessage',
    'as'=>'remove-message'
]);

Route::get('/truncate-messages',[
    'uses'=>'CommentsController@truncateMessages',
    'as'=>'truncate-messages'
]);

Route::get('/get/subcat/{id}','BookController@getSubcat');






Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

