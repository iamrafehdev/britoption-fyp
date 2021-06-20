<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Brit Option - Way to higher financial attitude</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/frontend-theme/images/favicon.png">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{asset('public/frontend-theme/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend-theme/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend-theme/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend-theme/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend-theme/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend-theme/css/skins/orange.css')}}">
    <!-- new css -->
    <script src="{{asset('public/frontend-theme/js/modernizr.js')}}"></script>

</head>
<style>
    .has-error {
        border-color: #cc0000;
        background-color: black;
    }

</style>
<?php
$countries = array("AF" => "Afghanistan",
    "AX" => "Åland Islands",
    "AL" => "Albania",
    "DZ" => "Algeria",
    "AS" => "American Samoa",
    "AD" => "Andorra",
    "AO" => "Angola",
    "AI" => "Anguilla",
    "AQ" => "Antarctica",
    "AG" => "Antigua and Barbuda",
    "AR" => "Argentina",
    "AM" => "Armenia",
    "AW" => "Aruba",
    "AU" => "Australia",
    "AT" => "Austria",
    "AZ" => "Azerbaijan",
    "BS" => "Bahamas",
    "BH" => "Bahrain",
    "BD" => "Bangladesh",
    "BB" => "Barbados",
    "BY" => "Belarus",
    "BE" => "Belgium",
    "BZ" => "Belize",
    "BJ" => "Benin",
    "BM" => "Bermuda",
    "BT" => "Bhutan",
    "BO" => "Bolivia",
    "BA" => "Bosnia and Herzegovina",
    "BW" => "Botswana",
    "BV" => "Bouvet Island",
    "BR" => "Brazil",
    "IO" => "British Indian Ocean Territory",
    "BN" => "Brunei Darussalam",
    "BG" => "Bulgaria",
    "BF" => "Burkina Faso",
    "BI" => "Burundi",
    "KH" => "Cambodia",
    "CM" => "Cameroon",
    "CA" => "Canada",
    "CV" => "Cape Verde",
    "KY" => "Cayman Islands",
    "CF" => "Central African Republic",
    "TD" => "Chad",
    "CL" => "Chile",
    "CN" => "China",
    "CX" => "Christmas Island",
    "CC" => "Cocos (Keeling) Islands",
    "CO" => "Colombia",
    "KM" => "Comoros",
    "CG" => "Congo",
    "CD" => "Congo, The Democratic Republic of The",
    "CK" => "Cook Islands",
    "CR" => "Costa Rica",
    "CI" => "Cote D'ivoire",
    "HR" => "Croatia",
    "CU" => "Cuba",
    "CY" => "Cyprus",
    "CZ" => "Czech Republic",
    "DK" => "Denmark",
    "DJ" => "Djibouti",
    "DM" => "Dominica",
    "DO" => "Dominican Republic",
    "EC" => "Ecuador",
    "EG" => "Egypt",
    "SV" => "El Salvador",
    "GQ" => "Equatorial Guinea",
    "ER" => "Eritrea",
    "EE" => "Estonia",
    "ET" => "Ethiopia",
    "FK" => "Falkland Islands (Malvinas)",
    "FO" => "Faroe Islands",
    "FJ" => "Fiji",
    "FI" => "Finland",
    "FR" => "France",
    "GF" => "French Guiana",
    "PF" => "French Polynesia",
    "TF" => "French Southern Territories",
    "GA" => "Gabon",
    "GM" => "Gambia",
    "GE" => "Georgia",
    "DE" => "Germany",
    "GH" => "Ghana",
    "GI" => "Gibraltar",
    "GR" => "Greece",
    "GL" => "Greenland",
    "GD" => "Grenada",
    "GP" => "Guadeloupe",
    "GU" => "Guam",
    "GT" => "Guatemala",
    "GG" => "Guernsey",
    "GN" => "Guinea",
    "GW" => "Guinea-bissau",
    "GY" => "Guyana",
    "HT" => "Haiti",
    "HM" => "Heard Island and Mcdonald Islands",
    "VA" => "Holy See (Vatican City State)",
    "HN" => "Honduras",
    "HK" => "Hong Kong",
    "HU" => "Hungary",
    "IS" => "Iceland",
    "IN" => "India",
    "ID" => "Indonesia",
    "IR" => "Iran, Islamic Republic of",
    "IQ" => "Iraq",
    "IE" => "Ireland",
    "IM" => "Isle of Man",
    "IL" => "Israel",
    "IT" => "Italy",
    "JM" => "Jamaica",
    "JP" => "Japan",
    "JE" => "Jersey",
    "JO" => "Jordan",
    "KZ" => "Kazakhstan",
    "KE" => "Kenya",
    "KI" => "Kiribati",
    "KP" => "Korea, Democratic People's Republic of",
    "KR" => "Korea, Republic of",
    "KW" => "Kuwait",
    "KG" => "Kyrgyzstan",
    "LA" => "Lao People's Democratic Republic",
    "LV" => "Latvia",
    "LB" => "Lebanon",
    "LS" => "Lesotho",
    "LR" => "Liberia",
    "LY" => "Libyan Arab Jamahiriya",
    "LI" => "Liechtenstein",
    "LT" => "Lithuania",
    "LU" => "Luxembourg",
    "MO" => "Macao",
    "MK" => "Macedonia, The Former Yugoslav Republic of",
    "MG" => "Madagascar",
    "MW" => "Malawi",
    "MY" => "Malaysia",
    "MV" => "Maldives",
    "ML" => "Mali",
    "MT" => "Malta",
    "MH" => "Marshall Islands",
    "MQ" => "Martinique",
    "MR" => "Mauritania",
    "MU" => "Mauritius",
    "YT" => "Mayotte",
    "MX" => "Mexico",
    "FM" => "Micronesia, Federated States of",
    "MD" => "Moldova, Republic of",
    "MC" => "Monaco",
    "MN" => "Mongolia",
    "ME" => "Montenegro",
    "MS" => "Montserrat",
    "MA" => "Morocco",
    "MZ" => "Mozambique",
    "MM" => "Myanmar",
    "NA" => "Namibia",
    "NR" => "Nauru",
    "NP" => "Nepal",
    "NL" => "Netherlands",
    "AN" => "Netherlands Antilles",
    "NC" => "New Caledonia",
    "NZ" => "New Zealand",
    "NI" => "Nicaragua",
    "NE" => "Niger",
    "NG" => "Nigeria",
    "NU" => "Niue",
    "NF" => "Norfolk Island",
    "MP" => "Northern Mariana Islands",
    "NO" => "Norway",
    "OM" => "Oman",
    "PK" => "Pakistan",
    "PW" => "Palau",
    "PS" => "Palestinian Territory, Occupied",
    "PA" => "Panama",
    "PG" => "Papua New Guinea",
    "PY" => "Paraguay",
    "PE" => "Peru",
    "PH" => "Philippines",
    "PN" => "Pitcairn",
    "PL" => "Poland",
    "PT" => "Portugal",
    "PR" => "Puerto Rico",
    "QA" => "Qatar",
    "RE" => "Reunion",
    "RO" => "Romania",
    "RU" => "Russian Federation",
    "RW" => "Rwanda",
    "SH" => "Saint Helena",
    "KN" => "Saint Kitts and Nevis",
    "LC" => "Saint Lucia",
    "PM" => "Saint Pierre and Miquelon",
    "VC" => "Saint Vincent and The Grenadines",
    "WS" => "Samoa",
    "SM" => "San Marino",
    "ST" => "Sao Tome and Principe",
    "SA" => "Saudi Arabia",
    "SN" => "Senegal",
    "RS" => "Serbia",
    "SC" => "Seychelles",
    "SL" => "Sierra Leone",
    "SG" => "Singapore",
    "SK" => "Slovakia",
    "SI" => "Slovenia",
    "SB" => "Solomon Islands",
    "SO" => "Somalia",
    "ZA" => "South Africa",
    "GS" => "South Georgia and The South Sandwich Islands",
    "ES" => "Spain",
    "LK" => "Sri Lanka",
    "SD" => "Sudan",
    "SR" => "Suriname",
    "SJ" => "Svalbard and Jan Mayen",
    "SZ" => "Swaziland",
    "SE" => "Sweden",
    "CH" => "Switzerland",
    "SY" => "Syrian Arab Republic",
    "TW" => "Taiwan, Province of China",
    "TJ" => "Tajikistan",
    "TZ" => "Tanzania, United Republic of",
    "TH" => "Thailand",
    "TL" => "Timor-leste",
    "TG" => "Togo",
    "TK" => "Tokelau",
    "TO" => "Tonga",
    "TT" => "Trinidad and Tobago",
    "TN" => "Tunisia",
    "TR" => "Turkey",
    "TM" => "Turkmenistan",
    "TC" => "Turks and Caicos Islands",
    "TV" => "Tuvalu",
    "UG" => "Uganda",
    "UA" => "Ukraine",
    "AE" => "United Arab Emirates",
    "GB" => "United Kingdom",
    "US" => "United States",
    "UM" => "United States Minor Outlying Islands",
    "UY" => "Uruguay",
    "UZ" => "Uzbekistan",
    "VU" => "Vanuatu",
    "VE" => "Venezuela",
    "VN" => "Viet Nam",
    "VG" => "Virgin Islands, British",
    "VI" => "Virgin Islands, U.S.",
    "WF" => "Wallis and Futuna",
    "EH" => "Western Sahara",
    "YE" => "Yemen",
    "ZM" => "Zambia",
    "ZW" => "Zimbabwe");
