<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$locale = Request::segment(1);
$allLanguageCodes = \App\Models\Languages::getAllLanguageCodes();

$defaultLanguage = \App\Models\Languages::getDefaultLanguage();


if($defaultLanguage){
	$defaultLanguageCode = $defaultLanguage->code;

} else {
	$defaultLanguageCode = 'en';
}
$currentLanguageCode = Request::segment(1,$defaultLanguageCode);
print_r($currentLanguageCode);
if(in_array($currentLanguageCode, $allLanguageCodes)){
	Route::get('/',function() use($defaultLanguageCode){
		return redirect()->to($defaultLanguageCode);
	});
	Route::group(['namespace' => 'Front','prefix' => $currentLanguageCode], function () use($currentLanguageCode) {
		app()->setlocale($currentLanguageCode);
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::get('/','FrontController@getIndex')->name('front.home');;
});
}else{
	Route::get('/'.$currentLanguageCode,function() use($defaultLanguageCode){
		return redirect()->to($defaultLanguageCode);
	});
}


Route::group(['namespace' => 'Admin','prefix' => 'admin'], function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::get('/',['uses'=>'AdminController@getIndex','as'=>'front.home'])->name('admin.home');
});
