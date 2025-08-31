<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
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
            'name' => $this->faker->company,
            'legal_name' => $this->faker->companySuffix,
            'default_currency' => 'IDR',
            'locale' => 'id_ID',
            'timezone' => 'Asia/Jakarta',
            'settings' => json_encode([
                'invoice_prefix' => 'INV-',
                'tax_included' => true,
            ]),
        ];
    }
}
