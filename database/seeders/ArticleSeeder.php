<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('articles')->insert([
            'title' => 'Lionel Messi',
            'body'  => 'The Best In The World',
            'thumbnail'=> '1.jpg',
            'created_at' => '2021-10-28 07:01:00',
            'updated_at' => '2021-10-28 07:01:00'
        ]);
    }
}
