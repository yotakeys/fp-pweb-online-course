<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('/catalog', [CourseController::class, 'catalogIndex'])->name('catalog.index');
Route::get('/catalog/filter', [CourseController::class, 'catalogFilter'])->name('catalog.filter');
Route::get('/catalog/sort', [CourseController::class, 'catalogSort'])->name('catalog.sort');

Route::get('/pricing', [PlanController::class, 'index'])->name('pricing.index');

Route::get('/dashboard', function () {
    return view('reader.dashboard');
})->middleware(['auth', 'verified', 'reader'])->name('dashboard');

Route::middleware(['auth', 'verified', 'reader'])->group(function () {
    Route::get('/reader/catalog', [CourseController::class, 'getAllCourseReader'])->name('reader.catalog');
    Route::get('/reader/catalog/filter', [CourseController::class, 'readerCatalogfilter'])->name('reader.catalog.filter');
    Route::get('/reader/catalog/sort', [CourseController::class, 'readerCatalogSort'])->name('reader.catalog.sort');
    Route::get('/reader/pricing', [PlanController::class, 'getAllPlanReader'])->name('reader.pricing');

    Route::get('/reader/course/{id}', [CourseController::class, 'courseDetailReader'])->name('reader.course.detail');

    Route::get('/reader/course/{course_id}/section/{section_id}', [SectionController::class, 'sectionDetailReader'])->middleware('subscribed')->name('reader.section.detail');

    Route::get('/reader/transaksi', [TransaksiController::class, 'getAllTransaksiReader'])->name('reader.transaksi.list');
    Route::get('/reader/transaksi/form/{id}', [TransaksiController::class, 'formAddTransaksi'])->middleware('planned')->name('reader.transaksi.form-add');
    Route::get('/reader/transaksi/{id}', [TransaksiController::class, 'formEditTransaksi'])->middleware('transaksi.owner')->name('reader.transaksi.form-edit');
    Route::patch('/reader/transaksi/{id}', [TransaksiController::class, 'editTransaksi'])->name('reader.transaksi.edit');
    Route::post('/reader/transaksi', [TransaksiController::class, 'addTransaksi'])->name('reader.transaksi.add');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/list-course', [CourseController::class, 'getAllCourseAdmin'])->name('admin.course.list');
    Route::get('/admin/list-course/filter', [CourseController::class, 'adminCoursefilter'])->name('admin.course.filter');
    Route::get('/admin/list-course/sort', [CourseController::class, 'adminCourseSort'])->name('admin.course.sort');
    Route::get('/admin/add-course', [CourseController::class, 'formAddCourse'])->name('admin.course.form-add');
    Route::post('/admin/add-course', [CourseController::class, 'addCourse'])->name('admin.course.add');
    Route::get('/admin/course/{id}/edit', [CourseController::class, 'formEditCourse'])->name('admin.course.form-edit');
    Route::patch('/admin/course/{id}/edit', [CourseController::class, 'editCourse'])->name('admin.course.edit');
    Route::get('/admin/course/{id}', [CourseController::class, 'courseDetailAdmin'])->name('admin.course.detail');
    Route::delete('/admin/course/{id}', [CourseController::class, 'deleteCourse'])->name('admin.course.delete');

    Route::get('/admin/course/{course_id}/section', [SectionController::class, 'formAddSection'])->name('admin.section.form-add');
    Route::post('/admin/course/{course_id}/section', [SectionController::class, 'addSection'])->name('admin.section.add');
    Route::get('/admin/course/{course_id}/section/{section_id}/edit', [SectionController::class, 'formEditSection'])->name('admin.section.form-edit');
    Route::patch('/admin/course/{course_id}/section/{section_id}/edit', [SectionController::class, 'editSection'])->name('admin.section.edit');
    Route::delete('/admin/course/{course_id}/section/{section_id}', [SectionController::class, 'deleteSection'])->name('admin.section.delete');
    Route::get('/admin/course/{course_id}/section/{section_id}', [SectionController::class, 'sectionDetailAdmin'])->name('admin.section.detail');

    Route::get('/admin/transaksi', [TransaksiController::class, 'getAllTransaksiAdmin'])->name('admin.transaksi.list');
    Route::get('/admin/transaksi/{id}', [TransaksiController::class, 'transaksiDetailAdmin'])->name('admin.transaksi.detail');
    Route::patch('/admin/transaksi/{id}', [TransaksiController::class, 'changeStatusTransaksi'])->name('admin.transaksi.change-status');

    Route::get('admin/summary', [TransaksiController::class, 'summary'])->name('admin.summary');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
