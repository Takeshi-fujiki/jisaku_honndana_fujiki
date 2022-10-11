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
                'category' => 'html',
            ],
            [
                'name' => 'CSSの教科書',
                'category' => 'css',
            ],
            [
                'name' => 'phpの教科書',
                'category' => 'php',
            ],
            [
                'name' => 'Javaの教科書',
                'category' => 'javascript',
            ],
        ];

        foreach($params as $param) {
            DB::table('types')->insert($param);
        }
    }
}
