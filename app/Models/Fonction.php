<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

        /* Get all of the personnes for the Fonction
        *
        * @return \Illuminate\Database\Eloquent\Relations\HasMany
        */
    public function personne()
    {
        return $this->hasMany(Personne::class);
    }
}
