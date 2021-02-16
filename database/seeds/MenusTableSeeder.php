<?php

use App\Product;
use App\Category;
use App\Product_Group;
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
             factory(Product::class,3)->create([
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
      factory(Product_Group::class)->create(['sgroup_code'=>$value]);
    });
    $this->addSoup();
    $this->addMainCourse();
    $this->addNonVegRice();
    $this->addVeg();
  } 
  private function addSoup(){
    factory(Product::class)->create([
      'sprod_code'=> 'Chicken Barnee soup',
      'nMRP_Rate'=> 170,
      'category_id'=>1,
      'description'=> 'Chicken soup is a soup made from chicken, simmered in water.'
    ]);
    factory(Product::class)->create([
      'sprod_code'=> 'Chicken Beijing soup',
      'nMRP_Rate'=> 160,
      'category_id'=>1,
      'description'=> 'Definately healthy soup for whole family'
    ]);
    factory(Product::class)->create([
      'sprod_code'=> 'Chicken Local soup',
      'nMRP_Rate'=> 160,
      'category_id'=>1,
      'description'=> 'Pure local Chicken Soup'
    ]);
  }
  private function addMainCourse(){
    factory(Product::class)->create([
      'sprod_code'=> 'Grilled Chicken ',
      'nMRP_Rate'=> 280,
      'category_id'=>2,
      'description'=> 'Grilled Chicken with Extra flavour'
    ]);
    factory(Product::class)->create([
    'sprod_code'=> 'Chicken Roast',
      'nMRP_Rate'=> 360,
      'category_id'=>2,
      'description'=> 'Roasted Chicken'
    ]);
  }
  private function addNonVegRice(){
    factory(Product::class)->create([
      'sprod_code'=> 'Egg Rice',
      'nMRP_Rate'=> 150,
      'category_id'=>3,
      'description'=> 'Rice with local chicken egg, 2 curry, pickel etc'
    ]);
    Factory(Product::class)->create([
    'sprod_code'=> 'Chicken Rice',
      'nMRP_Rate'=> 180,
      'category_id'=>3,
      'description'=> 'Rice with chicken, curry,pickel etc'
    ]);
    Factory(Product::class)->create([
      'sprod_code'=> 'Mutton Rice',
        'nMRP_Rate'=> 220,
        'category_id'=>3,
        'description'=> 'Rice with mutton, curry,pickel etc'
      ]);
  }
  private function addVeg()
  {
    factory(Product::class)->create([
      'sprod_code'=> 'Veg Rice',
      'nMRP_Rate'=> 120,
      'category_id'=>4,
      'description'=> 'Rice with 2 curry, pickel etc'
    ]);
    factory(Product::class)->create([
      'sprod_code'=> 'Veg Momo',
      'nMRP_Rate'=> 70,
      'category_id'=>4,
      'description'=> 'Delicious momo with vegetables'
    ]);
    factory(Product::class)->create([
      'sprod_code'=> 'Veg Chowmein',
        'nMRP_Rate'=> 70,
        'category_id'=>4,
        'description'=> 'Delicious Chowmein with vegetables'
      ]);
    }
  }