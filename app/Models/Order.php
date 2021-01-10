<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = array (
        'client_id', 
        'delivery_type_id'
    );

    public function client ()
    {
        return $this->belongsTo('\App\Models\Client');
    }

    public function deliveryType ()
    {
        return $this->belongsTo('\App\Models\DeliveryType');
    }

    public function dishes()
    {
        return $this->belongsToMany('\App\Models\Dish', 'order_dish');
    }
}
