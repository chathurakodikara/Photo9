<div
    class=" flex gap-2 items-start bg-gray-50  shadow-sm hover:shadow transition-shadow rounded overflow-hidden h-36 p-2">
    <img class="object-cover h-full w-32 rounded" src="{!! $image['picture'] !!}" alt="">
    <div class=" flex-1 p-3 relative h-full overflow-hidden">
        {{ $image['name'] ?? '' }}
        <div class=" absolute bottom-5 whitespace-nowrap text-sm text-gray-500">
            {{ $image['created_time'] }}</div>


        <div class="absolute bottom-2 right-2 w-8 h-8">
            {{-- session is updating the icon to show client item is already in the collection --}}
            @if ($image['status'] || session()->has('success-'.$image['id']))
            <span class="text-green-600"><x-icon.check-circle  /></span>
            @else
            <button class=" text-indigo-600  hover:text-indigo-700 "
                wire:click.prevent="addImageToCollection('{{ $image['id'] }}')">
                <x-icon.add />
            </button>
            @endif
        </div>
    </div>
</div>