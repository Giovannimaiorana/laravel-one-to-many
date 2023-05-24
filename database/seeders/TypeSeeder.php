<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TypeSeeder extends Seeder
{
    public function run()
    {
        $categories = ['Privato', 'Aziendale', 'Cliente Privato', 'Test'];
        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;

            $newType->save();
        }
    }
}
