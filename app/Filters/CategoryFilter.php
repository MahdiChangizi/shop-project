<?php
namespace App\Filters;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends BaseFilter {

    private ?int $per_page;
    public Builder $query;
    private mixed $searchKey;
    private ?string $status;

    public function __construct(mixed $queryParams, int $per_page)
    {
        $this->queryParams = $queryParams;
        $this->per_page = $per_page;
        $this->query = Category::query();
        $this->filter();
    }


    /* extract request */
    public function extractSearchKey(): void
    {
        $this->searchKey = $this->extractKeyByKeyName(key: 'q');
    }
    public function extractStatus(): void
    {
        $this->status = $this->extractKeyByKeyName(key: 'status');
    }


    /* search */
    public function createQuery(): void
    {
        if ($this->searchKey) $this->query->where('name','LIKE', '%' . $this->searchKey . '%')->orWhere('description','LIKE', '%' . $this->searchKey . '%');

        if ($this->status) {
            if ($this->status === 'active') $this->query->where(column: 'status', operator: 1);
            else $this->query->where(column: 'status', operator: 0);
        }
    }

    /* fetch */
    public function fetchData(): void
    {
        $this->result = $this->query->orderBy(column: 'id', direction: 'desc')->paginate(perPage: $this->per_page);
    }

    public function filter(): void
    {
        $this->extractSearchKey();
        $this->extractStatus();
        $this->createQuery();
        $this->fetchData();
    }
}
