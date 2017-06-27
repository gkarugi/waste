<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '', '', '',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function serviceProvider()
    {
        return $this->belongsTo(\App\ServiceProvider::class);
    }

    public function service()
    {
        return $this->belongsTo(\App\Service::class);
    }
}
