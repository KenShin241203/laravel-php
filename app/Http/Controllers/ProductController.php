<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Yêu cầu đăng nhập cho tất cả phương thức
    }
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Hiển thị form thêm sản phẩm
    public function create()
    {
        return view('products.create');
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
    {
        // Debug dữ liệu gửi lên
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'description', 'price');

        if ($request->hasFile('image')) {
            // Debug file upload
            // dd($request->file('image'));
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        try {
            Product::create($data);
            return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm!');
        } catch (\Exception $e) {
            // Hiển thị lỗi chi tiết
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    // Hiển thị form sửa sản phẩm
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048', // Tối đa 2MB
        ]);

        $product = Product::findOrFail($id);
        $data = $request->only('name', 'description', 'price');

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }
            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật!');
    }

    // Xóa sản phẩm
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
