<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the form data is available
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_POST['type'];

    // Combine type into a habit string
    $habit = json_encode(['type' => $type]);

    // Data to send in the POST request
    $data = [
        'habit' => $habit
    ];

    // URL of the Flask endpoint
    $url = 'http://82.112.255.69:5009/generate_story_image';

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);

    // Execute cURL session and capture the response
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Decode the JSON response
    $responseData = json_decode($response, true);

    // Check for errors in the response
    if (isset($responseData['error'])) {
        echo "Error: " . $responseData['error'];
    } else {
        // Update the $story variable with the response data
        $story = $responseData;
    }
} else {
    $story = [
        'content_1' => [
            'text' => ' كان هناك صبي يحب القراءة ولاكنه لم يجد كتب تناسب عمره فبدأ بكتابة قصصه الخاصة وبدأ بنشرها على الانترنت واصبحت مشهورة',
            'image' => "https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930bad6a2d8a1eb8a5baa_image_light_girl_fairy-p-800.webp"
        ],
        'content_2' => [
            'text' => 'فبدأ الصبي بجني الاموال من خلال كتابة القصص واصبح يساعد الاطفال الاخرين في القراءة والكتابة',
            'image' => "https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930baa01d94f619748dc7_image_medium_boy_baseball.webp"
        ],
        'content_3' => [
            'text' => 'فاصبحت قصصه مشهورة واصبح يكتب قصص للكبار والصغار واصبح يعيش حياة سعيدة',
            'image' => "https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6639310e472b68b23bf33746_image_farm.webp"
        ]
    ];
}

// HTML form for input
?>




<!DOCTYPE html>
<!-- Last Published: Wed Aug 21 2024 17:05:46 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="www.AllamStories.Tech" data-wf-page="66355d354e187a71fa8b76f8" data-wf-site="66355d354e187a71fa8b76e6" lang="en">
<head>
    <meta charset="utf-8" />
    <title>حِكايات علّام - علم طفلك بامان</title>
    <meta content="يعد تشجيع الأطفال على القراءة ومساعدتهم على تطوير عادات إيجابية خطوات أساسية نحو تعزيز مستقبل أكثر إشراقًا." name="description" />
    <meta content="حِكايات علّام - علم طفلك بامان" property="og:title" />
    <meta content="يعد تشجيع الأطفال على القراءة ومساعدتهم على تطوير عادات إيجابية خطوات أساسية نحو تعزيز مستقبل أكثر إشراقًا." property="og:description" />
    <meta content="page_image.png" property="og:image" />
    <meta content="حِكايات علّام - علم طفلك بامان" property="twitter:title" />
    <meta content="يعد تشجيع الأطفال على القراءة ومساعدتهم على تطوير عادات إيجابية خطوات أساسية نحو تعزيز مستقبل أكثر إشراقًا." property="twitter:description" />
    <meta content="page_image.png" property="twitter:image" />
    <meta property="og:type" content="website" />
    <meta content="summary_large_image" name="twitter:card" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/css/royoroyo.webflow.75785997a.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">

    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);
    </script>
    <link href="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663bf2669ca970fc042af1db_favicon.png" rel="shortcut icon" type="image/x-icon" />
    <link href="https://cdn.prod.website-files.com/img/webclip.png" rel="apple-touch-icon" />
    <style>
        *{
            font-family: "Readex Pro", sans-serif !Important;
        }
        .preloader {
            display: flex;
        }

        .w-editor-body .preloader {
            display: none;
        }


        .audio-player {
            --player-button-width: 7vh;
            --sound-button-width: 7vh;
            --space: .5em;
            width: 2rem;
            height: 2rem;
        }





        .audio-icon {
            width: 100%;
            height: 100%;

        }



        .player-button {
            background-color: transparent;
            border: 0;
            width: var(--player-button-width);
            height: var(--player-button-width);
            cursor: pointer;
            padding: 0;

        }



    </style>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HT07EDQVVQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-HT07EDQVVQ');
    </script>
</head>
<body element-theme="1">
<div class="global_styles w-embed">
    <style>
        /* _____ Proportional Font Scaling _____ */
        body {
            font-size: 1.1111111111111112vw;
        }

        /* Max Font Size */
        @media screen and (min-width:1440px) {
            body {
                font-size: 15.555555555555557px;
            }
        }

        /* Min Font Size */
        @media screen and (max-width:991px) {
            body {
                font-size: 16px;
            }
        }

        /* ___ Responsive Padding and Container Width ____ */
        @media screen and (max-width: 991px) {
            :root {
                --site-padding: 1.5rem;
                --container-width: 48rem;
            }
        }

        @media screen and (max-width: 767px) {
            :root {
                --site-padding: 1rem;
                --container-width: 36rem;
            }
        }

        /* _____ Drop Cap Paragraphs _____ */
        .body-dropcap:first-letter {
            color: var(--purple-600);
            font-weight: bold;
            font-size: 1.8em;
            font-family: "Literata Royo";
            line-height: 1;
            float: right;
            padding: 0.2em 0.4em 0.3em 0.4em;
            margin-right: 0.2em;
            background: white;
            border-radius: 2rem;
            box-shadow: 0px 20px 40px 0px rgba(0, 0, 0, 0.10);
            transform: rotate(-3deg);
        }

        @media screen and (max-width: 991px) {
            .body-dropcap:first-letter {
                border-radius: 1.5rem;
            }
        }

        @media screen and (max-width: 767px) {
            .body-dropcap:first-letter {
                border-radius: 1rem;
            }
        }

        .button_primary:hover .button_arrow {
            transform: rotate(45deg);
        }

        /* _________ Marquee Scroller ___________________ */
        @keyframes slider {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-100%);
            }
        }

        .slider_rail {
            animation: slider 20s linear infinite;
        }

        /* _____ Reverse Flexbox Content 2x Order (Story Card) ___________ */
        [reverse-flex='true'] {
            order: -1;
        }

        /* _____ Book Cover Yellow ______ */
        [background-color="yellow"] {
            background-color: var(--yellow)
        }

        [text-color="yellow"] {
            fill: var(--yellow)
        }

        [text-color-dark="yellow"] {
            fill: #BB8320;
        }

        /* _____ Book Cover Blue ______ */
        [background-color="blue"] {
            background-color: var(--blue)
        }

        [text-color="blue"] {
            fill: var(--blue)
        }

        [text-color-dark="blue"] {
            fill: #0779A2;
        }

        /* _____ Book Cover Red ______ */
        [background-color="red"] {
            background-color: var(--red)
        }

        [text-color="red"] {
            fill: var(--red)
        }

        [text-color-dark="red"] {
            fill: #B74219;
        }

        @media screen and (min-width: 992px) {
            [large-text="true"] {
                font-size: 1.25em;
            }
        }
    </style>
    <style id="color-themes" speed="0.4" ease="power1.out" percent-from-top="50" min-width="0">
        [element-theme="1"] {
            --background: var(--purple-100);
        }

        [element-theme="2"] {
            --background: var(--white);
        }

        [element-theme="3"] {
            --background: var(--purple-300);
        }
    </style>
