<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'horario';

    protected $fillable = ['id_seccion','id_profesor','dia_semana','actividad','hora_ini','hora_fin'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profesore()
    {
        return $this->hasOne('App\Models\Profesore', 'id', 'id_profesor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function seccione()
    {
        return $this->hasOne('App\Models\Seccione', 'id', 'id_seccion');
    }
    
}
