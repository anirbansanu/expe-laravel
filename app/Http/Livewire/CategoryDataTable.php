<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryDataTable extends Component
{
    use WithPagination;

    public $search;
    public $sortField;
    public $sortDirection = 'asc';
    public $columns = ['name', 'category_description'];
    public $actions = ["edit"=>["title"=>"Edit","route"=>'users.categories.edit'],"delete"=>["title"=>"Delete","route"=>'users.categories.destroy']];

    public function render()
    {
        $categories = Category::query();
        if($this->search)
            $categories->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        if($this->sortField)
            $categories->orderBy($this->sortField, $this->sortDirection);

            $categories = $categories->paginate(10);

        return view('livewire.category-data-table', compact('categories'));
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
}
