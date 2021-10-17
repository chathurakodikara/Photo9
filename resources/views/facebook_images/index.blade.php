<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex gap-x-4 items-center">
            <span>Your Facebook Photos</span>
            <x-flash-msg class=" text-center text-sm" type="error" key="error" />
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-image-grid>
                @foreach ($images as $image)
               
                <livewire:facebook-photo-card :image="$image">
                @endforeach
            </x-image-grid>
        </div>
    </div>
</x-app-layout>