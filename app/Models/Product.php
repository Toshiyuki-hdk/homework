<?php

namespace App\Models;

use App\Model\Company;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
   protected $fillable = [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
   ];

    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

    public function sales() {
        return $this->hasMany('App\Models\Sale');
    }
}
