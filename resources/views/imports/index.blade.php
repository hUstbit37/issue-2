@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Import Excel</div>
                    <div class="card-body">
                        @if(isset($errors) && $errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="file" id="file-input"/>
                            </div>
                            <button type="submit" class="btn btn-success">Import User Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
