
@extends('admin.app.dashboard')

@section('title', 'جزئیات ارتباط با ما')

@section('content')
<div class="w-full pt-4 mt-4 lg:mt-8">

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8">

        {{-- عنوان صفحه --}}
        <div class="flex items-center gap-3 mb-6">
            <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-indigo-50 text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" />
                </svg>
            </div>

            <div>
                <h1 class="text-lg sm:text-xl font-bold text-gray-800">
                    جزئیات ارتباط با ما
                </h1>
                <p class="text-xs sm:text-sm text-gray-400 mt-1">
                    مشاهده اطلاعات ثبت‌شده
                </p>
            </div>
        </div>

        <div class="w-full h-px bg-gray-100 mb-6"></div>

        {{-- اطلاعات --}}
        <div class="flex flex-col gap-4">

            {{-- عنوان --}}
            <div class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-blue-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h10M4 18h7" />
                    </svg>
                </div>

                <div class="min-w-0 flex-1">
                    <p class="text-xs text-gray-400 mb-2">عنوان</p>
                    <p class="text-sm sm:text-base font-semibold text-gray-700 break-words">
                        {{ $contactUs->title ?: '-' }}
                    </p>
                </div>
            </div>

            {{-- توضیحات --}}
            <div class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-purple-50 text-purple-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 10h8M8 14h5m-8 7l3-3h10a3 3 0 003-3V6a3 3 0 00-3-3H6a3 3 0 00-3 3v12a3 3 0 003 3z" />
                    </svg>
                </div>

                <div class="min-w-0 flex-1">
                    <p class="text-xs text-gray-400 mb-2">توضیحات</p>
                    <p class="text-sm sm:text-base text-gray-700 leading-8 whitespace-pre-line break-words">
                        {{ $contactUs->description ?: '-' }}
                    </p>
                </div>
            </div>

            {{-- شماره تماس --}}
            <div class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-green-50 text-green-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5a2 2 0 012-2h3l2 5-2 1.5a12 12 0 005.5 5.5L17 11l5 2v3a2 2 0 01-2 2A15 15 0 013 5z" />
                    </svg>
                </div>

                <div class="min-w-0 flex-1">
                    <p class="text-xs text-gray-400 mb-2">شماره تماس</p>
                    <p class="text-sm sm:text-base font-semibold text-gray-700" dir="ltr">
                        {{ $contactUs->phoneNumber ?: '-' }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
