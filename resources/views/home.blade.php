@extends('app.document')
@section('title', "فروشگاه شهرپشم")
@section('content')
    <style>
        .groupMainBtn:hover svg{
            animation: go 2s infinite ease-in-out;
        }
        @keyframes go {
            0%{
                transform: translateX(0);
            }50%{
                transform: translateX(-6px);
            }100%{
                transform: translateX(0);
            }
        }
    </style>
    @session('clearStorage')
        <script>
            localStorage.clear();
        </script>
    @endsession
    <main class="w-full flex flex-col gap-15">
        <section id="hiro" class="relative">
            <div class="">
                <img class="max-sm:h-70 object-cover" src="{{ asset('storage/'.$setting['heroBanner']) }}" alt="">
               
            </div>
            <div class="absolute flex flex-col gap-4 lg:gap-10 bottom-10 lg:bottom-13 lg:top-15 right-10 lg:right-35">
                @php
                    $titleParts = explode('|', $setting['heroTitle']);
                @endphp
                <div class="flex flex-col gap-5">
                    @foreach($titleParts as $part)
                        <span class="font-bold text-2xl lg:text-7xl text-[#1E3F34]">
                                {{ trim($part) }}
                        </span>
                    @endforeach
                </div>
                @php
                    $subTitleParts = explode('|', $setting['heroSubtitle']);
                @endphp
                <div class="flex flex-col gap-1">
                    @foreach($subTitleParts as $part)
                        <span class="text-[#1E3F34] font-medium text-md lg:text-xl">
                            {{ trim($part) }}
                        </span>
                    @endforeach
                </div>

                {{-- دکمه --}}
                <div class="w-4/12 lg:w-5/12 p-1 lg:p-3 bg-[#1E3F34] flex justify-center items-center rounded-3xl gap-1 cursor-pointer groupMainBtn">
                    <span class="text-[10px] lg:text-lg text-white text-nowrap">{{ $setting['heroPrimaryButton'] }}</span>
                    <svg class="max-sm:w-[15px] transition-all duration-300" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                         viewBox="0 0 24 24" fill="none" stroke="#ffff" stroke-width="1.5" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M19 12H5M12 19l-7-7 7-7"></path>
                    </svg>
                </div>

            </div>
        </section>
        <section id="category" class="w-full flex flex-col justify-center items-center gap-9">
            <div class="w-11/12 flex justify-center lg:justify-start items-center gap-3">
                <span class="w-10 h-[2px] lg:w-15 lg:h-[3px] bg-[#1E3F34]"></span>
                <span class="font-bold text-md lg:text-2xl text-[#1E3F34]">دسته بندی محصولات</span>
                <span class="lg:hidden w-10 h-[2px] bg-[#1E3F34]"></span>
            </div>
            <div class="w-11/12 grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-8">
                @foreach ($categories as $cat)
                    @if ($cat->title != "بدون دسته بندی")
                        <div class="w-full rounded-2xl relative flex justify-center items-center">
                            <img class="block  rounded-2xl" src="{{ asset('storage/'.$cat->image) }}" alt="">
                            <img class="rounded-2xl lg:hidden" src="./assest/img/category01-sm.png" alt="">
                            <div class="absolute top-1/4 right-0 lg:top-7 lg:right-2 flex flex-col gap-3">
                                <div class="flex flex-col gap-5 lg:gap-5 p-3">
                                    <span class="font-bold text-[#1E3F34] lg:text-2xl"> {{ $cat->title }} </span>
                                    <span class="text-sm lg:text-md text-[#1E3F34]/70 text-center lg:text-start font-bold"> {{ $cat->description }} </span>
                                </div>
                                    <button class=" hidden lg:flex size-8 rounded-full bg-[#1E3F34] flex justify-center items-center mr-2">
                                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="22"
                                             height="22" viewBox="0 0 24 24" fill="none" stroke="#ffff"
                                             stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M19 12H5M12 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
        <section id="خدمات" class="w-full">
            <div class="w-11/12 mx-auto gap-2.5 lg:gap-5 rounded-2xl grid grid-cols-1 md:grid-cols-4 py-5">
                <div class="w-full flex justify-center items-center px-8 lg:gap-3 lg:border-l bg-[#1E3F34]/10 rounded-xl border-[#1E3F34]/30 py-2">
                    <div class="w-1/4">
                        <img class="size-15" src="{{ asset('storage/'.$setting['serviceImage1']) }}" alt="">
                    </div>
                    <div class="w-3/4 flex flex-col gap-1 justify-center items-center">
                        <span class="font-bold text-xl text-[#1E3F34]">{{ $setting['serviceTitle1'] }} </span>
                        <span class="text-[#1E3F34] font-medium text-sm"> {{ $setting['serviceSubTitle1'] }} </span>
                    </div>
                </div>
                <div class="w-full flex justify-center items-center px-8 lg:gap-3 lg:border-l bg-[#1E3F34]/10 rounded-xl border-[#1E3F34]/30 py-2">
                    <div class="w-1/4">
                        <img class="size-15" src="{{ asset('storage/'.$setting['serviceImage2']) }}" alt="">
                    </div>
                    <div class="w-3/4 flex flex-col gap-1 justify-center items-center">
                        <span class="font-bold text-xl text-[#1E3F34]">{{ $setting['serviceTitle2'] }} </span>
                        <span class="text-[#1E3F34] font-medium text-sm"> {{ $setting['serviceSubTitle2'] }} </span>
                    </div>
                </div>
                <div class="w-full flex justify-center items-center px-8 lg:gap-3 lg:border-l bg-[#1E3F34]/10 rounded-xl border-[#1E3F34]/30 py-2">
                    <div class="w-1/4">
                        <img class="size-15" src="{{ asset('storage/'.$setting['serviceImage3']) }}" alt="">
                    </div>
                    <div class="w-3/4 flex flex-col gap-1 justify-center items-center">
                        <span class="font-bold text-xl text-[#1E3F34]">{{ $setting['serviceTitle3'] }} </span>
                        <span class="text-[#1E3F34] font-medium text-sm"> {{ $setting['serviceSubTitle3'] }} </span>
                    </div>
                </div>
                <div class="w-full flex justify-center items-center px-8 lg:gap-3 lg:border-l bg-[#1E3F34]/10 rounded-xl border-[#1E3F34]/30 py-2">
                    <div class="w-1/4">
                        <img class="size-15" src="{{ asset('storage/'.$setting['serviceImage4']) }}" alt="">
                    </div>
                    <div class="w-3/4 flex flex-col gap-1 justify-center items-center">
                        <span class="font-bold text-xl text-[#1E3F34]">{{ $setting['serviceTitle4'] }}</span>
                        <span class="text-[#1E3F34] font-medium text-sm"> {{ $setting['serviceSubTitle4'] }} </span>
                    </div>
                </div>

            </div>
        </section>
        <section id="about" class="w-full flex flex-col justify-center items-center relative">
            <div class="w-11/12">
                <img class="h-90 w-full rounded-2xl object-cover" src="{{ asset('storage/'.$setting['secondBanner']) }}" alt="">
            </div>
            <div class="w-11/12 absolute lg:justify-center items-center flex">
                <div class="flex flex-col gap-4 lg:gap-3 p-3 w-4/12">
                    <div class="flex justify-start items-center gap-1 lg:gap-5">
                        <span class="w-10 h-[2px] bg-[#1E3F34]"></span>
                        <span class="text-[#1E3F34] lg:text-2xl text-nowrap font-semibold">درباره ما</span>
                    </div>
                    <h3 class="text-[#1E3F34] text-lg lg:text-3xl font-bold">{{ $setting['secondBannerTitle'] }} </h3>
                    <p class="whitespace-pre-line leading-8 font-medium text-sm lg:text-lg">
                        {{ $setting['secondBannerSubtitle'] }}
                    </p>
                    <div class="text-nowrap w-32 max-sm:text-sm rounded-3xl flex gap-2 border border[#1E3F34] justify-center items-center py-1 lg:py-2 lg:mt-3">
                        <button>{{ $setting['secondBannerButton'] }}</button>
                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                             viewBox="0 0 24 24" fill="none" stroke="#1E3F34" stroke-width="1.5"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 12H5M12 19l-7-7 7-7"></path>
                        </svg>
                    </div>
                </div>
                <div class="w-4/12 "></div>
            </div>
        </section>
        <section id="محبوب ترین محصولات" class="w-full flex flex-col justify-center gap-8 items-center">
            <div class="w-11/12 flex gap-1 justify-start items-center">
                <span class="w-12 h-[3px] bg-[#1E3F34]"></span>
                <span class="text-[#1E3F34] font-bold text-2xl">محبوب ترین محصولات</span>
            </div>
            <div class="w-11/12  grid grid-cols-2 md:grid-cols-5 gap-3">
                @foreach ($products as $product)
                    <div class="w-full flex flex-col rounded-2xl border border-[#1E3F34]/20 products" data-product-id="{{ $product->id }}">
                        <a href="{{ route('product.show', [$product->id]) }}" class="w-full h-40">
                            <img class="object-cover w-full h-40 rounded-t-2xl" src="{{ asset('storage/'.$product->image) }}" alt="">
                        </a>
                        <div class="flex flex-col gap-3 p-3">
                            <a href="{{ route('product.show', [$product->id]) }}" class="text-[#1E3F34] font-bold text-xl h-8 max-h-8 overflow-hidden ellipsis-2"> {{ $product->title }} </a>
{{--                            <div class="flex items-center gap-1">--}}
{{--                                <span class="text-yellow-400 text-xl">★</span>--}}
{{--                                <span class="text-yellow-400 text-xl">★</span>--}}
{{--                                <span class="text-yellow-400 text-xl">★</span>--}}
{{--                                <span class="text-yellow-400 text-xl">★</span>--}}
{{--                                <span class="text-gray-300 text-xl">★</span>--}}
{{--                            </div>--}}
                            @if($product->secondary_price)
                                <div class="flex flex-row gap-3">
                                    <span class="text-[#1E3F34] font-bold in-fa">{{ $product->secondary_price }}تومان</span>
                                    <span class="text-[#1E3F34]/80 line-through in-fa">{{ $product->secondary_price }}تومان</span>
                                </div>
                            @else
                                <span class="text-[#1E3F34] font-bold in-fa">{{ $product->primary_price }}تومان</span>
                            @endif
                            {{--                                <button onclick="addToCart(this)" class="w-full p-2 bg-[#1E3F34] rounded-2xl text-white">افزودن به سبد خرید--}}
                            {{--                                </button>--}}
                            <div class="w-full h-12 addToCartBtns" data-product-id="{{ $product->id }}">

                                <button onclick="addToCart(this)" class="w-full px-4 h-full bg-(--light-green-btn) flex gap-2 justify-center items-center rounded-xl transition-all duration-300 hover:bg-(--green-btn) cursor-pointer group">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                             class="lg:size-4 size-3 transition-all duration-300 group-hover:fill-white fill-(--primary-text-color)">
                                            <path
                                                    d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="lg:text-sm text-[10px] text-(--primary-text-color) transition-all duration-300 group-hover:text-white font-bold">افزودن به سبد خرید</span>
                                </button>
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </section>
        </br>
        </br>
    </main>
@endsection