<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceItem>
 */
class InvoiceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = $this->faker->numberBetween(1, 10);
        $unitPrice = $this->faker->randomFloat(2, 50, 1000);

       return [
            'tenant_id'     => Tenant::inRandomOrder()->first()?->id ?? Tenant::factory(),
            'invoice_id'    => Invoice::inRandomOrder()->first()?->id ?? Invoice::factory(),
            'product_id'       => Product::inRandomOrder()->first()?->id ?? null,
            'description'   => $this->faker->sentence(),
            'qty'           => $this->faker->randomFloat(4, 1, 50), // decimal(18,4)
            'unit'          => $this->faker->randomElement(['pcs', 'box', 'kg', 'hour']),
            'unit_price'    => $this->faker->randomFloat(2, 10, 500), // decimal(18,2)
            'line_discount' => $this->faker->randomFloat(2, 0, 50),
            // 'tax_id'        => null,
            'tax_amount'    => $this->faker->randomFloat(2, 0, 100),
            'line_total'    => $this->faker->randomFloat(2, 100, 5000),
            'position'      => $this->faker->numberBetween(1, 20),
        ];

    }
}
