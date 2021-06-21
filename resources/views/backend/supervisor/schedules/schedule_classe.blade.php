@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Emploi du temps</h4>
    <p>emploi du temps classe</p>
@endsection
@section('option')
    <a href="{{ route('supervisor.schedule.index') }}" class="btn btn-info float-right btn-sm" role="button"> <i
            class="fa fa-list" aria-hidden="true"></i> liste</a>
@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <form class="form-group" action="{{ route('supervisor.schedule.classe') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-2">
                    <h3 for="classe"> Classe : </h3>
                </div>
                <div class="form-group col-md-7">
                    <select id="code" name="code" class="form-control">
                        @foreach ($classes as $classe)
                            <option value="{{ $classe->code }}"> {{ $classe->code }} - {{ $classe->nameClass }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary" role="search"> VOIR EMPLOI DU TEMPS</button>
                </div>
            </div>
        </form>
    </div>
@endsection
