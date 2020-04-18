@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Déposer une annonce</h1>
    <hr>
    <form method="POST" action="{{route('ad.store')}}">
        @csrf
        <div class="form-group">
            <label for="title">Titre de L'annonce</label>
            <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="title" aria-describedby="titre" name="title">
        </div>

      
        <div class="form-group">
            <label for="description">Description de L'annonce</label>
            <textarea name="description" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Prix</label>
            <input type="text" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" id="price" name="price">
        </div>


        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>
@endsection