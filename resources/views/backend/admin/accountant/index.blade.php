
@extends('backend.layouts.main')


@section ('styles')

@endsection


@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i> Gestion des utilisateurs</h1>
      <p>Liste des Comptables</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a class="btn btn-outline-success" href="{{ route('user.create') }}"><i class="fa fa-plus"></i> Ajouter un utilisateur</a></li>
    </ul>
  </div>

  @if(session()->has('messageSuccess'))
  <div class="alert alert-success">
    {{ session()->get('messageSuccess') }}
  </div>
  @endif
  <div class="row">


    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <h2>Liste des Comptables</h2>
          <hr width="30%" align="left">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable" width="100%">

              <thead>
                <tr>
                  <th>Matrciule </th>
                  <th>Prénoms</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Statut</th>
                  <th align="right">Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- Le corps du tableau ici -->
                @foreach($accountants as $accountant)
                <tr>
                  <td>{{ $accountant->matricule }}  </td>
                  {{--<td><img src="@if (file_exists($accountant->user->avatar)) {{asset($accountant->user->avatar)}} @else {{  asset('uploads/avatars/default.png')}} @endif" 
                    style="width:40px; height:40px; border-radius:50%;"> </td>--}}  
                    <td>{{ $accountant->user->prenom }}</td>
                    <td>{{ $accountant->user->nom }}</td>
                    <td>{{ $accountant->user->email }}</td>
                    <td>
                      @if ($accountant->user->status == 1)
                      <span class="badge badge-success"> Compte activé </span>
                      @else
                      <span class="badge badge-danger"> Compte désactivé </span>
                      @endif
                    </td>

                    <td style="text-align: center">

                      <span class="float-right">
                        <a href="{{ route('accountant.show', $accountant) }}" class="btn btn-primary btn-sm" type="button">Voir</a>
                        <a href="{{ route('user.edit',$accountant->user_id) }}" class="btn btn-warning btn-sm" type="button">Modifier</a>
                      </span>



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





