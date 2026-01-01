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

        .wrapper {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .message {
            display: flex;
            flex-direction: column;
            row-gap: 0.5rem;
        }
    </style>
    <header class="header">
        <h1 class="big">Nouveau message</h1>
        <p>Vous avez reçu un nouveau message via le formulaire de contact !</p>
    </header>
    <main class="wrapper">
        <section>
            <p><strong>De</strong>&nbsp;: {{ $message->email }}</p>
            <p><strong>Objet</strong>&nbsp;: {{ $message->object }}</p>
            <div class="message">
                <p><strong>Message</strong>&nbsp;:</p>
                <p>{{ $message->message }}</p>
            </div>

            <a title="Vers la page des message"
                href="{{ config('app.url') . '/' . app()->getLocale() . '/admin/messages'  }}">Voir le message dans
                l’administration</a>
        </section>
    </main>
</body>
</html>
