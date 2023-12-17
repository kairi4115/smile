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
        <label for="nap_start" class="form-control @error('nap_start') is-invalid @enderror" id="nap_start">日付</label>
        <input type="date" name="nap_start" id="nap_start" class="form-control" required>
          @error('nap_start')
           <p class="text-danger">{{ $message }}</p>
          @enderror 
      
    </div>


    <div class="form-group">
      <label for="start_time">午睡開始時間:</label>
      <input type="time" name="start_time" required>
      @error('time_start')
      <p class="text-danger">{{ $message }}</p>
      @enderror
   
    </div>


    <div class="form-group">
    <label for="end_time">起床時間</label>
    <input type="time" name="end_time" required>
    @error('end_time')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </label>
    </div>
      
    <div class="form-group">
      <label for="notes" class="form-control @error('notes') is-invalid @enderror" id="notes">注意事項</label>
      <input type="notes" name="notes" id="notes" class="form-control" required>
      @error('notes')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      
    </div>

    <button type="submit">送信</button>
    </div>

 </form>
</div>

@endsection