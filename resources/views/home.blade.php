@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <!-- Style -->
    <link href="{{ asset('new/cal.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <h1>Calculator</h1>
        <input type="text" id="write">
        <br>
        <input type="button" value="7"> 
        <input type="button" value="8">
        <input type="button" value="9">
        <input type="button" value="+">
        <br>
        <input type="button" value="4">
        <input type="button" value="5">
        <input type="button" value="6">
        <input type="button" value="-">
        <br>
        <input type="button" value="1">
        <input type="button" value="2">
        <input type="button" value="3">
        <input type="button" value="*">
        <br>
        <input type="button" value="0">
        <input type="button" value="c" id="c">
        <input type="button" value="=" id="hasil">
        <input type="button" value="/">
    </div>

    <!-- Script -->
    <script src="{{ asset('new/hmm.min.js') }}"></script>
    <script src="{{ asset('new/sc.js') }}"></script>

</body>
</html>