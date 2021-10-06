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
Route::get('/migrate', function () {
    Illuminate\Support\Facades\Artisan::call('config:clear');
    Illuminate\Support\Facades\Artisan::call('cache:clear');
    Illuminate\Support\Facades\Artisan::call('view:clear');
    Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed');
    dd('done migrate and cache clear!');
});

// Route::get('/',function(){
//     $users = App\User::all();
//     dd($users);

// });
//Home Routes
Route::get('/','App\Http\Controllers\HomeController@index')->name('/');
Auth::routes();

//Admin Routes
	Route::get('/dashboard','App\Http\Controllers\AdminController@dashboard')->name('admin-dashboard');

//User Component
Route::prefix('user')->middleware(['auth:web','can:isAdmin'])->group(function(){
    Route::get('list',App\Http\Livewire\Components\Admin\User\ListUsers::class)->name('users.list');
    Route::get('create',App\Http\Livewire\Components\Admin\User\CreateUser::class);
});

//Franchise Routes
Route::group(['prefix'=>'franchise','middleware'=>'can:isAdmin'],function(){
	Route::get('show','App\Http\Controllers\FranchiseController@index')->name('franchise.show');
	Route::get('create','App\Http\Controllers\FranchiseController@create')->name('franchise.create');
	Route::post('store','App\Http\Controllers\FranchiseController@store')->name('franchise.store');
	Route::get('edit/{id}','App\Http\Controllers\FranchiseController@edit')->name('franchise.edit');
	Route::post('update/{id}','App\Http\Controllers\FranchiseController@update')->name('franchise.update');
	Route::get('trash/{id}','App\Http\Controllers\FranchiseController@trash')->name('franchise.trash');
	Route::get('trashed','App\Http\Controllers\FranchiseController@trashed')->name('franchise.trashed');
	Route::get('restore/{id}','App\Http\Controllers\FranchiseController@restore')->name('franchise.restore');
	Route::get('destroy/{id}','App\Http\Controllers\FranchiseController@destory')->name('franchise.destroy');
});

//Customer Routes
Route::group(['prefix'=>'customer'],function(){
	Route::get('show','App\Http\Controllers\CustomerController@index')->name('customer.show');
	Route::get('create','App\Http\Controllers\CustomerController@create')->name('customer.create');
	Route::post('store','App\Http\Controllers\CustomerController@store')->name('customer.store');
	Route::get('edit/{id}','App\Http\Controllers\CustomerController@edit')->name('customer.edit');
	Route::post('update/{id}','App\Http\Controllers\CustomerController@update')->name('customer.update');
	Route::get('trash/{id}','App\Http\Controllers\CustomerController@trash')->name('customer.trash');
	Route::get('trashed','App\Http\Controllers\CustomerController@trashed')->name('customer.trashed');
	Route::get('restore/{id}','App\Http\Controllers\CustomerController@restore')->name('customer.restore');
	Route::get('destroy/{id}','App\Http\Controllers\CustomerController@destory')->name('customer.destroy');
});


//Vehicle Category Routes
Route::group(['prefix'=>'vcategory'],function(){
	Route::get('show','App\Http\Controllers\VcategoryController@index')->name('vcategory.show');
	Route::get('create','App\Http\Controllers\VcategoryController@create')->name('vcategory.create');
	Route::post('store','App\Http\Controllers\VcategoryController@store')->name('vcategory.store');
	Route::get('edit/{id}','App\Http\Controllers\VcategoryController@edit')->name('vcategory.edit');
	Route::post('update/{id}','App\Http\Controllers\VcategoryController@update')->name('vcategory.update');
	Route::get('destroy/{id}','App\Http\Controllers\VcategoryController@destory')->name('vcategory.destroy');
});

