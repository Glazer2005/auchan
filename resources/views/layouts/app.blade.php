<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auchan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Icônes Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --auchan-red: #E60028;
            --sidebar-width: 250px;
        }

        /* 🌗 MODE SOMBRE */
        [data-theme="dark"] {
            --bg-body: #1c1c1e;
            --bg-card: #2a2a2c;
            --text-color: #eaeaea;
        }

        /* ☀️ MODE CLAIR */
        [data-theme="light"] {
            --bg-body: #f4f6f9;
            --bg-card: #ffffff;
            --text-color: #222;
        }

        body {
            background: var(--bg-body);
            color: var(--text-color);
            font-family: 'Inter', sans-serif;
            transition: background 0.3s ease, color 0.3s ease;
        }

        /* 🌟 SIDEBAR */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #E60028 0%, #B0001F 100%);
            color: white;
            padding: 25px 20px;
            transition: width 0.3s ease;
            overflow: hidden;
            box-shadow: 4px 0 20px rgba(0,0,0,0.20);
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar h3 {
            transition: opacity 0.3s;
        }

        .sidebar.collapsed h3 {
            opacity: 0;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            padding: 12px 10px;
            margin: 6px 0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: background 0.25s ease;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,0.18);
        }

        .sidebar i {
            width: 22px;
        }

        /* CONTENU PRINCIPAL */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 30px;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 80px;
        }

        /* TOP BAR */
        .top-navbar {
            background: var(--bg-card);
            padding: 15px 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.3s;
        }

        .btn-toggle {
            background: none;
            border: none;
            color: var(--text-color);
            cursor: pointer;
        }

        .mode-switch {
            cursor: pointer;
            font-size: 22px;
        }
    </style>
</head>

<body>

    <!-- 🔥 SIDEBAR GAUCHE RETRACTABLE -->
    <div class="sidebar" id="sidebar">
        <h3 class="mb-4">Auchan</h3>

        <a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
            <i data-lucide="layout-dashboard"></i> <span class="menu-text">Dashboard</span>
        </a>

        <a href="{{ route('products.index') }}" class="{{ Request::is('products*') ? 'active' : '' }}">
            <i data-lucide="shopping-bag"></i> <span class="menu-text">Produits</span>
        </a>

        <hr class="text-white mt-4">

        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-light w-100 mt-2">Déconnexion</button>
        </form>
        @endauth
    </div>

    <!-- 📌 CONTENU PRINCIPAL -->
    <div class="main-content" id="main-content">

        <!-- TOP NAVBAR -->
        <div class="top-navbar">

            <!-- Bouton pour plier la sidebar -->
            <button class="btn-toggle" id="toggleSidebar">
                <i data-lucide="menu"></i>
            </button>

            <h2>@yield('title', 'Tableau de bord')</h2>

            <!-- Mode sombre -->
            <div class="mode-switch" id="themeToggle">
                <i data-lucide="moon"></i>
            </div>
        </div>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        lucide.createIcons();

        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const toggleSidebar = document.getElementById('toggleSidebar');
        const themeToggle = document.getElementById('themeToggle');

        // 🔹 Sidebar toggle
        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });

        // 🔹 Mode sombre / clair
        themeToggle.addEventListener('click', () => {
            const html = document.documentElement;
            const current = html.getAttribute('data-theme');
            const newTheme = current === 'light' ? 'dark' : 'light';
            html.setAttribute('data-theme', newTheme);
        });
    </script>

    @yield('scripts')

</body>
</html>
