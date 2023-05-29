@extends('layouts.main')

@section('content')
    <head>

        <script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-analytics.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.12.0/firebase.js"></script>
    </head>
    <div class="flex justify-between heading mb-4">
        <div>
            <h1 class="title">Bagban</h1>
            <span class="subtitle">(you have 1 plant)</span>
        </div>
    </div>
    <div class="plant ">
        <div class="plantImage">
            <img src="{{asset('images/cactus.png')}}" alt="">
        </div>
        <div>
            <h1 class="plantTitle">Cactus</h1>
            <div class="flex justify-between">
                <div class="plantInfo">
                    <p>
                        <img src="{{asset('images/humidity.png')}}" width="32" alt="">
                        <span id="Humidity"></span>
                    </p>
                    <span class="plantInfoSpan">Humidity</span>
                </div>
                <div class="plantInfo">
                    <p>
                        <img src="{{asset('images/temp.png')}}" width="32" alt="">
                        <span id="temperature"></span>
                    </p>
                    <span class="plantInfoSpan">Temperature</span>
                </div>
                <div class="plantInfo">
                    <p>
                        <img src="{{asset('images/hum.png')}}" width="32" alt="">
                        <span id="Soil"></span>
                    </p>
                    <span class="plantInfoSpan">Soil</span>
                </div>
            </div>
            <h3 id="temperature"></h3>
            <h3></h3>
            <h3 id="Soil"></h3>
        </div>
    </div>



    <script>


        firebase.initializeApp(config);

        const database = firebase.database();

        firebase.database().ref().on('value', (snap) => {
            let data = snap.val();
            console.log(data);
            document.getElementById("Humidity").innerHTML = data.Humidity + "%"
            document.getElementById("temperature").innerHTML =  data.Temperature + "°"
            document.getElementById("Soil").innerHTML =  data.Soil + "%"

            // document.getElementById("fan").checked = data.fan
            // document.getElementById("watering").checked = data.watering
            // document.getElementById("light").checked = data.light

        });
    </script>
@endsection
