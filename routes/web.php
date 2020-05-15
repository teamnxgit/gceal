<?php

Route::get('/', 'WebController@index');

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('LMS','LMSController');

    

    /* Start : Routes for Users */
    // Views
    Route::get('/lms', 'LMSController@index');
    Route::get('/home', 'LMSController@index')->name('home');
    Route::get('/lms/profile','ProfileController@profile');
    Route::get('/lms/account/','UserController@account');
    // Profile
    Route::post('/lms/profile/update','ProfileController@update');
    // Role Request
    Route::post('/lms/account/accountrequest','UserController@requestrole');
    /* End : Routes for Users */


    /* Start : Routes for Student Role */
    // Views

    // Enrolling Subjects
    Route::post('/lms/account/enroll','UserController@enrollSubject');
    //Activity
    Route::get('/lms/activity/veiw/{activity_id}', 'ActivityController@viewActivity');
    Route::get('/lms/activity/do/{activity_id}', 'ActivityController@doActivity');
    Route::get('/lms/activity/attempt/{activity_id}/{content_id}', 'ActivityController@doActivity');
    /* End : Routes for Student Role */


    /* Start : Routes for Teacher Role */
    // Views
    Route::get('/lms/dashboard', 'LMSController@index');
    Route::get('/lms/myposts', 'PostController@userPosts');
    Route::get('/lms/myactivities', 'ActivityController@userActivities');
    Route::get('/lms/mymcqs', 'MCQController@userMCQs');
    Route::get('/lms/myquestions', 'QuestionController@userQuestions');
    Route::get('/lms/myarticles', 'ArticleController@userArticles');
    // Subject Request
    Route::post('/lms/account/teachsubject', 'UserController@teachsubject');
    // MCQs
    Route::get('/lms/mcq/new', 'MCQController@new');
    Route::post('/lms/mcq/update', 'MCQController@update');
    Route::post('/lms/mcq/search', 'MCQController@search');
    // Activity
    Route::get('/lms/activity/new', 'ActivityController@new');
    Route::post('/lms/activity/update', 'ActivityController@update');
    Route::get('/lms/activity/{activity_id}', 'ActivityController@editActivity');
    Route::get('/lms/activity/{activity_id}/fetch/mcq/', 'ActivityController@fetchMCQ');
    Route::get('/lms/activity/{activity_id}/add/mcq/{mcq_id}', 'ActivityController@addMCQ');
    Route::get('/lms/activity/{activity_id}/remove/mcq/{mcq_id}', 'ActivityController@removeMCQ');
    Route::get('/lms/activity/{activity_id}/add/article/{article_id}', 'ActivityController@addArticle');
    Route::get('/lms/activity/{activity_id}/remove/article/{article_id}', 'ActivityController@removeArticle');
    Route::get('/lms/activity/{activity_id}/add/question/{question_id}', 'ActivityController@addQuestion');
    Route::get('/lms/activity/{activity_id}/remove/question/{question_id}', 'ActivityController@removeQuestion');
    /* End : Routes for Teacher Role */

    /* Start : Routes for LMS Admin Role & Sys Admin Role*/
    // Views
    Route::get('/lms/posts', 'PostController@index');
    Route::get('/lms/users', 'UserController@users');
    Route::get('/lms/rolerequests', 'UserController@roleRequest');
    // Users
    Route::post('/lms/users/search','UserController@search');
    // Role Requests
    Route::post('/lms/rolerequests/accept', 'UserController@acceptRoleRequest');
    Route::post('/lms/rolerequests/decline', 'UserController@declineRoleRequest');
    Route::post('/lms/rolerequests/delete', 'UserController@deleteRoleRequest');
    
});
