<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Job extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function company(){
            return $this->belongsTo(Company::class);
        
    }
    public function category(){
            return $this->belongsTo(Category::class);
        
    }
    public function users(){
            return $this->belongsToMany(User::class)->withTimestamps();
        
    }
    public function favourits(){
         
        return $this->belongsToMany(Job::class, 'favourits', 'job_id','user_id')->withTimestamps();
          
        
    }
//     public function roles()
//     {
//         return $this->belongsToMany('App\Role', 'role_user_table', 'user_id', 'role_id');
//     }

    public function checkApplication(){
            return \DB::table('job_user')->where('user_id',Auth::user()->id)
            ->where('job_id',$this->id)->exists();
    }

    public function checkFavourite()
    {
            return \DB::table('favourits')->where('user_id',Auth::user()->id)
            ->where('job_id',$this->id)->exists();
    }
}
