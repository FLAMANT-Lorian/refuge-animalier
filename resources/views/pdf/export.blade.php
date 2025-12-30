@php
    use Carbon\Carbon;
@endphp

    <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Les pattes heureuses – Rapport d’activité</title>
    <style>
        body {
            margin: 2rem;
            font-family: "Mona Sans", sans-serif;
            color: #333;
        }

        p, table {
            padding-bottom: 1rem;
        }

        header {
            margin-bottom: 2rem;
            border-bottom: 1px solid #6B7280;
        }

        header h1 {
            font-size: 1.875rem;
            font-weight: 600;
            margin: 0;
        }

        header p {
            font-size: 1rem;
            color: #6B7280;
            margin: 0.25rem 0 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            border: 1px solid #000;
            padding: 0.5rem;
            text-align: center;
        }

        th {
            font-weight: bold;
            background-color: #f3f3f3;
        }

        td {
            font-weight: normal;
        }

        section p {
            margin-top: 1rem;
        }

        div.footer{
            position: fixed;
            top: -15px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 0.8rem;
            color: #999;
        }
    </style>
</head>
<body>
    <div>
        <h1>Rapport d’activité</h1>
        <p>Les pattes heureuses – période : <strong>{{ $period }}</strong></p>
    </div>

    <div>
        <p>
            Le refuge “Les pattes heureuses” a pour mission d’accueillir, soigner et trouver un foyer pour les animaux
            abandonnés.
            Le présent rapport couvre la période et présente les principales statistiques suivantes :
        </p>

        <table>
            <thead>
                <tr>
                    <th>Animaux dans le refuge</th>
                    <th>Adoptions réussies</th>
                    <th>Animaux accueillis</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $total_animal_count }}</td>
                    <td>{{ $successfully_adopting }}</td>
                    <td>{{ $new_animal_count }}</td>
                </tr>
            </tbody>
        </table>

        <p>
            Durant cette période, le refuge a accueilli plusieurs animaux nécessitant des soins particuliers.
            Les adoptions se sont déroulées de manière satisfaisante, et nos bénévoles ont contribué de manière
            significative au bien-être des animaux.
        </p>

        <p>
            Le refuge continue son engagement pour le bien-être animal et la promotion de l’adoption responsable.
            Nous remercions les bénévoles, adoptants et partenaires pour leur soutien précieux.
        </p>

        <p>
            Fait le {{ Carbon::now()->Format('d/m/Y') }}<br>
            <strong>Élise</strong> – Administratrice du refuge Les Pattes Heureuses
        </p>
    </div>

    <div class="footer">
        <p>
            Document généré via l’application du refuge « Les pattes heureuses »
        </p>
    </div>
</body>
</html>
