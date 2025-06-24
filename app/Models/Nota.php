<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'notas';

    protected $fillable = ['id_estudiante','primer_lapso','segundo_lapso','tercer_lapso','nota_final','periodo'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'id', 'id_estudiante');
    }
    
}
