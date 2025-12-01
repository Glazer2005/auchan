@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le produit</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nom :</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label>Prix :</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label>Détails :</label>
            <textarea name="details" class="form-control">{{ $product->details }}</textarea>
        </div>

        <div class="mb-3">
            <label>Image :</label><br>
            <img src="{{ asset('storage/' . $product->image) }}" width="120"><br><br>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
