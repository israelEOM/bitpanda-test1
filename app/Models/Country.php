<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function userDetails()
    {
        return $this->hasMany(UserDetail::class, 'citizenship_country_id');
    }
}
