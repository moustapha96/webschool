
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">

  <div class="app-title">
    <div>
      <h1><i class="fa fa-suitcase"></i>{{ $subject->unitie->semester->classe->niveau->code .' '.$subject->unitie->semester->classe->filiere->code }}</h1>
        <p> {{ $subject->unitie->code }}{{ $subject->unitie->name}} : {{ $subject->name }} </p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"  data-toggle="modal" data-target="#modal_add_note"
                class="btn btn-outline-success" role="button" >ajouter une note</a>
        </li>
       <li class="breadcrumb-item">
        <a href="{{ url()->previous() }}" class="btn btn-outline-dark" role="button" >retour</a>
   </li>
    </ul>
  </div>

    {{-- modal  add mark--}}
    <div class="modal fade" id="modal_add_note" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une note </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <form action="{{ route('teacher.students.save_note', $subject) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="student_id">étudiant </label>
                        <select class="form-control" required name="student_id" id="student_id">
                        <option>  </option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" >  {{ $student->user->prenom }} {{ $student->user->nom }} </option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="typeNote">Type Note</label>
                        <select class="form-control" required name="typeNote" id="typeNote">
                            <option></option>
                            <option value="examen" >Examen</option>
                            <option value="devoir">Devoir</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mark_value">Note</label>
                        <input type="number" min="0" max="20" step=".5" required name="mark_value" id="mark_value"
                                class="form-control @error('mark_value') is-invalid @enderror" placeholder="note">
                        @error('mark_value')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-success">enregistrer</button>
                    </div>
                </form>
                </div>
            </div>

        </div>
        </div>
    </div>
    {{-- fin modal --}}





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
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
              <thead>
                <tr>
                  <th>prenom</th>
                  <th>nom</th>
                  <th>TypeNote</th>
                  <th>note</th>
                  <th>etudiant</th>
                  <th>action</th>

                </tr>
              </thead>
              <tbody>
                <!-- Le corps du tableau ici -->
                @foreach($marks as $mark)
                    <tr>
                        <td>{{ $mark->student->user->prenom }}</td>
                        <td>{{ $mark->student->user->nom }}</td>
                        <td>{{ $mark->typeNote }}</td>
                        <td>{{ $mark->mark_value }}</td>
                        <td> <a href="{{ route('teacher.students.Infostudent' , $mark->student) }}" class="btn btn-info">info</a> </td>

                        <td>
                            <a  data-toggle="modal" data-target="#modal_update-{{ $mark->id }}" class="btn btn-warning">update</a>
                            <a  data-toggle="modal" data-target="#modal_delete-{{ $mark->id }}" class="btn btn-danger">delete</a>

                            {{-- modal update mark--}}
                            <div class="modal fade" id="modal_update-{{ $mark->id }}" tabindex="-1" role="dialog" aria-labelledby="modal_update-{{ $mark->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" >Modifier une note </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="form-group">
                                      <form action="{{ route('teacher.students.update_note', $mark) }}" method="post">
                                          @csrf

                                          <div class="form-group">
                                             <label for="student_id">étudiant </label>
                                             <input  disabled type="text"  class="form-control"
                                             id="student_id" value="{{ $mark->student->user->prenom }} {{ $mark->student->user->nom }}">
                                              </select>
                                          </div>

                                          <div class="form-group">
                                              <label for="typeNote">Type Note</label>
                                              <select class="form-control"  required name="typeNote" id="typeNote">
                                                  <option>  </option>
                                                  <option  @if($mark->typeNote == 'examen') selected @endif value="examen">Examen</option>
                                                  <option @if($mark->typeNote == 'devoir') selected @endif value="devoir">Devoir</option>
                                              </select>
                                          </div>

                                          <div class="form-group">
                                              <label for="mark_value">Note</label>
                                              <input type="number"  min="0" max="20" step=".5" required value="{{ $mark->mark_value }}" name="mark_value" id="mark_value"
                                                      class="form-control @error('mark_value') is-invalid @enderror" placeholder="note">
                                              @error('mark_value')
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                              </span>
                                              @enderror
                                          </div>

                                          <div class="modal-footer">
                                              <button type="submit"  class="btn btn-success">enregistrer</button>
                                          </div>
                                      </form>
                                      </div>
                                  </div>

                              </div>
                              </div>
                          </div>
                          {{-- fin modal --}}
                            {{-- modal  confirmation activation anné en cours--}}
                            <div class="modal"  class="modal fade" id="modal_delete-{{ $mark->id }}" tabindex="-1" role="dialog" aria-labelledby="modalActivationcentre" aria-hidden="true" >
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title">Confirmation</h5>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      <div class="modal-body">
                                          <h5>étudiant :  {{ $mark->student->user->prenom  }} {{ $mark->student->user->nom  }}</h5>
                                          <h5>Matiere :  {{ $mark->subject->name  }} </h5>
                                          <h5>Note :  {{ $mark->mark_value  }} </h5>
                                          <h5>Type Contrôle :  {{ $mark->typeNote  }} </h5>
                                          <p class="text-center text-bold" >Voulez-vous supprimer cette note ?</p>
                                          <p class="text-secondary"><small>la note de l'étudiant supprimée sera remplacer par 0</small></p>
                                      </div>
                                      <div class="modal-footer">
                                      <form  action="{{ route('teacher.students.delete_note',$mark) }}" methode="get" >
                                       @csrf
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                          <button type="submit" class="btn btn-danger">Supprimer cette note</button>
                                      </form>
                                      </div>
                                  </div>
                              </div>
                            </div>

                      {{-- fin modal --}}
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
</main>
@endsection



@section('scripts')
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>




@endsection


