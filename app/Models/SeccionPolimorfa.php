<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeccionPolimorfa extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'seccion_polimorfa';

    protected $fillable = ['id_seccion','id_estudiante'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'id', 'id_estudiante');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function seccione()
    {
        return $this->hasOne('App\Models\Seccione', 'id', 'id_seccion');
    }
    
}
