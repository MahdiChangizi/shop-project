<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function create(array $attributes): model
    {
        return $this->model->create($attributes);
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }
    public function update(array $attributes, $id): bool
    {
        return $this->find($id)->update($attributes);
    }

    public function allWithPaginate($paginate = 15, $type = 'DESC')
    {
        return $this->model->orderBy('id', $type)->paginate($paginate);
    }

    public function where($key, $value, $orWhere = null)
    {
        if ($orWhere) {
            return $this->model->where($key, $value)->orWhere($orWhere, $value)->get();
        }
        return $this->model->where($key, $value)->get();
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public function getAccess()
    {
        if (Gate::forUser(Auth::user())->
        denies($this->methodName, User::class))
            abort(403);
    }

    public function checkRole(): bool
    {
        return Gate::forUser(Auth::user())->
            allows($this->methodName, User::class);
    }
}
