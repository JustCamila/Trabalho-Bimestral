<!-- Caminho: resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bella Napoli Pizzaria')</title>
    
    <style>
        :root {
            --vermelho: #6B111A;
            --verde: #4A5D23;
            --amarelo: #e39f5c;
            --fundo-claro: #FFF8E1;
            --texto-escuro: #200600;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--fundo-claro);
            color: var(--texto-escuro);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: var(--vermelho);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        header h1 {
            font-size: 1.8rem;
            padding-bottom: 5px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 1.5rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            transition: color 0.3s;
        }

        nav a:hover {
            color: var(--amarelo);
        }

        main {
            flex: 1; 
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        footer {
            background-color: var(--vermelho);
            color: white;
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        footer p {
            margin-bottom: 0.5rem;
        }

    </style>
</head>
<body>

    <header>
        <div>
            <h1>💛Pizza Nhami</h1>
        </div>
        <nav>
            <ul>
                <li><a href="/">Início</a></li>
                <li><a href="/">Cardápio</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; Pizza Nhami Pizzaria. Todos os direitos reservados.</p>
    </footer>

</body>
</html>