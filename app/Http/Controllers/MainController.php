<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use App\Models\Review;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(){
        $promotions = Promotion::query()->where("is_active", 1)->get();
        $reviews = Review::query()->where('is_active', 1)->get();
        return view('main', ['promotions' => $promotions, 'reviews' => $reviews]);
    }
    public function products(){
        $products = Product::query()->where('is_active', 1)->get();
        return view('products', ['products' => $products]);
    }
    public function about(){
        return view('about');
    }
    public function contacts(){
        return view('contacts');
    }
}
