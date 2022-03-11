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

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href=""> Back</a>
            </div>
        </div>
    </div>
    <form action="{{ route('product.update',$note['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputPassword1">article</label>
            <input type="text" name="ARTICLE" class="form-control" id="" value="{{$note['article']}}" placeholder="latin only + digit ">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">name</label>
            <input type="text"  name="NAME" class="form-control" id="" value="{{$note['name']}}" placeholder="min 10 characters">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">доступность</label>
            <select class="form-control" name="select" id="">
                <option selected>{{$note['status']}}</option>
                <option>unavailable</option>
                <option>available</option>

            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">DATA</label>
            <input type="text"  name="size"  class="form-control" id="" value="{{$note['size']}}" placeholder="size" required  >
            <br>
            <input type="text" name="color" class="form-control" id="" value="{{$note['color']}}" placeholder="color" required>
            <br>
            <input type="text"  name="weight"  class="form-control" id="" value="{{$note['weight']}}" placeholder="weight" required>
            <br>
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

            </div>
        </div>
    </div>

@endsection
