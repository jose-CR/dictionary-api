<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\subCategory>
 */
class subCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subCategory = $this->faker->randomElement(['adjetivo', 'verbo', 'sustantivo', 'descriptivo', 'indicativo']);

        return [
            'subcategory' => $subCategory
        ];
    }
}
