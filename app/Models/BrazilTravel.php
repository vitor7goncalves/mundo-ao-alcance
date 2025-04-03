<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrazilTravel extends Model
{
    protected $table = "brazil_travels";

    // Colunas da tabela
    public $id;
    public $img_name;
    public $destination;
    public $description;
    public $price;
    public $created_at;
    public $updated_at;
}