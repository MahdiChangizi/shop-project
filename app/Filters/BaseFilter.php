<?php

namespace App\Filters;

class BaseFilter implements BaseFilterInterface
{
    protected mixed $queryParams;
    protected mixed $result;
    protected $q;

    /* extract request */
    public function extractKeyByKeyName(mixed $key): mixed
    {
        if (isset($this->queryParams[$key])) {
            $this->q = $this->queryParams[$key];
            unset($this->queryParams[$key]);
        }
        return $this->q;
    }

    /* return filtered data */
    public function getResult(): mixed
    {
        return $this->result;
    }
}
