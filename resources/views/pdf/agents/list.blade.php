<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Liste des observateurs</title>

    <style>
        .page-break {
            page-break-after: always;
        }

        .label {
            font-weight: 600;
        }

        img {
            vertical-align: middle;
        }

        .photo {
            padding: .25rem;
            background-color: #fff;
            max-width: 100%;
            height: auto;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .photo-container {
            float: left;
            margin-right: 20px;
            display: block;
        }

        .agent-details {
            /* float: right; */
            display: block;
        }

        hr.dotted {
            border-top: 1px dashed black;
        }

    </style>
</head>

<body>
    <main class="container">
        {{-- <table>
            <tbody>
                @foreach ($agents as $agent)
                    <tr>
                        <td>
                            <img src="{{ $agent->profile_photo_path ? storage_path('app/public/' . $agent->profile_photo_path) : storage_path('app/public/avatar.jpg') }}"
                                alt="{{ $agent->name }}" class="photo">
                        </td>
                        <td>
                            <p><span class="label">Identifiant:</span> {{ $agent->code }}</p>
                            <p><span class="label">Nom et prénoms:</span> {{ $agent->name }}</p>
                        </td>
                    </tr>
                    @if (!$loop->last)
                        <hr class="dotted" />
                    @endif
                    @if ($loop->iteration % 6 === 0)
                        <div class="page-break"></div>
                    @endif
                @endforeach
            </tbody>
        </table> --}}
        @foreach ($agents as $agent)
            <div class="clearfix item">
                <div class="photo-container">
                    <img src="{{ \Image::make($agent->profile_photo_path ? storage_path('app/public/' . $agent->profile_photo_path) : storage_path('app/public/avatar.jpg'))->encode('data-url') }}"
                        alt="{{ $agent->name }}" class="photo">
                </div>
                <div class="agent-details">
                    <p><span class="label">Identifiant:</span> {{ $agent->code }}</p>
                    <p><span class="label">Nom et prénoms:</span> {{ $agent->name }}</p>
                </div>
            </div>
            @if (!$loop->last)
                <hr class="dotted" />
            @endif
            @if ($loop->iteration % 6 === 0)
                <div class="page-break"></div>
            @endif
        @endforeach
    </main>
</body>

</html>
