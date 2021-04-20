<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institut extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'logo'
    ];

    /**
     * Get all of the etablissements for the Institut
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function etablissements()
    {
        return $this->hasMany(Etablissement::class);
    }

    public $timestamps = false;
}
