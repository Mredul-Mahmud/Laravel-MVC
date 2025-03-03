<?php


namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('categoriesList', compact('categories'));
    }

    public function create()
    {
        return view('createCategory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|unique:categories|max:100',
            'type' => 'required|max:50',
            'availability' => 'required|max:14',
        ]);

        Category::create($request->all());
        return redirect()->route('categories')->with('success', 'Category created successfully.');
    }
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('editCategory', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'categoryName' => 'max:50',
            'type' => 'max:20',
            'availability' => 'max:14',
        ]);

        $category->update([
            'categoryName' => $request->categoryName,
            'type' => $request->type,
            'availability' => $request->availability
        ]);

        return redirect()->route('categories')->with('success', 'Category updated successfully!');
    }
    public function CategoryDetail($id)
    {
        $category = Category::findorFail($id);

        return view('detailCategory', ['ExCategory'=> $category]);
    }
    public function showCategories()
    {
        $categories = Category::paginate(5);
        return view('allCategory', ['categories' => $categories]);
    }
    public function deleteCategory($id)
    {
        $category = Category::findorfail($id);

        $category->delete();
        flash()->info('The category has been deleted successfully.');
        return redirect() ->route('categories');
    }

}