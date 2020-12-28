<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function client ()
    {
        return $this->belongsTo('\App\Models\Client');
    }

    public function deliveryType ()
    {
        return $this->belongsTo('\App\Models\DeliveryType');
    }
}
