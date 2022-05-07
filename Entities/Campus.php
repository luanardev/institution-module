<?php

namespace Luanardev\Modules\Institution\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Luanardev\Modules\Institution\Concerns\CampusPicker;

class Campus extends Model
{
    use HasFactory, CampusPicker;

    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'org_campuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'branch_id'];


    /**
     * Get the branch that owns the Campus
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
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

    /**
     * Get Campus Model By Name
     * @return self
     */
    public static function findByName($name)
    {
        return static::where('name', $name)->first();
    }

    /**
     * Get Campus Model By Code
     * @return self
     */
    public static function findByCode($code)
    {
        return static::where('code', $code)->first();
    }

    /**
     * Get Campus By Authenticated User
     * @return Illuminate\Support\Collection
     */
    public static function getByUser()
    {
        $campusList = collect();

        $campus =  static::getUserCampus();

        if(empty($campus)){
            $campusList = static::get();          
        }else{
            $campusList[] =  $campus;
        }
        return $campusList;
    }
    
}
