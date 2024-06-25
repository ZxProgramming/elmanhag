@php
    if (!empty(session('data'))) {
        $data = session('data');
    }
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@extends('layout.loginMaster')
@section('styleCssSection')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .parContainer {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
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
            color: #727272;
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
            background: #727272;

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

        .nickInp,
        .emailInp,
        .phoneInp,
        .passInp,
        .passConfInp {
            position: relative;
            width: 90%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            row-gap: 5px;
        }

        .fulName {
            width: 90%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            column-gap: 50px;
        }

        .firstInp>input,
        .lastInp>input,
        .nickInp>input,
        .emailInp>input,
        .phoneInp>input,
        .passInp>input,
        .passConfInp>input {
            width: 100%;
            outline: none;
            border: none;
            border-bottom: solid red;
            padding: 10px 0;
            font-size: 1.2rem;
            font-weight: 500;
        }

        .firstInp>span,
        .lastInp>span,
        .nickInp>span,
        .emailInp>span,
        .phoneInp>span,
        .passInp>span,
        .passConfInp>span {
            font-size: 1.2rem;
            font-weight: bold;
            color: red;
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
        .hidePass,
        .showPassConf,
        .hidePassConf {
            position: absolute;
            right: 3%;
            top: 30%;
            font-size: 1.4rem !important;
            cursor: pointer;
        }


        footer {
            color: #727272;
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

<div class="parContainer">
    <div class="contentRe">
        <div class="rightRe">
            <img alt="Logo" src="{{ asset('public/icons/elmanhag.png') }}" />
        </div>

        <div class="centerRe"></div>
        <input type="hidden" class="cities_data" value="{{$city}}" />
        <form action="{{ route('sign_up_add') }}" method="POST" novalidate="novalidate" class="leftRe">
            @csrf
            <div class="headerTitle">
                <span>عمل حساب فى</span>
                <span>المنهج</span>
            </div>

            @include('success')
            <div class="inputs">

                <div class="nickInp">
                    <input type="text" style="text-align: right;" name="name" placeholder="الاسم">
                    @error('name')
                        <span style="color: red;"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="fulName">
                    <div class="firstInp">
                        <input type="email" style="text-align: right;" name="email" placeholder="الايميل">
                        @error('email')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="lastInp">
                        <input type="text" id="lastInput" style="text-align: right;" name="phone" placeholder="التليفون">
                        @error('phone')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="passInp">
                    <input type="password" id="passInput" style="text-align: right" name="password" placeholder="الباسورد">
                    @error('password')
                        <span style="color: red;"> {{ $message }} </span>
                    @enderror
                    <i class="fa-solid fa-eye showPass d-none"></i>
                    <i class="fa-solid fa-eye-slash hidePass"></i>
                </div>
                <div class="passConfInp">
                    <input type="password" id="passConfInput" style="text-align: right;" name="conf_password" placeholder="تأكيد الباسورد">
                
                    <span class="d-none">تأكيد الباسورد غير صحيح</span>
                </div>

                <div class="fulName">
                    <div class="firstInp">
                        <input style="text-align: right;" name="parent_name" placeholder="أسم ولى الأمر">
                        @error('parent_name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="lastInp">
                        <input type="text" id="lastInput" style="text-align: right;" name="parent_phone" placeholder="تليفون ولى الأمر">
                        @error('parent_phone')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="fulName">
                    <div class="firstInp">
                        <select class="country form-control" name="country">
                            <option selected disabled>
                                ... أختر البلد
                            </option>
                            @foreach ( $country as $item )
                                <option value="{{$item->id}}">
                                    {{$item->country_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="lastInp">
                        <select class="city form-control" name="city_id">
                            <option selected disabled>
                                ... أختر المحافظة
                            </option>
                        </select>
                        @error('city_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                

                <div class="fulName">
                    <div class="firstInp">
                        <div style="display: flex; align-items: center;">
                            <label for="language">لغات</label>
                            <input type="radio" name="type" value="لغات" id="language" />
                        </div>
                        <div style="display: flex; align-items: center;">
                            <label for="Arabic">عربى</label>
                            <input type="radio" name="type" value="عربى" id="Arabic" />
                        </div>
                        @error('type')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="lastInp">
                        <select name="category_id">
                            <option selected disabled>
                                أختر السنة الدراسية
                            </option>
                            @foreach ( $category as $item )
                                <option value="{{$item->id}}">{{$item->category}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" id="subSign">عمل حساب</button>
        </form>
    </div>

    <footer>
        You have an account? <a href="{{ route('login.index') }}">Login</a>
    </footer>
</div>



{{-- ////Content page --}}

@section('script')
    <script>
        let cities_data = document.querySelector('.cities_data');
        let country = document.querySelector('.country');
        let city = document.querySelector('.city');
        cities_data = cities_data.value;
        cities_data = JSON.parse(cities_data);
        console.log(cities_data);

        country.addEventListener('change', () => {
            city.innerHTML = `
                <option selected disabled>
                    ... أختر المحافظة
                </option>`;

            cities_data.forEach( item => {
                if ( item.country == country.value ) {
                    city.innerHTML += `
                        <option value="${item.id}">
                            ${item.city_name}
                        </option>`;
                }
            });
        });

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

            $(".hidePassConf").click(function() {
                $(this).addClass("d-none")
                $(".showPassConf").removeClass("d-none")
                $("#passConfInput").attr("type", "text");
            })
            $(".showPassConf").click(function() {
                $(this).addClass("d-none")
                $(".hidePassConf").removeClass("d-none")
                $("#passConfInput").attr("type", "password");
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

            function checkconfirmPass(pass, confPass) {
                if ($(pass).val() == $(confPass).val()) {
                    $(pass).next().next().addClass("d-none")
                } else {
                    $(pass).next().next().removeClass("d-none")
                }
            }


            $("#firstInput").keyup(function() {
                checkFaild($(this));
            })
            $("#lastInput").keyup(function() {
                checkFaild($(this));
            })
            $("#nickInput").keyup(function() {
                checkFaild($(this));
            })
            $("#emailInput").keyup(function() {
                checkFaild($(this));
                // checkFaildEmail($(this));
            })
            $("#phoneInput").keyup(function() {
                checkFaild($(this));
            })
            $("#passInput").keyup(function() {
                checkFaild($(this));
            })
            $("#passConfInput").keyup(function() {
                checkFaild($(this));
                checkconfirmPass($(this), $("#passInput"));
            })


            $("#subSign").click(function(e) {
                var firstName = $("#firstInput").val();
                var lastName = $("#lastInput").val();
                var nickName = $("#nickInput").val();
                var userEmail = $("#emailInput").val();
                var userPhone = $("#phoneInput").val();
                var userPass = $("#passInput").val();
                var userPassConf = $("#passConfInput").val();

                if (firstName == "") {
                    $("#firstInput").next().removeClass("d-none");
                    e.preventDefault();
                } else {
                    $("#firstInput").next().addClass("d-none");
                }
                if (lastName == "") {
                    $("#lastInput").next().removeClass("d-none");
                    e.preventDefault();
                } else {
                    $("#lastInput").next().addClass("d-none");
                }
                if (nickName == "") {
                    $("#nickInput").next().removeClass("d-none");
                    e.preventDefault();
                } else {
                    $("#nickInput").next().addClass("d-none");
                }

                if (userEmail == "") {
                    $("#emailInput").next().removeClass("d-none");
                    e.preventDefault();
                } else {
                    $("#emailInput").next().addClass("d-none");
                }
                if ($("#emailInput").val().includes("@")) {
                    $("#emailInput").next().next().addClass("d-none");
                    // e.preventDefault();
                } else {
                    $("#emailInput").next().next().removeClass("d-none");
                }

                if (userPhone == "") {
                    $("#phoneInput").next().removeClass("d-none");
                    e.preventDefault();
                } else {
                    $("#phoneInput").next().addClass("d-none");
                }


                if (userPass == "") {
                    $("#passInput").next().removeClass("d-none");
                    e.preventDefault();
                } else {
                    $("#passInput").next().addClass("d-none");
                }

                if (userPassConf == "") {
                    $("#passConfInput").next().removeClass("d-none");
                    e.preventDefault();
                } else {
                    $("#passConfInput").next().addClass("d-none");
                    if (userPassConf == $("#passInput").val()) {
                        $("#passConfInput").next().next().addClass("d-none");
                        // e.preventDefault();
                    } else {
                        $("#passConfInput").next().next().removeClass("d-none");
                    }
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
@endsection
