@extends('../base')
@section('content')

<div class="container">
<ol class="list-group list-group-numbered">
<li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Categorie name</div>
     {{ $categorie->categorie_name  }}  <span class="badge text-bg-success rounded-pill"> Categorie name </span>
    </div>
    <span class="badge text-bg-primary rounded-pill">{{ $categorie->categorie_name  }}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Description</div>
      Resume categorie description 
    </div>
    <span class="badge text-bg-primary rounded-pill">{{ $categorie->description  }}</span>
  </li>
  
</ol>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Creation Date</h5>
      <small>{{ $categorie->created_at }}</small>
    </div>
    <p class="mb-1">This categorie was created in the firstly at.</p>
    <small>This is the entry date of this category in this system.</small>

  </a>
  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Lastest Updated date</h5>
      <small class="text-body-secondary">{{ $categorie->updated_at }}</small>
    </div>
    <p class="mb-1">Look at the lastest date of update.</p>
    <small class="text-body-secondary">You can updated immediatly if you want.</small>
  </a>
  
</div>
</div>


@endsection