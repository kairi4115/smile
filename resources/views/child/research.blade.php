@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">児童情報検索</div>
                <div class="card-body">
                    <div class="search-form">
                        <form action="{{ route('child.results') }}" method="GET">
                            <div class="form-group">
                                <label for="name">児童名検索</label>
                                <input type="text" id="name" name="name">
 
                                <label for="date">日付</label>
                                <input type="date" id="date" name="date" value="日付">
                                <br>

                                <label for="meal_type">食事種類:</label>
                                <label for="meal_type_day">昼</label>
                                <input type="checkbox" id="food_type_day" name="meal_type[]" value="昼">

                                <label for="meal_type_night">夜</label>
                                <input type="checkbox" id="food_type_night" name="meal_type[]" value="夜">
                                <br>

                                <label for="bowelMovment_type">便の種類:</label>
                                <label for="bowelMovement_type_soft">柔らかい</label>
                                <input type="checkbox" name="type[]" id="bowelMovement_type_soft" value="柔らかい">

                                <label for="bowelMovement_type_hard">硬い</label>
                                <input type="checkbox" name="type[]" id="bowelMovement_type_hard" value="硬い">
                                <br>

                                <label for="bowelMovement_stool_type">便の状態:</label>
                                <br>

                                <label for="stool_type_soft">水容便</label>
                                <input type="checkbox" name="stool_type_soft" id="stool_type_soft" value="水容便">　　　　　　　　　　　　　　　　
                            　　<label for="stool_type_hard">硬い</label>
                               <input type="checkbox" name="stool_type_hard"  id="stool_type_hard" value="硬い">
                               <br>

                               <label for="present">登園状況:</label>

                               <select name="present" id="present" >
                               <option value="出席">出席</option>
                               <option value="欠席">欠席</option>
                               </select>

                              
                               <label for="departure_location">出発場所</label>
                               <input type="text" name="departure_location" id="departure_location">

                               <label for="destination">到着場所</label>
                               <input type="text" name="destination" id="destination">

                               <label for="passenger_name">乗車職員名</label>
                               <input type="text" name="passenger_name" id="passenger_name">

                                <button type="submit" class="btn btn-primary">検索</button> <!-- 検索ボタンを追加 -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection