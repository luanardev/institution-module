<?php

namespace Luanardev\Modules\Institution\Http\Livewire;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Modules\Institution\Entities\Campus;
use Luanardev\Modules\Institution\Concerns\CampusPicker;

class CampusSwitcher extends LivewireUI
{
    use CampusPicker;
    
    public $campusCode;

    public $campusName;

    public function __construct()
    {
        parent::__construct();
        $this->trackCampus();         
    }

    public function switch($campusId=null)
    {
        if(!empty($campusId)){
            $this->campusCode = Campus::find($campusId)->code;
            $this->setCampusName();
            session()->put('user_campus', $this->campusCode); 
            $this->toastr('You have switch campus') ;  
        }else{
            if(session()->exists('user_campus') ){
                session()->forget('user_campus');
            }
        }
        $this->emitRefresh();
    }

    public function render()
    {
        $this->viewData();
        return view('institution::livewire.campus-switcher');
    }

    private function viewData()
    {
        $campusList = CampusPicker::getCampusList();     
        $this->with('campusList', $campusList);
    }

    private function trackCampus()
    {  
        if(auth()->user()->hasCampus()){
            $this->campusCode = auth()->user()->getCampusCode();
            session()->put('user_campus', $this->campusCode);  
        }elseif(session()->exists('user_campus')){
            $this->campusCode = session()->get('user_campus');        
        }
        $this->setCampusName();
    }

    private function setCampusName()
    {
        if(!empty($this->campusCode)){
            $campus = Campus::findByCode($this->campusCode);
            if(!empty($campus)){
                $this->campusName = $campus->name;
            }
        }     
    }   
 
}
