<?php

namespace Luanardev\Modules\Institution\Http\Livewire;
use Luanardev\LivewireUI\LivewireUI;
use Livewire\WithFileUploads;
use Storage;
use Institution;

class OrgLogo extends LivewireUI
{
    use WithFileUploads;

    public $logo;

    public function render()
    {
        return view("institution::livewire.org-logo");
    }

    public function show()
    {
        $this->browseMode();
    }

    public function create()
    {
        $this->createMode();
    }

    public function save()
    {
        if(empty($this->logo)){
            return;
        }
        $this->validate([
            'logo' => 'required|image|max:10240',
        ]);

        $currentLogo = Institution::get('company_logo');

        $path = $this->logo->storePublicly('institution/logo','public');
        
        Institution::put('company_logo', $path);

        if(Storage::exists("public/".$currentLogo)){
            Storage::delete("public/".$currentLogo);
        }
        $this->browseMode()->emitRefresh()->toastr('Logo saved');
    }


}
