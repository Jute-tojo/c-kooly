<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    public function create_session($id, $name){
        session(['etablissement_id' => $id, 'etablissement_name' => $name]);
    }

    public function destroy_session(){
        session(['etablissement_id' => null, 'etablissement_name' => null]);
    }

    /**
     * The users that belong to the Etablissement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The institut that belong to the Etablissement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function institut()
    {
        return $this->belongsTo(Institut::class);
    }

    public $timestamps = false;
}
