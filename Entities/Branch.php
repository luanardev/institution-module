<?php

namespace Luanardev\Modules\Institution\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;

    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'org_branches';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    
    /**
     * Get all of the campuses for the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function campuses()
    {
        return $this->hasMany(Campus::class, 'branch_id');
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
            fn ($query) => $query->where('name', 'like', "%{$term}%")
        );
    }

    public static function findByName($name)
    {
        return static::where('name', $name)->first();
    }
   
}
