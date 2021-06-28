@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Note étudiants</h1>
    <p>Importattion notes étudiants </p>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')

    <div class="container">
       

        <div class="container mt-5">
            <form action="{{ route('admin.import.student_mark.store') }}" method="post" enctype="multipart/form-data">
              <h3 class="text-center mb-5">Upload File Mark</h3>
                @csrf
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
              @endif
    
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
    
                <div class="custom-file">
                    <input type="file" name="fiche" class="custom-file-input" id="chooseFile">
                    <label class="custom-file-label" for="chooseFile">Select file</label>
                </div>
    
                <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                    Upload Files
                </button>
            </form>
        </div>
    </div>
@endsection
