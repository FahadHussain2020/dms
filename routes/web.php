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



//to show login page
Route::get('/', 'welcomeController@welcome');
//to authenticate login page
Route::post('login', 'welcomeController@login');

//logout
Route::get('logout', 'welcomeController@logout');

//update superadmin profile
Route::post('updatesuperadmin','CreatesuperadminsController@update');
//update superadmin profile
Route::post('updatesuperadminpassword','CreatesuperadminsController@updatepassword');
//show superadmin panel
Route::get('/superadmin','welcomeController@superadmin' );
//view admin
Route::get('/superadmin/viewadmin','CreateadminsController@viewadmin');
//Create admin
Route::post('/insert','CreateadminsController@addadmin');
//update admin
Route::post('/superadmin/editadmin','CreateadminsController@editadmin');
//admin pasword reset
Route::get('/superadmin/resetpassword','CreateadminsController@adminresetpassword');
//delete admin
Route::get('/superadmin/deleteadmin/{id}','CreateadminsController@deleteadmin');


//salesman pasword reset
Route::get('/superadmin/resetpassword1','CreatesalesmenController@salesmanresetpassword');
//view salesman
Route::get('/superadmin/viewsalesman','CreatesalesmenController@viewsalesman');
//view salesman graph
Route::get('/superadmin/viewgraph','CreatesalesmenController@viewsalesmangraph');
//Create salesman
Route::post('/insertsalesman','CreatesalesmenController@addsalesman');
//update salesman
Route::post('/superadmin/editsalesman','CreatesalesmenController@editsalesman');
//delete salesman
Route::get('/superadmin/deletesalesman/{id}','CreatesalesmenController@deletesalesman');

//view category
Route::get('/superadmin/viewcategory','CreatecategoriesController@viewcategory');
//create category
Route::post('/superadmin/createcategory','CreatecategoriesController@createcategory');
//update category
Route::post('/superadmin/editcategory','CreatecategoriesController@editcategory');
//delete category
Route::get('/superadmin/deletecategory/{id}','CreatecategoriesController@deletecategory');

//view sypplier
Route::get('superadmin/viewsupplier','CreatesuppliersController@viewsupplier');
//add supplier
Route::post('/superadmin/createsupplier','CreatesuppliersController@createsupplier');
//edit supplier
Route::post('/superadmin/editsupplier','CreatesuppliersController@updatesupplier');
//delete supplier
Route::get('/superadmin/deletesupplier/{id}','CreatesuppliersController@deletesupplier');

//view_product
Route::get('/superadmin/viewproduct','CreateproductsController@viewproduct');
//create_product
Route::post('/superadmin/createproduct','CreateproductsController@createproduct');
//delete product
Route::get('/superadmin/deleteproduct/{id}','CreateproductsController@deleteproduct');
//update product
Route::post('/superadmin/updateproduct','CreateproductsController@updateproduct');
//AJAx ctagory_supplier_superadmin
Route::get('/superadmin/category-supplier','CreateproductsController@categporySuppliers')
->name('ajax.category.supplier');


//view_Retailer
Route::get('/superadmin/viewretailer','CreateretailersController@viewretailer');
//create_Retailer
Route::post('/superadmin/createretailer','CreateretailersController@createretailer');
//delete retailer
Route::get('/superadmin/deleteretailer/{id}','CreateretailersController@deleteretailer');
//updateretailer
Route::post('/superadmin/updateretailer','CreateretailersController@updateretailer');


//create_Order
Route::get('/superadmin/orderpage','CreateordersController@orderpage')->name('orderpage');
Route::post('/superadmin/createorder','CreateordersController@createordr')->name('createorder');

//create_Order
// Route::get('/superadmin/takeorder','CreateordersController@createorder');

//view_Order
Route::get('/superadmin/vieworder','CreateordersController@vieworder');

//delete order
Route::get('/superadmin/deleteorder/{id}','CreateordersController@deleteorder');

//view_Order_item
Route::get('/superadmin/vieworderitem/{id}','CreateordersController@vieworderitem');

