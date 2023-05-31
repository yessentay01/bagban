@extends('layouts.main')

@section('content')
    <div class="flex justify-between heading">
        <div>
            <h1 class="title">Plants</h1>
        </div>
    </div>
    <div class="plants flex flex-wrap gap-8">
        @foreach($plants as $plant)
            <div class="plant ">
                <div class="plantImage">
                    <img src="{{$plant->images}}" alt="">
                </div>
                <div>
                    <h1 class="plantTitle">{{$plant->name}}</h1>
                    <div class="flex justify-between">
                        <div class="plantInfo">
                            <p>
                                <img src="{{asset('images/humidity.png')}}" width="32" alt="">
                                <span id="Humidity">{{$plant->humidity}}%</span>
                            </p>
                            <span class="plantInfoSpan">Humidity</span>
                        </div>
                        <div class="plantInfo">
                            <p>
                                <img src="{{asset('images/temp.png')}}" width="32" alt="">
                                <span id="temperature">{{$plant->temperature}}°</span>
                            </p>
                            <span class="plantInfoSpan">Temperature</span>
                        </div>
                        <div class="plantInfo">
                            <p>
                                <img src="{{asset('images/hum.png')}}" width="32" alt="">
                                <span id="Soil">{{$plant->soil}}%</span>
                            </p>
                            <span class="plantInfoSpan">Soil</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
