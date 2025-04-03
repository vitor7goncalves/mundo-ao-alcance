<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrazilTravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brazil_travels')->insert([
            [
                "img_name" => "riodejaneiro",
                "destination" => "Rio de Janeiro",
                "description" => "Explore a cidade maravilhosa e seus encantadores pontos turísticos",
                "price" => 735.00,
            ],
            [
                "img_name" => "saopaulo",
                "destination" => "São Paulo",
                "description" => "Descubra a capital financeira do Brasil com sua vibrante vida cultural",
                "price" => 650.00,
            ],
            [
                "img_name" => "salvador",
                "destination" => "Salvador",
                "description" => "Aproveite o calor da Bahia e sua rica herança cultural",
                "price" => 580.00,
            ],
            [
                "img_name" => "florianopolis",
                "destination" => "Florianópolis",
                "description" => "Relaxe nas praias paradisíacas da Ilha da Magia",
                "price" => 720.00,
            ],
            [
                "img_name" => "manaus",
                "destination" => "Manaus",
                "description" => "Explore a Amazônia e sua biodiversidade única",
                "price" => 810.00,
            ],
            [
                "img_name" => "recife",
                "destination" => "Recife",
                "description" => "Conheça a Veneza brasileira e suas belas praias",
                "price" => 590.00,
            ],
            [
                "img_name" => "fortaleza",
                "destination" => "Fortaleza",
                "description" => "Desfrute das praias ensolaradas e da culinária cearense",
                "price" => 670.00,
            ],
            [
                "img_name" => "curitiba",
                "destination" => "Curitiba",
                "description" => "Visite a cidade modelo com seus belos parques e jardins",
                "price" => 640.00,
            ],
        ]);
    }
}
