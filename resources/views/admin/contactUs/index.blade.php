
@extends('admin.app.dashboard')

@section('title', 'ارتباط با ما')

@section('content')
<div class="w-full flex flex-col pb-6 pt-3 mt-4 lg:mt-8">

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 sm:p-5 lg:p-6">

        {{-- عنوان صفحه --}}
        <div class="flex items-center gap-3 mb-6">
            <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-indigo-50 text-indigo-600 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" />
                </svg>
            </div>

            <div>
                <h1 class="text-lg sm:text-xl font-bold text-gray-800">
                    لیست ارتباط با ما
                </h1>
                <p class="text-xs sm:text-sm text-gray-400 mt-1">
                    مشاهده و مدیریت پیام‌های ثبت‌شده
                </p>
            </div>
        </div>

        <div class="w-full h-px bg-gray-100 mb-5"></div>

        <form action="{{ route('contactUs.deleteAll') }}" method="post" class="flex flex-col gap-4">
            @csrf

            {{-- انتخاب همه و حذف گروهی --}}
            <div class="flex flex-wrap items-center justify-between gap-3">

                <label for="all" class="flex items-center gap-2.5 cursor-pointer text-sm text-gray-600">
                    <input type="checkbox" id="all" onchange="checkAll()"
                        class="w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                    انتخاب همه
                </label>

                <button type="submit"
                    onclick="return confirm('آیا از حذف موارد انتخاب‌شده مطمئن هستید؟')"
                    class="inline-flex items-center justify-center gap-2 px-3 py-2 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 text-xs sm:text-sm font-medium transition-colors">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                        viewBox="0 0 448 512" fill="currentColor">
                        <path
                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80z" />
                    </svg>

                    حذف انتخاب‌شده‌ها
                </button>
            </div>

            {{-- جدول --}}
            <div class="w-full overflow-x-auto rounded-xl border border-gray-100">
                <table class="w-full min-w-[650px] text-sm text-center">

                    <thead class="bg-gray-50 text-gray-500">
                        <tr>
                            <th class="px-4 py-4 font-medium w-16">انتخاب</th>
                            <th class="px-4 py-4 font-medium w-20">ردیف</th>
                            <th class="px-4 py-4 font-medium">عنوان</th>
                            <th class="px-4 py-4 font-medium">شماره تماس</th>
                            <th class="px-4 py-4 font-medium w-32">عملیات</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse ($allContactUs as $index => $contactUs)

                            <tr class="hover:bg-gray-50 transition-colors">

                                {{-- چک‌باکس --}}
                                <td class="px-4 py-4">
                                    <input type="checkbox"
                                        class="check w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer"
                                        name="allContactUs[]"
                                        value="{{ $contactUs->id }}">
                                </td>

                                {{-- ردیف --}}
                                <td class="px-4 py-4 text-gray-500">
                                    {{ $index + 1 }}
                                </td>

                                {{-- عنوان --}}
                                <td class="px-4 py-4">
                                    <a href="{{ route('contactUs.single', [$contactUs]) }}"
                                        class="text-gray-700 font-medium hover:text-indigo-600 transition-colors">
                                        {{ $contactUs->title ?: '-' }}
                                    </a>
                                </td>

                                {{-- شماره تماس --}}
                                <td class="px-4 py-4 text-gray-600" dir="ltr">
                                    {{ $contactUs->phoneNumber ?: '-' }}
                                </td>

                                {{-- عملیات --}}
                                <td class="px-4 py-4">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- مشاهده --}}
                                        <a href="{{ route('contactUs.single', [$contactUs]) }}"
                                            class="flex items-center justify-center w-8 h-8 rounded-lg bg-sky-50 text-sky-600 hover:bg-sky-100 transition-colors"
                                            title="مشاهده">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                viewBox="0 0 576 512" fill="currentColor">
                                                <path
                                                    d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 0 1 0-256z" />
                                            </svg>
                                        </a>

                                        {{-- حذف --}}
                                        <a href="{{ route('contactUs.delete', [$contactUs]) }}"
                                            onclick="return confirm('آیا از حذف این مورد مطمئن هستید؟')"
                                            class="flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors"
                                            title="حذف">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                viewBox="0 0 448 512" fill="currentColor">
                                                <path
                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80z" />
                                            </svg>
                                        </a>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="px-4 py-12">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-3"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8 10h8M8 14h5m-8 7l3-3h10a3 3 0 003-3V6a3 3 0 00-3-3H6a3 3 0 00-3 3v12a3 3 0 003 3z" />
                                        </svg>

                                        <p class="text-sm font-medium">
                                            هنوز موردی ثبت نشده است.
                                        </p>
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

        </form>

        <script src="{{ asset('assets/js/checkAll.js') }}"></script>

    </div>
</div>
@endsection
