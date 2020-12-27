<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        factory(App\Kodcevap::class,1)->create();
        factory(App\Rozet::class,10)->create();
        factory(App\User::class,80)->create();
        factory(App\userFollowers::class,10)->create();
        factory(App\Topluluk::class,10)->create();
        factory(App\Etiket::class,15)->create();
        factory(App\Soru::class, 40)->create();
        factory(App\blogCategory::class,5)->create();
        factory(App\blogPost::class,20)->create();
        factory(App\cevap::class, 25)->create();
        factory(App\Yorum::class, 10)->create();
        factory(App\postCategories::class, 10)->create();


    }
}
