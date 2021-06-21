@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i>Unité d'enseignement</h1>
            <p>Modification d'une unité d'enseignement </p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<form method="Post" action="{{ route('unities.update', $unity->id) }}">
    @method('PATCH')
    @csrf

    <div class="form-group">
        <label for="name">Nom:</label>
        <input type="text" class="form-control" name="ine" value="{{ $unity->name }}" />
    </div>
    <div class="form-group">
        <label for="code">Code:</label>
        <input type="text" class="form-control" name="ine" value="{{ $unity->code }}" />
    </div>
    <div class="form-group">
        <label for="class_id">classe:</label>
        <select name="class_id" id="idClasse" class="select2_single form-control" >
            @foreach($classe as $classes)
            <option value="{{ $classes->id}}">{{ $classes->nameClass}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="semestre_id">semestre:</label>
        <select name="class_id" id="idClasse" class="select2_single form-control" >
            @foreach($semester as $semesters)
            <option value="{{ $semesters->id}}">{{ $semesters->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="code">Code:</label>
        <input type="text" class="form-control" name="ine" value="{{ $unity->code }}" />
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

