<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        confirmDelete("Hapus Data", "Anda yakin ingin menghapus kategori ini?");
        return view('category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $request->id,
            'description' => 'required|max:100',
        ],
        [
            'category_name.required' => 'Nama kategori harus diisi.',
            'category_name.unique' => 'Nama kategori sudah ada.',
            'description.required' => 'Deskripsi harus diisi.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 100 karakter.',
        ]
    );

        Category::updateOrCreate(
            ['id' => $request->id],
            [
                'category_name' => $request->category_name,
                'slug' => Str::slug($request->category_name),
                'description' => $request->description,
            ]
        );

       toast('Kategori berhasil disimpan.', 'success');


        return redirect()->route('master-data.categories.index');
    }

    public function destroy(String $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        toast('Kategori berhasil dihapus.', 'success');

        return redirect()->route('master-data.categories.index');
    }
}
