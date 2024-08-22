<?php

use App\Models\Grades;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\StrandController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SubTeacherController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\TeacherScheduleController;

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
// Homepage

// Route::get('/users/home', [HomeController::class, 'home']);
Route::get('/', function () {
    
    return view('users.home');
    
});

Route::group(['middleware' => ['auth','admin:admin']], function()
{
    Route::get("/admin/layout", [UserController::class,
     'admin_dashboard'])->name('admin.layout');
     // {-------------------------------------------ADMIN CONTROLLER---------------------------------------------------}

Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('auth');

//FOR TEACHER CONTROLLER

Route::get('/teachers/add_teacher', [AdminController::class, 'create']);
Route::post('/store_teacher', [AdminController::class, 'store']);
Route::get('/teachers/all_teacher', [AdminController::class, 'showteacher']);
Route::get('/teachers/{teacher}/edit_teacher', [AdminController::class, 'edit_teacher'])->middleware('auth');
Route::put('/teachers/{teacher}', [AdminController::class, 'update_teacher'])->middleware('auth');
Route::get('/teachers/{teacher}/view_teacher', [AdminController::class, 'view_teacher'])->middleware('auth');
// DELETE THE SECTION
Route::get('/delete_teacher/{id}', [AdminController::class, 'delete_teacher'])->middleware('auth');
// FOR STUDENT CONTROLLER
Route::get('/students/add_student', [AdminController::class, 'add_student'])->middleware('auth');
Route::post('/store_student', [AdminController::class, 'store_student'])->middleware('auth');
Route::get('/students/all_student', [AdminController::class, 'all_student'])->middleware('auth');
Route::get('/students/{student}/edit_student', [AdminController::class, 'edit_student']);
Route::get('/students/{transcript}/view', [AdminController::class, 'view']);
Route::put('/students/{student}', [AdminController::class, 'update_student'])->middleware('auth');
Route::get('/students/{student}/view_student', [AdminController::class, 'view_student'])->middleware('auth');


// REQUEST OF TOR
// View Request form in the admin
Route::get('/admin/show_request', [AdminController::class, 'show_request'])->middleware('auth');
// show form rejected message
// Route::get('/transcript/{transcript}/reject_message', [AdminController::class, 'reject_message'])->middleware('auth');
// // submit rejected tor
// Route::put('/transcript/{transcript}', [AdminController::class, 'submit_message'])->middleware('auth');
// show form rejected message
Route::get('/transcript/{transcript}/released_date', [AdminController::class, 'released_date'])->middleware('auth');
// submit released date tor
Route::put('/transcript/{transcript}', [AdminController::class, 'submit_date'])->middleware('auth');
// Approved Request
Route::get('/approved/{id}', [AdminController::class, 'approved'])->middleware('auth');
// Reject Request
Route::get('/rejected/{id}', [AdminController::class, 'rejected'])->middleware('auth');
// show form 137
Route::get('/admin/{transcript}/form137', [AdminController::class, 'form137'])->middleware('auth');
// {---------------------------------------------USER CONTROLLER---------------------------------------------------}
Route::get('/admin/showuser', [UserController::class, 'showuser']);
Route::get('/admin/add_user', [UserController::class, 'add_user']);
Route::post('/store_user', [UserController::class, 'store_user']);
Route::get('/admin/teacher_user', [UserController::class, 'teacher_user']);
Route::get('/admin/student_user', [UserController::class, 'student_user']);

// {---------------------------------STRAND CONTROLLER-------------------------------------------------------}
// View Add Form of Strand
Route::get('/admin/add_strand', [StrandController::class, 'add_strand'])->middleware('auth');
// store strand
Route::post('/create_strand', [StrandController::class, 'create_strand'])->middleware('auth');
// view data of all strand
Route::get('/admin/all_strand', [StrandController::class, 'showstrand'])->middleware('auth');
// show edit form of strand
Route::get('/admin/{strand}/edit_strand', [StrandController::class, 'edit_strand'])->middleware('auth');
//Submit to Update strand data
Route::put('/admin/{strand}', [StrandController::class, 'update_strand'])->middleware('auth');
// Delete Strand
Route::get('/delete_strand/{id}', [StrandController::class, 'delete_strand']);
// {---------------------------------SUBJECT CONTROLLER-------------------------------------------------------}
// View Add Form of Subjects
Route::get('/subjects/add_subject', [SubjectController::class, 'add_subject'])->middleware('auth');
// store subjects
Route::post('/create_subject', [SubjectController::class, 'create_subject'])->middleware('auth');
// show all subjects
Route::get('/subjects/all_subject', [SubjectController::class, 'showsubject'])->middleware('auth');
// show edit form of subject
Route::get('/subjects/{subject}/edit_subject', [SubjectController::class, 'edit_subject'])->middleware('auth');
// Submit to Update subject data
Route::put('/subjects/{subject}', [SubjectController::class, 'update_subject'])->middleware('auth');
// Delete Subject
Route::get('/delete_subject/{id}', [SubjectController::class, 'delete_subject']);

// {---------------------------------SECTION CONTROLLER-------------------------------------------------------}
// View add section form
Route::get('/section/add_section', [SectionController::class, 'add_section'])->middleware('auth');
// store section
Route::post('/create_section', [SectionController::class, 'create_section'])->middleware('auth');
// show all section
Route::get('/section/all_section', [SectionController::class, 'sections'])->middleware('auth');
// DELETE THE SECTION
Route::get('/delete_section/{id}', [SectionController::class, 'delete_section'])->middleware('auth');
// show edit form
Route::get('/section/{section}/edit_section', [SectionController::class, 'edit_section'])->middleware('auth');
// edit to submit form
Route::put('/section/{section}', [SectionController::class, 'update_section'])->middleware('auth');
// Delete Section
Route::get('/delete_section/{id}', [SectionController::class, 'delete_section']);

Route::get('/createpdf', [PDFController::class, 'createpdf'])->name('createpdf')->middleware('auth');

// {---------------------------------SCHOOLYEAR CONTROLLER-------------------------------------------------------}
// Add School Year
Route::get('/school/add_schoolYear', [SchoolYearController::class, 'school_year']);
// store section
Route::post('/create_schoolyear', [SchoolYearController::class, 'create_schoolyear']);
// show edit form
Route::get('/school/{schoolyear}/edit_schoolyear', [SchoolYearController::class, 'edit_schoolyear'])->middleware('auth');
// show all schoolyear
Route::get('/school/schoolyear', [SchoolYearController::class, 'schoolyear'])->middleware('auth');
// edit to submit form
Route::put('/school/{schoolyear}', [SchoolYearController::class, 'update_schoolyear'])->middleware('auth');
// Delete Section
Route::get('/delete_schoolyear/{id}', [SchoolYearController::class, 'delete_schoolyear']);
// Approved Request
Route::get('/active/{id}', [SchoolYearController::class, 'active'])->middleware('auth');
// Reject Request
Route::get('/inactive/{id}', [SchoolYearController::class, 'inactive'])->middleware('auth');

// {---------------------------------CLASSES CONTROLLER-------------------------------------------------------}
// Show Add Class Form
Route::get('/classType/add_classes', [ClassesController::class, 'add_classes']);
// Add to Submit class
Route::post('/create_classes', [ClassesController::class, 'create_classes']);
// View All Class
Route::get('/classType/classes', [ClassesController::class, 'classes'])->middleware('auth');
// show edit form
Route::get('/classType/{classes}/edit_class', [ClassesController::class, 'edit_class'])->middleware('auth');
// edit to submit form
Route::put('/classType/{classes}', [ClassesController::class, 'update_class'])->middleware('auth');
// Delete Section
Route::get('/delete_class/{id}', [ClassesController::class, 'delete_class']);

// {---------------------------------GRADELEVEL CONTROLLER-------------------------------------------------------}
// Show Add Grade Level Form
Route::get('/gradeLevel/add_gradeLevel', [GradeLevelController::class, 'add_gradeLevel'])->middleware('auth');
// Add to Submit Grade Level
Route::post('/create_gradeLevel', [GradeLevelController::class, 'create_gradeLevel'])->middleware('auth');
// View All Grade Level
Route::get('/gradeLevel/all_gradeLevel', [GradeLevelController::class, 'gradeLevel'])->middleware('auth');
// show edit form of gradelevel
Route::get('/gradeLevel/{gradelevel}/edit_gradelevel',
[GradeLevelController::class, 'edit_gradelevel'])->middleware('auth');
// Submit to Update Gradelevel data
Route::put('/gradeLevel/{gradelevel}', [GradeLevelController::class, 'update_gradelevel'])->middleware('auth');
// Delete GradeLevel
Route::get('/delete_gradelevel/{id}', [GradeLevelController::class, 'delete_gradelevel']);

// {---------------------------------SCHEDULE CONTROLLER-------------------------------------------------------}
// Show form class schedule
Route::get('/schedule/add_class', [ClassScheduleController::class, 'add_class'])->middleware('auth');
// store schedule
Route::post('/create_schedule', [ClassScheduleController::class, 'create_schedule'])->middleware('auth');
// show all schedule
Route::get('/schedule/classSchedule', [ClassScheduleController::class, 'showAll'])->middleware('auth');
// show edit form of class schedule
Route::get('/schedule/{schedule}/edit_classSched', [ClassScheduleController::class, 'edit_classSched'])->middleware('auth');
// Submit to Update class schedule
Route::put('/schedule/{schedule}', [ClassScheduleController::class, 'update_classSched'])->middleware('auth');
// delete room
Route::get('/delete_schedule/{id}', [ClassScheduleController::class, 'delete_schedule']);

// {---------------------------------tEACHER SCHEDULE-------------------------------------------------------}
// store schedule
Route::post('/create_teacherschedule', [TeacherScheduleController::class, 'create_teacherschedule'])->middleware('auth');
// show all schedule
Route::get('/teacherschedule/teacherschedule', [TeacherScheduleController::class, 'teacherschedule'])->middleware('auth');
// teacherschedule
Route::get('/teacherschedule/{teacherschedule}/edit_teacherschedule', [TeacherScheduleController::class, 'edit_teacherschedule'])->middleware('auth');
Route::put('/teacherschedule/{teacherschedule}', [TeacherScheduleController::class, 'update_teacherSched'])->middleware('auth');

// {---------------------------------SEMESTER CONTROLLER-------------------------------------------------------}
// Show Add Semester Form
Route::get('/semesters/add_sem', [SemesterController::class, 'add_sem'])->middleware('auth');
// Add to Submit Timer
Route::post('/create_sem', [SemesterController::class, 'create_sem'])->middleware('auth');
// View All Semester
Route::get('/semesters/semester', [SemesterController::class, 'semester'])->middleware('auth');
// show edit form
Route::get('/semesters/{semester}/edit_sem', [SemesterController::class, 'edit_sem'])->middleware('auth');
// edit to submit form
Route::put('/semesters/{semester}', [SemesterController::class, 'update_sem'])->middleware('auth');
// delete Semester
Route::get('/delete_sem/{id}', [SemesterController::class, 'delete_sem']);
// {---------------------------------SUBJECT TEACHER CONTROLLER-------------------------------------------------------}
// Show Add Semester Form
Route::get('/subteachers/add_subteacher', [SubTeacherController::class, 'add_subteacher'])->middleware('auth');
// Add to Submit SubjectTeacher
Route::post('/create_subteacher', [SubTeacherController::class, 'create_subteacher'])->middleware('auth');
// View All SubjectTeacher
Route::get('/subteachers/subteacher', [SubTeacherController::class, 'subteacher'])->middleware('auth');
// show edit form
Route::get('/subteachers/{subteacher}/edit_subteacher',[SubTeacherController::class, 'edit_subteacher'])->middleware('auth');
// delete days
Route::get('/delete_subteacher/{id}', [SubTeacherController::class, 'delete_subteacher']);
Route::put('/subteachers/{subteacher}', [SubTeacherController::class, 'update_subteacher'])->middleware('auth');


// {--------------------------------------------IMPORT AND EXPORT--------------------------------------------------}
 // Import and Export of Student Data
Route::controller(AdminController::class)->group(function(){
// Route::get('/students', 'excel_file');
Route::get('/students/export', 'export')->name('students.export')->middleware('auth');
    // Import Data
Route::post('/import', [AdminController::class, 'import'])->name('import')->middleware('auth');
// Show Pre Enrolled Students
Route::get('/students/all_preEnrolled', [StudentController::class, 'all_preEnrolled']);
// Show Pre Enrolled Students
Route::get('/students/preRegister', [StudentController::class, 'preRegister']);
});
});

