<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'secciones';

    protected $fillable = ['nombre','num_estudiantes'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario', 'id_seccion', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seccionPolimorfas()
    {
        return $this->hasMany('App\Models\SeccionPolimorfa', 'id_seccion', 'id');
    }
    
}
