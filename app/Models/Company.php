<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_name',
        'street_address',
        'representative_name',
    ];

    public function products()
     {
        return $this->hasMany('App\Models\Product');
    }
}
