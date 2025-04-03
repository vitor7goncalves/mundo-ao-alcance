<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorldTravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //\App\Models\WorldTravel::factory(8)->create();

        DB::table("world_travels")->insert([
            [
                "img_name" => "alpes_suicos",
                "destination" => "Alpes Suíços",
                "description" => "Vivencie o encanto das montanhas geladas e dos charmosos vilarejos alpinos. Mergulhe na sofisticação da cultura suíça, desfrute de trilhas panorâmicas e experimente a culinária que aquece o coração.",
                "price" => 2735.00,
            ],
            [
                "img_name" => "tokyo",
                "destination" => "Tóquio",
                "description" => "Descubra o Japão que une tradição e modernidade! Visite templos históricos, explore os jardins serenos e mergulhe no ritmo vibrante de Tóquio. Um destino imperdível para os amantes de cultura e tecnologia.",
                "price" => 3200.00,
            ],
            [
                "img_name" => "veneza",
                "destination" => "Veneza",
                "description" => "Navegue pelos canais mágicos de Veneza e admire sua rica história e arte renascentista. De culinária autêntica à arquitetura deslumbrante, deixe-se envolver pelo romance italiano em cada esquina.",
                "price" => 2500.00,
            ],
            [
                "img_name" => "sydney",
                "destination" => "Sydney",
                "description" => "Explore as praias douradas, mergulhe na Grande Barreira de Corais e experimente a vida selvagem única da Austrália. Descubra as vibrantes cidades de Sydney e Melbourne.",
                "price" => 4000.00,
            ],
            [
                "img_name" => "pirâmides",
                "destination" => "Pirâmides do Egito",
                "description" => "Viaje no tempo e explore as pirâmides antigas, os templos majestosos e o rio Nilo. Desvende os mistérios e a rica história que fizeram do Egito o berço de grandes civilizações.",
                "price" => 1800.00,
            ],
            [
                "img_name" => "niagara",
                "destination" => "Cataratas do Niágara",
                "description" => "Sinta a força das majestosas cataratas e aventure-se pelas paisagens naturais do Canadá, com suas montanhas, lagos cristalinos e florestas exuberantes. Uma experiência inesquecível na natureza.",
                "price" => 2900.00,
            ],
            [
                "img_name" => "disney",
                "destination" => "Disney",
                "description" => "Descubra a magia dos parques temáticos da Disney com atrações incríveis, personagens icônicos e experiências únicas para todas as idades. Transforme sonhos em realidade!",
                "price" => 2000.00,
            ],
            [
                "img_name" => "safari",
                "destination" => "Safári na África do Sul",
                "description" => "Explore a vida selvagem em safáris emocionantes, admire paisagens deslumbrantes e conheça a rica história da África do Sul. Descubra a vibrante Cidade do Cabo e o Parque Nacional Kruger.",
                "price" => 3500.00,
            ],
        ]);
    }
}
