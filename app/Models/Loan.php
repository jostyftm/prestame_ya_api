<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'amount',
        'interests',
        'lend_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        
    ];

    /**
     * Relationship with Client
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client():BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * Relationship with Loan
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'loan_id');
    }
}
