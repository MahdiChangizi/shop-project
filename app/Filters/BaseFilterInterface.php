<?php

namespace App\Filters;

interface BaseFilterInterface
{
    public function extractKeyByKeyName(mixed $key): mixed;
}
