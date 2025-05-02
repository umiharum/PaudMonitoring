<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['is_admin'])->group(function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
    Route::get('/admin/daftar-kelas', [KelasController::class, 'viewClass']);
    Route::get('/admin/tambah-kelas', [KelasController::class, 'addClass']);
    Route::post('/admin/save-class', [KelasController::class, 'saveClass']);
    Route::get('/admin/ubah-kelas/{kelasID}', [KelasController::class, 'editClass']);
    Route::post('/admin/update-class', [KelasController::class, 'updateClass']);
    Route::get('/admin/hapus-kelas/{kelasID}', [KelasController::class, 'deleteClass']);
    Route::get('/admin/daftar-guru', [TeacherController::class, 'viewTeacher']);
    Route::get('/admin/tambah-guru', [TeacherController::class, 'addTeacher']);
    Route::post('/admin/save-teacher', [TeacherController::class, 'saveTeacher']);
    Route::get('/admin/ubah-guru/{teacherID}', [TeacherController::class, 'editTeacher']);
    Route::post('/admin/update-teacher', [TeacherController::class, 'updateTeacher']);
    Route::get('/admin/hapus-guru/{teacherID}', [TeacherController::class, 'deleteTeacher']);
    Route::get('/admin/daftar-murid', [StudentController::class, 'viewStudent']);
    Route::get('/admin/tambah-murid', [StudentController::class, 'addStudent']);
    Route::post('/admin/save-student', [StudentController::class, 'saveStudent']);
    Route::get('/admin/ubah-murid/{studentID}', [StudentController::class, 'editStudent']);
    Route::post('/admin/update-student', [StudentController::class, 'updateStudent']);
    Route::get('/admin/hapus-murid/{studentID}', [StudentController::class, 'deleteStudent']);
    Route::get('/admin/kelas/{kelasID}', [KelasController::class, 'viewTheClass']);
    Route::post('/admin/save-addMurid', [KelasController::class, 'saveAddMurid']);
    Route::post('/admin/save-addGuru', [KelasController::class, 'saveAddGuru']);
});

Route::middleware(['is_teacher'])->group(function () {
    Route::get('/teacher/home', [HomeController::class, 'teacherHome'])->name('teacher.home')->middleware('is_teacher');
    Route::get('/kelas/{kelasID}', [KelasController::class, 'viewClass']);
    Route::get('/teacher/buat-laporan-harian', [TeacherController::class, 'reportHome']);
    Route::get('/teacher/buat-laporan-harian/{studentID}', [TeacherController::class, 'createReport']);
    Route::post('/teacher/save-report/{studentID}', [TeacherController::class, 'saveReport']);
    Route::get('/teacher/buat-laporan-bulanan', [TeacherController::class, 'monthlyReportHome']);
    Route::get('/teacher/buat-laporan-bulanan/{studentID}', [TeacherController::class, 'createMonthlyReport']);
    Route::post('/teacher/save-report-month/{studentID}', [TeacherController::class, 'saveMonthlyReport']);
});
