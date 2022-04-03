<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payment_type_id',
        'loan_id',
        'amount',
        'paid_at'
    ];

    /**
     * Relationship with Payment
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentType():BelongsTo
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id');
    }

    /**
     * Relationship with Loan
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan():BelongsTo
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }

}
