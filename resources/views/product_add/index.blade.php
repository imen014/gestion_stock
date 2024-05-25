@extends('../base');
@section('content')

<style>
  body {
      background: url('/img/background.jpg') no-repeat center center fixed;
      background-size: auto;
      
  }
  .container {
      background: rgba(255, 255, 255, 0.8); /* Fond semi-transparent pour rendre le texte lisible */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  .table thead {
      background-color: #343a40;
      color: white;
  }
  .table img {
      max-width: 100%;
      height: auto;
  }
</style>

@guest
  <div class="container">
      <p>Please login or register.</p>
  </div>
@endguest

@auth
<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product name</th>
      <th scope="col">Category</th>
      <th scope="col">Supplier</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
    <tr>
      <th scope="row">{{ $product->id   }}</th>
      <td>{{ $product->product_name   }}</td>
      <td>{{ optional($product->categorie)->categorie_name }}</td>
      <td>{{ $product->fournisseur   }}</td>
      <td>{{ $product->price   }}</td>
      <td>{{ $product->quantity   }}</td>
      <td><img class="img-fluid img-thumbnail max-width:100% height:auto" src="images/{{ $product->image_path   }}" alt="product image" /> </td>
      <td>{{ $product->created_at   }}</td>
      <td>{{ $product->updated_at   }}</td>
      <td>
        <div class="text-center">
    <a href="{{ route('edit_product', ['id'=>$product->id])   }}" title="Edit"><i class="fas fa-edit text-primary"></i></a>
    <a href="{{ route('delete_product', ['id'=>$product->id])   }}" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>
    <a href="{{ route('show_product',['id'=>$product->id])   }}" title="Show"><i class="fas fa-eye text-success"></i></a>
</div>

    </td>

    </tr>
    @endforeach
    <!-- {{ $products->links()  }} -->
    {{ $products->links('vendor.pagination.custom-pagination') }}


  </tbody>
</table>
</div>

@endauth
@endsection