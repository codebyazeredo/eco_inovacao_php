<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'street',
        'zip_code',
        'number',
        'complement',
        'neighborhood_id',
        'city_id',
        'state_id',
    ];

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
