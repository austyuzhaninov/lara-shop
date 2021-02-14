<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Article();

        $item->head = 'SEED: Article head';
        $item->text = 'Article text';
        $item->user_id = 2;

        $item->save();
    }
}
