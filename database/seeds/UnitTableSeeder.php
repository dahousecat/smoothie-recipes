<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $units = [
            'ml' => [
                'type' => 'volume',
                'ml' => 1,
            ],
            'litre' => [
                'type' => 'volume',
                'ml' => 1000,
            ],
            'cup' => [
                'type' => 'volume',
                'ml' => 240,
            ],
            'fl oz' => [
                'type' => 'volume',
                'ml' => 29.57353,
            ],

            'gram' => [
                'type' => 'weight',
                'gram' => 1,
            ],
            'kilogram' => [
                'type' => 'weight',
                'gram' => 1000,
            ],
            'pound' => [
                'type' => 'weight',
                'gram' => 453.59237 ,
            ],
            'ounce' => [
                'type' => 'weight',
                'gram' => 28.349523125 ,
            ],

            'mm' => [
                'type' => 'length',
                'mm' => 1,
            ],
            'cm' => [
                'type' => 'length',
                'mm' => 10,
            ],
            'inch' => [
                'type' => 'length',
                'mm' => 25.4,
            ],
            'quantity' => [
                'type' => 'quantity',
            ],
        ];

        foreach($units as $name => $details) {
            DB::table('units')->insert([
                'name' => $name,
                'type' => $details['type'],
                'ml' => isset($details['ml']) ? $details['ml'] : NULL,
                'gram' => isset($details['gram']) ? $details['gram'] : NULL,
                'mm' => isset($details['mm']) ? $details['mm'] : NULL,
            ]);
        }

    }
}
