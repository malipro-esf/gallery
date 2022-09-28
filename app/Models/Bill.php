<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory, SoftDeletes;

    protected $items = [];
    protected $fillable =[
        'user_id',
        'address_id',
        'bill_number',
        'post_cost',
        'tax_cost',
        'total_price',
        'verification_status',
        'post_status',
        'tracking_code',
        'user_description',
    ];
    private $totalPrice;

    public function items()
    {
        return $this->hasMany(BillItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    /** for test */
    public function addItem(BillItem $billItem, $price)
    {
        $this->items[] = $billItem;
        $this->totalPrice += $price;
    }

    /** for test */
    public function testItems()
    {
        return $this->items;
    }
    /** for test */
    public function totalPrice()
    {
        return $this->totalPrice;
    }
}
