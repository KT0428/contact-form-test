<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        Contact::factory()->count(20)->create();
    }
}