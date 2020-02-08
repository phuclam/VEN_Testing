<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'orders';

    public function items()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id');
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = Crypt::encrypt($value);
    }

    public function getStatusAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    public function setCurrencyAttribute($value)
    {
        $this->attributes['currency'] = Crypt::encrypt($value);
    }

    public function getCurrencyAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    public function setPaymentMethodAttribute($value)
    {
        $this->attributes['payment_method'] = Crypt::encrypt($value);
    }

    public function getPaymentMethodAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    public function setBillingAttribute($value)
    {
        $this->attributes['billing'] = Crypt::encrypt($value);
    }

    public function getBillingAttribute($value)
    {
        return Crypt::decrypt($value);
    }


    public function setShippingAttribute($value)
    {
        $this->attributes['shipping'] = Crypt::encrypt($value);
    }

    public function getShippingAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    public static function create($data)
    {
        $record = new self();

        if (isset($data['id'])) {
            $record->wp_id  = $data['id'];
        }

        if (isset($data['status'])) {
            $record->status = $data['status'];
        }

        if (isset($data['currency'])) {
            $record->currency = $data['currency'];
        }

        if (isset($data['total'])) {
            $record->total = $data['total'];
        }

        if (isset($data['payment_method_title'])) {
            $record->payment_method = $data['payment_method_title'];
        }

        if (isset($data['billing'])) {
            $record->billing = json_encode($data['billing']);
        }

        if (isset($data['shipping'])) {
            $record->shipping = json_encode($data['shipping']);
        }

        if (isset($data['created_at'])) {
            $record->created_at = $data['created_at'];
        }

        $record->save();

        return $record;
    }
}
