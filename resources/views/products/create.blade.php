@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">➕ Ajouter un Produit</h2>
        <a href="{{ route('products.index') }}" class="btn btn-dark">
            <i data-lucide="arrow-left"></i> Retour
        </a>
    </div>

    <div class="card shadow-sm border-0" style="border-radius:18px;">
        <div class="card-header bg-danger text-white fw-bold" style="border-radius:18px 18px 0 0;">
            Nouveau Produit
        </div>

        <div class="card-body p-4">

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- NOM -->
                <div class="mb-3">
                    <label class="fw-bold">Nom du produit :</label>
                    <input type="text" name="name" class="form-control shadow-sm" required>
                </div>

                <!-- PRIX -->
                <div class="mb-3">
                    <label class="fw-bold">Prix (FCFA) :</label>
                    <div class="input-group shadow-sm">
                        <span class="input-group-text bg-dark text-white">
                            <i data-lucide="wallet"></i>
                        </span>
                        <input type="number" name="price" step="0.01" class="form-control" required>
                    </div>
                </div>

                <!-- CATEGORIE -->
                <div class="mb-3">
                    <label class="fw-bold">Catégorie :</label>
                    <select name="category_id" class="form-select shadow-sm" required>
                        <option value="">-- Sélectionner une catégorie --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- DETAILS -->
                <div class="mb-3">
                    <label class="fw-bold">Détails :</label>
                    <textarea name="details" class="form-control shadow-sm" rows="3"></textarea>
                </div>

                <!-- IMAGE -->
                <div class="mb-3">
                    <label class="fw-bold">Image du produit :</label>
                    <input type="file" name="image" class="form-control shadow-sm" required>
                </div>

                <!-- BOUTON -->
                <button class="btn btn-danger px-4 py-2 shadow-sm">
                    <i data-lucide="save"></i> Enregistrer le produit
                </button>

            </form>

        </div>
    </div>

</div>

<script>
    lucide.createIcons();
</script>

@endsection
