@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row mb-2">
                    <div class="col-md-7">
                        <form action="{{ route('users.export') }}" id="form-date" method="post">
                            @csrf
                            <div class="row">
                                <label for="date-from" class="col-form-label">From</label>
                                <input onchange="changeButton()" name="fromDate" class="col-4 form-control ml-1" type="date" value="" id="date-from">
                                <label for="date-to" class="col-form-label ml-1">To</label>
                                <input name="toDate" class="col-4 form-control ml-1" type="date" value="" id="date-to">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <button id="submit-date" class="btn btn-primary" onclick="event.preventDefault();
                                document.getElementById('form-date').submit();">Xuất tất cả
                        </button>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-warning cod-md-2" href="{{ route('users.exportPerMonth') }}">Xuất nhiều
                            sheet</a>
                    </div>

                </div>
            </div>
            @include('exports.users.table')
        </div>
    </div>

    <script>
        function changeButton() {
            if (document.getElementById('date-from').value !== '') {
                document.getElementById('submit-date').innerText="Xuất theo khoảng thời gian"
            }
        }
    </script>

@endsection
