<div class="lg:col-span-3 col-span-2 h-full w-full">
    @if(!$selectedAgent && !$selectedGuide)
        <!-- Agents List -->
        <h3 class="text-lg font-semibold text-gray-700 px-4 py-2">Agents</h3>
        @foreach($agents as $agent)
            <div class="px-4 py-2 cursor-pointer" wire:click="selectAgent({{ $agent->id }})">
                <div class="relative flex items-center space-x-4 ml-5">
                    <div class="relative">
                        <img src="{{ $agent->avatar }}" alt="{{ $agent->full_name }}"
                            class="w-10 lg:w-11 h-10 lg:h-11 rounded-full">
                    </div>
                    <div class="lg:flex flex-col leading-tight hidden">
                        <div class="text-lg mt-1 flex items-center">
                            <span class="text-gray-700 mr-3">{{ $agent->full_name }}</span>
                        </div>
                        <div class="text-sm text-gray-600">
                            <span class="mr-3">{{ $agent->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @elseif($selectedAgent && !$selectedGuide)
        <!-- Tour Guides List -->
        <h3 class="text-lg font-semibold text-gray-700 px-4 py-2">
            <button class="text-blue-600 underline" wire:click="backToAgents()">Back</button>
            Tour Guides
        </h3>
        @foreach($guidesForSelectedAgent as $guide)
            <div class="px-4 py-2 cursor-pointer" wire:click="selectGuide({{ $guide->id }})">
                <div class="relative flex items-center space-x-4 ml-5">
                    <div class="relative">
                        <img src="{{ $guide->avatar }}" alt="{{ $guide->full_name }}"
                            class="w-10 lg:w-11 h-10 lg:h-11 rounded-full">
                    </div>
                    <div class="lg:flex flex-col leading-tight hidden">
                        <div class="text-lg mt-1 flex items-center">
                            <span class="text-gray-700 mr-3">{{ $guide->full_name }}</span>
                        </div>
                        <div class="text-sm text-gray-600">
                            <span class="mr-3">{{ $guide->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
