<?php
namespace Luanardev\Modules\Institution\Concerns;
use Luanardev\Modules\Institution\Entities\Campus;

trait CampusPicker
{

    /**
     * Get Selected or Assigned Campus for Authenticated User
     *
     * @return Campus
     */
    public static function getUserCampus()
    {
        if(auth()->user()->hasCampus()){
            return auth()->user()->getCampus();
        }
        elseif(session()->exists('user_campus')){
            $campusCode = session()->get('user_campus');
            return Campus::findByCode($campusCode);
        }
       
    }

    /**
     * Get Campus List for Authenticated User
     *
     * @return array
     */
    public static function getCampusList()
    {
        $campusList = [];     
        if(auth()->user()->hasCampus()){
            $campusList[] = auth()->user()->getCampus();
        }else{
            $campusList = Campus::get();
        }
        return $campusList;
    }


    
    
}
