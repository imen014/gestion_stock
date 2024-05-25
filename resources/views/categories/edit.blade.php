@extends('../base')
@section('content')

<div class="container p-5">
<form method="post" action="{{  route('update_categorie',['id'=>$categorie->id]) }}">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="categorie_name">Enter categorie name</label>
    <input value="{{ old('categorie_name', $categorie->categorie_name)   }}" type="text" class="form-control" id="categorie_name" name="categorie_name" aria-describedby="addCategorieName" placeholder="Categorie name">
    <small id="categorieName" class="form-text text-muted">Choose Categorie Name.</small>
  </div>
  <div class="form-group">
    <label for="categorie_description">Description</label>
    <textarea  class="form-control" id="categorie_description" name="categorie_description" placeholder="description">{{ old('description', $categorie->description)   }}</textarea>
  </div>
  <div class="form-check">
  <label class="form-check-label" for="is_active_categorie">Is active categorie?</label>

    @if( $categorie->is_active === 1)
    <input type="checkbox" checked name="is_active_categorie" class="form-check-input" id="is_active_categorie">
    @else
    <input type="checkbox"  name="is_active_categorie" class="form-check-input" id="is_active_categorie">
    @endif
  </div>
  <button type="submit" class="btn btn-dark">Save</button>
</form>
</div>

@endsection