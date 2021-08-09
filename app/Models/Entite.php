<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entite extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the clients for the Entite
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function client()
    {
        return $this->hasMany(Client::class);
    }
}
