<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $guarded = [];
    public $timestamps = false;

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Crypt::encrypt($value);
    }

    public function getNameAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
}