</div>
<div class="page_wrapper">
    <div class="navbar">
        <div class="container">
            <div class="navbar_inner">
                <div id="w-node-c39e3687-4c7e-c78d-a788-d1511debc9e1-1debc9de" class="nav_logo-wrapper">
                    <a href="/" aria-current="page" class="nav_logo w-inline-block w--current">
                        <img src="https://allam.tuwaiq.edu.sa/allam-logo.png" alt="SDAIA Logo" class="logo-img">
                    </a>
                </div>
            </div>
        </div>
        <div class="progress_bar"></div>
    </div>

    <style>
        /* Default styling for the logo */
        .logo-img {
            width: 150px; /* Increased initial width */
            height: auto; /* Maintain aspect ratio */
        }

        /* Responsive styling for mobile screens */
        @media (max-width: 767px) {
            .logo-img {
                width: 100px; /* Larger width for mobile screens */
            }
        }
    </style>

    <div class="preloader">
        <div class="preload_lottie">
            <div data-w-id="7383cae1-c852-f5fa-7156-fa287303613f" data-animation-type="lottie" data-src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663c066231fdb256cb89decb_Flow%201.lottie" data-loop="1" data-direction="1" data-autoplay="1" data-is-ix2-target="0" data-renderer="svg" data-default-duration="1" data-duration="0"></div>
        </div>
    </div>
    <div id="upper"  class="content_wrapper">
        <section hero-para="outer" class="home_hero">
            <div class="container">
                <div class="home_hero-inner">
                    <div id="w-node-_6dc95f5e-9023-3655-8df8-164b4cd3378c-4cd33789" class="hero_content">
                        <div class="hero_text-wrap">
                            <h4 class="" dir="rtl">حِكايات علّام</h4>
                            <p class="body-s" dir="rtl">حِكايات علّام هو مشروع قائم على على نموذج علّام لانشاء قصص قصيرة للأطفال.</p>
                        </div>
                        <div class="hero_button-wrap">
                            <div class="button_rotate-neg-2">
                                <a href="#Generate" class="button_primary w-inline-block" dir="rtl">
                                    <div class="button_text">
                                        <div class="button_text-primary">جرب حِكايات علّام</div>
                                    </div>
                                    <div class="button_arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 32 32" fill="none" class="icon-arrow">
                                            <path d="M28.7298 0.28196C30.387 0.28196 31.7328 1.62767 31.7328 3.28495L31.7328 24.4982C31.7328 26.1554 30.387 27.5011 28.7298 27.5011C27.0725 27.5011 25.7268 26.1554 25.7268 24.4982L25.7334 10.5173L5.39524 30.8555C4.22189 32.0288 2.32596 32.0288 1.1526 30.8555C-0.0207509 29.6821 -0.0207512 27.7862 1.1526 26.6128L21.4841 6.28132L7.51656 6.2747C5.85928 6.2747 4.51356 4.92898 4.51356 3.2717C4.51356 1.61442 5.85928 0.268704 7.51656 0.268704L28.7298 0.268701L28.7298 0.28196Z" fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <a href="#how-it-works" class="button_secondary w-inline-block">
                                <div class="secondary_button-text">كيف يعمل</div>
                            </a>
                        </div>
                        <div class="hero_icon-3">
                            <div class="icon-wrap text-blue">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 80 78" fill="none">
                                    <path d="M79.5369 29.2813C77.8181 23.9305 71.8999 21.2561 66.8106 23.528L47.3182 32.2306L49.5155 10.4597C50.0802 4.86313 45.7353 0 40.1713 0C34.6073 0 30.2624 4.86313 30.8271 10.4597L32.9899 31.8919L13.1894 23.052C8.10006 20.7801 2.18192 23.4545 0.463135 28.8053C-1.25565 34.1561 1.97521 39.8359 7.41484 41.0221L28.2432 45.566L13.8096 61.8738C10.0983 66.0654 10.7873 72.5831 15.2872 75.8904C19.7889 79.1976 26.1301 77.8449 28.9284 72.9818L39.6392 54.3575L50.5185 73.2759C53.3149 78.1391 59.6579 79.4918 64.1597 76.1845C68.6614 72.8773 69.3486 66.3615 65.6373 62.168L51.4276 46.1136L72.5852 41.4982C78.0248 40.3119 81.2557 34.6321 79.5369 29.2813Z" fill="currentColor"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div id="w-node-_6dc95f5e-9023-3655-8df8-164b4cd3379a-4cd33789" class="hero_media-right">
                        <div hero-para="card-1" class="hero_story-top">
                            <div class="story_card">
                                <div class="story_card-text">
                                    <div class="story_card-rich w-richtext" dir="rtl">
                                        <p >تعزيز <strong>الصداقة</strong>والأخوة.</p>
                                        <p>‍</p>
                                    </div>
                                </div>
                                <div reverse-flex="true" class="story_card-media">
                                    <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930baa01d94f619748dc7_image_medium_boy_baseball.webp" loading="eager" alt="" sizes="(max-width: 767px) 167.109619140625px, (max-width: 991px) 30vw, 20vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930baa01d94f619748dc7_image_medium_boy_baseball-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930baa01d94f619748dc7_image_medium_boy_baseball-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930baa01d94f619748dc7_image_medium_boy_baseball.webp 1080w">                                </div>
                            </div>
                        </div>
                        <div hero-para="book-1" class="media_right-cover">
                            <div class="hero_book-rotate">
                                <div class="book_card">
                                    <div background-color="blue" class="book_cover">
                                        <div class="book_cover-inner">
                                            <div class="book_cover-title">
                                                <div class="book_cover-text" dir="rtl">روح المغامرة.</div>
                                            </div>
                                            <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663d4f2607b807a4de4e056c_dinoegg.webp" loading="eager" alt="" sizes="(max-width: 991px) 276px, 19vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663d4f2607b807a4de4e056c_dinoegg-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663d4f2607b807a4de4e056c_dinoegg.webp 600w" />
                                        </div>
                                    </div>
                                    <div class="book_base">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 299 60" fill="none" class="svg">
                                            <path d="M254 21H0L0 40C72.3194 40 181.681 40 254 40V21Z" fill="currentcolor" text-color="blue" class="book-color"></path>
                                            <path d="M265 60C271.63 60 277.989 57.3661 282.678 52.6777C286.653 48.702 290 44 290 34V19L257 19V48H19V60H265Z" fill="currentcolor" text-color-dark="blue" class="book-color-dark"></path>
                                            <path d="M19 34C17.1859 34 15.4461 34.8806 14.1634 36.1634C12.8806 37.4461 12.16 39.1859 12.16 41C12.16 42.8141 12.8806 44.5539 14.1634 45.8366C15.4461 47.1194 17.1859 48 19 48V60C13.9609 60 9.12816 57.9982 5.56497 54.435C2.00178 50.8718 0 46.0391 0 41C0 35.9609 2.00178 31.1282 5.56497 27.565C9.12816 24.0018 13.9609 22 19 22V34Z" fill="currentcolor" text-color-dark="blue" class="book-color-dark"></path>
                                            <path d="M257 26V34H19C15.134 34 12 37.134 12 41V41C12 44.866 15.134 48 19 48H257C263.63 48 269.989 45.366 274.678 40.6777C278.653 36.7019 282 30.5 282 25V8L257 26Z" fill="currentcolor" class="page-color"></path>
                                            <path d="M273.5 34C289.597 34 298.5 14.9231 298.5 0H266L253.059 22H19V34L273.5 34Z" fill="currentcolor" text-color-dark="blue" class="book-color-dark"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div hero-para="card-2" class="hero_story-bottom">
                            <div class="story_card">
                                <div class="story_card-text">
                                    <div class="story_card-rich w-richtext">
                                        <p dir="rtl">الحياة البسيطة.</p>
                                    </div>
                                </div>
                                <div reverse-flex="true" class="story_card-media">
                                    <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6639310e472b68b23bf33746_image_farm.webp" loading="eager" alt="" sizes="(max-width: 991px) 100vw, 21vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6639310e472b68b23bf33746_image_farm-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6639310e472b68b23bf33746_image_farm-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6639310e472b68b23bf33746_image_farm.webp 1080w" />
                                </div>
                            </div>
                        </div>
                        <div class="hero_icon-2">
                            <div class="icon-wrap text-green">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 80 80" fill="none">
                                    <path d="M50.8619 37.8395C46.8962 35.9812 43.7549 32.5403 42.0001 28.5267C39.1478 22.0054 40.6481 14.7869 36.5473 8.76135C32.8493 3.32428 26.5774 0 20.0033 0C14.4789 0 9.47944 2.24004 5.85838 5.85857C2.23997 9.47975 0 14.4794 0 20.004C0 26.5783 3.32417 32.8504 8.76106 36.5485C14.7891 40.6495 22.0047 39.149 28.5258 42.0015C32.5392 43.7564 35.98 46.8977 37.8382 50.8635C40.9238 57.4432 39.2458 65.0169 43.4156 71.1856C47.1083 76.6519 53.3987 80.0026 59.9967 80C65.5211 80 70.5206 77.76 74.1416 74.1414C77.7627 70.5202 80 65.5206 80 59.996C80 53.3978 76.652 47.1072 71.1859 43.4144C65.0147 39.2445 57.4439 40.9225 50.8645 37.8368L50.8619 37.8395Z" fill="currentColor"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="hero_icon-1">
                            <div class="icon-wrap text-yellow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 80 80" fill="none">
                                    <path d="M80 30.3721H61.539L74.594 17.3171L61.6829 4.40597L48.6302 17.461V-1H30.3721V17.461L17.3171 4.40597L4.40597 17.3171L17.461 30.3721H-1V48.6302H17.461L4.40597 61.6829L17.3171 74.594L30.3721 61.539V80H48.6302V61.539L61.6829 74.594L74.594 61.6829L61.539 48.6302H80V30.3721Z" fill="currentColor"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div id="w-node-_6dc95f5e-9023-3655-8df8-164b4cd337aa-4cd33789" class="hero_media-bottom">
                        <div hero-para="card-3" class="hero_sub-1">
                            <div class="hero_sub-rotate-1">
                                <div class="story_card">
                                    <div class="story_card-text">
                                        <div class="story_card-rich w-richtext">
                                            <p dir="rtl">مساعدة الاخرين.</p>
                                        </div>
                                    </div>
                                    <div reverse-flex="false" class="story_card-media">
                                        <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930ba93eba45665566105_image_light_girl_vet.webp" loading="eager" alt="" sizes="(max-width: 991px) 260px, 18vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930ba93eba45665566105_image_light_girl_vet-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930ba93eba45665566105_image_light_girl_vet-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930ba93eba45665566105_image_light_girl_vet.webp 1080w" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div hero-para="card-4" class="hero_sub-2">
                            <div class="hero_sub-rotate-2">
                                <div class="story_card">
                                    <div class="story_card-text">
                                        <div class="story_card-rich w-richtext">
                                            <p dir="rtl">تعزيز <strong>الخيال</strong> الابداعي. </p>
                                        </div>
                                    </div>
                                    <div reverse-flex="true" class="story_card-media">
                                        <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930bad6a2d8a1eb8a5baa_image_light_girl_fairy.webp" loading="eager" alt="" sizes="(max-width: 767px) 167.109619140625px, (max-width: 991px) 228.73049926757812px, 20vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930bad6a2d8a1eb8a5baa_image_light_girl_fairy-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930bad6a2d8a1eb8a5baa_image_light_girl_fairy-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930bad6a2d8a1eb8a5baa_image_light_girl_fairy.webp 1080w" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div hero-para="book-3" class="hero_sub-3">
                            <div class="hero_sub-rotate-3">
                                <div class="book_card">
                                    <div background-color="red" class="book_cover">
                                        <div class="book_cover-inner">
                                            <div class="book_cover-title">
                                                <div class="book_cover-text">سارة والحصان الخيالي</div>
                                            </div>
                                            <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663d4f2645f3b866625e409f_unicorn.webp" loading="eager" alt="" sizes="(max-width: 991px) 276px, 19vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663d4f2645f3b866625e409f_unicorn-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663d4f2645f3b866625e409f_unicorn.webp 600w" />
                                        </div>
                                    </div>
                                    <div class="book_base">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 299 60" fill="none" class="svg">
                                            <path d="M254 21H0L0 40C72.3194 40 181.681 40 254 40V21Z" fill="currentcolor" text-color="red" class="book-color"></path>
                                            <path d="M265 60C271.63 60 277.989 57.3661 282.678 52.6777C286.653 48.702 290 44 290 34V19L257 19V48H19V60H265Z" fill="currentcolor" text-color-dark="red" class="book-color-dark"></path>
                                            <path d="M19 34C17.1859 34 15.4461 34.8806 14.1634 36.1634C12.8806 37.4461 12.16 39.1859 12.16 41C12.16 42.8141 12.8806 44.5539 14.1634 45.8366C15.4461 47.1194 17.1859 48 19 48V60C13.9609 60 9.12816 57.9982 5.56497 54.435C2.00178 50.8718 0 46.0391 0 41C0 35.9609 2.00178 31.1282 5.56497 27.565C9.12816 24.0018 13.9609 22 19 22V34Z" fill="currentcolor" text-color-dark="red" class="book-color-dark"></path>
                                            <path d="M257 26V34H19C15.134 34 12 37.134 12 41V41C12 44.866 15.134 48 19 48H257C263.63 48 269.989 45.366 274.678 40.6777C278.653 36.7019 282 30.5 282 25V8L257 26Z" fill="currentcolor" class="page-color"></path>
                                            <path d="M273.5 34C289.597 34 298.5 14.9231 298.5 0H266L253.059 22H19V34L273.5 34Z" fill="currentcolor" text-color-dark="red" class="book-color-dark"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div hero-para="book-2" class="hero_sub-4">
                            <div class="hero_sub-rotate-4">
                                <div class="book_card">
                                    <div background-color="green, blue, red, yellow" class="book_cover">
                                        <div class="book_cover-inner">
                                            <div class="book_cover-title">
                                                <div class="book_cover-text">أحمد عندما اصبح طيارا</div>
                                            </div>
                                            <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930babae9b9ad4d869cc5_image_dark_boy_plane.webp" loading="eager" alt="" sizes="(max-width: 991px) 276px, 19vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930babae9b9ad4d869cc5_image_dark_boy_plane-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930babae9b9ad4d869cc5_image_dark_boy_plane-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930babae9b9ad4d869cc5_image_dark_boy_plane.webp 1080w" />
                                        </div>
                                    </div>
                                    <div class="book_base">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 299 60" fill="none" class="svg">
                                            <path d="M254 21H0L0 40C72.3194 40 181.681 40 254 40V21Z" fill="currentcolor" text-color="green, blue, red, yellow" class="book-color"></path>
                                            <path d="M265 60C271.63 60 277.989 57.3661 282.678 52.6777C286.653 48.702 290 44 290 34V19L257 19V48H19V60H265Z" fill="currentcolor" text-color-dark="green, blue, red, yellow" class="book-color-dark"></path>
                                            <path d="M19 34C17.1859 34 15.4461 34.8806 14.1634 36.1634C12.8806 37.4461 12.16 39.1859 12.16 41C12.16 42.8141 12.8806 44.5539 14.1634 45.8366C15.4461 47.1194 17.1859 48 19 48V60C13.9609 60 9.12816 57.9982 5.56497 54.435C2.00178 50.8718 0 46.0391 0 41C0 35.9609 2.00178 31.1282 5.56497 27.565C9.12816 24.0018 13.9609 22 19 22V34Z" fill="currentcolor" text-color-dark="green, blue, red, yellow" class="book-color-dark"></path>
                                            <path d="M257 26V34H19C15.134 34 12 37.134 12 41V41C12 44.866 15.134 48 19 48H257C263.63 48 269.989 45.366 274.678 40.6777C278.653 36.7019 282 30.5 282 25V8L257 26Z" fill="currentcolor" class="page-color"></path>
                                            <path d="M273.5 34C289.597 34 298.5 14.9231 298.5 0H266L253.059 22H19V34L273.5 34Z" fill="currentcolor" text-color-dark="green, blue, red, yellow" class="book-color-dark"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hero_icon-4">
                            <div class="icon-wrap text-orange">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 80 80" fill="none">
                                    <path d="M75.1958 46.8987C70.5997 44.2676 64.724 45.8288 62.0712 50.3874L58.3052 56.8563L60.4569 46.4454C61.5223 41.2892 58.1732 36.2526 52.9746 35.196C47.776 34.1393 42.6979 37.461 41.6325 42.6172L39.9991 50.5164L38.3657 42.6172C37.3004 37.461 32.2222 34.1393 27.0236 35.196C21.825 36.2526 18.476 41.2892 19.5413 46.4454L21.6931 56.8563L17.927 50.3874C15.2742 45.8288 9.39849 44.2676 4.80238 46.8987C0.210083 49.5299 -1.36404 55.3576 1.28882 59.9162L12.979 80H67.0211L78.7113 59.9162C81.3642 55.3576 79.7901 49.5299 75.1939 46.8987H75.1958Z" fill="currentColor"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="preloader">
            <div class="preload_lottie">
                <div data-w-id="7383cae1-c852-f5fa-7156-fa287303613f" data-animation-type="lottie" data-src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663c066231fdb256cb89decb_Flow%201.lottie" data-loop="1" data-direction="1" data-autoplay="1" data-is-ix2-target="0" data-renderer="svg" data-default-duration="1" data-duration="0"></div>
            </div>
        </div>
        <section class="home_problem">
            <div class="container">
                <div simple-fade="true" class="home_problem-inner">
                    <p dir='rtl' class="body-dropcap">- يعد تشجيع الأطفال على القراءة ومساعدتهم على تطوير عادات إيجابية خطوات أساسية نحو تعزيز مستقبل أكثر إشراقًا. تشير الدراسات إلى أن التعرض المبكر للقراءة لا يحسن مهارات القراءة والكتابة فحسب، بل يغذي أيضًا الخيال والتعاطف والتفكير النقدي. وفي الوقت نفسه، يمكن أن تكون القصص الجذابة أدوات قوية لتوجيه الأطفال بعيدًا عن السلوكيات السلبية، وتوضيح عواقب أفعال مثل الكذب أو السرقة بطريقة لطيفة. ومن خلال خلق بيئة داعمة تشجع القراءة وتشكل عادات إيجابية، يمكننا تزويد الأطفال بالقيم والمهارات التي يحتاجونها للنجاح في المدرسة والحياة .
                    </p>
                </div>
            </div>
        </section>
        <section animate-body-to="3" class="home_features">
            <div class="container">
                <div class="home_features-inner" id="home_features-inner">
                    <div class="features_text-wrap">
                        <h2 simple-fade="true" class="display-xl">حِكايات علّام</h2>
                    </div>
                    <?php if(!($_SERVER['REQUEST_METHOD'] == "POST")){ ?>
                        <!--
                         cards will be below.
                        -->
                        


                        <div class="features_card-wrap" id="features_card-wrap">
                            <div class="card_wrap-rotate">
                                <div class="feature_card">
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d0096a-53d00961" class="feature_card-content">
                                        <div large-text="true" class="feature_rich-text w-richtext">
                                            <p dir="rtl">
                                                كان رنّون يحب القفز واللعب، لكنه كان دائمًا في عجلة من أمره ولا ينتبه للطريق.                                       </p>
                                        </div>
                                        <div class="feature_card-icon">
                                            <div class="audio-player">
                                                <div class="feature_card-icon">
                                                    <audio src="https://allamstories.tech/main_audio/1.mp3"></audio>
                                                    <button class="player-button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d00973-53d00961" class="feature_card-media">
                                        <div class="feature_card-img">
                                            <img src="https://allamstories.tech/main_image/image/11.webp" loading="eager" alt="" sizes="(max-width: 767px) 87vw, (max-width: 991px) 673.71728515625px, 55vw" srcset="https://allamstories.tech/main_image/image/11.webp 500w, https://allamstories.tech/main_image/image/11.webp 800w, https://allamstories.tech/main_image/image/11.webp 1080w, https://allamstories.tech/main_image/image/11.webp 1200w" class="img-align-bottom" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="features_card-wrap" id="features_card-wrap">
                            <div class="card_wrap-rotate">
                                <div class="feature_card">
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d0096a-53d00961" class="feature_card-content">
                                        <div large-text="true" class="feature_rich-text w-richtext">
                                            <p dir="rtl">
                                                في يوم من الأيام، رأى رنّون جزرة كبيرة على جانب الطريق، فركض نحوها بسرعة دون أن ينتبه لحفرة صغيرة أمامه.                                       </p>
                                        </div>
                                        <div class="feature_card-icon">
                                            <div class="audio-player">
                                                <div class="feature_card-icon">
                                                    <audio src="https://allamstories.tech/main_audio/2.mp3"></audio>
                                                    <button class="player-button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d00973-53d00961" class="feature_card-media">
                                        <div class="feature_card-img">
                                            <img src="https://allamstories.tech/main_image/image/22.webp" loading="eager" alt="" sizes="(max-width: 767px) 87vw, (max-width: 991px) 673.71728515625px, 55vw" srcset="https://allamstories.tech/main_image/image/22.webp 500w, https://allamstories.tech/main_image/image/22.webp 800w, https://allamstories.tech/main_image/image/22.webp 1080w, https://allamstories.tech/main_image/image/22.webp 1200w" class="img-align-bottom" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="features_card-wrap" id="features_card-wrap">
                            <div class="card_wrap-rotate">
                                <div class="feature_card">
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d0096a-53d00961" class="feature_card-content">
                                        <div large-text="true" class="feature_rich-text w-richtext">
                                            <p dir="rtl">
                                                وقع رنّون في الحفرة وأخذ يحاول الخروج لكنه لم يستطع.                                       </p>
                                        </div>
                                        <div class="feature_card-icon">
                                            <div class="audio-player">
                                                <div class="feature_card-icon">
                                                    <audio src="https://allamstories.tech/main_audio/3.mp3"></audio>
                                                    <button class="player-button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d00973-53d00961" class="feature_card-media">
                                        <div class="feature_card-img">
                                            <img src="https://allamstories.tech/main_image/image/33.webp" loading="eager" alt="" sizes="(max-width: 767px) 87vw, (max-width: 991px) 673.71728515625px, 55vw" srcset="https://allamstories.tech/main_image/image/33.webp 500w, https://allamstories.tech/main_image/image/33.webp 800w, https://allamstories.tech/main_image/image/33.webp 1080w, https://allamstories.tech/main_image/image/33.webp 1200w" class="img-align-bottom" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="features_card-wrap" id="features_card-wrap">
                            <div class="card_wrap-rotate">
                                <div class="feature_card">
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d0096a-53d00961" class="feature_card-content">
                                        <div large-text="true" class="feature_rich-text w-richtext">
                                            <p dir="rtl">
                                                مرّة  صديقه السلحفاة سمسم، فنظر إليه وقال: "كن صبورًا يا رنّون، سأساعدك!'                                       </p>
                                        </div>
                                        <div class="feature_card-icon">
                                            <div class="audio-player">
                                                <div class="feature_card-icon">
                                                    <audio src="https://allamstories.tech/main_audio/4.mp3"></audio>
                                                    <button class="player-button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d00973-53d00961" class="feature_card-media">
                                        <div class="feature_card-img">
                                            <img src="https://allamstories.tech/main_image/image/44.webp" loading="eager" alt="" sizes="(max-width: 767px) 87vw, (max-width: 991px) 673.71728515625px, 55vw" srcset="https://allamstories.tech/main_image/image/44.webp 500w, https://allamstories.tech/main_image/image/44.webp 800w, https://allamstories.tech/main_image/image/44.webp 1080w, https://allamstories.tech/main_image/image/44.webp 1200w" class="img-align-bottom" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="features_card-wrap" id="features_card-wrap">
                            <div class="card_wrap-rotate">
                                <div class="feature_card">
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d0096a-53d00961" class="feature_card-content">
                                        <div large-text="true" class="feature_rich-text w-richtext">
                                            <p dir="rtl">
                                                وببطء وحكمة، بدأ سمسم بحفر طرف صغير حتى يستطيع رنّون الخروج بأمان                                       </p>
                                        </div>
                                        <div class="feature_card-icon">
                                            <div class="audio-player">
                                                <div class="feature_card-icon">
                                                    <audio src="https://allamstories.tech/main_audio/5.mp3"></audio>
                                                    <button class="player-button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d00973-53d00961" class="feature_card-media">
                                        <div class="feature_card-img">
                                            <img src="https://allamstories.tech/main_image/image/55.webp" loading="eager" alt="" sizes="(max-width: 767px) 87vw, (max-width: 991px) 673.71728515625px, 55vw" srcset="https://allamstories.tech/main_image/image/55.webp 500w, https://allamstories.tech/main_image/image/55.webp 800w, https://allamstories.tech/main_image/image/55.webp 1080w, https://allamstories.tech/main_image/image/55.webp 1200w" class="img-align-bottom" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="features_card-wrap" id="features_card-wrap">
                            <div class="card_wrap-rotate">
                                <div class="feature_card">
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d0096a-53d00961" class="feature_card-content">
                                        <div large-text="true" class="feature_rich-text w-richtext">
                                            <p dir="rtl">
                                                شكر رنّون صديقه وتعلم أن السرعة تجعلنا نخطئ، وأن الصبر والهدوء هما مفتاح السلامة                                       </p>
                                        </div>
                                        <div class="feature_card-icon">
                                            <div class="audio-player">
                                                <div class="feature_card-icon">
                                                    <audio src="https://allamstories.tech/main_audio/6.mp3"></audio>
                                                    <button class="player-button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="w-node-c4668e56-838a-5054-0c3c-04f753d00973-53d00961" class="feature_card-media">
                                        <div class="feature_card-img">
                                            <img src="https://allamstories.tech/main_image/image/66.webp" loading="eager" alt="" sizes="(max-width: 767px) 87vw, (max-width: 991px) 673.71728515625px, 55vw" srcset="https://allamstories.tech/main_image/image/66.webp 500w, https://allamstories.tech/main_image/image/66.webp 800w, https://allamstories.tech/main_image/image/66.webp 1080w, https://allamstories.tech/main_image/image/66.webp 1200w" class="img-align-bottom" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }else{
                        $n=1;
                        foreach ($story as $key => $content) { ?>

                            <div class="features_card-wrap" id="features_card-wrap">
                                <div class="card_wrap-rotate">
                                    <div class="feature_card">
                                        <div id="w-node-c4668e56-838a-5054-0c3c-04f753d0096a-53d00961" class="feature_card-content">
                                            <div large-text="true" class="feature_rich-text w-richtext">
                                                <p dir="rtl">
                                                    <?php



                                                    echo  $content['content'] ?>
                                                </p>
                                            </div>
                                            <!-- Adding the audio button below -->
                                            <div class="feature_card-icon">
                                                <div class="audio-player">
                                                    <div class="feature_card-icon">
                                                        <audio src="<?php echo $content['audio'] ?>" id="player<?php echo $n?>"></audio>
                                                        <button class="player-button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="w-node-c4668e56-838a-5054-0c3c-04f753d00973-53d00961" class="feature_card-media">
                                            <div class="feature_card-img">
                                                <img src="<?php echo $content['image'] ?>" loading="eager" alt="" sizes="(max-width: 767px) 87vw, (max-width: 991px) 673.71728515625px, 55vw" srcset="<?php echo $content['image'] ?> 500w, <?php echo $content['image'] ?> 800w, <?php echo $content['image'] ?> 1080w, <?php echo $content['image'] ?> 1200w" class="img-align-bottom" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $n++; }} ?>
                </div>
            </div>
        </section>
        <section id="how-it-works" animate-body-to="1" class="home_works">
            <div class="container">
                <div class="home_works-inner">
                    <div simple-fade="true" class="works_title">
                        <h2 class="body-xl">تجربة قراءة فريدة</h2>
                    </div>
                    <div class="works_avatar">
                        <div stagger-fade="trigger" class="avatar_media">
                            <div stagger-fade="item" class="avater_media-1">
                                <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ff85d7699b82cc7506f6_avatar-1.webp" loading="eager" alt="" sizes="(max-width: 479px) 208px, (max-width: 767px) 272px, (max-width: 991px) 400px, 32vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ff85d7699b82cc7506f6_avatar-1-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ff85d7699b82cc7506f6_avatar-1-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ff85d7699b82cc7506f6_avatar-1.webp 911w" class="avatar-img" />
                            </div>
                            <div stagger-fade="item" class="avatar_media-2">
                                <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ffb83f103a8d7f4a264d_avatar-2.webp" loading="lazy" alt="" sizes="(max-width: 479px) 99vw, (max-width: 767px) 288.9453125px, (max-width: 991px) 424.921875px, 33vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ffb83f103a8d7f4a264d_avatar-2-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ffb83f103a8d7f4a264d_avatar-2-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ffb83f103a8d7f4a264d_avatar-2.webp 1040w" class="avatar-img-middle" />
                            </div>
                            <div stagger-fade="item" class="avatar_media-3">
                                <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ffc1e9d3a86afb516f8e_avatar-3.webp" loading="lazy" alt="" sizes="(max-width: 479px) 192px, (max-width: 767px) 256px, (max-width: 991px) 368px, 30vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ffc1e9d3a86afb516f8e_avatar-3-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ffc1e9d3a86afb516f8e_avatar-3-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6638ffc1e9d3a86afb516f8e_avatar-3.webp 868w" class="avatar-img" />
                            </div>
                        </div>
                        <div simple-fade="true" class="works_heading-wrap">
                            <div class="display-m">بصور توضيحية</div>
                        </div>
                    </div>
                    <div class="works_topics">
                        <div stagger-fade="trigger" class="topics_media">
                            <div class="topic_bundle">
                                <div stagger-fade="item" class="topic_img">
                                    <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66c61aa66c12c151eb9b00ac_Dinosaurs.jpg" loading="eager" alt="" />
                                </div>
                                <div stagger-fade="item" class="topic_img _2">
                                    <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66c61a60b81bfac6e602b691_Sports.jpg" loading="lazy" alt="" />
                                </div>
                                <div stagger-fade="item" class="topic_img _3">
                                    <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66c61a3057f2fbc6fe35c570_Mermaids.jpg" loading="eager" alt="" />
                                </div>
                            </div>
                            <div class="topic_media-main">
                                <div stagger-fade="item" class="card_check-wrap">
                                    <div class="card_check">
                                        <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/6639051ac99d313c85165262_tick.webp" loading="lazy" alt="" class="card_check-img" />
                                    </div>
                                    <div class="topic_main-card">
                                        <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66c6199d3e6ac01c32616aba_On%20A%20Quest.jpg" loading="eager" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="topic_bundle">
                                <div stagger-fade="item" class="topic_img _4">
                                    <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66c61a816c12c151eb9aca4f_Candy%20Land.jpg" loading="lazy" alt="" />
                                </div>
                                <div stagger-fade="item" class="topic_img _5">
                                    <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66c61d6ab36f8b9f45cf8025_Pets.jpg" loading="lazy" alt="" />
                                </div>
                                <div stagger-fade="item" class="topic_img _6">
                                    <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66c6185217aa21fd00e8389e_Arctic.jpg" loading="lazy" alt="" />
                                </div>
                            </div>
                        </div>
                        <div simple-fade="true" class="works_heading-wrap">
                            <div class="display-m">أختر قصتك</div>
                        </div>
                    </div>
                </div>
            </div>
            <div stagger-fade="trigger" class="works_slider">
                <div class="slider_media">
                    <div class="slider_track">
                        <div class="slider_rail">
                            <div class="slider_collection w-dyn-list">
                                <div role="list" class="slider_list w-dyn-items">
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663910415808e1ffc178cf08_morgan-story-1.webp" loading="eager" alt="Girl playing baseball" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663910415808e1ffc178cf08_morgan-story-1-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663910415808e1ffc178cf08_morgan-story-1.webp 600w" />
                                        </div>
                                    </div>
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66391060876d4b15ea76b2d3_morgan-story-2.webp" loading="eager" alt="Girl discovers dinosaur egg" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66391060876d4b15ea76b2d3_morgan-story-2-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66391060876d4b15ea76b2d3_morgan-story-2.webp 600w" />
                                        </div>
                                    </div>
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639107351fc1acbacade005_morgan-story-3.webp" loading="eager" alt="Girl dressed as a superhero with her sidekick dog" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639107351fc1acbacade005_morgan-story-3-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639107351fc1acbacade005_morgan-story-3.webp 600w" />
                                        </div>
                                    </div>
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639108dc7331d215091a397_morgan-story-4.webp" loading="eager" alt="Girl looks at a bus" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639108dc7331d215091a397_morgan-story-4-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639108dc7331d215091a397_morgan-story-4.webp 600w" />
                                        </div>
                                    </div>
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911019905cbaf8ea7aacf_morgan-story-5.webp" loading="eager" alt="" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911019905cbaf8ea7aacf_morgan-story-5-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911019905cbaf8ea7aacf_morgan-story-5.webp 600w" />
                                        </div>
                                    </div>
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911127db573ac2de28bb7_morgan-story-6.webp" loading="eager" alt="" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911127db573ac2de28bb7_morgan-story-6-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911127db573ac2de28bb7_morgan-story-6.webp 600w" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider_rail">
                            <div class="slider_collection w-dyn-list">
                                <div role="list" class="slider_list w-dyn-items">
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663910415808e1ffc178cf08_morgan-story-1.webp" loading="eager" alt="Girl playing baseball" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663910415808e1ffc178cf08_morgan-story-1-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663910415808e1ffc178cf08_morgan-story-1.webp 600w" />
                                        </div>
                                    </div>
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66391060876d4b15ea76b2d3_morgan-story-2.webp" loading="eager" alt="Girl discovers dinosaur egg" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66391060876d4b15ea76b2d3_morgan-story-2-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66391060876d4b15ea76b2d3_morgan-story-2.webp 600w" />
                                        </div>
                                    </div>
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639107351fc1acbacade005_morgan-story-3.webp" loading="eager" alt="Girl dressed as a superhero with her sidekick dog" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639107351fc1acbacade005_morgan-story-3-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639107351fc1acbacade005_morgan-story-3.webp 600w" />
                                        </div>
                                    </div>
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639108dc7331d215091a397_morgan-story-4.webp" loading="eager" alt="Girl looks at a bus" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639108dc7331d215091a397_morgan-story-4-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639108dc7331d215091a397_morgan-story-4.webp 600w" />
                                        </div>
                                    </div>
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911019905cbaf8ea7aacf_morgan-story-5.webp" loading="eager" alt="" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911019905cbaf8ea7aacf_morgan-story-5-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911019905cbaf8ea7aacf_morgan-story-5.webp 600w" />
                                        </div>
                                    </div>
                                    <div role="listitem" class="slider_item w-dyn-item">
                                        <div stagger-fade="item" class="slider_image-card">
                                            <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911127db573ac2de28bb7_morgan-story-6.webp" loading="eager" alt="" sizes="(max-width: 479px) 128px, (max-width: 767px) 144px, (max-width: 991px) 192px, 18vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911127db573ac2de28bb7_morgan-story-6-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663911127db573ac2de28bb7_morgan-story-6.webp 600w" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider_protagonist-wrap">
                        <div class="slider_protagonist">
                            <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663913e39905cbaf8eaa539f_girl-jump.png" loading="lazy" alt="" sizes="(max-width: 479px) 87vw, (max-width: 767px) 288px, (max-width: 991px) 380px, 31vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663913e39905cbaf8eaa539f_girl-jump-p-500.png 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663913e39905cbaf8eaa539f_girl-jump.png 800w" />
                        </div>
                    </div>
                </div>
                <div simple-fade="true" class="works_heading-wrap">
                    <div class="display-m">أنشئ قصص على حسب اهتمامك</div>
                </div>
            </div>
            <div class="works_read">
                <div class="container">
                    <div reading-para="outer" class="read_media">
                        <div para-card="top" class="read_media-top">
                            <div class="media-top-rotate">
                                <div class="story_card">
                                    <div class="story_card-text">
                                        <div class="story_card-rich w-richtext">
                                            <p>من الممتع اللعب مع الأصدقاء</p>
                                        </div>
                                    </div>
                                    <div reverse-flex="true" class="story_card-media">
                                        <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930baa01d94f619748dc7_image_medium_boy_baseball.webp" loading="eager" alt="" sizes="(max-width: 767px) 167.109619140625px, (max-width: 991px) 30vw, 20vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930baa01d94f619748dc7_image_medium_boy_baseball-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930baa01d94f619748dc7_image_medium_boy_baseball-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930baa01d94f619748dc7_image_medium_boy_baseball.webp 1080w" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div para-card="bottom" class="read_media-bottom">
                            <div class="media-bottom-rotate">
                                <div class="story_card">
                                    <div class="story_card-text">
                                        <div class="story_card-rich w-richtext">
                                            <p dir="rtl">ان <strong>الطيران</strong> ممتع. </p>
                                        </div>
                                    </div>
                                    <div reverse-flex="false" class="story_card-media">
                                        <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930babae9b9ad4d869cc5_image_dark_boy_plane.webp" loading="eager" alt="" sizes="(max-width: 479px) 100vw, (max-width: 767px) 164.1859130859375px, (max-width: 991px) 228.73052978515625px, 19vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930babae9b9ad4d869cc5_image_dark_boy_plane-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930babae9b9ad4d869cc5_image_dark_boy_plane-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930babae9b9ad4d869cc5_image_dark_boy_plane.webp 1080w" />
                                    </div>
                                </div>
                            </div>
                            <div class="read_phoneme">
                                <div class="read_phoneme-rotate">
                                    <div class="phoneme_popup">
                                        <div class="phoneme_content">
                                            <div class="phoneme_rich w-richtext">
                                                <p>ال <strong>/</strong> طيران </p>
                                            </div>
                                            <div class="phoneme_speaker-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 56 56" fill="none">
                                                    <rect x="0.859589" y="0.104126" width="54.9223" height="54.9223" rx="27.4612" fill="#ECA72B"></rect>
                                                    <path d="M29.979 15.041C30.6343 15.3354 31.056 15.9808 31.056 16.6942V38.4339C31.056 39.1472 30.6343 39.7926 29.979 40.087C29.3237 40.3814 28.5544 40.2625 28.0187 39.787L20.3315 32.999H16.4679C14.4564 32.999 12.8209 31.3742 12.8209 29.3757V25.7524C12.8209 23.7539 14.4564 22.1291 16.4679 22.1291H20.3315L28.0187 15.3411C28.5544 14.8655 29.3237 14.7523 29.979 15.041ZM39.7804 19.1286C42.2421 21.1214 43.8206 24.1615 43.8206 27.564C43.8206 30.9665 42.2421 34.0067 39.7804 35.9995C39.1934 36.4751 38.333 36.3845 37.8543 35.8014C37.3756 35.2182 37.4668 34.3634 38.0537 33.8878C39.9057 32.3932 41.0853 30.1173 41.0853 27.564C41.0853 25.0108 39.9057 22.7349 38.0537 21.2346C37.4668 20.759 37.3813 19.9042 37.8543 19.3211C38.3273 18.7379 39.1934 18.653 39.7804 19.1229V19.1286ZM36.3328 23.3463C37.558 24.3427 38.3501 25.86 38.3501 27.564C38.3501 29.2681 37.558 30.7854 36.3328 31.7818C35.7459 32.2573 34.8854 32.1668 34.4067 31.5836C33.928 31.0005 34.0192 30.1456 34.6062 29.6701C35.2216 29.1719 35.6148 28.4132 35.6148 27.564C35.6148 26.7148 35.2216 25.9562 34.6062 25.4523C34.0192 24.9768 33.9337 24.1219 34.4067 23.5388C34.8797 22.9557 35.7459 22.8707 36.3328 23.3406V23.3463Z" fill="#31263E"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 40 30" fill="none" class="popup-triangle">
                                            <path d="M4.80407 -0.00177002L35.0297 -0.00177002C38.6049 -0.00177002 40.6665 4.05818 38.5571 6.94473L23.4443 27.6254C21.699 30.0136 18.1348 30.0136 16.3896 27.6254L1.27673 6.94473C-0.832672 4.05818 1.22891 -0.00177002 4.80407 -0.00177002Z" fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div para-card="left" class="read_media-left">
                            <div class="media-left-rotate">
                                <div class="story_card">
                                    <div class="story_card-text">
                                        <div class="story_card-rich w-richtext">
                                            <p>أنا اجري للمتعة.</p>
                                        </div>
                                    </div>
                                    <div reverse-flex="false" class="story_card-media">
                                        <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930bad6a2d8a1eb8a5ba5_image_light_girl_running.webp" loading="eager" alt="" sizes="(max-width: 767px) 175.5718994140625px, (max-width: 991px) 244.9873046875px, 21vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930bad6a2d8a1eb8a5ba5_image_light_girl_running-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930bad6a2d8a1eb8a5ba5_image_light_girl_running-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930bad6a2d8a1eb8a5ba5_image_light_girl_running.webp 1080w" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div para-card="right" class="read_media-right">
                            <div class="media-right-rotate">
                                <div class="story_card">
                                    <div class="story_card-text">
                                        <div class="story_card-rich w-richtext">
                                            <p>أنا <strong>أعلم</strong> من هو بطلي.</p>
                                        </div>
                                    </div>
                                    <div reverse-flex="true" class="story_card-media">
                                        <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930ba7b4983f3900ea8f7_image_dark_girl_superhero.webp" loading="eager" alt="" sizes="(max-width: 479px) 100vw, (max-width: 767px) 34vw, (max-width: 991px) 224.48895263671875px, 19vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930ba7b4983f3900ea8f7_image_dark_girl_superhero-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930ba7b4983f3900ea8f7_image_dark_girl_superhero-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663930ba7b4983f3900ea8f7_image_dark_girl_superhero.webp 1080w" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="read_icon-1">
                            <div class="icon-wrap text-yellow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 79 78" fill="none">
                                    <path d="M76.1093 43.062C78.1219 41.0634 78.1255 37.8192 76.1129 35.817L65.9922 25.7484C63.8621 23.6294 65.0194 19.9754 67.9921 19.5063C68.0138 19.5027 68.0392 19.4991 68.0609 19.4955C70.8329 19.0786 73.5127 18.8629 75.7079 16.929C77.7729 15.1029 79.0025 12.4177 79.0007 9.6678C79.0007 7.00058 77.9175 4.58139 76.1599 2.82721C74.3969 1.08022 71.963 3.1542e-05 69.2778 3.1542e-05C66.513 -0.00715773 63.8097 1.21502 61.9725 3.26396C60.0251 5.44411 59.8045 8.10953 59.3849 10.863C59.3813 10.8846 59.3759 10.908 59.3723 10.9295C58.9003 13.8861 55.2206 15.031 53.0923 12.9138L42.4725 2.34913C40.4618 0.348711 37.1961 0.346914 35.1835 2.34553L24.8042 12.6531C22.6741 14.7686 23.8278 18.4279 26.8023 18.897C26.824 18.9006 26.8457 18.9042 26.8674 18.9078C29.6395 19.3284 32.3193 19.5441 34.5145 21.4816C36.5759 23.3076 37.8036 25.9964 37.7982 28.7427C37.7982 31.4118 36.7115 33.8309 34.9539 35.5833C33.189 37.3285 30.7533 38.4069 28.0681 38.4069C25.3051 38.4087 22.6018 37.1865 20.7665 35.134C18.8208 32.9521 18.602 30.2866 18.1843 27.5331C18.1789 27.5098 18.1753 27.4882 18.1734 27.4648C17.7033 24.5101 14.0217 23.3598 11.8916 25.4752L1.51056 35.7846C-0.502011 37.7832 -0.503819 41.0292 1.50694 43.0296L35.1474 76.4975C37.1599 78.4997 40.4238 78.4997 42.4363 76.5011L76.1093 43.062Z" fill="currentColor"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="read_icon-2">
                            <div class="icon-wrap text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 80 80" fill="none">
                                    <path d="M75.1958 46.8987C70.5997 44.2676 64.724 45.8288 62.0712 50.3874L58.3052 56.8563L60.4569 46.4454C61.5223 41.2892 58.1732 36.2526 52.9746 35.196C47.776 34.1393 42.6979 37.461 41.6325 42.6172L39.9991 50.5164L38.3657 42.6172C37.3004 37.461 32.2222 34.1393 27.0236 35.196C21.825 36.2526 18.476 41.2892 19.5413 46.4454L21.6931 56.8563L17.927 50.3874C15.2742 45.8288 9.39849 44.2676 4.80238 46.8987C0.210083 49.5299 -1.36404 55.3576 1.28882 59.9162L12.979 80H67.0211L78.7113 59.9162C81.3642 55.3576 79.7901 49.5299 75.1939 46.8987H75.1958Z" fill="currentColor"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div simple-fade="true" class="works_heading-wrap">
                        <div class="display-m">Read along with immediate feedback</div>
                    </div>
                        -->
                </div>
            </div>
        </section>
        <section animate-body-to="2" class="home_dashboard">
            <div class="container">
                <div class="home_dashboard-inner">
                    <!--
                    <div simple-fade="true" class="dashboard_title">
                        <h2 class="body-m">Finally, valuable insight into the hidden dynamics of independent reading</h2>
                    </div>

                    <div class="dashboard_collection w-dyn-list">
                        <div role="list" class="dashboard_list w-dyn-items">
                            <div stagger-fade="trigger" role="listitem" class="dashboard_feature-card w-dyn-item">
                                <div stagger-fade="item" class="dash_content">
                                    <div class="dash_content-text">
                                        <h3 class="display-xxs">Class Overview</h3>
                                        <p class="body-xs">Hikayat Allam provides valuable insight into the hidden dynamics of independent reading, and actionable data at-a-glance. See the impact of your instruction, and bridge the gap between individual and whole-class teaching.</p>
                                    </div>
                                </div>
                                <div stagger-fade="item" class="dash_media">
                                    <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66396238972733a902e132d8_dash-dash.webp" loading="lazy" alt="" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, (max-width: 991px) 600px, 50vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66396238972733a902e132d8_dash-dash-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66396238972733a902e132d8_dash-dash-p-800.webp 800w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66396238972733a902e132d8_dash-dash.webp 900w" class="dash-image" />
                                </div>
                            </div>
                            <div stagger-fade="trigger" role="listitem" class="dashboard_feature-card w-dyn-item">
                                <div stagger-fade="item" class="dash_content">
                                    <div class="dash_content-text">
                                        <h3 class="display-xxs">Reading Evaluation</h3>
                                        <p class="body-xs">Children receive actionable feedback, akin to having a teacher beside them. Teachers are updated on accuracy, fluency, and mastery of phonics skills and gain reader insights through the bespoke dashboard. </p>
                                    </div>
                                </div>
                                <div stagger-fade="item" class="dash_media">
                                    <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639622fcc50f9333fad84bb_dash-fluency.webp" loading="lazy" alt="" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, (max-width: 991px) 600px, 50vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639622fcc50f9333fad84bb_dash-fluency-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639622fcc50f9333fad84bb_dash-fluency-p-800.webp 800w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/6639622fcc50f9333fad84bb_dash-fluency.webp 900w" class="dash-image" />
                                </div>
                            </div>
                            <div stagger-fade="trigger" role="listitem" class="dashboard_feature-card w-dyn-item">
                                <div stagger-fade="item" class="dash_content">
                                    <div class="dash_content-text">
                                        <h3 class="display-xxs">Scope &amp; Sequence</h3>
                                        <p class="body-xs">Hikayat Allam’s systematic and cumulative scope and sequence adapts to align with any phonics curriculum. Teachers can customize Hikayat Allam to ensure decodable books encompass all phonics skills taught in the classroom, offering a truly tailored learning experience where children can decode words in books with confidence. </p>
                                    </div>
                                </div>
                                <div stagger-fade="item" class="dash_media">
                                    <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663962244b47993b1ce8c093_dash-scope.webp" loading="lazy" alt="" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, (max-width: 991px) 600px, 50vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663962244b47993b1ce8c093_dash-scope-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663962244b47993b1ce8c093_dash-scope-p-800.webp 800w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/663962244b47993b1ce8c093_dash-scope.webp 900w" class="dash-image" />
                                </div>
                            </div>
                            <div stagger-fade="trigger" role="listitem" class="dashboard_feature-card w-dyn-item">
                                <div stagger-fade="item" class="dash_content">
                                    <div class="dash_content-text">
                                        <h3 class="display-xxs">Sight Words</h3>
                                        <p class="body-xs">Integrate sight words into decodable books, differentiating stories further to allow children to simultaneously practice learned concepts in the context of engaging stories</p>
                                    </div>
                                </div>
                                <div stagger-fade="item" class="dash_media">
                                    <img src="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66396219f12a0a81619c9e7c_dash-sight.webp" loading="lazy" alt="" sizes="(max-width: 479px) 93vw, (max-width: 767px) 94vw, (max-width: 991px) 600px, 50vw" srcset="https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66396219f12a0a81619c9e7c_dash-sight-p-500.webp 500w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66396219f12a0a81619c9e7c_dash-sight-p-800.webp 800w, https://cdn.prod.website-files.com/6639102ae5abcb167da63d17/66396219f12a0a81619c9e7c_dash-sight.webp 900w" class="dash-image" />
                                </div>
                        -->
                </div>
            </div>
    </div>
