<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EloquentRepositoryInterface
{
    public function all(): Collection;

    public function create(array $attributes): Model;

    public function find(int $id): ?Model;

    public function update(array $attributes, int $id): bool;

    public function delete(int $id);

    public function allWithPaginate(int $paginate = 15, $type = 'DESC');
}
