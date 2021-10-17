<x-guest-layout>

    <div class="flex h-screen">
        <div class="m-auto">

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            @if (session('error'))
            <div class="mb-4 font-medium text-sm text-red-600">
                {{ session('error') }}
            </div>
            @endif
            <h3 class=" text-5xl  text-center font-bold text-indigo-600">Photo9</h3>
            <p class=" text-center mb-6">The best 9 photos from your facebook</p>
            <x-facebook-login />
        </div>
    </div>

    <div class="  flex items-center max-h-screen justify-center content-center">
        
        
        
        
    </div>


    
</x-guest-layout>