//Vehicle Routes
Route::group(['prefix'=>'vehicle'],function(){
	Route::get('show','App\Http\Controllers\VehicleController@index')->name('vehicle.show');
	Route::get('create','App\Http\Controllers\VehicleController@create')->name('vehicle.create');
	Route::post('store','App\Http\Controllers\VehicleController@store')->name('vehicle.store');
	Route::get('edit/{id}','App\Http\Controllers\VehicleController@edit')->name('vehicle.edit');
	Route::post('update/{id}','App\Http\Controllers\VehicleController@update')->name('vehicle.update');
	Route::get('destroy/{id}','App\Http\Controllers\VehicleController@destory')->name('vehicle.destroy');

	//Vehicle-Fleets Mangagement
	Route::get('goodstransport','App\Http\Controllers\VehicleController@goodstransport')->name('goodstransport.vehicunctions','App\Http\Controllerunctions.vehicles');
	Route::get('tourtravel','App\Http\Controllers\VehicleController@tourtravel')->name('tourtravel.vehicles');
	Route::get('outofcity','App\Http\Controllers\VehicleController@outofcity')->name('outofcity.vehicles');
	Route::get('hourlyrides','App\Http\Controllers\VehicleController@hourlyrides')->name('hourlyrides.vehicles');
	Route::get('available','App\Http\Controllers\VehicleController@available')->name('available.vehicles');
	Route::get('onrent','App\Http\Controllers\VehicleController@onrent')->name('onrent.vehicles');
	Route::get('pickdrop','App\Http\Controllers\VehicleController@pickdrop')->name('pickdrop.vehicles');
});

//Vehicles Livewire Routes
Route::group(['prefix'=>'vehicle'],function(){
    Route::get('list',App\Http\Livewire\Components\Admin\Vehicle\ListVehicles::class)->name('list.vehicles');
    Route::get('request-list',App\Http\Livewire\Components\Admin\Vehicle\RequestList::class)->name('list.vehicle_request');
    Route::get('create',App\Http\Livewire\Components\Admin\Vehicle\CreateVehicle::class)->name('create.vehicle');
    Route::get('edit/{id}',App\Http\Livewire\Components\Admin\Vehicle\EditVehicle::class)->name('edit.vehicle');
    Route::get('owner-detail/{id}',App\Http\Livewire\Components\Admin\Vehicle\OwnerDetail::class)->name('owner.detail');
});

//Driver Routes
Route::group(['prefix'=>'driver'],function(){
	Route::get('show','App\Http\Controllers\DriverController@index')->name('driver.show');
	Route::get('create','App\Http\Controllers\DriverController@create')->name('driver.create');
	Route::post('store','App\Http\Controllers\DriverController@store')->name('driver.store');
	Route::get('edit/{id}','App\Http\Controllers\DriverController@edit')->name('driver.edit');
	Route::post('update/{id}','App\Http\Controllers\DriverController@update')->name('driver.update');
	Route::get('destroy/{id}','App\Http\Controllers\DriverController@destory')->name('driver.destroy');
});

//HRM Routes
Route::group(['prefix'=>'employee'],function(){
	Route::get('show','App\Http\Controllers\EmployeeController@index')->name('employee.show');
	Route::get('create','App\Http\Controllers\EmployeeController@create')->name('employee.create');
	Route::post('store','App\Http\Controllers\EmployeeController@store')->name('employee.store');
	Route::get('edit/{id}','App\Http\Controllers\EmployeeController@edit')->name('employee.edit');
	Route::post('update/{id}','App\Http\Controllers\EmployeeController@update')->name('employee.update');
	Route::get('destroy/{id}','App\Http\Controllers\EmployeeController@destory')->name('employee.destroy');
});

