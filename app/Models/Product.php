<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public function products($name, $option, $unit)
    {
         
        $products = Product::select(DB::raw('`name`, 
                    `provider`, `option`, `unit`, 
                    IFNULL(`price`, `recommend`) as `price`'))
                    ->where('name', "$name")
                    ->where('option', "$option")
                    ->where('unit', $unit)
                    ->get();
                
        
        return $products;
    }
}
