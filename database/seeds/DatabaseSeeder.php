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
        factory(\App\Brand::class, 8)->create()->each(function($brand){
            factory(\App\SubBrand::class, 5)->create(['brand_id'=>$brand->id])->each(function($subbrand){
                factory(\App\ProductBoxView::class)->create(['subbrand_id'=>$subbrand->id]);
            });
        });

        factory(\App\User::class, 5)->create()->each(function($user){
            factory(\App\Profile::class)->create(
                ['user_id'=>$user->id]
            );
        });

        factory(\App\Region::class, 4)->create()->each(function($region){
            factory(\App\State::class, 5)->create(['region_id'=>$region->id])->each(function($state){
                factory(\App\City::class, 3)->create(['state_id'=>$state->id]);
            });
        });

        factory(\App\Visit::class, 18)->create();

        factory(App\Dealer::class, 40)->create();

        factory(App\Plan::class, 80)->create();

        factory(App\DealerProfile::class, 40)->create();
    }
}
