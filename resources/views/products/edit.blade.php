@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">✏️ Modifier le Produit</h2>
        <a href="{{ route('products.index') }}" class="btn btn-dark">
            <i data-lucide="arrow-left"></i> Retour
        </a>
    </div>

    <div class="card shadow-sm border-0" style="border-radius:18px;">
        <div class="card-header bg-danger text-white fw-bold" style="border-radius:18px 18px 0 0;">
            Modification du produit
        </div>

        <div class="card-body p-4">

            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nom -->
                <div class="mb-3">
                    <label class="fw-bold">Nom :</label>
                    <input type="text" name="name" class="form-control shadow-sm"
                           value="{{ $product->name }}" required>
                </div>

                <!-- Prix -->
                <div class="mb-3">
                    <label class="fw-bold">Prix (FCFA) :</label>
                    <div class="input-group shadow-sm">
                        <span class="input-group-text bg-dark text-white">
                            <i data-lucide="wallet"></i>
                        </span>
                        <input type="number" name="price" step="0.01"
                               class="form-control"
                               value="{{ $product->price }}" required>
                    </div>
                </div>

                <!-- Catégorie -->
                <div class="mb-3">
                    <label class="fw-bold">Catégorie :</label>
                    <select name="category_id" class="form-select shadow-sm" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Détails -->
                <div class="mb-3">
                    <label class="fw-bold">Détails :</label>
                    <textarea name="details" class="form-control shadow-sm" rows="3">{{ $product->details }}</textarea>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label class="fw-bold">Image actuelle :</label><br>

                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                             class="rounded shadow-sm mb-3"
                             style="width:150px; height:150px; object-fit:cover;">
                    @else
                        <p class="text-muted">Aucune image enregistrée.</p>
                    @endif

                    <label class="fw-bold mt-2">Changer l'image :</label>
                    <input type="file" name="image" class="form-control shadow-sm">
                    <small class="text-muted">Laisser vide pour garder l'image actuelle</small>
                </div>

                <!-- Bouton -->
                <button class="btn btn-danger px-4 py-2 shadow-sm">
                    <i data-lucide="save"></i> Enregistrer les modifications
                </button>

            </form>

        </div>
    </div>

</div>

<script>
    lucide.createIcons();
</script>

@endsection
