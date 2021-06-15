<?php
declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\Request;

final class UserBalanceDTO extends BaseDTO
{
    public $userId;

    public static function fromRequest(Request $request)
    {
        $self = new self();
        $self->userId = $request->input('params.user_id');

        return $self;
    }
}
