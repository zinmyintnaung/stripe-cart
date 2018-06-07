<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => 'https://d30a6s96kk7rhm.cloudfront.net/original/readings/978/075/156/9780751565355.jpg',
            'title' => 'Harry Porter',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque pariatur voluptatum quae ipsa nostrum iste, veniam illum temporibus nobis aliquam! Deserunt id facilis necessitatibus odit aspernatur? Blanditiis neque fuga nemo!',
            'price' => 10,
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://d30a6s96kk7rhm.cloudfront.net/original/readings/978/075/156/9780751565355.jpg',
            'title' => 'Harry Porter',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque pariatur voluptatum quae ipsa nostrum iste, veniam illum temporibus nobis aliquam! Deserunt id facilis necessitatibus odit aspernatur? Blanditiis neque fuga nemo!',
            'price' => 10,
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://d30a6s96kk7rhm.cloudfront.net/original/readings/978/075/156/9780751565355.jpg',
            'title' => 'Harry Porter',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque pariatur voluptatum quae ipsa nostrum iste, veniam illum temporibus nobis aliquam! Deserunt id facilis necessitatibus odit aspernatur? Blanditiis neque fuga nemo!',
            'price' => 10,
        ]);
        $product->save();
    }
}
