@extends('backend.layouts.template')


@section('title')
    <h3><i class="fa fa-bell fa-lg"></i> Gestion des Notifications</h3>
    <p>liste des messages</p>

@endsection
@section('option')
    <a class="btn btn-outline-success btn-sm" data-toggle="tab" href="#message_nouveau">Nouveau Message</a>

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="tile table-responsive">


    <section>

        <div class="col-md-12">

            <div class="table-responsive">
                <div class="card-body">
                    <h2>Gestion des Notifications</h2>
                    <hr width="30%" align="left">

                    <div class="bs-component card ">
                        <ul class="nav nav-tabs nav-fill">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                    href="#message_envoyer">Messages envoyés </a></li>
                            @if (auth()->user()->unreadNotifications->count() != 0)
                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                        href="#message_recu">Messages Reçu (
                                        {{ auth()->user()->unreadNotifications->count() }})</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                        href="#message_recu">Messages Reçu </a></li>

                            @endif
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#message_tout">Tout les
                                    messages</a></li>

                            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                    href="#message_nouveau">Nouveau Message</a></li>

                        </ul>
                        <div class="tab-content" id="myTabContent">

                            {{-- message envoyé --}}
                            <div class="tab-pane fade active show mt-4" id="message_envoyer">
                                <div class="card-header">
                                    <h4 class="card-title">Message envoyés</h4>
                                </div>

                                <div class="card-footer text-muted">
                                    <table class="table table-hover table-bordered" id="envoyerTable" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">Vers</th>
                                                <th style="width: 90%">Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Le corps du tableau ici -->
                                            @foreach ($notifications as $notification)
                                                @if ($notification->data['sender'] == auth()->user()->email)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $notification->data['receiver'] }}</td>
                                                        <td style="width: 90%">
                                                            <blockquote class=" ">
                                                                <header class=" text-left ">
                                                                    <cite title="Source Title">
                                                                        <strong> Sujet : </strong>
                                                                        {{ $notification->data['subject'] }}
                                                                    </cite>
                                                                </header>
                                                                <p class="mb-0 text-center">
                                                                    {{ $notification->data['body'] }}</p>

                                                                <footer class="blockquote-footer text-right">
                                                                    @if (count($notification->data['attachment']) > 0)
                                                                        <cite title="Source Title">
                                                                            <a href="" data-toggle="modal"
                                                                                data-target="#model-{{ $notification->id }}">
                                                                                <u> {{ count($notification->data['attachment']) }}
                                                                                    fichiers </u> </a>
                                                                        </cite>
                                                                    @endif
                                                                </footer>
                                                            </blockquote>
                                                            <div class="card-footer text-muted ">
                                                                {{ date('Y/m/d H:i:s', strtotime($notification->data['date']['date'])) }}

                                                                <a href="{{ route('notificationsAdmin.destroy', $notification) }}"
                                                                    class="btn btn-outline-danger  pull-right">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif


                                                <!-- Modal -->
                                                <div class="modal fade" id="model-{{ $notification->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Piéces Jointes</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <ul>
                                                                        @foreach ($notification->data['attachment'] as $file)
                                                                            <li style="display: inline">

                                                                                @if (strpos($file, 'pdf'))

                                                                                    <cite title="Source Title">
                                                                                        <a href="{{ asset($file) }}"
                                                                                            target="_blank"
                                                                                            rel="noopener noreferrer">
                                                                                            <object
                                                                                                data="{{ asset($file) }}"
                                                                                                type="application/pdf"
                                                                                                width="10%"
                                                                                                height="10%">
                                                                                                <embed
                                                                                                    src="{{ asset($file) }}"
                                                                                                    type='application/pdf'>
                                                                                            </object>
                                                                                        </a>
                                                                                    </cite>
                                                                                @else

                                                                                    <cite title="Source Title">
                                                                                        <a href="{{ asset($file) }}"
                                                                                            target="_blank"
                                                                                            rel="noopener noreferrer">
                                                                                            <embed
                                                                                                src="{{ asset($file) }}#toolbar=0&navpanes=0&scrollbar=0"
                                                                                                width="10%"
                                                                                                height="10%">
                                                                                        </a>
                                                                                    </cite>

                                                                                @endif

                                                                            </li>

                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- message recu --}}
                            <div class="tab-pane fade mt-4" id="message_recu">

                                <div class="card-header">
                                    <h4 class="card-title">Message Reçus</h4>
                                </div>
                                <div class="card-footer text-muted">


                                    <table class="table table-hover table-bordered" id="envoyerTable" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">Envoyé par</th>
                                                <th style="width: 80%">Message</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Le corps du tableau ici -->
                                            @foreach ($m_recu as $notification)

                                                <tr>
                                                    <td>{{ $notification->data['receiver'] }}</td>


                                                    <td>
                                                        <div class="accordion" id="accordionExample">
                                                            <div class="card">
                                                                <div class="card-header"
                                                                    id="heading-{{ $notification->id }}">
                                                                    <h2 class="mb-0 ">
                                                                        <button
                                                                            class="btn btn-light btn-block text-left"
                                                                            type="button" data-toggle="collapse"
                                                                            data-target="#collapse-{{ $notification->id }}"
                                                                            aria-expanded="true"
                                                                            aria-controls="collapseOne">
                                                                            {{ $notification->data['subject'] }}
                                                                        </button>
                                                                    </h2>
                                                                </div>

                                                                <div id="collapse-{{ $notification->id }}"
                                                                    class="collapse show"
                                                                    aria-labelledby="heading-{{ $notification->id }}"
                                                                    data-parent="#accordionExample">

                                                                    <div class="card">
                                                                        <div class="card-header  text-left">
                                                                            Destinataire :
                                                                            {{ $notification->data['receiver'] }}
                                                                        </div>
                                                                        <div class="card-body  text-center ">
                                                                            <blockquote class="blockquote">
                                                                                <p class="mb-0">
                                                                                    {{ $notification->data['body'] }}
                                                                                </p>

                                                                                @if (count($notification->data['attachment']) > 0)
                                                                                    <footer
                                                                                        class="blockquote-footer text-right ">
                                                                                        <ul>
                                                                                            @foreach ($notification->data['attachment'] as $file)
                                                                                                <li
                                                                                                    style="display: inline">

                                                                                                    @if (strpos($file, 'pdf'))

                                                                                                        <cite
                                                                                                            title="Source Title">
                                                                                                            <a href="{{ asset($file) }}"
                                                                                                                target="_blank"
                                                                                                                rel="noopener noreferrer">
                                                                                                                <object
                                                                                                                    data="{{ asset($file) }}"
                                                                                                                    type="application/pdf"
                                                                                                                    width="10%"
                                                                                                                    height="10%">
                                                                                                                    <embed
                                                                                                                        src="{{ asset($file) }}"
                                                                                                                        type='application/pdf'>
                                                                                                                </object>
                                                                                                            </a>
                                                                                                        </cite>
                                                                                                    @else

                                                                                                        <cite
                                                                                                            title="Source Title">
                                                                                                            <a href="{{ asset($file) }}"
                                                                                                                target="_blank"
                                                                                                                rel="noopener noreferrer">
                                                                                                                <embed
                                                                                                                    src="{{ asset($file) }}#toolbar=0&navpanes=0&scrollbar=0"
                                                                                                                    width="10%"
                                                                                                                    height="10%">
                                                                                                            </a>
                                                                                                        </cite>

                                                                                                    @endif

                                                                                                </li>

                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </footer>

                                                                                @endif
                                                                            </blockquote>
                                                                        </div>

                                                                        <div class="card-footer text-muted">
                                                                            {{ date('Y/m/d H:i:s', strtotime($notification->data['date']['date'])) }}



                                                                            <a href="{{ route('notificationsAdmin.destroy', $notification) }}"
                                                                                class="btn btn-outline-danger  pull-right">
                                                                                <i class="fa fa-trash"></i>
                                                                            </a>
                                                                            <a data-toggle="modal"
                                                                                data-target="#repondreMesssage-{{ $notification->id }}"
                                                                                class="btn btn-outline-primary  mr-1 pull-right">
                                                                                <i class="fa fa-send"></i>
                                                                            </a>
                                                                            @if ($notification->read_at == null)
                                                                                <a href="{{ route('notificationAdmin.update', $notification) }}"
                                                                                    class="btn btn-outline-success  pull-right">
                                                                                    <i class="fa fa-eye"></i>
                                                                                </a>
                                                                            @endif


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </td>




                                                </tr>

                                                {{-- modal  Modification paremetre --}}

                                                <div class="modal fade"
                                                    id="repondreMesssage-{{ $notification->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title"
                                                                    id="exampleModalCenterTitle">Réponre à
                                                                    {{ $notification->data['receiver'] }} </h2>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <form
                                                                        action="{{ route('messagesAdmin.store') }}"
                                                                        enctype="multipart/form-data" method="post">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="email">Destinataire</label>
                                                                            <select class="form-control"
                                                                                name="email" id="email">
                                                                                <option selected>
                                                                                    {{ $notification->data['receiver'] }}
                                                                                </option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="sujet">Sujet :</label>
                                                                            <input type="text" name="subject"
                                                                                class="form-control" readonly
                                                                                value="{{ $notification->data['subject'] }}">

                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="message">Réponse</label>
                                                                            <textarea type="text"
                                                                                class="form-control" name="body"
                                                                                id="message" rows="5"
                                                                                class="form-control @error('message') is-invalid @enderror"
                                                                                placeholder="réponse..."></textarea>
                                                                            @error('message')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group  ">
                                                                            <label for="file">Fichier</label>
                                                                            <input type="file" class="form-control"
                                                                                name="attachment[]" multiple>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                class="btn  btn au-btn-hover btn-success">répondre</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- fin modal --}}


                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                            {{-- tout les messages --}}
                            <div class="tab-pane fade mt-4" id="message_tout">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Tout les messages</h4>
                                    </div>
                                    <div class="card-footer text-muted">



                                        <table class="table table-hover table-bordered" id="toutTable" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>De </th>
                                                    <th>Vers</th>
                                                    <th>Sujet</th>
                                                    <th>Message</th>
                                                    <th>date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Le corps du tableau ici -->
                                                <form method="POST"
                                                    action="{{ route('notificationAdmin.deleteAll') }}">
                                                    @csrf

                                                    @foreach ($notifications as $notification)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox"
                                                                    id="chkbox{{ $notification->id }}"
                                                                    class="checkboxall filled-in chk-col-red"
                                                                    name="ids[]" value="{{ $notification->id }}">
                                                            </td>
                                                            <td>{{ $notification->data['sender'] }}</td>
                                                            <td>{{ $notification->data['receiver'] }}</td>
                                                            <td>{{ $notification->data['subject'] }}</td>
                                                            <td>
                                                                <blockquote class=" ">
                                                                    <p class="mb-0 text-center">
                                                                        {{ $notification->data['body'] }}</p>

                                                                    <footer class="blockquote-footer text-right">
                                                                        @if (count($notification->data['attachment']) > 0)
                                                                            <cite title="Source Title">
                                                                                <a href="" data-toggle="modal"
                                                                                    data-target="#model2-{{ $notification->id }}">
                                                                                    <u> {{ count($notification->data['attachment']) }}
                                                                                        fichiers </u> </a>
                                                                            </cite>
                                                                        @endif
                                                                    </footer>
                                                                </blockquote>
                                                            </td>
                                                            <td> {{ date('Y/m/d H:i:s', strtotime($notification->data['date']['date'])) }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('notificationsAdmin.destroy', $notification) }}"
                                                                    class="btn btn-outline-danger">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <!-- Modal -->
                                                        <div class="modal fade"
                                                            id="model2-{{ $notification->id }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="modelTitleId"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Piéces Jointes</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <ul>
                                                                                @foreach ($notification->data['attachment'] as $file)
                                                                                    <li style="display: inline">

                                                                                        @if (strpos($file, 'pdf'))

                                                                                            <cite
                                                                                                title="Source Title">
                                                                                                <a href="{{ asset($file) }}"
                                                                                                    target="_blank"
                                                                                                    rel="noopener noreferrer">
                                                                                                    <object
                                                                                                        data="{{ asset($file) }}"
                                                                                                        type="application/pdf"
                                                                                                        width="10%"
                                                                                                        height="10%">
                                                                                                        <embed
                                                                                                            src="{{ asset($file) }}"
                                                                                                            type='application/pdf'>
                                                                                                    </object>
                                                                                                </a>
                                                                                            </cite>
                                                                                        @else

                                                                                            <cite
                                                                                                title="Source Title">
                                                                                                <a href="{{ asset($file) }}"
                                                                                                    target="_blank"
                                                                                                    rel="noopener noreferrer">
                                                                                                    <embed
                                                                                                        src="{{ asset($file) }}#toolbar=0&navpanes=0&scrollbar=0"
                                                                                                        width="10%"
                                                                                                        height="10%">
                                                                                                </a>
                                                                                            </cite>

                                                                                        @endif

                                                                                    </li>

                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <button type="submit" id="deleteTrigger"
                                                        class="btn btn-danger">Supprimé la
                                                        selection</button><br><br>
                                                </form>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            {{-- nouveau message --}}
                            <div class="tab-pane fade mt-4" id="message_nouveau">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Nouveau Message</h4>
                                        </div>
                                        <div class="card-footer text-muted">
                                            <form action="{{ route('messagesAdmin.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">

                                                    <div class=" form-group  col-md-10">
                                                        <label for="Message">Sujet</label>
                                                        <input type="text" name="subject"
                                                            class="form-control @error('subject') is-invalid @enderror"
                                                            id="subject" placeholder="subject">
                                                        @error('subject')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class=" form-group  col-md-10">
                                                        <label for="Message">Destinataire</label>
                                                        <select id="email" name="email" class="form-control">
                                                            <option value="">destinataire...</option>
                                                            <option value="admin">Admins </option>
                                                            <option value="teacher"> Professeurs </option>
                                                            <option value="student"> étudiants </option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->email }}">
                                                                    {{ $user->email }} -- {{ $user->role }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-10">
                                                        <label for="Message">Message</label>
                                                        <textarea name="body"
                                                            class="form-control  @error('body') is-invalid @enderror"
                                                            id="body" placeholder="body" rows="4"></textarea>
                                                        @error('body')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-10 ">
                                                        <label for="file">Fichier</label>
                                                        <input type="file" class="form-control" name="attachment[]"
                                                            multiple>
                                                    </div>
                                                </div>
                                                <div class="form-group  text-right ">

                                                    <button type="submit"
                                                        class="pull-right btn btn-outline-primary">
                                                        <i class="fa fa-send "></i>
                                                        {{ __('envoyer ') }}
                                                    </button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection


@section('scripts')
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('js/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();

    </script>
    <script type="text/javascript">
        $('#recuTable').DataTable();

    </script>
    <script type="text/javascript">
        $('#toutTable').DataTable();

    </script>
    <script type="text/javascript">
        $('#envoyerTable').DataTable();

    </script>
@endsection
