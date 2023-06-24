<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SubCategory;
use Livewire\WithPagination;

class SubCategoryDataTable extends Component
{
    use WithPagination;

    public $search;
    public $sortField;
    public $sortDirection = 'asc';
    public $columns = ['name', 'description','category_name','uploaded_at'];
    public $actions = [
                        "edit"=>["title"=>"Edit","route"=>'users.subcategories.edit'],
                        "delete"=>["title"=>"Delete","route"=>'users.subcategories.destroy'],
                        "others"=>[]
                    ];
    public SubCategory $subcategories;

    public function __construct(SubCategory $subcategories)
    {
        $this->subcategories = $subcategories;
    }
    public function render($subcategories)
    {
        $subcategories = $this->subcategories->query();
        if($this->search)
            $subcategories->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        if($this->sortField)
            $subcategories->orderBy($this->sortField, $this->sortDirection);

            $subcategories = $subcategories->paginate(10);

        return view('livewire.sub-category-data-table', compact('subcategories'));
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
