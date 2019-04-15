<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder {

  public function run()
  {
    DB::table('settings')->delete();

    Setting::create(['email' => 'foo@bar.com']);
  }

}