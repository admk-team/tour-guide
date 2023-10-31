<div class="relative overflow-x-auto shadow-md sm:rounded-lg mr-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Avatar</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Username</th>
                <th scope="col" class="px-6 py-3">Active</th>
                <th scope="col" class="px-6 py-3">Online</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tourguides as $tourguide)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{ route($route, $tourguide->id) }}" class="flex flex-col items-center">
                            @if($tourguide->avatar)
                                <img src="{{ asset($tourguide->avatar) }}" alt="Avatar" class="w-10 h-10 rounded-full">
                            @else
                                <img src="{{ asset('images/default_avatar.jpg') }}" alt="Default Avatar" class="w-10 h-10 rounded-full">
                            @endif
                        </a>
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{ route($route, $tourguide->id) }}" class="flex flex-col items-left">{{ $tourguide->full_name }}</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route($route, $tourguide->id) }}" class="flex flex-col items-left">{{ $tourguide->email }}</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route($route, $tourguide->id) }}" class="flex flex-col items-left">{{ $tourguide->username }}</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route($route, $tourguide->id) }}" class="flex flex-col items-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                  @if($tourguide->is_active) bg-green-100 text-green-800 @else bg-danger-100 text-danger-800 @endif">
                                {{ $tourguide->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route($route, $tourguide->id) }}" class="flex flex-col items-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                  @if($tourguide->is_online) bg-green-100 text-green-800 @else bg-danger-100 text-danger-800 @endif">
                                {{ $tourguide->is_online ? 'Online' : 'Offline' }}
                            </span>
                        </a>
                    </td>
                    <td class="px-3 py-3 space-x-1">
                        @if($tourguide->hasSetting('my_profile_added_to_favorites', true)->exists())
                            <a href="{{ route($route, $tourguide->id) }}">
                                <button wire:click="toggleFavorites({{ $tourguide->id }})"
                                    class="text-xs bg-danger-500 hover:bg-danger-600 text-white px-1.5 py-1.5 rounded-full inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 @if(auth('agent')->user()->favourites()->where(['favouritable_id' => $tourguide->id,'favouritable_type' => \App\Models\Tourguide::class])->exists()) fill-current @endif">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </a>
                        @endif
                        @include('filament.pages.agent.aside._chat_modal')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
