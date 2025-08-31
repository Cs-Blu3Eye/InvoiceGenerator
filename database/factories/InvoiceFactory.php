<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
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
            'customer_id' => Customer::inRandomOrder()->first()?->id ?? Customer::factory(),
            'number' => 'INV-'.strtoupper(Str::random(6)),
            'issue_date' => now(),
            'due_date' => now()->addDays(30),
            'currency' => 'IDR',
            'status' => 'draft',
            'subtotal' => 0,
            'tax_total' => 0,
            'total' => 0,
            'amount_due' => 0,
        ];

    }
}
