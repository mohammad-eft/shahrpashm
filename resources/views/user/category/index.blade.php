
@extends('app.document')

@section('title', 'دسته بندی ها')

@section('content')

<div class="w-[94%] max-w-[1440px] mx-auto pt-9 sm:pt-10 pb-12">

    <div class="flex items-center gap-3 mb-8 sm:mb-10">
        <span class="w-9 h-1 rounded-full bg-[#C6A77D]"></span>
        <h1 class="text-xl sm:text-2xl font-black text-[#1E3F34]">
            دسته‌بندی محصولات
        </h1>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6">

        @foreach ($categories as $category)

            <a href="{{ route('category.relatedProducts', [$category]) }}"
               class="group flex flex-col items-center rounded-2xl border border-[#1E3F34]/10 bg-white p-4 sm:p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-[#1E3F34]/10 hover:border-[#C6A77D]/60">

                <div class="w-full h-32 sm:h-40 flex items-center justify-center rounded-xl bg-[#F7F4ED] overflow-hidden">

                    <img
                        src="{{ $category->image ? asset('storage/'.$category->image) : asset('storage/default.jpg') }}"
                        onerror="this.onerror=null;this.src='{{ asset('storage/default.jpg') }}';"
                        alt="{{ $category->title }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                    >

                </div>

                <h2 class="mt-4 text-sm sm:text-base font-bold text-[#1E3F34] text-center">
                    {{ $category->title }}
                </h2>

                <p class="mt-2 text-[11px] sm:text-xs leading-6 text-center text-[#7C887F] line-clamp-2">
                    {{ $category->description }}
                </p>

            </a>

        @endforeach

    </div>

</div>

@endsection