</div>
</div>
</section>
<div animate-body-to="1" class="home_details">
    <div id="about" class="container">
        <div class="home_details-inner">
            <div simple-fade="true" class="details_mission-cta">
                <div class="mission_cta-content">
                    <div class="mission_heading">
                        <h3 dir='rtl' class="display-xs">حكايات علّام صممت بحب ❤️</h3>
                    </div>
                    <!-- <a href="/our-mission" class="button_secondary w-inline-block">
                        <div class="secondary_button-text">Our Mission</div>
                    </a> -->
                </div>
                <div class="mission_cta-staff">
                    <div class="staff_condensed-collection w-dyn-list">
                        <div role="list" class="staff_condensed-list w-dyn-items">
                            <div role="listitem" class="staff_condensed-item w-dyn-item">
                                <div class="mission_staff-image">
                                    <img src="https://media.licdn.com/dms/image/v2/D4E03AQGW4GjAROMTBQ/profile-displayphoto-shrink_400_400/profile-displayphoto-shrink_400_400/0/1727261272880?e=1735776000&v=beta&t=ll2LiFFT8LwfUl-_8CW-oOGO4YTL7oCsNoVSHttExbo" loading="lazy" alt="" />
                                </div>
                                <h3 class="display-xxs">عبد العزيز العنزي</h3>
                                <a href="https://www.linkedin.com/in/abdulaziz-alenazi" target="_blank">
                                    <img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="LinkedIn" style="width: 30px; height: 30px;">
                                </a>
                            </div>
                            <div role="listitem" class="staff_condensed-item w-dyn-item">
                                <div class="mission_staff-image">
                                    <img src="https://media.licdn.com/dms/image/v2/D4D03AQEu_VfQWNdZvQ/profile-displayphoto-shrink_400_400/profile-displayphoto-shrink_400_400/0/1726649618236?e=1735776000&v=beta&t=SFKEdnJk06EeASOgSI4q4SBrxe_R_WmGlwWT8-joZDs" loading="lazy" alt="" sizes="(max-width: 479px) 62vw, (max-width: 767px) 208px, (max-width: 991px) 216px, 25vw" srcset="https://media.licdn.com/dms/image/v2/D4D03AQEu_VfQWNdZvQ/profile-displayphoto-shrink_400_400/profile-displayphoto-shrink_400_400/0/1726649618236?e=1735776000&v=beta&t=SFKEdnJk06EeASOgSI4q4SBrxe_R_WmGlwWT8-joZDs 500w, https://media.licdn.com/dms/image/v2/D4D03AQEu_VfQWNdZvQ/profile-displayphoto-shrink_400_400/profile-displayphoto-shrink_400_400/0/1726649618236?e=1735776000&v=beta&t=SFKEdnJk06EeASOgSI4q4SBrxe_R_WmGlwWT8-joZDs 600w" />
                                </div>
                                <h3 class="display-xxs">بدر العنزي</h3>
                                <a href="https://www.linkedin.com/in/badralanazix/" target="_blank">
                                    <img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="LinkedIn" style="width: 30px; height: 30px;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Generate" class="signup_anchor">
                <div simple-fade="true" class="signup_card" dir="rtl">
                    <div class="signup_main" >
                        <div class="signup_main-content">
                            <h5 class="">حِكايات علّام</h5>
                            <p class="body-s">اختر نوع القصة واستعد للانطلاق في رحلة مشوّقة مصممة خصيصًا لطفلك!</p>
                        </div>
                        <div class="signup_main-form">
                            <div class="signup_form w-form">
                                <form id="wf-form-Signup-Form" name="wf-form-Signup-Form" data-name="Signup Form" method="POST" action="#features_card-wrap" class="form" enctype="multipart/form-data" data-wf-page-id="66355d354e187a71fa8b76f8" data-wf-element-id="5fdc9deb-3818-d61a-08f7-c76d891af4c6">
                                    <div class="form_items">
                                        <div class="form_item">
                                            <label for="Name" class="display-xxs"></label>
                                            <input class="form_field w-input" maxlength="256" name="age" data-name="Name" placeholder="العمر, مثال 4" type="number" id="Name" required="" />
                                        </div>
                                        <div class="form_item">
                                            <!-- <label for="School-District" class="form_label">School District</label> -->
                                            <select class="form_field w-select" name="type" data-name="School District" id="School-District" required="">
                                                <option value="" disabled selected>أختر نوع القصة</option>
                                                <option value="عامة">قصص عامة</option>
                                                <option value="الكذب">مخصصة للكذب</option>
                                                <option value="العناد">مخصصة للعناد</option>
                                                <option value="السرقة">مخصصة للسرقة</option>
                                                <option value="اخرى">اخرى</option>
                                            </select>
                                        </div>
                                        <!-- New text box for custom story type -->
                                        <div class="form_item" id="customStoryType" style="display: none;">
                                            <label for="Custom-Story" class="form_label">اكتب نوع القصة</label>
                                            <input class="form_field w-input" maxlength="256" name="type" data-name="Custom Story" placeholder="أدخل نوع القصة هنا" type="text" id="Custom-Story" />
                                        </div>
                                    </div>


                                    <script>
                                        // JavaScript to show/hide the custom story text box
                                        document.getElementById("School-District").addEventListener("change", function() {
                                            var customStoryType = document.getElementById("customStoryType");
                                            if (this.value === "اخرى") {
                                                customStoryType.style.display = "block";
                                            } else {
                                                customStoryType.style.display = "none";
                                            }
                                        });
                                    </script>
                                    <br>
                                    <input type="submit" data-wait="الرجاء الانتظار..." class="button_form w-button" value="توليد القصة" />
                                </form>
                                <div class="success-message w-form-done">
                                    <div class="success_message-inner">
                                        <div class="succes_rich w-richtext">
                                            <h6>شكرا لك</h6>
                                            <p>سيتم عرض القصة بعد لحظات</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-form-fail">
                                    <div>لقد حدث خطأ الرجاء التأكد من صحة البيانات</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="details_faq">
                <div simple-fade="true" class="faq_title">
                    <h3 class="display-xxs">الأسئلة المتكررة</h3>
                </div>
                <div simple-fade="true" class="faq_index">
                    <div class="faq_collection w-dyn-list">
                        <div role="list" class="faq_list w-dyn-items">
                            <!--
                            <div role="listitem" class="faq_list-item w-dyn-item">
                                <div class="faq_item">
                                    <div class="faq_question">
                                        <div class="faq_question-text">
                                            <div class="body-s">How does Hikayat Allam align with the Science of Reading?</div>
                                        </div>
                                        <div class="faq_icon true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 21 21" fill="none" class="cross-svg">
                                                <path d="M11.9126 2.125C11.9126 1.29531 11.2423 0.625 10.4126 0.625C9.58291 0.625 8.9126 1.29531 8.9126 2.125V8.875H2.1626C1.33291 8.875 0.662598 9.54531 0.662598 10.375C0.662598 11.2047 1.33291 11.875 2.1626 11.875H8.9126V18.625C8.9126 19.4547 9.58291 20.125 10.4126 20.125C11.2423 20.125 11.9126 19.4547 11.9126 18.625V11.875H18.6626C19.4923 11.875 20.1626 11.2047 20.1626 10.375C20.1626 9.54531 19.4923 8.875 18.6626 8.875H11.9126V2.125Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="faq_answer">
                                        <div class="faq_rich w-richtext">
                                            <p>The Science of Reading emphasizes the significance of systematic, explicit instruction in phonics, teaching students how to decode words by recognizing the relationship between letters and sounds. Hikayat Allam was designed with the Science of Reading at its core, prioritizing systematic phonics instruction and offering structured opportunities for students to review and practice both new skills and previously learned ones, ensuring continuous growth and mastery in literacy.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                -->
                            <div role="listitem" class="faq_list-item w-dyn-item">
                                <div class="faq_item">
                                    <div class="faq_question">
                                        <div class="faq_question-text">
                                            <div class="body-s">لمن صُممت حكايات علام؟</div>
                                        </div>
                                        <div class="faq_icon true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 21 21" fill="none" class="cross-svg">
                                                <path d="M11.9126 2.125C11.9126 1.29531 11.2423 0.625 10.4126 0.625C9.58291 0.625 8.9126 1.29531 8.9126 2.125V8.875H2.1626C1.33291 8.875 0.662598 9.54531 0.662598 10.375C0.662598 11.2047 1.33291 11.875 2.1626 11.875H8.9126V18.625C8.9126 19.4547 9.58291 20.125 10.4126 20.125C11.2423 20.125 11.9126 19.4547 11.9126 18.625V11.875H18.6626C19.4923 11.875 20.1626 11.2047 20.1626 10.375C20.1626 9.54531 19.4923 8.875 18.6626 8.875H11.9126V2.125Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="faq_answer">
                                        <div class="faq_rich w-richtext">
                                            <p>حكايات علام مصممة لأي طفل يمكنه القراءة ويتعلم مهارات الصوتيات ويتطور كقارئ. تناسب الأطفال في المرحلة الابتدائية المبكرة، وأيضًا الأطفال الأكبر سنًا الذين يرغبون في صقل قدراتهم على القراءة. تجذب حكايات علام الأطفال الذين يستمتعون بالقراءة ويميلون إلى النصوص الجذابة والممتعة.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div role="listitem" class="faq_list-item w-dyn-item">
                                <div class="faq_item">
                                    <div class="faq_question">
                                        <div class="faq_question-text">
                                            <div class="body-s">How do teachers integrate Hikayat Allam into their lessons?</div>
                                        </div>
                                        <div class="faq_icon true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 21 21" fill="none" class="cross-svg">
                                                <path d="M11.9126 2.125C11.9126 1.29531 11.2423 0.625 10.4126 0.625C9.58291 0.625 8.9126 1.29531 8.9126 2.125V8.875H2.1626C1.33291 8.875 0.662598 9.54531 0.662598 10.375C0.662598 11.2047 1.33291 11.875 2.1626 11.875H8.9126V18.625C8.9126 19.4547 9.58291 20.125 10.4126 20.125C11.2423 20.125 11.9126 19.4547 11.9126 18.625V11.875H18.6626C19.4923 11.875 20.1626 11.2047 20.1626 10.375C20.1626 9.54531 19.4923 8.875 18.6626 8.875H11.9126V2.125Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="faq_answer">
                                        <div class="faq_rich w-richtext">
                                            <p>Teachers can use Hikayat Allam as a supplementary tool alongside their phonics instruction, assigning specific books for practice that align with the skills they have taught. Hikayat Allam is designed to help students apply their learning in the context of engaging and personalized stories. This integration allows children to see the practical application of their phonics skills in real reading scenarios, enhancing their understanding and retention. Additionally, teachers can track student progress through the app, providing targeted support and reinforcement as needed.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                -->
                            <div role="listitem" class="faq_list-item w-dyn-item">
                                <div class="faq_item">
                                    <div class="faq_question">
                                        <div class="faq_question-text">
                                            <div class="body-s">هل يمكن تخصيص حكايات علام؟</div>
                                        </div>
                                        <div class="faq_icon true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 21 21" fill="none" class="cross-svg">
                                                <path d="M11.9126 2.125C11.9126 1.29531 11.2423 0.625 10.4126 0.625C9.58291 0.625 8.9126 1.29531 8.9126 2.125V8.875H2.1626C1.33291 8.875 0.662598 9.54531 0.662598 10.375C0.662598 11.2047 1.33291 11.875 2.1626 11.875H8.9126V18.625C8.9126 19.4547 9.58291 20.125 10.4126 20.125C11.2423 20.125 11.9126 19.4547 11.9126 18.625V11.875H18.6626C19.4923 11.875 20.1626 11.2047 20.1626 10.375C20.1626 9.54531 19.4923 8.875 18.6626 8.875H11.9126V2.125Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="faq_answer">
                                        <div class="faq_rich w-richtext">
                                            <p>حكايات علام قابلة للتخصيص بدرجة كبيرة، حيث يمكنك اختيار العادة السيئة التي ترغب في أن يتخلص منها طفلك.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div role="listitem" class="faq_list-item w-dyn-item">
                                <div class="faq_item">
                                    <div class="faq_question">
                                        <div class="faq_question-text">
                                            <div class="body-s">How does Hikayat Allam personalize texts for each child?</div>
                                        </div>
                                        <div class="faq_icon true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 21 21" fill="none" class="cross-svg">
                                                <path d="M11.9126 2.125C11.9126 1.29531 11.2423 0.625 10.4126 0.625C9.58291 0.625 8.9126 1.29531 8.9126 2.125V8.875H2.1626C1.33291 8.875 0.662598 9.54531 0.662598 10.375C0.662598 11.2047 1.33291 11.875 2.1626 11.875H8.9126V18.625C8.9126 19.4547 9.58291 20.125 10.4126 20.125C11.2423 20.125 11.9126 19.4547 11.9126 18.625V11.875H18.6626C19.4923 11.875 20.1626 11.2047 20.1626 10.375C20.1626 9.54531 19.4923 8.875 18.6626 8.875H11.9126V2.125Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="faq_answer">
                                        <div class="faq_rich w-richtext">
                                            <p>Hikayat Allam personalizes texts based on the phonics skills each child is currently learning. Teachers input the specific phonics skill each child is focusing on. Additionally, teachers can enter the sight words that children are learning. Hikayat Allam also ensures that the stories include previously taught skills, allowing children to build on their knowledge and apply what they have learned cumulatively. This differentiation allows each child to work on unique skills and sight words tailored to their individual needs, providing an exceptional level of personalization that enhances their learning experience.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                -->
                            <!--
                            <div role="listitem" class="faq_list-item w-dyn-item">
                                <div class="faq_item">
                                    <div class="faq_question">
                                        <div class="faq_question-text">
                                            <div class="body-s">Can parents use Hikayat Allam at home?</div>
                                        </div>
                                        <div class="faq_icon true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 21 21" fill="none" class="cross-svg">
                                                <path d="M11.9126 2.125C11.9126 1.29531 11.2423 0.625 10.4126 0.625C9.58291 0.625 8.9126 1.29531 8.9126 2.125V8.875H2.1626C1.33291 8.875 0.662598 9.54531 0.662598 10.375C0.662598 11.2047 1.33291 11.875 2.1626 11.875H8.9126V18.625C8.9126 19.4547 9.58291 20.125 10.4126 20.125C11.2423 20.125 11.9126 19.4547 11.9126 18.625V11.875H18.6626C19.4923 11.875 20.1626 11.2047 20.1626 10.375C20.1626 9.54531 19.4923 8.875 18.6626 8.875H11.9126V2.125Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="faq_answer">
                                        <div class="faq_rich w-richtext">
                                            <p>Parents can also use Hikayat Allam to support their child’s reading practice at home, reinforcing the skills learned in school. We encourage students to read at home to build their confidence and fluency. Using Hikayat Allam at home allows children to practice reading in a comfortable environment, with the added benefit of parental involvement and support. This practice helps to create a consistent learning experience and fosters a love for reading.</p>
                                        </div>
                                    </div>
                                </div>
                -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div stagger-fade="trigger" class="footer">
    <div class="container">
        <div class="footer_brand">
            <div class="footer_brand-content">
                <div stagger-fade="item" class="footer_brand-heading">
                    <h2 class="display-l">إلى الطلاقة وما بعدها
                    </h2>
                </div>
                <a data-w-id="5cd12109-fa2e-ca00-808e-f975eac9ab8f" href="#upper" class="button_primary w-inline-block">
                    <div class="button_text">
                        <div class="button_text-primary">!إنطلق</div>
                    </div>
                    <div class="button_arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 32 32" fill="none" class="icon-arrow">
                            <path d="M28.7298 0.28196C30.387 0.28196 31.7328 1.62767 31.7328 3.28495L31.7328 24.4982C31.7328 26.1554 30.387 27.5011 28.7298 27.5011C27.0725 27.5011 25.7268 26.1554 25.7268 24.4982L25.7334 10.5173L5.39524 30.8555C4.22189 32.0288 2.32596 32.0288 1.1526 30.8555C-0.0207509 29.6821 -0.0207512 27.7862 1.1526 26.6128L21.4841 6.28132L7.51656 6.2747C5.85928 6.2747 4.51356 4.92898 4.51356 3.2717C4.51356 1.61442 5.85928 0.268704 7.51656 0.268704L28.7298 0.268701L28.7298 0.28196Z" fill="currentColor"></path>
                        </svg>
                    </div>
                </a>
                <div class="footer_brand-image">
                    <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663974487095c2b1a188f9a8_boy_astronaut.webp" loading="lazy" stagger-fade="item" alt="" sizes="(max-width: 767px) 90vw, (max-width: 991px) 448px, 31vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663974487095c2b1a188f9a8_boy_astronaut-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/663974487095c2b1a188f9a8_boy_astronaut.webp 699w" class="footer_img" />
                </div>
                <div class="brand_background">
                    <img src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66397507303828032a88e3c1_galaxy%20bg.webp" loading="lazy" alt="" sizes="100vw" srcset="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66397507303828032a88e3c1_galaxy%20bg-p-500.webp 500w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66397507303828032a88e3c1_galaxy%20bg-p-800.webp 800w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66397507303828032a88e3c1_galaxy%20bg-p-1080.webp 1080w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66397507303828032a88e3c1_galaxy%20bg-p-1600.webp 1600w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66397507303828032a88e3c1_galaxy%20bg-p-2000.webp 2000w, https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/66397507303828032a88e3c1_galaxy%20bg.webp 2400w" class="brand_bg-image" />
                </div>
            </div>
        </div>
    </div>
    <div class="footer_card-wrap">
        <div class="footer_card">
            <div class="footer_top">
                <div class="footer-logo">
                    <img src="https://salogos.org/wp-content/uploads/2021/12/salogos.org-%D8%B4%D8%B9%D8%A7%D8%B1-%D8%B3%D8%AF%D8%A7%D9%8A%D8%A7.svg" width="100%" viewBox="0 0 151 41" fill="none">

                </div>
                <div class="footer_nav">
                    <a href="#about" class="nav-link w-inline-block">
                        <div class="body-xs">من نحن</div>
                    </a>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="footer_copyright">
                    <div>© Copyright Hikayat Allam 2024</div>
                </div>
                <!-- <div class="footer_deadlinks">
                    <div class="deadlinks_collection w-dyn-list">
                        <div role="list" class="deadlinks_list w-dyn-items">
                            <div role="listitem" class="w-dyn-item">
                                <a href="/info/privacy" class="deadlink w-inline-block">
                                    <div>Privacy</div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a href="/info/terms" class="deadlink w-inline-block">
                                    <div>Terms</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=66355d354e187a71fa8b76e6" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.prod.website-files.com/66355d354e187a71fa8b76e6/js/webflow.6e96582c5.js" type="text/javascript"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/split-type@0.3.4/umd/index.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/ScrollTrigger.min.js"></script>
