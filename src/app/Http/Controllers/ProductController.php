<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        $sort = null;
        $keyword = null;
        return view('products.index', compact('products', 'sort', 'keyword'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');
        $sort = trim($request->input('sort'));

        //dd($sort);

        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        if ($sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->paginate(6);

        return view('products.index', compact('products', 'keyword', 'sort'));
    }

    public function create()
    {
        $data = session('product_input', []);
        $image = session('product_image', null);

        
        session()->forget(['product_input', 'product_image']);

        return view('products.register', compact('data', 'image'));
    }

    public function store(Request $request)
    {
        $input = session('product_input');
        $filename = session('product_image');

        if (!$input || !$filename) {
            return redirect()->route('products.create')->with('error', '登録情報が見つかりませんでした');
        }

        Storage::move('public/temp/' . $filename, 'public/images/' . $filename);

        $product = Product::create([
            'name' => $input['name'],
            'price' => $input['price'],
            'image' => $filename,
            'description' => $input['description'],
        ]);

        $seasonIds = [];
        foreach ($input['seasons'] as $seasonName) {
            $season = Season::firstOrCreate(['name' => $seasonName]);
            $seasonIds[] = $season->id;
        }

        $product->seasons()->attach($seasonIds);

        session()->forget(['product_input', 'product_image']);

        return redirect()->route('products.index')->with('success', '登録完了しました');
    }

    public function confirm(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $path = $request->file('image')->store('public/temp');
        $filename = basename($path);

        $input = $validated;
        unset($input['image']);

        session([
            'product_input' => $input,
            'product_image' => $filename,
        ]);

        return view('products.confirm', [
            'data' => $input,
            'image' => $filename,
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $validated['image'] = str_replace('public/', 'storage/', $path);
        }

        $product->update($validated);

        $seasonIds = [];
        foreach ($request->input('seasons', []) as $seasonName) {
            $season = Season::firstOrCreate(['name' => $seasonName]);
            $seasonIds[] = $season->id;
        }

        $product->seasons()->sync($seasonIds);


        return redirect()->route('products.edit', $product->id)
            ->with('success', '商品情報を更新しました！');
    }

    public function delete(Product $product)
    {
        if ($product->image && Storage::exists(str_replace('storage/', 'public/', $product->image))) {
            Storage::delete(str_replace('storage/', 'public/', $product->image));
        }

        $product->seasons()->detach();

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', '商品を削除しました');
    }
}

