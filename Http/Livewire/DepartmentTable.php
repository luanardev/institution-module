<?php

namespace Luanardev\Modules\Institution\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Luanardev\Modules\Institution\Entities\Department;
use Luanardev\Modules\Institution\Entities\Faculty;

class DepartmentTable extends DataTableComponent
{
 
    public array $perPageAccepted = [10, 20, 50, 100, 200, 500];
    
    public function getTableRowUrl($row): string
    {
        return route('department.show', $row);
    }

    public function browseAction()
    { 
        if(count($this->selectedKeys)){
            $key = collect($this->selectedKeys)->first();
            $this->redirectRoute('department.show', $key);       
        }     
        
    }

    public function editAction()
    {
        if(count($this->selectedKeys)){
            $key = collect($this->selectedKeys)->first();
            $this->redirectRoute('department.edit', $key);   
        }
            
    }

    public function bulkActions(): array
    {
        return [
            'browseAction'   => 'Browse',
            'editAction' => 'Edit',
        ];
    }

    public function columns(): array
    {
        return [ 
            Column::make('Code', 'code')
                ->excludeFromSelectable()
                ->sortable(), 
            Column::make('Name', 'name')
                ->excludeFromSelectable()
                ->sortable(),   
            Column::make('Faculty', 'faculty.name')
        ];
    }

    public function query(): Builder
    {
        return Department::query()
            ->when($this->getFilter('search'), 
                fn ($query, $term) => $query->search($term)
            )
            ->when($this->getFilter('faculty'), 
				fn ($query, $term) => $query->where('faculty_id', $term)
			);
    }

    public function filters(): array
	{
		return [
			'faculty' => Filter::make('Faculty')->select(
				Faculty::pluck('id','name')->flip()->prepend('--select--')->toArray()
			)
		];
	}

	
}
