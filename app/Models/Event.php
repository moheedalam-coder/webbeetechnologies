<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    
    
    public function workshops(){
        return $this->hasMany('App\Models\Workshop',"event_id","id");
    }
    
    public function findAllEvents($relation = false){
        $query = $this->select();
        if($relation)
            $query->with('workshops');
        return $query->get()->toArray();
    }
    public function getFutureEvents(){
        $query = $this->select();
        $query->with('workshops');
        $query->where('created_at','>',date('Y-m-d H:i:s'));
        return $query->get();
    }
}
