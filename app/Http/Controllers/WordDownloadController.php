<?php

namespace App\Http\Controllers;

//Componentes
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response; 
use Illuminate\Support\Facades\Storage;

//Modelos
use App\Models\Estudiante;
use App\Models\Profesore;

class WordDownloadController extends Controller{

    //Descargar certificado de graduación
    public function certificado($id){

        //Guardamos el id del estudiante
        $id_estudiante = $id;

        //Buscamos la información del estudiante
        $estudiante = Estudiante::where('id',$id_estudiante)->first();
        $profesor = Profesore::where('rol','Director/a')->first();

        if (!$estudiante || !$profesor) {
            return response()->json(['message' => 'Estudiante o Profesor no encontrado'], 404);
        }

        //Cargar la plantilla
        $templatePath = public_path('static/document/aprobacion_6to_grado.docx');
        $templateProcessor = new TemplateProcessor($templatePath);

        //Fechas
        $fechaCarbon = Carbon::now();
        $dia = $fechaCarbon->day;
        $mes = $fechaCarbon->locale('es_ES')->monthName; // Obtiene el nombre del mes en español
        $ano = $fechaCarbon->year;

        //Reemplazar los marcadores de posición

            //Profesor
            $templateProcessor->setValue('nombre_profesor', $profesor->nombre);
            $templateProcessor->setValue('apellido_profesor', $profesor->apellido);
            $templateProcessor->setValue('cedula_profesor', $profesor->cedula);

            //Estudiante
            $templateProcessor->setValue('nombre_estudiante', $estudiante->nombre);
            $templateProcessor->setValue('apellido_estudiante', $estudiante->apellido);
            $templateProcessor->setValue('cedula_estudiante', $estudiante->cedula);

            $fechaNacimiento = Carbon::parse($estudiante->fecha_nacimiento)->format('d/m/Y');
            $templateProcessor->setValue('fecha_nacimiento', $fechaNacimiento);
            
            $templateProcessor->setValue('periodo_actual_estudiante', $estudiante->periodo);
            $templateProcessor->setValue('estado', $estudiante->estado->nombre);
        
            //Fechas
            $templateProcessor->setValue('dia', $dia);
            $templateProcessor->setValue('mes', $mes);
            $templateProcessor->setValue('ano', $ano);

        //Guardar el documentos

            //Creamos un archivo temporal y obtenemos la ruta
            $tempFile = tempnam(sys_get_temp_dir(), 'cert_');
            $templateProcessor->saveAs($tempFile);

            //Obtener el contenido del archivo en memoria
            $fileContent = file_get_contents($tempFile);

            //Nombre del archivo
             $fileName = 'certificado_graduacion_' . $estudiante->cedula . '.docx';

             //Eliminamos el archivo temporal
             unlink($tempFile);

            //Crear una respuesta HTTP para descargar el archivo
            return Response::make($fileContent, 200, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            ]);
    }
}
