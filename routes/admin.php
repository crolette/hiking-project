
<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'admin:1')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name
    ('admin.dashboard');
    Route::get('/admin/add-tag', [AdminController::class, 'addTag'])->name('admin.add-tag');
    Route::post('/admin/add-tag', [TagsController::class, 'store'])->name('tag.store');
    Route::get('/admin/search-users', [AdminController::class, 'searchUsers'])->name('admin.search-users');
    Route::post('/admin/search-users', [AdminController::class, 'displayUsers'])->name('admin.display-users');
        
    Route::get('/admin/edit-user/id={id}', [AdminController::class, 'editUser'])->name('admin.edit-user');
    Route::post('/admin/edit-user/id={id}', [AdminController::class, 'editUser'])->name('admin.edit-user');


    Route::get('/admin/search-hikes', [AdminController::class, 'searchHikes'])->name('admin.search-hikes');
    Route::post('/admin/search-hikes', [AdminController::class, 'displayHikes'])->name('admin.display-hikes');

     Route::get('/admin/edit-hike/id={id}', [AdminController::class, 'editHike'])->name('admin.edit-hike');
    Route::post('/admin/edit-hike/id={id}', [AdminController::class, 'editHike'])->name('admin.edit-hike');



    Route::get('/admin/search-tags', [AdminController::class, 'searchTags'])->name('admin.search-tags');
    Route::post('/admin/search-tags', [AdminController::class, 'displayTags'])->name('admin.display-tags');

     Route::get('/admin/edit-tag/id={id}', [AdminController::class, 'editTag'])->name('admin.edit-tag');
    Route::post('/admin/edit-tag/id={id}', [AdminController::class, 'editTag'])->name('admin.edit-tag');



});

?>