<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //rodar apenas uma classe de seed
    //    $this->call(CategoriesSeed::class);
       $this->call(ArticlesSeed::class);

        //rodar varias classes ao mesmo tempo
       /*$this->call([
            CategoriesSeed::class,
            ClasTeste::class
        ]);*/
    }
}
