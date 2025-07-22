<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenaraPerizinan extends Model
{
    use SoftDeletes;
    
    protected $table = 'menara_perizinan';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        });
    }  
}
