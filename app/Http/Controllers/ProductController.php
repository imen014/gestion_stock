<?php

namespace App\Http\Controllers;
use App\Models\Categorie;


use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
  public function index()
    {
        //return view('product_add.index')->with('products', Products::paginate(7));
        $products = Products::paginate(7);
        return view('product_add.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::pluck('categorie_name', 'id');
        return view('product_add.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'product_name' => 'string|required',
            'category_id' => 'integer|required',
            'fournisseur' => 'string|required',
            'price' => 'numeric|required',
            'quantity' => 'required|integer'

        ]);
        // Vérifier si le produit existe déjà par son nom
        $existingProduct = Products::where('product_name', $request->input('product_name'))
        ->where('category_id',$request->input('category_id'))
        ->where('fournisseur',$request->input('fournisseur'))
        ->first();

        if ($existingProduct) {
            // Mettre à jour la quantité du produit existant
            $existingProduct->quantity += $request->input('quantity');
            $existingProduct->update();
        return view('product_add.confirm_increase_quantity', compact('existingProduct'));
        }
        $products=new Products();
        $products->product_name=$request->input('product_name');
        $products->category_id=$request->input('category_id');
        $products->fournisseur=$request->input('fournisseur');
        $products->price=$request->input('price');
        $products->quantity=$request->input('quantity');
        $newImageName = uniqid() . '-' . $request->product_name . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $newImageName);

        $products->image_path=$newImageName;
        $products->save();
        return view('product_add.product_stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('product_add.show')->with('product', Products::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Categorie::all()->pluck('categorie_name', 'id'); // Adjust the fields as per your table

        return view('product_add.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048',
            'product_name' => 'string|required',
            'category_id' => 'integer|required',
            'fournisseur' => 'string|required',
            'price' => 'numeric|required',
            'quantity' => 'integer|required'
        ]);
    
        $product = Products::findOrFail($id);
        $product->product_name = $request->input('product_name');
        $product->category_id = $request->input('category_id');
        $product->fournisseur = $request->input('fournisseur');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
    
        if ($request->hasFile('image')) {
            if (file_exists(public_path('images/' . $product->image_path))) {
                unlink(public_path('images/' . $product->image_path));
            }
            $newImageName = uniqid() . '-' . $request->product_name . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $newImageName);
            $product->image_path = $newImageName;
        }
    
        $product->save();
    
        return redirect()->route('all_products')->with('success', 'Product updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return view('product_add.product_deleted');
    }
   
}
