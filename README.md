

📦 Gestion des Produits – Application Laravel

![Bannière](./screenshots/banner.png)

Cette application Laravel permet de gérer facilement des produits avec catégories, images, tableau de bord complet, authentification et interface moderne.
Elle a été réalisée dans le cadre d’un projet académique.

---

## 🚀 Fonctionnalités principales

* 🛒 **CRUD complet** des produits
* 🖼️ **Upload et affichage des images**
* 🏷️ **Catégories** : Alimentaire, Hygiène, Boisson, etc.
* 📄 **Pagination** des produits
* 📊 **Tableau de bord** :

  * Nombre total de produits
  * Dernier produit ajouté
* 🔐 **Authentification** (Connexion + Inscription + Mot de passe oublié)
* 🎨 **UI moderne Bootstrap 5**
* 🌓 Page d’authentification **thème noir & blanc**
* 📱 Entièrement responsive

---

📸 Captures d’écran

 Page de connexion & inscription

![Login](./screenshots/login_dark.png)

Dashboard – statistiques

![Dashboard](./screenshots/dashboard.png)

Liste des produits

![Liste produits](./screenshots/products_list.png)

 Formulaire d’ajout de produit

![Ajouter produit](./screenshots/product_create.png)

> Les captures sont des **exemples**. Remplace-les par les tiennes dans le dossier `/screenshots`.

---

 🛠️ Installation (pas à pas)

1️⃣ Cloner le projet

```bash
git clone https://github.com/ton-projet/laravel-produits.git
cd laravel-produits
```

2️⃣ Installer les dépendances

```bash
composer install
npm install
npm run dev
```

3️⃣ Configurer l'environnement

Créer le fichier `.env` :

```bash
cp .env.example .env
```

Configurer la base :

```
DB_DATABASE=produits
DB_USERNAME=root
DB_PASSWORD=
```

4️⃣ Générer la clé Laravel

```bash
php artisan key:generate
```

5️⃣ Migrations de la base

```bash
php artisan migrate
```

6️⃣ Lien pour les images

```bash
php artisan storage:link
```

7️⃣ Lancer le serveur

```bash
php artisan serve
```

---

🌱 Remplir la base (exemples)

```sql
INSERT INTO products (name, price, details, category, image, created_at, updated_at)
VALUES
('Coca-Cola 1L', 900, 'Boisson gazeuse rafraîchissante', 'Boisson', 'coca.jpg', NOW(), NOW()),
('Riz parfumé 5kg', 4500, 'Riz parfumé de haute qualité', 'Alimentaire', 'riz.jpg', NOW(), NOW()),
('Savon antiseptique', 350, 'Savon antibactérien', 'Hygiène', 'savon.jpg', NOW(), NOW());
```

---

📁 Structure du projet

```
/app
/resources/views/products
/resources/views/auth
/resources/views/layouts
/public/storage
/screenshots
```

---




✨ Auteur

**Séga Diallo**
Développeur
📧 **[segacod05@gmail.com](mailto:segacod05@gmail.com)**

---
