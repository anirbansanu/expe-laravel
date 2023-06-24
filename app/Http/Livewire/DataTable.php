<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

use Column;
abstract class DataTable extends Component
{
    use WithPagination;

    public $_search;
    public $_sortField;
    public $_sortDirection = 'asc';
    protected $_columns = ['name', 'email'];
    protected $_model_paginate = 20;

    public function setPaginate($_model_paginate=null)
    {
        return $this->_model_paginate = $_model_paginate?$_model_paginate:env('PAGE_PAGINATE');
    }
    public function getColumns(array $columns)
    {
        return $this->_columns = $this->toColumnsCollection($columns);
    }
    /**
     * Convert array to collection of Column class.
     *
     * @param  array  $columns
     * @return Collection
     */
    private function toColumnsCollection(array $columns)
    {
        $collection = collect();
        foreach ($columns as $column) {
            if (isset($column['data'])) {
                $column['title'] = $column['title'] ?? $column['data'];
                $collection->push(new Column($column));
            } else {
                $data          = [];
                $data['data']  = $column;
                $data['title'] = $column;
                $collection->push(new Column($data));
            }
        }

        return $collection;
    }
    public function render(Model $model)
    {
        $_data = $model->query()
            ->when($this->_search, function ($query) {
                $query->where('name', 'like', '%' . $this->_search . '%');
            })
            ->orderBy($this->_sortField, $this->_sortDirection)
            ->paginate($this->setPaginate());

        return view('livewire.data-table', ['_data'=>$_data,'_columns',$this->_columns]);
    }

    public function sortBy($field)
    {
        if ($this->_sortField === $field) {
            $this->_sortDirection = $this->_sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->_sortField = $field;
            $this->_sortDirection = 'asc';
        }
    }
}
