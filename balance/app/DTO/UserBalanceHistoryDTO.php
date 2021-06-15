<?php
declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\Request;

final class UserBalanceHistoryDTO
{
    public $userId;

    public static function fromRequest(Request $request)
    {
        $self = new self();
        $self->userId = $request->get('params.user_id');

        return $self;
    }
}
