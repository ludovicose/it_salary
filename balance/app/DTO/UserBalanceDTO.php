<?php
declare(strict_types=1);

namespace App\DTO;

final class UserBalanceDTO
{
    public $userId;

    public static function fromArray(array $data)
    {
       $self = new self();
    }
}
