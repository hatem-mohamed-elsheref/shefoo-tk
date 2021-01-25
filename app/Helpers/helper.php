<?php

use Illuminate\Support\Facades\File;


// return the language middleware (macamera)
if(!function_exists('macameraMiddlewares')){
    function macameraMiddlewares(){
        return [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ];
    }
}


  // prepare the new full name of the uploaded file for user/admin/etc..

if(!function_exists('preparePathToUpload')){
    function preparePathToUpload($request,$folderName){
        $name=time().'-'.Str::slug($request->name).'-image.'.$request->file('image')->getClientOriginalExtension();
        return mainPath($folderName.'/'.$name);
    }
}


 // check if the current authenticated admin have the given permission or not
 if(!function_exists('haveThePermission')){
  function haveThePermission($permission){
    $permissions=session()->get('permissions');

    if(is_null($permissions) || empty($permissions) || count($permissions) === 0)
        return false;

    return in_array($permission,$permissions);
  }
}


// remove a given file from the system
if (!function_exists('removeFile')){
    function removeFile($path){
        $full_path = fullPath($path);
        if (File::exists($full_path) && $path != mainPath(DEFAULT_IMAGE))
            File::delete($full_path);
        return true;
    }
}







