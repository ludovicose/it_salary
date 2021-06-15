<?php
declare(strict_types=1);

namespace App\DTO;

abstract class BaseDTO
{
    public function toArray(): array
    {
        $array = (array) $this;
        return array_filter($array, function ($value) {
            return ($value !== null && $value !== false && $value !== '');
        });
    }
}
