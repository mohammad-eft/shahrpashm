@extends('admin.app.dashboard')
@section('title', 'شهرپشم | تنظیمات فوتر')
@section('content')
<div class="max-w-6xl mx-auto pb-24">

    <!-- ==================== عنوان صفحه ==================== -->
    <div class="mb-8">
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
            <span>تنظیمات</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="text-gray-800 font-medium">فوتر</span>
        </div>
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">تنظیمات فوتر</h1>
        <p class="text-gray-500 mt-2 text-sm md:text-base">
            مدیریت برند، خدمات، دسته‌بندی‌ها، اطلاعات تماس و شبکه‌های اجتماعی.
        </p>
    </div>

    @if ($errors->any())
    <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4">
        <div class="flex items-start gap-3">
            <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01M5.07 19h13.86a2 2 0 001.74-2.99l-6.93-12a2 2 0 00-3.48 0l-6.93 12A2 2 0 005.07 19z" />
            </svg>
            <ul class="text-sm text-red-700 space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    @if (session('success'))
    <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-200 p-4 flex items-center gap-3">
        <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <span class="text-sm text-emerald-800">{{ session('success') }}</span>
    </div>
    @endif

    <form id="footerForm" class="space-y-6" action="{{ route('setting.footerStore') }}" method="POST">
        @csrf

        <!-- ==================== ستون ۱: برند ==================== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 bg-gradient-to-l from-indigo-50/60 to-transparent px-6 py-4">
                <h2 class="text-base md:text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </span>
                    ستون اول — برند فروشگاه
                </h2>
            </div>

            <div class="p-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <label for="footerBrandName" class="text-sm font-medium text-gray-700">نام فروشگاه</label>
                    <div class="md:col-span-2">
                        <input type="text" id="footerBrandName" name="footerBrandName"
                            value="{{ old('footerBrandName', $footerBrandName->meta_value ?? '') }}"
                            placeholder="مثلا: کتاب فروشی طباطبایی"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 outline-none transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                    <label for="footerBrandDescription" class="text-sm font-medium text-gray-700 md:pt-2.5">توضیح کوتاه</label>
                    <div class="md:col-span-2">
                        <textarea id="footerBrandDescription" name="footerBrandDescription" rows="3"
                            placeholder="مثلا: با ما کتاب را جوری دیگر تجربه کنید"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 outline-none transition resize-none">{{ old('footerBrandDescription', $footerBrandDescription->meta_value ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==================== ستون ۲: خدمات ما ==================== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 bg-gradient-to-l from-emerald-50/60 to-transparent px-6 py-4 flex items-center justify-between">
                <h2 class="text-base md:text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                    ستون دوم — خدمات ما
                </h2>
                <button type="button" onclick="addItem('services')"
                    class="text-xs px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition font-medium flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    افزودن
                </button>
            </div>

            <div class="p-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <label for="footerServicesTitle" class="text-sm font-medium text-gray-700">عنوان ستون</label>
                    <div class="md:col-span-2">
                        <input type="text" id="footerServicesTitle" name="footerServicesTitle"
                            value="{{ old('footerServicesTitle', $footerServicesTitle->meta_value ?? 'خدمات ما') }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none transition">
                    </div>
                </div>

                @php
                $servicesItems = json_decode($footerServices->meta_value ?? '[]', true) ?: [
                ['title' => 'فوتوکپی و پرینت', 'url' => '#'],
                ['title' => 'اجاره بیلبورد', 'url' => '#'],
                ['title' => 'اعلامیه ترحیم', 'url' => '#'],
                ['title' => 'بنر زیارتی و تبریک', 'url' => '#'],
                ['title' => 'سفارش تابلو خطاطی', 'url' => '#'],
                ['title' => 'چاپ طرح روی ماگ', 'url' => '#'],
                ];
                @endphp

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">آیتم‌های لیست</label>
                    <div id="services-items" class="space-y-2">
                        @foreach ($servicesItems as $index => $item)
                        <div class="flex gap-2 items-center item-row">
                            <span class="w-6 h-6 rounded-md bg-gray-100 text-gray-500 text-xs flex items-center justify-center shrink-0 drag-handle cursor-grab">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                                </svg>
                            </span>
                            <input type="text" placeholder="عنوان" value="{{ $item['title'] ?? '' }}"
                                data-field="title"
                                class="flex-1 px-3 py-2 rounded-lg border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none transition text-sm">
                            <input type="text" placeholder="لینک" value="{{ $item['url'] ?? '#' }}" dir="ltr"
                                data-field="url"
                                class="flex-1 px-3 py-2 rounded-lg border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none transition text-sm">
                            <button type="button" onclick="removeItem(this)"
                                class="w-9 h-9 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <input type="hidden" name="footerServices" id="footerServicesInput">
                </div>
            </div>
        </div>

        <!-- ==================== ستون ۳: دسته‌بندی‌ها ==================== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 bg-gradient-to-l from-amber-50/60 to-transparent px-6 py-4 flex items-center justify-between">
                <h2 class="text-base md:text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </span>
                    ستون سوم — دسته‌بندی‌ها
                </h2>
                <button type="button" onclick="addItem('categories')"
                    class="text-xs px-3 py-1.5 rounded-lg bg-amber-50 text-amber-700 hover:bg-amber-100 transition font-medium flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    افزودن
                </button>
            </div>

            <div class="p-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <label for="footerCategoriesTitle" class="text-sm font-medium text-gray-700">عنوان ستون</label>
                    <div class="md:col-span-2">
                        <input type="text" id="footerCategoriesTitle" name="footerCategoriesTitle"
                            value="{{ old('footerCategoriesTitle', $footerCategoriesTitle->meta_value ?? 'دسته بندی ها') }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-amber-500 focus:ring-4 focus:ring-amber-100 outline-none transition">
                    </div>
                </div>

                @php
                $categoriesItems = json_decode($footerCategories->meta_value ?? '[]', true) ?: [
                ['title' => 'چاپ روی پارچه', 'url' => '#'],
                ['title' => 'تابلو', 'url' => '#'],
                ['title' => 'کارت ویزیت', 'url' => '#'],
                ['title' => 'پرچم رومیزی', 'url' => '#'],
                ['title' => 'بنر', 'url' => '#'],
                ['title' => 'بنر تبلیغاتی', 'url' => '#'],
                ['title' => 'چاپ', 'url' => '#'],
                ['title' => 'تجهیزات تبلیغاتی', 'url' => '#'],
                ];
                @endphp

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">آیتم‌های لیست</label>
                    <div id="categories-items" class="space-y-2">
                        @foreach ($categoriesItems as $index => $item)
                        <div class="flex gap-2 items-center item-row">
                            <span class="w-6 h-6 rounded-md bg-gray-100 text-gray-500 text-xs flex items-center justify-center shrink-0 drag-handle cursor-grab">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                                </svg>
                            </span>
                            <input type="text" placeholder="عنوان" value="{{ $item['title'] ?? '' }}"
                                data-field="title"
                                class="flex-1 px-3 py-2 rounded-lg border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-100 outline-none transition text-sm">
                            <input type="text" placeholder="لینک" value="{{ $item['url'] ?? '#' }}" dir="ltr"
                                data-field="url"
                                class="flex-1 px-3 py-2 rounded-lg border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-100 outline-none transition text-sm">
                            <button type="button" onclick="removeItem(this)"
                                class="w-9 h-9 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <input type="hidden" name="footerCategories" id="footerCategoriesInput">
                </div>
            </div>
        </div>

        <!-- ==================== ستون ۴: درباره ما ==================== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 bg-gradient-to-l from-rose-50/60 to-transparent px-6 py-4">
                <h2 class="text-base md:text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    ستون چهارم — درباره ما
                </h2>
            </div>

            <div class="p-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <label for="footerAboutTitle" class="text-sm font-medium text-gray-700">عنوان ستون</label>
                    <div class="md:col-span-2">
                        <input type="text" id="footerAboutTitle" name="footerAboutTitle"
                            value="{{ old('footerAboutTitle', $footerAboutTitle->meta_value ?? 'درباره ما') }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-100 outline-none transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <label for="footerPhone" class="text-sm font-medium text-gray-700">شماره تماس</label>
                    <div class="md:col-span-2">
                        <div class="relative">
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-rose-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </span>
                            <input type="text" id="footerPhone" name="footerPhone"
                                value="{{ old('footerPhone', $footerPhone->meta_value ?? '') }}"
                                placeholder="09371509497"
                                class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-100 outline-none transition">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <label for="footerEmail" class="text-sm font-medium text-gray-700">ایمیل</label>
                    <div class="md:col-span-2">
                        <div class="relative">
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-rose-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input type="email" id="footerEmail" name="footerEmail"
                                value="{{ old('footerEmail', $footerEmail->meta_value ?? '') }}"
                                placeholder="shahkar@gmail.com" dir="ltr"
                                class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-100 outline-none transition">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                    <label for="footerAddress" class="text-sm font-medium text-gray-700 md:pt-2.5">آدرس</label>
                    <div class="md:col-span-2">
                        <div class="relative">
                            <span class="absolute right-3 top-3 text-rose-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <textarea id="footerAddress" name="footerAddress" rows="2"
                                placeholder="آذربایجان شرقی، بناب، خیابان طالقانی"
                                class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-100 outline-none transition resize-none">{{ old('footerAddress', $footerAddress->meta_value ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- ==================== شبکه‌های اجتماعی ==================== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 bg-gradient-to-l from-sky-50/60 to-transparent px-6 py-4">
                <h2 class="text-base md:text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                    </span>
                    شبکه‌های اجتماعی
                </h2>
            </div>

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label for="footerInstagram" class="block text-sm font-medium text-gray-700 mb-2">اینستاگرام</label>
                    <div class="relative">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-pink-500">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                            </svg>
                        </span>
                        <input type="text" id="footerInstagram" name="footerInstagram"
                            value="{{ old('footerInstagram', $footerInstagram->meta_value ?? '') }}"
                            placeholder="https://instagram.com/..." dir="ltr"
                            class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-sky-500 focus:ring-4 focus:ring-sky-100 outline-none transition">
                    </div>
                </div>

                <div>
                    <label for="footerTelegram" class="block text-sm font-medium text-gray-700 mb-2">تلگرام</label>
                    <div class="relative">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-sky-500">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11.944 0A12 12 0 000 12a12 12 0 0012 12 12 12 0 0012-12A12 12 0 0012 0a12 12 0 00-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 01.171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z" />
                            </svg>
                        </span>
                        <input type="text" id="footerTelegram" name="footerTelegram"
                            value="{{ old('footerTelegram', $footerTelegram->meta_value ?? '') }}"
                            placeholder="https://t.me/..." dir="ltr"
                            class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-sky-500 focus:ring-4 focus:ring-sky-100 outline-none transition">
                    </div>
                </div>

                <div>
                    <label for="footerWhatsapp" class="block text-sm font-medium text-gray-700 mb-2">واتساپ</label>
                    <div class="relative">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-emerald-500">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                            </svg>
                        </span>
                        <input type="text" id="footerWhatsapp" name="footerWhatsapp"
                            value="{{ old('footerWhatsapp', $footerWhatsapp->meta_value ?? '') }}"
                            placeholder="https://wa.me/..." dir="ltr"
                            class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-sky-500 focus:ring-4 focus:ring-sky-100 outline-none transition">
                    </div>
                </div>

                <div>
                    <label for="footerEmailSocial" class="block text-sm font-medium text-gray-700 mb-2">لینک ایمیل</label>
                    <div class="relative">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-rose-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <input type="text" id="footerEmailSocial" name="footerEmailSocial"
                            value="{{ old('footerEmailSocial', $footerEmailSocial->meta_value ?? '') }}"
                            placeholder="mailto:info@example.com" dir="ltr"
                            class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-sky-500 focus:ring-4 focus:ring-sky-100 outline-none transition">
                    </div>
                </div>

            </div>
        </div> --}}

        <!-- ==================== شبکه‌های اجتماعی ==================== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 bg-gradient-to-l from-sky-50/60 to-transparent px-6 py-4">
                <h2 class="text-base md:text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                    </span>
                    شبکه‌های اجتماعی
                </h2>
            </div>

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- اینستاگرام -->
                <div>
                    <label for="footerInstagram" class="block text-sm font-medium text-gray-700 mb-2">اینستاگرام</label>
                    <div class="relative">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-pink-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <rect x="3" y="3" width="18" height="18" rx="5"/>
                                <circle cx="12" cy="12" r="4"/>
                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                            </svg>
                        </span>
                        <input type="text" id="footerInstagram" name="footerInstagram"
                            value="{{ old('footerInstagram', $footerInstagram->meta_value ?? '') }}"
                            placeholder="https://instagram.com/..." dir="ltr"
                            class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-pink-500 focus:ring-4 focus:ring-pink-100 outline-none transition">
                    </div>
                </div>

                <!-- تلگرام -->
                <div>
                    <label for="footerTelegram" class="block text-sm font-medium text-gray-700 mb-2">تلگرام</label>
                    <div class="relative">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-sky-500">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M21.8 3.3L18.5 20c-.25 1.18-.9 1.47-1.83.92l-5.05-3.72-2.44 2.35c-.27.27-.5.5-1.03.5l.37-5.15 9.38-8.48c.41-.37-.09-.58-.63-.21L5.67 13.57.68 12.01c-1.08-.34-1.1-1.08.23-1.61L20.4 2.8c.9-.33 1.68.21 1.4.5z"/>
                            </svg>
                        </span>
                        <input type="text" id="footerTelegram" name="footerTelegram"
                            value="{{ old('footerTelegram', $footerTelegram->meta_value ?? '') }}"
                            placeholder="https://t.me/..." dir="ltr"
                            class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-sky-500 focus:ring-4 focus:ring-sky-100 outline-none transition">
                    </div>
                </div>

                <!-- روبیکا -->
                <div>
                    <label for="footerRubika" class="block text-sm font-medium text-gray-700 mb-2">روبیکا</label>
                    <div class="relative">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-purple-600">
                            <svg id="Layer_1"
                                class="w-5 h-5"
                                data-name="Layer 1" 
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 495.37 543.04">
                                <path d="M246.07,0h1.76c.48,42.73-.25,128.44-.25,128.44-40.86-22.92-82-45.3-122.84-68.29q40.13-22.81,80.32-45.51c12.69-7.16,26.33-13.31,41-14.64Z" fill="#b8ce01"/>
                                <path d="M247.73,0h3C266.62,1.43,281,9,294.67,16.68Q332.91,38.25,371.05,60c-41,22.73-82.45,45.82-123.51,68.48-.35-42.73.63-85.77.15-128.5Z" fill="#7db425"/>
                                <path d="M124.77,60.11,247.61,128.4,123.92,200.66s-.06-45.85.08-68.71C123.89,108.21,124.77,60.11,124.77,60.11Z" fill="#f6a925"/>
                                <path d="M371.19,60l.35.19c-.1,42.59,0,85.18,0,127.77-.07,4.17-.11,12.77-.11,12.77L247.62,128.45S330.2,82.76,371.23,60Z" fill="#35ac9d"/>
                                <path d="M371.44,60.21c27.28,15.51,54.37,31.36,81.47,47.17,13.11,7.36,27,15.52,34.16,29.39-38.38,21.25-115.68,64-115.68,64s-.06-8.61,0-12.78q0-63.89,0-127.77Z" fill="#59d6bd"/>
                                <path d="M46.5,105c25.65-15,78.19-44.88,78.19-44.88L124,200.66S47,158.21,8.71,137C17.05,122.13,32.11,113.12,46.5,105Z" fill="#ef7414"/>
                                <path d="M247.5,128.44l123.81,72.3s-39.84,22-59.62,32.64c-21.14,12-64.09,35.82-64.09,35.82L123.94,200.66Z" fill="#fff"/>
                                <path d="M0,193C.11,174.17-.23,154.15,8.66,137,47,158.21,123.92,200.66,123.92,200.66,82.55,224.58,41.38,248.86,0,272.81,0,246.21,0,219.62,0,193Z" fill="#e74b50"/>
                                <path d="M487.07,136.77c7.54,14.1,8.64,30.5,8.22,46.19v90.11L371.41,200.76S448.69,158,487.07,136.77Z" fill="#794387"/>
                                <path d="M123.92,200.66c.19-.08,123.66,68.54,123.66,68.54s0,71.69.07,106.76c.2,11.29-.07,34.11-.07,34.11-41.27-22.78-82.32-45.76-123.6-68.54l-.07-.31V200.66Z" fill="#e4e4e4"/>
                                <path d="M0,272.81c41.35-24,82.52-48.23,123.89-72.15q-.06,70.29,0,140.56c-6.35-2.65-12.13-6.43-18.19-9.64C70.5,312.21,35.38,292.39,0,273.21v-.4Z" fill="#794387"/>
                                <path d="M371.39,200.76v86.18c-.13,18.27.46,36.47,0,54.73-41.21,22.4-123.82,68.4-123.82,68.4s.27-22.82.07-34.11c0-35.07-.07-106.76-.07-106.76Z" fill="#f1f1f1"/>
                                <path d="M371.39,200.76s123.88,72.14,123.88,72.31c-41.17,22.82-123.87,68.6-123.87,68.6h0c.46-18.26-.13-36.46,0-54.73V200.76Z" fill="#4c3683"/>
                                <path d="M0,273.21c35.36,19.21,70.43,39,105.7,58.4,6.06,3.21,11.84,7,18.19,9.64l.07.31Q67,374.79,10,408.05C6,402,4,394.86,2.53,387.8.14,376,0,364,0,352v-78.8Z" fill="#4c3683"/>
                                <path d="M495.27,273.07c.06,27.65,0,55.3,0,82.95.4,17.73-.12,36.62-9.57,52.25-34.2-20-114.33-66.6-114.33-66.6S454.1,295.89,495.27,273.07Z" fill="#e74b50"/>
                                <path d="M10,408Q67,374.72,124,341.53c-.25,46.83.08,93.67-.16,140.49q-40.35-22.75-80.49-45.86C30.82,428.76,18,420.53,10,408Z" fill="#0f68a0"/>
                                <path d="M124,341.53c41.28,22.78,82.33,45.76,123.6,68.54-41.2,24-123.7,72-123.76,71.95.24-46.82-.09-93.66.16-140.49Z" fill="#49bdca"/>
                                <path d="M371.2,341.76l.2-.09c.12,46.84-.25,93.69.19,140.53l-.31.15c-32.66-19.51-65.71-38.4-98.52-57.68-8.26-4.7-25.18-14.6-25.18-14.6S330,364.21,371.2,341.76Z" fill="#f6a925"/>
                                <path d="M371.4,341.67h0c3.65,2.49,80.13,46.62,114.33,66.6-4.86,8.3-12.56,14.39-20.32,19.84-12.52,8.42-25.88,15.47-38.9,23.05-18.31,10.35-36.5,20.91-54.92,31-.44-46.84-.07-93.69-.19-140.53Z" fill="#ef7414"/>
                                <path d="M247.58,410.07V543c-10.25-1.51-21.42-3.87-30.5-9.08C186,516.66,154.81,499.5,123.82,482,165,458,206.38,434.12,247.58,410.07Z" fill="#7db425"/>
                                <path d="M247.58,410.07s16.92,9.9,25.18,14.6c32.81,19.28,65.86,38.17,98.52,57.68q-47.79,26.44-95.57,53A62.47,62.47,0,0,1,249.84,543h-2.26Z" fill="#b8ce01"/>
                                <path d="M602.83,233.66" fill="#f1f1f1"/>
                            </svg>
                        </span>
                        <input type="text" id="footerRubika" name="footerRubika"
                            value="{{ old('footerRubika', $footerRubika->meta_value ?? '') }}"
                            placeholder="https://rubika.ir/..." dir="ltr"
                            class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-purple-500 focus:ring-4 focus:ring-purple-100 outline-none transition">
                    </div>
                </div>

                <!-- بله -->
                <div>
                    <label for="footerBale" class="block text-sm font-medium text-gray-700 mb-2">بله</label>
                    <div class="relative">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 w-7 h-7 flex items-center justify-center text-blue-600">
                            <svg
                                class="w-full h-full"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 601 841"
                                fill="none"
                                preserveAspectRatio="xMidYMid meet">
                                <path d="M0 0 C10.16888405 6.59451569 20.07714491 13.58075916 29.9375 20.625 C30.71512695 21.17833008 31.49275391 21.73166016 32.29394531 22.30175781 C34.57422328 23.92584068 36.85061977 25.55516969 39.125 27.1875 C39.85299805 27.70892578 40.58099609 28.23035156 41.33105469 28.76757812 C45.18760438 31.5539138 48.95766215 34.41471661 52.6640625 37.3984375 C53.43339111 38.01130615 54.20271973 38.6241748 54.99536133 39.25561523 C56.46642118 40.43453391 57.92534747 41.62880254 59.36987305 42.84008789 C60.02769775 43.36594482 60.68552246 43.89180176 61.36328125 44.43359375 C61.93473877 44.90595459 62.50619629 45.37831543 63.0949707 45.86499023 C64.9995315 46.86750833 64.9995315 46.86750833 67.34375 45.99291992 C70.13447195 44.5211188 72.50901416 42.85057037 75.01171875 40.9296875 C80.68849269 36.71981701 86.57097611 33.16856948 92.75 29.75 C94.37905273 28.84664917 94.37905273 28.84664917 96.04101562 27.92504883 C167.56652016 -11.21714814 250.78112602 -19.09103771 328.85253906 3.46728516 C382.11163928 19.31969969 434.75742985 52.02113796 469.66796875 95.796875 C471.97153323 98.66740974 474.35579548 101.45485214 476.75 104.25 C487.70043035 117.42102846 496.664973 131.65771181 504.9375 146.625 C505.36272949 147.37974609 505.78795898 148.13449219 506.22607422 148.91210938 C544.21000034 216.49750349 551.21148764 299.08937076 530.77734375 373.26171875 C515.1127555 428.24745326 482.92134349 480.63241558 438.9375 517.625 C438.39480469 518.08148926 437.85210937 518.53797852 437.29296875 519.00830078 C391.41772881 557.40548367 335.66231712 582.89492136 275.9375 589.625 C274.71341431 589.76639404 274.71341431 589.76639404 273.46459961 589.91064453 C263.08971631 590.94342162 252.66568348 590.86870441 242.25 590.875 C240.74475769 590.87601212 240.74475769 590.87601212 239.20910645 590.87704468 C223.89964207 590.86070603 209.04297596 590.31818366 193.9375 587.625 C192.92993652 587.45339355 191.92237305 587.28178711 190.88427734 587.10498047 C133.221793 577.11514923 81.05670842 551.04271011 37.9375 511.625 C36.9784375 510.77035156 36.019375 509.91570313 35.03125 509.03515625 C8.15034688 484.99139125 -13.75821123 454.28082699 -29.08398438 421.70166016 C-29.75710697 420.27312203 -30.4385868 418.84850153 -31.12695312 417.42724609 C-44.15961992 390.47123201 -51.99687007 361.8049048 -56.375 332.25 C-56.53460205 331.18273682 -56.6942041 330.11547363 -56.85864258 329.01586914 C-59.48552498 309.84441428 -59.21585121 290.42462324 -59.22363281 271.1171875 C-59.22774614 268.40467651 -59.23327906 265.69216873 -59.23867798 262.97966003 C-59.25211569 255.67242207 -59.25826029 248.36518968 -59.26268864 241.05794144 C-59.26547073 236.48539365 -59.26971092 231.91284791 -59.27419281 227.34030151 C-59.28635645 214.64525995 -59.29666785 201.95021999 -59.3000679 189.25517273 C-59.30028747 188.44686557 -59.30050703 187.63855842 -59.30073325 186.80575711 C-59.30095153 185.99572403 -59.30116981 185.18569095 -59.3013947 184.35111141 C-59.30183814 182.71014849 -59.30228471 181.06918557 -59.30273438 179.42822266 C-59.3029558 178.61428012 -59.30317723 177.80033758 -59.30340537 176.96173012 C-59.30736203 163.74380319 -59.32485543 150.52593108 -59.3480939 137.30802536 C-59.37183554 123.69294267 -59.38427069 110.07788753 -59.38543582 96.46278381 C-59.38634993 88.83573396 -59.39203724 81.20875602 -59.41025543 73.58172607 C-59.42569311 67.09703107 -59.43075455 60.61243032 -59.42251733 54.12772042 C-59.41862648 50.8248289 -59.42111609 47.52216557 -59.43357468 44.21928978 C-59.44632028 40.62918595 -59.44040305 37.03956387 -59.42999268 33.44946289 C-59.43804908 32.4202667 -59.44610548 31.39107052 -59.45440602 30.33068657 C-59.38128425 19.49576827 -57.67854825 9.6757542 -50.0625 1.625 C-49.49789062 0.99722656 -48.93328125 0.36945312 -48.3515625 -0.27734375 C-33.98209748 -14.61649345 -15.17750021 -9.63381837 0 0 Z M318.90039062 184.56445312 C317.62161305 185.84515401 316.34260455 187.12562435 315.06338501 188.40588379 C312.32943162 191.14297649 309.59703389 193.88160906 306.86585999 196.62147522 C302.54905288 200.95188368 298.22836305 205.27840432 293.90710449 209.60437012 C284.74759034 218.77494106 275.59234113 227.94976441 266.4375 237.125 C256.52486751 247.05966673 246.61149141 256.99358498 236.69325781 266.92266035 C232.39470618 271.22620098 228.09860554 275.53216918 223.80435085 279.83999729 C221.14211365 282.5096695 218.4778281 285.17729009 215.81296921 287.84434509 C214.57447301 289.08471998 213.33684482 290.32596224 212.10013199 291.56811523 C210.41770935 293.25770826 208.73227031 294.94423273 207.04602051 296.63000488 C206.55284411 297.12677624 206.05966771 297.6235476 205.55154657 298.13537264 C202.16568698 301.51090651 202.16568698 301.51090651 199.9375 302.625 C199.69978882 302.06262634 199.46207764 301.50025269 199.21716309 300.9208374 C197.64775019 298.10516126 195.74131944 296.17446181 193.46289062 293.89160156 C192.07003845 292.48929291 192.07003845 292.48929291 190.64904785 291.05865479 C189.6308679 290.0440579 188.61242852 289.0297213 187.59375 288.015625 C186.54410075 286.96462682 185.4947484 285.91333205 184.44567871 284.86175537 C182.24306673 282.6561951 180.03688109 280.45428954 177.828125 278.25488281 C175.02202338 275.46009123 172.22488493 272.65652997 169.43045807 269.85007095 C167.26170088 267.67401485 165.0881133 265.50283338 162.91313171 263.33300018 C161.88162654 262.30281384 160.85156207 261.27118254 159.82307434 260.2379837 C144.92699564 245.28873587 129.68255729 233.83073698 107.8125 233.1875 C91.09164839 233.8898664 76.90761937 239.93111415 64.9375 251.625 C52.31698314 266.16228478 48.93447322 281.41007534 49.7421875 300.12548828 C50.17603483 305.67764944 51.71589891 310.5530428 53.9375 315.625 C54.32679687 316.54023438 54.71609375 317.45546875 55.1171875 318.3984375 C62.91875091 334.50935838 79.6590102 347.53960213 92.12109375 360.046875 C93.08543158 361.01527464 94.04974162 361.98370195 95.01402473 362.95215607 C99.54192285 367.49899092 104.07215294 372.04348616 108.6053223 376.5850656 C113.79061195 381.78014385 118.9674844 386.98342704 124.1374802 392.19372439 C128.17068853 396.25726463 132.21170693 400.31293435 136.25846058 404.3629849 C138.65972094 406.76657209 141.05770487 409.1732059 143.44735527 411.58834076 C160.23531249 429.26530496 160.23531249 429.26530496 181.4375 440.625 C182.5615625 440.99625 183.685625 441.3675 184.84375 441.75 C199.9735843 446.02914506 215.59320068 443.9979882 229.625 437.0625 C242.70168371 429.14594618 253.41266884 416.30926011 264.16137695 405.578125 C265.86587398 403.8799063 267.5705555 402.18187275 269.27540588 400.48400879 C274.35030086 395.42817431 279.4210329 390.36817667 284.49087051 385.30727196 C286.40605518 383.39560929 288.32155063 381.48425821 290.23706061 379.57292151 C298.70051838 371.12789526 307.16263627 362.68152906 315.62073994 354.23114014 C317.68017436 352.17361498 319.73961438 350.11609542 321.79907227 348.05859375 C322.31081704 347.54733271 322.82256182 347.03607167 323.34981402 346.50931787 C331.65343011 338.21401553 339.96554134 329.92728005 348.28119753 321.64404917 C356.84671205 313.1116596 365.40462649 304.57170642 373.95519036 296.02433395 C378.74517914 291.23650299 383.53835825 286.45196765 388.34008217 281.67590332 C392.85267331 277.18662942 397.35560207 272.68788235 401.85141563 268.18180847 C403.49785345 266.5348763 405.14768849 264.89133189 406.80123901 263.25154114 C421.51150206 248.67821034 421.51150206 248.67821034 430.8125 230.375 C431.20179688 229.25609375 431.59109375 228.1371875 431.9921875 226.984375 C436.20683198 212.00671281 434.01795344 195.94873845 426.6015625 182.33984375 C417.22645895 167.04478045 404.31859226 157.92615862 386.9375 153.625 C357.12113356 147.9114577 338.32387883 165.05429068 318.90039062 184.56445312 Z " fill="#0CBC8D" transform="translate(59.0625,9.375)"/>
                            </svg>
                        </span>
                        <input type="text" id="footerBale" name="footerBale"
                            value="{{ old('footerBale', $footerBale->meta_value ?? '') }}"
                            placeholder="https://ble.ir/..." dir="ltr"
                            class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">
                    </div>
                </div>

                <!-- ایتا -->
                <div>
                    <label for="footerEitaa" class="block text-sm font-medium text-gray-700 mb-2">ایتا</label>
                    <div class="relative">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-emerald-600">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3584.55 3673.6">
                            <g id="Isolation_Mode" data-name="Isolation Mode">
                                <path d="M1071.43,2.75H2607.66C3171,2.75,3631.82,462.91,3631.82,1026.2v493.93c-505,227-1014.43,1348.12-1756.93,1104.51-61.16,43.46-202.11,222.55-212,358.43-257.11-34.24-553.52-328.88-517.95-646.62C717,2026.91,1070.39,1455.5,1409.74,1225.51c727.32-492.94,1737.05-69,1175.39,283.45-341.52,214.31-1071.84,355.88-995.91-170.24-200.34,57.78-328.58,431.34-87.37,626-223.45,219.53-180.49,623.07,58.36,755.57,241.56-625.87,1082.31-544.08,1422-1291.2,255.57-562-123.34-1202.37-880.91-1104C1529.56,399.34,993.64,881.63,725.62,1453.64,453.68,2034,494.15,2811.15,1052.55,3202.82c657.15,460.92,1356.78,34.13,1780.52-523.68,249.77-328.78,468-693,798.75-903.37v875.72c0,563.28-460.88,1024.86-1024.16,1024.86H1071.43c-563.29,0-1024.16-460.87-1024.16-1024.16V1026.9C47.27,463.61,508.14,2.74,1071.43,2.74Z" transform="translate(-47.27 -2.74)" fill="#ee7f22" fill-rule="evenodd"/>
                            </g>
                            </svg>

                        </span>
                        <input type="text" id="footerEitaa" name="footerEitaa"
                            value="{{ old('footerEitaa', $footerEitaa->meta_value ?? '') }}"
                            placeholder="https://eitaa.com/..." dir="ltr"
                            class="w-full pr-10 pl-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none transition">
                    </div>
                </div>
            </div>
        </div>


        <!-- ==================== پایین فوتر ==================== -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 bg-gradient-to-l from-gray-50 to-transparent px-6 py-4">
                <h2 class="text-base md:text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 text-gray-600 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </span>
                    پایین فوتر — کپی‌رایت و اطلاعات طراح
                </h2>
            </div>

            <div class="p-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <label for="footerCopyright" class="text-sm font-medium text-gray-700">متن کپی‌رایت</label>
                    <div class="md:col-span-2">
                        <input type="text" id="footerCopyright" name="footerCopyright"
                            value="{{ old('footerCopyright', $footerCopyright->meta_value ?? '') }}"
                            placeholder="© ۱۴۰۳ کتاب فروشی طباطبایی — تمامی حقوق محفوظ است."
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 outline-none transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <label for="footerDesignerText" class="text-sm font-medium text-gray-700">متن طراح</label>
                    <div class="md:col-span-2">
                        <input type="text" id="footerDesignerText" name="footerDesignerText"
                            value="{{ old('footerDesignerText', $footerDesignerText->meta_value ?? '') }}"
                            placeholder="طراحی و توسعه شرکت اندیشه گِران طراحان دیجیتال (قانوس)"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 outline-none transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <label for="footerDesignerPhone" class="text-sm font-medium text-gray-700">شماره تماس طراح</label>
                    <div class="md:col-span-2">
                        <input type="text" id="footerDesignerPhone" name="footerDesignerPhone"
                            value="{{ old('footerDesignerPhone', $footerDesignerPhone->meta_value ?? '') }}"
                            placeholder="09147794595"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 outline-none transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                    <label for="footerDesignerUrl" class="text-sm font-medium text-gray-700">لینک سایت طراح</label>
                    <div class="md:col-span-2">
                        <input type="text" id="footerDesignerUrl" name="footerDesignerUrl"
                            value="{{ old('footerDesignerUrl', $footerDesignerUrl->meta_value ?? '') }}"
                            placeholder="https://ghanous.com" dir="ltr"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 outline-none transition">
                    </div>
                </div>
            </div>
        </div>

        <!-- ==================== دکمه‌های عملیات ==================== -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-3 bg-white rounded-2xl shadow-sm border border-gray-100 p-4 sticky bottom-4 z-20 backdrop-blur">
            <button type="reset"
                class="px-6 py-2.5 rounded-xl border border-gray-200 text-gray-700 font-medium hover:bg-gray-50 transition focus:outline-none focus:ring-4 focus:ring-gray-100">
                بازنشانی
            </button>
            <button type="submit"
                class="px-6 py-2.5 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700 shadow-sm hover:shadow transition flex items-center justify-center gap-2 focus:outline-none focus:ring-4 focus:ring-indigo-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                ذخیره تغییرات
            </button>
        </div>

    </form>
