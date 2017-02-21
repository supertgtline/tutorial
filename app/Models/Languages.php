<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
	protected $table = 'languages';
    //
    protected $fillable = ['code','name','locale','image','status','positon'];
    protected $hidden = [
        'language_id'
    ];
   public static function getAllLanguageCodes(){
    	$languages = static::all();
    	$codes = [];
    	foreach ($languages as $lang) {

    		$codes[] = $lang->code;
    	}
    	return $codes;
    }
    public static function getDefaultLanguage(){
    	return static::where('default',1)->first();
    }
}
