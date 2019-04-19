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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/All-members', 'HomeController@Allmembers')->name('allmembers');
Route::get('/add-member','HomeController@AddMember')->name('addmember');
Route::post('/create_member','HomeController@create_member')->name('addmember');
Route::post('/remove-member/{id}','HomeController@delete')->name('removemember');
Route::get('/edit-member/{id}','HomeController@edit_member_page')->name('editmemberpage');
Route::post('/edit-member/{id}','HomeController@edit_member')->name('editmember');
Route::get('/Add-role/{id}','HomeController@add_role_page')->name('addrolepage');
Route::get('/edit-member/{id}/delete-user-role/{role_id}','HomeController@delete_user_role')->name('deleterole');

Route::get('/add-manager','ManagerController@AddManager')->name('createmanager');
Route::post('/create_manager','ManagerController@create_manager')->name('createmanager');

Route::get('/add-team-leader','TeamLeaderController@AddTeamleader')->name('createleader');
Route::post('/create_team_leader','TeamLeaderController@create_team_leader')->name('createleader');

Route::get('/add-admin','AdminController@AddAdmin')->name('createadmin');
Route::post('/create_admin','AdminController@create_admin')->name('createadmin');

Route::get('/add-hr-manager','HrManagerController@AddHrManager')->name('createHrManager');
Route::post('/create_hr_manager','HrManagerController@create_hr_manager')->name('createadmin');


Route::get('/All-employees','EmployeeController@AllEmployees')->name('AllEmployees');
Route::get('/add-employee','EmployeeController@AddEmployee')->name('AddEmployeer');
Route::post('/create_employee','EmployeeController@create_employee')->name('create_employee');

Route::get('/edit-employee/{id}','EmployeeController@edit_employee_page')->name('editEmployee');
Route::post('/edit_employee/{id}','EmployeeController@edit_employee')->name('edit_employee');
Route::get('/edit-employee/{id}/delete-employee-holiday/{holiday_id}','EmployeeController@delete_employee_holiday')->name('deleteholiday');

Route::get('/edit-employee/{id}/create-employee-attendence','EmployeeController@create_employee_attendence')->name('attendence.add');
Route::post('/edit-employee/{id}/store-employee-attendence','EmployeeController@store_employee_attendence')->name('attendence.store');

Route::get('/edit-employee/{id}/edit-employee-attendence/{attendence_id}','EmployeeController@edit_employee_attendence')->name('attendence.edit');
Route::get('/edit-employee/{id}/update-employee-attendence/{attendence_id}','EmployeeController@update_employee_attendence')->name('attendence.update');

Route::get('/edit-employee/{id}/delete-employee-attendence/{attendence_id}','EmployeeController@delete_employee_attendence')->name('attendence.delete');

Route::post('/remove-employee/{id}','EmployeeController@remove_employee')->name('removeemployee');
Route::get('/employee-attendence/{id}','EmployeeController@employee_attendence')->name('deleteholiday');
Route::post('/employee-attendence/{id}/search/attendence','EmployeeController@search_attendence')->name('searchAttendence');

/*
Route::get('/category/all','EmployeeController@edit_employee_page')->name('allcats');
Route::get('/category/add','EmployeeController@edit_employee_page')->name('addcats');
Route::get('/category/edit{id}','EmployeeController@edit_employee_page')->name('allcats');
Route::post('/category/edit{id}','EmployeeController@search_attendence')->name('searchAttendence');

*/



Route::get('/create_role','HomeController@create_role')->name('createrole');
Route::post('/create_role','HomeController@store_role')->name('storerole');

Route::get('/edit_role/{id}','HomeController@edit_role')->name('editerole');
Route::post('/edit_role/{id}','HomeController@edit_role')->name('updaterole');
Route::get('/allRoles','HomeController@roles')->name('allroles');
