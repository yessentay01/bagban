@extends('layouts.main')

@section('content')
    <div class="flex justify-between heading">
        <div>
            <h1 class="title">My Garden</h1>
            <span class="subtitle">(you have {{count($garden)}} plants)</span>
        </div>
        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                class=" addBtn block text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
            +
        </button>

    </div>
    <br>
    @if(session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
             id="message" role="alert">
            <span class="sr-only">Info</span>
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"   id="message"  role="alert">
            <span class="sr-only">Info</span>
            {{ session('success') }}
        </div>
    @endif

    <div class="plants flex  flex-wrap gap-8">
        @foreach($garden as $gd)
            <div class="plant ">
                <div class="plantImage">
                    <img src="{{$gd->plant->images}}" alt="">
                </div>
                <div>
                    <h1 class="plantTitle">{{$gd->plant->name}}</h1>
                    <div class="flex justify-between">
                        <div class="plantInfo">
                            <p>
                                <img src="{{asset('images/humidity.png')}}" width="32" alt="">
                                <span id="Humidity">{{$gd->plant->humidity}}%</span>
                            </p>
                            <span class="plantInfoSpan">Humidity</span>
                        </div>
                        <div class="plantInfo">
                            <p>
                                <img src="{{asset('images/temp.png')}}" width="32" alt="">
                                <span id="temperature">{{$gd->plant->temperature}}°</span>
                            </p>
                            <span class="plantInfoSpan">Temperature</span>
                        </div>
                        <div class="plantInfo">
                            <p>
                                <img src="{{asset('images/hum.png')}}" width="32" alt="">
                                <span id="Soil">{{$gd->plant->soil}}%</span>
                            </p>
                            <span class="plantInfoSpan">Soil</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add plant
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{route('addPlant')}}" method="post">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <label for="plant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            a plant</label>
                        <select id="plant" name="plant_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($plants as $plant)
                                <option value="{{$plant->id}}">{{$plant->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.setTimeout("document.getElementById('message').classList.add('hidden');", 2000);
    </script>
@endsection
