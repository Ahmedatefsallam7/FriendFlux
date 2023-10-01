<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Pages;
use App\Http\Livewire\Groups;
use App\Http\Livewire\Peoples;
use App\Http\Livewire\SavedPost;
use App\Http\Livewire\CreatePage;
use App\Http\Livewire\SinglePage;
use App\Http\Livewire\VideoPosts;
use App\Http\Livewire\CreateGroup;
use App\Http\Livewire\SingleGroup;
use App\Http\Livewire\UserProfile;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Settings\Socials;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\vendor\Chatify\MessagesController;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\Search;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

date_default_timezone_set('Africa/Cairo');

Route::middleware(['auth', 'verified'])->group(function () {

    //home
    Route::get('/', Home::class);

    // people
    Route::get('/explore-people', Peoples::class)->name('people');
    Route::get('/user/{uuid}', UserProfile::class)->name('user-profile');

    //pages
    Route::get('/pages', Pages::class)->name('pages');
    Route::get('page/{uuid}', SinglePage::class)->name('single-page');
    Route::get('/pages/create', CreatePage::class)->name('create-page');

    //groups
    Route::get('/groups', Groups::class)->name('groups');
    Route::get('/group/{uuid}', SingleGroup::class)->name('single-group');
    Route::get('/groups/create', CreateGroup::class)->name('create-group');

    //settings
    Route::get('settings', \App\Http\Livewire\Settings\Setting::class)->name('settings');
    Route::get('account-information', \App\Http\Livewire\Settings\AccountInformation::class)->name('settings.account_information');

    Route::prefix('settings')->group(function () {
        Route::get('posts', SavedPost::class)->name('saved-posts');
        Route::get('post/{post:uuid}', [SavedPost::class, 'savePost'])->name('save-post');
        Route::get('social/accounts', Socials::class)->name('social');
    });

    //videos
    Route::get('/videos', VideoPosts::class)->name('videos');


    //chat
    Route::get('/chat/with/{user:user_name}', [MessagesController::class, 'index'])->name('chatUser');

    //search

    Route::get('/search', Search::class)->name('search');
});

require __DIR__ . '/auth.php';
