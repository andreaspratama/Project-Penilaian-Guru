<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    :root {
    --background: #1a1a2e;
    --color: #ffffff;
    --primary-color: #0f3460;
    }

    * {
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        margin: 0;
        box-sizing: border-box;
        font-family: "poppins";
        background: var(--background);
        color: var(--color);
        letter-spacing: 1px;
        transition: background 0.2s ease;
        -webkit-transition: background 0.2s ease;
        -moz-transition: background 0.2s ease;
        -ms-transition: background 0.2s ease;
        -o-transition: background 0.2s ease;
    }

    a {
        text-decoration: none;
        color: var(--color);
    }

    h1 {
        font-size: 2.5rem;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        position: relative;
        width: 22.2rem;
    }
    .form-container {
        border: 1px solid hsla(0, 0%, 65%, 0.158);
        box-shadow: 0 0 36px 1px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        backdrop-filter: blur(20px);
        z-index: 99;
        padding: 2rem;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
    }

    .login-container form input {
        display: block;
        padding: 14.5px;
        width: 100%;
        margin: 2rem 0;
        color: var(--color);
        outline: none;
        background-color: #9191911f;
        border: none;
        border-radius: 5px;
        font-weight: 500;
        letter-spacing: 0.8px;
        font-size: 15px;
        backdrop-filter: blur(15px);
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
    }

    .login-container form input:focus {
        box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.2);
        animation: wobble 0.3s ease-in;
        -webkit-animation: wobble 0.3s ease-in;
    }

    .login-container form button {
        background-color: var(--primary-color);
        color: var(--color);
        display: block;
        padding: 13px;
        border-radius: 5px;
        outline: none;
        font-size: 18px;
        letter-spacing: 1.5px;
        font-weight: bold;
        width: 100%;
        cursor: pointer;
        margin-bottom: 2rem;
        transition: all 0.1s ease-in-out;
        border: none;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        -webkit-transition: all 0.1s ease-in-out;
        -moz-transition: all 0.1s ease-in-out;
        -ms-transition: all 0.1s ease-in-out;
        -o-transition: all 0.1s ease-in-out;
    }

    .login-container form button:hover {
        box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.15);
        transform: scale(1.02);
        -webkit-transform: scale(1.02);
        -moz-transform: scale(1.02);
        -ms-transform: scale(1.02);
        -o-transform: scale(1.02);
    }

    .circle {
        width: 8rem;
        height: 8rem;
        background: var(--primary-color);
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        position: absolute;
    }

    .illustration {
        position: absolute;
        top: -14%;
        right: -2px;
        width: 90%;
    }

    .circle-one {
        top: 0;
        left: 0;
        z-index: -1;
        transform: translate(-45%, -45%);
        -webkit-transform: translate(-45%, -45%);
        -moz-transform: translate(-45%, -45%);
        -ms-transform: translate(-45%, -45%);
        -o-transform: translate(-45%, -45%);
    }

    .circle-two {
        bottom: 0;
        right: 0;
        z-index: -1;
        transform: translate(45%, 45%);
        -webkit-transform: translate(45%, 45%);
        -moz-transform: translate(45%, 45%);
        -ms-transform: translate(45%, 45%);
        -o-transform: translate(45%, 45%);
    }

    .register-forget {
        margin: 1rem 0;
        display: flex;
        justify-content: space-between;
    }
    .opacity {
        opacity: 0.6;
    }

    .theme-btn-container {
        position: absolute;
        left: 0;
        bottom: 2rem;
    }

    .theme-btn {
        cursor: pointer;
        transition: all 0.3s ease-in;
    }

    .theme-btn:hover {
        width: 40px !important;
    }

    @keyframes wobble {
        0% {
            transform: scale(1.025);
            -webkit-transform: scale(1.025);
            -moz-transform: scale(1.025);
            -ms-transform: scale(1.025);
            -o-transform: scale(1.025);
        }
        25% {
            transform: scale(1);
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -o-transform: scale(1);
        }
        75% {
            transform: scale(1.025);
            -webkit-transform: scale(1.025);
            -moz-transform: scale(1.025);
            -ms-transform: scale(1.025);
            -o-transform: scale(1.025);
        }
        100% {
            transform: scale(1);
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -o-transform: scale(1);
        }
    }
  </style>
