<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boncommande extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the clients that owns the Boncommande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
    /**
     * Get the statuscommandes that owns the Boncommande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statuscommande()
    {
        return $this->belongsTo(Statuscommande::class);
    }
    /**
     * Get the factures that owns the Boncommande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
}
