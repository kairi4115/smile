@extends('layouts.app')

@section('content')

<!-- 食事記録　-->
@if($FoodChildRecords) 
   <h3>食事記録</h3>
   <ul>
      @foreach($FoodChildRecords as $FoodChildRecord )
       <li>{{ $FoodChildRecord->child_id }}</li>
       <li>{{ $FoodChildRecord->record_date}}</li>
       <li>{{ $FoodChildRecord->meal_type}}</li>
       <li>{{ $FoodChildRecord->meal_description }}</li>
       <li>{{ $FoodChildRecord->meal_amount }}</li>
       @endforeach
   </ul>
   @else
     <p>食事記録はありません</p>
   @endif

   <!-- 排泄記録　-->
   @if($bowelMovements)  
　　<h3>排泄記録</h3>
　　<ul>
   @foreach($bowelMovements as $bowelMovement)
    <li>{{$bowelMovement->name }}</li>
    <li>{{$bowelMovement->date }}</li>
    <li>{{$bowelMovement->time }}</li>
    <li>{{$bowelMovement->type}}</li>
    <li>{{$bowelMovement->stool_type}}</li>
    <li>{{$bowelMovement->notes }}</li>
    @endforeach
</ul>
 @else
 <p>排泄記録はありません</p>
 @endif

   
 <!-- 出席記録　-->
 @if($AttendanceRecords)
 <h3>出席記録</h3>
 @foreach($AttendanceRecords as $AttendanceRecord)
 <li>{{ $AttendanceRecord->child_id }}</li>
 <li>{{ $AttendanceRecord->date}}</li>
 <li>{{ $AttendanceRecord->present }}</li>
 <li>{{ $AttendanceRecord->arrival_time }}</li>
 <li>{{ $AttendanceRecord->departure_time }}</li>
 <li>{{ $AttendanceRecord->notes }}</li>
 @endforeach

 @else
 <p>出席記録はありませせん</p>
 @endif




@endsection