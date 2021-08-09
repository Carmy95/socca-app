<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['date2naissance'];

    /**
     * Get the user that owns the Personne
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fonction()
    {
        return $this->belongsTo(Fonction::class);
    }
    /**
     * Get all of the vehicules for the Personne
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicule()
    {
        return $this->hasMany(Vehicule::class);
    }
    /**
     * Get the chauffeurvehicules associated with the Personne
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function chauffeurvehicule()
    {
        return $this->hasOne(Chauffeurvehicule::class);
    }
}
