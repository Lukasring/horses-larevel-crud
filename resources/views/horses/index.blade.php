@extends('layouts.app')
@section('content')
<div class="card-body">
  @if($errors->any())
  <div class="alert alert-danger">
    <p><b>{{$errors->first()}}</b></p>
  </div>
  @endif

  <table class="table">
    <tr>
      <th>Name</th>
      <th>Runs</th>
      <th>Wins</th>
      <th>Bets</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>
    @foreach ($horses as $horse)
    <tr>
      <td>{{ $horse->name }}</td>
      <td>{{ $horse->runs }}</td>
      <td>{{ $horse->wins }}</td>
      <td>{{ count($horse->betters) }}</td>
      <td style="width:30%">{!!$horse->about!!}</td>
      <td>
        <form action={{ route('horses.destroy', $horse->id) }} method="POST">
          <a class="btn btn-outline-primary" href={{ route('horses.show', $horse->id) }}>Details</a>
          <a class="btn btn-outline-success" href={{ route('horses.edit', $horse->id) }}>Edit</a>
          @csrf @method('delete')
          <input type="submit" class="btn btn-outline-danger" value="Delete" />
        </form>
      </td>

    </tr>
    @endforeach
  </table>
  @if (session('status_success'))
  <div class="alert alert-success">
    <p style="color: green"><b>{{ session('status_success') }}</b></p>
  </div>
  @elseif(session('status_error'))
  <div class="alert alert-danger">
    <p style="color: red"><b>{{ session('status_error') }}</b></p>
  </div>
  @endif
  <div>
    <a href="{{ route('horses.create') }}" class="btn btn-outline-success">Add New</a>
  </div>
</div>
@endsection