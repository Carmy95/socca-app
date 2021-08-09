<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeurvehicule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the vehicules that owns the Chauffeurvehicule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }
    /**
     * Get the personnes that owns the Chauffeurvehicule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }
}