?>

<body>

<!-- Wrapper Starts -->

<!-- Wrapper Starts -->
<div class="wrapper">
    <div class="container-fluid user-auth">
        <div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
            <!-- Logo Starts -->
            <a class="logo" href="#">
                <img class="img-responsive" src="public/frontend-theme/images/logo.png" alt="logo">
            </a>
            <!-- Logo Ends -->
            <!-- Slider Starts -->
            <div id="carousel-testimonials" class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Indicators Starts -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-testimonials" data-slide-to="1"></li>
                    <li data-target="#carousel-testimonials" data-slide-to="2"></li>
                </ol>
                <!-- Indicators Ends -->
                <!-- Carousel Inner Starts -->
                <div class="carousel-inner">
                    <!-- Carousel Item Starts -->
                    <div class="item active item-1">
                        <div>
                            <blockquote>
                                <p>The name of the first service we provide for you is Forex Trading. With Forex trading
                                    you can earn great profit after investment. Forex trading can be explained as a
                                    network of buyers and sellers,
                                    who transfer currency between each other at an agreed price. Our Services that make
                                    up 80% of global forex trading include EUR/USD, USD/JPY, GBP/USD, USD/CHF, USD/CAD,
                                    and AUD/USD.</p>
                                <footer><span>Forex </span>, Trading</footer>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Carousel Item Ends -->
                    <!-- Carousel Item Starts -->
                    <div class="item item-2">
                        <div>
                            <blockquote>
                                <p>The name of the Second service we provide for you is Cryptocurrency. With
                                    cryptocurrency, you can earn great profit after investment. Brit Option
                                    cryptocurrency trading enables users to gain high profits
                                    with small investments. Users are in a position to make a profit whether the
                                    cryptocurrency price rises or falls. </p>
                                <footer><span>Cryptocurrency </span>, Trading</footer>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Carousel Item Ends -->
                    <!-- Carousel Item Starts -->
                    <div class="item item-3">
                        <div>
                            <blockquote>
                                <p>The last one service we provide for you is Gaming Zone. With Gaming Zone, you can
                                    earn great profit after investment. There are different types of gaming zones like
                                    Arcade Gaming, PC Gaming/Console Gaming, Non-Virtual Gaming Zone (Club based).
                                    Our Client invest their money and get a maximum profit in this platform.</p>
                                <footer><span>Gaming </span>, Zone</footer>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Carousel Item Ends -->
                </div>
                <!-- Carousel Inner Ends -->
            </div>
            <!-- Slider Ends -->
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <!-- Logo Starts -->
            <a class="visible-xs" href="#">
                <img class="img-responsive mobile-logo" src="public/frontend-theme/images/logo.png" alt="logo">
            </a>
            <!-- Logo Ends -->
            <div class="form-container">
                <div>
                    <!-- Section Title Starts -->
                    <div class="row text-center">
                        <h2 class="title-head hidden-xs">get <span>started</span></h2>
                    </div>
                    <!-- Section Title Ends -->
                    <!-- Form Starts -->
                    <form method="POST" action="{{ route('signup') }}">
                        @csrf
                        <?php
                        if (isset($_GET['ref']) != NULL) {
                            $ref_name = $_GET['ref'];
                            $ref_user = \App\User::where('username', $ref_name)->first();
                        } else
                            $ref_name = '';
                        ?>
                        <div style="display:none;">
                            <input class="form-styling form-control" type="text" name="ref_name" value="{{$ref_name}}"
                                   id="ref_name"/>
                        </div>
                        @if(isset($_GET['ref'])!=NULL)
                            <div class="alert alert-success">
                                Referral Matched. Name is : {{$ref_user->name}}
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="" placeholder="Your Name *"
                                   required="">
                        </div>

                        <div class="form-group">
                            <input type="text" id="username" name="username" onchange="check_username()"
                                   class="form-control" value="" placeholder="Your Username *" required="">
                            <span id="error_username"></span>
                        </div>

                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" value=""
                                   placeholder="Emai Address*" required="">
                            <span id="error_email"></span>

                        </div>

                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" value="" placeholder="Phone"
                                   required="">
                        </div>

                        <div class="form-group">
                            <select name="country" required="" class="form-control">
                                <option value="">Select Country</option>
                                @foreach($countries as $key => $country)
                                    <option value="<?php echo $country?>"><?php echo $country?></option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" required="" value=""
                                   class="input_pass @error('password') is-invalid @enderror form-control"
                                   placeholder="Enter Password">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" value=""
                                   placeholder="Enter Confirm Password">
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Submit Form Button Starts -->
                        <div class="form-group">
                            <button class="btn btn-primary" id="register" type="submit">create account</button>
                            <p class="text-center">already have an account ? <a href="/login">Login</a>
                        </div>
                        <!-- Submit Form Button Ends -->
                    </form>
                    <!-- Form Ends -->
                </div>
            </div>
            <!-- Copyright Text Starts -->
            <p class="text-center copyright-text">Copyright © <?php echo date('Y'); ?> Brit Option All Rights
                Reserved</p>
            <!-- Copyright Text Ends -->
        </div>
    </div>


