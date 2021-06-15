<?php
declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\Request;

final class UserBalanceHistoryDTO extends BaseDTO
{
    public $userId;

    /**
     * @var integer
     */
    public $limit;
    /**
     * @var integer
     */
    public $page;

    public static function fromRequest(Request $request)
    {
        $self = new self();
        $self->userId = $request->input('params.user_id');
        $self->page = (int)$request->input('params.page', 1);
        $self->limit = (int)$request->input('params.limit', 20);

        return $self;
    }
}
