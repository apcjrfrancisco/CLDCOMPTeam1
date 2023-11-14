<?php

namespace App\Http\Controllers\Pos;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function CategoryAll()
    {
        $categories = Category::latest()->get();
        return view('backend.category.categories', compact('categories'));
    }

    public function CategoryAdd()
    {
        return view('backend.category.category_add');
    }

    public function CategoryStore(Request $request)
    {
        Category::insert([
            'category_name' => $request->category_name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Added!', 
            'alert-type' => 'success'
        );

        return redirect()->route('category')->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request)
    {
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Updated!', 
            'alert-type' => 'info'
        );

        return redirect()->route('category')->with($notification);
    }

    public function CategoryDelete($id)
    {
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted!', 
            'alert-type' => 'info'
        );

        return redirect()->route('category')->with($notification);
    }
}
