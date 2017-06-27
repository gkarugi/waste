<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceProvider extends Model
{
    use SoftDeletes;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'location', 'description',
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
    public function services()
    {
        return $this->belongsToMany(\App\Service::class ,'service_sp','sp_id','service_id')->withPivot('price')->withTimestamps();
    }
    public function orders()
    {
        return $this->hasMany(\App\Order::class,'sp_id');
    }
}
