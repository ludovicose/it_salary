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
        $self->page = (int)$request->get('page', 1);
        $self->limit = (int)$request->get('limit', 20);
        $self->userId = auth()->user()->getAuthIdentifier();

        return $self;
    }
}
