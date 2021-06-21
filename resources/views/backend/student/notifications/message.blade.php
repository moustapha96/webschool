@extends('backend.layouts.template')


@section('title')

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-body">
        <div class="table-responsive">
            @unless(auth()->user()->unreadNotifications->isEmpty(),)
                <table class="table" style="margin-bottom: 140px">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Body</th>
                            <th>date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->unreadNotifications as $noti)
                            <tr>
                                <td> {{ $noti->data['sender'] }} </td>
                                <td> {{ $noti->data['subject'] }} </td>
                                <td>
                                    <div class="hover_img">
                                        <textarea class="form-control" readonly rows="3">{{ $noti->data['body'] }}</textarea>
                                    </div>
                                </td>
                                <td>{{ $noti->data['date']['date'] }}</td>
                                <td>
                                    <form action="{{ route('notificationsStudent.update', $noti) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="submit" class="btn btn-success btn-sm" value="@lang('Marquer comme lu')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endunless

        </div>
    </div>
@endsection
