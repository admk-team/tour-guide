<div class="lg:col-span-8 col-span-9 h-full w-full">
    @if($selectedGuide)
        <!-- Display chat history between agent and selectedGuide -->
        <div class="p-4 justify-between flex flex-col h-screen bg-white border-l-2 border-gray-200 w-full">
            <!-- Chat history with selectedGuide -->
            @foreach($chatHistoryWithGuide as $message)
                <div class="chat-message">
                    <div class="flex items-start">
                        <img src="{{ $message->sender->memberable?->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(__('attributes.chat.deleted_user')) . '&color=FFFFFF&background=111827' }}"
                            alt="User Avatar" class="my-auto w-6 h-6 rounded-full order-1">
                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                            <div class="flex flex-col items-start">
                                <span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-200 text-gray-600">
                                    {!! $message->body !!}
                                </span>
                                <span class="text-gray-500 text-xs">{{ $message->created_at->format('h:i A') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @elseif($selectedAgent)
        <!-- Display chat history between agent and selectedAgent -->
        <div class="p-4 justify-between flex flex-col h-screen bg-white border-l-2 border-gray-200 w-full">
            <!-- Chat history with selectedAgent -->
            @foreach($chatHistoryWithAgent as $message)
                <div class="chat-message">
                    <div class="flex flex-row items-end justify-end">
                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                            <div class="flex flex-col items-end">
                                <span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-500 text-white text-center">
                                    {!! $message->body !!}
                                </span>
                                <span class="text-gray-500 text-xs">{{ $message->created_at->format('h:i A') }}</span>
                            </div>
                        </div>
                        <img src="{{ $message->sender->memberable?->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(__('attributes.chat.deleted_user')) . '&color=FFFFFF&background=111827' }}"
                            alt="User Avatar" class="my-auto w-6 h-6 rounded-full order-2">
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Display a message when neither agent nor guide is selected -->
        <div class="flex flex-col items-center justify-center h-screen border-l-2 border-gray-200"
             style="padding: 50px">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-700">{{ __('messages.chat.no_selection') }}</h1>
                <p class="text-gray-500">{{ __('messages.chat.select_an_item') }}</p>
            </div>
        </div>
    @endif
</div>
