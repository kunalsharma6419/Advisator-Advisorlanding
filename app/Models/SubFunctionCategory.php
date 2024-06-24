<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubFunctionCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'business_function_category_id'];

    public function businessFunctionCategory()
    {
        return $this->belongsTo(BusinessFunctionCategory::class);
    }

    public function advisorNominations()
    {
        return $this->hasMany(AdvisorNomination::class);
    }
}
