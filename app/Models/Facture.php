<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $dates = ['fjf'];

    /**
     * Get the statusfactures that owns the Facture
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusfactures()
    {
        return $this->belongsTo(Statusfacture::class);
    }
    /**
     * Get the boncommandes associated with the Facture
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function boncommandes()
    {
        return $this->hasOne(Boncommande::class);
    }
    /**
     * Get all of the recus for the Facture
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recus()
    {
        return $this->hasMany(Recu::class);
    }
}
