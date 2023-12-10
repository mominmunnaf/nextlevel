<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'date',
        'status',
        'total_product',
        'sub_total',
        'vat',
        'total',
    ];

  

    public function user(): BelongsTo
    {
        return $this->belongsTo(Seller::class, 'customer_id');
    }

    public function orderdetail(): BelongsTo
    {
        return $this->belongsTo(Orderdetail::class, 'id');
    }


}

