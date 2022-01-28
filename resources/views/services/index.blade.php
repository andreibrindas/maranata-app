<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You can see all services here
                </div>
            </div>
            @foreach ($services as $service)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                        <div>
                            <p><strong>Dată: </strong>{{ $service->date }}</p>
                            <p><strong>Mixer Video: </strong>{{ $service->video_mixer }}</p>
                            <p><strong>Proiectie: </strong>{{ $service->proiectie }}</p>
                            <p><strong>Camera 1: </strong>{{ $service->camera_1 }}</p>
                            <p><strong>Camera 2: </strong>{{ $service->camera_2 }}</p>
                            <p><strong>Camera 3: </strong>{{ $service->camera_3 }}</p>
                            <p><strong>Sunet: </strong>{{ $service->sunet }}</p>
                        </div>
                        <div>
                            <form action="/services/delete/{{ $service->id }}" method="POST">
                                @csrf
                                @method("delete")
                                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Șterge</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
