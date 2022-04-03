<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Relationship with Payment
     * 
     *  @return \Illuminate\Database\Eloquent\Relations\HasMany 
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'payment_type_id');
    }
}
