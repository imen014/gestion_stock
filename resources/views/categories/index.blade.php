@extends('../base')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Categorie name</th>
      <th scope="col">Description</th>
      <th scope="col">Is active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $categorie)
    <tr>
      <th scope="row">{{ $categorie->id   }}</th>
      <td>{{ $categorie->categorie_name   }}</td>
      <td>{{ $categorie->description  }}</td>
      <td>
    @if($categorie->is_active)
        <i class="fas fa-check text-success"></i> <!-- Icône de correct -->
    @else
        <i class="fa-solid fa-x text-danger"></i> <!-- Icône de faux -->
    @endif
</td>
      <td>
        <div class="text-center">
    <a href="{{ route('edit_categorie',['id'=>$categorie->id ])  }}" title="Edit"><i class="fas fa-edit text-primary"></i></a>
    <a  href="{{ route('destroy_categorie',['id'=>$categorie->id ])  }}" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>
    <a href="{{ route('show_categorie',['id'=>$categorie->id ])  }}" title="Show"><i class="fas fa-eye text-success"></i></a>
</div>

    </td>

    </tr>
    @endforeach

    {{ $categories->links('vendor.pagination.custom-pagination') }}

  </tbody>

</table>

@endsection