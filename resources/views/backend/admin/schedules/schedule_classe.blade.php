@extends('backend.layouts.main')


@section('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection


@section('main')

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Emploi du temps</h4>
                                    <p>emploi du temps classe</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-info float-right btn-sm"
                                        role="button"> <i class="fa fa-list" aria-hidden="true"></i> liste</a>
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <form class="form-group"  action="{{ route('admin.schedule.classe') }}" method="POST">
                                @csrf
                       
                                   <div class="form-row">
                                       <div class="form-group col-md-2">
                                           <h3 for="classe"> Classe : </h3>          
                                       </div>
                                       <div class="form-group col-md-7">
                                         <select id="code" name="code" class="form-control">
                                           @foreach($classes as $classe )
                                             <option value="{{ $classe->code }}"> {{ $classe->code }} - {{ $classe->nameClass}}</option>
                                           @endforeach
                                         </select>
                                       </div>
                                       <div class="form-group col-md-3">
                                         <button type="submit" class="btn btn-primary" role="search" > VOIR EMPLOI DU TEMPS</button> 
                                       </div>
                                   </div>
                               </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script src="{{ asset('app-assets/js/data-tables/datatable-basic.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/datatables.min.js') }}"></script>

    <script>
        $(.table).DataTable();

    </script>

@endsection