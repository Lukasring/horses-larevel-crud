@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Update Better:</div>
        <div class="card-body">
          <form action="{{ route('betters.update', $better->id) }}" method="POST">
            @csrf @method("PUT")
            <div class="form-group">

              <label>Name: </label>
              <input type="text" name="name" class="form-control" value="{{$better->name}}">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Surname: </label>
              <input type="text" name="surname" class="form-control" value="{{$better->surname}}">
              @error('surname')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Bet: </label>
              <input type="number" step=".01" name="bet" class="form-control" value="{{$better->bet}}">
              @error('bet')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Horse: </label>
              <select name="horse_id" id="" class="form-control">
                <option value="" selected disabled>Select Horse</option>
                @foreach ($horses as $horse)
                <option value="{{$horse->id}}" @if($horse->id == $better->horse_id) selected="selected" @endif>{{ $horse->name }}</option>
                @endforeach
              </select>
              @error('horse_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
        @if (session('status_success'))
        <div class="alert alert-success">
          <p style="color: green"><b>{{ session('status_success') }}</b></p>
        </div>
        @elseif(session('status_error'))
        <div class="alert alert-danger">
          <p style="color: red"><b>{{ session('status_error') }}</b></p>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection