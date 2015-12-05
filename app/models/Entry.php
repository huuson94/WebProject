<?php

class Entry extends Eloquent{
    protected $table = "entries";
    
    /**
     * 
     * @return model Model of this entry
     */
    public function getEntry(){
        $entry_id = $this->entry_id;
        $type = $this->type;
        $type_name = EntryType::find($type)->type;
        $entry = $type_name::find($entry_id);
        return $entry;
    }
    
    public function comments(){
        return $this->hasMany('Comment','entry_id');
    }
    
    public function likes(){
        return $this->hasMany('Like','entry_id');
    }
    
    public function notDeteletedLikes(){
        return $this->hasMany('Like','entry_id')->where('is_deleted',0);
    }
}