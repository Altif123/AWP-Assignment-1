<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;


    public function definition()
    {
        $prefix = ['Spicy','Cheesy','Meaty','Peri-Peri','Sweet','Sour','Sweet and Sour','Tangy',
            'Zesty','Tasty','Fresh'
        ];
        $suffix = ['Burger','Pizza','Wrap','Sushi','Kebab','Donner'
        ];

        $category =['Sea food','Thai','Chinese','Indian','Turkish'
            ];

        $randNum = rand(5,20);
        return [

            'dish_name' => $prefix [array_rand ($prefix)] .' '. $this->faker->word .' '. $suffix [array_rand ($suffix)],
            'description' => $this->faker->text($maxNbChars = 150),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 0, $max = 20),
            'allergy' =>$this->faker->text($maxNbChars = $randNum),
            'category' => $category [array_rand ($category)]
        ];
    }
}
