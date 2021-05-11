@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users" aria-hidden="true"></i>Gestion des Contacts</h1>
        <h4 class="mt-2">Liste des contacts</h4>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> 
        </li>
    </ul>
</div>
  <div class="row">
    <div class="col-md-12">
      @if(Session::has('error'))
        <div class="alert alert-danger">
          {{ Session::get('error') }}
        </div>
      @endif
      @if(Session::has('success'))
      <div class="alert alert-success">
         {{ Session::get('success') }}
        </div>
        @endif
  </div>
  </div>
 
    
        <div class="tile">
            <div class="tile-body">
            <h2>Liste des Contacts Reçu </h2>
            <hr>
            <div class="table-responsive">
                <table class="table  table-bordered" id="sampleTable" width="100%">
                    <thead>
                        <tr>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th class="text-center">Adresse</th>
                        <th class="text-center">Message</th>
                        <th class="text-center">option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Le corps du tableau ici -->
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->prenom }} </td>
                            <td>{{ $contact->nom }}</td>
                            <td>{{ $contact->email }}</td>
                            <td class="text-center">{{ $contact->adresse }}</td>
                            <td >
                                <textarea  disabled class="form-control" >{{ $contact->message }}</textarea>
                            </td>


                            <td style="text-align: center">

                                <div class="btn-group">
                                    <a href="{{ route('admin.contact.delete', $contact) }}" class="btn btn-danger btn-sm" type="button">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> </a>                    
                                </div>
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


@section('scripts')
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection