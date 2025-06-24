<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesore extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'profesores';

    protected $fillable = ['nombre','apellido','cedula','rol','estatus'];
	
}
