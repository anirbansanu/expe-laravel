<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class SubCategoryDataTable extends Component
{
    use WithPagination;

    public $search;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $columns = ['name', 'description','category_name','uploaded_at'];
    public $actions = [
                        "edit"=>["title"=>"Edit","route"=>'users.subcategories.edit'],
                        "delete"=>["title"=>"Delete","route"=>'users.subcategories.destroy'],
                        "others"=>[]
                    ];
    public $category;

    public function mount(Category $category = null)
    {
        $this->category = $category;
    }
    public function render()
    {
        $query = SubCategory::where('added_by', Auth::id());

        if ($this->category) {
            $query->where('category_id', $this->category->id);
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->sortField) {
            $query->orderBy($this->sortField, $this->sortDirection);
        }

        $subcategories = $query->paginate(10);

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
