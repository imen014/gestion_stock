<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Create a Product</h3>
            <p class="blue-text">Just Enter the product details<br> so that's will be added in the database quicly.</p>
            <div class="card">
                <h5 class="text-center mb-4">setting up a new product</h5>
               <!-- <form class="form-card" onsubmit="event.preventDefault()">-->
                <form class="form-card" method="POST" action="{{ route('store_product')  }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label for="product_name" class="form-control-label px-3">Product name<span class="text-danger"> *</span></label> <input type="text" id="product_name" name="product_name" placeholder="Enter product name" onblur="validate(1)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label for="category_id" class="form-control-label px-3">Category<span class="text-danger"> *</span></label>
                            <select id="category_id" name="category_id" class="form-control" >
                                <option value="">Select Category</option>
                                @foreach ($categories as $id => $categorie_name)
                                <option value="{{ $id }}">{{ $categorie_name }}</option>
                                @endforeach
                            </select>
                        </div>                    </div>
                    <div class="row justify-content-between text-left">
                        <div  class="form-group col-sm-6 flex-column d-flex"> <label for="fournisseur" class="form-control-label px-3">Supplier<span class="text-danger"> *</span></label> <input type="text" id="fournisseur" name="fournisseur" placeholder="" onblur="validate(3)"> </div>
                        <div  class="form-group col-sm-6 flex-column d-flex"> <label for="price" class="form-control-label px-3">Price<span class="text-danger"> *</span></label> <input type="number" id="price" name="price" placeholder="" onblur="validate(4)"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div  class="form-group col-sm-6 flex-column d-flex"> <label for="quantity" class="form-control-label px-3">Quantity<span class="text-danger"> *</span></label> <input type="number" id="quantity" name="quantity" placeholder="" onblur="validate(5)"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label for="image" class="form-control-label px-3">Product image is not required bt you can add it<span class="text-danger"> </span></label> <input type="file" id="image" name="image" placeholder="" onblur="validate(6)"> </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary form-control-file">Confirm</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/script.js"></script>
</body>
</html>