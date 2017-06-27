<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
	use SoftDeletes;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function serviceProviders()
    {
        return $this->belongsToMany(\App\ServiceProvider::class, 'service_sp','service_id','sp_id')->withPivot('price')->withTimestamps();
    }

    public function Orders()
    {
        return $this->hasMany(\App\Order::class);
    }
}
