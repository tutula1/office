<?php
    $languages = Cache::remember('languages_vi', \Session::get('expiresAt', 10), function(){
            return \App\Language::select('name', 'group', 'vi')->get();
    });
    $data = [];
    foreach($languages as $language){
        $data[strtolower($language->group.'.'.$language->name)] = $language['vi'];
    }
    return $data;
?>