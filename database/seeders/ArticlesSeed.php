<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Articles::factory(50)->create();
    }
}
