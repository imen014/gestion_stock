@extends('../base')
@section('content')

<div class="container p-5">
<form method="post" action="{{ route('store_categorie')   }}">
    @csrf
  <div class="form-group">
    <label for="categorie_name">Enter categorie name</label>
    <input type="text" class="form-control" id="categorie_name" name="categorie_name" aria-describedby="addCategorieName" placeholder="Categorie name">
    @error('categorie_name')
    <small id="categorieName" class="form-text text-muted">{{ $message   }}Choose Categorie Name.</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="categorie_description">Description</label>
    <textarea class="form-control" id="categorie_description" name="categorie_description" placeholder="description"></textarea>
  </div>
  <div class="form-check">
    <input type="checkbox" name="is_active_categorie" class="form-check-input" id="is_active_categorie">
    <label class="form-check-label" for="is_active_categorie">Is active categorie?</label>
  </div>
  <button type="submit" class="btn btn-dark">Save</button>
</form>
</div>

@endsection