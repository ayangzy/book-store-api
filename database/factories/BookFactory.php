<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function(){
                return User::all()->random();
            },
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(100,500),
            'photo' => $this->faker->image('public/storage/images', 400,300,null,false)
        ];
    }
}
