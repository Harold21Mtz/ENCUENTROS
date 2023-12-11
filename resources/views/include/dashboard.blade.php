@if($user)
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/logo.jpg" rel="icon">
    <link href="assets2/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets2/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets2/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets2/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets2/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">

            @foreach ($slides as $slide)
            <a href="/dashboard" class=" logo d-flex align-items-center">
                <img src="{{ asset('uploads/slides/logo/' . $slide->conference_logo) }} style=" max-height: 60px !important;" height="80" alt="">
            </a>
            @endforeach
            <i class="bi bi-list toggle-sidebar-btn"></i>
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
    <!-- Template Main JS File -->
    <script src="assets2/js/main.js"></script>
</body>

</html>
@else
@include("auth.login")
@endif