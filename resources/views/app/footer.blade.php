<footer class="w-full mt-20 flex justify-center items-start py-6 bg-[#1E3F34]" style="box-shadow:0 0 22px 2px #e2e2e2;">
    <section class="max-w-[1800px] w-11/12 mx-auto flex flex-col gap-4 justify-between items-start">
        <div class="w-full flex flex-col md:flex-row gap-5">
            <div class="w-full md:w-2/3 h-full flex flex-col sm:flex-row gap-5 justify-between items-start">
                <!-- address -->
               
                <!-- address -->
                <div class="sm:w-1/2 w-full h-full flex flex-col justify-start items-center lg:items-start">

                    <img src="{{ asset('img/logoFooter.png') }}" alt="" class="w-45">

                    <div class="flex flex-col gap-2 items-center text-xs lg:text-sm xl:text-md text-center">
                        <span class="text-lg text-white font-bold">
                            {{ $setting['footerBrandName'] }}
                        </span>

                        <p class="text-gray-300">
                            {{ $setting['footerBrandDescription'] }}
                        </p>
                    </div>

    
                </div>
             
                <!-- servis -->
                <div class="sm:w-1/2 w-full h-full flex flex-col gap-3 justify-start items-start">
                    <div class="flex w-full h-full">
                        <div class="w-1/2 h-full flex flex-col gap-3 justify-start items-start">
                            <h5 class="xl:text-2xl lg:text-xl font-bold text-[var(--text)] text-white">{{ $setting['footerServicesTitle'] }}</h5>
                            <div
                                class="w-full flex flex-col gap-2 items-start justify-start xl:text-md lg:text-sm text-xs font-bold text-[#A4A4A5]">
                                @foreach ($setting['footerServices'] as $service)
                                <a href="{{ $service->url }}" class="hover:text-white transition duration-300 cursor-pointer">{{ $service->title }}</a>
                                @endforeach


                            </div>
                        </div>
                        <div class="w-1/2 h-full flex flex-col gap-3 justify-start items-start">
                            <h5 class="xl:text-2xl lg:text-xl font-bold text-[var(--text)] text-white">{{ $setting['footerCategoriesTitle'] }}</h5>
                            <div
                                class="w-full flex flex-col gap-1 items-start justify-start xl:text-md lg:text-sm text-xs font-bold text-[#A4A4A5]">
                                @foreach ($setting['footerCategories'] as $category)
                                <a href="{{ $category->url }}"
                                    class="hover:text-white transition duration-300 cursor-pointer">{{ $category->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- servis -->
            </div>
            <!-- news -->
            <div class="w-full md:w-1/3 h-full flex flex-col justify-center items-start">
                <div class="flex flex-col gap-3 justify-center items-start mx-auto">
                    <h5 class="xl:text-2xl lg:text-xl text-white font-bold">{{ $setting['footerAboutTitle'] }}</h5>
                    <div class="flex flex-col gap-2 items-start text-xs lg:text-sm xl:text-md">
                        <div class="flex justify-center items-center gap-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="lg:size-4 size-3 fill-green-700">
                                    <path
                                        d="M375.8 275.2c-16.4-7-35.4-2.4-46.7 11.4l-33.2 40.6c-46-26.7-84.4-65.1-111.1-111.1L225.3 183c13.8-11.3 18.5-30.3 11.4-46.7l-48-112C181.2 6.7 162.3-3.1 143.6 .9l-112 24C13.2 28.8 0 45.1 0 64v0C0 295.2 175.2 485.6 400.1 509.5c9.8 1 19.6 1.8 29.6 2.2c0 0 0 0 0 0c0 0 .1 0 .1 0c6.1 .2 12.1 .4 18.2 .4l0 0c18.9 0 35.2-13.2 39.1-31.6l24-112c4-18.7-5.8-37.6-23.4-45.1l-112-48zM441.5 464C225.8 460.5 51.5 286.2 48.1 70.5l99.2-21.3 43 100.4L154.4 179c-18.2 14.9-22.9 40.8-11.1 61.2c30.9 53.3 75.3 97.7 128.6 128.6c20.4 11.8 46.3 7.1 61.2-11.1l29.4-35.9 100.4 43L441.5 464zM48 64v0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0s0 0 0 0">
                                    </path>
                                </svg>
                            </div>
                            <span class="font-bold text-white">{{ $setting['footerPhone'] }}</span>
                        </div>
                        <div class="flex justify-center items-center gap-2">
                            <div>
                                <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"
                                    class="lg:size-4 size-3 fill-green-700">
                                    <path
                                        d="M1664 1504v-768q-32 36-69 66-268 206-426 338-51 43-83 67t-86.5 48.5-102.5 24.5h-2q-48 0-102.5-24.5t-86.5-48.5-83-67q-158-132-426-338-37-30-69-66v768q0 13 9.5 22.5t22.5 9.5h1472q13 0 22.5-9.5t9.5-22.5zm0-1051v-24.5l-.5-13-3-12.5-5.5-9-9-7.5-14-2.5h-1472q-13 0-22.5 9.5t-9.5 22.5q0 168 147 284 193 152 401 317 6 5 35 29.5t46 37.5 44.5 31.5 50.5 27.5 43 9h2q20 0 43-9t50.5-27.5 44.5-31.5 46-37.5 35-29.5q208-165 401-317 54-43 100.5-115.5t46.5-131.5zm128-37v1088q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-1088q0-66 47-113t113-47h1472q66 0 113 47t47 113z">
                                    </path>
                                </svg>
                            </div>
                            <span class=" font-bold text-white">{{ $setting['footerEmail'] }}</span>
                        </div>
                        <div class="flex justify-center items-center gap-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                    class="lg:size-4 size-3 fill-green-700">
                                    <path
                                        d="M336 192c0-79.5-64.5-144-144-144S48 112.5 48 192c0 16.3 7.7 42 24.7 75.4c16.4 32.2 38.8 66.4 62.1 98.3c20.3 27.9 40.7 53.3 57.2 73.1c16.5-19.8 36.9-45.2 57.2-73.1c23.2-31.9 45.6-66.2 62.1-98.3C328.3 234 336 208.3 336 192zm48 0c0 83.1-105.6 219-160.2 283.6C204.8 498.1 192 512 192 512s-12.8-13.9-31.8-36.4C105.6 411 0 275.1 0 192C0 86 86 0 192 0S384 86 384 192zm-160 0a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm-112 0a80 80 0 1 1 160 0 80 80 0 1 1 -160 0z">
                                    </path>
                                </svg>
                            </div>
                            <span class=" font-bold text-white">{{ $setting['footerAddress'] }}</span>
                        </div>
                    </div>
                </div>
                <!-- social_network_svg -->
                <div class="w-full py-6 flex items-center justify-center gap-10">
                    <a href="{{ $setting['footerInstagram'] }}"
                        class="p-2 rounded-full bg-[var(--background)] border border-green-700 flex justify-center items-center cursor-pointer scale transition_root">
                        <svg class="sm:size-5 size-4 fill-green-700" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint0_radial_87_7153)"/>
                            <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint1_radial_87_7153)"/>
                            <rect x="2" y="2" width="28" height="28" rx="6" fill="url(#paint2_radial_87_7153)"/>
                            <path d="M23 10.5C23 11.3284 22.3284 12 21.5 12C20.6716 12 20 11.3284 20 10.5C20 9.67157 20.6716 9 21.5 9C22.3284 9 23 9.67157 23 10.5Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 21C18.7614 21 21 18.7614 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21ZM16 19C17.6569 19 19 17.6569 19 16C19 14.3431 17.6569 13 16 13C14.3431 13 13 14.3431 13 16C13 17.6569 14.3431 19 16 19Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 15.6C6 12.2397 6 10.5595 6.65396 9.27606C7.2292 8.14708 8.14708 7.2292 9.27606 6.65396C10.5595 6 12.2397 6 15.6 6H16.4C19.7603 6 21.4405 6 22.7239 6.65396C23.8529 7.2292 24.7708 8.14708 25.346 9.27606C26 10.5595 26 12.2397 26 15.6V16.4C26 19.7603 26 21.4405 25.346 22.7239C24.7708 23.8529 23.8529 24.7708 22.7239 25.346C21.4405 26 19.7603 26 16.4 26H15.6C12.2397 26 10.5595 26 9.27606 25.346C8.14708 24.7708 7.2292 23.8529 6.65396 22.7239C6 21.4405 6 19.7603 6 16.4V15.6ZM15.6 8H16.4C18.1132 8 19.2777 8.00156 20.1779 8.0751C21.0548 8.14674 21.5032 8.27659 21.816 8.43597C22.5686 8.81947 23.1805 9.43139 23.564 10.184C23.7234 10.4968 23.8533 10.9452 23.9249 11.8221C23.9984 12.7223 24 13.8868 24 15.6V16.4C24 18.1132 23.9984 19.2777 23.9249 20.1779C23.8533 21.0548 23.7234 21.5032 23.564 21.816C23.1805 22.5686 22.5686 23.1805 21.816 23.564C21.5032 23.7234 21.0548 23.8533 20.1779 23.9249C19.2777 23.9984 18.1132 24 16.4 24H15.6C13.8868 24 12.7223 23.9984 11.8221 23.9249C10.9452 23.8533 10.4968 23.7234 10.184 23.564C9.43139 23.1805 8.81947 22.5686 8.43597 21.816C8.27659 21.5032 8.14674 21.0548 8.0751 20.1779C8.00156 19.2777 8 18.1132 8 16.4V15.6C8 13.8868 8.00156 12.7223 8.0751 11.8221C8.14674 10.9452 8.27659 10.4968 8.43597 10.184C8.81947 9.43139 9.43139 8.81947 10.184 8.43597C10.4968 8.27659 10.9452 8.14674 11.8221 8.0751C12.7223 8.00156 13.8868 8 15.6 8Z" fill="white"/>
                            <defs>
                                <radialGradient id="paint0_radial_87_7153" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(12 23) rotate(-55.3758) scale(25.5196)">
                                    <stop stop-color="#B13589"/>
                                    <stop offset="0.79309" stop-color="#C62F94"/>
                                    <stop offset="1" stop-color="#8A3AC8"/>
                                </radialGradient>
                                <radialGradient id="paint1_radial_87_7153" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(11 31) rotate(-65.1363) scale(22.5942)">
                                    <stop stop-color="#E0E8B7"/>
                                    <stop offset="0.444662" stop-color="#FB8A2E"/>
                                    <stop offset="0.71474" stop-color="#E2425C"/>
                                    <stop offset="1" stop-color="#E2425C" stop-opacity="0"/>
                                </radialGradient>
                                <radialGradient id="paint2_radial_87_7153" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(0.500002 3) rotate(-8.1301) scale(38.8909 8.31836)">
                                    <stop offset="0.156701" stop-color="#406ADC"/>
                                    <stop offset="0.467799" stop-color="#6A45BE"/>
                                    <stop offset="1" stop-color="#6A45BE" stop-opacity="0"/>
                                </radialGradient>
                            </defs>
                        </svg>
                    </a>
                    <a href="{{ $setting['footerTelegram'] }}"
                        class="p-2 rounded-full bg-[var(--background)] border border-green-700 flex justify-center items-center cursor-pointer scale transition_root">

                        <svg class="sm:size-5 size-4 fill-green-700" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16" cy="16" r="14" fill="url(#paint0_linear_87_7225)"/>
                            <path d="M22.9866 10.2088C23.1112 9.40332 22.3454 8.76755 21.6292 9.082L7.36482 15.3448C6.85123 15.5703 6.8888 16.3483 7.42147 16.5179L10.3631 17.4547C10.9246 17.6335 11.5325 17.541 12.0228 17.2023L18.655 12.6203C18.855 12.4821 19.073 12.7665 18.9021 12.9426L14.1281 17.8646C13.665 18.3421 13.7569 19.1512 14.314 19.5005L19.659 22.8523C20.2585 23.2282 21.0297 22.8506 21.1418 22.1261L22.9866 10.2088Z" fill="white"/>
                            <defs>
                                <linearGradient id="paint0_linear_87_7225" x1="16" y1="2" x2="16" y2="30" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#37BBFE"/>
                                    <stop offset="1" stop-color="#007DBB"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </a>
                    <a href="{{ $setting['footerRubika'] }}"
                        class="p-2 rounded-full bg-[var(--background)] border border-green-700 flex justify-center items-center cursor-pointer scale transition_root">
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
                    </a>
                    <a href="{{ $setting['footerBale'] }}"
                        class="w-10 h-10 shrink-0 rounded-full bg-[var(--background)] border border-green-700 flex justify-center items-center cursor-pointer scale transition_root">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5" viewBox="0 0 1000 1000">
                        <path
                            fill="#0BC49A"
                            d="M0 500 C0 225 0 0 60 0 C110 0 160 50 208 95 C330 -15 510 -20 660 20 C865 75 1000 250 1000 500 C1000 776 776 1000 500 1000 C224 1000 0 776 0 500Z"
                        />
                        <path
                            d="M278 502 L434 657 L723 367"
                            fill="none"
                            stroke="#FFFFFF"
                            stroke-width="145"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        </svg>

                    </a>
                    <a href="{{ $setting['footerEitaa'] }}"
                        class="p-2 rounded-full bg-[var(--background)] border border-green-700 flex justify-center items-center cursor-pointer scale transition_root">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3584.55 3673.6">
                            <g id="Isolation_Mode" data-name="Isolation Mode">
                                <path d="M1071.43,2.75H2607.66C3171,2.75,3631.82,462.91,3631.82,1026.2v493.93c-505,227-1014.43,1348.12-1756.93,1104.51-61.16,43.46-202.11,222.55-212,358.43-257.11-34.24-553.52-328.88-517.95-646.62C717,2026.91,1070.39,1455.5,1409.74,1225.51c727.32-492.94,1737.05-69,1175.39,283.45-341.52,214.31-1071.84,355.88-995.91-170.24-200.34,57.78-328.58,431.34-87.37,626-223.45,219.53-180.49,623.07,58.36,755.57,241.56-625.87,1082.31-544.08,1422-1291.2,255.57-562-123.34-1202.37-880.91-1104C1529.56,399.34,993.64,881.63,725.62,1453.64,453.68,2034,494.15,2811.15,1052.55,3202.82c657.15,460.92,1356.78,34.13,1780.52-523.68,249.77-328.78,468-693,798.75-903.37v875.72c0,563.28-460.88,1024.86-1024.16,1024.86H1071.43c-563.29,0-1024.16-460.87-1024.16-1024.16V1026.9C47.27,463.61,508.14,2.74,1071.43,2.74Z" transform="translate(-47.27 -2.74)" fill="#ee7f22" fill-rule="evenodd"/>
                            </g>
                        </svg>
                    </a>
                    
                </div>
                <!-- social_network_svg -->
            </div>
            <!-- news -->
        </div>
        
        <!-- Support & Purchase -->
        <div class="w-full flex flex-col items-center justify-center gap-2 py-3 text-center">

            <p class="text-sm text-gray-300">
                پشتیبانی:
                <a href="tel:09038649953" dir="ltr"
                class="font-bold text-white hover:text-green-300 transition">
                    09038649953
                </a>
            </p>

            <p class="text-sm text-gray-300">
                ارتباط با مشاوران و خرید:
                <a href="tel:09373924987" dir="ltr"
                class="font-bold text-white hover:text-green-300 transition">
                    09373924987
                </a>
            </p>

        </div>

        <div class="w-full pt-4 border-t border-gray-400 flex flex-col gap-1 items-center justify-center">
            <p class="xl:text-[15px] lg:text-[12px] text-[13px] text-gray-300">{{ $setting['footerDesignerText'] }}</p>
            <span class="text-[17px] font-bold text-white">{{ $setting['footerDesignerPhone'] }}</span>
        </div>
    </section>
</footer>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
</body>

</html>