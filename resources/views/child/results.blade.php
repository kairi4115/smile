@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">検索結果</div>
                
                <div class="card-body">
                  
                
                <div class="mb-4">
                    <h3>検索結果</h3>
                    <ul class="list-group">
                        @if($foodRecords)
                        @foreach($foodRecords as $foodRecord)
                        <li class="list-group-item">
                        <h3>食事記録</h3>
                        <strong>児童ID:</strong>{{ $foodRecord->child_id}}<br>   
                        <strong>食事タイプ:</strong>{{ $foodRecord->meal_type}}<br>   
                        <strong>説明:</strong>{{ $foodRecord->meal_description}}<br>   
                        <strong>量:</strong>{{ $foodRecord->meal_amount}}<br> 
                      
                        </li>
                        @endforeach
                    </ul>
                </div>
                @else
                {{message}}
                @endif
                

                    
                 <!-- 排泄記録　-->
                <h3>排泄記録</h3>
                 <ul class="list-group">
                     @if($bowelMovements)
                 @foreach($bowelMovements as $bowelMovement)
                        <li class="list-group-item">
                        <strong>排泄時間:</strong>{{$bowelMovement->time}}<br> 
                        <strong>便の種類:</strong>{{$bowelMovement->type}}<br> 
                        <strong>便の形態:</strong>{{$bowelMovement->stool_type}}<br> 
                        <strong>注意事項:</strong>{{$bowelMovement->notes}}<br>
                        </li>
                     @endforeach

                        </ul>
                   </div>
                
                   @else
                   {{message}}
                  @endif
                <!--出欠記録　-->
                
                 <h3>出欠記録</h3>
                <ul class="list-group">
                    @if($attendanceRecords)
                 @foreach($attendanceRecords as $attendanceRecord)
                    <li class="list-group-item">
                    <strong>出欠:</strong>{{ $attendanceRecord->present}}<br> 
                    <strong>登園時間:</strong>{{ $attendanceRecord->arrival_time}}<br> 
                    <strong>退園時間:</strong>{{ $attendanceRecord->departure_time}}<br> 
                    <strong>出席時の注意事項</strong>{{ $attendanceRecord->notes}}<br>
                     </li>
                 @endforeach
              </ul>
            </div>
            @else
              {{message}}
           @endif

                        <!--送迎記録-->
                
                  <h3>送迎記録</h3>
                    <ul class="list-group">
                    @if($transportRecords)
                       @foreach($transportRecords as $transportRecord)
                       <li class="list-group">
                        <strong>出発場所</strong>{{ $transportRecord->departure_location}}<br> 
                        <strong>到着場所</strong>{{ $transportRecord->destination}}<br> 
                        <strong>添乗員</strong>{{$transportRecord->passenger_name}}<br> 
                        </li>
                        @endforeach
                    </ul>
                </div>
                @else
                {[message]}
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
