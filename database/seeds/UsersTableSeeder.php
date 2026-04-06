<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {DB::table('users')->insert(
    [
    'over_name'=>'鈴木',
    'under_name'=>'太郎',
    'over_name_kana'=>'スズキ',
    'under_name_kana'=>'タロウ',
    'mail_address'=>'suzuki@gmail.com',
    'sex'=>'1',
    'birth_day'=>'2026-01-01',
    'role'=>'1',
    'password'=>Hash::make('suzuki')
    ],

    [
    'over_name'=>'田中',
    'under_name'=>'啓介',
    'over_name_kana'=>'タナカ',
    'under_name_kana'=>'ケイスケ',
    'mail_address'=>'tanaka@gmail.com',
    'sex'=>'1',
    'birth_day'=>'2026-02-02',
    'role'=>'4',
    'password'=>Hash::make('tanaka')
    ],
    );
    }
}
