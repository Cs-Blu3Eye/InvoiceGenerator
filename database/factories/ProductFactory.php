<?php

namespace Database\Factories;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
            'tenant_id' => Tenant::inRandomOrder()->first()?->id ?? Tenant::factory(),
            'sku' => strtoupper(Str::random(6)),
            'name' => $this->faker->word,
            'unit_price' => $this->faker->randomFloat(2, 10000, 100000),
            'currency' => 'IDR',
            'is_service' => true,
        ];

    }
}
