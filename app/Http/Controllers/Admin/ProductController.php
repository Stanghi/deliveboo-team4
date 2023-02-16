<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        $products = Product::orderBy('name')->where('restaurant_id', $restaurant->id)->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *@param  \Illuminate\Http\Request  $request
     *@return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $form_data = $request->all();
        $form_data['restaurant_id'] = Auth::id();
        $form_data['slug'] = Product::generateSlug($form_data['name']);

        if (array_key_exists('img', $form_data)) {
            $form_data['img_original_name'] = $request->file('img')->getClientOriginalName();
            $form_data['img'] = Storage::put('uploads', $form_data['img']);
        }

        $new_product = Product::Create($form_data);

        // if (array_key_exists('technologies', $form_data)) {
        //     $new_product->technologies()->attach($form_data['technologies']);
        // }

        return redirect()->route('admin.products.show', $new_product);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $form_data = $request->all();

        if ($form_data['name'] != $product->name) {
            $form_data['slug'] = Product::generateSlug(($form_data['name']));
        } else {
            $form_data['slug'] = $product->slug;
        }

        if (array_key_exists('img', $form_data)) {
            if ($product->img) {
                Storage::disk('public')->delete($product->img);
            }

            $form_data['img_original_name'] = $request->file('img')->getClientOriginalName();
            $form_data['img'] = Storage::put('uploads', $form_data['img']);
        }

        $product->update($form_data);

        return redirect()->route('admin.products.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->img) {
            Storage::disk('public')->delete($product->img);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('deleted', "$product->name eliminato correttamente");
    }
}
