<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public $timestamps = false;

    protected $touches = ['user'];

    protected $fillable = ['user_id','citizenship_country_id','first_name','last_name','phone_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'citizenship_country_id');
    }
}
