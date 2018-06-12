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
            'title' => 'Harry Potter and the Cursed Child',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque pariatur voluptatum quae ipsa nostrum iste, veniam illum temporibus nobis aliquam! Deserunt id facilis necessitatibus odit aspernatur? Blanditiis neque fuga nemo!',
            'price' => 20,
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://t0.gstatic.com/images?q=tbn:ANd9GcTpE02wL5QiZAeJoj6_VO7A8myYuoTeYPdNTyTaKyPzK1y7Nda4',
            'title' => 'Harry Potter and the Philosopher\'s Stone',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque pariatur voluptatum quae ipsa nostrum iste, veniam illum temporibus nobis aliquam! Deserunt id facilis necessitatibus odit aspernatur? Blanditiis neque fuga nemo!',
            'price' => 10,
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://www.alotofbooks.com.au/image/cache/catalog/products/9781408855669-800x800.jpg',
            'title' => 'Harry Potter and the Chamber of Secrets',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque pariatur voluptatum quae ipsa nostrum iste, veniam illum temporibus nobis aliquam! Deserunt id facilis necessitatibus odit aspernatur? Blanditiis neque fuga nemo!',
            'price' => 15,
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://t3.gstatic.com/images?q=tbn:ANd9GcQ0THNVG0G_aCbNUVT7GSYr5rgOTqtWSZ-iVVrAUXFO5ja97XoR',
            'title' => 'Harry Potter and the Prisoner of Azkaban',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque pariatur voluptatum quae ipsa nostrum iste, veniam illum temporibus nobis aliquam! Deserunt id facilis necessitatibus odit aspernatur? Blanditiis neque fuga nemo!',
            'price' => 10,
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://t0.gstatic.com/images?q=tbn:ANd9GcRthcTVI-sCPb0-OLOyZtVkGlWh_DcmpEZOei03ntsZOGL4b0sU',
            'title' => 'Harry Potter and the Order of the Phoenix',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque pariatur voluptatum quae ipsa nostrum iste, veniam illum temporibus nobis aliquam! Deserunt id facilis necessitatibus odit aspernatur? Blanditiis neque fuga nemo!',
            'price' => 20,
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://t0.gstatic.com/images?q=tbn:ANd9GcRJ6GGMXZ7739HM13FvsUyQwS7ZDll_e26tto4jWUZ1U1C93keE',
            'title' => 'Harry Potter and the Half-Blood Prince',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque pariatur voluptatum quae ipsa nostrum iste, veniam illum temporibus nobis aliquam! Deserunt id facilis necessitatibus odit aspernatur? Blanditiis neque fuga nemo!',
            'price' => 25,
        ]);
        $product->save();
    }
}
