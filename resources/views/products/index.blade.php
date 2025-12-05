@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Produits</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
        Ajouter un produit
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p><strong>{{ $product->price }} FCFA</strong></p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Modifier</a>

                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
      <div class="d-flex justify-content-center mt-4">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
@endsection
