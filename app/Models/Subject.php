<?php

namespace App\Models;

use App\Traits\CustomWordFormattersTrait;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use CrudTrait, CustomWordFormattersTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'subjects';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'code',
        'description',
        'slug',
        'academic_year_id',
        'semester_applicable',
        'course_id',
        'units',
        'price_per_unit',
    ];
    // protected $hidden = [];
    // protected $dates = [];
    protected $appends = [
        'full_units_total_amount',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function academic_year()
    {
        return $this->belongsTo('App\Models\AcademicYear');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    public function getFullUnitsTotalAmountAttribute()
    {
        return (($this->attributes['units']) * ($this->attributes['price_per_unit']));
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->CapitalizeNonPrepositionWords($value);
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }
}
