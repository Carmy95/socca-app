<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the personnes that owns the Vehicule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }
    /**
     * Get the typpevehicules that owns the Vehicule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typevehicule()
    {
        return $this->belongsTo(Typevehicule::class);
    }
    /**
     * Get the chaufeurvehicules associated with the Vehicule
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function chauffeurvehicule()
    {
        return $this->hasOne(Chauffeurvehicule::class);
    }
}
