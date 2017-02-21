<?php

use Illuminate\Database\Seeder;

class InstallBasicData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $enID = DB::table('languages')->insertGetId([
            'code' => 'en',
            'name' => 'English',
            'locale' => 'EN_US',
            'status' => 'active',
            'default' => 1,
            'position' => 1,
        ]);
       $viID = DB::table('languages')->insertGetId([
            'code' => 'vi',
            'name' => 'Vietnam',
            'locale' => 'vi',
            'status' => 'active',
            'position' => 2,
        ]);
        DB::table('users')->insertGetId([
            'name' => 'Administrator',
            'email' => 'masco@masco.com.vn',
            'is_admin' => 1,
            'password'=>bcrypt('12345')
        ]);
        DB::table('settings')->insert([
            'key' => 'site_name',
            'value' => 'Multi languages',
            'language_id' => $enID,
        ]);
        DB::table('settings')->insert([
            'key' => 'key_word',
            'value' => 'Multi languages',
            'language_id' => $enID,
        ]);
        DB::table('settings')->insert([
            'key' => 'description',
            'value' => 'Multi languages',
            'language_id' => $enID,
        ]);
          DB::table('settings')->insert([
            'key' => 'author',
            'value' => 'Giang Thao',
            'language_id' => $enID,
        ]);

    }
}
