<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Photo Collection
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-flash-msg type="error" key="error" />
            <x-image-grid>
                @foreach ($photos as $photo)
                <livewire:my-photo-card :photo="$photo">
                @endforeach
            </x-image-grid>
        </div>
    </div>
</x-app-layout>