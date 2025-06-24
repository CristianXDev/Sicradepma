<?php

namespace App\Http\Controllers;

//Componentes
use Illuminate\Http\Request;
use App\Models\Auditoria;
use Illuminate\Support\Facades\Auth;

//Clase principal
class BackupController extends Controller{

    //Crear Backup
    public function create(){

        //Ruta del script que ejecuta el respaldo
        $backupScript = public_path('static/backup/backup.bat');

        //Ejecuta el script del respaldo
        $result = exec($backupScript, $output, $return_var);

        //Validar el resultado
        if($return_var === 0){

               //Auditoria
            Auditoria::create([ 
                'usuario_id' => Auth::user()->id,
                'descripcion' => 'El usuario ha creado un respaldo de la base de datos',
            ]);

            //Operación satisfactoria
            return redirect()->back()->with('success', 'Respaldo realizado correctamente!');

        } else {

            //Algo salió mal al ejecutar el script
            return redirect()->back()->withErrors('Hubo un error al realizar el respaldo.');
        }
    }
}