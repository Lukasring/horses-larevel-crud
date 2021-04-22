@extends('layouts.app')
@section('content')
<h1>Welcome</h1>
<h2>Check out our horses you can bet on!</h2>
<div class="card-body">
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Runs</th>
            <th>Wins</th>
            <th>Bets</th>
            <th>Description</th>
        </tr>
        @foreach ($horses as $horse)
        <tr>
            <td>{{ $horse->name }}</td>
            <td>{{ $horse->runs}}</td>
            <td>{{ $horse->wins}}</td>
            <td>{{ count($horse->betters) }}</td>

            <td style="width: 30%">{!!$horse->about!!}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection