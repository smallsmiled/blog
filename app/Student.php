<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    const SEX_UN  = 0;
    const SEX_BOY = 1;
    const SEX_GIRL = 2;

    protected $table = 'student';
    public $timestamps = true;
    protected $fillable = ['name','age','sex'];

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

    public function sex($ind = null)
    {
        $arr = [
            self::SEX_UN => '未知',
            self::SEX_BOY => '男',
            self::SEX_GIRL=>'女'
        ];
        if($ind !== null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::SEX_UN];
        }

        return $arr;
    }
}
