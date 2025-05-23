<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function allCategories()
    {
        $categories = Category::latest()->get();
        return view('admin.category.category_all', compact('categories'));
    }

    public function addCategory()
    {
        return view('admin.category.category_add');
    }

    public function addCategoryForm(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        
        // Create directory if it doesn't exist
        if (!file_exists('upload/category')) {
            mkdir('upload/category', 0777, true);
        }
        
        // Move the uploaded file
        $image->move('upload/category', $name_gen);
        $save_url = 'upload/category/'.$name_gen;

        Category::create([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
            'category_image' => $save_url
        ]);

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.category_edit', compact('category'));
    }

    public function updateCategoryForm(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category = Category::findOrFail($request->id);

        if ($request->file('category_image')) {
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            // Create directory if it doesn't exist
            if (!file_exists('upload/category')) {
                mkdir('upload/category', 0777, true);
            }
            
            // Delete old image
            if (file_exists($category->category_image)) {
                unlink($category->category_image);
            }

            // Move the uploaded file
            $image->move('upload/category', $name_gen);
            $save_url = 'upload/category/'.$name_gen;

            $category->update([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name),
                'category_image' => $save_url
            ]);
        } else {
            $category->update([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name)
            ]);
        }

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        
        // Delete category image
        if (file_exists($category->category_image)) {
            unlink($category->category_image);
        }

        $category->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
} 