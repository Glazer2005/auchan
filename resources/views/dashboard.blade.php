@extends('layouts.app')

@section('title', 'Produits')

@section('content')

<div class="container-fluid">

    <!-- ==== SELECTION RAPIDE DES CATÉGORIES ==== -->
<div class="mb-4">
    <h5 class="fw-bold">Catégories</h5>

    <div class="d-flex flex-wrap gap-2">
        <!-- Bouton toutes catégories -->
        <a href="{{ route('products.index') }}"
           class="btn btn-sm {{ request('category_id') ? 'btn-outline-danger' : 'btn-danger' }}">
            Toutes
        </a>

        <!-- Catégories dynamiques -->
        @foreach($categories as $category)
            <a href="{{ route('products.index', ['category_id' => $category->id]) }}"
               class="btn btn-sm 
               {{ request('category_id') == $category->id ? 'btn-danger' : 'btn-outline-danger' }}">
                <i data-lucide="folder"></i>
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</div>


    <!-- ==== STATISTIQUES ==== -->
    <div class="row g-4 mb-4">

        <!-- Total Produits -->
        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm border-0" 
                 style="background: linear-gradient(135deg,#E60028,#B0001F); color:white;">
                <div class="card-body text-center py-4">
                    <i data-lucide="boxes" style="width:42px;height:42px;"></i>
                    <h2 class="mt-2 mb-1">{{ $totalProducts ?? 0 }}</h2>
                    <p class="m-0">Total des Produits</p>
                </div>
            </div>
        </div>

        <!-- Dernier produit ajouté -->
        <div class="col-lg-8 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">
                    Dernier produit ajouté
                </div>

                <div class="card-body d-flex align-items-center">

                    @if ($lastProduct)

                        @if($lastProduct->image)
                            <img src="{{ asset('storage/' . $lastProduct->image) }}" 
                                 class="rounded shadow-sm me-4"
                                 style="width:120px;height:120px;object-fit:cover;">
                        @endif

                        <div>
                            <h4 class="fw-bold">{{ $lastProduct->name }}</h4>

                            <p class="text-muted m-0">
                                <i data-lucide="wallet"></i>
                                {{ number_format($lastProduct->price, 0, ',', ' ') }} FCFA
                            </p>

                            <!-- Catégorie -->
                            <p class="m-0 mt-1">
                                <span class="badge bg-danger">
                                    <i data-lucide="folder"></i>
                                    {{ $lastProduct->category->name ?? "Sans catégorie" }}
                                </span>
                            </p>

                            <p class="mt-2">{{ $lastProduct->details ?? '' }}</p>
                        </div>

                    @else
                        <p class="text-muted">Aucun produit ajouté pour le moment.</p>
                    @endif

                </div>
            </div>
        </div>

    </div>

    <!-- ==== LISTE DES PRODUITS ==== -->
    <h3 class="fw-bold mb-3">Produits</h3>

    <div class="row g-4">
        @forelse($products as $product)
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">

                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="card-img-top"
                         style="height:200px; object-fit:cover;">
                @endif

                <div class="card-body d-flex flex-column">

                    <h5 class="fw-semibold">{{ $product->name }}</h5>

                    <p class="text-muted small mb-1">
                        <i data-lucide="wallet"></i>
                        {{ number_format($product->price, 0, ',', ' ') }} FCFA
                    </p>

                    <!-- Catégorie -->
                    <p>
                        <span class="badge bg-danger">
                            <i data-lucide="folder"></i>
                            {{ $product->category->name ?? "Sans catégorie" }}
                        </span>
                    </p>

                    <p class="text-muted small flex-grow-1">{{ $product->details }}</p>

                    <div class="d-flex justify-content-between mt-auto">
                        <a href="{{ route('products.show', $product->id) }}"
                           class="btn btn-outline-primary btn-sm">
                           <i data-lucide="eye"></i> Voir
                        </a>

                        <a href="{{ route('products.edit', $product->id) }}"
                           class="btn btn-warning btn-sm text-white">
                           <i data-lucide="edit"></i> Modifier
                        </a>
                    </div>

                </div>
            </div>
        </div>

        @empty
        <p class="text-muted text-center">Aucun produit disponible pour cette catégorie.</p>
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
