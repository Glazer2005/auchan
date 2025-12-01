@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="row mb-4">
        <!-- Total des produits -->
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body text-center">
                    <h3>{{ $totalProducts ?? 0 }}</h3>
                    <p>Total des produits</p>
                </div>
            </div>
        </div>

        <!-- Dernier produit ajouté -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dernier produit ajouté</div>
                <div class="card-body">
                    @if($lastProduct)
                        <h4>{{ $lastProduct->name }}</h4>
                        <p>Prix : {{ $lastProduct->price }} FCFA</p>
                        @if($lastProduct->image)
                            <img src="{{ asset('storage/' . $lastProduct->image) }}" class="img-fluid" style="max-width:150px;">
                        @endif
                        <p>{{ $lastProduct->details ?? '' }}</p>
                    @else
                        <p>Aucun produit ajouté pour le moment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Liste complète des produits -->
    <h2 class="mb-3">Tous les produits</h2>
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4">
                <div class="card mb-3">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid" style="max-height:200px;" alt="{{ $product->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Prix : {{ $product->price }} FCFA</p>
                        <p class="card-text">{{ $product->details ?? '' }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">Voir</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Aucun produit disponible.</p>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>

</div>
@endsection
