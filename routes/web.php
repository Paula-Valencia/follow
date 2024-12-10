<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\CheckTokenAndUser;
use App\Http\Controllers\GraphicController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\RoleApprendiceMiddleware;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Middleware\RoleTrainnerMiddleware;

// Ruta principal que muestra el formulario de inicio de sesión
Route::get('/', function () {
    return view('administrator.web');
});

Route::get('/graficos', [GraphicController::class, 'index'])->name('graficos.index');
// Rutas para el inicio de sesión y registro

Route::get('auth/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login_authentication');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('reset-password', [LoginController::class, 'resetPassword'])->name('reset-password');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//Olvidaste tu contraseña
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Grupo de rutas protegidas por middleware 'auth' (usuarios autenticados)
Route::middleware([CheckTokenAndUser::class, RoleMiddleware::class])->group(function () {
    // Rutas para roles específicos
    Route::get('/superadmin/home', function () {
        return view('superadmin.home');
    })->name('superadmin.home');

    // Rutas relacionadas con la gestión de administradores en el panel del superadmin
    // Ruta para la vista de administración general de administradores
    Route::get('/superadmin/SuperAdmin-Administrator', [SuperadminController::class, 'SuperAdminAdministrator'])->name('superadmin.SuperAdmin-Administrator');

    // Ruta para ver notificaciones de superadmin
    Route::get('/superadmin/SuperAdmin-Notificaciones', [NotificationController::class, 'SuperAdminNotificaciones'])->name('superadmin.SuperAdmin-Notificaciones');

    // Ruta para redactar nuevas notificaciones
    Route::get('/superadmin/SuperAdmin-Redactar', [ReportController::class, 'SuperAdminRedactar'])->name('superadmin.SuperAdmin-Redactar');
    Route::get('/superadmin/email', [SuperadminController::class, 'SuperAdminemail'])->name('superadmin.email');
    // Ruta para añadir un nuevo administrador
    Route::get('/superadmin/SuperAdmin-AdministratorAñadir', [UserRegisterController::class, 'SuperAdminAdministratorAñadir'])->name('superadmin.SuperAdmin-AdministratorAñadir');

    // Ruta para ver el perfil de un administrador específico
    Route::get('/superadmin/SuperAdmin-AdministratorPerfil/{id}', [SuperadminController::class, 'SuperAdminAdministratorPerfil'])->name('superadmin.SuperAdmin-AdministratorPerfil');

    // Ruta para gestionar permisos de administradores
    Route::get('/superadmin/SuperAdmin-Permisos', [SuperadminController::class, 'SuperAdminPermisos'])->name('superadmin.SuperAdmin-Permisos');

    // Ruta para ver gráficos relacionados con la administración
    Route::get('/superadmin/SuperAdmin-Graficas', [SuperadminController::class, 'SuperAdminGraficas'])->name('superadmin.SuperAdmin-Graficas');

    // Rutas relacionadas con la gestión de instructores en el panel del superadmin
    // Ruta para ver la lista de instructores
    Route::get('/superadmin/SuperAdmin-Instructor', [SuperadminController::class, 'SuperAdminInstructor'])->name('superadmin.SuperAdmin-Instructor');

    // Ruta para ver el perfil de un instructor específico
    Route::get('/superadmin/SuperAdmin-InstructorPerfil/{id}', [SuperadminController::class, 'SuperAdminInstructorPerfil'])
        ->name('superadmin.SuperAdmin-InstructorPerfil');

    // Ruta para añadir un nuevo instructor
    Route::get('/superadmin/SuperAdmin-InstructorAñadir', [UserRegisterController::class, 'SuperAdminInstructorAñadir'])->name('superadmin.SuperAdmin-InstructorAñadir');
    Route::post('/superadmin/store-user', [UserRegisterController::class, 'storeUser'])->name('superadmin.storeUser');
    Route::post('/superadmin/store-instructor', [UserRegisterController::class, 'crearInstructor'])->name('superadmin.crearInstructor');

    Route::put('/superadmin/update-user/{id}', [UserRegisterController::class, 'updateUserAdmin'])->name('superadmin.updateUser');
    Route::put('/superadmin/update-instructor/{id}', [UserRegisterController::class, 'updateUserInstructor'])->name('superadmin.updateInstructor');
    Route::put('/superadmin/update-aprendiz/{id}', [UserRegisterController::class, 'updateUserInstructor'])->name('superadmin.updateAprendiz');

    Route::delete('/superadmin/delete-user/{id}', [UserRegisterController::class, 'deleteUser'])->name('superadmin.deleteUser');

    // Ruta para configuración general del superadmin
    Route::get('/superadmin/SuperAdmin-Configuracion', [SuperadminController::class, 'SuperAdminConfiguracion'])->name('superadmin.SuperAdmin-Configuracion');

    // Rutas relacionadas con la gestión de aprendices en el panel del superadmin
    // Ruta para ver la lista de aprendices
    Route::get('/superadmin/SuperAdmin-Aprendiz', [SuperadminController::class, 'SuperAdminAprendiz'])->name('superadmin.SuperAdmin-Aprendiz');

    // Ruta para ver el perfil de un aprendiz específico
    Route::get('/superadmin/SuperAdmin-AprendizPerfil/{id}', [SuperadminController::class, 'SuperAdminAprendizPerfil'])->name('superadmin.SuperAdmin-AprendizPerfil');

    // Ruta para añadir un nuevo aprendiz
    Route::get('/superadmin/SuperAdmin-AprendizAgregar', action: [UserRegisterController::class, 'SuperAdminAprendizAgregar'])->name('superadmin.SuperAdmin-AprendizAgregar');
    Route::post('/superadmin/store-aprendiz', [ApprenticeController::class, 'crearAprendiz'])->name('superadmin.crearAprendiz');

    // Ruta para ver la lista de aprendices
    Route::get('/superadmin/SuperAdmin-ListaAprendiz', [SuperadminController::class, 'SuperAdminListaAprendiz'])->name('superadmin.SuperAdmin-ListaAprendiz');

    // Ruta para ver el cronograma de actividades
    Route::get('/superadmin/SuperAdmin-Cronograma', [SuperadminController::class, 'SuperAdminCronograma'])->name('superadmin.SuperAdmin-Cronograma');

    // Rutas relacionadas con el perfil del superadmin
    // Ruta para ver el perfil del superadmin
    Route::get('/superadmin/SuperAdmin-Perfil', [SuperadminController::class, 'SuperAdminPerfil'])->name('superadmin.SuperAdmin-Perfil');

    // Rutas para manejar mensajes a instructores y aprendices
    // Ruta para enviar un mensaje a un instructor
    Route::get('/superadmin/SuperAdmin-MensajeInstructor', [SuperadminController::class, 'SuperAdminMensajeInstructor'])->name('superadmin.SuperAdmin-MensajeInstructor');

    // Ruta para enviar un mensaje a un aprendiz
    Route::get('/superadmin/SuperAdmin-MensajeAprendiz', [SuperadminController::class, 'SuperAdminMensajeAprendiz'])->name('superadmin.SuperAdmin-MensajeAprendiz');
     Route::post('/superadmin/update-profile-photo', [SuperAdminController::class, 'updateProfilePhoto'])->name('superadmin.updateProfilePhoto');

    //RUTAS ADMINISTRADOR
    Route::get('/administrator/home', function () {
        return view('administrator.home');
    })->name('administrator.home');

    Route::get('/administrator/settings', [AdministratorController::class, 'settings'])->name('administrator.settings');
    Route::get('/administrator/instructor', [AdministratorController::class, 'instructor'])->name('administrator.instructor');
    Route::get('/administrator/apprentice', [AdministratorController::class, 'apprentice'])->name('administrator.apprentice');
    Route::get('/administrator/reports', [ReportController::class, 'reports'])->name('administrator.reports');
    Route::get('/administrator/graphic', [AdministratorController::class, 'graphic'])->name('administrator.graphic');
    Route::get('/administrator/template', [AdministratorController::class, 'template'])->name('administrator.template');
    Route::get('/administrator/Administrator-perfil', [AdministratorController::class, 'Adminperfil'])->name('administrator.Administrator-perfil');
    Route::get('/administrator/Administrator-actualizar', [AdministratorController::class, 'Adminactualizar'])->name('administrator.Actualizar-perfil');
    Route::get('/administrator/Apprentice-perfil', [AdministratorController::class, 'perfilAprendiz'])->name('administrator.Apprentice-perfil');
    Route::get('/administrator/Instructor-perfil', [AdministratorController::class, 'perfilInstructor'])->name('administrator.Instructor-perfil');
    Route::get('/administrator/Agregar-aprendiz', [UserRegisterController::class, 'AgregarAprendiz'])->name('administrator.Agregar-aprendiz');
    Route::get('/administrator/Agregar-aprendiz2', [UserRegisterController::class, 'AgregarAprendiz2'])->name('administrator.Agregar-aprendiz2');
    Route::get('/administrator/Agregar-instructor', [UserRegisterController::class, 'AgregarInstructor'])->name('administrator.Agregar-instructor');
    Route::get('/administrator/Mensaje-aprendiz', [AdministratorController::class, 'MensajeAprendiz'])->name('administrator.Mensaje-aprendiz');
    Route::get('/administrator/Mensaje-instructor', [AdministratorController::class, 'MensajeInstructor'])->name('administrator.Mensaje-instructor');
    Route::get('/administrator/notificaciones', [NotificationController::class, 'Notificaciones'])->name('administrator.notificaciones');
    Route::get('/administrator/redactar', [AdministratorController::class, 'redactar'])->name('administrator.redactar');
    Route::get('/administrator/email', [AdministratorController::class, 'Email'])->name('administrator.email');
    Route::get('/administrator/Reporte-aprendiz', [AdministratorController::class, 'ReporteAprendiz'])->name('administrator.Reporte-aprendiz');
    Route::get('/administrator/perfil', [AdministratorController::class, 'perfil'])->name('administrator.perfil');
    Route::get('/administrator/perfilInstructor', [AdministratorController::class, 'perfilInstructor'])->name('administrator.perfil-instructor');
    Route::get('/administrator/web', [AdministratorController::class, 'Web'])->name('administrator.web');

    // Rutas de aprendiz (cambiada la duplicación del nombre)
    Route::get('/apprentice/home', function () {
        return view('apprentice.home');
    })->name('apprentice.home');
});

