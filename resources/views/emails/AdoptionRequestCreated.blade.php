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
        <h1 class="big">Nouvelle demande d’adoption</h1>
        <p>Vous avez reçu une nouvelle demande d’adoption pour {{ $adoptionRequest->animal->name }}</p>
    </header>
    <main class="wrapper">
        <section>
            <div class="message">
                <p><strong>Message</strong>&nbsp;:</p>
                <p>{{ $adoptionRequest->message }}</p>
            </div>

            <a title="Voir la demande d’adoption pour {{ $adoptionRequest->animal->name }}"
               href="{{ config('app.url') . '/' . app()->getLocale() . '/admin/adoption-requests/' . $adoptionRequest->id . '/edit'  }}">
                Voir la demande d’adoption sur l'interface d’adminstration
            </a>
        </section>
    </main>
</body>
</html>
