<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laravel_example\UserManagement;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VideoLead\VideoController;
use App\Http\Controllers\follow_up\FollowUpDashboardController;
use App\Http\Controllers\video_editor\VideoEditorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!tour
|

*/

$controller_path = 'App\Http\Controllers';

    // Login  This Authantecation With Teacher
      Route::controller(LoginController::class)->group(function(){
        Route::get('/login','index')->name('login.index');
        Route::post('/login','store')->name('login.store');
        Route::get('/logout','destroy')->name('login.destroy');
        
      });
      Route::middleware(['auth','auth.videoEditorLead']  )->group(function(){ // Check About Video Editor Login
          Route::controller(VideoController::class)->group(function(){ 
            Route::get('videoEditorLead/dashboard','index')->name('videoEditorLead');
            Route::post('videoEditorLead/video_lead_add','video_lead_add')->name('video_lead_add');
            Route::get('videoEditorLead/subjects','subjects')->name('videoEditorLeadSubjects');
            Route::get('videoEditorLead/Profile','profile')->name('ve_l_profile');
            Route::post('videoEditorLead/dashboard_add','video_lead_material')->name('video_lead_material');
          });
      });

        Route::middleware('auth','auth.videoEditor')->group(function(){
            Route::controller(VideoEditorController::class)->group(function(){
              Route::get('VideoEditor/dashboard','index')->name('videoEditor');
              Route::get('VideoEditor/profile','profileEdit')->name('profile');
              Route::post('VideoEditor/video_add','video_add')->name('video_add');

            });
        });
      Route::middleware(['auth','auth.follow_up']  )->group(function(){ // Check About Follow Up
      $controller_path = 'App\Http\Controllers';
          Route::controller(FollowUpDashboardController::class)->group(function(){
              Route::get('Followup/follow_up','index')->name('follow_up'); // This First Page With Follow Up
              Route::get('Followup/follow_up_SignUp','index')->name('follow_up_SignUp'); // This First Page With Follow Up
          });
          Route::controller($controller_path . '\follow_up\FollowUpProfileController')->group(function(){
            Route::get('Followup/follow_up_profile', 'index')->name('follow_up_profile'); // This Is Rout Profile Follow Up
            Route::post('Followup/follow_up_Edit', 'editFollowUp')->name('follow_up_Edit'); // This Edit Info Follow Up Profile
            Route::get('Followup/listSignUp', 'listSignUp')->name('listSignUp'); // This Edit Info Follow Up Profile
            Route::get('Followup/addFollowUp', 'addFollowUp')->name('addFollowUp'); // This Edit Info Follow Up Profile
            Route::post('Followup/signUpAdd', 'signUpAdd')->name('signUpAdd'); // This Add New Signup PURCHASE
        });
        Route::get('/Followup/Payout', $controller_path . '\follow_up\FinanceController@payout')->name('FPayout');
    Route::post('/Followup/PayoutAdd', $controller_path . '\follow_up\FinanceController@payout_add')->name('FPayoutAdd');
    Route::get('/Followup/Transaction', $controller_path . '\follow_up\FinanceController@transaction')->name('FTransaction');
         

      });

