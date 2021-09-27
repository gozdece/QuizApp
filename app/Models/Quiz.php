<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['title','description','finished_at','status'];
    protected $appends = ['details','my_rank'];

    protected $dates=['finished_at'];

    public function getMyRankAttribute(){
        $rank=0;
        foreach($this->result()->orderByDesc('point')->get() as $result){
            $rank+=1;
            if(auth()->user()->id == $result->user_id){
                return $rank;
            }
        }
    }

    public function getDetailsAttribute(){
        if($this->result->count()>0){
            return [
                'average'=>round($this->result()->avg('point')),
                'join_count'=>$this->result()->count()
            ];
        }else{
            return null;
        }
        
    }


    public function result(){
        //quize ait olan resultları getir 
        return $this->hasMany('App\Models\Result');
    }
    public function topTen(){
        return $this->result()->orderByDesc('point')->take(10);
    }
    public function my_result(){
        //quize ait olan resultları getir ama user id si bana eşit olan resultlar
        return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id);
    }
    public function getFinishedAttribute($date){
        return $date ? Carbon::parse($date) : null;
    }

    public function questions(){
        return $this->hasMany('App\Models\Question');
    }

    public function sluggable(){
        return [
            'slug'=> [
                'onUpdate' => true,
                'source'=> 'title'
            ]
        ];
    }
}
