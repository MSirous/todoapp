<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_lists')->truncate();
        $todoLists = [];

        for ($i = 0 ; $i < 10; $i++ )
        {
            $todoLists[] = [
                'title' => "Todo List {$i}",
                'description' => "Description {$i}",
                'user_id' => rand(1,2),
            ];
        }
        DB::table('todo_lists')->insert($todoLists);
    }
}
