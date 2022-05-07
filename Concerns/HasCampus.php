<?php
namespace Luanardev\Modules\Institution\Concerns;
use Luanardev\Modules\Institution\Entities\Campus;

trait HasCampus
{

    /**
     * Get User Campus
     *
     * @return Campus
     */
    public function getCampus()
    {
        $campus = $this->getAttribute('campus');
        return Campus::where('code', $campus)
            ->orWhere('name', $campus)
            ->first();
    }

    /**
     * Get Campus Name
     *
     * @return string
     */
    public function getCampusName()
    {
        $campus = $this->getCampus();
        return !empty($campus)? $campus->name : null;
    }

    /**
     * Get Campus Code
     *
     * @return string
     */
    public function getCampusCode()
    {
        $campus = $this->getCampus();
        return !empty($campus)? $campus->code : null;
    }

    /**
     * Check whether User belongs to a campus
     *
     * @param mixed $code
     * @return boolean
     */
    public function belongsToCampus($code)
    {
        $campus = static::findByCampus($code);
        return !empty($campus)? true: false;
    }

    /**
     * Check whether User has campus allocated
     * @return boolean
     */
    public function hasCampus()
    {
        $campus = $this->getAttribute('campus');
        return !empty($this->campus)?true:false;
    }

    /**
     * Check whether User has no campus allocated
     * @return boolean
     */
    public function hasNoCampus()
    {
       return !$this->hasCampus();
    }

    /**
     * Find record by campus code
     * @param mixed $code
     * @return self
     */
    public static function findByCampus($code)
    {
        return static::where('campus', $code)->first();
    }


}
