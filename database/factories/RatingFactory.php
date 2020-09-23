<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rating::class;

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
            'book_id' => function(){
                return Book::all()->random();
            },
            'rating' => $this->faker->numberBetween(1,5)

        ];
    }
}
