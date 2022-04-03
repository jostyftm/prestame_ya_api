<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

class IdentificationTypeSeeder extends Seeder
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    private $types =[
        [
            'name'      =>  'cedula de ciudadania',
            'prefix'    =>  'c.c'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->types as $type){
            DocumentType::create($type);
        }
    }
}
