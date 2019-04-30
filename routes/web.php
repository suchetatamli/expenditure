<?php
use crocodicstudio\crudbooster\middlewares\CBBackend;

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
    //return view('welcome');
    return redirect('/admin/login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'crocodicstudio\crudbooster\controllers',
    'middleware' => ['web', CBBackend::class],
], function () {
    Route::get('profile_edit/profile-edit', [
        'as' => 'admin/profile_edit/profile-edit',
        'uses' => 'AdminProfileEditController@getLogin',
    ]);
});


Route::group([
    //'namespace' => 'controllers',
    'middleware' => ['web', CBBackend::class],
], function () {    
    // Route::get('admin/register/myfund', [
    //     'as' => 'admin/register/myfund',
    //     'uses' => 'AdminCashRegisterController@myfund',
    // ]);

  //Testing 
    //Route::post('admin/dipentest/save','AdminTestController@myFunctionSave');
    Route::get('admin/dashboard','AdminDashboardController@dashboard')->name('dashboard'); 

  
    Route::post('admin/cash_register/myfundsave','CandidateTransactionController@myfundSave')->name('myfund'); 
    
    Route::post('admin/party_person_cash_deposit/save','CandidateTransactionController@PartyPersonDepositSave');
    Route::post('admin/party_person_cash_to_bank/save','CandidateTransactionController@PartyPersonCashToBankSave');
    Route::post('admin/check_draft_payorder_to_bank/save','CandidateTransactionController@CheckDraftPayorderToBankSave');
    Route::post('admin/schedule_selectio/getform','CandidateTransactionController@ChooseScheduleForm');
    Route::post('admin/schedule_selectio/formsave','CandidateTransactionController@ScheduleSelectionFormSave');

    Route::get('admin/schedule_selectio/getform/{schedule}','CandidateTransactionController@ChooseScheduleForm');

    Route::get('admin/register/cashdeposit', [
        'as' => 'admin/register/cashdeposit',
        'uses' => 'AdminCashRegisterController@cashDeposit',
    ]);

    /* ROUTE FOR SAVE SERVICE IN KIND */
    Route::get('admin/test/service-inkind-list','AdminTestController@getServiceInKindList')->name('inkindList'); //list action
    Route::post('admin/test/service-inkind/save','AdminTestController@postInkindSave'); //save action
    Route::get('admin/test/service-inkind/delete/{id}','AdminTestController@getServiceInKindDelete'); // delete action

    /* PETTY EXPENSES */
    Route::get('admin/test/petty-expenses','AdminTestController@getPettyExpenses')->name('petty-expenses');; //list action
    Route::post('admin/test/petty-expenses/save','AdminTestController@postPettyExpenseSave'); //save action
    Route::get('admin/test/petty-expenses/delete/{id}','AdminTestController@getPettyExpenseDelete'); // delete action
    Route::post('admin/create_purchase_register','CandidateTransactionController@savePurchaseRegister')->name('save-purchase-register');
    Route::get('admin/guidelines-instruction','GuideLineInstructionController@index')->name('guidelines-instruction');
    Route::get('admin/vouchers','VoucherController@index')->name('vouchers');
});
