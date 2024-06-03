<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sigt') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold mb-6">Tutorials</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($tutorials as $tutorial)
                <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                    <img src="{{ asset('storage/' . $tutorial->image) }}" alt="{{ $tutorial->title }}" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-2 text-white">{{ $tutorial->title }}</h2>
                        <ul>
                            @foreach($tutorial->steps as $step)
                                <li class="mb-2 text-gray-200">{{ $step->step_number }}. {{ $step->description }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
