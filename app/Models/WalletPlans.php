<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletPlans extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'wallet_plans';

    // The attributes that are mass assignable.
    protected $fillable = [
        'plan_name',
        'plan_price',
        'plan_description',
        'plan_features',
        'plan_status',
    ];

    // Soft delete column
    protected $dates = ['deleted_at'];

    // Default attribute values
    protected $attributes = [
        'plan_status' => 'active',
    ];

    /**
     * Check if the plan is active.
     */
    public function isActive()
    {
        return $this->plan_status === 'active';
    }

    /**
     * Check if the plan is expired.
     */
    public function isExpired()
    {
        return $this->plan_status === 'expired';
    }

    /**
     * Check if the plan is paused.
     */
    public function isPaused()
    {
        return $this->plan_status === 'paused';
    }
}
