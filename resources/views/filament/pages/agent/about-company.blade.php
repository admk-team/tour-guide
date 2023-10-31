<x-filament::page xmlns:x-filament="http://www.w3.org/1999/html">
    <section class="bg-white dark:bg-gray-800 koo">
        <div class="relative">
            <div class="h-80 bg-cover bg-center" style="background-image: url('{{ $record->cover }}')"></div>
            <div
                class="absolute h-full flex justify-between items-center px-4 lg:top-28 lg:left-5 lg:right-3 md:top-20 md:left-3 md:right-2 top-2 left-2 right-1">
                <div class="flex items-center">
                    <img
                        class="border-4 border-white shadow object-cover object-center lg:h-55 lg:w-55 md:h-40 md:w-40 h-32 w-32"
                        src="{{ $record->logo }}" alt="Profile Photo">
                    <div class="ml-4">
                        <h1 class="text-2xl font-normal text-white">{{ $record->name }}</h1>
                        <p class="text-gray-300 tex-md">{{ $record->email }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <x-filament::button
                        class="text-white py-2 px-4 mr-4"
                        @class(['hidden' => ! auth('agent')->user()->hasPermissionTo('Create Bookings')])
                        style="background-color: #3B86FF !important; border-radius: 9999px !important;"
                        wire:click="redirectToRoute('agent.resources.bookings.create')"
                        wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             class="w-5 h-5 inline">
                            <path
                                d="M5.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H6a.75.75 0 01-.75-.75V12zM6 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H6zM7.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H8a.75.75 0 01-.75-.75V12zM8 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H8zM9.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V10zM10 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H10zM9.25 14a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V14zM12 9.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V10a.75.75 0 00-.75-.75H12zM11.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H12a.75.75 0 01-.75-.75V12zM12 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H12zM13.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H14a.75.75 0 01-.75-.75V10zM14 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H14z"/>
                            <path fill-rule="evenodd"
                                  d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                  clip-rule="evenodd"/>
                        </svg>
                        CREATE BOOKING
                    </x-filament::button>
                    <x-filament::button
                        class="text-white py-2 px-4"
                        @class(['hidden' => ! auth('agent')->user()->hasPermissionTo('Edit Company Profile')])
                        style="border: 2px solid white; border-radius: 9999px; background-color: transparent;"
                        wire:click="redirectToRoute('agent.resources.my-company.edit')"
                        wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             class="w-5 h-5 inline">
                            <path
                                d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z"/>
                        </svg>
                        {{ strtoupper(__('attributes.edit-company-profile')) }}
                    </x-filament::button>
                </div>
            </div>
        </div>
        <div class="mt-6 mb-4 border-b border-gray-200 dark:border-gray-700 px-8">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg text-primary-500 border-primary-500"
                            id="describtion-tab" data-tabs-target="#about" type="button" role="tab"
                            aria-controls="about" aria-selected="false">{{ __('attributes.about_company')}}
                    </button>
                </li>
            </ul>
        </div>
        <div id="myTabContent" class="px-8">
            <div class="p-4 rounded-lg" id="about" role="tabpanel" aria-labelledby="about-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $record->description }}</p>
                <section class="my-5">
                    <h3 class="text-lg font-medium text-gray-500 border-b border-gray-200">{{ __('attributes.specialties') }}</h3>
                    <p class="mt-3 max-w-full text-sm text-gray-500">{{ $record->specialties }}</p>
                </section>
                <section class="my-5">
                    <h3 class="text-lg font-medium text-gray-500 border-b border-gray-200">{{ __('attributes.contact') }}</h3>
                    <div class="grid lg:grid-cols-2 gap-4 mt-3 grid-cols-1">
                        <div class="col-span-1 flex flex-row space-x-20">
                            <label for="phone" class="inline text-sm font-medium text-gray-700">{{ __('attributes.phone.title') }}:</label>
                            <p class="text-sm text-blue-400">{{ $record->phone }}</p>
                        </div>
                        <div class="col-span-1 flex flex-row space-x-20">
                            <label for="email" class="inline text-sm font-medium text-gray-700">{{ __('attributes.email') }}:</label>
                            <p class="text-sm text-sky-400">{{ $record->email }}</p>
                        </div>
                        <div class="col-span-1 flex flex-row space-x-14">
                            <label for="website" class="inline text-sm font-medium text-gray-700">{{ __('attributes.website') }}:</label>
                            <p class="text-sm text-gray-500">{{ $record->website }}</p>
                        </div>
                        <div class="col-span-1 flex flex-row space-x-14">
                            <label for="address" class="inline text-sm font-medium text-gray-700">{{ __('attributes.address') }}:</label>
                            <p class="text-sm text-gray-500">{{ $record->address }}</p>
                        </div>
                                                <div class="col-span-1 flex flex-row space-x-14">
                            <label for="address" class="inline text-sm font-medium text-gray-700">Follow us:</label>
                            <!--<span class="mt-1 text-sm text-gray-500">{{ $record->facebook }}</span>-->
                            <!--<span class="mt-1 text-sm text-gray-500">{{ $record->twitter }}</span>-->
                            <!--<span class="mt-1 text-sm text-gray-500">{{ $record->instagram }}</span>-->
                            <!--<span class="mt-1 text-sm text-gray-500">{{ $record->linkedin }}</span>-->
                                @if (!empty($record->facebook))

                        <a href="{{ $record->facebook }}" target="_blank" class="text-gray-500 hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/>
                        </svg>
                        </a>
                        @endif
                            @if (!empty($record->twitter))
                            <a href="{{ $record->twitter }}" target="_blank" class="text-gray-500 hover:text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23Z"/>
                            </svg>
                        </a>
                        @endif
                            @if (!empty($record->instagram))
                            <a href="{{ $record->instagram }}" target="_blank" class="text-gray-500 hover:text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M13.028 2.001a78.82 78.82 0 0 1 2.189.022l.194.007c.224.008.445.018.712.03c1.064.05 1.79.218 2.427.465c.66.254 1.216.598 1.772 1.154a4.908 4.908 0 0 1 1.153 1.771c.247.637.415 1.364.465 2.428c.012.266.022.488.03.712l.006.194a79 79 0 0 1 .023 2.188l.001.746v1.31a78.836 78.836 0 0 1-.023 2.189l-.006.194c-.008.224-.018.445-.03.712c-.05 1.064-.22 1.79-.466 2.427a4.884 4.884 0 0 1-1.153 1.772a4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.427.465c-.267.012-.488.022-.712.03l-.194.006a79 79 0 0 1-2.189.023l-.746.001h-1.309a78.836 78.836 0 0 1-2.189-.023l-.194-.006a60.64 60.64 0 0 1-.712-.03c-1.064-.05-1.79-.22-2.428-.466a4.89 4.89 0 0 1-1.771-1.153a4.904 4.904 0 0 1-1.154-1.772c-.247-.637-.415-1.363-.465-2.427a74.367 74.367 0 0 1-.03-.712l-.005-.194A79.053 79.053 0 0 1 2 13.028v-2.056a78.82 78.82 0 0 1 .022-2.188l.007-.194c.008-.224.018-.446.03-.712c.05-1.065.218-1.79.465-2.428A4.88 4.88 0 0 1 3.68 3.68a4.897 4.897 0 0 1 1.77-1.155c.638-.247 1.363-.415 2.428-.465l.712-.03l.194-.005A79.053 79.053 0 0 1 10.972 2h2.056Zm-1.028 5A5 5 0 1 0 12 17a5 5 0 0 0 0-10Zm0 2A3 3 0 1 1 12.001 15a3 3 0 0 1 0-6Zm5.25-3.5a1.25 1.25 0 0 0 0 2.498a1.25 1.25 0 0 0 0-2.5Z"/>
                            </svg>
                        </a>
                        @endif
                            @if (!empty($record->linkedin))
                            <a href="{{ $record->linkedin }}" target="_blank" class="text-gray-500 hover:text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77Z"/>
                            </svg>
                        </a>

                        @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</x-filament::page>
