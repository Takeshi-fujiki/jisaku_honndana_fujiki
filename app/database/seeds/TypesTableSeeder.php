<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
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
                'category' => 1,
            ],
            [
                'name' => 'CSSの教科書',
                'category' => 2,
            ],
            [
                'name' => 'phpの教科書',
                'category' => 3,
            ],
            [
                'name' => 'Javaの教科書',
                'category' => 4,
            ],
        ];

        foreach($params as $param) {
            DB::table('types')->insert($param);
        }
    }
}
