<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_items';
    
    public function children(){
        return $this->hasMany('App\Models\MenuItem',"parent_id","id");
    }
    
    public function getMenuItem(){
        $query = $this->select();
        $query->with('children',function($q){
            $q->with('children');
        });
        return $query->get()->toArray();
    }
}
