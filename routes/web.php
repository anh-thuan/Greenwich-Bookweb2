<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\PostController;

use App\Models\Contribution;
use App\Models\User;
Route::get('/', function () {

    $participants = User::where('role_id', 4)->Count();
    $contributions= Contribution::where('status', 'approved')
    ->where(function($query) {
        $query->where('popular', '1')
              ->orWhere('popular', '0');
    })
    ->count();
    
    $popularstudent = Contribution::where('status', 'approved')
                               ->where('popular', '1')
                               ->get();
    $student= Contribution::where('status', 'approved')
                            ->simplePaginate(5);
    return view('welcome',compact('popularstudent', 'contributions', 'student', 'participants'));
});

Route::get('student/welcome/info/{id}',[DashboardController::class,'info'])->name('welcome/info');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashBoardController::class, 'show']);

//ADMIN
    //User
    Route::get('admin/user/list', [UserController::class, 'list']);
    Route::get('admin/user/add', [UserController::class, 'add']);
    Route::post('admin/user/store', [UserController::class, 'store']);
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit'])->name('user/edit');
    Route::post('admin/user/update/{id}', [UserController::class, 'update'])->name('user/update');
    Route::get('admin/user/delete/{id}', [UserController::class, 'delete'])->name('user/delete');

    Route::get('/user/list',[UserController::class,'list'])->name('user/list')->can('user/list');
    Route::get('/user/add',[UserController::class,'add'])->name('user/add')->can('user/add');
    Route::post('/user/store',[UserController::class,'store'])->name('user/store')->can('user/add');
    Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user/edit')->can('user/edit');
    Route::post('/user/update/{id}',[UserController::class,'update'])->name('user/update')->can('user/edit');
    Route::get('/user/delete/{id}',[UserController::class,'delete'])->name('user/delete')->can('user/delete');

    //Permission
    Route::get('admin/permission/add', [PermissionController::class, 'add']);
    Route::post('admin/permission/store', [PermissionController::class, 'store']);
    Route::get('admin/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission/edit');
    Route::post('admin/permission/update/{id}', [PermissionController::class, 'update'])->name('permission/update');
    Route::get('admin/permission/delete/{id}', [PermissionController::class, 'delete'])->name('permission/delete');

    Route::get('/permission/add',[PermissionController::class,'add'])->name('permission/add')->can('permission/add');
    Route::post('/permission/store',[PermissionController::class,'store'])->name('permission/store')->can('permission/add');
    Route::get('/permission/edit/{id}',[PermissionController::class,'edit'])->name('permission/edit')->can('permission/edit');
    Route::post('/permission/update/{id}',[PermissionController::class,'update'])->name('permission/update')->can('permission/edit');
    Route::get('/permission/delete/{id}',[PermissionController::class,'delete'])->name('permission/delete')->can('permission/delete');

    //Role
    Route::get('admin/role/list', [RoleController::class, 'list']);
    Route::get('admin/role/add', [RoleController::class, 'add']);
    Route::post('admin/role/store', [RoleController::class, 'store']);
    Route::get('admin/role/edit/{role}', [RoleController::class, 'edit'])->name('role/edit');
    Route::post('admin/role/update/{role}', [RoleController::class, 'update'])->name('role/update');
    Route::get('admin/role/delete/{role}', [RoleController::class, 'delete'])->name('role/delete');

    Route::get('/role',[RoleController::class,'list'])->name('role/list')->can('role/list');
    Route::get('/role/add',[RoleController::class,'add'])->name('role/add')->can('role/add');
    Route::post('/role/store',[RoleController::class,'store'])->name('role/store')->can('role/add');
    Route::get('/role/edit/{role}',[RoleController::class,'edit'])->name('role/edit')->can('role/edit');
    Route::post('/role/update/{role}',[RoleController::class,'update'])->name('role/update')->can('role/edit');
    Route::get('/role/delete/{role}',[RoleController::class,'delete'])->name('role/delete')->can('role/delete');

    //Semester
    Route::get('admin/semester/add', [SemesterController::class, 'add']);
    Route::post('admin/semester/store', [SemesterController::class, 'store']);
    Route::get('admin/semester/edit/{id}', [SemesterController::class, 'edit'])->name('semester/edit');
    Route::post('admin/semester/update/{id}', [SemesterController::class, 'update'])->name('semester/update');
    Route::get('admin/semester/delete/{id}', [SemesterController::class, 'delete'])->name('semester/delete');

    Route::get('/semester/add',[SemesterController::class,'add'])->name('semester/add')->can('semester/add');
    Route::post('/semester/store',[SemesterController::class,'store'])->name('semester/store')->can('semester/add');
    Route::get('/semester/edit/{id}',[SemesterController::class,'edit'])->name('semester/edit')->can('semester/edit');
    Route::post('/semester/update/{id}',[SemesterController::class,'update'])->name('semester/update')->can('semester/edit');
    Route::get('/semester/delete/{id}',[SemesterController::class,'delete'])->name('semester/delete')->can('semester/delete');

    //Faculty
    Route::get('admin/faculty/list', [FacultyController::class, 'list']);
    Route::get('admin/faculty/add', [FacultyController::class, 'add']);
    Route::post('admin/faculty/store', [FacultyController::class, 'store']);
    Route::get('admin/faculty/edit/{id}', [FacultyController::class, 'edit'])->name('faculty/edit');
    Route::post('admin/faculty/update/{id}', [FacultyController::class, 'update'])->name('faculty/update');
    Route::get('admin/faculty/delete/{id}', [FacultyController::class, 'delete'])->name('faculty/delete');

    Route::get('/faculty/list',[FacultyController::class,'list'])->name('faculty/list')->can('faculty/list');
    Route::get('/faculty/add',[FacultyController::class,'add'])->name('faculty/add')->can('faculty/add');
    Route::post('/faculty/store',[FacultyController::class,'store'])->name('faculty/store')->can('faculty/add');
    Route::get('/faculty/edit/{id}',[FacultyController::class,'edit'])->name('faculty/edit')->can('faculty/edit');
    Route::post('/faculty/update/{id}',[FacultyController::class,'update'])->name('faculty/update')->can('faculty/edit');
    Route::get('/faculty/delete/{id}',[FacultyController::class,'delete'])->name('faculty/delete')->can('faculty/delete');

