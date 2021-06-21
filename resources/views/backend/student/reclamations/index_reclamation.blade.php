@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Réclamations</h1>
    <p>Vos notifications</p>

@endsection
@section('option')
    <a data-toggle="modal" data-target="#modal_add" class="btn btn-success" role="button">Faire une réclamation</a>

@endsection
@section('option-panel')
    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Faire une Réclamations </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="{{ route('student.addreclamation') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="commentaire">Commentaire</label>
                                <textarea required name="commentaire" id="commentaire"
                                    class="form-control @error('commentaire') is-invalid @enderror"
                                    placeholder="le motif de votre reclamation"></textarea>
                                @error('commentaire')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('data')
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Date Messages</th>
                                <th>Reclamations</th>
                                <th>action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- Le corps du tableau ici -->
                            @foreach ($student->reclamationEtudiant as $rc)
                                <tr>
                                    <td>{{ $rc->id }} </td>
                                    <td>{{ $rc->reclamation->dateRecla }}</td>
                                    <td>{{ $rc->reclamation->commentaire }}</td>
                                    <td>
                                        <a href="{{ route('student.deletereclamation', $rc->id) }}"
                                            class="btn btn-danger">supprimer</a>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
