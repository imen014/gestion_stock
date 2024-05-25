<!DOCTYPE html>
@extends('../base')

</head>
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Update a Product</h3>
            <p class="blue-text">Just Enter the correct product details<br> so that's will be updated in the database easly.</p>
            <div class="card">
                <h5 class="text-center mb-4">Update a product</h5>
                <img class="img-fluid img-thumbnail max-with:20% height:auto" src="{{ asset('images/' . $product->image_path) }}" alt="old_image"/>

               <!-- <form class="form-card" onsubmit="event.preventDefault()">-->
                <form class="form-card" method="POST" action="{{ route('update_product', ['id'=>$product->id])    }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label for="product_name" class="form-control-label px-3">Product name<span class="text-danger"> *</span></label> <input type="text" id="product_name" value="{{ old('product_name', $product->product_name) }}" name="product_name" placeholder="Enter product name" onblur="validate(1)"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div  class="form-group col-sm-6 flex-column d-flex"> <label for="fournisseur" class="form-control-label px-3">Supplier<span class="text-danger"> *</span></label> <input type="text" id="fournisseur" name="fournisseur" value="{{ old('fournisseur', $product->fournisseur) }}" placeholder="" onblur="validate(3)"> </div>
                        <div  class="form-group col-sm-6 flex-column d-flex"> <label for="price" class="form-control-label px-3">Price<span class="text-danger"> *</span></label> <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="" onblur="validate(4)"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div  class="form-group col-sm-6 flex-column d-flex"> <label for="quantity" class="form-control-label px-3">Quantity<span class="text-danger"> *</span></label> <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" placeholder="" onblur="validate(5)"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label for="image" class="form-control-label px-3">Product image is not required bt you can add it<span class="text-danger"> </span></label> <input type="file" id="image" name="image" placeholder="" onblur="validate(6)"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label for="category_id" class="form-control-label px-3">Category<span class="text-danger"> *</span></label>
                            <select id="category_id" name="category_id" class="form-control" >
                                <option value="">Select Category</option>
                                @foreach ($categories as $id => $categorie_name)
                                <option value="{{ $id }}">{{ $categorie_name }}</option>
                                @endforeach
                            </select>
                        </div>                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary form-control-file">Confirm</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>