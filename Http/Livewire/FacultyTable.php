<?php

namespace Luanardev\Modules\Institution\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Luanardev\Modules\Institution\Entities\Faculty;

class FacultyTable extends DataTableComponent
{
 
    public array $perPageAccepted = [10, 20, 50, 100, 200, 500];
    
    public function getTableRowUrl($row): string
    {
        return route('faculty.show', $row);
    }

    public function browseAction()
    { 
        if(count($this->selectedKeys)){
            $key = collect($this->selectedKeys)->first();
            $this->redirectRoute('faculty.show', $key);       
        }     
        
    }

    public function editAction()
    {
        if(count($this->selectedKeys)){
            $key = collect($this->selectedKeys)->first();
            $this->redirectRoute('faculty.edit', $key);   
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
            Column::make('Email', 'email'), 
            Column::make('Phone', 'phone')
        ];
    }

    public function query(): Builder
    {
        return Faculty::query()
            ->when($this->getFilter('search'), 
                fn ($query, $term) => $query->search($term)
            );
    }

	
}
