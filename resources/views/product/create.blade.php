@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <!-- если успех -->
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <!-- errors -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputPassword1">article</label>
                            <input type="text" name="ARTICLE" class="form-control" id=""  placeholder="latin only + digit ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">name</label>
                            <input type="text"  name="NAME" class="form-control" id=""  placeholder="min 10 characters">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">доступность</label>
                            <select class="form-control" name="select" id="">
                                <option selected>available </option>
                                <option>unavailable</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">DATA</label>
                            <input type="text"  name="size"  class="form-control" id="" placeholder="size" required  >
                            <br>
                            <input type="text" name="color" class="form-control" id="" placeholder="color" required>
                            <br>
                            <input type="text"  name="weight"  class="form-control" id="" placeholder="weight" required>
                            <br>
                        </div>
<br><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

@endsection
