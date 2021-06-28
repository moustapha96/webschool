

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bulletin-style.css">
</head>
<body >
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">

       {{-- detail ecole --}}
       <div>
        <div class="mx-auto">
          <p style="text-align: center">République du sénégal </p>
          <p style="text-align: center">Un peuple - Un but - Une fois</p>
          <p style="text-align: center">MINISTERE DE L’ENSEIGNEMENT SUPERIEUR, DE LA RECHERCHE ET DE L’INNOVATION </p>
        </div>
        <div style="text-align: center">
          <img src="{{ $logo }}" alt="logo" 
              style="width:100px; height:100px; border-radius:50%;">
         
        </div>
        <div style="text-align: center">
          <p> @php isset($school_name) ? $school_name = $school_name." | " . get_setting('school_name') : $school_name = get_setting('school_name')  ; @endphp
            {{ $school_name }}/<strong> {{ $classe->niveau->name.' '.$classe->filiere->name }} </strong> </p>
          <h3> <u>MAQUETTE</u> </h3>
         
        </div>
       
      </div>
      {{-- fin  --}}

    <div >
     

                <table class=" table-responsive table-bordered " border="0.5px" >
                  <thead>
                    <tr class="text-center">
                      <th style="width: 90px">Semestre</th>
                      <th style="width: 600px">Eléments Constitutifs</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                      @foreach ( $classe->semester as $semestre) 
                          
                            <tr>
                                <td style="width: 90px"> {{ $semestre->name }}</td>
                                <td style="width: 600px" > 
                                    <table class="table table-bordered" border="0.5px">
                                        <thead>
                                          @if($semestre->name == 'Semestre 1' || $semestre->name == 'Semestre 3' || $semestre->name == 'Semestre 5' )
                                            <tr>
                                                <th style="width: 300px">UE</th>
                                                <th style="width: 200px">EC</th>
                                                <th style="width: 50px">Credit</th>
                                            </tr>
                                          @endif
                                        </thead>
                                        <tbody>
                                            @foreach ($semestre->unitie as $unite)
                                                <tr>
                                                    <td style="width: 300px">{{ $unite->code }} {{ $unite->name }}</td>
                                                    <td style="width: 200px">  
                                                        <table class="table table-bordered" border="0.5px">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 150px">matiere</th>    
                                                                    <th style="width: 50px">Coefficient</th>    
                                                                </tr>
                                                            </thead>    
                                                            <tbody>
                                                                @foreach ($unite->subject as $subject)
                                                                    <tr>
                                                                        <td style="width: 150px">{{ $subject->name }}</td>
                                                                        <td style="width: 50px">{{ $subject->coefficient }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>   
                                                    </td>
                                                    <td style="width: 50px" >{{ $unite->credit }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                           
                      @endforeach
                    
                  </tbody>
                </table>
         
    </div>
           

      </div>
    </div>
  </div>
  
</body>
</html>
















