<?php

namespace App\Contract;

interface Criteria
{
    public function apply($params);

    public function filter();

    public function getLimit();
}
