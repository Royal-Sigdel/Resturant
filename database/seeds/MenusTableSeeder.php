<?php

use App\menu;
use App\Category;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /* $categories = factory(Category::class,5)->create();
         $categories->each(function($category){
             factory(menu::class,3)->create([
                    'category_id' => $category->id,]);
              });
    }
    */
    $dummyCategory = collect(
      [
        'Soups','Chicken Main Course', 'Non Veg Item', 'Veg Item'
      ]
      );
  $dummyCategory->each(function($value){
      factory(Category::class)->create(['name'=>$value]);
    });
    $this->addSoup();
    $this->addMainCourse();
    $this->addNonVegRice();
    $this->addVeg();
  } 
  private function addSoup(){
    factory(Menu::class)->create([
      'name'=> 'Chicken Barnee soup',
      'price'=> 170,
      'category_id'=>1,
      'resto_id' => 1,
      'description'=> 'Chicken soup is a soup made from chicken, simmered in water.'
    ]);
    factory(Menu::class)->create([
      'name'=> 'Chicken Beijing soup',
      'price'=> 160,
      'category_id'=>1,
      'resto_id' => 1,
      'description'=> 'Definately healthy soup for whole family'
    ]);
    factory(Menu::class)->create([
      'name'=> 'Chicken Local soup',
      'price'=> 160,
      'category_id'=>1,
      'resto_id' => 1,
      'description'=> 'Pure local Chicken Soup'
    ]);
  }
  private function addMainCourse(){
    factory(Menu::class)->create([
      'name'=> 'Grilled Chicken ',
      'price'=> 280,
      'category_id'=>2,
      'resto_id' => 1,
      'description'=> 'Grilled Chicken with Extra flavour'
    ]);
    factory(Menu::class)->create([
    'name'=> 'Chicken Roast',
      'price'=> 360,
      'category_id'=>2,
      'resto_id' => 1,
      'description'=> 'Roasted Chicken'
    ]);
  }
  private function addNonVegRice(){
    factory(Menu::class)->create([
      'name'=> 'Egg Rice',
      'price'=> 150,
      'category_id'=>3,
      'resto_id' => 1,
      'description'=> 'Rice with local chicken egg, 2 curry, pickel etc'
    ]);
    Factory(Menu::class)->create([
    'name'=> 'Chicken Rice',
      'price'=> 180,
      'category_id'=>3,
      'resto_id' => 1,
      'description'=> 'Rice with chicken, curry,pickel etc'
    ]);
    Factory(Menu::class)->create([
      'name'=> 'Mutton Rice',
        'price'=> 220,
        'category_id'=>3,
        'resto_id' => 1,
        'description'=> 'Rice with mutton, curry,pickel etc'
      ]);
  }
  private function addVeg()
  {
    factory(Menu::class)->create([
      'name'=> 'Veg Rice',
      'price'=> 120,
      'category_id'=>4,
      'resto_id' => 1,
      'description'=> 'Rice with 2 curry, pickel etc'
    ]);
    factory(Menu::class)->create([
      'name'=> 'Veg Momo',
      'price'=> 70,
      'category_id'=>4,
      'resto_id' => 1,
      'description'=> 'Delicious momo with vegetables'
    ]);
    factory(Menu::class)->create([
      'name'=> 'Veg Chowmein',
        'price'=> 70,
        'category_id'=>4,
        'resto_id' => 1,
        'description'=> 'Delicious Chowmein with vegetables'
      ]);
    }
  }