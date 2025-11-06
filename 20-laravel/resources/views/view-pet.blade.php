<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pet</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-400 p-10 min-h-[100dvh]">
    <h1 class="text-white text-center text-4xl pb-4 border-b-2">Pet Details</h1>
    <div class="flex justify-start mt-6 mb-4">
            <a href="{{ url('view/pets') }}" 
               class="text-white bg-gray-700 rounded-full flex items-center gap-2 py-2 px-5 hover:scale-105 hover:bg-gray-600 transition-all duration-300 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#ffffff" viewBox="0 0 256 256">
                    <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"/>
                </svg>
                <span class="font-medium">Back to List</span>
            </a>
        </div>
    <section class="p-10 gap-4 flex flex-wrap justify-center">
        <div class="card lg:card-side bg-base-100 shadow-xl rounded-2xl overflow-hidden max-w-5xl">
                        <figure class="lg:w-1/2 bg-gray-100 flex items-center justify-center">
                <img
                    src="{{ asset('images/' . $pet->image) }}"
                    alt="{{ $pet->name }}"
                    class="object-cover w-full h-full max-h-[450px]" />
            </figure>
            <div class="card-body lg:w-1/2 flex flex-col justify-between p-8">
                <div>
                    <h2 class="card-title text-3xl font-semibold text-gray-800 mb-3">{{$pet->name}}</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">{{$pet->description}}</p>
                    <ul class="list-group list-group-compact w-full rounded-box space-y-3">
                        <li class="list-row flex justify-between items-center bg-gray-100 p-2 rounded-md">
                            <span class="font-semibold text-gray-700">Status:</span>
                            @if($pet->active == '0')
                                <div class="badge badge-error">Unavailable</div>    
                            @else
                                <div class="badge badge-success">Available</div>
                            @endif
                        </li>

                        @if($pet->kind == 'Dog')
                        <li class="list-row flex justify-between items-center bg-gray-100 p-2 rounded-md">
                            <span class="font-semibold text-gray-700">Kind:</span>
                            <div class="badge badge-primary">Dog</div>
                        </li>
                        @elseif($pet->kind == 'Cat')
                        <li class="list-row flex justify-between items-center bg-gray-100 p-2 rounded-md">
                            <span class="font-semibold text-gray-700">Kind:</span>
                            <div class="badge badge-success">Cat</div>
                        </li>
                        @elseif($pet->kind == 'Pig')
                        <li class="list-row flex justify-between items-center bg-gray-100 p-2 rounded-md">
                            <span class="font-semibold text-gray-700">Kind:</span>
                            <div class="badge badge-secondary">Pig</div>
                        </li>
                        @elseif($pet->kind == 'Sparrow')
                        <li class="list-row flex justify-between items-center bg-gray-100 p-2 rounded-md">
                            <span class="font-semibold text-gray-700">Kind:</span>
                            <div class="badge badge-warning">Sparrow</div>
                        </li>
                        @elseif($pet->kind == 'Rabbit')
                        <li class="list-row flex justify-between items-center bg-gray-100 p-2 rounded-md">
                            <span class="font-semibold text-gray-700">Kind:</span>
                            <div class="badge badge-info">Rabbit</div>
                        </li>
                        @elseif($pet->kind == 'Bird')
                        <li class="list-row flex justify-between items-center bg-gray-100 p-2 rounded-md">
                            <span class="font-semibold text-gray-700">Kind:</span>
                            <div class="badge badge-error">Bird</div>
                        </li>
                        @endif

                        <li class="list-row flex justify-between items-center bg-gray-100 p-2 rounded-md">
                            <span class="font-semibold text-gray-700">Age:</span>
                            <span>{{$pet->age}} years</span>
                        </li>

                        <li class="list-row flex justify-between items-center bg-gray-100 p-2 rounded-md">
                            <span class="font-semibold text-gray-700">Breed:</span>
                            <span>{{$pet->breed}}</span>
                        </li>

                        <li class="list-row flex justify-between items-center bg-gray-100 p-2 rounded-md">
                            <span class="font-semibold text-gray-700">Weight:</span>
                            <span>{{$pet->weight}} kg</span>
                        </li>

                        <li class="list-row flex justify-between items-center bg-gray-100 p-2 rounded-md">
                            <span class="font-semibold text-gray-700">Location:</span>
                            <span>{{$pet->location}}</span>
                        </li>
                    </ul>
                </div>
                <div class="card-actions justify-end pt-6">
                    <button class="btn btn-primary btn-wide hover:scale-105 transition-all duration-300">
                         Adopt {{$pet->name}}
                    </button>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
