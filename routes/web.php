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


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/',function(){
	return redirect()->route('admin.dashboard');
});


//admin Route

Route::group(['as'=>"admin.",'prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['auth','admin'] ], function(){
	Route::get('dashboard','AdminController@index')->name('dashboard');
	Route::resource('employee','EmployeerController');
	Route::resource('customer','CustomerController');
	Route::resource('supplier','SupplierController');
	Route::resource('salary','SalaryController');
	Route::resource('category','CategoryController');
	Route::resource('subcategory','SubController');
	Route::resource('product','ProductController');
	Route::get('expenses','ExpensesController@index')->name('expenses');
	Route::post('addexpense','ExpensesController@store')->name('expense.store');
	Route::get('editexpense/{id}','ExpensesController@edit')->name('expense.edit');
	Route::PUT('updateexpense/{id}','ExpensesController@update')->name('expense.update');
	Route::delete('deleteexpense/{id}','ExpensesController@destroy')->name('expense.destroy');
	Route::get('searchexpemce','ExpensesController@expense')->name('expense.search');
	Route::post('monthexp','ExpensesController@monthexpense')->name('expense.month');
	Route::post('yaerlyexp','ExpensesController@yearlyexpense')->name('expense.year');
	Route::get('attendance','AttendanceController@index')->name('attendance');
	Route::post('takeattendance','AttendanceController@store')->name('attandence.store');
	Route::post('takeattendance','AttendanceController@store')->name('attandence.store');
	Route::get('edittendance/{id}','AttendanceController@edit')->name('attendance.edit');
	Route::put('updateattendance/{id}','AttendanceController@update')->name('attendance.update');

	//POS ROUTE

	Route::get('showatendance/{id}','AttendanceController@show')->name('attendance.show');
	Route::get('desattandance/{id}','AttendanceController@destroy')->name('attendance.destroy');
	Route::get('pos','PosController@index')->name('pos');
	Route::get('ssubcat/{id}','PosController@subcat');
	Route::get('searchproduct/{id}','PosController@searchproduct');
	Route::get('prices/{id}','PosController@productprice');
	Route::post('create','PosController@store')->name('product.stores');
	Route::get('updatecart/{id}/{qty}','PosController@updatepos')->name('pos.update');

	Route::get('cartremove/{id}','PosController@removecart')->name('cart.remove');
	Route::post('createinvoice','PosController@invoice')->name('create.invoice');
	Route::get('cartcustomer/{id}','PosController@customerid')->name('find.customer');

	Route::post('order','PosController@order')->name('create.order');
	Route::get('pendingorder','PosController@pendingorder')->name('order.pending');
	Route::get('paid/{id}','PosController@paidorder')->name('order.paid');
	Route::get('allpending','PosController@allorder')->name('allorder');

//setting Route

	Route::resource('setting','SettingController');



});



//Author/seller 



Route::group(['as'=>"author.",'prefix'=>'author','namespace'=>'Author', 'middleware'=>['auth','author'] ], function(){
	Route::get('dashboard','AuthorController@index')->name('dashboard');

});


