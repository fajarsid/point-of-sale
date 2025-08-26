<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        confirmDelete("Hapus Data", "Anda yakin ingin menghapus produk ini?");
        return view('product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'product_name' => 'required|unique:products,product_name' . ($id ? ",$id" : ''),
            'category_id' => 'required|exists:categories,id',
            'selling_price' => 'required|numeric|min:0',
            'cost_price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'min_quantity' => 'required|integer|min:0',
            'is_active' => 'required',
        ], [
            'product_name.required' => 'Nama produk harus diisi.',
            'product_name.unique' => 'Nama produk sudah ada.',
            'category_id.required' => 'Kategori produk harus dipilih.',
            'category_id.exists' => 'Kategori produk tidak valid.',
            'selling_price.required' => 'Harga jual harus diisi.',
            'selling_price.numeric' => 'Harga jual harus berupa angka.',
            'selling_price.min' => 'Harga jual tidak boleh kurang dari 0.',
            'cost_price.required' => 'Harga beli harus diisi.',
            'cost_price.numeric' => 'Harga beli harus berupa angka.',
            'cost_price.min' => 'Harga beli tidak boleh kurang dari 0.',
            'quantity.required' => 'Stok harus diisi.',
            'quantity.integer' => 'Stok harus berupa angka.',
            'quantity.min' => 'Stok tidak boleh kurang dari 0.',
            'min_quantity.required' => 'Stok minimal harus diisi.',
            'min_quantity.integer' => 'Stok minimal harus berupa angka.',
            'min_quantity.min' => 'Stok minimal tidak boleh kurang dari 0.',
            'is_active.required' => 'Status produk harus dipilih.',
        ]);

        $newRequest =   [
            'id' => $id,
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'selling_price' => $request->selling_price,
            'cost_price' => $request->cost_price,
            'quantity' => $request->quantity,
            'min_quantity' => $request->min_quantity,
            'is_active' => $request->is_active ? true : false,
        ];

        if (!$id) {
            $newRequest['product_code'] = Product::codeProduct();
        }

        Product::updateOrCreate(
            ['id' => $id],
            $newRequest
        );

        toast('Produk berhasil disimpan.', 'success');
        return redirect()->route('master-data.products.index')->with('success', 'Product created successfully.');
    }

    public function destroy(String $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        toast('Produk berhasil dihapus.', 'success');

        return redirect()->route('master-data.products.index');
    }
}
