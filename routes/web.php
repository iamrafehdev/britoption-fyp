<?php

use App\Mail\TestEmail;

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
//Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('/');
Route::get('maintenance-mode', 'HomeController@maintenance_mode');
Route::post('/password/reset', 'Auth\ResetPasswordController@forgotPass')->name('password.email');
Route::get('/reset/{token}', 'Auth\ResetPasswordController@resetLink')->name('reset.passlink');
Route::post('/reset/password', 'Auth\ResetPasswordController@passwordReset')->name('reset.passw');

Route::get('/signup', 'Auth\RegisterController@index')->name('signup');
Route::post('/signup', 'Auth\RegisterController@signup')->name('signup');
//Route::any('/sendmail', 'Auth\RegisterController@sendmail');
//Route::any('/verify_email/{key}', 'Auth\RegisterController@verify_email');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/calculate_daily_profit', 'HomeController@calculate_daily_profit');


Route::get('/about-us', 'HomeController@about_us')->name('/about-us');
Route::get('/our-work', 'HomeController@our_work')->name('/our-work');
Route::get('/how-itswork', 'HomeController@how_itswork')->name('/how-itswork');
Route::get('/contact-us', 'HomeController@contact_us')->name('/contact-us');
Route::get('/packages', 'HomeController@package')->name('/package');
Route::get('/referrals', 'HomeController@referral')->name('/referral');
Route::get('/unilevel', 'HomeController@unilevel')->name('/unilevel');
Route::get('/terms', 'HomeController@term')->name('/term');
Route::get('/our-services', 'HomeController@our_services')->name('/our-services');
Route::get('/covid-19', 'HomeController@covid')->name('/covid-19');
Route::get('/faq', 'HomeController@faq')->name('/faq');
Route::get('/profile', 'HomeController@profile')->name('/profile');
Route::get('/company_profile', 'HomeController@company_profile')->name('/company_profile');
Route::get('/motivational_banner', 'HomeController@motivational_banner')->name('/motivational-banner');
Route::get('/promo_banner', 'HomeController@promo_banner')->name('/promo-banner');
Route::post('check_email_available', 'HomeController@check_email_available')->name('email_available.check');
Route::post('check_username_available', 'HomeController@check_username_available')->name('username_available.check');
Route::get('/home', function () {
    if (Auth::check()) {
        return redirect('/users-dashboard');
    } else {
        return view('auth.login');
    }
});
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');

    return 'DONE'; //Return anything
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin-dashboard', 'Admin\DashboardController@index')->name('admin-dashboard');

    Route::get('/admin/packages/requests', 'Admin\DashboardController@packages_requests')->name('admin-packages-requests');

    Route::get('/admin/packages/approved_requests', 'Admin\DashboardController@approved_packages_requests')->name('admin-app-packages-requests');

    Route::get('/admin/packages/rejected_requests', 'Admin\DashboardController@rejected_packages_requests')->name('admin-rej-packages-requests');

    // accepts request
    Route::get('admin/accept_request/{id}', 'Admin\DashboardController@accept_request');
    // reject request
    Route::get('admin/reject_request/{id}', 'Admin\DashboardController@reject_request');

    Route::get('admin/fund-deposit', 'Admin\DepositFundsController@index')->name('admin/fund-deposit');
    Route::get('admin/fund-withdraw', 'Admin\WithdrawFundsController@index')->name('admin/fund-withdraw');
    Route::get('/admin/approve-user/{id}', 'Admin\UsersController@approve_user');
    Route::get('/admin/user-profile/{id}', 'Admin\UsersController@user_profile');
    Route::post('/admin/withdraw-preview', 'Admin\WithdrawFundsController@withdraw_preview');
    Route::post('/admin/withdraw-preview-save', 'Admin\WithdrawFundsController@withdraw_preview_save');
    Route::resource('packagesplan', 'Admin\PackagesPlanController');
    Route::resource('paymentmethods', 'Admin\PaymentMethodsController');
    Route::get('/paid_users', 'Admin\UsersController@paid_users')->name('paid_users');
    Route::get('/free_users', 'Admin\UsersController@free_users')->name('free_users');
    Route::get('/banned_users', 'Admin\UsersController@banned_users')->name('banned_users');
    Route::get('admin/withdraw_request', 'Admin\WithdrawFundsController@withdraw_request');
    Route::get('admin/withdraw_request/{id}', 'Admin\WithdrawFundsController@withdraw_request_detail');
    Route::post('admin/withdraw/update/{id}', 'Admin\WithdrawFundsController@respondWithdraw')->name('withdraw.process');
    Route::post('admin/withdraw/update-reject/{id}', 'Admin\WithdrawFundsController@withdrawReject')->name('withdraw.reject');

    Route::get('admin/unilevel-tree/{id}', 'Admin\UnilevelController@index')->name('/admin/unilevel-tree');

    //setting
    Route::get('/admin/setting', 'Admin\SettingController@index');

    //email marketing
    Route::get('/admin/send_marketing_email', 'Admin\EmailMarketingController@create');
    Route::post('/admin/send_marketing_email_touser', 'Admin\EmailMarketingController@store');

    // refferal commission setting
    Route::any('/admin/commission', 'Admin\CommissionController@save_commission');
    Route::any('/admin/withdarw_limit', 'Admin\SettingController@withdarw_limit');
    Route::any('admin/ChangeWithdrawStatus', 'Admin\SettingController@ChangeWithdrawStatus');
    Route::any('admin/ChangeRoiStatus', 'Admin\SettingController@ChangeRoiStatus');
    Route::any('admin/ChangeUserStatus', 'Admin\UsersController@ChangeUserStatus');
    Route::any('admin/BannedUserStatus', 'Admin\UsersController@BannedUserStatus');
    Route::any('admin/ChangeMaintenanceStatus', 'Admin\SettingController@ChangeMaintenanceStatus');

    #support tickets
    Route::get('/admin/support_ticket', 'Admin\SupportTicketController@index');
    Route::get('/admin/support_ticket/{id}', 'Admin\SupportTicketController@show');
    Route::post('admin/support_ticket/update/{id}', 'Admin\SupportTicketController@respondSupportTicket')->name('support_ticket.process');

    ### send conditional email ##############
    Route::post('admin/send_conditional_email_free', 'Admin\UsersController@send_conditional_email_free');
    Route::post('admin/send_conditional_email_paid', 'Admin\UsersController@send_conditional_email_paid');

    ########  withdraw request ##############
    Route::get('/admin/withdraw_request_approved', 'Admin\WithdrawFundsController@withdraw_request_approved');
    Route::get('/admin/withdraw_request_rejected', 'Admin\WithdrawFundsController@withdraw_request_rejected');

    ##########  filter ########################

    Route::post('/admin/withdraw_request_rejected_filter', 'Admin\WithdrawFundsController@withdraw_request_rejected_filter');
    Route::post('/admin/withdraw_request_approved_filter', 'Admin\WithdrawFundsController@withdraw_request_approved_filter');
    Route::post('/admin/withdraw_request_filter', 'Admin\WithdrawFundsController@withdraw_request_filter');
    Route::post('/admin/change_user_package_status', 'Admin\UsersController@change_user_package_status');


});

