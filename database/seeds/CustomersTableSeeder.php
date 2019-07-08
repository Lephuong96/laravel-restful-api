<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer([
            'first_name' => 'Amay1',
            'last_name' => 'Ahu1'
        ]);
        $customer->save();

        $customer = new Customer([
            'first_name' => 'Amay2',
            'last_name' => 'Ahu2'
        ]);
        $customer->save();

        $customer = new Customer([

            'first_name' => 'Amay3',
            'last_name' => 'Ahu3'
        ]);
        $customer->save();

        $customer = new Customer([
            'first_name' => 'Amay4',
            'last_name' => 'Ahu4'
        ]);
        $customer->save();

        $customer = new Customer([
            'first_name' => 'Amay5',
            'last_name' => 'Ahu5'
        ]);
        $customer->save();


    }
}
