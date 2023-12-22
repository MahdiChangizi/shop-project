<?php


//
//namespace App\Filters;
//
//use App\Models\Admin\Category;
//
//class CategoryFilter
//{
//    private $per_page;
//    private $query;
//    private $queryParams;
//    private $searchKey;
//    private $result;
//    private $status;
//
//    public function __construct($queryParams, $per_page)
//    {
//        $this->queryParams = $queryParams;
//        $this->per_page = $per_page;
//        $this->query = Category::query();
//        $this->filter();
//    }
//
//    private function extractKeyByKeyName($key)
//    {
//        if (isset($this->queryParams[$key])) {
//            $q = $this->queryParams[$key];
//            unset($this->queryParams[$key]);
//            return $q;
//        }
//    }
//
//    private function extractSearchKey()
//    {
//        $this->searchKey = $this->extractKeyByKeyName('q');
//    }
//
//    private function extractStatus()
//    {
//        $this->status = $this->extractKeyByKeyName('status');
//    }
//
//    public function createQuery()
//    {
//        if ($this->searchKey) {
//            $this->query->where('name', 'LIKE', '%' . $this->searchKey . '%')
//                ->orWhere('description', 'LIKE', '%' . $this->searchKey . '%');
//        }
//
//        if ($this->status) {
//            if ($this->status === 'active') $this->query->where('status', 1);
//            else $this->query->where('status', 0);
//        }
//    }
//
//    public function fetchData()
//    {
//        $this->result = $this->query->orderBy('id', 'desc')->paginate($this->per_page);
//    }
//
//    public function filter()
//    {
//        $this->extractSearchKey();
//        $this->extractStatus();
//        $this->createQuery();
//        $this->fetchData();
//    }
//
//    public function getResult()
//    {
//        return $this->result;
//    }
//}

namespace App\Filters;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Builder;


class CategoryFilter extends BaseFilter
{
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

        if ($this->status)
        {
            if ($this->status === 'active') $this->query->where('status', 1);
            else $this->query->where('status', 0);
        }
    }

    /* fetch */
    public function fetchData(): void
    {
        $this->result = $this->query->orderBy('id', 'desc')->paginate($this->per_page);
    }

    public function filter(): void
    {
        $this->extractSearchKey();
        $this->extractStatus();
        $this->createQuery();
        $this->fetchData();
    }
}
