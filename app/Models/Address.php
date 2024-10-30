<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Address extends Model
{
    public $timestamps = false;

    protected $table = 'addresses';
    protected $fillable = [
        'street',
        'zip_code',
        'number',
        'complement',
        'neighborhood_id',
    ];

    public function neighborhood(): BelongsTo
    {
        return $this->belongsTo(Neighborhood::class);
    }
}
