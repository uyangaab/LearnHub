<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('/teacher/manage-courses', [TeacherController::class, 'manageCourses'])->name('teacher.manage.courses');
    Route::resource('courses', CourseController::class);
    Route::resource('assignments', AssignmentController::class);
    Route::resource('exams', ExamController::class);
    Route::get('/teacher/reports', [ReportController::class, 'teacherReports'])->name('teacher.reports');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.users.index');
    Route::get('/admin/manage-users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/manage-users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/manage-users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/manage-users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/manage-users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::get('/admin/reports', [ReportController::class, 'adminReports'])->name('admin.reports');
});

Route::middleware(['student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/student/view-courses', [StudentController::class, 'viewCourses'])->name('student.courses');
    Route::get('/student/assignments', [AssignmentController::class, 'studentAssignments'])->name('student.assignments');
    Route::get('/student/exams', [ExamController::class, 'studentExams'])->name('student.exams');
    Route::get('/student/results', [ReportController::class, 'studentResults'])->name('student.results');
});

Route::get('/login', [LoginController::class, 'auth.login'])->name('login');
Route::get('/register', [RegisterController::class, 'auth.register'])->name('register');

require __DIR__.'/auth.php';
