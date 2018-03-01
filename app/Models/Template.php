<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'templates';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'course_id',
        'academic_year_id',
        'semester_applicable',
        'due_at',
    ];
    // protected $hidden = [];
    // protected $dates = [];
    protected $appends = [
        'due_at_readable',
        'fees_subtotal',
        'subjects_subtotal',
        'total_amount',
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

    public function fees()
    {
        return $this->belongsToMany('App\Models\Fee');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subject');
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

    public function getDueAtReadableAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_at'])->format('F d, Y');
    }

    public function getFeesSubtotalAttribute()
    {
        $subtotal = 0;

        if($this->fees) {
            $this->fees->each(function($fee) use (&$subtotal) {
                $subtotal += (float) $fee->amount;
            });
        }

        return $subtotal;
    }

    public function getSubjectsSubtotalAttribute()
    {
        $subtotal = 0;

        if($this->subjects) {
            $this->subjects->each(function($subject) use (&$subtotal) {
                $subtotal += (float) $subject->full_units_total_amount;
            });
        }

        return $subtotal;
    }

    public function getTotalAmountAttribute()
    {
        return $this->fees_subtotal + $this->subjects_subtotal;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
