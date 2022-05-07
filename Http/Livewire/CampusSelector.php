<?php

namespace Luanardev\Modules\Institution\Http\Livewire;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Modules\Institution\Entities\Campus;
use Luanardev\Modules\Institution\Concerns\CampusPicker;

class CampusSelector extends LivewireUI
{
    use CampusPicker;
    
    public $campusCode;

    public function __construct()
    {
        parent::__construct();
        $this->trackCampus();      
    }

    public function updatedCampusCode($value)
    {
        if($value){
            session()->put('user_campus', $value);               
        }else{
            if(session()->exists('user_campus') ){
                session()->forget('user_campus');
            }
        }
        $this->emitRefresh();
    }

    public function rules()
    {
        return [
            'campusCode' => 'nullable'
        ];
    }

    public function render()
    {
        $this->viewData();
        return view('institution::livewire.campus-selector');
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
        }
        elseif(session()->exists('user_campus')){
            $this->campusCode = session()->get('user_campus');
        }
    }
   
 
}
