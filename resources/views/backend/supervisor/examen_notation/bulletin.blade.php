
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
            {{ $school_name }}/<strong> {{ $student->classe->nameClass }} </strong> </p>
          <h3> <u>RELEVE DE NOTES</u> </h3>
         
        </div>
        <div class="justify-content-lg-start">
          <p><u> Prénom et Nom </u> : <strong class="text-uppercase"> {{ $student->user->prenom }} {{ $student->user->nom }} </strong></p>
          <p><u> Email </u> :   <strong class="text-uppercase">  {{ $student->user->email }}</strong></p>
          <p><u> Date et Lieu de Naissance </u> :  <strong class="text-uppercase"> {{ $student->user->dateNaissance }} à {{ $student->user->lieuNaissance }}</strong></p>
        </div>
      </div>
      {{-- fin  --}}

    <div style=" margin-left: 4%" >
     

                <table class=" table-responsive table table-responsive" border="0.5px" >
                  <thead>
                    <tr class="text-center">
                      <th style="width: 100px" >Semestre</th>
                      <th style="width: 650px">Eléments Constitutifs</th>
                      <th style="width: 70px">Moyenne</th>
                      <th style="width: 50px">Crédit</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                      @foreach ( $datas as $data) 
                      {{-- les semestre --}}
                              @foreach($data['semestre'] as $semestre)
                              <tr>
                                <td  style="width: 100px"> {{ $semestre['semestre'] }}</td>
                                <td style="width: 650px" > 
                                    <table  class="table table-bordered" border="1px" >
                                      <thead>
                                        @if($semestre['semestre'] == 'Semestre 1' || $semestre['semestre'] == 'Semestre 3' || $semestre['semestre'] == 'Semestre 5' || $semestre['semestre'] == 'Semestre 7')
                                        <tr class="text-center" >
                                          <th style="width: 310px">UE</th>
                                          <th style="width: 200px">Matiere</th>
                                          <th style="width: 70px">Moyenne</th>
                                          <th style="width: 70px">Credit</th>
                                        </tr>
                                        @endif
                                      </thead>
                                      <tbody>
                                        {{-- les EC dans chaque semestre --}}
                                        @foreach ($semestre['unite'] as $unite)
                                          <tr>
                                          <td style="width: 310px">{{ $unite['code'] }} {{ $unite['unite'] }}</td>
                                          <td style="width: 200px" >
                                              <table class="table table-bordered" border="0.5px"  >
                                                <tbody>
                                                  {{-- les matieres dans chaque EC --}}
                                                  @foreach ($unite['matiere'] as $matiere)
                                                      <tr>
                                                        <td style="width: 200px" >{{ $matiere['matiere'] }}</td>
                                                      </tr>
                                                  @endforeach
                                                </tbody>
                                              </table>
                                          </td>
                                          <td style="width: 70px">{{ $unite['moyenne_unite'] }}</td>
                                          <td style="width: 70px">{{ $unite['credit_obtenu'] }}</td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                </td>
                                <td style="width: 70px"> {{ $semestre['moyenne_semestre'] }}</td>
                                <td style="width: 50px"> {{ $semestre['credit_obtenu'] }}</td>
                              </tr>
                              @endforeach
                      @endforeach
                    
                  </tbody>
                </table>
         
    </div>
           
            
            
              {{-- decision --}}
        <div class="row pt-3 ml-5 d-flex justify-content-start"> <u> Moyenne : </u><strong class="ml-2"> {{ $student->bulletin->average_student }}</strong></div>
                <div class="row pt-3 ml-5 d-flex justify-content-start"><u> Credit  : </u><strong class="ml-2">{{ $student->bulletin->credit }}</strong></div>
                <div class="row pt-3 ml-5 d-flex justify-content-start"> <u> Décision du Jury : </u><strong class="ml-2">{{ $student->bulletin->apreciation }}</strong></div>
                <div class="row pt-3 ml-5 d-flex justify-content-start"> 
                  <u> Séssion : </u> <strong class="ml-2">
                    @php isset($session) ? $session = $session." | " . get_setting('session') : $session = get_setting('session')  ; @endphp
                    {{ $session }}
                  </strong>
                </div>
                <div class="row pt-3 ml-5 d-flex justify-content-start"> 
                  <u> Année Académique : </u> <strong class="ml-2">
                    @php isset($academic_year) ? $academic_year = $academic_year." | " . get_setting('academic_year') : $academic_year = get_setting('academic_year')  ; @endphp
                    {{ $academic_year }}
                  </strong>
                </div>

        </div>
        <div style="text-align: end " >
            <u> Fait à : </u><strong class="ml-2" >
              @php isset($address) ? $address = $address." | " . get_setting('address') : $address = get_setting('address')  ; @endphp
              {{ $address }}
            </strong>
         </div>

        <div style="text-align: center;margin-top:3% ">
          <div  style="text-align: center" ><strong> N.B:</strong> il n'est délivré qu'un seul relevé de notes original.</div>
          <div  style="text-align: center" >Il appartient au titulaire d'établire lui'même et d'en faire certifier conformes les copies qui peuvent lui être nécessaires</div>
          <div  style="text-align: center" >  
            @php isset($school_name) ? $school_name = $school_name." | " . get_setting('school_name') : $school_name = get_setting('school_name')  ; @endphp
            {{ $school_name }}
           TEL: @php isset($phone) ? $phone = $phone." | " . get_setting('phone') : $phone = get_setting('phone')  ; @endphp
            {{ $phone }}
           /Site web: @php isset($website) ? $website = $website." | " . get_setting('website') : $website = get_setting('website')  ; @endphp
            {{ $website }}
          </div>
          <div style="text-align: center" >
            @php isset($address) ? $address = $address." | " . get_setting('address') : $address = get_setting('address')  ; @endphp
            {{ $address }}
            @php isset($email) ? $email = $email." | " . get_setting('email') : $email = get_setting('email')  ; @endphp
            {{ $email }}
           
          </div>
        </div>

      </div>
    </div>
  </div>
  
</body>
</html>