//Goods Transport Management
Route::group(['prefix'=>'goodstransport'],function(){
    Route::get('analysis','App\Http\Controllers\GoodstransportController@analysis')->name('goodstransport.analysis');
    Route::get('index','App\Http\Controllers\GoodstransportController@index')->name('goodstransport.index');
	Route::get('create','App\Http\Controllers\GoodstransportController@create')->name('goodstransport.create');
	Route::post('store','App\Http\Controllers\GoodstransportController@store')->name('goodstransport.store');
	Route::get('edit/{id}','App\Http\Controllers\GoodstransportController@edit')->name('goodstransport.edit');
	Route::post('update/{id}','App\Http\Controllers\GoodstransportController@update')->name('goodstransport.update');
	Route::get('destroy/{id}','App\Http\Controllers\GoodstransportController@destroy')->name('goodstransport.destroy');
    Route::get('save/{id}','App\Http\Controllers\GoodstransportController@save')->name('goodstransport.save');
    Route::get('invoice/{id}','App\Http\Controllers\GoodstransportController@invoice')->name('goodstransport.invoice');
    Route::get('print/{id}','App\Http\Controllers\GoodstransportController@print')->name('goodstransport.print');
});

//Tours&Travels Management
Route::group(['prefix'=>'tourtravel'],function(){
	Route::get('index','App\Http\Controllers\TourtravelController@index')->name('tourtravel.index');
	Route::get('create','App\Http\Controllers\TourtravelController@create')->name('tourtravel.create');
	Route::post('store','App\Http\Controllers\TourtravelController@store')->name('tourtravel.store');
	Route::get('edit/{id}','App\Http\Controllers\TourtravelController@edit')->name('tourtravel.edit');
	Route::post('update/{id}','App\Http\Controllers\TourtravelController@update')->name('tourtravel.update');
	Route::get('destroy/{id}','App\Http\Controllers\TourtravelController@destroy')->name('tourtravel.destroy');
    Route::get('save/{id}','App\Http\Controllers\TourtravelController@save')->name('tourtravel.save');
    Route::get('invoice/{id}','App\Http\Controllers\TourtravelController@invoice')->name('tourtravel.invoice');
});


//Vehicles Management
Route::group(['prefix'=>'vehiclemanagement'],function(){
	Route::get('show','App\Http\Controllers\VehiclemanagementController@index')->name('vehiclemanagement.show');
	Route::get('create','App\Http\Controllers\VehiclemanagementController@create')->name('vehiclemanagement.create');
	Route::post('store','App\Http\Controllers\VehiclemanagementController@store')->name('vehiclemanagement.store');
	Route::get('edit/{id}','App\Http\Controllers\VehiclemanagementController@edit')->name('vehiclemanagement.edit');
	Route::post('update/{id}','App\Http\Controllers\VehiclemanagementController@update')->name('vehiclemanagement.update');
	Route::get('destroy/{id}','App\Http\Controllers\VehiclemanagementController@destroy')->name('vehiclemanagement.destroy');
	Route::get('details/{id}','App\Http\Controllers\VehiclemanagementController@detail')->name('vehiclemanagement.detail');
});

//Vehicles Maintenance
Route::group(['prefix'=>'vehiclemaintenance'],function(){
	Route::get('show/{id}','App\Http\Controllers\VehiclemaintenanceController@index')->name('vehiclemaintenance.show');
	Route::get('create/{id}','App\Http\Controllers\VehiclemaintenanceController@create')->name('vehiclemaintenance.create');
	Route::post('store','App\Http\Controllers\VehiclemaintenanceController@store')->name('vehiclemaintenance.store');
	Route::get('edit/{id}','App\Http\Controllers\VehiclemaintenanceController@edit')->name('vehiclemaintenance.edit');
	Route::post('update/{id}','App\Http\Controllers\VehiclemaintenanceController@update')->name('vehiclemaintenance.update');
	Route::get('destroy/{id}','App\Http\Controllers\VehiclemaintenanceController@destroy')->name('vehiclemaintenance.destroy');
	Route::get('details/{id}','App\Http\Controllers\VehiclemaintenanceController@detail')->name('vehiclemaintenance.detail');
});


