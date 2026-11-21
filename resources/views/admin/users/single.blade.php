
@extends('admin.app.dashboard')

@section('title', 'شهرپشم | حساب کاربری')

@section('content')
<div class="w-full py-4 lg:py-8">

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8">

        {{-- عنوان --}}
        <div class="flex items-center gap-3 mb-6">
            <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-indigo-50 text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M20 21a8 8 0 00-16 0" />
                    <circle cx="12" cy="8" r="4" />
                </svg>
            </div>

            <div>
                <h1 class="text-lg sm:text-xl font-bold text-gray-800">
                    حساب کاربری
                </h1>
                <p class="text-xs sm:text-sm text-gray-400 mt-1">
                    اطلاعات و مشخصات حساب شما
                </p>
            </div>
        </div>

        <div class="w-full h-px bg-gray-100 mb-6"></div>

        {{-- اطلاعات کاربر --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            {{-- نام کامل --}}
            <div class="flex items-center gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-blue-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <circle cx="12" cy="8" r="4" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 21a7 7 0 0114 0" />
                    </svg>
                </div>

                <div class="min-w-0">
                    <p class="text-xs text-gray-400 mb-1">نام کامل</p>
                    <p class="text-sm font-semibold text-gray-700">
                        {{ trim(($user->name ?? '') . ' ' . ($user->family ?? '')) ?: '-' }}
                    </p>
                </div>
            </div>

            {{-- شماره تلفن --}}
            <div class="flex items-center gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-green-50 text-green-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5a2 2 0 012-2h3l2 5-2 1.5a12 12 0 005.5 5.5L15 13l5 2v3a2 2 0 01-2 2A15 15 0 013 5z" />
                    </svg>
                </div>

                <div class="min-w-0">
                    <p class="text-xs text-gray-400 mb-1">شماره تلفن</p>
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-sm font-semibold text-gray-700">
                            {{ $user->phoneNumber ?: '-' }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- ایمیل --}}
            <div class="flex items-center gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-orange-50 text-orange-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="5" width="18" height="14" rx="2" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7l9 7 9-7" />
                    </svg>
                </div>

                <div class="min-w-0">
                    <p class="text-xs text-gray-400 mb-1">ایمیل</p>
                    <p class="text-sm font-semibold text-gray-700 break-all">
                        {{ $user->email ?: '-' }}
                    </p>
                </div>
            </div>

            {{-- نقش --}}
            <div class="flex items-center gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-purple-50 text-purple-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4" />
                    </svg>
                </div>

                <div class="min-w-0">
                    <p class="text-xs text-gray-400 mb-1">نقش کاربری</p>
                    <p class="text-sm font-semibold text-gray-700">
                        {{ $user->roles[0]->fa_title ?? '-' }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
