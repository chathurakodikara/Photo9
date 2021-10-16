<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your Facebook Photos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <x-flash-msg type="error" key="error" />

            <x-image-grid>
                @foreach ($images as $image)
                <livewire:photo-card :image="$image">
                @endforeach
            </x-image-grid>
        </div>
    </div>
</x-app-layout>