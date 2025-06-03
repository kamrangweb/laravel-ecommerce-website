<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function productList()
    {
        $productList = Product::latest()->get();
        return view('admin.products.product_list', compact('productList'));
    }
    
    public function productStatus(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->status = $request->status;
        $product->save();

        return response()->json(['success' => 'Successful']);
    }
    
    public function addProduct(Request $request)
    {
        // If you have categories/subcategories, fetch them here
        return view('admin.products.product_add');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'selling_price' => 'required|numeric',
            'sku' => 'required',
            'stock' => 'required|integer',
            'product_thumbnail' => 'required|image',
        ],
        [
            'product_name.required' => 'Product name cannot be empty',
            'selling_price.required' => 'Selling price is required',
            'sku.required' => 'SKU is required',
            'stock.required' => 'Stock is required',
            'product_thumbnail.required' => 'Product image is required',
        ]);

        $image = $request->file('product_thumbnail');
        $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/products/'), $imageName);
        $imagePath = 'upload/products/'.$imageName;

        Product::create([
            'product_name' => $request->product_name,
            'product_thumbnail' => $imagePath,
            // 'short_description' => $request->short_description,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            // 'sku' => $request->sku,
            'product_stock_quantity' => $request->stock,
            // 'status' => $request->status ?? 1,
        ]);

        $notification = array(
            'message' => 'Product added successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('product.list')->with($notification);
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.product_edit', compact('product'));
    }

    public function updateProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'selling_price' => 'required|numeric',
            'sku' => 'required',
            'stock' => 'required|integer',
        ],
        [
            'product_name.required' => 'Product name cannot be empty',
            'selling_price.required' => 'Selling price is required',
            'sku.required' => 'SKU is required',
            'stock.required' => 'Stock is required',
        ]);

        $productId = $request->id;
        $product = Product::findOrFail($productId);
        $data = [
            'product_name' => $request->product_name,
            // 'short_description' => $request->short_description,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'product_sku' => $request->sku,
            'product_stock_quantity' => $request->stock,
            // 'status' => $request->status ?? 1,
        ];

        if($request->file('product_thumbnail')) {
            $image = $request->file('product_thumbnail');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/products/'), $imageName);
            $imagePath = 'upload/products/'.$imageName;

            if(file_exists($product->product_thumbnail)) {
                unlink($product->product_thumbnail);
            }
            $data['product_thumbnail'] = $imagePath;
        }

        $product->update($data);

        $notification = array(
            'message' => 'Product updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.list')->with($notification);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $image = $product->product_thumbnail;

        if(file_exists($image)) {
            unlink($image);
        }

        $product->delete();

        $notification = array(
            'message' => 'Product deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
} 