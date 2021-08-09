<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the factures that owns the Recu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function factures()
    {
        return $this->belongsTo(Facture::class);
    }
}
