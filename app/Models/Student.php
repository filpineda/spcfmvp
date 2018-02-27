<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'students';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'student_number',
        'first_name',
        'middle_name',
        'last_name',
        'admission_year',
        'gender',
        'religion',
        'address1',
        'address2',
        'municipality',
        'province',
        'date_of_birth',
    ];
    // protected $hidden = [];
    // protected $dates = [];
    protected $appends = [
        'admission_year_only',
        'full_address',
        'date_of_birth_readable',
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

    public function getAdmissionYearAttribute($value)
    {
        return Carbon::create($value, 1, 1, 0, 0, 0);
    }

    public function getDateOfBirthAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value);
    }

    public function getDateOfBirthReadableAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['date_of_birth'])->format('F d, Y');
    }

    public function getAdmissionYearOnlyAttribute()
    {
        return Carbon::create($this->attributes['admission_year'], 1, 1, 0, 0, 0)->format('Y');
    }

    public function getFullAddressAttribute()
    {
        return ($this->attributes['address1'] . ", " ?: "") . ($this->attributes['address2'] . ", " ?: "") . ($this->attributes['municipality'] . ", " ?: "") . ($this->attributes['province'] ?: "");
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setAdmissionYearAttribute($value)
    {
        $this->attributes['admission_year'] = substr($value, 0, -6);
    }
}
