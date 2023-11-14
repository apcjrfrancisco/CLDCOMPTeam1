<?php

namespace App\Http\Controllers\Pos;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function ProductsAll()
    {
        $products = Product::latest()->get();
        return view('backend.product.products', compact('products'));
    }

    public function ProductAdd()
    {
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();

        return view('backend.product.products_add', compact('supplier', 'unit', 'category'));
    }

    public function ProductStore(Request $request)
    {
        Product::insert([
            'product_name' => $request->product_name,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Added!', 
            'alert-type' => 'success'
        );

        return redirect()->route('product')->with($notification);
    }

    public function ProductEdit($id)
    {
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        $product = Product::findOrFail($id);

        return view('backend.product.products_edit', compact('supplier', 'unit', 'category', 'product'));

    }

    public function ProductUpdate(Request $request)
    {
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'product_name' => $request->product_name,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated!', 
            'alert-type' => 'info'
        );

        return redirect()->route('product')->with($notification);
    }

    public function ProductDelete($id)
    {
        Product::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Deleted!', 
            'alert-type' => 'info'
        );

        return redirect()->route('product')->with($notification);
    }
}
