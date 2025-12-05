@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0 rounded-4">
                
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h3 class="mb-0">{{ $product->name }}</h3>
                </div>

                <div class="card-body text-center">

                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="img-fluid rounded mb-3 shadow-sm"
                             style="max-width: 250px;"
                             alt="{{ $product->name }}">
                    @else
                        <p class="text-muted">Aucune image disponible</p>
                    @endif

                    <div class="mt-4 text-start">
                        <p><strong>Prix :</strong> {{ number_format($product->price, 0, ',', ' ') }} FCFA</p>
                        <p><strong>Détails :</strong> {{ $product->details ?? 'Aucun détail disponible' }}</p>
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-between bg-light rounded-bottom-4">
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                        ⬅ Retour
                    </a>

                    <div>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary me-2">
                            Modifier
                        </a>

                        <form action="{{ route('products.destroy', $product->id) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
