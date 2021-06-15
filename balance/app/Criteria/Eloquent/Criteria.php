<?php
declare(strict_types=1);

namespace App\Criteria\Eloquent;

use Illuminate\Support\Arr;

abstract class Criteria implements \App\Contract\Criteria
{
    protected $filters = [];

    protected $builder;

    protected $data = [];

    public function apply($params)
    {
        $this->builder = $params;
        foreach ($this->filter() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

    public function filter()
    {
        return array_filter(Arr::only($this->data, $this->filters), function ($value) {
            return ($value !== null && $value !== false && $value !== '' && $value !== '0');
        });
    }
}
