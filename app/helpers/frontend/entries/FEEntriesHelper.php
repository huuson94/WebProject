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
        return EntryType::where('type',$entry_type)->get()->first()->id;
    }
    
    public static function updatePrivacy($entry_id, $entry_type, $privacy){
        $entry = Entry::where('entry_id',$entry_id)->where('type',$entry_type)->get()->first();
        $entry->privacy = $privacy;
        return $entry->save();
    }
    public static function delete($entry_id, $entry_type){
        $entry = Entry::where('entry_id',$entry_id)->where('type',$entry_type)->get()->first();
        return $entry->delete();
    }
    public static function create($entry_id, $entry_type, $privacy){
        $entry = Entry::where('entry_id',$entry_id)->where('type',$entry_type)->get()->first();
        if($entry->count() > 0){
            $entry->entry_id = $entry_id;
            $entry->type = $entry_type;
            $entry->privacy = $privacy;
            return $entry->save();
        }else{
            return false;
        }
    }
}