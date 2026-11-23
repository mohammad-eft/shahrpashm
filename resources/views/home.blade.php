
@extends('app.document')

@section('title', 'فروشگاه شهرپشم')

@section('content')

<main class="w-full overflow-x-clip text-[#263C32]">

    {{-- HERO --}}
    <section id="hiro" class="relative isolate min-h-[390px] sm:min-h-[460px] lg:min-h-[540px] w-full overflow-hidden bg-[#F5F0E6]">

        <img
            src="{{ asset('storage/'.$setting['heroBanner']) }}"
            alt="محصولات پشمی شهرپشم"
            class="absolute inset-0 w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-gradient-to-t sm:bg-gradient-to-l from-[#F5F0E6]/95 via-[#F5F0E6]/75 to-transparent"></div>

        <div class="relative z-10 flex min-h-[350px] sm:min-h-[460px] lg:min-h-[540px] items-end sm:items-center px-[5%] py-8 sm:py-12">

            <div class="flex w-full sm:w-3/5 lg:w-[45%] flex-col items-start gap-4 sm:gap-6">

                @php
                    $titleParts = explode('|', $setting['heroTitle']);
                    $subTitleParts = explode('|', $setting['heroSubtitle']);
                @endphp

                <h1 class="flex flex-col gap-1 text-3xl sm:text-4xl lg:text-6xl font-black leading-[1.6] text-[#1E3F34]">
                    @foreach($titleParts as $part)
                        <span>{{ trim($part) }}</span>
                    @endforeach
                </h1>

                <div class="flex flex-col gap-1 text-xs sm:text-sm lg:text-base leading-8 text-[#46594D]">
                    @foreach($subTitleParts as $part)
                        <span>{{ trim($part) }}</span>
                    @endforeach
                </div>

                <a href="{{ $setting['heroPrimaryButtonLink'] }}"
                   class="inline-flex items-center gap-3 rounded-xl bg-[#1E3F34] px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#1E3F34]/15 transition hover:-translate-y-1 hover:bg-[#142E26]">

                    {{ $setting['heroPrimaryButton'] }}

                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                </a>

            </div>
        </div>
    </section>


    {{-- CATEGORIES --}}
    <section id="category" class="py-10 sm:py-14 lg:py-16">

        <div class="w-[92%] max-w-[1440px] mx-auto">

            <div class="flex items-center gap-3 mb-6 sm:mb-9">
                <span class="w-8 sm:w-11 h-1 rounded-full bg-[#C6A77D]"></span>
                <h2 class="sm:text-xl lg:text-2xl font-black text-[#1E3F34]">
                    دسته‌بندی محصولات
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 lg:gap-6">

                @foreach ($categories as $cat)
                    @if ($cat->title != "بدون دسته بندی")

                        <a href="{{ route('category.relatedProducts', $cat->id) }}"
                           class="group relative isolate h-[180px] sm:h-[220px] lg:h-[250px] overflow-hidden rounded-2xl sm:rounded-3xl bg-[#F5F0E6]">

                            <img
                                src="{{ asset('storage/'.$cat->image) }}"
                                alt="{{ $cat->title }}"
                                loading="lazy"
                                class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
                            >

                            <div class="absolute inset-0 bg-gradient-to-l from-[#F5F0E6]/95 via-[#F5F0E6]/75 to-transparent"></div>

                            <div class="absolute inset-y-0 right-0 flex w-[70%] flex-col items-start justify-center gap-3 p-5 sm:p-6">

                                <h3 class="text-lg sm:text-xl font-black text-[#1E3F34]">
                                    {{ $cat->title }}
                                </h3>

                                <p class="line-clamp-2 text-xs sm:text-sm leading-7 text-[#526258]">
                                    {{ $cat->description }}
                                </p>

                                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#1E3F34] text-white transition group-hover:bg-[#C6A77D] group-hover:-translate-x-1">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                                    </svg>
                                </span>

                            </div>
                        </a>

                    @endif
                @endforeach

            </div>
        </div>
    </section>


    {{-- SERVICES --}}
    <section id="خدمات" class="bg-[#F5F0E6] py-6 sm:py-9">

        <div class="w-[92%] max-w-[1440px] mx-auto">

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">

                @for($i = 1; $i <= 4; $i++)

                    <div class="flex items-center gap-3 sm:gap-4 min-w-0 p-2 sm:p-4">

                        <div class="flex h-11 w-11 sm:h-14 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-white p-2.5 shadow-sm">
                            <img
                                src="{{ asset('storage/'.$setting['serviceImage'.$i]) }}"
                                alt=""
                                loading="lazy"
                                class="w-full h-full object-contain"
                            >
                        </div>

                        <div class="min-w-0">
                            <h3 class="text-xs sm:text-sm font-bold text-[#1E3F34] leading-6">
                                {{ $setting['serviceTitle'.$i] }}
                            </h3>

                            <p class="mt-1 text-[10px] sm:text-xs leading-6 text-[#7C887F]">
                                {{ $setting['serviceSubTitle'.$i] }}
                            </p>
                        </div>

                    </div>

                @endfor

            </div>
        </div>
    </section>


    {{-- ABOUT --}}
    <section id="about" class="py-10 sm:py-14 lg:py-16">

        <div class="w-[92%] max-w-[1440px] mx-auto">

            <div class="relative isolate min-h-[390px] sm:min-h-[400px] overflow-hidden rounded-2xl sm:rounded-3xl bg-[#F5F0E6]">

                <img
                    src="{{ asset('storage/'.$setting['secondBanner']) }}"
                    alt="درباره شهرپشم"
                    loading="lazy"
                    class="absolute inset-0 w-full h-full object-cover"
                >

                <div class="absolute inset-0 bg-gradient-to-t sm:bg-gradient-to-l from-[#F5F0E6]/95 via-[#F5F0E6]/85 to-transparent"></div>

                <div class="relative z-10 flex min-h-[390px] sm:min-h-[400px] w-full sm:w-[65%] lg:w-[55%] flex-col items-start justify-end sm:justify-center p-5 sm:p-10 lg:p-14">

                    <div class="flex items-center gap-3">
                        <span class="h-1 w-9 rounded-full bg-[#C6A77D]"></span>
                        <span class="text-sm font-bold text-[#1E3F34]">درباره شهرپشم</span>
                    </div>

                    <h2 class="my-4 text-2xl sm:text-3xl lg:text-4xl font-black leading-[1.8] text-[#1E3F34]">
                        {{ $setting['secondBannerTitle'] }}
                    </h2>

                    <p class="text-xs sm:text-sm leading-8 text-[#4F6055] whitespace-pre-line">
                        {{ $setting['secondBannerSubtitle'] }}
                    </p>

                    <a href="{{ route('aboutUs.list') }}"
                       class="mt-5 inline-flex items-center gap-3 rounded-xl bg-[#1E3F34] px-6 py-3.5 text-sm font-bold text-white transition hover:bg-[#142E26]">

                        {{ $setting['secondBannerButton'] }}

                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M19 12H5M12 19l-7-7 7-7"/>
                        </svg>
                    </a>

                </div>
            </div>
        </div>
    </section>


    {{-- POPULAR PRODUCTS --}}
    <section id="محبوب ترین محصولات" class="pb-12 sm:pb-16 lg:pb-20">

        <div class="w-[92%] max-w-[1440px] mx-auto">

            <div class="flex items-center justify-between gap-3 mb-6 sm:mb-9">
                <div class="flex items-center gap-3">
                    <span class="w-8 sm:w-11 h-1 rounded-full bg-[#C6A77D]"></span>
                    <h2 class="sm:text-xl lg:text-2xl font-black text-[#1E3F34]">
                        محبوب‌ترین محصولات
                    </h2>
                </div>

                <a href="{{ route('product.index') }}"
                   class="shrink-0 text-xs sm:text-sm font-bold text-[#1E3F34] hover:text-[#9B7A50] transition">
                    مشاهده همه
                    ←
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 sm:gap-5">

                @foreach ($newProducts  as $product)

                    <div class="products group min-w-0 overflow-hidden rounded-xl sm:rounded-2xl border border-[#1E3F34]/10 bg-white transition duration-300 hover:-translate-y-1.5 hover:border-[#C6A77D]/60 hover:shadow-xl hover:shadow-[#1E3F34]/10"
                         data-product-id="{{ $product->id }}">

                        <a href="{{ route('product.show', [$product->id]) }}"
                           class="relative block h-[155px] sm:h-[190px] lg:h-[220px] overflow-hidden bg-[#F5F0E6]">

                            <img
                                src="{{ asset('storage/'.$product->image) }}"
                                alt="{{ $product->title }}"
                                loading="lazy"
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-105"
                            >
                        </a>

                        <div class="flex flex-col gap-3 p-3 sm:p-4">

                            <a href="{{ route('product.show', [$product->id]) }}"
                               class="line-clamp-2 min-h-[44px] text-xs sm:text-sm font-bold leading-7 text-[#1E3F34] transition hover:text-[#9B7A50]">
                                {{ $product->title }}
                            </a>

                            <div class="flex flex-wrap items-center gap-2 min-h-6">

                                @if($product->secondary_price)

                                    <strong class="in-fa text-xs sm:text-sm font-black text-[#1E3F34]">
                                        {{ number_format($product->secondary_price) }}
                                        تومان
                                    </strong>

                                    <del class="in-fa text-[10px] sm:text-xs text-gray-400">
                                        {{ number_format($product->primary_price) }}
                                        تومان
                                    </del>

                                @else

                                    <strong class="in-fa text-xs sm:text-sm font-black text-[#1E3F34]">
                                        {{ number_format($product->primary_price) }}
                                        تومان
                                    </strong>

                                @endif

                            </div>

                            <div class="addToCartBtns"
                                 data-product-id="{{ $product->id }}">

                                @if ($product->count > 0)

                                    <button onclick="addToCart(this)" class="w-full p-3 h-full bg-(--light-green-btn) flex gap-2 justify-center items-center rounded-xl cursor-pointer transition-all duration-300 hover:bg-(--green-btn) group">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="lg:size-4 size-3 fill-(--primary-text-color) transition-all duration-300 group-hover:fill-white">
                                                <path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span class="lg:text-sm text-[10px] text-(--primary-text-color) font-bold transition-all duration-300 group-hover:text-white">افزودن به سبد خرید</span>
                                    </button>

                                @else

                                    <button
                                        class="flex w-full min-h-10 items-center justify-center rounded-xl bg-red-50 px-2 py-2.5 text-xs font-bold text-red-600 cursor-not-allowed"
                                        disabled>
                                        عدم موجودی
                                    </button>

                                @endif

                            </div>

                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>

</main>

@endsection
