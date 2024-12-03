<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function listAllCategories() {
        $categories = Category::all(); // Busca todos os usuários
        return view('forum.categories.listAllCategories', ['categories' => $categories]); // Retorna a view com os dados dos usuários
    }

    // public function listByTitle(Request $request,$title) {
    //     $category = Category::where('title', $title)->first();
    //     return view('forum.categories.editCategories', ['category' => $category]);
    // }

    public function updateCategory(Request $request, $id) {
        $category = Category::where('id', $id)->first();
        $category->title = $request-> title;
        $category->description = $request-> description;
        $category->save();
        return redirect()->route('ListAllCategories', [$category->id])
            ->with('message', 'Atualizado com sucesso!');
    }

    
    public function createCategory(Request $request) {
        if ($request->isMethod('GET')) {
            return view('forum.categories.createCategory');
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

            return redirect()->route('ListAllCategories');
        }
    }

    public function editCategory($id) {
        $category = Category::findOrFail($id);
        return view('forum.categories.editCategory', ['category' => $category]);
    }

    public function deleteCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('ListAllCategories')->with('success', 'category deleted successfully');
    }
}
