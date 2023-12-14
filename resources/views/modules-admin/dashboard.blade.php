@if($user)
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="uploads/slides/logo/logo.jpg" rel="icon">
    <link href="assets2/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->

    <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets2/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets2/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets2/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets2/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">

            @foreach ($slides as $slide)
            <a href="/dashboard" class=" logo d-flex align-items-center">
                <img src="{{ asset('uploads/slides/logo/' . $slide->conference_logo) }}" style=" max-height: 60px !important;" height="80" alt="">
            </a>
            @endforeach
            <i class="bi bi-list toggle-sidebar-btn" style="margin-left: -55px;"></i>
        </div><!-- End Logo -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('uploads/users/' . optional($user)->user_image) }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ optional($user)->name }}</span>
                    </a><!-- End Profile Image Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <img src="{{ asset('uploads/users/' . optional($user)->user_image) }}" alt="Profile" class="rounded-circle">
                        </li>
                        <li class="dropdown-header">
                            <h6>{{ optional($user)->name }}</h6>
                            <span>{{ optional($user)->user_profile }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li>
                                <button type="submit" class="dropdown-item d-flex align-items-center" style="border: none; background: none; cursor: pointer;">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </button>
                            </li>
                        </form>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->
            </ul>
        </nav><!-- End Icons Navigation -->
    </header><!-- End Header -->


    <div style="display: flex;">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bar CHart</h5>

                    <!-- Bar Chart -->
                    <canvas id="barChart" style="max-height: 250px; display: block; box-sizing: border-box; height: 221px; width: 442px;" width="442" height="221"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#barChart'), {
                                type: 'bar',
                                data: {
                                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                    datasets: [{
                                        label: 'Bar Chart',
                                        data: [65, 59, 80, 81, 56, 55, 40],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                    <!-- End Bar CHart -->

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pie Chart</h5>

                    <!-- Pie Chart -->
                    <canvas id="pieChart" style="max-height: 250px; display: block; box-sizing: border-box; height: 400px; width: 442px;" width="442" height="400"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#pieChart'), {
                                type: 'pie',
                                data: {
                                    labels: [
                                        'Red',
                                        'Blue',
                                        'Yellow'
                                    ],
                                    datasets: [{
                                        label: 'My First Dataset',
                                        data: [300, 50, 100],
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)',
                                            'rgb(255, 205, 86)'
                                        ],
                                        hoverOffset: 4
                                    }]
                                }
                            });
                        });
                    </script>
                    <!-- End Pie CHart -->

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bar Chart</h5>

                    <!-- Bar Chart -->
                    <div id="barChart" style="min-height: 365px;">
                        <div id="apexchartsw50qdx7z" class="apexcharts-canvas apexchartsw50qdx7z apexcharts-theme-light" style="width: 443px; height: 350px;"><svg id="SvgjsSvg1372" width="443" height="350" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <foreignObject x="0" y="0" width="443" height="350">
                                    <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 175px;"></div>
                                </foreignObject>
                                <g id="SvgjsG1374" class="apexcharts-inner apexcharts-graphical" transform="translate(105.28125, 30)">
                                    <defs id="SvgjsDefs1373">
                                        <linearGradient id="SvgjsLinearGradient1377" x1="0" y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop1378" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop1379" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop1380" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMaskw50qdx7z">
                                            <rect id="SvgjsRect1382" width="317.2080078125" height="286.348" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskw50qdx7z"></clipPath>
                                        <clipPath id="nonForecastMaskw50qdx7z"></clipPath>
                                        <clipPath id="gridRectMarkerMaskw50qdx7z">
                                            <rect id="SvgjsRect1383" width="317.2080078125" height="286.348" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect1381" width="0" height="282.348" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1377)" class="apexcharts-xcrosshairs" y2="282.348" filter="none" fill-opacity="0.9"></rect>
                                    <line id="SvgjsLine1413" x1="0" y1="283.348" x2="0" y2="289.348" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1414" x1="62.9416015625" y1="283.348" x2="62.9416015625" y2="289.348" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1415" x1="125.883203125" y1="283.348" x2="125.883203125" y2="289.348" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1416" x1="188.8248046875" y1="283.348" x2="188.8248046875" y2="289.348" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1417" x1="251.76640625000002" y1="283.348" x2="251.76640625000002" y2="289.348" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1418" x1="314.70800781250006" y1="283.348" x2="314.70800781250006" y2="289.348" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <g id="SvgjsG1409" class="apexcharts-grid">
                                        <g id="SvgjsG1410" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1420" x1="0" y1="28.2348" x2="313.2080078125" y2="28.2348" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1421" x1="0" y1="56.4696" x2="313.2080078125" y2="56.4696" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1422" x1="0" y1="84.70439999999999" x2="313.2080078125" y2="84.70439999999999" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1423" x1="0" y1="112.9392" x2="313.2080078125" y2="112.9392" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1424" x1="0" y1="141.174" x2="313.2080078125" y2="141.174" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1425" x1="0" y1="169.4088" x2="313.2080078125" y2="169.4088" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1426" x1="0" y1="197.64360000000002" x2="313.2080078125" y2="197.64360000000002" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1427" x1="0" y1="225.87840000000003" x2="313.2080078125" y2="225.87840000000003" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1428" x1="0" y1="254.11320000000003" x2="313.2080078125" y2="254.11320000000003" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1411" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine1431" x1="0" y1="282.348" x2="313.2080078125" y2="282.348" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1430" x1="0" y1="1" x2="0" y2="282.348" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1412" class="apexcharts-grid-borders">
                                        <line id="SvgjsLine1419" x1="0" y1="0" x2="313.2080078125" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1429" x1="0" y1="282.348" x2="313.2080078125" y2="282.348" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1454" x1="0" y1="282.348" x2="313.2080078125" y2="282.348" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1487" x1="0" y1="1" x2="0" y2="282.348" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1384" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG1385" class="apexcharts-series" rel="1" seriesName="series-1" data:realIndex="0">
                                            <path id="SvgjsPath1390" d="M4.101 4.23522L79.62313541666666 4.23522C81.62313541666666 4.23522 83.62313541666666 6.235219999999998 83.62313541666666 8.23522L83.62313541666666 19.99958C83.62313541666666 21.99958 81.62313541666666 23.99958 79.62313541666666 23.99958L4.101 23.99958C2.101 23.99958 0.101 21.99958 0.101 19.99958L0.101 8.23522C0.101 6.23522 2.101 4.23522 4.101 4.23522C4.101 4.23522 4.101 4.23522 4.101 4.23522 " fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskw50qdx7z)" pathTo="M 4.101 4.23522 L 79.62313541666666 4.23522 C 81.62313541666666 4.23522 83.62313541666666 6.23522 83.62313541666666 8.23522 L 83.62313541666666 19.99958 C 83.62313541666666 21.99958 81.62313541666666 23.99958 79.62313541666666 23.99958 L 4.101 23.99958 C 2.101 23.99958 0.101 21.99958 0.101 19.99958 L 0.101 8.23522 C 0.101 6.23522 2.101 4.23522 4.101 4.23522 Z " pathFrom="M 0.101 4.23522 L 0.101 4.23522 L 0.101 23.99958 L 0.101 23.99958 L 0.101 23.99958 L 0.101 23.99958 L 0.101 23.99958 L 0.101 4.23522 Z" cy="32.47002" cx="83.62213541666665" j="0" val="400" barHeight="19.76436" barWidth="83.52213541666666"></path>
                                            <path id="SvgjsPath1392" d="M4.101 32.47002L85.88729557291666 32.47002C87.88729557291666 32.47002 89.88729557291666 34.47002 89.88729557291666 36.47002L89.88729557291666 48.23438C89.88729557291666 50.23438 87.88729557291666 52.23438 85.88729557291666 52.23438L4.101 52.23438C2.101 52.23438 0.101 50.23438 0.101 48.23438L0.101 36.47002C0.101 34.47002 2.101 32.47002 4.101 32.47002C4.101 32.47002 4.101 32.47002 4.101 32.47002 " fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskw50qdx7z)" pathTo="M 4.101 32.47002 L 85.88729557291666 32.47002 C 87.88729557291666 32.47002 89.88729557291666 34.47002 89.88729557291666 36.47002 L 89.88729557291666 48.23438 C 89.88729557291666 50.23438 87.88729557291666 52.23438 85.88729557291666 52.23438 L 4.101 52.23438 C 2.101 52.23438 0.101 50.23438 0.101 48.23438 L 0.101 36.47002 C 0.101 34.47002 2.101 32.47002 4.101 32.47002 Z " pathFrom="M 0.101 32.47002 L 0.101 32.47002 L 0.101 52.23438 L 0.101 52.23438 L 0.101 52.23438 L 0.101 52.23438 L 0.101 52.23438 L 0.101 32.47002 Z" cy="60.70482" cx="89.88629557291665" j="1" val="430" barHeight="19.76436" barWidth="89.78629557291666"></path>
                                            <path id="SvgjsPath1394" d="M4.101 60.70482L89.64579166666665 60.70482C91.64579166666665 60.70482 93.64579166666665 62.70482 93.64579166666665 64.70482L93.64579166666665 76.46918C93.64579166666665 78.46918 91.64579166666665 80.46918 89.64579166666665 80.46918L4.101 80.46918C2.101 80.46918 0.101 78.46918 0.101 76.46918L0.101 64.70482C0.101 62.70482 2.101 60.70482 4.101 60.70482C4.101 60.70482 4.101 60.70482 4.101 60.70482 " fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskw50qdx7z)" pathTo="M 4.101 60.70482 L 89.64579166666665 60.70482 C 91.64579166666665 60.70482 93.64579166666665 62.70482 93.64579166666665 64.70482 L 93.64579166666665 76.46918 C 93.64579166666665 78.46918 91.64579166666665 80.46918 89.64579166666665 80.46918 L 4.101 80.46918 C 2.101 80.46918 0.101 78.46918 0.101 76.46918 L 0.101 64.70482 C 0.101 62.70482 2.101 60.70482 4.101 60.70482 Z " pathFrom="M 0.101 60.70482 L 0.101 60.70482 L 0.101 80.46918 L 0.101 80.46918 L 0.101 80.46918 L 0.101 80.46918 L 0.101 80.46918 L 0.101 60.70482 Z" cy="88.93961999999999" cx="93.64479166666665" j="2" val="448" barHeight="19.76436" barWidth="93.54479166666665"></path>
                                            <path id="SvgjsPath1396" d="M4.101 88.93961999999999L94.23950911458333 88.93961999999999C96.23950911458333 88.93961999999999 98.23950911458333 90.93961999999999 98.23950911458333 92.93961999999999L98.23950911458333 104.70397999999999C98.23950911458333 106.70397999999999 96.23950911458333 108.70397999999999 94.23950911458333 108.70397999999999L4.101 108.70397999999999C2.101 108.70397999999999 0.101 106.70397999999999 0.101 104.70397999999999L0.101 92.93961999999999C0.101 90.93961999999999 2.101 88.93961999999999 4.101 88.93961999999999C4.101 88.93961999999999 4.101 88.93961999999999 4.101 88.93961999999999 " fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskw50qdx7z)" pathTo="M 4.101 88.93961999999999 L 94.23950911458333 88.93961999999999 C 96.23950911458333 88.93961999999999 98.23950911458333 90.93961999999999 98.23950911458333 92.93961999999999 L 98.23950911458333 104.70397999999999 C 98.23950911458333 106.70397999999999 96.23950911458333 108.70397999999999 94.23950911458333 108.70397999999999 L 4.101 108.70397999999999 C 2.101 108.70397999999999 0.101 106.70397999999999 0.101 104.70397999999999 L 0.101 92.93961999999999 C 0.101 90.93961999999999 2.101 88.93961999999999 4.101 88.93961999999999 Z " pathFrom="M 0.101 88.93961999999999 L 0.101 88.93961999999999 L 0.101 108.70397999999999 L 0.101 108.70397999999999 L 0.101 108.70397999999999 L 0.101 108.70397999999999 L 0.101 108.70397999999999 L 0.101 88.93961999999999 Z" cy="117.17442" cx="98.23850911458332" j="3" val="470" barHeight="19.76436" barWidth="98.13850911458333"></path>
                                            <path id="SvgjsPath1398" d="M4.101 117.17442L108.85588281249998 117.17442C110.85588281249998 117.17442 112.85588281249998 119.17442 112.85588281249998 121.17442L112.85588281249998 132.93878C112.85588281249998 134.93878 110.85588281249998 136.93878 108.85588281249998 136.93878L4.101 136.93878C2.101 136.93878 0.101 134.93878 0.101 132.93878L0.101 121.17442C0.101 119.17442 2.101 117.17442 4.101 117.17442C4.101 117.17442 4.101 117.17442 4.101 117.17442 " fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskw50qdx7z)" pathTo="M 4.101 117.17442 L 108.85588281249998 117.17442 C 110.85588281249998 117.17442 112.85588281249998 119.17442 112.85588281249998 121.17442 L 112.85588281249998 132.93878 C 112.85588281249998 134.93878 110.85588281249998 136.93878 108.85588281249998 136.93878 L 4.101 136.93878 C 2.101 136.93878 0.101 134.93878 0.101 132.93878 L 0.101 121.17442 C 0.101 119.17442 2.101 117.17442 4.101 117.17442 Z " pathFrom="M 0.101 117.17442 L 0.101 117.17442 L 0.101 136.93878 L 0.101 136.93878 L 0.101 136.93878 L 0.101 136.93878 L 0.101 136.93878 L 0.101 117.17442 Z" cy="145.40922" cx="112.85488281249998" j="4" val="540" barHeight="19.76436" barWidth="112.75488281249999"></path>
                                            <path id="SvgjsPath1400" d="M4.101 145.40922L117.20809635416666 145.40922C119.20809635416666 145.40922 121.20809635416666 147.40922 121.20809635416666 149.40922L121.20809635416666 161.17358000000002C121.20809635416666 163.17358000000002 119.20809635416666 165.17358000000002 117.20809635416666 165.17358000000002L4.101 165.17358000000002C2.101 165.17358000000002 0.101 163.17358000000002 0.101 161.17358000000002L0.101 149.40922C0.101 147.40922 2.101 145.40922 4.101 145.40922C4.101 145.40922 4.101 145.40922 4.101 145.40922 " fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskw50qdx7z)" pathTo="M 4.101 145.40922 L 117.20809635416666 145.40922 C 119.20809635416666 145.40922 121.20809635416666 147.40922 121.20809635416666 149.40922 L 121.20809635416666 161.17358000000002 C 121.20809635416666 163.17358000000002 119.20809635416666 165.17358000000002 117.20809635416666 165.17358000000002 L 4.101 165.17358000000002 C 2.101 165.17358000000002 0.101 163.17358000000002 0.101 161.17358000000002 L 0.101 149.40922 C 0.101 147.40922 2.101 145.40922 4.101 145.40922 Z " pathFrom="M 0.101 145.40922 L 0.101 145.40922 L 0.101 165.17358000000002 L 0.101 165.17358000000002 L 0.101 165.17358000000002 L 0.101 165.17358000000002 L 0.101 165.17358000000002 L 0.101 145.40922 Z" cy="173.64402" cx="121.20709635416665" j="5" val="580" barHeight="19.76436" barWidth="121.10709635416666"></path>
                                            <path id="SvgjsPath1402" d="M4.101 173.64402L140.17668359375 173.64402C142.17668359375 173.64402 144.17668359375 175.64402 144.17668359375 177.64402L144.17668359375 189.40838000000002C144.17668359375 191.40838000000002 142.17668359375 193.40838000000002 140.17668359375 193.40838000000002L4.101 193.40838000000002C2.101 193.40838000000002 0.101 191.40838000000002 0.101 189.40838000000002L0.101 177.64402C0.101 175.64402 2.101 173.64402 4.101 173.64402C4.101 173.64402 4.101 173.64402 4.101 173.64402 " fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskw50qdx7z)" pathTo="M 4.101 173.64402 L 140.17668359375 173.64402 C 142.17668359375 173.64402 144.17668359375 175.64402 144.17668359375 177.64402 L 144.17668359375 189.40838000000002 C 144.17668359375 191.40838000000002 142.17668359375 193.40838000000002 140.17668359375 193.40838000000002 L 4.101 193.40838000000002 C 2.101 193.40838000000002 0.101 191.40838000000002 0.101 189.40838000000002 L 0.101 177.64402 C 0.101 175.64402 2.101 173.64402 4.101 173.64402 Z " pathFrom="M 0.101 173.64402 L 0.101 173.64402 L 0.101 193.40838000000002 L 0.101 193.40838000000002 L 0.101 193.40838000000002 L 0.101 193.40838000000002 L 0.101 193.40838000000002 L 0.101 173.64402 Z" cy="201.87882000000002" cx="144.17568359375" j="6" val="690" barHeight="19.76436" barWidth="144.07568359375"></path>
                                            <path id="SvgjsPath1404" d="M4.101 201.87882000000002L225.7868723958333 201.87882000000002C227.7868723958333 201.87882000000002 229.7868723958333 203.87882000000002 229.7868723958333 205.87882000000002L229.7868723958333 217.64318000000003C229.7868723958333 219.64318000000003 227.7868723958333 221.64318000000003 225.7868723958333 221.64318000000003L4.101 221.64318000000003C2.101 221.64318000000003 0.101 219.64318000000003 0.101 217.64318000000003L0.101 205.87882000000002C0.101 203.87882000000002 2.101 201.87882000000002 4.101 201.87882000000002C4.101 201.87882000000002 4.101 201.87882000000002 4.101 201.87882000000002 " fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskw50qdx7z)" pathTo="M 4.101 201.87882000000002 L 225.7868723958333 201.87882000000002 C 227.7868723958333 201.87882000000002 229.7868723958333 203.87882000000002 229.7868723958333 205.87882000000002 L 229.7868723958333 217.64318000000003 C 229.7868723958333 219.64318000000003 227.7868723958333 221.64318000000003 225.7868723958333 221.64318000000003 L 4.101 221.64318000000003 C 2.101 221.64318000000003 0.101 219.64318000000003 0.101 217.64318000000003 L 0.101 205.87882000000002 C 0.101 203.87882000000002 2.101 201.87882000000002 4.101 201.87882000000002 Z " pathFrom="M 0.101 201.87882000000002 L 0.101 201.87882000000002 L 0.101 221.64318000000003 L 0.101 221.64318000000003 L 0.101 221.64318000000003 L 0.101 221.64318000000003 L 0.101 221.64318000000003 L 0.101 201.87882000000002 Z" cy="230.11362000000003" cx="229.7858723958333" j="7" val="1100" barHeight="19.76436" barWidth="229.68587239583331"></path>
                                            <path id="SvgjsPath1406" d="M4.101 230.11362000000003L246.66740624999997 230.11362000000003C248.66740624999997 230.11362000000003 250.66740624999997 232.11362000000003 250.66740624999997 234.11362000000003L250.66740624999997 245.87798000000004C250.66740624999997 247.87798000000004 248.66740624999997 249.87798000000004 246.66740624999997 249.87798000000004L4.101 249.87798000000004C2.101 249.87798000000004 0.101 247.87798000000004 0.101 245.87798000000004L0.101 234.11362000000003C0.101 232.11362000000003 2.101 230.11362000000003 4.101 230.11362000000003C4.101 230.11362000000003 4.101 230.11362000000003 4.101 230.11362000000003 " fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskw50qdx7z)" pathTo="M 4.101 230.11362000000003 L 246.66740624999997 230.11362000000003 C 248.66740624999997 230.11362000000003 250.66740624999997 232.11362000000003 250.66740624999997 234.11362000000003 L 250.66740624999997 245.87798000000004 C 250.66740624999997 247.87798000000004 248.66740624999997 249.87798000000004 246.66740624999997 249.87798000000004 L 4.101 249.87798000000004 C 2.101 249.87798000000004 0.101 247.87798000000004 0.101 245.87798000000004 L 0.101 234.11362000000003 C 0.101 232.11362000000003 2.101 230.11362000000003 4.101 230.11362000000003 Z " pathFrom="M 0.101 230.11362000000003 L 0.101 230.11362000000003 L 0.101 249.87798000000004 L 0.101 249.87798000000004 L 0.101 249.87798000000004 L 0.101 249.87798000000004 L 0.101 249.87798000000004 L 0.101 230.11362000000003 Z" cy="258.34842000000003" cx="250.66640624999997" j="8" val="1200" barHeight="19.76436" barWidth="250.56640624999997"></path>
                                            <path id="SvgjsPath1408" d="M4.101 258.34842000000003L284.2523671875 258.34842000000003C286.2523671875 258.34842000000003 288.2523671875 260.34842000000003 288.2523671875 262.34842000000003L288.2523671875 274.11278000000004C288.2523671875 276.11278000000004 286.2523671875 278.11278000000004 284.2523671875 278.11278000000004L4.101 278.11278000000004C2.101 278.11278000000004 0.101 276.11278000000004 0.101 274.11278000000004L0.101 262.34842000000003C0.101 260.34842000000003 2.101 258.34842000000003 4.101 258.34842000000003C4.101 258.34842000000003 4.101 258.34842000000003 4.101 258.34842000000003 " fill="rgba(0,143,251,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskw50qdx7z)" pathTo="M 4.101 258.34842000000003 L 284.2523671875 258.34842000000003 C 286.2523671875 258.34842000000003 288.2523671875 260.34842000000003 288.2523671875 262.34842000000003 L 288.2523671875 274.11278000000004 C 288.2523671875 276.11278000000004 286.2523671875 278.11278000000004 284.2523671875 278.11278000000004 L 4.101 278.11278000000004 C 2.101 278.11278000000004 0.101 276.11278000000004 0.101 274.11278000000004 L 0.101 262.34842000000003 C 0.101 260.34842000000003 2.101 258.34842000000003 4.101 258.34842000000003 Z " pathFrom="M 0.101 258.34842000000003 L 0.101 258.34842000000003 L 0.101 278.11278000000004 L 0.101 278.11278000000004 L 0.101 278.11278000000004 L 0.101 278.11278000000004 L 0.101 278.11278000000004 L 0.101 258.34842000000003 Z" cy="286.58322000000004" cx="288.2513671875" j="9" val="1380" barHeight="19.76436" barWidth="288.1513671875"></path>
                                            <g id="SvgjsG1387" class="apexcharts-bar-goals-markers">
                                                <g id="SvgjsG1389" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskw50qdx7z)"></g>
                                                <g id="SvgjsG1391" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskw50qdx7z)"></g>
                                                <g id="SvgjsG1393" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskw50qdx7z)"></g>
                                                <g id="SvgjsG1395" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskw50qdx7z)"></g>
                                                <g id="SvgjsG1397" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskw50qdx7z)"></g>
                                                <g id="SvgjsG1399" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskw50qdx7z)"></g>
                                                <g id="SvgjsG1401" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskw50qdx7z)"></g>
                                                <g id="SvgjsG1403" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskw50qdx7z)"></g>
                                                <g id="SvgjsG1405" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskw50qdx7z)"></g>
                                                <g id="SvgjsG1407" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskw50qdx7z)"></g>
                                            </g>
                                            <g id="SvgjsG1388" class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                        </g>
                                        <g id="SvgjsG1386" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1432" x1="0" y1="0" x2="313.2080078125" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1433" x1="0" y1="0" x2="313.2080078125" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1455" class="apexcharts-yaxis apexcharts-xaxis-inversed" rel="0">
                                        <g id="SvgjsG1456" class="apexcharts-yaxis-texts-g apexcharts-xaxis-inversed-texts-g" transform="translate(0, 0)"><text id="SvgjsText1458" font-family="Helvetica, Arial, sans-serif" x="-15" y="15.4008" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1459">South Korea</tspan>
                                                <title>South Korea</title>
                                            </text><text id="SvgjsText1461" font-family="Helvetica, Arial, sans-serif" x="-15" y="43.6356" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1462">Canada</tspan>
                                                <title>Canada</title>
                                            </text><text id="SvgjsText1464" font-family="Helvetica, Arial, sans-serif" x="-15" y="71.87039999999999" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1465">United Kingdom</tspan>
                                                <title>United Kingdom</title>
                                            </text><text id="SvgjsText1467" font-family="Helvetica, Arial, sans-serif" x="-15" y="100.1052" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1468">Netherlands</tspan>
                                                <title>Netherlands</title>
                                            </text><text id="SvgjsText1470" font-family="Helvetica, Arial, sans-serif" x="-15" y="128.34" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1471">Italy</tspan>
                                                <title>Italy</title>
                                            </text><text id="SvgjsText1473" font-family="Helvetica, Arial, sans-serif" x="-15" y="156.5748" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1474">France</tspan>
                                                <title>France</title>
                                            </text><text id="SvgjsText1476" font-family="Helvetica, Arial, sans-serif" x="-15" y="184.80960000000002" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1477">Japan</tspan>
                                                <title>Japan</title>
                                            </text><text id="SvgjsText1479" font-family="Helvetica, Arial, sans-serif" x="-15" y="213.04440000000002" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1480">United States</tspan>
                                                <title>United States</title>
                                            </text><text id="SvgjsText1482" font-family="Helvetica, Arial, sans-serif" x="-15" y="241.27920000000003" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1483">China</tspan>
                                                <title>China</title>
                                            </text><text id="SvgjsText1485" font-family="Helvetica, Arial, sans-serif" x="-15" y="269.514" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1486">Germany</tspan>
                                                <title>Germany</title>
                                            </text></g>
                                    </g>
                                    <g id="SvgjsG1434" class="apexcharts-xaxis apexcharts-yaxis-inversed">
                                        <g id="SvgjsG1435" class="apexcharts-xaxis-texts-g" transform="translate(0, -8)"><text id="SvgjsText1436" font-family="Helvetica, Arial, sans-serif" x="313.2080078125" y="312.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1438">1500</tspan>
                                                <title>1500</title>
                                            </text><text id="SvgjsText1439" font-family="Helvetica, Arial, sans-serif" x="250.46640625" y="312.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1441">1200</tspan>
                                                <title>1200</title>
                                            </text><text id="SvgjsText1442" font-family="Helvetica, Arial, sans-serif" x="187.72480468749998" y="312.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1444">900</tspan>
                                                <title>900</title>
                                            </text><text id="SvgjsText1445" font-family="Helvetica, Arial, sans-serif" x="124.98320312499999" y="312.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1447">600</tspan>
                                                <title>600</title>
                                            </text><text id="SvgjsText1448" font-family="Helvetica, Arial, sans-serif" x="62.241601562499994" y="312.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1450">300</tspan>
                                                <title>300</title>
                                            </text><text id="SvgjsText1451" font-family="Helvetica, Arial, sans-serif" x="-0.5" y="312.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1453">0</tspan>
                                                <title>0</title>
                                            </text></g>
                                    </g>
                                    <g id="SvgjsG1488" class="apexcharts-yaxis-annotations apexcharts-hidden-element-shown"></g>
                                    <g id="SvgjsG1489" class="apexcharts-xaxis-annotations apexcharts-hidden-element-shown"></g>
                                    <g id="SvgjsG1490" class="apexcharts-point-annotations apexcharts-hidden-element-shown"></g>
                                </g>
                            </svg>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 143, 251);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                            <div class="apexcharts-toolbar" style="top: 0px; right: 3px;">
                                <div class="apexcharts-menu-icon" title="Menu"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                                        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                                    </svg></div>
                                <div class="apexcharts-menu">
                                    <div class="apexcharts-menu-item exportSVG" title="Download SVG">Download SVG</div>
                                    <div class="apexcharts-menu-item exportPNG" title="Download PNG">Download PNG</div>
                                    <div class="apexcharts-menu-item exportCSV" title="Download CSV">Download CSV</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#barChart"), {
                                series: [{
                                    data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
                                }],
                                chart: {
                                    type: 'bar',
                                    height: 350
                                },
                                plotOptions: {
                                    bar: {
                                        borderRadius: 4,
                                        horizontal: true,
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                xaxis: {
                                    categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
                                        'United States', 'China', 'Germany'
                                    ],
                                }
                            }).render();
                        });
                    </script>
                    <!-- End Bar Chart -->

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pie Chart</h5>

                    <!-- Pie Chart -->
                    <div id="pieChart" style="min-height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" class="echart" _echarts_instance_="ec_1702528973887">
                        <div style="position: relative; width: 443px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="443" height="400" style="position: absolute; left: 0px; top: 0px; width: 443px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div>
                        <div class=""></div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            echarts.init(document.querySelector("#pieChart")).setOption({
                                title: {
                                    text: 'Referer of a Website',
                                    subtext: 'Fake Data',
                                    left: 'center'
                                },
                                tooltip: {
                                    trigger: 'item'
                                },
                                legend: {
                                    orient: 'vertical',
                                    left: 'left'
                                },
                                series: [{
                                    name: 'Access From',
                                    type: 'pie',
                                    radius: '50%',
                                    data: [{
                                            value: 1048,
                                            name: 'Search Engine'
                                        },
                                        {
                                            value: 735,
                                            name: 'Direct'
                                        },
                                        {
                                            value: 580,
                                            name: 'Email'
                                        },
                                        {
                                            value: 484,
                                            name: 'Union Ads'
                                        },
                                        {
                                            value: 300,
                                            name: 'Video Ads'
                                        }
                                    ],
                                    emphasis: {
                                        itemStyle: {
                                            shadowBlur: 10,
                                            shadowOffsetX: 0,
                                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                                        }
                                    }
                                }]
                            });
                        });
                    </script>
                    <!-- End Pie Chart -->

                </div>
            </div>
        </div>
    </div>
    <!-- Agrega esto al final del cuerpo de tu vista antes de cerrar el tag </body> -->
    <script>
        // Obtener la cantidad de speakers desde PHP
        const speakersCount = {
            !!json_encode($speakersCount) !!
        };
        console.log('Speakers Count:', speakersCount);
        // Configuración del gráfico Pie Chart
        const data = {
            labels: ['Speakers', 'Otros'],
            datasets: [{
                data: [speakersCount, 0],
                backgroundColor: ['rgba(255, 99, 132, 0.7)', 'rgba(255, 255, 255, 0.7)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(255, 255, 255, 1)'],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Pie Chart'
                    }
                }
            },
        };
    </script>



    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-pen"></i><span>Authors Area</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('dates_index')}}">
                            <i class="bi bi-calendar4-week"></i><span>Important Dates</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('submissions_index')}}">
                            <i class="bi bi-file-earmark-text"></i><span>Abstract Submission</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('instructions_index') }}">
                            <i class="bi bi-book"></i><span>Instructions for Authors</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('topics_index') }}">
                            <i class="bi bi-tags"></i><span>Topics</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('publishings_index') }}">
                            <i class="bi bi-bookmark"></i><span>Publication Options</span>
                        </a>
                    </li>

                </ul>
            </li><!-- Authors Area -->

            <li class="nav-item">
                <a class="nav-link" href="{{ route('hotels_index') }}">
                    <i class="bi bi-building"></i><span>Hotels</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
                    <i class="bi bi-geo-alt"></i><span>Organization</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('index')}}">
                            <i class="bi bi-list-ul"></i><span>Index</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('slide_index')}}">
                            <i class="bi bi-sliders"></i><span>Slide</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('organizing_index')}}">
                            <i class="bi bi-award"></i><span>Organizing</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('organizingcommittee_index')}}">
                            <i class="bi bi-file-earmark-person"></i><span>Organizing Committee</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('scientificcommitteeN_index')}}">
                            <i class="bi bi-people"></i><span>Scientific Committee National</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('scientificcommitteeI_index')}}">
                            <i class="bi bi-people"></i><span>Scientific Committee International</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Organization Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
                    <i class="bi bi-book"></i><span>Program</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('scientificProgram_index') }}">
                            <i class="bi bi-journal"></i><span>Scientific Program</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('speakers_index') }}">
                            <i class="bi bi-person"></i><span>Speakers</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('workShop_index') }}">
                            <i class="bi bi-person"></i><span>WorkShop Participants</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('scientificProgramS_index') }}">
                            <i class="bi bi-journal"></i><span>Scientific Program S</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('socialEvents_index') }}">
                            <i class="bi bi-calendar-event"></i><span>Social Events</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Program Nav -->
        </ul>
    </aside>


    <!-- Vendor JS Files -->
    <script src="assets2/vendor/php-email-form/validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/14b19b20ff.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Template Main JS File -->
    <script src="assets2/js/main.js"></script>
</body>

</html>
@else
@include("auth.login")
@endif