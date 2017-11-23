<?php
    $languages = \Cache::remember('languages_en', \Session::get('expiresAt', 10), function(){
            return \App\Language::select('name', 'group', 'en')->get();
    });
    $data = [];
    foreach($languages as $language){
        $data[strtolower($language->group.'.'.$language->name)] = $language['en'];
    }
    return $data;
?>