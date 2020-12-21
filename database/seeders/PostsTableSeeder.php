<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
            $param = [
                'user_id' => 1,
                'content' => 'ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1ダミー1'
            ];
            DB::table('posts')->insert($param);
        }

        for ($i=0; $i < 5; $i++) {
            $param = [
                'user_id' => 2,
                'content' => 'ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２ダミー２'
            ];
            DB::table('posts')->insert($param);
        }

    }
}