</div>

<script>
    /* ---------- افزودن آیتم جدید ---------- */
    function addItem(type) {
        const container = document.getElementById(type + '-items');
        const color = type === 'services' ? 'emerald' : 'amber';

        const row = document.createElement('div');
        row.className = 'flex gap-2 items-center item-row';
        row.innerHTML = `
            <span class="w-6 h-6 rounded-md bg-gray-100 text-gray-500 text-xs flex items-center justify-center shrink-0 drag-handle cursor-grab">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
                </svg>
            </span>
            <input type="text" placeholder="عنوان" data-field="title"
                class="flex-1 px-3 py-2 rounded-lg border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-${color}-500 focus:ring-2 focus:ring-${color}-100 outline-none transition text-sm">
            <input type="text" placeholder="لینک" value="#" dir="ltr" data-field="url"
                class="flex-1 px-3 py-2 rounded-lg border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-${color}-500 focus:ring-2 focus:ring-${color}-100 outline-none transition text-sm">
            <button type="button" onclick="removeItem(this)"
                class="w-9 h-9 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition flex items-center justify-center shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </button>
        `;
        container.appendChild(row);
    }

    /* ---------- حذف آیتم ---------- */
    function removeItem(btn) {
        btn.closest('.item-row').remove();
    }

    /* ---------- تبدیل لیست‌ها به JSON قبل از ارسال ---------- */
    function serializeItems(containerId, hiddenInputId) {
        const container = document.getElementById(containerId);
        const rows = container.querySelectorAll('.item-row');
        const data = [];

        rows.forEach(row => {
            const title = row.querySelector('[data-field="title"]').value.trim();
            const url = row.querySelector('[data-field="url"]').value.trim();
            if (title) {
                data.push({
                    title,
                    url: url || '#'
                });
            }
        });

        document.getElementById(hiddenInputId).value = JSON.stringify(data);
    }

    /* ---------- جلوگیری از ارسال دوباره + سریالایز ---------- */
    document.getElementById('footerForm').addEventListener('submit', function(e) {
        serializeItems('services-items', 'footerServicesInput');
        serializeItems('categories-items', 'footerCategoriesInput');

        const btn = this.querySelector('button[type="submit"]');
        if (btn) {
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                در حال ذخیره...
            `;
        }
    });
</script>
@endsection