//Vehicles Expenses
Route::group(['prefix'=>'vehicleexpense'],function(){
	Route::get('show/{id}','App\Http\Controllers\VehicleexpenseController@index')->name('vehicleexpense.show');
	Route::get('create/{id}','App\Http\Controllers\VehicleexpenseController@create')->name('vehicleexpense.create');
	Route::post('store','App\Http\Controllers\VehicleexpenseController@store')->name('vehicleexpense.store');
	Route::get('edit/{id}','App\Http\Controllers\VehicleexpenseController@edit')->name('vehicleexpense.edit');
	Route::post('update/{id}','App\Http\Controllers\VehicleexpenseController@update')->name('vehicleexpense.update');
	Route::get('destroy/{id}','App\Http\Controllers\VehicleexpenseController@destroy')->name('vehicleexpense.destroy');
	Route::get('details/{id}','App\Http\Controllers\VehicleexpenseController@detail')->name('vehicleexpense.detail');
});


//Vehicles Expenses
Route::group(['prefix'=>'vehicleexpensetype'],function(){
	Route::get('show','App\Http\Controllers\VehicleexpensetypeController@index')->name('vehicleexpensetype.show');
	Route::get('create','App\Http\Controllers\VehicleexpensetypeController@create')->name('vehicleexpensetype.create');
	Route::post('store','App\Http\Controllers\VehicleexpensetypeController@store')->name('vehicleexpensetype.store');
	Route::get('edit/{id}','App\Http\Controllers\VehicleexpensetypeController@edit')->name('vehicleexpensetype.edit');
	Route::post('update/{id}','App\Http\Controllers\VehicleexpensetypeController@update')->name('vehicleexpensetype.update');
	Route::get('destroy/{id}','App\Http\Controllers\VehicleexpensetypeController@destroy')->name('vehicleexpensetype.destroy');
	Route::get('details/{id}','App\Http\Controllers\VehicleexpensetypeController@detail')->name('vehicleexpensetype.detail');
});

//Vehicle Rental History
Route::group(['prefix'=>'vehiclerentalhistory'],function(){
	Route::get('show','App\Http\Controllers\VehiclerentalhistoryController@index')->name('vehiclerentalhistory.show');
	Route::get('create','App\Http\Controllers\VehiclerentalhistoryController@create')->name('vehiclerentalhistory.create');
	Route::post('store','App\Http\Controllers\VehiclerentalhistoryController@store')->name('vehiclerentalhistory.store');
	Route::get('edit/{id}','App\Http\Controllers\VehiclerentalhistoryController@edit')->name('vehiclerentalhistory.edit');
	Route::post('update/{id}','App\Http\Controllers\VehiclerentalhistoryController@update')->name('vehiclerentalhistory.update');
	Route::get('destroy/{id}','App\Http\Controllers\VehiclerentalhistoryController@destroy')->name('vehiclerentalhistory.destroy');
	Route::get('details/{id}','App\Http\Controllers\VehiclerentalhistoryController@detail')->name('vehiclerentalhistory.detail');
});


//Workshop On wheels
Route::group(['prefix'=>'booking'],function(){
	Route::get('show','App\Http\Controllers\BookingController@index')->name('booking.show');
	Route::get('create','App\Http\Controllers\BookingController@create')->name('booking.create');
	Route::post('store','App\Http\Controllers\BookingController@store')->name('booking.store');
	Route::get('edit/{id}','App\Http\Controllers\BookingController@edit')->name('booking.edit');
	Route::post('update/{id}','App\Http\Controllers\BookingController@update')->name('booking.update');
	Route::get('destroy/{id}','App\Http\Controllers\BookingController@destroy')->name('booking.destroy');
	Route::get('details/{id}','App\Http\Controllers\BookingController@detail')->name('booking.detail');
    Route::get('invoice/{id}','App\Http\Controllers\BookingController@invoice')->name('booking.invoice');

});