// {--------------------------------------------------------------------------}
Route::controller(GradesController::class)->group(function(){
    // Route::get('/students', 'excel_file');
    Route::get('/grades/export', 'export_grade')->name('grades.export');  
});
// Import Data
Route::post('/import_grade', [GradesController::class, 'import_grade'])->name('import_grade');

// {---------------------------------------------TEACHER CONTROLLER------------------------------------------------}
Route::group(['middleware' => ['auth','teacher:teacher']], function()
{
Route::get("/teachers/teacher_schedule", [UserController::class, 'schedule'])->name('teachers.teacher_schedule');
// view all student of teacher
Route::get('/teachers/classlist', [TeacherController::class, 'classlist'])->name('teachers.classlist');
// {---------------------------------GRADES CONTROLLER-------------------------------------------------------}
// Show Add Grade Form
Route::get('/grades/{student}/add_grade', [GradesController::class, 'add_grade']);
// Submit Grades
Route::post('/grades', [GradesController::class, 'grades']);
// Show Input Grades Form
Route::get('/grades/show_grade', [GradesController::class, 'show_grade']);
// show edit form
Route::get('/grades/{grade}/edit_grades', [GradesController::class, 'edit_grades']);
Route::put('/grades/{grade}', [GradesController::class, 'update_grade'])->middleware('auth');

});

