@extends('users.layouts.master')
@section('content')

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

<div class="content-wrapper" style="min-height: 1923.5px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit User profile
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('users-dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('users-dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{url('/users/save_user_profile_info')}}" method="post" enctype="multipart/form-data">
				        @csrf
        <!--Personal detail-->
        <div class="box box-solid bg-black">
			<div class="box-header with-border">
			  <h3 class="box-title">Personal details</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col-12">
				    

					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Name</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text"  name="name" value="{{$user->name}}">
					  </div>
					</div>
					
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Username</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" readonly  name="user_name" value="{{$user->username}}">
					  </div>
					</div>
					
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Email</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" readonly  name="first_name" value="{{$user->email}}">
					  </div>
					</div>
					
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Gender</label>
					  <div class="col-sm-10">
					      <select class="form-control" name="gender">
					          <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
					          <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
					      </select>
					  </div>
					</div>
					
					
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">DOB</label>
					  <div class="col-sm-10">
						<input class="form-control" type="date" placeholder="Doe" value="{{$user->dob}}" name="dob">
					  </div>
					</div>
					
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Phone</label>
					  <div class="col-sm-10">
						<input class="form-control" type="number" placeholder="Doe" value="{{$user->phone}}" name="phone">
					  </div>
					</div>
					
				</div>
				
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		<!--/Personal detail-->
		
		<!--Address detail-->
        <div class="box box-solid bg-black">
			<div class="box-header with-border">
			  <h3 class="box-title">Address details</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col-12">
				
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Country</label>
					  <div class="col-sm-10">
						<select name="country" required="" class="form-control">
                           <option value="">Select Country</option>
                           @foreach($countries as $key => $country) 
                           <option value="<?php echo $country?>" {{ $user->country == $country ? 'selected' : '' }}><?php echo $country?></option>
                           @endforeach

                         </select>
					  </div>
					</div>
					
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">City</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text"  name="city" value="{{$user->city}}">
					  </div>
					</div>
					
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Zip</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" name="zip_code" value="{{$user->zip_code}}">
					  </div>
					</div>
					
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Street Address</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" name="street_address" value="{{$user->street_address}}">
					  </div>
					</div>
					

		
					
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		<!--/Address-->
		
		<!--Profile Image-->
        <div class="box box-solid bg-black">
			<div class="box-header with-border">
			  <h3 class="box-title">Profile Image</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col-12">
				  
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Image</label>
					  <div class="col-sm-10">
						<input class="form-control" type="file"  name="profile_image">
						 @if(isset($user->profile_image))
					  <img src="{{asset('images/profile_pictures/'.$user->profile_image)}}" width="100" height="100">
					  					  @endif

					  </div>
					</div>
					
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		<!--/Profile Image-->
		<div class="col-sm-10">
						<button type="submit" class="btn btn-yellow">Submit</button>
					  </div>
    
					</form>

    </section>
    <!-- /.content -->
  </div>
@endsection

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd5u1kK4p4BfLGg6HGweOHeG44ex40cgw&libraries=places,drawing&callback=initAutocomplete" async="" defer=""></script> -->