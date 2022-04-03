<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id'
    ];

    /**
     * Relationship with Loand
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loans():HasMany
    {
        return $this->hasMany(Loan::class, 'client_id');
    }
}
