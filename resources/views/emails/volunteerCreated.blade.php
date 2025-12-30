<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
</head>
<body class="main">
    <style>
        body, header, main, footer, section {
            background-color: white;
        }

        .header {
            padding: 1rem;
        }

        .main {
            padding: 1rem;
        }

        .big {
            font-size: 2rem;
        }

        .medium {
            font-size: 1.25rem;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
    </style>
    <header class="header">
        <h1 class="big">Bienvenue au refuge les pattes heureuses ! 👋</h1>
        <p>Nous sommes heureux de vous compter parmi nous !</p>
    </header>
    <main class="wrapper">
        <section>
            <p>Vous trouverez ci-dessous vos identifiants pour accéder à votre compte bénévole.</p>
            <p><strong>Adresse e-mail</strong> : {{ $email }}</p>
            <p><strong>Mot de passe</strong> : {{ $password }}</p>

            <h2 class="medium">Comment me connecter à mon compte ?</h2>
            <ol>
                <li>Rendez-vous sur l'espace de connexion du refuge : <a href="{{ $url }}"
                                                                         title="Vers la page de connexion"> Page de
                        connexion </a>
                </li>
                <li>Entrez vos identifiants dans le formulaire de connexion</li>
                <li>Vous avez accès à l'interface d’administration du refuge</li>
            </ol>

            <p>PS: Une fois connecté·e, il est vivement conseillé de modifier votre mot de passe. Celui contenu dans cet
                e-mail n’est pas suffisant pour garantir une sécurité optimale.</p>
        </section>
        <section>
            <h2 class="medium">Comment changer mon mot de passe ?</h2>
            <ol>
                <li>Une fois dans l'interface d’administration du refuge, rendez-vous dans vos paramètres (Fond du menu)
                </li>
                <li>Sur cette page, vous trouverez un formulaire vous permettant de modifier votre mot de passe.</li>
            </ol>
        </section>
    </main>
    <footer>
        <p>Encore un grand merci d’avoir rejoint notre merveilleuse équipe,</p>
        <strong>Élise 😀</strong>
    </footer>
</body>
</html>
