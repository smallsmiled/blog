<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    public $timestamps = true;

    public $fillable = ['name','status'];

    public function getDateFormat()
    {
        return time();
    }

    public function asDateTime($value)
    {
        return $value;
    }

    public function fromDateTime($value)
    {
        return empty($value)?$value:$this->getDateFormat();
    }
}
