<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Dish;

class IngredientSeeder extends Seeder
{
    public function run(): void
    {
        // Список ингредиентов
        $ingredients = [
            [
                'name' => 'Tomato',
                'description' => 'Fresh and juicy tomatoes.',
                'price' => 0.50,
                'image' => 'images/tomato.png'
            ],
            [
                'name' => 'Cheese',
                'description' => 'Rich mozzarella cheese.',
                'price' => 1.20,
                'image' => 'images/cheese.png'
            ],
            [
                'name' => 'Basil',
                'description' => 'Fresh basil leaves.',
                'price' => 0.30,
                'image' => 'images/basil.png'
            ],
            // Можно добавить больше ингредиентов, если нужно
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }

        // Список пицц (блюд)
        $pizzas = [
            [
                'name' => 'Комбо сбор',
                'image_path' => '/assets/collect.png',
                'price' => 290.00
            ],
            [
                'name' => 'Салями',
                'image_path' => '/assets/salami.png',
                'price' => 250.00
            ],
            [
                'name' => 'Барбекю',
                'image_path' => '/assets/barbeque.png',
                'price' => 310.00
            ],
            [
                'name' => 'Маргарита',
                'image_path' => '/assets/margarita.png',
                'price' => 290.00
            ],
            [
                'name' => 'Халяль',
                'image_path' => '/assets/halal.png',
                'price' => 600.00
            ],
            [
                'name' => 'Филадельфия',
                'image_path' => '/assets/philadelphia.png',
                'price' => 599.00
            ],
            [
                'name' => 'Капа маки',
                'image_path' => '/assets/kapa-maki.png',
                'price' => 140.00
            ],
            // Можно добавить другие пиццы, если нужно
        ];

        foreach ($pizzas as $pizza) {
            Dish::create($pizza);
        }
    }
}
