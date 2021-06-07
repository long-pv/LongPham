<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select(['id', 'title', 'price', 'quantity', 'sale_off'])
        ->orderBy('id', 'desc')
        ->paginate(config('constants.admin_perpage'));

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(CreateProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = 1;

        Product::create($data);

        return redirect(route('admin.products.list'))
        ->with('success', 'The product is created success!'); //gọi tới router khác
    }


    public function destroy(Product $product,$id)
    {
        $product = Product::find($id); // tìm id
        $product ->delete(); // xóa
        return redirect(route('admin.products.list')); // gọi tới list
    }

    public function send(Product $product,$id)
    {
        $product = Product::find($id);
        return view('admin.products.update',compact('product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->sale_off = $request->sale_off;
        $product->description = $request->description;
        $product->save();
        return redirect(route('admin.products.list'));
    }
}
