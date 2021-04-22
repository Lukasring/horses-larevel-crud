@extends('layouts.app')
@section('content')
<div class="card-body">


  <div class="card-body">
    <form class="form-inline" action="{{ route('betters.index') }}" method="GET">
      <select name="horse_id" id="" class="form-control">
        <option value="" selected disabled>Select horse you want to filter:</option>
        @foreach ($horses as $horse)
        <option value="{{ $horse->id }}" @if($horse->id == app('request')->input('horse_id'))
          selected="selected"
          @endif>{{ $horse->name }}</option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-success" href={{ route('betters.index') }}>Rodyti visus</a>
    </form>
  </div>


  @if($errors->any())
  <div class="alert alert-danger">
    <p><b>{{$errors->first()}}</b></p>
  </div>
  @endif

  <table class="table">
    <tr>
      <th>Name</th>
      <th>Surname</th>
      <th>Horse</th>
      <th>Bet ($)</th>
      <th>Actions</th>
    </tr>
    @foreach ($betters as $better)
    <tr>
      <td>{{ $better->name }}</td>
      <td>{{ $better->surname }}</td>
      <td>{{ $better->horse->name }}</td>
      <td>{{ $better->bet }}</td>
      <td>
        <form action={{ route('betters.destroy', $better->id) }} method="POST">
          <a class="btn btn-success" href={{ route('betters.edit', $better->id) }}>Edit</a>
          @csrf @method('delete')
          <input type="submit" class="btn btn-danger" value="Delete" />
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
    <a href="{{ route('betters.create') }}" class="btn btn-success">Add New</a>
  </div>
</div>
@endsection