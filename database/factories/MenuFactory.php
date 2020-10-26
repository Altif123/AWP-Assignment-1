<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;


    public function definition()
    {

        $randNum = rand(5,20);
        return [

            'dish_name' => $this->faker->word,
            'description' => $this->faker->text($maxNbChars = 150),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 0, $max = 20),
            'allergy' =>$this->faker->text($maxNbChars = $randNum)


        ];
    }
}
