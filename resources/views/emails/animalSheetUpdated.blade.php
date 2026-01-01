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
        <h1>Votre demande à été traitée !</h1>
    </header>

    <main class="wrapper">
        <section>
            <h1 class="big">
                @if($animalSheet->status === SheetsStatus::Validate->value)
                    Après inspection, votre demande de modification – création à été validée !
                @else
                    Après inspection, votre demande à été refusé
                @endif
            </h1>
            <div class="message">
                <p><strong>Message</strong>&nbsp;:</p>
                <p>{{ $animalSheet->message }}</p>
            </div>
        </section>
    </main>
</body>
</html>
