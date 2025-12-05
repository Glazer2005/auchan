Gestion de Produits – Auchan Clone

Application web complète de gestion de produits inspirée du design Auchan : sidebar rétractable, mode sombre, catégories dynamiques, upload d’images, statistiques et interface premium.

 Auteur

Séga Diallo
Développeur Web
Email : segacod05@gmail.com

 Description du projet

Cette application Laravel permet une gestion complète de produits avec un design moderne rouge & noir rappelant l’identité visuelle d’AUCHAN.

 Fonctionnalités principales
Produits (CRUD complet)

✔️ Ajouter un produit
✔️ Modifier un produit
✔️ Supprimer un produit
✔️ Voir les détails d’un produit
✔️ Upload d’image (stockage dans storage/app/public)
✔️ Filtre par catégorie
✔️ Pagination améliorée « Suivant / Précédent » avec Bootstrap
✔️ Affichage dynamique du dernier produit ajouté

 Catégories de produits

✔️ Gestion par menu déroulant
✔️ Association via category_id
✔️ Catégories intégrées :

Alimentation

Vetements

Electronique

Jeux

Soins

 Dashboard intelligent

✔️ Nombre total de produits
✔️ Dernier produit ajouté avec image
✔️ Cartes stylées rouge premium (#E60028)
✔️ Statistiques visuelles

 Authentification complète

✔️ Inscription
✔️ Connexion
✔️ Déconnexion
✔️ Réinitialisation du mot de passe
✔️ Protection des pages par middleware auth

 Interface & UX

✔️ Sidebar rétractable (toggle)
✔️ Icônes Lucide
✔️ Bootstrap 5 + thème rouge Auchan
✔️ Mode sombre (si activé)
✔️ Cartes modernes + ombres + coins arrondis

🛠️ Technologies utilisées
Technologie	Version
PHP	8+
Laravel	10
MySQL	5.7+ / 8
Bootstrap	5.3
Blade Templates	✔️
Vite / Node.js	✔️
Lucide Icons	✔️

Installation du projet

1️⃣ Cloner le projet
git clone https://github.com/Glazer2005/auchan
cd auchan

Modifier la base de données :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=auchan
DB_USERNAME=root
DB_PASSWORD=root

 Générer la clé d’application
php artisan key:generate

 Lancer les migrations
php artisan migrate

 Compiler et lancer

Backend :

php artisan serve


Frontend :

npm run dev

🗂️ Structure des fonctionnalités
🛒 PRODUITS

Affichage en cartes style Auchan

Pagination Bootstrap

Filtre par catégorie

Upload d’image (120px – cover)

CRUD complet

🗂️ CATÉGORIES

Liste dans le dashboard

Filtre haut de page

Association automatique aux produits

📊 TABLEAU DE BORD

Total des produits

Dernier produit ajouté

Statistiques

Design premium rouge

🔐 AUTHENTIFICATION

Login

Register

Reset Password

Email de récupération

Middleware de sécurité

📝 Exemple de captures d’écran

(À compléter avec vos images dans le dossier README)

🎥 Vidéo de démonstration

À envoyer à : assane.gueye.edu@gmail.com

✔️ Statut du projet

🟢 Projet fonctionnel, complet et améliorable.
Tous les nouveaux ajouts (pagination, filtrage, upload, sidebar, catégories supplémentaires, fixes SQL) ont été intégrés dans cette version du README.