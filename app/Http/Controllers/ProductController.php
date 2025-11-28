<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * عرض كل المنتجات
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * صفحة إنشاء منتج جديد
     */
    public function create()
    {
        $categories = Category::where('status', true)->get();
        return view('products.create', compact('categories'));
    }

    /**
     * تخزين منتج جديد في قاعدة البيانات
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $slug = Str::slug($request->name);

        // حفظ الصورة الأساسية
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // إنشاء المنتج
        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'stock' => $request->stock ?? 0,
            'image' => $imagePath,
            'status' => $request->has('status'),
        ]);

        // لو فيه صور إضافية
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'تم إضافة المنتج بنجاح');
    }

    /**
     * عرض منتج محدد
     */
    public function show(Product $product)
    {
        $product->load('category', 'images');
        return view('products.show', compact('product'));
    }

    /**
     * صفحة تعديل منتج
     */
    public function edit(Product $product)
    {
        $categories = Category::where('status', true)->get();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * تحديث المنتج
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'category_id', 'description', 'price', 'discount_price', 'stock']);
        $data['slug'] = Str::slug($request->name);
        $data['status'] = $request->has('status');

        // تحديث الصورة الأساسية
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        // تحديث الصور الإضافية (اختياري)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'تم تحديث المنتج بنجاح');
    }

    /**
     * حذف المنتج
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        foreach ($product->images as $img) {
            Storage::disk('public')->delete($img->image_path);
            $img->delete();
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'تم حذف المنتج بنجاح');
    }
}
