<?php

Route::get('lang/{lang}', 'LanguageController@swap')->name('lang.swap');
Route::get('/', 'HomeController@index')->name('index');

Route::get('about', 'HomeController@about')->name('about');

Route::get('privacy-policy', 'HomeController@privacy')->name('privacy-policy');
Route::get('terms-&-conditions', 'HomeController@term')->name('terms-&-conditions');
Route::get('faq', 'HomeController@faq')->name('faq');


Route::get('contact', 'ContactController@contact')->name('contact');
Route::post('message','ContactController@message')->name('message');
Route::get('profile','ProfileController@profile')->name('profile'); //profile principal
Route::get('account','ProfileController@account')->name('account'); // account 
Route::get('image','ProfileController@image')->name('image'); // route to upload the image
Route::post('updateprofile', 'ProfileController@updateProfile');
Route::match(['put','patch'],'edit_profile','ProfileController@edit_profile')->name('edit_profile');

Route::get('book', 'BooksController@index')->name('book');
Route::get('book/{slug}', ['uses' => 'BooksController@show', 'as' => 'books.show']);

Route::get('course/{slug}', ['uses' => 'CoursesController@show', 'as' => 'courses.show']);
Route::get('teacher/{teacher_slug}', ['uses' => 'TeacherController@show', 'as' => 'teacher.show']);
Route::post('course/payment', ['uses' => 'CoursesController@payment', 'as' => 'courses.payment']);
Route::post('course/{course_id}/rating', ['uses' => 'CoursesController@rating', 'as' => 'courses.rating']);

Route::post('lesson/createComment', 'LessonsController@createComment');
Route::post('lesson/deleteComment', 'LessonsController@deleteComment');
Route::post('lesson/editComment', 'LessonsController@editComment');

Route::get('lesson/{course_id}/{slug}', ['uses' => 'LessonsController@show', 'as' => 'lessons.show'])->middleware('check_pay');
Route::post('lesson/{slug}/test', ['uses' => 'LessonsController@test', 'as' => 'lessons.test']);

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
//auth
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');


// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');
   //facebook socialite
    Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
    Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

 Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle')->name('login.google');
 Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');

 Route::get('login/linkedin', 'Auth\LoginController@redirectToProviderLinkedin')->name('login.linkedin');
 Route::get('login/linkedin/callback', 'Auth\LoginController@handleProviderCallbackLinkedin');



Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'Admin\DashboardController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('courses', 'Admin\CoursesController');
    Route::post('courses_mass_destroy', ['uses' => 'Admin\CoursesController@massDestroy', 'as' => 'courses.mass_destroy']);
    Route::post('courses_restore/{id}', ['uses' => 'Admin\CoursesController@restore', 'as' => 'courses.restore']);
    Route::delete('courses_perma_del/{id}', ['uses' => 'Admin\CoursesController@perma_del', 'as' => 'courses.perma_del']);
    Route::resource('lessons', 'Admin\LessonsController');
    Route::post('lessons_mass_destroy', ['uses' => 'Admin\LessonsController@massDestroy', 'as' => 'lessons.mass_destroy']);
    Route::post('lessons_restore/{id}', ['uses' => 'Admin\LessonsController@restore', 'as' => 'lessons.restore']);
    Route::delete('lessons_perma_del/{id}', ['uses' => 'Admin\LessonsController@perma_del', 'as' => 'lessons.perma_del']);
    Route::resource('questions', 'Admin\QuestionsController');
    Route::post('questions_mass_destroy', ['uses' => 'Admin\QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
    Route::post('questions_restore/{id}', ['uses' => 'Admin\QuestionsController@restore', 'as' => 'questions.restore']);
    Route::delete('questions_perma_del/{id}', ['uses' => 'Admin\QuestionsController@perma_del', 'as' => 'questions.perma_del']);
    Route::resource('questions_options', 'Admin\QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'Admin\QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    Route::post('questions_options_restore/{id}', ['uses' => 'Admin\QuestionsOptionsController@restore', 'as' => 'questions_options.restore']);
    Route::delete('questions_options_perma_del/{id}', ['uses' => 'Admin\QuestionsOptionsController@perma_del', 'as' => 'questions_options.perma_del']);
    Route::resource('tests', 'Admin\TestsController');
    Route::get('lessons/{id}', 'Admin\TestsController@getLesson');

    /*
    Route::resource('tests',['uses'=>'Admin\TestsController']);
    Route::get('lessons/{id}', ['uses'=>'Admin\TestsController@getLesson']);
    */
    Route::post('tests_mass_destroy', ['uses' => 'Admin\TestsController@massDestroy', 'as' => 'tests.mass_destroy']);
    Route::post('tests_restore/{id}', ['uses' => 'Admin\TestsController@restore', 'as' => 'tests.restore']);
    Route::delete('tests_perma_del/{id}', ['uses' => 'Admin\TestsController@perma_del', 'as' => 'tests.perma_del']);
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');
    Route::resource('contacts', 'Admin\ContactsController');
    Route::post('contacts_mass_destroy', ['uses' => 'Admin\ContactsController@massDestroy', 'as' => 'contacts.mass_destroy']);

Route::resource('books', 'Admin\BooksController');
    Route::post('books_mass_destroy', ['uses' => 'Admin\BooksController@massDestroy', 'as' => 'books.mass_destroy']);
    Route::post('books_restore/{id}', ['uses' => 'Admin\BooksController@restore', 'as' => 'books.restore']);
    Route::delete('books_perma_del/{id}', ['uses' => 'Admin\BooksController@perma_del', 'as' => 'books.perma_del']);
 

});
