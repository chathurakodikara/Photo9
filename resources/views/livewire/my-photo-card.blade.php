<div

    class=" flex gap-2 items-start bg-gray-50  shadow-sm hover:shadow transition-shadow rounded overflow-hidden h-36 p-2">
    <img class="object-cover h-full w-32 rounded" src="{!! $photo->path!!}" alt="">
    <div class=" flex-1 p-3 relative h-full overflow-hidden">
        <div class=" whitespace-nowrap text-sm text-gray-500 mb-2">
            Added <span>{{ $photo->created_at_formated }}</span></div>
        {{ $photo->description ?? '' }}

        <div class="absolute bottom-2 right-2 w-6 h-6">
            <button class=" text-gray-300  hover:text-red-700 transition "
                onclick="return confirm('Are you sure you want to delete ?')"
                wire:click.prevent="deleteFromTheCollection('{{ $photo->id }}')">
                <x-icon.trash />
            </button>
        </div>
    </div>
</div>