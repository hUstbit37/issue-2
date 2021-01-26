@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row mb-2">
                    <div class="col-md-8">
                        <form action="{{ route('users.export') }}" id="form-date" method="post">
                            @csrf
                            <div class="row">
                                <label for="date-from" class="col-form-label">From</label>
                                <input name="from" class="col-4 form-control ml-1" type="date" value="" id="date-from">
                                <label for="date-to" class="col-form-label ml-1">To</label>
                                <input name="to" class="col-4 form-control ml-1" type="date" value="" id="date-to">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary" onclick="event.preventDefault();
                                document.getElementById('form-date').submit();">Xuất Excel
                        </button>
                    </div>
                    <a class="btn btn-warning cod-md-2" href="{{ route('users.exportPerMonth') }}">Xuất nhiều sheet</a>

                </div>
            </div>
            @include('exports.users.table')
        </div>
    </div>
    </div>

@endsection
