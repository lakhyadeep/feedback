<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-center mb-6">Choose a Ward</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @for ($i = 1; $i <= 25; $i++)
            <div class="transform transition-all hover:scale-105 cursor-pointer">
                <a href="{{ route('insights', ['ward' => $i]) }}">
                    <div class="bg-gray-200 p-4 rounded-xl shadow-md text-center hover:bg-gray-300">
                        <h3 class="text-lg font-semibold text-gray-700">{{ 'Ward ' . $i }}</h3>
                    </div>
                </a>
            </div>
        @endfor
    </div>
</div>
