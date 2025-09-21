<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
    public $products = null;
    public $totalprice = 0;
    public $totalQuanty = 0;

    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalprice = $cart->totalprice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }

    public function AddCart($product, $id){
        $newProduct = [
            'quanty' => 0,
            'price' => $product->price,
            'productInfo' => $product
        ];
        if($this->products){
            if(array_key_exists($id, $this->products)){
                $newProduct = $this->products[$id];
            }
        }
        
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalprice += $product->price;
        $this->totalQuanty++;
    }

    public function Deletecart($id){
        $this->totalprice -= $this->products[$id]['price'];
        $this->totalQuanty -= $this->products[$id]['quanty'];
        unset($this->products[$id]);
    } 

    public function UpdateItemCart($id, $quanty){
        if(array_key_exists($id, $this->products)) {
            $product = $this->products[$id]['productInfo'];
            
            // Trừ đi số lượng và giá của sản phẩm cũ
            $this->totalQuanty -= $this->products[$id]['quanty'];
            $this->totalprice -= $this->products[$id]['price'];
           
            // Cập nhật số lượng và giá mới cho sản phẩm
            $this->products[$id]['quanty'] = $quanty;
            $this->products[$id]['price'] = $quanty * $product->price;
    
            // Cộng vào tổng số lượng và giá mới
            $this->totalQuanty += $this->products[$id]['quanty'];
            $this->totalprice += $this->products[$id]['price'];
        }
    }
    
}