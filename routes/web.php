<?php

use Illuminate\Support\Facades\Route;

/*======================
     CONTROLADORES
=======================*/

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WordDownloadController;


/*======================
         HOME
=======================*/

 //INDEX
Route::get('/', function () {
    return view('home.index');
})->name('index');


/*======================
     ROUTES - [GUEST]
=======================*/
Route::middleware('guest')->group(function(){

    //LOGIN
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    /*======================
      RUTAS CON CONTROLADOR
      =======================*/

    //LOGIN - [POST]
    Route::post('/login/auth', [loginController::class, 'login'])->name('auth-login');
});

/*======================
     ROUTES - [AUTH]
=======================*/
Route::middleware('auth')->group(function(){


    /*======================
        RUTAS SIMPLES
    =======================*/

    //DASHBOARD - HOME
    Route::get('/dashboard', function () {
        return view('dashboard.home');
    })->name('dashboard');

    //DASHBOARD - BACKUP
    Route::get('/dashboard/backup', function () {
        return view('dashboard.backup.index');
    })->name('backup');


    /*======================
        RUTAS LIVEWIRE
    =======================*/

    //PERFIL
    Route::get('dashboard/perfil', function () {
        return view('dashboard.perfil.index');
    })->name('perfil');

    //ESTUDIANTES 
    Route::group(['prefix' => 'dashboard/estudiantes'], function () {
        Route::get('/', function () {
            return view('livewire.estudiantes.index');
        })
        ->name('estudiantes');
    });

    //PROFESORES 
    Route::group(['prefix' => 'dashboard/profesores'], function () {
        Route::get('/', function () {
            return view('livewire.profesores.index');
        })
        ->name('profesores');
    });

    //AUDITORIAS
    Route::group(['prefix' => 'dashboard/auditorias'], function () {
        Route::get('/', function () {
            return view('livewire.auditorias.index');
        })
        ->name('auditorias');
    });

    //NOTAS
    Route::group(['prefix' => 'dashboard/notas'], function () {
        Route::get('/', function () {
            return view('livewire.notas.index');
        })
        ->name('notas');
    });

    //USUARIOS
    Route::group(['prefix' => 'dashboard/usuarios'], function () {
        Route::get('/', function () {
            return view('livewire.users.index');
        })
        ->name('usuarios');
    });

    //CERTIFICADOS
    Route::group(['prefix' => 'dashboard/certificados'], function () {
        Route::get('/', function () {
            return view('livewire.certificados.index');
        })
        ->name('certificados');
    });

    //SECCIONES
    Route::group(['prefix' => 'dashboard/secciones'], function () {
        Route::get('/', function () {
            return view('livewire.secciones.index');
        })
        ->name('secciones');
    });

    //SECCIONES GESTION
    Route::group(['prefix' => 'dashboard/seccion/gestion/{id}'], function () {
        Route::get('/', function () {
            return view('livewire.seccion-polimorfas.index');
        })
        ->name('seccion-gestion');
    });

    //HORARIO
    Route::group(['prefix' => 'dashboard/horario'], function () {
        Route::get('/', function () {
            return view('livewire.horarios.index');
        })
        ->name('horario');
    });


    /*======================
      RUTAS CON CONTROLADOR
    =======================*/

   //LOGOUT - [POST]
   Route::post('/logout', [loginController::class, 'logout'])->name('logout');

   //BACKUP- [GET]
   Route::get('/dashboard/backup/create', [BackupController::class, 'create'])->name('backup-create');

    //PROFILE UPDATE [POST]
   Route::post('dashboard/profile/update', [profileController::class, 'update'])->name('profile_update');

    //PROFILE UPDATE PHOTO [POST]
   Route::post('dashboard/profile/update/photo', [profileController::class, 'update_photo'])->name('profile_photo');

    //PROFILE UPDATE PASSWORD [POST]
   Route::post('dashboard/profile/update/password', [profileController::class, 'update_password'])->name('profile_update_password');

    //PROFILE DELETE [POST]
   Route::post('dashboard/profile/delete', [profileController::class, 'delete'])->name('profile_delete');

    //CERTIFICADO DE 6TO GRADO [POST]
   Route::get('dashboard/certificado/download/{id}', [WordDownloadController::class, 'certificado'])->name('certificado-download');
});