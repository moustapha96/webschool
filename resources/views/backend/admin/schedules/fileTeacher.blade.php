<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Emploi du Temps Prof</title>
    </head>

<body>
    <div class="align-content-center">

        <h1 style=" text-align: center;"> Emploi du temps {{ $teacher->user->prenom . ' ' . $teacher->user->nom }}
        </h1>
        <div class="mx-auto ">
            <table style="border:1px solid #000; padding: 6px;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="border:1px solid #000">JOUR</th>
                        <th scope="col" style="border:1px solid #000">MATIERE</th>
                        <th scope="col" style="border:1px solid #000">CLASSE</th>
                        <th scope="col" style="border:1px solid #000">SALLE</th>
                        <th scope="col" style="border:1px solid #000">DEBUT COURS</th>
                        <th scope="col" style="border:1px solid #000">FIN COURS</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- Le corps du tableau ici -->
                    @foreach ($class_routines as $class_routine)
                        <tr>
                            <td scope="col" style="border:1px solid #000">{{ $class_routine->day }}</td>
                            <td scope="col" style="border:1px solid #000">{{ $class_routine->subject->name }}</td>
                            <td scope="col" style="border:1px solid #000">{{ $class_routine->classe->niveau->name }}- {{ $class_routine->classe->filiere->name }}
                            </td>
                            <td scope="col" style="border:1px solid #000">
                                {{ $class_routine->classroom->description }} </td>
                            <td scope="col" style="border:1px solid #000">{{ $class_routine->start_time }}</td>
                            <td scope="col" style="border:1px solid #000">{{ $class_routine->end_time }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</body>

</html>
