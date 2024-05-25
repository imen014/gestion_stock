<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;



class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.index')->with('categories', Categorie::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = "Choose Categorie Name.";
        $request->validate(
            [
                'categorie_name'=>['required','string',Rule::unique('categories', 'categorie_name')],
                'categorie_description'=>['required','string']
            ]);
            
            // Vérifier si la catégorie existe déjà
            $existingCategory = Categorie::where('categorie_name', $request->input('categorie_name'))->first();

            if ($existingCategory) {
                // Retourner à la vue précédente avec un message d'erreur
                    $message = "Categorie already exists";          
                  }


            $categorie = new Categorie();
            $categorie->categorie_name = $request->input('categorie_name');
            $categorie->description = $request->input('categorie_description');
            // Vérifier si la case à cocher a été cochée dans la requête
            $is_active = $request->has('is_active_categorie') ? 1 : 0;
            $categorie->is_active = $is_active;
    
            $categorie->save();
            $message = 'Category created succefully';
            return view('categories.create')->with('message',$message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.show')->with('categorie',$categorie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('categories.edit')->with('categorie', Categorie::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'categorie_name'=>'required|string',
                'categorie_description'=>'required|string'
            ]);

            $categorie = Categorie::findOrFail($id);
            $categorie->categorie_name = $request->input('categorie_name');
            $categorie->description = $request->input('categorie_description');
            // Vérifier si la case à cocher a été cochée dans la requête
            $is_active = $request->has('is_active_categorie') ? 1 : 0;
            $categorie->is_active = $is_active;
    
            $categorie->update();
            return view('categories.categorie_updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::findOrFail($id);
         // Vérifier s'il y a des produits associés à cette catégorie
        if ($categorie->products->isNotEmpty()) {
            return redirect()->back()->with('error', 'Cannot delete category. Remove or reassign associated products first.');
        }
    
        $categorie->delete();
        return redirect('get_categories')->with('success', 'Categorie deleted successfully.')->withDelay(3);

        //return view('categories.deleted');
    }
}
