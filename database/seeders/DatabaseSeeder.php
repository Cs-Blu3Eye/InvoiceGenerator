<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{Tenant, User, Customer, Invoice, InvoiceItem, Payment};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Tenant dengan relasi lengkap
        Tenant::factory(5)->create();
        User::factory(3)->create(); // Tiap tenant punya 3 user

        Customer::factory(5)->create(); // Tiap tenant punya 5 customer
        Invoice::factory(3)->create(); // Tiap customer punya 3 invoice
        InvoiceItem::factory(3)->create(); // Tiap invoice punya 3 item
        Payment::factory(2)->create(); // Tiap invoice punya 2 payment


        // Tambah 1 user admin default
        $tenant = Tenant::inRandomOrder()->first() ?? Tenant::factory()->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'tenant_id' => $tenant->id,
            'password' => Hash::make('password'),
        ]);
    }
}
