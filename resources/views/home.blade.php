
@extends('app.document')

@section('title', 'فروشگاه شهرپشم')

@section('content')

<style>
    :root {
        --shahr-green: #1E3F34;
        --shahr-green-dark: #142E26;
        --shahr-cream: #F5F0E6;
        --shahr-beige: #C6A77D;
        --shahr-text: #263C32;
        --shahr-muted: #7C887F;
    }

    .shahr-home {
        color: var(--shahr-text);
        overflow: hidden;
    }

    .shahr-container {
        width: 91.666%;
        max-width: 1440px;
        margin-inline: auto;
    }

    .shahr-section {
        padding-block: 65px;
    }

    .shahr-section-heading {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 30px;
    }

    .shahr-section-heading::before {
        content: '';
        width: 42px;
        height: 3px;
        background: var(--shahr-beige);
        border-radius: 10px;
    }

    .shahr-section-heading h2 {
        font-size: clamp(20px, 2vw, 28px);
        font-weight: 800;
        color: var(--shahr-green);
    }

    .shahr-btn {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        background: var(--shahr-green);
        color: white;
        padding: 13px 24px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 700;
        transition: .3s ease;
        cursor: pointer;
    }

    .shahr-btn:hover {
        background: var(--shahr-green-dark);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px #1E3F3425;
    }

    .shahr-btn svg {
        transition: .3s ease;
    }

    .shahr-btn:hover svg {
        transform: translateX(-5px);
    }

    /* Hero */

    .shahr-hero {
        position: relative;
        width: 100%;
        min-height: 520px;
        overflow: hidden;
        background: var(--shahr-cream);
    }

    .shahr-hero > img {
        width: 100%;
        height: 520px;
        object-fit: cover;
        display: block;
    }

    .shahr-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(
            270deg,
            rgba(245,240,230,.96) 0%,
            rgba(245,240,230,.85) 32%,
            rgba(245,240,230,.20) 65%,
            transparent 100%
        );
        pointer-events: none;
    }

    .shahr-hero-content {
        position: absolute;
        z-index: 2;
        top: 50%;
        right: 9%;
        transform: translateY(-50%);
        width: 44%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 23px;
    }

    .shahr-hero-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--shahr-green);
        background: #FFFFFFB8;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 700;
    }

    .shahr-hero-title {
        display: flex;
        flex-direction: column;
        gap: 7px;
        font-size: clamp(34px, 4.8vw, 67px);
        line-height: 1.45;
        font-weight: 900;
        color: var(--shahr-green);
    }

    .shahr-hero-title span:last-child {
        color: #9B7A50;
    }

    .shahr-hero-subtitle {
        display: flex;
        flex-direction: column;
        gap: 7px;
        font-size: clamp(13px, 1.3vw, 17px);
        line-height: 2;
        color: #46594D;
    }

    /* Categories */

    .shahr-categories {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .shahr-category {
        position: relative;
        height: 245px;
        overflow: hidden;
        border-radius: 20px;
        background: var(--shahr-cream);
        isolation: isolate;
    }

    .shahr-category > img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .6s ease;
    }

    .shahr-category::after {
        content: '';
        position: absolute;
        inset: 0;
        z-index: 1;
        background: linear-gradient(
            270deg,
            rgba(245,240,230,.96) 0%,
            rgba(245,240,230,.77) 48%,
            rgba(245,240,230,.05) 100%
        );
    }

    .shahr-category:hover > img {
        transform: scale(1.07);
    }

    .shahr-category-content {
        position: absolute;
        z-index: 2;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        width: 65%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 14px;
    }

    .shahr-category-content h3 {
        font-size: 22px;
        font-weight: 900;
        color: var(--shahr-green);
    }

    .shahr-category-content p {
        font-size: 13px;
        line-height: 2;
        color: #526258;
    }

    .shahr-category-arrow {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        background: var(--shahr-green);
        transition: .3s;
    }

    .shahr-category:hover .shahr-category-arrow {
        background: var(--shahr-beige);
        transform: translateX(-5px);
    }

    /* Services */

    .shahr-services {
        background: var(--shahr-cream);
        padding-block: 28px;
    }

    .shahr-services-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 20px;
    }

    .shahr-service {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 13px;
        border-left: 1px solid #1E3F3420;
    }

    .shahr-service:last-child {
        border-left: none;
    }

    .shahr-service-icon {
        flex-shrink: 0;
        width: 58px;
        height: 58px;
        background: white;
        border-radius: 17px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
    }

    .shahr-service-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .shahr-service h3 {
        font-size: 15px;
        font-weight: 800;
        color: var(--shahr-green);
        margin-bottom: 5px;
    }

    .shahr-service p {
        font-size: 12px;
        line-height: 1.9;
        color: var(--shahr-muted);
    }

    /* About */

    .shahr-about {
        position: relative;
        min-height: 400px;
        border-radius: 24px;
        overflow: hidden;
        background: var(--shahr-cream);
    }

    .shahr-about > img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .shahr-about::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(
            270deg,
            rgba(245,240,230,.97) 0%,
            rgba(245,240,230,.92) 40%,
            rgba(245,240,230,.10) 100%
        );
    }

    .shahr-about-content {
        position: relative;
        z-index: 2;
        width: 53%;
        padding: 55px 50px;
    }

    .shahr-about-content h3 {
        color: var(--shahr-green);
        font-size: clamp(23px, 2.6vw, 35px);
        font-weight: 900;
        line-height: 1.8;
        margin-block: 15px;
    }

    .shahr-about-content p {
        color: #4F6055;
        font-size: 14px;
        line-height: 2.5;
        white-space: pre-line;
    }

    /* Products */

    .shahr-products {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 20px;
    }

    .shahr-product {
        min-width: 0;
        overflow: hidden;
        background: white;
        border: 1px solid #1E3F3415;
        border-radius: 18px;
        transition: .35s ease;
    }

    .shahr-product:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 35px #1E3F3414;
        border-color: #C6A77D80;
    }

    .shahr-product-image {
        position: relative;
        display: block;
        height: 210px;
        overflow: hidden;
        background: var(--shahr-cream);
    }

    .shahr-product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .shahr-product:hover .shahr-product-image img {
        transform: scale(1.06);
    }

    .shahr-product-body {
        padding: 15px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .shahr-product-title {
        height: 48px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        color: var(--shahr-green);
        font-size: 14px;
        line-height: 1.9;
        font-weight: 800;
    }

    .shahr-product-price {
        min-height: 27px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px;
    }

    .shahr-product-price strong {
        color: var(--shahr-green);
        font-size: 15px;
        font-weight: 900;
    }

    .shahr-product-price del {
        color: #9CA39D;
        font-size: 12px;
    }

    .shahr-cart-button {
        width: 100%;
        min-height: 43px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        background: #EAF0E9;
        color: var(--shahr-green);
        font-size: 12px;
        font-weight: 800;
        transition: .3s;
        cursor: pointer;
    }

    .shahr-cart-button:hover {
        background: var(--shahr-green);
        color: white;
    }

    .shahr-cart-button svg {
        width: 17px;
        height: 17px;
        fill: currentColor;
    }

    .shahr-cart-button.out-of-stock {
        background: #F3E8E5;
        color: #A45C4F;
        cursor: not-allowed;
    }

    @media(max-width: 1024px) {
        .shahr-products {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .shahr-services-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .shahr-service:nth-child(2) {
            border-left: none;
        }

        .shahr-categories {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .shahr-hero-content {
            width: 55%;
        }
    }

    @media(max-width: 640px) {
        .shahr-container {
            width: 92%;
        }

        .shahr-section {
            padding-block: 38px;
        }

        .shahr-section-heading {
            margin-bottom: 20px;
            gap: 9px;
        }

        .shahr-section-heading::before {
            width: 25px;
        }

        .shahr-hero {
            min-height: 390px;
        }

        .shahr-hero > img {
            height: 390px;
            object-position: center;
        }

        .shahr-hero::after {
            background: linear-gradient(
                0deg,
                rgba(245,240,230,.98) 0%,
                rgba(245,240,230,.90) 48%,
                rgba(245,240,230,.05) 100%
            );
        }

        .shahr-hero-content {
            top: auto;
            bottom: 24px;
            right: 5%;
            transform: none;
            width: 90%;
            gap: 12px;
        }

        .shahr-hero-title {
            font-size: 31px;
            line-height: 1.6;
        }

        .shahr-hero-subtitle {
            font-size: 12px;
            line-height: 1.9;
        }

        .shahr-hero-tag {
            font-size: 11px;
            padding: 6px 12px;
        }

        .shahr-btn {
            padding: 10px 17px;
            font-size: 12px;
        }

        .shahr-categories {
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .shahr-category {
            height: 180px;
            border-radius: 16px;
        }

        .shahr-category-content {
            right: 17px;
            width: 65%;
            gap: 8px;
        }

        .shahr-category-content h3 {
            font-size: 18px;
        }

        .shahr-category-content p {
            font-size: 12px;
        }

        .shahr-category-arrow {
            width: 32px;
            height: 32px;
        }

        .shahr-services {
            padding-block: 18px;
        }

        .shahr-services-grid {
            gap: 8px;
        }

        .shahr-service {
            padding: 9px 4px;
            gap: 8px;
            border-left: none;
        }

        .shahr-service-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            padding: 7px;
        }

        .shahr-service h3 {
            font-size: 11px;
        }

        .shahr-service p {
            font-size: 10px;
        }

        .shahr-about {
            min-height: 380px;
            border-radius: 18px;
        }

        .shahr-about::after {
            background: linear-gradient(
                0deg,
                rgba(245,240,230,.98) 0%,
                rgba(245,240,230,.92) 65%,
                rgba(245,240,230,.1) 100%
            );
        }

        .shahr-about-content {
            width: 100%;
            padding: 175px 20px 24px;
        }

        .shahr-about-content h3 {
            font-size: 23px;
            line-height: 1.8;
        }

        .shahr-about-content p {
            font-size: 12px;
            line-height: 2.2;
        }

        .shahr-products {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .shahr-product {
            border-radius: 14px;
        }

        .shahr-product-image {
            height: 155px;
        }

        .shahr-product-body {
            padding: 10px;
            gap: 10px;
        }

        .shahr-product-title {
            font-size: 12px;
            height: 43px;
        }

        .shahr-product-price strong {
            font-size: 12px;
        }

        .shahr-product-price del {
            font-size: 10px;
        }

        .shahr-cart-button {
            min-height: 39px;
            font-size: 10px;
        }
    }
</style>

<main class="shahr-home flex flex-col">

    {{-- HERO --}}
    <section id="hiro" class="shahr-hero">

        <img
            src="{{ asset('storage/'.$setting['heroBanner']) }}"
            alt="محصولات پشمی شهرپشم"
        >

        <div class="shahr-hero-content">

            @php
                $titleParts = explode('|', $setting['heroTitle']);
            @endphp

            <h1 class="shahr-hero-title">
                @foreach($titleParts as $part)
                    <span>{{ trim($part) }}</span>
                @endforeach
            </h1>

            @php
                $subTitleParts = explode('|', $setting['heroSubtitle']);
            @endphp

            <div class="shahr-hero-subtitle">
                @foreach($subTitleParts as $part)
                    <span>{{ trim($part) }}</span>
                @endforeach
            </div>

            <a href="{{ route('product.index') }}" class="shahr-btn">
                {{ $setting['heroPrimaryButton'] }}

                <svg xmlns="http://www.w3.org/2000/svg"
                    width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
            </a>

        </div>
    </section>


    {{-- CATEGORIES --}}
    <section id="category" class="shahr-section">

        <div class="shahr-container">

            <div class="shahr-section-heading">
                <h2>دسته‌بندی محصولات</h2>
            </div>

            <div class="shahr-categories">

                @foreach ($categories as $cat)
                    @if ($cat->title != "بدون دسته بندی")

                        <a href="{{ route('product.index') }}"
                            class="shahr-category">

                            <img
                                src="{{ asset('storage/'.$cat->image) }}"
                                alt="{{ $cat->title }}"
                                loading="lazy"
                            >

                            <div class="shahr-category-content">

                                <h3>{{ $cat->title }}</h3>

                                <p>{{ $cat->description }}</p>

                                <span class="shahr-category-arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="19" height="19"
                                        viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
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
    <section id="خدمات" class="shahr-services">

        <div class="shahr-container">

            <div class="shahr-services-grid">

                @for($i = 1; $i <= 4; $i++)

                    <div class="shahr-service">

                        <div class="shahr-service-icon">
                            <img
                                src="{{ asset('storage/'.$setting['serviceImage'.$i]) }}"
                                alt=""
                                loading="lazy"
                            >
                        </div>

                        <div>
                            <h3>
                                {{ $setting['serviceTitle'.$i] }}
                            </h3>

                            <p>
                                {{ $setting['serviceSubTitle'.$i] }}
                            </p>
                        </div>

                    </div>

                @endfor

            </div>
        </div>
    </section>


    {{-- ABOUT --}}
    <section id="about" class="shahr-section">

        <div class="shahr-container">

            <div class="shahr-about">

                <img
                    src="{{ asset('storage/'.$setting['secondBanner']) }}"
                    alt="درباره شهرپشم"
                    loading="lazy"
                >

                <div class="shahr-about-content">

                    <div class="shahr-section-heading mb-0">
                        <h2>درباره ما</h2>
                    </div>

                    <h3>
                        {{ $setting['secondBannerTitle'] }}
                    </h3>

                    <p>{{ $setting['secondBannerSubtitle'] }}</p>

                    <a href="{{ route('aboutUs.list') }}"
                        class="shahr-btn mt-5">

                        {{ $setting['secondBannerButton'] }}

                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M19 12H5M12 19l-7-7 7-7"/>
                        </svg>

                    </a>

                </div>
            </div>
        </div>
    </section>


    {{-- POPULAR PRODUCTS --}}
    <section id="محبوب ترین محصولات" class="shahr-section pt-0">

        <div class="shahr-container">

            <div class="shahr-section-heading">
                <h2>محبوب‌ترین محصولات</h2>
            </div>

            <div class="shahr-products">

                @foreach ($products as $product)

                    <div class="shahr-product products"
                        data-product-id="{{ $product->id }}">

                        <a
                            href="{{ route('product.show', [$product->id]) }}"
                            class="shahr-product-image"
                        >
                            <img
                                src="{{ asset('storage/'.$product->image) }}"
                                alt="{{ $product->title }}"
                                loading="lazy"
                            >
                        </a>

                        <div class="shahr-product-body">

                            <a
                                href="{{ route('product.show', [$product->id]) }}"
                                class="shahr-product-title"
                            >
                                {{ $product->title }}
                            </a>

                            <div class="shahr-product-price">

                                @if($product->secondary_price)

                                    <strong class="in-fa">
                                        {{ number_format($product->secondary_price) }}
                                        تومان
                                    </strong>

                                    <del class="in-fa">
                                        {{ number_format($product->primary_price) }}
                                        تومان
                                    </del>

                                @else

                                    <strong class="in-fa">
                                        {{ number_format($product->primary_price) }}
                                        تومان
                                    </strong>

                                @endif

                            </div>

                            <div class="addToCartBtns"
                                data-product-id="{{ $product->id }}">

                                @if ($product->count > 0)

                                    <button
                                        onclick="addToCart(this)"
                                        class="shahr-cart-button"
                                    >

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512">
                                            <path d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 0 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 0 0 112 0z"/>
                                        </svg>

                                        افزودن به سبد خرید

                                    </button>

                                @else

                                    <button
                                        class="shahr-cart-button out-of-stock"
                                        disabled
                                    >
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
