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


Route::get('reset', function (){
   // dd('sdfsd');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});



 // Start  employee login and registration pages 
Route::get('/', function () {
     // Session::get('adminSession');
     return view('home');
});
Route::get('/login', function () {
    return view('login');
});
// End 

Route::get('ForgotPassword', [App\Http\Controllers\EmployeeController::class, 'forgotpassword']);
Route::post('postforgotpassword', [App\Http\Controllers\EmployeeController::class, 'postforgotpassword']);
Route::get('emailvarifiedcreatepassword/{id}', [App\Http\Controllers\EmployeeController::class, 'emailvarifiedcreatepassword']);
Route::post('restforgotpassword', [App\Http\Controllers\EmployeeController::class, 'restforgotpassword']);
Route::get('EmployeeVerificationCode/{id}', [App\Http\Controllers\EmployeeController::class, 'EmployeeVerificationCode']);

// POST Employee login and registration  for create session of employee 
Route::post('loginemployee', [App\Http\Controllers\EmployeeController::class, 'loginemployee']);
Route::post('saveemployee', [App\Http\Controllers\EmployeeController::class, 'addemployee']);

Route::middleware(['employee'])->group(function () {
    Route::get('/Employee', [App\Http\Controllers\EmployeeController::class, 'index']); 
    Route::get('/KAEmployee', [App\Http\Controllers\EmployeeController::class, 'dashboard']);
    Route::post('postaboutus', [App\Http\Controllers\EmployeeController::class, 'saveemployeeaboutus']);
    Route::get('/EmergencyContact', [App\Http\Controllers\EmployeeController::class, 'emergancycontact']);
    Route::get('/BankInformation', [App\Http\Controllers\EmployeeController::class, 'bankinformation']);
    Route::get('/FamilyInformation', [App\Http\Controllers\EmployeeController::class, 'familyinformation']);
    Route::get('/EmployeeStatus', [App\Http\Controllers\EmployeeController::class, 'employeestatus']);
    Route::get('/Insurance', [App\Http\Controllers\EmployeeController::class, 'insurance']);
    Route::get('/Visa', [App\Http\Controllers\EmployeeController::class, 'visa']);
    Route::get('/Documents', [App\Http\Controllers\EmployeeController::class, 'documents']);
    Route::post('postemergancycontact', [App\Http\Controllers\EmployeeController::class, 'saveemergancycontact']);
    Route::post('postbankinformation', [App\Http\Controllers\EmployeeController::class, 'savebankinformation']);
    Route::post('postfamily', [App\Http\Controllers\EmployeeController::class, 'savefamily']);
    Route::post('postemployeestatus', [App\Http\Controllers\EmployeeController::class, 'saveemployeestatus']);
    Route::post('postinsurance', [App\Http\Controllers\EmployeeController::class, 'saveinsurance']);
    Route::post('postvisa', [App\Http\Controllers\EmployeeController::class, 'savevisa']);
    Route::post('removefamilymember', [App\Http\Controllers\EmployeeController::class, 'deletefamilymember']);
    Route::get('/HolidayRequest', [App\Http\Controllers\EmployeeController::class, 'employeeholiday']);
    Route::get('/Logout', function () {
        Session::flush();
        return redirect('/login');
    }); 

    Route::get('/EmpChangePassword', [App\Http\Controllers\EmployeeController::class, 'empchangepassword']);
    Route::post('Emppostchangepassword', [App\Http\Controllers\EmployeeController::class, 'postchangepassword']);
    Route::post('postDocument', [App\Http\Controllers\EmployeeController::class, 'postDocument']);
    Route::post('/schedulecalendar', [App\Http\Controllers\EmployeeController::class, 'schedulecalendar']);
    Route::post('/save_start_date_holiday', [App\Http\Controllers\EmployeeController::class, 'savestartday']);
    Route::post('/eventRemove', [App\Http\Controllers\EmployeeController::class, 'eventRemove']);
    Route::post('/eventsupdate', [App\Http\Controllers\EmployeeController::class, 'eventsupdate']);
});

 // Admin flow 
 Route::get('/admin', function () {
    return view('admin.login');
});


Route::post('/adminlogin' ,[App\Http\Controllers\AdminController::class, 'login']);
Route::middleware(['admin'])->group(function () {
 Route::get('/KAAdmin', [App\Http\Controllers\AdminController::class, 'admindashboard']);
 Route::get('/addemployee', [App\Http\Controllers\AdminController::class, 'addemployee']);
 Route::post('/postEmployee', [App\Http\Controllers\AdminController::class, 'postEmployee']);
 Route::get('/AdminLogout', function () {
    Session::flush();
    return redirect('/admin'); 
});

Route::get('/EmployeeDetails/{id}', [App\Http\Controllers\AdminController::class, 'employeedetails']);
Route::get('/EmployeeDelete/{id}', [App\Http\Controllers\AdminController::class, 'employeeDelete']);



Route::post('admin_postaboutus', [App\Http\Controllers\AdminController::class, 'saveemployeeaboutus']);
Route::post('amdin_postemergancycontact', [App\Http\Controllers\AdminController::class, 'saveemergancycontact']);
Route::post('admin_postbankinformation', [App\Http\Controllers\AdminController::class, 'savebankinformation']);
Route::post('admin_postfamily', [App\Http\Controllers\AdminController::class, 'savefamily']);
Route::post('admin_postemployeestatus', [App\Http\Controllers\AdminController::class, 'saveemployeestatus']);
Route::post('admin_postinsurance', [App\Http\Controllers\AdminController::class, 'saveinsurance']);
Route::post('admin_postvisa', [App\Http\Controllers\AdminController::class, 'savevisa']);
Route::post('admin_postpaidholiday', [App\Http\Controllers\AdminController::class, 'savepostpaidholiday']);
Route::post('admin_old_leave', [App\Http\Controllers\AdminController::class, 'adminoldleave']);
 


Route::get('/EmployeeHoliday', [App\Http\Controllers\AdminController::class, 'employeeholiday']);
Route::get('/AjaxEmployeeHoliday', [App\Http\Controllers\AdminController::class, 'ajaxemployeeholiday']);
Route::get('/Events', [App\Http\Controllers\AdminController::class, 'eventslisting']);
Route::get('/addEvents', [App\Http\Controllers\AdminController::class, 'addEvents']);
Route::post('postevents', [App\Http\Controllers\AdminController::class, 'saveevents']);


Route::get('/changeEvent/{id}', [App\Http\Controllers\AdminController::class, 'changeEvent']);


Route::get('/deleteEvent/{id}', [App\Http\Controllers\AdminController::class, 'deleteEvent']);
// ajax
Route::post('eventschangestatus', [App\Http\Controllers\AdminController::class, 'eventschangestatus']);
Route::post('documents_status', [App\Http\Controllers\AdminController::class, 'documentsstatus']);

Route::get('/ChangePassword', [App\Http\Controllers\AdminController::class, 'changepassword']);
Route::post('postchangepassword', [App\Http\Controllers\AdminController::class, 'postchangepassword']);


});

