@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-users" aria-hidden="true"></i>Gestion des Contacts</h1>
    <h4 class="mt-2">Liste des contacts</h4>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')

    <table class="table table-striped table-bordered zero-configuration">
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
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->prenom }} </td>
                    <td>{{ $contact->nom }}</td>
                    <td>{{ $contact->email }}</td>
                    <td class="text-center">{{ $contact->adresse }}</td>
                    <td>
                        <textarea disabled class="form-control">{{ $contact->message }}</textarea>
                    </td>


                    <td style="text-align: center">

                        <div class="btn-group">
                            <a href="{{ route('admin.contact.delete', $contact) }}" class="btn btn-danger btn-sm"
                                type="button">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                        </div>
                    </td>
                </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th class="text-center">Adresse</th>
                <th class="text-center">Message</th>
                <th class="text-center">option</th>
            </tr>
        </tfoot>
    </table>


@endsection
