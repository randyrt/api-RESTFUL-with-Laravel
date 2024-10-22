<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'customer_id',
        'status',
        'billed_date',
        'paided_date'
    ];

    public function Customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}