</head>
<body>
  <section class="container">
      <div class="login-container">
          <div class="circle circle-one">
            <img src="{{url('gambar/yski.png')}}" alt="" style="width: 130px">
          </div>
          <div class="form-container">
              <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
              <h1 class="opacity">LOGIN</h1>
              <form action="{{route('prosLogin')}}" method="POST">
                  @csrf
                  <input type="text" name="email" placeholder="USERNAME" />
                  <input type="password" name="password" placeholder="PASSWORD" />
                  <button class="opacity">SUBMIT</button>
              </form>
          </div>
          <div class="circle circle-two"></div>
      </div>
      <div class="theme-btn-container"></div>
  </section>

  <script>
    const themes = [
        {
            background: "#1A1A2E",
            color: "#FFFFFF",
            primaryColor: "#0F3460"
        },
        {
            background: "#461220",
            color: "#FFFFFF",
            primaryColor: "#E94560"
        },
        {
            background: "#192A51",
            color: "#FFFFFF",
            primaryColor: "#967AA1"
        },
        {
            background: "#F7B267",
            color: "#000000",
            primaryColor: "#F4845F"
        },
        {
            background: "#F25F5C",
            color: "#000000",
            primaryColor: "#642B36"
        },
        {
            background: "#231F20",
            color: "#FFF",
            primaryColor: "#BB4430"
        }
    ];

    const setTheme = (theme) => {
        const root = document.querySelector(":root");
        root.style.setProperty("--background", theme.background);
        root.style.setProperty("--color", theme.color);
        root.style.setProperty("--primary-color", theme.primaryColor);
        root.style.setProperty("--glass-color", theme.glassColor);
    };

    const displayThemeButtons = () => {
        const btnContainer = document.querySelector(".theme-btn-container");
        themes.forEach((theme) => {
            const div = document.createElement("div");
            div.className = "theme-btn";
            div.style.cssText = `background: ${theme.background}; width: 25px; height: 25px`;
            btnContainer.appendChild(div);
            div.addEventListener("click", () => setTheme(theme));
        });
    };

    displayThemeButtons();
  </script>
</body>
</html>



{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>OneUI - Bootstrap 5 Admin Template &amp; UI Framework</title>

    <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="OneUI">
    <meta property="og:description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{url('belakang/src/assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{url('belakang/src/assets/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('belakang/src/assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href="{{url('belakang/src/assets/css/oneui.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
  </head>

  <body>
    <!-- Page Container -->
    <!--
        Available classes for #page-container:

    GENERIC

      'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                  - Theme helper buttons [data-toggle="theme"],
                                                  - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                  - ..and/or One.layout('dark_mode_[on/off/toggle]')

    SIDEBAR & SIDE OVERLAY

      'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
      'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
      'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
      'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
      'sidebar-dark'                              Dark themed sidebar

      'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
      'side-overlay-o'                            Visible Side Overlay by default

      'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

      'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

    HEADER

      ''                                          Static Header if no class is added
      'page-header-fixed'                         Fixed Header

    HEADER STYLE

      ''                                          Light themed Header
      'page-header-dark'                          Dark themed Header

    MAIN CONTENT LAYOUT

      ''                                          Full width Main Content if no class is added
      'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
      'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

    DARK MODE

      'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
    -->
    <div id="page-container">

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center">
          <div class="w-100">
            <!-- Sign In Section -->
            <div class="bg-body-extra-light">
              <div class="content content-full">
                <div class="row g-0 justify-content-center">
                  <div class="col-md-8 col-lg-6 col-xl-4 py-4 px-4 px-lg-5">
                    <!-- Header -->
                    <div class="text-center">
                      <p class="mb-2">
                        <i class="fa fa-2x fa-circle-notch text-primary"></i>
                      </p>
                      <h1 class="h4 mb-1">
                        Log In
                      </h1>
                      <p class="fw-medium text-muted mb-3">
                        Sistem Penilaian Guru
                      </p>
                    </div>
                    <!-- END Header -->

                    <!-- Sign In Form -->
                    <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-signin" action="{{route('prosLogin')}}" method="POST">
                      @csrf
                      <div class="py-3">
                        <div class="mb-4">
                          <input type="text" class="form-control form-control-lg form-control-alt" id="login-username" name="email" placeholder="Username">
                        </div>
                        <div class="mb-4">
                          <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="password" placeholder="Password">
                        </div>
                      </div>
                      <div class="row justify-content-center">
                        <div class="col-lg-6 col-xxl-5">
                          <button type="submit" class="btn w-100 btn-alt-primary">
                            <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Log In
                          </button>
                        </div>
                      </div>
                    </form>
                    <!-- END Sign In Form -->
                  </div>
                </div>
              </div>
            </div>
            <!-- END Sign In Section -->

            <!-- Footer -->
            <div class="fs-sm text-center text-muted py-3">
              <strong></strong> &copy; <span>YSKI</span>
            </div>
            <!-- END Footer -->
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{url('belakang/src/assets/js/oneui.app.min.js')}}"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="{{url('belakang/src/assets/js/lib/jquery.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{url('belakang/src/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{url('belakang/src/assets/js/pages/op_auth_signin.min.js')}}"></script>
  </body>
</html> --}}
