<?php

class FEEntriesHelper {
    public static function save($entry_id, $type, $user_id, $privacy){
        $entry = new Entry;
        $entry->entry_id = $entry_id;
        $entry->type = $type;
        $entry->user_id = $user_id;
        $entry->privacy = $privacy;
        $entry->save();
        return $entry;
    }
    
    public static function getId($entry_type){
        return EntryType::where('name',$entry_type)->get()->first()->id;
    }
}