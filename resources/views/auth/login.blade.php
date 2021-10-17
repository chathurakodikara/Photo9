<x-guest-layout>

    <div class="flex h-screen">
        <div class="m-auto">
            <x-jet-validation-errors class="mb-4" />
            
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            <h3 class=" text-5xl  text-center font-bold text-indigo-600">Photo9</h3>
            <p class=" text-center mb-6">The best 9 photos from your facebook</p>
            <a class="max-w-lg px-4 py-2 flex gap-2 items-center bg-gray-800 shadow-md hover:bg-gray-700 transition text-white rounded-md"
                href="{{ route('facebook.login') }}">
                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" class=" w-8 h-8" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z">
                    </path>
                </svg>
                Log in with Facebook</a>
        </div>
    </div>

    <div class="  flex items-center max-h-screen justify-center content-center">
        
        
        
        
    </div>


    
</x-guest-layout>
