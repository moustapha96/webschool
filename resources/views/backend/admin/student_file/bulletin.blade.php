
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')


<main class="app-content">

      <div class="app-title">
        <div>
          <h1><i class="fa fa-suitcase"></i>Bulletin de Notes</h1>
            <p>{{ $student_file->student->user->prenom }}-{{ $student_file->student->user->nom }}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
              <li class="breadcrumb-item"><a class="btn btn-outline-success" 
                href="{{route('admin.classes.index')}}" role="button">Retour</a>
              </li>
        </ul>
      </div>

    <div class="row">
      <div class="col-md-12">
        @if(Session::has('success'))
        <div class="alert alert-success">
        {{ Session::get('success') }}
        </div>
     @endif
    @if(Session::has('error'))
        <div class="alert alert-danger">
        {{ Session::get('error') }}
        </div>
    @endif
           
        </div>
        <div class="col-md-12">
          <div class="tile">
            
            <div class="tile-body">
             
            
              <div class=" row ">
                  <div class="col-md-6 ">
                    <div class="flex-lg-row ml"> <u> Prénom et Nom </u>: <strong class="text-uppercase" > {{ $student_file->student->user->prenom }} {{ $student_file->student->user->nom }}</strong>  </div>
                      <div class="flex-lg-row ml"> <u>Date et Lieu de Naissance </u>: <strong class="text-uppercase" >{{ $student_file->student->user->dateNaissance }} à {{ $student_file->student->user->lieuNaissance }}</strong>  </div>
                      <div class="flex-lg-row ml"> <u>Classe </u>: <strong class="text-uppercase" >{{ $student_file->bulletin->classe->nameClass }}</strong>  </div>
                  </div>
                  <div class="col-md-6"></div>
              </div>
    
              
                <div class="mx-auto d-flex justify-content-center">
    
                    <table class="table table-bordered" border="1px" >
                      <thead>
                        <tr class="text-center">
                          <th>Semestre</th>
                          <th>EC</th>
                          <th>Moyenne</th>
                          <th>Crédit</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                          @foreach ( $datas as $data) 
                          {{-- les semestre --}}
                                  @foreach($data['semestre'] as $semestre)
                                  <tr>
                                    <td>{{ $semestre['semestre'] }}</td>
                                    <td> 
                                        <table class="table table-bordered" border="1px" >
                                          <thead>
                                            <tr class="text-center">
                                              <th>Code </th>
                                              <th>Matiere</th>
                                              <th>Moyenne</th>
                                              <th>Credit</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            {{-- les EC dans chaque semestre --}}
                                            @foreach ($semestre['unite'] as $unite)
                                              <tr>
                                              <td>{{ $unite['code'] }} {{ $unite['unite'] }}</td>
                                              <td>
                                                  <table class="table table-bordered" border="1px" >
                                                    <tbody>
                                                      {{-- les matieres dans chaque EC --}}
                                                      @foreach ($unite['matiere'] as $matiere)
                                                          <tr>
                                                            <td>{{ $matiere['matiere'] }}</td>
                                                          </tr>
                                                      @endforeach
                                                    </tbody>
                                                  </table>
                                              </td>
                                              <td>{{ $unite['moyenne_unite'] }}</td>
                                              <td>{{ $unite['credit_obtenu'] }}</td>
                                              </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                    </td>
                                    <td> {{ $semestre['moyenne_semestre'] }}</td>
                                    <td> {{ $semestre['credit_obtenu'] }}</td>
                                  </tr>
                                  @endforeach
                          @endforeach
                        
                      </tbody>
                    </table>
                </div>
                
                
                  {{-- decision --}}
                  <div class="row pt-3 ml-1 d-flex justify-content-start""> <u> Moyenne : </u><strong class="ml-2"> {{ $student_file->bulletin->average_student }}</strong></div>
                    <div class="row pt-3 ml-1 d-flex justify-content-start""><u> Credit  : </u><strong class="ml-2">{{ $student_file->bulletin->credit }}</strong></div>
                    <div class="row pt-3 ml-1 d-flex justify-content-start""> <u> Décision du Jury : </u><strong class="ml-2">{{ $student_file->bulletin->apreciation }}</strong></div>
                    <div class="row pt-3 ml-1 d-flex justify-content-start""> 
                        <u> Année Académique : </u><strong class="ml-2"> {{ $student_file->academic_year->year }}</strong> 
                    </div>
                    <div class="row pt-3 ml-1 d-flex justify-content-start""> 
                        <u> Session : </u><strong class="ml-2"> {{ $student_file->academic_year->session }}</strong> 
                    </div>
                
                
    
            </div>
    
    
          </div>
        </div>
      </div>
      
</main>
@endsection



  














