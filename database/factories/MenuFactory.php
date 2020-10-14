<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //food faker https://github.com/jzonta/FakerRestaurant
        //$foodfaker = app('FoodFaker');
        //rand so text values are not always the same
        $randNum = rand(5,20);
        return [

            'dish_name' => $this->faker->word,
            'description' => $this->faker->text($maxNbChars = 150),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 0, $max = 20),
            'allergy' =>$this->faker->text($maxNbChars = $randNum)


        ];
    }
}
