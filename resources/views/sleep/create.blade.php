@extends('layouts.app')

@section('content')

<div class="container">
 
@if(session('message'))
 <div class= "alert alert-success" role="alert">{{ session('message') }}</div>
 @endif

 <form method="post" action="{{ route('sleep.store') }}">
    @csrf
    <div class="form-group">
        <label for="child_id">児童名</label>
        <select name="child_id" class="form-control  @error('child_id') is-invalid @enderror" id="child_id">
            @foreach($children as $child)
              <option value="{{ $child->id }}">{{ $child->name }}</option>
            @endforeach
        </select>
       @error('child_id')
        <p class="text-danger">{{ $message }}</p>
       @enderror
    </div>

    <div class="form-group">
        <label for="nap_start" class="form-control @error('nap_start') is-invalid @enderror" id="nap_start">
        <input type="date" name="nap_start" id="nap_start" class="form-control" required>
          @error('nap_start')
           <p class="text-danger">{{ message }}</p>
          @enderror 
        </label>
    </div>

    <div class="form-group">
      <lavel for="nap_end" class="form-control @error('nap_end') is-invalid @enderror" id="nap_end">
      <input type="date" name="nap_start" id="nap_end" class="form-control" required>
      @error('nap_end')
      <p class="text-danger">{{ message }}</p>
      @enderror
      </lavel>
    </div>

 </form>
</div>