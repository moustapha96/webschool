
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-sticky-note" aria-hidden="true"></i>Liste des maquêttes</h1>
        <p>Liste des classes </p>
    </div>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
        <div class="conrainer" >
            <form action="{{ route('supervisor.search_classe') }}" method="post">
              @csrf
              @method('post')
              <div class="form-row">

                <div class="form-group col-md-4"></div>

                <div class="form-group col-md-4">
                    <div class="form-row">
                      <label for="classe"><h5> Nom de la Classe </h5></label>                      
                             <select id="classe" name="classe" class="form-control" required >
                                 <option value=""></option>
                                 @foreach ($classes as $item)
                                   <option value="{{ $item->nameClass }}">{{ $item->nameClass }} </option>
                                 @endforeach
                             </select>
                             @error('classe')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                    </div>
                    <div class="form-row pull-right">
                        <button type="submit" style="margin-top: 2%" class="btn btn-primary"  >search</button>
                    </div>
                </div>

                <div class="form-group col-md-4"></div>

              </div>
            </form>
        </div>
          
       
          @if($classe != '')
            
            <div class="table-responsive">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="tile">
                        <div class="tile-body">
                          <h3> {{ $classe->nameClass }}</h3>
                          <div class="pull-right">
                            <a  class="btn btn-success" href="{{ route('classe.pdf', $classe ) }}">Export PDF</a>
                          </div>
                          <div class="table-responsive justify-content-center">
                           
                            <table class=" table-responsive table " border="0.5px" >
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
                  </div>
             </div>
          @endif



        </div>
      </div>
    </div>
  </div>
</main>
@endsection



@section('scripts')
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>



@endsection


 