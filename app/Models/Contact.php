<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Squire\Models\Country;

class Contact extends Model
{
    use HasFactory;


    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function countryName(): BelongsTo
    {
        return $this->belongsTo(
            Country::class,
            'country'
        );
    }
}
