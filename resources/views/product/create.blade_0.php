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

                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Add New Product</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" > Back</a>
                            <a class="btn btn-primary"  >List</a>
                        </div>
                    </div>
                </div>

                <form action="{{ route('product.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ARTICLE:</strong>
                                <input type="text" name="ARTICLE" class="form-control" placeholder="latin only + digit ">
                            </div>
                            <div class="form-group">
                                <strong>NAME:</strong>
                                <input type="text" name="NAME" class="form-control" placeholder="min 10 characters">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="Available" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Available
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="Unavailable">
                            <label class="form-check-label" for="exampleRadios2">
                                Unavailable
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>DATA:</strong>
                                <textarea class="form-control" style="height:150px" name="DATA" placeholder="Enter DATA"></textarea>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