Route::middleware(['auth','auth.Admin'])->group(function(){ // Check About Teacher Login
       $controller_path = 'App\Http\Controllers';

    // Main Page Route
    Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');
    Route::get('/dashboard/analytics', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');
    Route::get('/dashboard/ecommerce', $controller_path . '\dashboard\Ecommerce@index')->name('dashboard-ecommerce');
         
    // User Admin 
    Route::get('/User_Admin', $controller_path . '\UserAdminController@index')->name('User_Admin');
    Route::post('/User_Admin/Add', $controller_path . '\UserAdminController@add')->name('Add_User_Admin');
    Route::get('/User_Admin_Add', $controller_path . '\UserAdminController@user_admin_add')->name('User_Admin_Add');
    Route::post('/editAdminUser/{id}', $controller_path . '\UserAdminController@edit_admin_user')->name('editAdminUser');
    Route::get('/delAdminUser/{id}', $controller_path . '\UserAdminController@del_admin_user')->name('delAdminUser');
    
    //  'Lessons'
    //Material  
Route::get('/Lesson', $controller_path . '\MaterialController@index')->name('lesson');
Route::post('/materialAdd', $controller_path . '\MaterialController@material_add')->name('materialAdd');
Route::get('/VideoEditorAdd', $controller_path . '\MaterialController@VideoEditorAdd')->name('VideoEditorAdd');
Route::post('/videoEditorAddAction', $controller_path . '\MaterialController@videoEditorAddAction')->name('videoEditorAddAction');
Route::get('/VideoEditorList', $controller_path . '\MaterialController@VideoEditorList')->name('VideoEditorList');
Route::post('/editVideoEditor/{id}', $controller_path . '\MaterialController@editVideoEditor')->name('editVideoEditor');
    // Teacher
    Route::get('/teacher', $controller_path . '\TeacherController@selectTeacher')->name('teacher');
    Route::get('/teacher/Show', $controller_path . '\TeacherController@teachers')->name('teacher_show');
    Route::post('/AddTeacher', $controller_path . '\TeacherController@addTeacher')->name('AddTeacher');
    Route::post('/techer/fetch', $controller_path . '\TeacherController@fetch')->name('teacher.fetch');
    Route::post('/editTeacher', $controller_path . '\TeacherController@editTeacher')->name('editTeacher');
    Route::get('/deleteTecher/{id}', $controller_path . '\TeacherController@deleteTecher')->name('deleteTecher');

    //Sign up   
    Route::get('/signUp', $controller_path . '\SignupController@index')->name('signUp');
    Route::post('/AddSignup', $controller_path . '\SignupController@add_signup')->name('AddSignup');
    Route::get('/signUpPending', $controller_path . '\SignupController@signup_pending')->name('signUpPending');
    Route::get('/signUpApprovedShow', $controller_path . '\SignupController@signup_approved_show')->name('signUpApprovedShow');
    Route::get('/signUpRejectedShow', $controller_path . '\SignupController@signUp_rejected_show')->name('signUpRejectedShow');
    Route::get('/signup_approve/{id}', $controller_path . '\SignupController@signup_approve')->name('signup_approve');
    Route::post('/signup_rejected', $controller_path . '\SignupController@signup_rejected')->name('signup_rejected');

    
    // Bundle
    Route::get('/bundle', $controller_path . '\BundelController@index')->name('bundle');
    Route::get('/bundle/Show', $controller_path . '\BundelController@bundles')->name('bundle_show');
    Route::post('/add_bundle', $controller_path . '\BundelController@add_bundle')->name('add_bundle');
    Route::Get('/editbundel/{id}', $controller_path . '\BundelController@editAtivatonsBundle')->name('edit_actvate_Bundle');
    Route::post('/editbundel/{id}', $controller_path . '\BundelController@editBundle')->name('updateData');
    Route::get('/deleteLanguageBundle/{id}', $controller_path . '\BundelController@deleteSubjectBundle')->name('deleteLanguageBundle');

    //Categories
    Route::get('/categories', $controller_path . '\dashboard\Analytics@categories')->name('categories');
    Route::post('/addCategory', $controller_path . '\dashboard\Analytics@addCategory')->name('addCategory');
    Route::get('/deleteCategory/{id}', $controller_path . '\dashboard\Analytics@deleteCategory')->name('deleteCategory');
    Route::post('/editCategory/{id}', $controller_path . '\dashboard\Analytics@editCategory')->name('editCategory');

      
    // Finance 
    Route::get('/PendingPayout', $controller_path . '\PayoutController@pending_payout')->name('PendingPayout');
    Route::get('/AcceptPayout/{id}', $controller_path . '\PayoutController@accept')->name('AcceptPayout');
    Route::post('/RejectPayout/{id}', $controller_path . '\PayoutController@reject')->name('RejectPayout');
    Route::get('/RejectedPayout', $controller_path . '\PayoutController@rejectedpayout')->name('RejectedPayout');
  
    //Subjects
    Route::get('/subjects', $controller_path . '\SubjectController@subjects')->name('subjects');
    Route::post('/addSubject', $controller_path . '\SubjectController@addSubject')->name('addSubject');
    Route::get('/deleteSubject/{id}', $controller_path . '\SubjectController@deleteSubject')->name('deleteSubject');
    Route::post('/editSubject', $controller_path . '\SubjectController@editSubject')->name('editSubject');

    //Content
    Route::get('/content/{id}', $controller_path . '\ContentController@content')->name('content');

    Route::post('/addLesson', $controller_path . '\ContentController@addLesson')->name('addLesson');
    Route::post('/addChapter', $controller_path . '\ContentController@addChapter')->name('addChapter');
    Route::post('/editSection', $controller_path . '\ContentController@editSection')->name('editSection');
    Route::post('/deleteSection', $controller_path . '\ContentController@deleteSection')->name('deleteSection');
    Route::get('/deleteLesson/{ID}', $controller_path . '\ContentController@deleteLesson')->name('deleteLesson');
    Route::post('/updateLesson', $controller_path . '\ContentController@updateLesson')->name('updateLesson');
  
  
  /* =>  Country & City   <= */    
  Route::get('/country', $controller_path . '\CountryController@index')->name('country');
  Route::post('/addCountry', $controller_path . '\CountryController@addCountry')->name('addCountry');
  Route::post('/editCountry/{id}', $controller_path . '\CountryController@editCountry')->name('editCountry');
  Route::get('/deleteCounry/{id}', $controller_path . '\CountryController@deleteCounry')->name('deleteCounry');

    Route::get('/city', $controller_path . '\CityController@index')->name('city');
    Route::post('/addCities', $controller_path . '\CityController@addCities')->name('addCities'); // Add City 
    Route::get('/deleteCity/{id}', $controller_path . '\CityController@deleteCity')->name('deleteCity'); // Delete City
    Route::post('/editCity', $controller_path . '\CityController@editCity')->name('editCity'); // editCity
// Follow Up 
Route::get('/LeaderFollows', $controller_path . '\FollowUpController@leaderFollows')->name('LeaderFollows');
Route::get('/Follows', $controller_path . '\FollowUpController@follows')->name('Follows');
Route::get('/AddFollow', $controller_path . '\FollowUpController@add_follow')->name('AddFollow');
Route::get('/AddFollowLeader', $controller_path . '\FollowUpController@add_follow_leader')->name('add_follow_leader');
Route::post('/FollowLeader/Add', $controller_path . '\FollowUpController@follow_leader_add')->name('follow_leader_add');
Route::post('/Follow/Add', $controller_path . '\FollowUpController@follow_add')->name('follow_add');
Route::get('/deleteFollowLead/{id}', $controller_path . '\FollowUpController@deleteFollowLead')->name('deleteFollowUp');
Route::post('/editFollowUp{id}', $controller_path . '\FollowUpController@editFollowUp')->name('editFollowUp');

  });


Route::middleware('auth','auth.teacher')->group(function(){ // Check About Teacher Login 
$controller_path = 'App\Http\Controllers';
Route::get('/Teachers', $controller_path .'\Teacher\DashboardController@index')->name('Teachers');
    // Dashboard Teacher

    Route::get('/Teachers', $controller_path . '\Teacher\DashboardController@index')->name('Teachers');
    Route::get('/Teachers/Late', $controller_path . '\Teacher\DashboardController@late')->name('TLate');
    // Subjects Teacher
    Route::get('/Teachers/Subjects', $controller_path . '\Teacher\SubjectsController@index')->name('TSubjects');
    // Signups Teacher
    Route::get('/Teachers/Signups', $controller_path . '\Teacher\SignupController@index')->name('TSignups');
    // Materials
    Route::get('/Teachers/Materials', $controller_path . '\Teacher\MaterialsController@index')->name('TMaterials');
    Route::post('/Teachers/Materials/Edit', $controller_path . '\Teacher\MaterialsController@m_edit')->name('TMaterialsEdit');
    // Profile Teacher 
    Route::get('/Teachers/Profile', $controller_path . '\Teacher\ProfileController@index')->name('TProfile');
    Route::post('/Teachers/Profile/Edit/{id}', $controller_path . '\Teacher\ProfileController@edit')->name('TEditProfile');
    
    // Finance
    Route::get('/Teachers/Payout', $controller_path . '\Teacher\FinanceController@index')->name('TPayout');
    Route::post('/Teachers/Payout/Add', $controller_path . '\Teacher\FinanceController@payout_add')->name('TPayoutAdd');
    Route::get('/Teachers/Transaction', $controller_path . '\Teacher\FinanceController@transaction')->name('TTransaction');

        });


        Route::middleware('auth','auth.user_admin')->group(function(){

       $controller_path = 'App\Http\Controllers';
       // _____________________________ User Admin ______________________________________

Route::get('/UserAdmin/dashboard', $controller_path . '\UserAdmin\DashboardController@index')->name('UserAdmin');
Route::post('/UserAdmin/materialUserAdminAdd', $controller_path . '\UserAdmin\DashboardController@material')->name('materialUserAdminAdd');

Route::get('/UserAdmin/profile', $controller_path . '\UserAdmin\ProfileController@index')->name('user_admin_profile');
Route::post('/UserAdmin/profile/Edit/{id}', $controller_path . '\UserAdmin\ProfileController@edit')->name('UAdminEditProfile');

// ___________________________ End User Admin ____________________________________

        });