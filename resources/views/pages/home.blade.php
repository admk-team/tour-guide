@php
    $slider        = $page->where('key', 'Slider')->first();
    $about_us      = $page->where('key', 'About Us')->first();
    $our_servicres = $page->where('key', 'Our Services')->first();
    $divider       = $page->where('key', 'Divider')->first();
    $sliders       = [
        'images/tourguide_login_section.jpg'   => 'tourguide',
        'images/training_programs_section.jpg' => 'ourservice',
        'images/agent_login_section.jpg'       => 'agent'
        ];
        
@endphp

@extends('layouts.default')

@section('title', __('frontend.home'))

@section('content')
    {{-- Hero Section --}}
    @include('partials._hero')

    {{-- Guset View Login Section --}}
    @if(!(Auth::check() || Auth::guard('agent')->check() || Auth::guard('tourguide')->check()))
        <div
            class="relative flex items-center justify-center lg:w-[70%] w-[85%] mx-auto lg:-mt-52 -mt-[8rem] lg:-mb-24 -mb-40 gap-4 z-40 md:mx-4 md:w-full"
            id="login">
            <div
                class="flex flex-col justify-center items-center text-center w-full">
                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
                    @foreach($sliders as $image => $sliderName)
                        <div class="overflow-hidden shadow-lg rounded-xl bg-white h-auto">
                            <div class="w-full lg:h-[50%] md:h-[45%] h-[40%]">
                                <img class="w-full h-full object-cover"
                                     src="{{ $slider->contents()->firstWhere('name->' . app()->getLocale(), "slider_$sliderName")->slider ?? asset($image) }}"
                                     alt="{{ $slider->contents()->firstWhere('name->' . app()->getLocale(), "slider_$sliderName")->title }}">
                            </div>
                            <div class="px-8 py-4 lg:h-[50%] md:h-[55%] h-[60%] flex flex-col items-center justify-between gap-2">
                                <h1 class="py-2 text-3xl text-gray-500 font-bold">{{ $slider->contents()->firstWhere('name->' . app()->getLocale(), "slider_$sliderName")->title }}</h1>
                                @if($slider->contents()->firstWhere('name->' . app()->getLocale(), "slider_$sliderName")->content)
                                    <p>{{ $slider->contents()->firstWhere('name->' . app()->getLocale(), "slider_$sliderName")->content }}</p>
                                @endif
                                <a href="{{ $sliderName === 'tourguide' ? route('tour-guide.auth.login') : ($sliderName === 'agent' ? route('agent.auth.login') : '/page/training-programs') }}"
                                   class="bg-gray-500 hover:bg-gray-700 text-white font-normal py-2 px-4 rounded-full mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         class="w-5 h-5 inline-block">
                                        <path fill-rule="evenodd"
                                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    {{ $slider->contents()->firstWhere('name->' . app()->getLocale(), "slider_$sliderName")->button_text }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- About Us Section --}}
    <section class="bg-white pb-36" id="about" style="margin-top: 8rem;">
        <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-20 md:gap-20 gap-28 px-4 mx-auto max-w-screen-xl">
            <div class="flex flex-col justify-center items-center space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="h-full">
                        <img
                            src="{{ $about_us->contents()->latest()->first()->about_us[0] ?? asset('images/abouts-4.jpeg') }}"
                            alt="young-girl-red-dress-visiting-egyptian-temple-nefertari-near-abu-simbel"
                            class="max-w-full h-full object-cover">
                    </div>
                    <div class="grid grid-rows-2 gap-4">
                        <div class="row-span-1">
                            <img
                                src="{{ $about_us->contents()->latest()->first()->about_us[1] ?? asset('images/abouts-1.jpeg') }}"
                                alt="Gallery 2"
                                class="h-full w-full object-cover">
                        </div>
                        <div class="row-span-1">
                            <img
                                src="{{ $about_us->contents()->latest()->first()->about_us[2] ?? asset('images/abouts-2.jpeg') }}"
                                alt="Gallery 3"
                                class="h-full w-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center">
                <h1 class="-mt-20 mb-4 text-xl font-bold tracking-tight leading-none text-gray-500">{{ __('frontend.about_us') }}</h1>
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 md:text-4xl lg:text-5xl">
                    {{ $about_us->contents()->latest()->first()->title }}</h1>
                <p class="mt-4 text-gray-500">{{ $about_us->contents()->latest()->first()->content }}</p>
                <a href="{{ $about_us->contents()->latest()->first()->button_url }}"
                   class="hidden mt-8 bg-gray-500 hover:bg-gray-700 text-white font-bold py-4 px-4 rounded-full text-center lg:w-[calc(100%-22rem)]
                    md:w-[calc(100%-18rem)] w-[calc(100%-10rem)]">
                    {{ $about_us->contents()->latest()->first()->button_text }}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         class="w-5 h-5 inline-block">
                        <path fill-rule="evenodd"
                              d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="bg-gray-100 py-32" id="services">
        <div class="container lg:px-32 md:px-16 px-4 mx-auto">
            <div class="flex flex-col justify-center items-center text-center">
                <h1 class="text-4xl font-bold">{{ $our_servicres->contents()->latest()->first()->title }}</h1>
                <hr class="w-20 mx-auto my-8 h-1 border-gray-800">
                <p class="text-center lg:w-[calc(100%-30rem)] md:w-[calc(100%-20rem)] w-[calc(100%-10rem)]">
                    {{ $our_servicres->contents()->latest()->first()->content }}
                </p>
                <div class="mt-16 grid lg:grid-cols-3 lg:gap-16 md:grid-cols-3 md:gap-12 gap-8 text-center">
                    @if($services)
                        @foreach($services as $service)
                            <div class="flex flex-col justify-center items-center">
                                <div class="rounded-full bg-white w-24 h-24 flex justify-center items-center">
                                    @if($service->image)
                                        <img src="{{ asset($service->image) }}" alt="{{ $service->title }}"
                                             class="object-cover w-full h-full rounded-full">
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5"
                                             stroke="currentColor" class="w-11 h-11 text-sky-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                                        </svg>
                                    @endif
                                </div>
                                <h1 class="text-xl font-bold mt-4">{{ $service->title }}</h1>
                                <p class="text-center mt-4">{{ $service->content }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="flex justify-center items-center w-full">
                    <a href="#"
                       class="hidden mt-16 bg-gray-500 hover:bg-gray-700 text-white font-bold py-4 px-8 rounded-full text-center">{{ __('frontend.read_more') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             class="w-5 h-5 inline-block">
                            <path fill-rule="evenodd"
                                  d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet"/>
    <style>
        .mb-8.font-normal.text-center.text-gray-300.lg\:text-md.sm\:px-16.lg\:px-48 {
            display: none;
        }

        p.text-gray-700.mb-6 {
            opacity: 0;
            margin-bottom: .2rem !important;
            padding-bottom: .2rem !important;
        }

        .relative .py-4.mb-8.lg\:h-\[10rem\].md\:h-\[20rem\].h-\[20rem\] {
            margin-top: .75rem;
        }

        .text-center.mt-4 {
            min-height: 72px;
        }

        .grid .flex.flex-col.justify-center.items-center {
            display: inline-block;
        }

        .rounded-full.bg-white.w-24.h-24.flex.justify-center.items-center {
            margin: 0 auto;
        }

        @media (min-width: 1024px) {
            .max-w-sm.overflow-hidden.shadow-lg.rounded-xl.bg-white {
                height: 24rem;
            }
        }

        @media (min-width: 768px) {
            .max-w-sm.overflow-hidden.shadow-lg.rounded-xl.bg-white {
                height: 24rem;
            }
            
        }
        @media (max-width: 1460px) {
        .md\:mx-4 {
           padding: 4rem !important;
            }
        .md\:w-full {
            width: 100% !important;
           }
         }

        .bg-gray-500.hover\:bg-gray-700.text-white.font-normal.py-2.px-4.rounded-full.w-\[calc\(100\%-4rem\)\] {
            padding-bottom: .75rem;
            line-height: 2.5em;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
    </style>

@endpush


@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.swiper-container', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 20,
                autoplay: {
                    delay: 8000,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1.5,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
            })
        })
    </script>

@endpush
