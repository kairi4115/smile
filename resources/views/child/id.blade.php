@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">児童情報一覧</div>
            <div class="card-body">
               <div class="child-container">
                  <a href="{{ url('child') }}" class="btn btn-secondary mb-3">戻る</a>
                  <a href="{{ route('child.research') }}" class="btn btn-secondary mb-3">検索ボタン</a>
               </div>
                <!-- 食事記録　-->
                @if($FoodChildRecords)
                <div class="mb-4">
                  <h3>食事記録</h3>
                  <ul class="list-group">
                     @foreach($FoodChildRecords as $FoodChildRecord)
                     <li class="list-group-item">
                        <strong>日付:</strong>{{ $FoodChildRecord->record_date}}<br>
                        <strong>食事タイプ:</strong>{{ $FoodChildRecord->meal_type}}<br>
                        <strong>説明:</strong>{{ $FoodChildRecord->meal_description}}<br>
                        <strong>量:</strong>{{ $FoodChildRecord->meal_amount}}<br>
                     </li>
                     @endforeach
                  </ul>
   
                </div>
               
                @elseif($message)
                   <p>{{ $message }}</p>
                @endif
       
                <!-- 排泄記録　-->
                @if($bowelMovements)
                <div class="mb-4">
                  <h3>排泄記録</h3>
                  <ul class="list-group">
                   @foreach($bowelMovements as $bowelMovement)
                  <li class="list-group-item">
                     <strong>児童名</strong>{{ $bowelMovement->name}}<br>
                     <strong>日付</strong>{{ $bowelMovement->date}}<br>
                     <strong>時間</strong>{{ $bowelMovement->time}}<br>
                     <strong>種類</strong>{{ $bowelMovement->type}}<br>
                     <strong>硬さ</strong>{{$bowelMovement->stool_type}}<br>
                     <strong>注意事項</strong>{{$bowelMovement->notes}}<br>
                  </li>
                  @endforeach
                  </ul>
                
                </div>

                @elseif($message)
                <p>{{message}}</p>
                @endif

                <!-- 出席記録　-->
                @if($AttendanceRecords)
                <div class="mb-4">
                  <h3>出席記録</h3>
                  <ul class="list-group">
                     @foreach($AttendanceRecords as $AttendanceRecord)
                     <li class="list-group-item">
                        <strong>日付</strong>{{$AttendanceRecord->date}}<br>
                        <strong>出欠確認</strong>{{$AttendanceRecord->present}}<br>
                        <strong>到着時間</strong>{{$AttendanceRecord->arrival_time}}<br>
                        <strong>出発時間</strong>{{$AttendanceRecord->departure_time}}<br>
                        <strong>注意事項</strong>{{$AttendanceRecord->notes}}<br>
                     </li>
                     @endforeach
                  </ul>
               
                </div>
              
                @elseif($message)
                <p>{{message}}</p>
                @endif

                <!-- 送迎記録　-->
                @if($transportRecords)
                <div class="mb-4">
                  <h3>送迎記録</h3>
                  <ul class="list-group">
                     @foreach($transportRecords as $transportRecord)
                     <li class="list-group-item">
                        <strong>日付</strong>{{$transportRecord->transport_date}}<br>
                        <strong>出発場所</strong>{{$transportRecord->departure_location}}<br>
                        <strong>到着場所</strong>{{$transportRecord->destination}}<br>
                        <strong>添乗員</strong>{{$transportRecord->passenger_name}}<br>
                     </li>
                     @endforeach
                  </ul>
                
                </div>

                @elseif($message)
                <p>{{message}}</p>
                @endif
            </div>
         </div>
      </div>
   </div>
</div>
