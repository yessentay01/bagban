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

        </div>
        <div>
            <br>
            <label class="relative inline-flex items-center mb-4 cursor-pointer">
                <input type="checkbox" id="Light" onchange="switchs(this)" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-300 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-300"></div>
                <span class="ml-3 text-md font-medium text-gray-900 dark:text-gray-300">Light</span>
            </label>
            <br>
            <label class="relative inline-flex items-center mb-4 cursor-pointer">
                <input type="checkbox" id="Watering" onchange="switchs(this)" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-300 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-300"></div>
                <span class="ml-3 text-md font-medium text-gray-900 dark:text-gray-300">Watering</span>
            </label>
            <br>
            <label class="relative inline-flex items-center mb-4 cursor-pointer">
                <input type="checkbox" id="Fan" onchange="switchs(this)" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-300 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-300"></div>
                <span class="ml-3 text-md font-medium text-gray-900 dark:text-gray-300">Fan</span>
            </label>
        </div>
    </div>



    <script>
        var config = {
            apiKey: '{{ env('apiKey') }}',
            authDomain: '{{ env('authDomain') }}',
            databaseURL: '{{ env('databaseURL') }}',
            projectId: '{{ env('projectId') }}',
            storageBucket: '{{ env('storageBucket') }}',
            messagingSenderId: '{{ env('messagingSenderId') }}',
            appId: '{{ env('appId') }}'
        };
        console.log(config)
        firebase.initializeApp(config);

        const database = firebase.database();

        firebase.database().ref().on('value', (snap) => {
            let data = snap.val();
            console.log(data);
            document.getElementById("Humidity").innerHTML = data.Humidity + "%"
            document.getElementById("temperature").innerHTML = data.Temperature + "°"
            document.getElementById("Soil").innerHTML = data.Soil + "%"

            document.getElementById("Fan").checked = data.Fan
            document.getElementById("Watering").checked = data.Watering
            document.getElementById("Light").checked = data.Light

        });
        function switchs(checkboxElem){
            if(checkboxElem.checked) {
                console.log(checkboxElem.id);
                firebase.database().ref(checkboxElem.id).set(true);
            }else{
                console.log(checkboxElem.id);
                firebase.database().ref(checkboxElem.id).set(false);
            }
        }

    </script>
@endsection