Route::middleware([CheckTokenAndUser::class, RoleApprendiceMiddleware::class])->group(function () {
    // RUTAS APRENDIZ (fuera del middleware 'auth')
    Route::get('/homeaprendiz', [ApprenticeController::class, 'index'])->name('apprentice.index');
    Route::get('/calendar-aprendiz', [DiaryController::class, 'calendar'])->name('apprentice.calendar');
    Route::get('/visitaprendiz', [ApprenticeController::class, 'visit'])->name('apprentice.visit');
    Route::get('/registervisitaprendiz', [ApprenticeController::class, 'registervisit'])->name('apprentice.registervisit');
    Route::get('/profileaprendiz', [ApprenticeController::class, 'profile'])->name('apprentice.profile');
    Route::get('/settingsaprendiz', [ApprenticeController::class, 'settings'])->name('apprentice.settings');
    Route::get('/notificationaprendiz', [NotificationController::class, 'notification'])->name('apprentice.notification');
    // Route::get('/notificacionaprendiz', [ApprenticeController::class, 'notification'])->name('notificacionaprendiz');
});

//rutas intructor
Route::middleware([CheckTokenAndUser::class, RoleTrainnerMiddleware::class])->group(function () {
    Route::get('/trainer/home', [TrainerController::class, 'index'])->name('trainer.home');
    Route::get('/trainer/icon', [TrainerController::class, 'icon'])->name('icon');

    Route::get('/trainer/notification', [NotificationController::class, 'notificationtrainer'])->name('notificationtrainer');
    Route::delete('/notification/{id}', [NotificationController::class, 'deleteNotification'])->name('notification.trainner.delete');

    Route::get('/trainer/report', [ReportController::class, 'report'])->name('report');
    Route::post('/create-notification-trainner', [ReportController::class, 'createNotification'])->name('createNotificationTrainner');
    Route::get('/trainer/username', [TrainerController::class, 'username'])->name('username');
    Route::get('/trainer/Bitacora', [BitacoraController::class, 'bitacora'])->name('bitacora');
    Route::get('/trainer/visita/{id}', [TrainerController::class, 'visita'])->name('visita');
    Route::get('/trainer/profile-apprentice/{id}', [TrainerController::class, 'perfilapre'])->name('perfilapre');
    Route::get('/trainer/iconTrainer', [TrainerController::class, 'icon'])->name('icon');
    Route::get('/trainer/emailTrainer', [TrainerController::class, 'email'])->name('email');
    Route::get('/trainer/configuracion', [TrainerController::class, 'configuracion'])->name('configuracion');
    Route::get('/trainer/cronograma', [DiaryController::class, 'cronograma'])->name('cronograma');
    Route::post('/registrar-bitacora', [BitacoraController::class, 'registrar'])->name('registrar.bitacora');
});

Route::get('/superadmin/aprendiz', [SuperAdminController::class, 'SuperAdminAprendiz'])->name('superadmin.aprendiz');
Route::put('/superadmin/update-estado/{id}', [UserRegisterController::class, 'updateEstado'])->name('superadmin.updateEsatdo');
