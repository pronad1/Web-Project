@vite(['resources/css/app.css','resources/js/app.js'])
<div class="p-4 bg-white/10 rounded-xl flex flex-col text-center">

            <div class="self-start text-sm">Laracasts</div>

            <div class="py-8 font-bold">
                <h3>Laravel Developer</h3>
                <p>Full Time - From $60,000</p>
            </div>

            <div class="flex justify-between items-center mt-auto">
                <div>
                    <x-tag>Tag</x-tag>
                    <x-tag>Tag</x-tag>
                    <x-tag>Tag</x-tag>
                </div>

                {{-- <img src="{{ asset('images/Plogo.svg') }}" alt="Logo" class="w-8 h-6"> --}}

                <img src="{{ Vite::asset('resources/images/Plogo.svg') }}" alt="Logo" class="w-8 h-6">
            </div>

        </div>