@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Horse Details</div>
  <div class='card-body'>
    <h4 class='card-title'>{{$horse->name}}</h4>
    <table class="table">
      <thread>
        <tr>
          <th scope="col">Runs</th>
          <th scope="col">Wins</th>
          <th scope="col">Wins %</th>
          <th scope="col">Bets</th>
          <th scope="col">Bet Total</th>
        </tr>
      </thread>
      <tbody>
        <tr>
          <td>{{$horse->runs}}</td>
          <td>{{$horse->wins}}</td>
          <td>{{$horse->wins / $horse->runs * 100 . '%'}}</td>
          <td>{{count($horse->betters)}}</td>
          <td>{{'$'. $horse->betters->sum('bet')}}</td>
        </tr>
      </tbody>
    </table>
    <div>{!!$horse->about!!}</div>
    @if(count($horse->betters)!==0)
    <ul class="list-group">
      <li class="list-group-item">
        <div class="row">
          <div class="col-6"><strong>Better</strong></div>
          <div class="col-6"><strong>Ammount</strong></div>
        </div>
      </li>
      @foreach($horse->betters as $better)
      <li class="list-group-item">
        <div class="row">
          <div class="col-6">{{$better->name . ' ' . $better->surname}}</div>
          <div class="col-6">{{'$'.$better->bet}}</div>
        </div>
      </li>
      @endforeach
    </ul>
    @else
    <h5>No bets..</h5>
    @endif
  </div>
  <div class="card-footer">
    <div class="btn-group">
      <a href="{{route('horses.index')}}" class="btn btn-outline-primary">Back</a>
    </div>
  </div>
</div>
@endsection