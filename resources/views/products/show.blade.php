@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h3>{{ $product->name }}</h3>
        </div>

        <div class="card-body text-center">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" 
                     class="img-fluid" style="max-width: 200px;" alt="{{ $product->name }}">
            @else
                <p>Aucune image disponible</p>
            @endif

            <p><strong>Prix :</strong> {{ $product->price }} FCFA</p>
            <p><strong>Détails :</strong> {{ $product->details ?? 'Aucun détail disponible' }}</p>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Retour</a>

            <div>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Modifier</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
