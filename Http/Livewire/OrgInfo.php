<?php

namespace Luanardev\Modules\Institution\Http\Livewire;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Library\Enums\Country;
use Institution;

class OrgInfo extends LivewireUI
{
    public $settings = array();

    public function __construct()
    {
        parent::__construct();
        $this->settings = Institution::getSettings();
    }

    public function render()
    {
        $this->viewData();
        return view("institution::livewire.org-info");
    }

    public function save()
    {
        Institution::saveAll($this->settings);
        $this->emitRefresh()->toastr('Settings saved');
    }

    public function viewData()
    {
        $this->with('country', Country::get());
    }


}
