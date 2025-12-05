@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📦 Liste des Produits</h2>
        <a href="{{ route('products.create') }}" class="btn btn-danger shadow-sm">
            <i data-lucide="plus"></i> Ajouter un produit
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100 rounded-4">

                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top" 
                             style="height:200px; object-fit:cover;" 
                             alt="{{ $product->name }}">
                    @endif

                    <div class="card-body d-flex flex-column">

                        <h5 class="fw-semibold">{{ $product->name }}</h5>
                        <p class="text-muted small mb-2">
                            <i data-lucide="wallet"></i> 
                            {{ number_format($product->price, 0, ',', ' ') }} FCFA
                        </p>

                        @if($product->category)
                            <span class="badge bg-danger mb-2">
                                <i data-lucide="folder"></i> {{ $product->category->name }}
                            </span>
                        @endif

                        <p class="text-muted small flex-grow-1">{{ $product->details }}</p>

                        <div class="d-flex justify-content-between mt-auto">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary btn-sm">
                                <i data-lucide="eye"></i> Voir
                            </a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm text-white">
                                <i data-lucide="edit"></i> Modifier
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">
                                    <i data-lucide="trash-2"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted text-center">Aucun produit disponible.</p>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

</div>

<script>
    lucide.createIcons();
</script>
@endsection