//Workshop On wheels Vehicle
Route::group(['prefix'=>'workshopvehicle'],function(){
	Route::get('index','App\Http\Controllers\WorkshopvehicleController@index')->name('workshopvehicle.index');
	Route::get('create','App\Http\Controllers\WorkshopvehicleController@create')->name('workshopvehicle.create');
	Route::post('store','App\Http\Controllers\WorkshopvehicleController@store')->name('workshopvehicle.store');
	Route::get('edit/{id}','App\Http\Controllers\WorkshopvehicleController@edit')->name('workshopvehicle.edit');
	Route::post('update/{id}','App\Http\Controllers\WorkshopvehicleController@update')->name('workshopvehicle.update');
	Route::get('destroy/{id}','App\Http\Controllers\WorkshopvehicleController@destroy')->name('workshopvehicle.destroy');
});

//Workshop On wheels Services Crud
Route::group(['prefix'=>'service'],function(){
	Route::get('index','App\Http\Controllers\ServiceController@index')->name('service.index');
	Route::get('create','App\Http\Controllers\ServiceController@create')->name('service.create');
	Route::post('store','App\Http\Controllers\ServiceController@store')->name('service.store');
	Route::get('edit/{id}','App\Http\Controllers\ServiceController@edit')->name('service.edit');
	Route::post('update/{id}','App\Http\Controllers\ServiceController@update')->name('service.update');
	Route::get('destroy/{id}','App\Http\Controllers\ServiceController@destroy')->name('service.destroy');
});

//Workshop On wheels For Products
Route::group(['prefix'=>'product'],function(){
	Route::get('index','App\Http\Controllers\ProductController@index')->name('product.index');
	Route::get('create','App\Http\Controllers\ProductController@create')->name('product.create');
	Route::post('store','App\Http\Controllers\ProductController@store')->name('product.store');
	Route::get('edit/{id}','App\Http\Controllers\ProductController@edit')->name('product.edit');
	Route::post('update/{id}','App\Http\Controllers\ProductController@update')->name('product.update');
	Route::get('destroy/{id}','App\Http\Controllers\ProductController@destroy')->name('product.destroy');
});

//Workshop On wheels For Mechanics CRUD
Route::group(['prefix'=>'mechanic'],function(){
	Route::get('index','App\Http\Controllers\MechanicController@index')->name('mechanic.index');
	Route::get('create','App\Http\Controllers\MechanicController@create')->name('mechanic.create');
	Route::post('store','App\Http\Controllers\MechanicController@store')->name('mechanic.store');
	Route::get('edit/{id}','App\Http\Controllers\MechanicController@edit')->name('mechanic.edit');
	Route::post('update/{id}','App\Http\Controllers\MechanicController@update')->name('mechanic.update');
	Route::get('destroy/{id}','App\Http\Controllers\MechanicController@destroy')->name('mechanic.destroy');
});


//Reports Managemnent
Route::group(['prefix'=>'reports'],function(){
	Route::get('index','App\Http\Controllers\ReportsController@index')->name('reports.index');
	Route::get('create','App\Http\Controllers\ReportsController@create')->name('reports.create');
	Route::post('store','App\Http\Controllers\ReportsController@store')->name('reports.store');
	Route::get('edit/{id}','App\Http\Controllers\ReportsController@edit')->name('reports.edit');
	Route::post('update/{id}','App\Http\Controllers\ReportsController@update')->name('reports.update');
	Route::get('destroy/{id}','App\Http\Controllers\ReportsController@destroy')->name('reports.destroy');
});


//INcome and expense management system
Route::group(['prefix'=>'income_expense'],function(){
	Route::get('index','App\Http\Controllers\IncomeexpenseController@index')->name('income_expense.index');
	Route::get('create','App\Http\Controllers\IncomeexpenseController@create')->name('income_expense.create');
	Route::post('store','App\Http\Controllers\IncomeexpenseController@store')->name('income_expense.store');
	Route::get('edit/{id}','App\Http\Controllers\IncomeexpenseController@edit')->name('income_expense.edit');
	Route::post('update/{id}','App\Http\Controllers\IncomeexpenseController@update')->name('income_expense.update');
	Route::get('destroy/{id}','App\Http\Controllers\IncomeexpenseController@destroy')->name('income_expense.destroy');
});


