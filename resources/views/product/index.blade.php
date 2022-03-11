@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Product  admin  <a href="/product/create" class="btn btn-success"> + Create</a></div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notes as $note)
                                <tr>
                                    <td>{{ $note->id }}</td>
                                    <td>{{ $note->NAME }}</td>
                                    <td>{{ $note->STATUS }}</td>
                                    <td style="text-align:right;">
                                        <a href="/product/{{ $note->id }}" class="btn btn-info">View</a>
                                       <a href="/product/{{ $note->id }}/edit" class="btn btn-success">Edit</a>
                                    <!--  <a href="/product/{{ $note->id }}" class="btn btn-danger">Dellete</a> -->

                                        <form method="POST" action="/product/{{$note->id}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