// {---------------------------------------------STUDENT CONTROLLER------------------------------------------------}
Route::group(['middleware' => ['auth','student:student']], function()
{
Route::get("/students/dashboard", [UserController::class,'student_dashboard'])->name('students.dashboard');
// Show Request Form
Route::get('/students/request_form', [StudentController::class, 'request_form']);
// Submit Request Form
Route::post('/submit_request', [StudentController::class, 'submit_request'])->name('submit_request');
// View My Request
Route::get('/students/myrequest', [StudentController::class, 'myrequest'])->name('students.myrequest');
// Delete Request of the student
Route::get('/cancel_request/{id}', [StudentController::class, 'cancel_request']);
// Show Enrollment Form
Route::get('/students/pre_enrollment', [StudentController::class, 'pre_enrollment'])->name('students.pre_enrollment');
// Submit Enrollment Form
Route::post('/students/submit_enrollment', [StudentController::class, 'submit_enrollment']);
// Show Input Grades Form
Route::get('/students/grades', [StudentController::class, 'grades']);

});

// Log User Out
Route::post('/logout', [UserController::class, 'logout']);
// Show Login Form
Route::get('/users/login', [UserController::class, 'login']);
// Show Login Form
Route::post('/users/student_auth', [UserController::class, 'student_auth']);
// Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
// Show Pre-Enrollment Form
Route::get('/users/enrollment_form', [UserController::class, 'enrollment_form']);
// Submit Enrollment Form
Route::post('/submit_enrollment', [UserController::class, 'submit_enrollment']);
// Submit Enrollment Form
Route::get('/users/aboutus', [UserController::class, 'aboutus']);
// Submit Enrollment Form
Route::get('/users/strand_homepage', [UserController::class, 'strand_homepage']);
// Show Pre-Enrollment Form
Route::get('/users/landing_page', [UserController::class, 'landing_page']);

Route::post('/changepass', [UserController::class, 'changepass']);








































