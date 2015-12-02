<?php

class Entry extends Eloquent{
    protected $table = "entries";
    
    public function getEntry(){
        $entry_id = $this->entry_id;
        $type = $this->type;
        $type_name = EntryType::find($type)->type;
        $entry = $type_name::find($entry_id);
        return $entry;
    }
}