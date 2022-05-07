<?php

namespace Luanardev\Modules\Institution\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Luanardev\Modules\Institution\Entities\Campus;
use Luanardev\Modules\Institution\Entities\Branch;

class CampusTable extends DataTableComponent
{
 
    public array $perPageAccepted = [10, 20, 50, 100, 200, 500];
    
    public function getTableRowUrl($row): string
    {
        return route('campus.show', $row);
    }

    public function browseAction()
    { 
        if(count($this->selectedKeys)){
            $key = collect($this->selectedKeys)->first();
            $this->redirectRoute('campus.show', $key);       
        }     
        
    }

    public function editAction()
    {
        if(count($this->selectedKeys)){
            $key = collect($this->selectedKeys)->first();
            $this->redirectRoute('campus.edit', $key);   
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
            Column::make('Branch', 'branch.name')
        ];
    }

    public function query(): Builder
    {
        return Campus::query()
            ->when($this->getFilter('search'), 
                fn ($query, $term) => $query->search($term)
            )
            ->when($this->getFilter('branch'), 
				fn ($query, $term) => $query->where('branch_id', $term)
			);
    }

    public function filters(): array
	{
		return [
			'branch' => Filter::make('Branch')->select(
				Branch::pluck('id','name')->flip()->prepend('--select--')->toArray()
			)
		];
	}

	
}