//COORDINATOR
    //Post
    Route::get('coordinator/post/list',[PostController::class,'list']);
    Route::get('coordinator/post/edit/{id}',[PostController::class,'edit'])->name('post/edit');
    Route::post('coordinator/post/update/{id}',[PostController::class,'update'])->name('post/update');

    Route::get('/post/list',[PostController::class,'list'])->name('post/list')->can('post/list');
    Route::get('/post/edit/{id}',[PostController::class,'edit'])->name('post/edit')->can('post/edit');
    Route::post('/post/update/{id}',[PostController::class,'update'])->name('post/update')->can('post/edit');


//STUDENT
    //Dashboard
    Route::get('dashboard/student/info/{id}',[ContributionController::class,'info'])->name('student/info');
    Route::get('dashboard/studentinfo/showfile/{contribution}', [ContributionController::class, 'viewfile'])->name('studentinfo/showfile');

    //ZipDownload (Coordinator)
    Route::post('coordinator/contribution/zipfile',[ContributionController::class, 'zipfile'])->name('contribution/zipfile');
    Route::get('coordinator/contribution/downloadzipfile/{contribution}', [ContributionController::class, 'viewfile'])->name('contribution/downloadzipfile');

    //ZipDownload (Student)
    Route::post('student/contribution/zipfile',[ContributionController::class, 'zipfile'])->name('contribution/zipfile');
    Route::get('student/contribution/downloadzipfile/{contribution}', [ContributionController::class, 'viewfile'])->name('contribution/downloadzipfile');

    //ZipDownload (manger)
    Route::post('manager/contribution/zipfile',[ManagementController::class, 'zipfile'])->name('contribution/zipfile');
    Route::get('manager/contribution/downloadzipfile/{contribution}', [ManagementController::class, 'viewfile'])->name('contribution/downloadzipfile');

        
    Route::get('student/contribution/list', [ContributionController::class, 'list']);
    Route::get('student/contribution/add', [ContributionController::class, 'add']);
    Route::post('student/contribution/store', [ContributionController::class, 'store'])->name('contribution/store');
    Route::get('student/contribution/edit/{id}', [ContributionController::class, 'edit'])->name('contribution/edit');
    Route::post('student/contribution/update/{id}', [ContributionController::class, 'update'])->name('contribution/update');
    Route::get('student/contribution/delete/{id}', [ContributionController::class, 'delete'])->name('contribution/delete');

    Route::get('/contribution/list', [ContributionController::class, 'list'])->name('contribution/list')->can('contribution/list');
    Route::get('/contribution/add', [ContributionController::class, 'add'])->name('contribution/add')->can('contribution/add');
    Route::post('/contribution/store', [ContributionController::class, 'store'])->name('contribution/store')->can('contribution/add');
    Route::get('/contribution/edit/{id}', [ContributionController::class, 'edit'])->name('contribution/edit')->can('contribution/edit');
    Route::post('/contribution/update/{id}', [ContributionController::class, 'update'])->name('contribution/update')->can('contribution/edit');
    Route::get('/contribution/delete/{id}', [ContributionController::class, 'delete'])->name('contribution/delete')->can('contribution/delete');
    // Route::get('student/contribution/restore/{id}', [ContributionController::class, 'restore'])->name('contribution/restore');

    //History
    Route::get('student/contribution/history/list',[ContributionController::class,'historylist']);
    Route::get('/contribution/historylist',[ContributionController::class,'historylist'])->name('contribution/historylist')->can('contribution/historylist');

//All (Coordinator, Manager, Student)
    Route::get('management/allpost/list',[ManagementController::class,'list']);
    Route::get('/allpost/list',[ManagementController::class,'list'])->name('allpost/list')->can('allpost/list');
});
