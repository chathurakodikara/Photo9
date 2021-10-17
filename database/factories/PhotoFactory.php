<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory() ,
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'path' => 'https://picsum.photos/200/300',
            'image_id' => $this->faker->numerify('##########'),
        ];
    }
}
