<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    public function organizations(): HasMany
    {
        return $this->hasMany(Organization::class, 'account_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'account_id');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'account_id');
    }


}
