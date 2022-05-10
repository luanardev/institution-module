<?php

namespace Luanardev\Modules\Institution\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    /** 
     * Disable timestamp
     * var bool
     */
    public $timestamps = false;

    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'org_faculties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'email', 'phone'];

    /**
     * Get all of the departments for the Faculty
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departments()
    {
        return $this->hasMany(Department::class, 'faculty_id');
    }

    /**
     * Search Scope for Laravel Livewire DataTable
     * @var Illuminate\Database\Eloquent\Builder $query
     * @var string $term
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(
            fn ($query) => $query->where('code', 'like', "%{$term}%")
                ->orwhere('name', 'like', "%{$term}%")
        );
    }

    public static function findByName($name)
    {
       return static::where('name', $name)->first();
    }

    public static function findByCode($code)
    {
        return static::where('code', $code)->first();
    }
    
    
}
