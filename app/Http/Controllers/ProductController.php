<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        $saveddata = Product::create($data);
        return response(['products' => $saveddata]);
    }

    public function index()
    {
        $data = Product::all();
        return response(['data' => $data]);
    }

    public function update(Request $request, Product $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $updateddata = $id->update($data);

        return response(['updatedproducts' => $updateddata]);
    }

    public function destroy(Product $id)
    {
        $id->delete();

        return response(['message' => 'Deleted']);
    }
}
