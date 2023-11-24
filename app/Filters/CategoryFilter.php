<?php

namespace App\Filters;

use App\Models\Admin\Category;

class CategoryFilter
{
    private $search;
    private $query;
    private $queryParams;
    private $prePage;
    private $result;

    public function __construct($queryParams, $page)
    {
        $this->queryParams = $queryParams;
        $this->prePage = $page;
        $this->query = Category::query();
    }

    public function extractSearch()
    {
        if (isset($this->queryParams['search'])){
          $this->search =  $this->queryParams['search'];
          unset($this->queryParams['search']);
          return $this->search;
        }
    }
}
