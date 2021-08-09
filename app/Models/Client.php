<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the entites that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entite()
    {
        return $this->belongsTo(Entite::class);
    }
    /**
     * Get all of the boncommandes for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boncommandes()
    {
        return $this->hasMany(Boncommande::class);
    }
}