</div>
<!-- Wrapper Ends -->


<!-- Template JS Files -->
<script src="{{ asset('public/frontend-theme/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{ asset('public/frontend-theme/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/frontend-theme/js/select2.min.js')}}"></script>
<script src="{{ asset('public/frontend-theme/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('public/frontend-theme/js/custom.js')}}"></script>
<script>


    function check_username() {
        var error_username = '';
        var username = $('#username').val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "{{ route('username_available.check') }}",
            method: "POST",
            data: {username: username, _token: _token},
            success: function (result) {
                if (result == 'unique') {
                    $('#error_username').html('<label class="text-success">Username Available</label>');
                    $('#username').removeClass('has-error');
                    $('#register').attr('disabled', false);
                } else {
                    $('#error_username').html('<label class="text-danger">Username Already Exist</label>');
                    $('#username').addClass('has-error');
                    $('#register').attr('disabled', 'disabled');
                }
            }
        });
    }

</script>
<script>


    $(document).ready(function () {


        $('#email').blur(function () {
            var error_email = '';
            var email = $('#email').val();
            var _token = $('input[name="_token"]').val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(email)) {
                $('#error_email').html('<label class="text-danger">Invalid Email</label>');
                $('#email').addClass('has-error');
                $('#register').attr('disabled', 'disabled');
            } else {
                $.ajax({
                    url: "{{ route('email_available.check') }}",
                    method: "POST",
                    data: {email: email, _token: _token},
                    success: function (result) {
                        if (result == 'unique') {
                            $('#error_email').html('<label class="text-success">Email Available</label>');
                            $('#email').removeClass('has-error');
                            $('#register').attr('disabled', false);
                        } else {
                            $('#error_email').html('<label class="text-danger">Email Already Exist</label>');
                            $('#email').addClass('has-error');
                            $('#register').attr('disabled', 'disabled');
                        }
                    }
                })
            }
        });


    });
</script>

<!-- Wrapper Ends -->
</body>

</html>