Route::group(['middleware' => 'users'], function () {
    Route::get('/users-dashboard', 'Users\DashboardController@index')->name('users-dashboard');
    Route::get('users/my-package', 'Users\DepositFundsController@my_package')->name('users/my-package');
    Route::get('users/referral_bonus', 'Users\DepositFundsController@referralbounus')->name('users/referralbounus');
    Route::get('users/unilevel-tree', 'Users\UnilevelController@index')->name('/users/unilevel-tree');

    Route::get('users/unilevel-profit', 'Users\UnilevelController@unilevel_profit')->name('/users/unilevel-profit');
    Route::get('users/reports', 'Users\ReportsController@index')->name('/users/reports');

    Route::get('users/buy-package', 'Users\DepositFundsController@buy_package')->name('users/buy-package');
    Route::get('users/fund-deposit/{id}', 'Users\DepositFundsController@index')->name('users/fund-deposit');
    Route::get('users/fund-withdraw', 'Users\WithdrawFundsController@index')->name('users/fund-withdraw');
    Route::get('users/confirm-buypackage/{id}', 'Users\PackagesPlanController@confirm_package');
    Route::get('users/buypackage/{id}', 'Users\PackagesPlanController@buy_packageplan');
    Route::get('/users/user-profile/{id}', 'Users\UsersController@user_profile');
    Route::post('/users/preview-gateway-deposit-amount', 'Users\DepositFundsController@preview_gateway_deposit_amount');
    Route::post('/users/deposit-funds', 'Users\PaymentsController@deposit_amount');
    Route::post('/users/perfect-money-success-deposit', 'Users\PaymentsController@perfect_money_success_deposit');
    Route::get('/users/perfect-money-unsuccess-deposit', 'Users\PaymentsController@perfect_money_unsuccess_deposit');
    Route::post('/users/withdraw-preview', 'Users\WithdrawFundsController@withdraw_preview');
    Route::post('/users/withdraw-preview-save', 'Users\WithdrawFundsController@withdraw_preview_save');
    Route::get('/users/daily_earning_history', 'Users\AccountHistoryController@daily_earning_history');
    Route::get('/users/fund_withdraw_history', 'Users\AccountHistoryController@fund_withdraw_history');
    Route::get('/users/fund_deposit_history', 'Users\AccountHistoryController@fund_deposit_history');
    Route::post('/users/withdraw_balance', 'Users\WithdrawFundsController@withdraw_balance');
    Route::get('/users/package_expiry', 'Users\PaymentsController@package_expiry');
    Route::post('/users/add_payment', 'Users\PaymentsController@deposit_funds');
    // test mail
    Route::get('/users/sendmail', 'Users\WithdrawFundsController@sendmail');
    Route::get('/users/edit-user-profile', 'Users\UsersController@edit_user_profile');
    Route::post('/users/save_user_profile_info', 'Users\UsersController@save_user_profile_info');
    Route::post('/users/save_user_profile_verification_info', 'Users\UsersController@save_user_profile_verification_info');

    Route::post('/users/save_user_profile_address', 'Users\UsersController@save_user_profile_address');
    Route::post('/users/save_user_profile_picture', 'Users\UsersController@save_user_profile_picture');
    Route::get('/users/compete_profile', 'Users\UsersController@get_profile');
    Route::get('/users/support_ticket', 'Users\SupportTicketController@index');
    Route::get('/users/support_ticket/create', 'Users\SupportTicketController@create');
    Route::post('/users/support_ticket/store', 'Users\SupportTicketController@store');

    Route::get('/users/send_bitcoin_payment', 'Users\PaymentsController@send_bitcoin_payment');
    // get unilevel user detail
    Route::post('/users/getTreeUserDetail', 'Users\UsersController@getTreeUserDetail');

    // verify otp
    Route::post('verify_otp', 'Users\WithdrawFundsController@verify_otp')->name('verify_otp.check');
    // send new otp
    Route::post('send_new_otp', 'Users\WithdrawFundsController@send_new_otp')->name('send_otp.resend');


});
