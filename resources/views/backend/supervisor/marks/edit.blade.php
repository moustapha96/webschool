@extends('backend.layouts.main')


@section('styles')

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
                                    <h4 class="card-title">Modifier une Note</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('supervisor.marks.index') }}" class="btn btn-info float-right btn-sm"
                                        role="button">Liste des notes</a>
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">

                            <form action="{{ route('supervisor.marks.update', $mark) }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="student_id">étudiant : </label>
                                    <select class="form-control" required name="student_id" id="student_id">
                                        <option selected > {{ $mark->student->user->prenom .' ' . $mark->student->user->nom }} </option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="student_id">Matiere </label>
                                    <select class="form-control" required name="subject_id" id="subject_id">
                                        <option> </option>
                                        @foreach ($matieres as $subject)
                                            <option value="{{ $subject->id }}" 
                                                {{ $subject->id == $mark->subject->id ? 'selected' : '' }}
                                                 > {{ $subject->name }}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="typeNote">Type Note</label>
                                    <select class="form-control" required name="typeNote" id="typeNote">
                                        <option></option>
                                        <option value="examen"  {{ 'examen' == $mark->typeNote ? 'selected' : '' }} >Examen</option>
                                        <option value="devoir"  {{ 'devoir' == $mark->typeNote ? 'selected' : '' }}>Devoir</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="mark_value">Note</label>
                                    <input type="number" min="0" max="20" step=".5" required name="mark_value" value="{{ $mark->mark_value }}"
                                        id="mark_value" class="form-control @error('mark_value') is-invalid @enderror"
                                        placeholder="note">
                                    @error('mark_value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">enregistrer</button>
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



@endsection
