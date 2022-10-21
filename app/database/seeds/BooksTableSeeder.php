<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [

        [
            'name' => 'HTMLの教科書',
            'author1' => '○○',
            'author2' => 'xx',
            'author3' => '',
            'lending' => false,
            'type_id' => 1,
            'book_user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'CSSの教科書',
            'author1' => '○○',
            'author2' => 'xx',
            'author3' => '',
            'lending' => false,
            'type_id' => 2,
            'book_user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'phpの教科書',
            'author1' => '○○',
            'author2' => 'xx',
            'author3' => '',
            'lending' => false,
            'type_id' => 3,
            'book_user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Javaの教科書',
            'author1' => '○○',
            'author2' => 'xx',
            'author3' => '',
            'lending' => false,
            'type_id' => 4,
            'book_user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    ];

        foreach($params as $param) {
            DB::table('books')->insert($param);
        }
    }
}
