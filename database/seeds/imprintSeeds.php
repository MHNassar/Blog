<?php

use Illuminate\Database\Seeder;

class imprintSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('imprints')->insert([
            'text' => Str::random(2000),

        ]);
    }
}