// Manage Expense Management System
Route::group(['prefix'=>'expenses'],function(){
	Route::get('index','App\Http\Controllers\ExpenseController@index')->name('expenses.index');
	Route::get('create','App\Http\Controllers\ExpenseController@create')->name('expenses.create');
	Route::post('store','App\Http\Controllers\ExpenseController@store')->name('expenses.store');
	Route::get('edit/{id}','App\Http\Controllers\ExpenseController@edit')->name('expenses.edit');
	Route::post('update/{id}','App\Http\Controllers\ExpenseController@update')->name('expenses.update');
	Route::get('destroy/{id}','App\Http\Controllers\ExpenseController@destroy')->name('expenses.destroy');
});

// Manage Income Management System
Route::group(['prefix'=>'income'],function(){
	Route::get('index','App\Http\Controllers\IncomeController@index')->name('income.index');
	Route::get('create','App\Http\Controllers\IncomeController@create')->name('income.create');
	Route::post('store','App\Http\Controllers\IncomeController@store')->name('income.store');
	Route::get('edit/{id}','App\Http\Controllers\IncomeController@edit')->name('income.edit');
	Route::post('update/{id}','App\Http\Controllers\IncomeController@update')->name('income.update');
	Route::get('destroy/{id}','App\Http\Controllers\IncomeController@destroy')->name('income.destroy');
});


// Manage Reservation
Route::group(['prefix'=>'reservation'],function(){
	Route::get('index','App\Http\Controllers\ReservationController@index')->name('reservation.index');
	Route::get('create','App\Http\Controllers\ReservationController@create')->name('reservation.create');
	Route::post('store','App\Http\Controllers\ReservationController@store')->name('reservation.store');
	Route::get('edit/{id}','App\Http\Controllers\ReservationController@edit')->name('reservation.edit');
	Route::post('update/{id}','App\Http\Controllers\ReservationController@update')->name('reservation.update');
	Route::get('destroy/{id}','App\Http\Controllers\ReservationController@destroy')->name('reservation.destroy');
    Route::get('save/{id}','App\Http\Controllers\ReservationController@save')->name('reservation.save');
    Route::get('invoice/{id}','App\Http\Controllers\ReservationController@invoice')->name('reservation.invoice');
});

// Admin Control CRUD
Route::group(['prefix'=>'admincontrol'],function(){
	Route::get('index','App\Http\Controllers\AdmincontrolController@index')->name('admincontrol.index');
});


// Package Name And Rates CRUD
Route::group(['prefix'=>'packagerate'],function(){
	Route::get('index','App\Http\Controllers\PackagerateController@index')->name('package_rate.index');
	Route::get('create','App\Http\Controllers\PackagerateController@create')->name('package_rate.create');
	Route::post('store','App\Http\Controllers\PackagerateController@store')->name('package_rate.store');
	Route::get('edit/{id}','App\Http\Controllers\PackagerateController@edit')->name('package_rate.edit');
	Route::post('update/{id}','App\Http\Controllers\PackagerateController@update')->name('package_rate.update');
	Route::get('destroy/{id}','App\Http\Controllers\PackagerateController@destroy')->name('package_rate.destroy');
});

// Rent A Car Analysis
Route::group(['prefix'=>'rentACar'],function(){
	Route::get('index','App\Http\Controllers\RentacarController@index')->name('rentacar.index');
});

