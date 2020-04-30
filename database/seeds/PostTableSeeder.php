<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\post;
use App\category;
use App\tag;
use App\User;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $category1 = category::create([
        'name' => 'News'
      ]);
      $category2 = category::create([
        'name' => 'Marketing'
      ]);
      $category3 = category::create([
        'name' => 'Partnership'
      ]);
      $author1 = User::create([
        'name' => 'shivam',
        'email' => 'shivamkaushal20@gmail.com',
        'password' => Hash::make('password')
      ]);
      $author2 = User::create([
        'name' => 'tushar',
        'email' =>'tushartiwari@gmail.com',
        'password' =>Hash::make('password')
      ]);

      $post1 = post::create([
        'title' =>'We relocated our office to a new designed garage',
        'description' => 'loren ipsum is simply dummy text of printing and typesetting industry',
        'content' => 'loren ipsum is simply dummy text of printing and typesetting industry',
        'category_id' => $category1->id,
        'image' => 'post/1.jpg',
        'user_id' => $author1->id
      ]);

      $post2 = post::create([
        'title' =>'Top 5 brilliant content marketing strategies',
        'description' => 'loren ipsum is simply dummy text of printing and typesetting industry',
        'content' => 'loren ipsum is simply dummy text of printing and typesetting industry',
        'category_id' => $category2->id,
        'image' => 'post/2.jpg',
        'user_id' => $author2->id
      ]);
      $post3 = post::create([
        'title' =>'Best practices for minimalist design with example',
        'description' => 'loren ipsum is simply dummy text of printing and typesetting industry',
        'content' => 'loren ipsum is simply dummy text of printing and typesetting industry',
        'category_id' => $category3->id,
        'image' => 'post/3.jpg',
        'user_id' => $author1->id
      ]);
      $post4 = post::create([
        'title' =>'Congratulate and thank to Maryam for joining our team',
        'description' => 'loren ipsum is simply dummy text of printing and typesetting industry',
        'content' => 'loren ipsum is simply dummy text of printing and typesetting industry',
        'category_id' => $category2->id,
        'image' => 'post/4.jpg',
        'user_id' => $author2->id
      ]);

      $tag1 = tag::create([
        'name' => 'job'
      ]);
      $tag2 = tag::create([
        'name' => 'customers'
      ]);
      $tag3 = tag::create([
        'name'=> 'record'
      ]);

      $post1->tag()->attach([$tag1->id, $tag2->id]);
      $post2->tag()->attach([$tag2->id, $tag3->id]);
      $post3->tag()->attach([$tag1->id, $tag3->id]);
      $post4->tag()->attach([$tag2->id, $tag3->id]);

        //
    }
}
