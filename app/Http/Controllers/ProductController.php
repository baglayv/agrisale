<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public  $units = array(
        0 => 150000,
        1 => 75000,
    );
    
    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function product($name, $option, $unit)
    {
        $products = $this->productModel->products($name, $option, $this->units[$unit]);
       
        $product['name'] = $products[0]['name'];
        $product['option'] = $products[0]['option'];
        $product['unit'] = $products[0]['unit'];
        $product['agv_price'] = $products->median('price');
       
        return $product;
    }
}