<script src="https://2p8m24.csb.app/background-color.js"></script>
<script src="https://2p8m24.csb.app/global.js"></script>
<script>
    const playerButtons = document.querySelectorAll('.player-button');
    const audios = document.querySelectorAll('audio');
    const timelines = document.querySelectorAll('.timeline');
    const soundButtons = document.querySelectorAll('.sound-button');

    const playIcon = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" /></svg>`;
    const pauseIcon = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>`;
    const soundIcon = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132"><path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd" /></svg>`;
    const muteIcon = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132"><path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM12.293 7.293a1 1 0 011.414 0L15 8.586l1.293-1.293a1 1 0 111.414 1.414L16.414 10l1.293 1.293a1 1 0 01-1.414 1.414L15 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L13.586 10l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>`;

    playerButtons.forEach((button, index) => {
        const audio = audios[index];

        button.addEventListener('click', () => {
            if (audio.paused) {
                audio.play();
                button.innerHTML = pauseIcon;
            } else {
                audio.pause();
                button.innerHTML = playIcon;
            }
        });

        audio.addEventListener('ended', () => {
            button.innerHTML = playIcon;
        });

        audio.addEventListener('timeupdate', () => {
            const percentagePosition = (100 * audio.currentTime) / audio.duration;
            if (timelines[index]) {
                timelines[index].style.backgroundSize = `${percentagePosition}% 100%`;
                timelines[index].value = percentagePosition;
            }
        });
    });

    timelines.forEach((timeline, index) => {
        const audio = audios[index];
        timeline.addEventListener('change', () => {
            const time = (timeline.value * audio.duration) / 100;
            audio.currentTime = time;
        });
    });

    soundButtons.forEach((button, index) => {
        const audio = audios[index];
        button.addEventListener('click', () => {
            audio.muted = !audio.muted;
            button.innerHTML = audio.muted ? muteIcon : soundIcon;
        });
    });
</script>



</body>
</html>
