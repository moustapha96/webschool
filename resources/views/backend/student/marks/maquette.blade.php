        
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-suitcase"></i>Maquête </h1>
        <h4 class="mt-2">Liste de vos matieres </h4>
        <h3> Maquette : {{ $classe->nameClass }}</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> 
          <a class="btn btn-dark" href="{{ url()->previous() }}" role="button">retour</a>
      </li>
    </ul>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
         
          <div class="table-responsive justify-content-center ">
           
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
</main>
@endsection










