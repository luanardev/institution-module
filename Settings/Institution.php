<?php

namespace Luanardev\Modules\Institution\Settings;
use Luanardev\Settings\Settings;

class Institution extends Settings
{
    public $company_name;
    public $company_acronym;
    public $company_logo;
    public $company_email;
    public $company_telephone;
    public $company_address;
    public $company_website;
    public $company_country;
   
    public static function group(): string
    {
        return 'organisation';
    }
}
