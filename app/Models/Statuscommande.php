<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statuscommande extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the boncommandes for the Statuscommande
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commande()
    {
        return $this->hasMany(Boncommande::class);
    }
}