//take_Order
Route::get('/superadmin/takeorder','CreateordersController@createorder');



//graph value
Route::post('/superadmin/graphvalue','CreatesalesmenController@salesmangraphvalue');
//reset password profile
Route::post('/superadmin/profilepassword','CreatesuperadminsController@profilepassword');



// Super Admin Route End







// Admin Route Start



//update admin profile
Route::post('updateadmin','CreatesuperadminsController@update');
//update superadmin profile
Route::post('updateadminpassword','CreatesuperadminsController@updatepassword');
//show superadmin panel
Route::get('/admin','welcomeController@admin' );



//salesman pasword reset
Route::get('/admin/resetpassword1','CreatesalesmenController@salesmanresetpassword');
//view salesman
Route::get('/admin/viewsalesman','CreatesalesmenController@viewsalesman');
//view salesman graph
Route::get('/admin/viewgraph','CreatesalesmenController@viewsalesmangraph');
//Create salesman
Route::post('/insertsalesman','CreatesalesmenController@addsalesman');
//update salesman
Route::post('/admin/editsalesman','CreatesalesmenController@editsalesman');
//delete salesman
Route::get('/admin/deletesalesman/{id}','CreatesalesmenController@deletesalesman');

//view category
Route::get('/admin/viewcategory','CreatecategoriesController@viewcategory');
//create category
Route::post('/admin/createcategory','CreatecategoriesController@createcategory');
//update category
Route::post('/admin/editcategory','CreatecategoriesController@editcategory');
//delete category
Route::get('/admin/deletecategory/{id}','CreatecategoriesController@deletecategory');

//view sypplier
Route::get('admin/viewsupplier','CreatesuppliersController@viewsupplier');
//add supplier
Route::post('/admin/createsupplier','CreatesuppliersController@createsupplier');
//edit supplier
Route::post('/admin/editsupplier','CreatesuppliersController@updatesupplier');
//delete supplier
Route::get('/admin/deletesupplier/{id}','CreatesuppliersController@deletesupplier');

//view_product
Route::get('/admin/viewproduct','CreateproductsController@viewproduct');
//create_product
Route::post('/admin/createproduct','CreateproductsController@createproduct');
//delete product
Route::get('/admin/deleteproduct/{id}','CreateproductsController@deleteproduct');
//update product
Route::post('/admin/updateproduct','CreateproductsController@updateproduct');

//AJAx ctagory_supplier
Route::get('/admin/category-supplier','CreateproductsController@categorySuppliers')
->name('ajax.category.supplier');


//view_Retailer
Route::get('/admin/viewretailer','CreateretailersController@viewretailer');
//create_Retailer
Route::post('/admin/createretailer','CreateretailersController@createretailer');
//delete retailer
Route::get('/admin/deleteretailer/{id}','CreateretailersController@deleteretailer');
//updateretailer
Route::post('/admin/updateretailer','CreateretailersController@updateretailer');


//create_Order
Route::get('/admin/orderpage','CreateordersController@orderpage')->name('orderpage');
Route::post('/admin/createorder','CreateordersController@createordr')->name('createorder');


//create_Order
// Route::get('/admin/takeorder','CreateordersController@createorder');



//graph value
Route::post('/superadmin/graphvalue','CreatesalesmenController@salesmangraphvalue');

//reset password profile
Route::post('/admin/profilepassword','CreateadminsController@profilepassword');

//profile admin setting
Route::post('/admin/updateadminsetting','CreateadminsController@updatesettingadmin');

//create_Order
// Route::get('/admin/takeorder','CreateordersController@createorder');

//view_Order
Route::get('/admin/vieworder','CreateordersController@vieworder');

//delete order
Route::get('/admin/deleteorder/{id}','CreateordersController@deleteorder');

//view_Order_item
Route::get('/admin/vieworderitem/{id}','CreateordersController@vieworderitem');

//take_Order
Route::get('/admin/takeorder','CreateordersController@createorder');

Route::get('/admin/getproductbyid/{name}','CreateordersController@getproductbyid');
// Admin Route End