<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempUser extends Model
{
    /**
     * Fields that cannot be mass assigned.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
