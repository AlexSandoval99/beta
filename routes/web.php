<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (){
    Route::group(['namespace' => 'App\Http\Controllers'], function (){
        Route::get('/', 'UserController@index');
        Route::get('/home','UserController@index')->name('home');
        Route::get("/profile/{id}", 'UserController@profile')->name('profile');
        Route::get('/settings-profile/{id}', 'UserController@settingsProfile')->name('settings-profile');
        Route::get('/community', 'UserController@community')->name('community');
        Route::get('/notifications', 'UserController@notifications')->name('notifications');
        Route::get('/group/{id}', 'CommunityController@getCommunitys')->name('group');
        Route::get('/new-group', 'CommunityController@newGroup')->name('new-group');

        //CREATE POST
        Route::post('/home', 'PostController@store')->name('store');
        Route::post('/community', 'FriendRequestController@addFriend')->name('friend-store');
        Route::post('/notifications', 'CommentsController@store')->name('comments-store');
        Route::post('/search', 'UserController@searchStore')->name('search-store');
        Route::post('/settings-profile/{id}', 'UserController@addCompany')->name('settings-profile-professional');
        Route::post('/group', 'CommunityController@createNewCommunity')->name('new-group-store');

        //UPDATE POST
        Route::put('/home', 'UserController@update')->name('update');
        Route::put('/notifications', 'FriendRequestController@requestFriend')->name('friend-request');
        Route::put('/profile/{id}', 'UserController@store')->name('user-store');
        Route::put('/settings-profile/{id}', 'UserController@addAboutUser')->name('add-about-user');
        Route::put('/group/{id}', 'CommunityController@participateInTheCommunity')->name('groups-store');
    });
});


require __DIR__.'/auth.php';
