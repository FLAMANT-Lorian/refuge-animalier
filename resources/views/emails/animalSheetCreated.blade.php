@php use App\Enums\SheetsStatus; @endphp
    <!doctype html>
<html lang="fr">
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
        @if ($animalSheets->status === SheetsStatus::Modification->value)
            <h1 class="big">
                Nouvelle demande de {{ __('enum.' . $animalSheets->status) }}
                pour {{ $animalSheets->animal->name }}
            </h1>
        @else
            <h1 class="big">
                Nouvelle demande de {{ __('enum.' . $animalSheets->status) }}
            </h1>
        @endif
    </header>

    <main class="wrapper">
        <section>
            <p><strong>De</strong>&nbsp;: {{ $animalSheets->user->full_name }}</p>
            <p><strong>Objet</strong>&nbsp;: {{ __('enum.' . $animalSheets->status) }}</p>

            <div class="message">
                <p><strong>Message</strong>&nbsp;:</p>
                <p>{{ $animalSheets->message }}</p>
            </div>

            <a title="Voir les demandes de modifications/créations"
               href="{{ config('app.url') . '/' . app()->getLocale() . '/admin/animal-sheets' }}"> Voir la demande dans
                l’administration </a>
        </section>
    </main>
</body>
</html>
