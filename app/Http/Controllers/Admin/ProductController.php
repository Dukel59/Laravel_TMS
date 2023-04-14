<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::query()->orderByDesc('created_at')->paginate(15);

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    public function createView(){
        return view('admin.products.create', [
            'categories' => Category::query()->where('is_active', 1)->get()
        ]);
    }

    public function create(CreateProductRequest $request){
        $products = Product::query()->create($request->validated());

        session()->flash('success', 'Product has been successfully created');
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product){
        return view('admin.products.update', [
            'product' => $product,
            'categories' => Category::query()->where('is_active', 1)->get()
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product){
        $product->update($request->validated());
        session()->flash('success', 'Product has been successfully updated');
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product){
        $product->delete();
        session()->flash('success', 'Product has been successfully deleted');
        return back();
    }

    public function exportExcel(ProductService $productService){
        $productService->exportExcel(Product::all());
    }
    public function importExcel(ProductService $productService){
        $productService->importExcel();
        return redirect()->back();
    }
    public function exportCSV(ProductService $productService){
        $productService->exportCSV(Product::all());
    }
}
