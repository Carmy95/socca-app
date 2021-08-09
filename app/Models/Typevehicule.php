<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typevehicule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the vehicules for the Typevehicule
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicule()
    {
        return $this->hasMany(Vehicule::class);
    }
}
