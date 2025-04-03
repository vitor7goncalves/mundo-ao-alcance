<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class WorldTravel extends Model
{
    use HasFactory;

    protected $table = "world_travels";

    // Colunas da tabela
    public $id;
    public $img_name;
    public $destination;
    public $description;
    public $price;
    public $created_at;
    public $updated_at;
}