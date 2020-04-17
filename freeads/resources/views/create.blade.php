@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('ad.store') }}">
@csrf

  <div class="form-group">
    <label for="title">Titre de l'annonce</label>
    <input type="email" class="form-control" id="title" aria-describedby="title">
  </div>
  <div class="form-group">
    <label for="description">Description de l'annonce</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>
  <div class="form-group">
    <label for="localisation">Localisation</label>
    <input type="text" class="form-control" id="localisation" names="localisation">
  </div>
  <div class="form-group">
    <label for="price">Prix</label>
    <input type="text" class="form-control" id="price" names="price">
  </div>

  <button type="submit" class="btn btn-primary">Soumettre notre annonce</button>
</form>
@endsection