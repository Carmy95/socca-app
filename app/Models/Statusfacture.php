<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statusfacture extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the factures for the Statusfacture
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factures()
    {
        return $this->hasMany(Facture::class);
    }

}
