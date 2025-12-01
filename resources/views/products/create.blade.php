@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un produit</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nom :</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Prix :</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Détails :</label>
            <textarea name="details" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Image :</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <button class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
