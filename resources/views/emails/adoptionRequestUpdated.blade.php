@php use App\Enums\AdoptionRequestsStatus; @endphp
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
    </style>
    <header class="header">
        <h1 class="big">Votre demande d’adoption pour {{ $adoptionRequest->animal->name }}</h1>
        @if($adoptionRequest->status === AdoptionRequestsStatus::InWay->value)
            <p>Féliciations, après examination de votre profil, nous avons décidé de commencer l’adoption !</p>
        @else
            <p>Nous sommes désolés, après examination de votre profil, nous avons décidé de refuser votre demande
                d’adoption !</p>
        @endif
    </header>
    <main class="wrapper">
        @if($adoptionRequest->status === AdoptionRequestsStatus::InWay->value)
            <p>Pour finaliser la demande, nous vous invitons à nous rendre visite au refuge !</p>
        @else
            <p>Si vous pensez que c’est une erreur, nous vous invitons à nous rendre visite au refuge !</p>
        @endif
    </main>
</body>
</html>