// Hourly Rides Reservation CRUD
Route::group(['prefix'=>'hourlyrides'],function(){
	Route::get('index','App\Http\Controllers\HourlyridesController@index')->name('hourlyrides.index');
	Route::get('create','App\Http\Controllers\HourlyridesController@create')->name('hourlyrides.create');
	Route::post('store','App\Http\Controllers\HourlyridesController@store')->name('hourlyrides.store');
	Route::get('edit/{id}','App\Http\Controllers\HourlyridesController@edit')->name('hourlyrides.edit');
	Route::post('update/{id}','App\Http\Controllers\HourlyridesController@update')->name('hourlyrides.update');
	Route::get('destroy/{id}','App\Http\Controllers\HourlyridesController@destroy')->name('hourlyrides.destroy');
    Route::get('save/{id}','App\Http\Controllers\HourlyridesController@save')->name('hourlyrides.save');
    Route::get('invoice/{id}','App\Http\Controllers\HourlyridesController@invoice')->name('hourlyrides.invoice');
});

// Pick and Drop Reservation CRUD
Route::group(['prefix'=>'pickanddrop'],function(){
	Route::get('index','App\Http\Controllers\PickanddropController@index')->name('pickanddrop.index');
	Route::get('create','App\Http\Controllers\PickanddropController@create')->name('pickanddrop.create');
	Route::post('store','App\Http\Controllers\PickanddropController@store')->name('pickanddrop.store');
	Route::get('edit/{id}','App\Http\Controllers\PickanddropController@edit')->name('pickanddrop.edit');
	Route::post('update/{id}','App\Http\Controllers\PickanddropController@update')->name('pickanddrop.update');
	Route::get('destroy/{id}','App\Http\Controllers\PickanddropController@destroy')->name('pickanddrop.destroy');
    Route::get('save/{id}','App\Http\Controllers\PickanddropController@save')->name('pickanddrop.save');
    Route::get('invoice/{id}','App\Http\Controllers\PickanddropController@invoice')->name('pickanddrop.invoice');
});

// Make(Company) Crud.. Management
Route::group(['prefix'=>'make'],function(){
	Route::get('index','App\Http\Controllers\MakeController@index')->name('make.index');
	Route::get('create','App\Http\Controllers\MakeController@create')->name('make.create');
	Route::post('store','App\Http\Controllers\MakeController@store')->name('make.store');
	Route::get('edit/{id}','App\Http\Controllers\MakeController@edit')->name('make.edit');
	Route::post('update/{id}','App\Http\Controllers\MakeController@update')->name('make.update');
	Route::get('destroy/{id}','App\Http\Controllers\MakeController@destroy')->name('make.destroy');
});

// Engine(Powers) Crud.. Management
Route::group(['prefix'=>'engine'],function(){
	Route::get('index','App\Http\Controllers\EngineController@index')->name('engine.index');
	Route::get('create','App\Http\Controllers\EngineController@create')->name('engine.create');
	Route::post('store','App\Http\Controllers\EngineController@store')->name('engine.store');
	Route::get('edit/{id}','App\Http\Controllers\EngineController@edit')->name('engine.edit');
	Route::post('update/{id}','App\Http\Controllers\EngineController@update')->name('engine.update');
	Route::get('destroy/{id}','App\Http\Controllers\EngineController@destroy')->name('engine.destroy');
});

// Courier Management
Route::group(['prefix'=>'courier'],function(){
	Route::get('analysis',App\Http\Livewire\Components\Admin\Courier\AnalysisCourier::class)->name('courier.analysis');
    Route::get('list',App\Http\Livewire\Components\Admin\Courier\ListCourier::class)->name('courier.list');
    Route::get('create',App\Http\Livewire\Components\Admin\Courier\CreateCourier::class)->name('courier.create');
    Route::get('types-list',App\Http\Livewire\Components\Admin\Couriertype\ListCourierType::class)->name('couriertype.list');
    Route::get('weight-list',App\Http\Livewire\Components\Admin\Weight\ListCourierWeight::class)->name('courierweight.list');
    Route::get('content-list',App\Http\Livewire\Components\Admin\Content\ListCourierContent::class)->name('couriercontent.list');
});

