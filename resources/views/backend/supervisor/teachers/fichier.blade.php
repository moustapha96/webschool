<!DOCTYPE html>
<html lang="en">
    <head>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Emploi du Temps</title>
    </head>

<body>

  <div class="align-content-center">
    <h1 style=" text-align: center;"> Emploi du temps {{ $teacher->user->prenom }} {{ $teacher->user->nom }}</h1>
    <div class="mx-auto " >
      <table class="table table-hover  table-responsive table-striped">
        <thead class="thead-dark">
          <tr>
            <th  scope="col" style="border:1px solid #000">JOUR</th>
            <th  scope="col" style="border:1px solid #000">MATIERE</th>
            <th  scope="col" style="border:1px solid #000">Classe</th>
            <th  scope="col" style="border:1px solid #000">SALLE</th>
            <th  scope="col" style="border:1px solid #000">DEBUT COURS</th>
            <th  scope="col" style="border:1px solid #000">FIN COURS</th>
  
          </tr>
        </thead>
        <tbody>
          <!-- Le corps du tableau ici -->
          @foreach($teacher->class_routines as $routine)
          <tr>
            <td  scope="col" style="border:1px solid #000" >{{ $routine->day }}</td>
            <td  scope="col"style="border:1px solid #000" >{{ $routine->subject->name }}</td>
            <td  scope="col"style="border:1px solid #000" >{{ $routine->classe->nameClass }}  </td>
            <td  scope="col"style="border:1px solid #000" >{{ $routine->classroom->description }}  </td>
            <td  scope="col"style="border:1px solid #000" >{{ $routine->start_time }}</td> 
            <td  scope="col" style="border:1px solid #000">{{ $routine->end_time }}</td> 
          </tr>
          
          @endforeach
          </tbody>
      </table>

    </div>

  </div>
       
</body>
</html>