@extends('layout.loginMaster')
<!--begin::Theme mode setup on page load-->
<!--end::Theme mode setup on page load-->
<!--begin::Root-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('styleCssSection')
    <style>
        .parContainer {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            row-gap: 35px;
        }

        .parContainer>header {
            width: 95%;
            display: flex;
            align-items: flex-start;
        }

        .parContainer>header>img {
            padding-top: 20px;
        }

        .parContainer>.contentRe {
            width: 95%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            row-gap: 15px;
            margin-bottom: 30px;
        }

        .contentRe .headerTitle {
            width: 50%;
            font-size: 2.0rem;
            line-height: 40px;
            color: #000;
            font-weight: bold;
            word-spacing: 5px;

        }

        .contentRe .headerTitle span:nth-child(2) {
            color: #CF202F;
        }

        .contentRe .leftRe {
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            margin: 0 !important;
        }

        .contentRe .centerRe {
            width: 0.3%;
            height: 100%;
            border-radius: 20px;
            background: #000;

        }

        .contentRe .rightRe {
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contentRe .leftRe .inputs {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            row-gap: 13px;
            margin-bottom: 30px;
        }

        .firstInp,
        .lastInp {
            position: relative;
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            row-gap: 5px;

        }

        .emailInp,
        .passInp {
            position: relative;
            width: 90%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            row-gap: 5px;
        }

        .emailInp>input,
        .passInp>input {
            width: 100%;
            outline: none;
            border: none;
            border-bottom: solid #CF202F;
            padding: 10px 0;
            font-size: 1.2rem;
            font-weight: 500;
        }

        .emailInp>span,
        .passInp>span {
            font-size: 1.2rem;
            font-weight: bold;
            color: #CF202F;
        }

        .leftRe>button {
            width: 50%;
            border: none;
            background: #CF202F;
            padding: 10px;
            border-radius: 20px;
            color: #fff;
            font-size: 1.3rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .leftRe>button:hover {
            background: red;
        }

        .showPass,
        .hidePass{
            position: absolute;
            right: 3%;
            top: 30%;
            font-size: 1.4rem !important;
            cursor: pointer;
        }


        footer {
            color: #000;
            font-size: 1.3rem;
            font-weight: 500;
        }

        footer>a {
            font-weight: 800 !important;
            color: #CF202F;
            transition: all 0.3s ease-in-out;
        }

        footer>a:hover {
            color: red;
        }
    </style>
@endsection
{{-- Content page --}}

@if (session()->has('email_session'))
<div class="swal2-container swal2-center swal2-backdrop-show " id="alert_success"
    style="overflow-y: auto;">
    <div aria-labelledby="swal2-title" aria-describedby="swal2-html-container"
        class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog"
        aria-live="assertive" aria-modal="true" style="display: grid;"><button type="button"
            class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
        <ul class="swal2-progress-steps" style="display: none;"></ul>
        <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
            <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);">
            </div>
            <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
            <div class="swal2-success-ring"></div>
            <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
            <div class="swal2-success-circular-line-right"
                style="background-color: rgb(255, 255, 255);"></div>
        </div><img class="swal2-image" style="display: none;">
        <h2 class="swal2-title" id="swal2-title" style="display: block;">Success!</h2>
        <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
            You Should Verification Your Account
        </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file"
            style="display: none;">
        <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
        <select class="swal2-select" style="display: none;"></select>
        <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox"
            class="swal2-checkbox" style="display: none;"><input type="checkbox"><span
                class="swal2-label"></span></label>
        <textarea class="swal2-textarea" style="display: none;"></textarea>
        <div class="swal2-validation-message" id="swal2-validation-message" style="display: none;">
        </div>
        <div class="swal2-actions" style="display: flex;">
            <div class="swal2-loader"></div>
            <button type="button" class="swal2-confirm btn btn-primary" id="btn_hidden" aria-label=""
                style="display: inline-block;">OK</button>
            <button type="button" class="swal2-deny" aria-label=""
                style="display: none;">No</button><button type="button" class="swal2-cancel"
                aria-label="" style="display: none;">Cancel</button>
        </div>
        <div class="swal2-footer" style="display: none;"></div>
        <div class="swal2-timer-progress-bar-container">
            <div class="swal2-timer-progress-bar" style="display: none;"></div>
        </div>
    </div>
</div>
@endif

<div class="parContainer">

    <div class="contentRe">
      <div class="rightRe">
          <img alt="Logo" src="{{ asset('public/icons/elmanhag.png') }}" />
      </div>

      <div class="centerRe"></div>
       
        <form id="formAuthentication" class="leftRe" action="{{route('login.store')}}" class="mb-3"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="headerTitle" style="margin-bottom: 20px;">
            <span>تسجيل الدخول</span>
            <span>للمنهج</span>
        </div>

        <div class="inputs">

            @error('error')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="emailInp" >
                <input type="email" style="text-align: right;" id="emailInput" name="email" placeholder="الايميل">
                @error('email')
                    <span> {{ $message }} </span>
                @enderror
            </div>
            <div class="passInp">
                <input type="password" style="text-align: right;" id="passInput" name="password" placeholder="الباسورد">
                <i class="fa-solid fa-eye showPass d-none"></i>
                <i class="fa-solid fa-eye-slash hidePass"></i>      
                @error('password')
                    <span> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <button type="submit" id="sublogin">تسجيل الدخول</button>
    </form>
      </div>

    <footer>
        هل لا تمتلك حساب؟ <a href="{{ route('sign_up') }}">عمل حساب</a>
    </footer>
</div>

@section('script')
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <script>
        $(document).ready(function() {

            $(".hidePass").click(function() {
                $(this).addClass("d-none")
                $(".showPass").removeClass("d-none")
                $("#passInput").attr("type", "text");
            })
            $(".showPass").click(function() {
                $(this).addClass("d-none")
                $(".hidePass").removeClass("d-none")
                $("#passInput").attr("type", "password");
            })

            function checkFaild(ele) {
                if ($(ele).val() == "") {
                    $(ele).next().removeClass("d-none")
                } else {
                    $(ele).next().addClass("d-none")
                }
            }

            function checkFaildEmail(ele) {
                if ($(ele).val().includes("@")) {
                    $(ele).next().next().addClass("d-none")
                } else {
                    $(ele).next().next().removeClass("d-none")
                }
            }


            $("#emailInput").keyup(function() {
                checkFaild($(this));
                // checkFaildEmail($(this));
            })
            $("#passInput").keyup(function() {
                checkFaild($(this));
            })


            $("#sublogin").click(function(e) {
                var userEmail = $("#emailInput").val();
                var userPass = $("#passInput").val();


                if (userEmail == "") {
                    $("#emailInput").next().removeClass("d-none");
                    e.preventDefault();
                } else {
                    $("#emailInput").next().addClass("d-none");
                }

                if (userPass == "") {
                    $("#passInput").next().removeClass("d-none");
                    e.preventDefault();
                } else {
                    $("#passInput").next().addClass("d-none");
                }

            })
        })
    </script>
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="assets/js/custom/authentication/sign-in/general.js"></script>
    <script src="assets/js/custom/authentication/sign-in/i18n.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->    
    @if (session()->has('email_session'))
        <script>
            let btn = document.getElementById('btn_hidden');
            let alert = document.getElementById('alert_success');
            btn.onclick = function() {
                alert.classList.add("d-none");
            };
        </script>
        <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
        @php
            session()->forget('email_session');
        @endphp
    @endif
@endsection
