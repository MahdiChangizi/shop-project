<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EloquentRepositoryInterface
{
    public function all(): Collection;

    public function create(array $attributes): Model;

    public function find($id): ?Model;

    public function update(array $attributes, $id): bool;

    public function delete($id);

    public function allWithPaginate($paginate = 15, $type = 'DESC');
}
