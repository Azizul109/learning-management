@extends('layouts.frontend.index')
@section('content')
    <style type="text/css">
        /* importing google fonts */
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        /* declaring css variables */
        :root {
            --secondary-font: "DM Serif Display", serif;

            --text-color: #2d3f31;
            --text-color-2: #6a6f73;
            --udemy-color: #5624d0;

            --dropdown-box-shadow: 0 0 0 1px #d1d7dc, 0 2px 4px rgba(0, 0, 0, .08), 0 4px 12px rgba(0, 0, 0, .08);
        }

        /* reset default browser styles */
        html {
            font-size: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        ul,
        li {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: black;
            cursor: pointer;
        }

        body {
            font-family: var(--primary-font);
        }

        /* util classes for document */
        .btn {}

        .btn.reverse {
            background: black;
            color: white;

        }

        .btn-icon {
            min-width: auto;
            padding: 0 1.4rem;
        }

        /* utils for margin */
        .m-0 {
            margin: 0 !important;
        }

        .mt-1 {
            margin-top: 1rem !important;
        }

        .mb-1 {
            margin-bottom: 1rem !important;
        }

        .ml-1 {
            margin-left: 1rem !important;
        }

        .mr-1 {
            margin-right: 1rem !important;
        }

        .mt-2 {
            margin-top: 2rem !important;
        }

        .mb-2 {
            margin-bottom: 2rem !important;
        }

        .ml-2 {
            margin-left: 2rem !important;
        }

        .mr-2 {
            margin-right: 2rem !important;
        }

        .text-center {
            text-align: center;
        }

        /* util classed for bold */
        .b-100 {
            font-weight: 100 !important;
        }

        .b-200 {
            font-weight: 200 !important;
        }

        .b-300 {
            font-weight: 300 !important;
        }

        .b-400 {
            font-weight: 400 !important;
        }

        .b-500 {
            font-weight: 500 !important;
        }

        .b-600 {
            font-weight: 600 !important;
        }

        .b-700 {
            font-weight: 700 !important;
        }

        .s-color {
            color: var(--text-color-2);
        }

        .divider {
            width: 100%;
            height: 1px;
            background: #eee;
        }

        .plr-2 {
            padding: 0 2rem;
        }


        /* standard fonts for document */
        .lg-h-font {
            font-family: var(--secondary-font);
            font-size: 3.2rem;
        }

        .h-font {
            font-family: var(--primary-font);
            font-size: 1.9rem;
            font-weight: 400;
            text-align: center;
        }

        .p-font {
            font-size: 1.6rem;
            font-weight: 400;
            font-family: var(--primary-font);
        }

        .sm-font {
            font-size: 1.4rem;
            font-weight: 400;
            font-family: var(--primary-font);
        }

        /* styling top categories */
        .top-categories {
            max-width: 134rem;
            margin: 4rem auto;
        }

        .top-categories-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            padding: 5rem;
        }

        .top-categories-container .cat-img-wrapper h2 {
            margin: 1rem 0;
        }

        @media screen and (max-width: 1340px) {
            .top-categories {
                max-width: 100%;
                margin: 2rem;
            }

        }

        @media screen and (max-width: 760px) {
            .top-categories {
                margin: 2rem;
            }

            .top-categories-container {
                gap: 1rem;
            }

            .top-categories-container .cat-img-wrapper img {
                display: none;
            }

            .top-categories-container .cat-img-wrapper h2 {
                border: 1px solid black;
                padding: 1rem 2rem;
                border-radius: 2rem;
                margin: 0;
            }
        }

        /* styling udemy business */
        .udemy-business {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .business-promo-content {
            width: 40rem;
            margin-right: 4rem;
        }

        .ub-promo-img img {
            width: 40rem;
            height: 40rem;
        }

        .ub-logo {
            width: 20rem;
        }

        @media screen and (max-width: 900px) {
            .udemy-business {
                flex-direction: column-reverse;
            }

            .ub-promo-img {
                width: 100%;
                height: auto;
            }

            .ub-promo-img img {
                max-width: 100%;
                width: auto;
                object-fit: contain;
                display: block;
                margin: 2rem auto;
            }

            .business-promo-content {
                width: 100%;
                margin-right: 0;
                padding: 4rem;
            }
        }

        /* styling udemy instructor */
        .udemy-instructor {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .u-instructor-container img {
            max-width: 100%;
            object-fit: contain;
        }

        .instructor-content {
            width: 40rem;
            margin-left: 4rem;
        }

        @media screen and (max-width: 1340px) {
            .udemy-instructor {
                flex-direction: column;
            }

            .instructor-content {
                width: 100%;
                margin-left: 0;
                padding: 4rem;
                text-align: center;
            }

            .action-btns button {
                width: 100%;
            }
        }
    </style>
    <!-- content start -->
    <div class="container-fluid p-0 home-content">
        <!-- banner start -->
        <div class="homepage-slide-blue">
            <h1>{{ Sitehelpers::get_option('pageHome', 'banner_title') }}</h1>
            <span class="title-sub-header">{{ Sitehelpers::get_option('pageHome', 'banner_text') }}</span>
            <form method="GET" action="{{ route('course.list') }}">
                <div class="searchbox-contrainer col-md-6 mx-auto">
                    <input name="keyword" type="text" class="searchbox d-none d-sm-inline-block"
                        placeholder="Search for courses by course titles"><input name="keyword" type="text"
                        class="searchbox d-inline-block d-sm-none" placeholder="Search for courses"><button type="submit"
                        class="searchbox-submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <!-- banner end -->

        <?php
        $tabs = ['latestTab' => 'Latest Courses', 'freeTab' => 'Free Courses', 'discountTab' => 'Discount Courses'];
        ?>
        <nav class="clearfix secondary-nav seperator-head">
            <ul class="secondary-nav-ul list mx-auto nav">
                <?php foreach ($tabs as $tab_key => $tab_value) { ?>
                <li class="nav-item">
                    <a data-toggle="tab" role="tab" href="<?php echo '#' . $tab_key; ?>"
                        class="nav-link <?php echo $tab_key == 'latestTab' ? 'active' : ''; ?>"><?php echo $tab_value; ?></a>
                </li>
                <?php }?>
            </ul>
        </nav>

        <!-- course list start -->
        <div class="container tab-content">
            <?php foreach ($tabs as $tab_key => $tab_value) { ?>
            <div class="<?php echo $tab_key == 'latestTab' ? 'tab-pane fade show active' : 'tab-pane fade'; ?>" id="<?php echo $tab_key; ?>" role="tabpanel">

                <div class="row">
                    @foreach (${$tab_key . '_courses'} as $course)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">

                            <div class="course-block mx-auto">
                                <a href="{{ route('course.view', $course->course_slug) }}">
                                    <main>
                                        <img
                                            src="@if (Storage::exists($course->thumb_image)) {{ Storage::url($course->thumb_image) }}@else{{ asset('backend/assets/images/course_detail_thumb.jpg') }} @endif">
                                        <div class="col-md-12">
                                            <h6 class="course-title">{{ $course->course_title }}</h6>
                                        </div>

                                        <div class="instructor-clist">
                                            <div class="col-md-12">
                                                <i class="fa fa-chalkboard-teacher"></i>&nbsp;
                                                <span>Created by
                                                    <b>{{ $course->first_name . ' ' . $course->last_name }}</b></span>
                                            </div>
                                        </div>
                                    </main>
                                    <footer>
                                        <div class="c-row">
                                            <div class="col-md-6 col-sm-6 col-6">
                                                @php $course_price = $course->price ? config('config.default_currency').$course->price : 'Free'; @endphp
                                                <h5 class="course-price">
                                                    {{ $course_price }}&nbsp;<s>{{ $course->strike_out_price ? $course->strike_out_price : '' }}</s>
                                                </h5>
                                            </div>
                                            <div class="col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-5 offset-1">
                                                <star class="course-rating">
                                                    @for ($r = 1; $r <= 5; $r++)
                                                        <span
                                                            class="fa fa-star {{ $r <= $course->average_rating ? 'checked' : '' }}"></span>
                                                    @endfor
                                                </star>
                                            </div>
                                        </div>
                                    </footer>
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
            <?php }?>

        </div>
        <!-- course list end -->

        <!-- dummy block start -->
        <article class="learn-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <h3 class="dblock-heading">{{ Sitehelpers::get_option('pageHome', 'learn_block_title') }}</h3>
                        <p class="dblock-text">{!! Sitehelpers::get_option('pageHome', 'learn_block_text') !!}</p>
                        <a href="{{ route('course.list') }}" class="btn btn-ulearn">Explore Courses</a>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 vertical-align">
                        <img class="img-fluid mt-5 mx-auto" src="{{ asset('frontend/img/landing.png') }}">
                    </div>
                </div>
            </div>
        </article>
        <!-- dummy block end -->

        <!-- instructor block start -->
        <article class="instructor-block">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center seperator-head mt-3">
                        <h3>Our Instructors</h3>
                        <p class="mt-3">{{ Sitehelpers::get_option('pageHome', 'instructor_text') }}</p>
                    </div>
                </div>

                <div class="row mt-4 mb-5">
                    @foreach ($instructors as $instructor)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="instructor-box mx-auto text-center">
                                <a href="{{ route('instructor.view', $instructor->instructor_slug) }}">
                                    <main>
                                        <img
                                            src="@if (Storage::exists($instructor->instructor_image)) {{ Storage::url($instructor->instructor_image) }}@else{{ asset('backend/assets/images/course_detail_thumb.jpg') }} @endif">
                                        <div class="col-md-12">
                                            <h6 class="instructor-title">
                                                {{ $instructor->first_name . ' ' . $instructor->last_name }}</h6>
                                            <p>{!! mb_strimwidth($instructor->biography, 0, 120, '.....') !!}</p>
                                        </div>
                                    </main>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
        <!-- instructor block end -->

        <section class="top-categories">
            <h2 class="h-font b-700 mt-2 mb-2">Top Categories</h2>

            <div class="top-categories-container">

                <div class="top-categories-container">
                    <div class="cat-img-wrapper">
                        <div class="cat-img-container">
                            <img src="{{ asset('public/frontend/img/assets/top-categories/lohp-category-design-v2.jpg') }}"
                                alt="design">
                        </div>
                        <h2 class="p-font b-500">Design</h2>
                    </div>

                    <div class="cat-img-wrapper">
                        <div class="cat-img-container">
                            <img src="{{ asset('public/frontend/img/assets/top-categories/lohp-category-development-v2.jpg') }}"
                                alt="design">
                        </div>
                        <h2 class="p-font b-500">Development</h2>
                    </div>

                    <div class="cat-img-wrapper">
                        <div class="cat-img-container">
                            <img src="{{ asset('public/frontend/img/assets/top-categories/lohp-category-marketing-v2.jpg') }}"
                                alt="design">
                        </div>
                        <h2 class="p-font b-500">Marketing</h2>
                    </div>

                    <div class="cat-img-wrapper">
                        <div class="cat-img-container">
                            <img src="{{ asset('public/frontend/img/assets/top-categories/lohp-category-it-and-software-v2') }}"
                                alt="design">
                        </div>
                        <h2 class="p-font b-500">IT and Software</h2>
                    </div>

                    <div class="cat-img-wrapper">
                        <div class="cat-img-container">
                            <img src="{{ asset('public/frontend/img/assets/top-categories/lohp-category-personal-development-v2.jpg') }}"
                                alt="design">
                        </div>
                        <h2 class="p-font b-500">Personal Development</h2>
                    </div>

                    <div class="cat-img-wrapper">
                        <div class="cat-img-container">
                            <img src="{{ asset('public/frontend/img/assets/top-categories/lohp-category-business-v2.jpg') }}"
                                alt="design">
                        </div>
                        <h2 class="p-font b-500">Business</h2>
                    </div>

                    <div class="cat-img-wrapper">
                        <div class="cat-img-container">
                            <img src="{{ asset('public/frontend/img/assets/top-categories/lohp-category-photography-v2.jpg') }}"
                                alt="design">
                        </div>
                        <h2 class="p-font b-500">Photography</h2>
                    </div>

                    <div class="cat-img-wrapper">
                        <div class="cat-img-container">
                            <img src="{{ asset('public/frontend/img/assets/top-categories/lohp-category-music-v2.jpg') }}"
                                alt="design">
                        </div>
                        <h2 class="p-font b-500">Music</h2>
                    </div>

                </div>

            </div>
        </section>

        <!-- Business section -->
        <section class="udemy-business">
            <div class="business-promo-content">
                <div class="ub-logo">
                    <img src="{{ asset('public/frontend/img/assets/logo-ub.svg') }}" alt="">
                </div>
                <h2 class="lg-h-font">Upskill your team with Udemy Business</h2>
                <ul class="p-font mt-2">
                    <li>Unlimited access to 25,000+ top Udemy courses, anytime, anywhere</li>
                    <li>International course collection in 14 languages</li>
                    <li>Top certifications in tech and business</li>
                </ul>

                <div class="action-btns mt-2 mb-2">
                    <button class="btn reverse plr-2">Get Udemy Business</button>
                    <button class="btn mt-2 plr-2">Learn more</button>
                </div>
            </div>

            <div class="ub-promo-img">
                <img src="{{ asset('public/frontend/img/assets/UB_Promo_800x800.jpg') }}" alt="">
            </div>
        </section>

        <!--Become instructor-->
        <section class="udemy-instructor">
            <div class="u-instructor-container">
                <img src="{{ asset('public/frontend/img/assets/instructor-1x-v3.jpg') }}" alt="">
            </div>

            <div class="instructor-content">
                <h2 class="lg-h-font">Become an instructor</h2>
                <p class="p-font mt-2 mb-2">Instructors from around the world teach millions of learners on Udemy. We
                    provide the tools and skills to teach what you love.</p>

                <div class="action-btns">
                    <button class="btn reverse plr-2">Start Teaching Today</button>
                </div>
            </div>
        </section>
    </div>
    <!-- content end -->
@endsection
