<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function viewCategories() {
        $categories = Category::all(); // Busca todos os usuários
        return view('forum.categories.viewCategories', ['categories' => $categories]); // Retorna a view com os dados dos usuários
    }

    public function listByTitle(Request $request,$title) {
        $category = Category::where('title', $title)->first();
        return view('forum.categories.editCategories', ['category' => $category]);
        // return view('categories.find');
    }

    public function updateCategory(Request $request, $id) {
        $category = Category::where('id', $id)->first();
        $category->title = $request-> title;
        $category->description = $request-> description;
        $category->save();
        return redirect()->route('viewCategories', [$category->id])
            ->with('message', 'Atualizado com sucesso!');
    }

    
    public function createCategory(Request $request) {
        if ($request->isMethod('GET')) {
            return view('forum.categories.create');
        } else {
            $request->validate([
                'title' => 'required|string|max:255|unique:categories',
                'description' => 'required|string|max:255|',

            ]);

            $category = Category::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            Auth::login(Auth::user());

            return redirect()->route('viewCategories');
        }
    }

    public function editCategory() {
        return view('categories.edit');
    }

    public function deleteCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('viewCategories')->with('success', 'category deleted successfully');
    }
}
