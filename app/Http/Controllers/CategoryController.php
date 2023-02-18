<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:categories.index')->only('index');
        $this->middleware('can:categories.create')->only('create', 'store');
        $this->middleware('can:categories.show')->only('show');
        $this->middleware('can:categories.edit')->only('edit', 'update');
        $this->middleware('can:categories.destroy')->only('destroy');
    }

    public function index()
    {
        $categories = Category::get();
        return view('back.category.index', compact('categories'));
    }

    public function create()
    {
        return view('back.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());

        Alert::alert()->success('Todo correcto', 'Categoría registrada exitosamente!');

        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('back.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('back.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        Alert::alert()->success('Todo correcto', 'Categoría actualizada exitosamente!');

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (Throwable $e) {
            Alert::alert()->error('Error', '¡La categoría tiene productos asociados!');
            return redirect()->back();
        }

        return redirect()->route('categories.index');
    }
}
