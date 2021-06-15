<?php

namespace App\Models;

use App\Contract\Criteria;
use Database\Factories\BalanceHistoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class BalanceHistory extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return BalanceHistoryFactory::new();
    }

    public function scopeFilter($query, Criteria $filters)
    {
        return $filters->apply($query);
    }
}
