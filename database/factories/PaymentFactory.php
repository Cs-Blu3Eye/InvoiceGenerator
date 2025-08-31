<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenant_id'    => Tenant::inRandomOrder()->first()?->id ?? Tenant::factory(),
            'customer_id'  => Customer::inRandomOrder()->first()?->id ?? Customer::factory(),
            'method'       => $this->faker->randomElement(['cash', 'bank_transfer', 'credit_card', 'ewallet']),
            'provider'     => $this->faker->randomElement(['BCA', 'Mandiri', 'BNI', 'OVO', 'GoPay', 'Dana', null]),
            'provider_ref' => $this->faker->bothify('PAY-########'),
            'amount'       => $this->faker->randomFloat(2, 50000, 5000000),
            'currency'     => 'IDR',
            'received_at'  => $this->faker->dateTimeBetween('-1 year', 'now'),
            'status'       => $this->faker->randomElement(['pending', 'succeeded', 'failed', 'refunded']),
            'notes'        => $this->faker->optional()->sentence(),
        ];


    }
}
