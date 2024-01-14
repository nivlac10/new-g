@extends('layouts.app')

@section('content')
<main style="display: flex; font-size:16px;">
    <div class="application-section" style="display: flex; flex-direction: column; justify-content: center;">
        <div class="card" style="border:none !important; background-color:white !important;">
        
            <div class="card-body application-card" style="background-color:#F4F4F4 !important; border:none !important; padding:10px;">
            <h1 style="padding:5px; font-weight:bold">I. Personal Data:</h1>
            <p style="padding:5px; color:#979FA5; margin-bottom:5px;">Tell us about yourself</p>
                @if(Session::has('success'))
                <div class="alert alert-success">
                    Registration is successful. Please wait for our admin to approve your account.
                </div>
                @endif
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-form-label" style="font-weight:bold;">{{ __('Full Name') }}</label><span style="color:red;"> *</span>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus pattern="[A-Za-z0-9 ]+">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="col-form-label" style="font-weight:bold;">{{ __('Date of Birth') }}</label><span style="color:red;"> *</span>
                        <div class="row">
                            <div class="col-md-4 col-4 mb-2">
                            <select class="form-select" required>
                                <option disabled selected value="">Day</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="1">{{ $i }}</option>
                                @endfor
                            </select>
                            </div>
                            <div class="col-md-4 col-4 mb-2">
                            <select class="form-select" required>
                                <option selected value="" disabled>Month</option>
                                <option value="1">January</option>
                                <option value="1">February</option>
                                <option value="1">March</option>
                                <option value="1">April</option>
                                <option value="1">May</option>
                                <option value="1">June</option>
                                <option value="1">July</option>
                                <option value="1">August</option>
                                <option value="1">September</option>
                                <option value="1">October</option>
                                <option value="1">November</option>
                                <option value="1">December</option>
                            </select>

                            </div>
                            <div class="col-md-4 col-4">
                            <select class="form-select" required>
                                <option value="" disabled selected>Year</option>
                                <?php
                                $currentYear = date("Y");
                                for ($year = 1950; $year <= 2011; $year++) {
                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        @error('day')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('month')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="number" class="col-form-label" style="font-weight:bold;">{{ __('Contact Number') }}</label><span style="color:red;"> *</span>
                        <input id="number" type="number" class="form-control @error('name') is-invalid @enderror" name="number" required autocomplete="name" autofocus>
                        <label for="number" style="color:grey; font-size:12px;" class="col-form-label" style="font-weight:bold;">Example: 12345678</label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label" style="font-weight:bold;">{{ __('Email Address') }}</label><span style="color:red;"> *</span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <label for="number" style="color:grey; font-size:12px;" class="col-form-label" style="font-weight:bold;">Where the confirmation will be send to</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3" style="display:none;">
                        <label for="password" class="col-form-label" style="font-weight:bold;">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="DAC2023admin" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3" style="display:none;">
                        <label for="password-confirm" class="col-form-label" style="font-weight:bold;">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="DAC2023admin" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="homeAddress" class="col-form-label" style="font-weight:bold;">{{ __('Home Address') }}</label><span style="color:red;"> *</span>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <input id="streetAddress" type="text" class="form-control @error('streetAddress') is-invalid @enderror" name="streetAddress" value="{{ old('streetAddress') }}" required>
                                <label for="streetAddress" style="color:grey; font-size:12px;" class="col-form-label" style="font-weight:bold;">Street Address</label>
                            </div>
                            <div class="col-md-6 col-6 mb-2">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required>
                                <label for="city" style="color:grey; font-size:12px;" class="col-form-label" style="font-weight:bold;">City</label>
                            </div>
                            <div class="col-md-6 col-6 mb-2">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required>
                                <label for="state" style="color:grey; font-size:12px;" class="col-form-label" style="font-weight:bold;">State</label>
                            </div>
                            <div class="col-md-6 col-6 mb-2">
                                <input id="postalCode" type="text" class="form-control @error('postalCode') is-invalid @enderror" name="postalCode" value="{{ old('postalCode') }}" required>
                                <label for="postalCode" style="color:grey; font-size:12px;" class="col-form-label" style="font-weight:bold;">Postal Code</label>
                            </div>
                            <div class="col-md-6 col-6">
                            <select class="form-select" id="country">
                                    <option>Please Select</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Aland Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo, Democratic Republic of the Congo</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Cote D'Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">Curacao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and Mcdonald Islands</option>
                                    <option value="VA">Holy See (Vatican City State)</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran, Islamic Republic of</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                    <option value="KR">Korea, Republic of</option>
                                    <option value="XK">Kosovo</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Lao People's Democratic Republic</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libyan Arab Jamahiriya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macao</option>
                                    <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia, Federated States of</option>
                                    <option value="MD">Moldova, Republic of</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestinian Territory, Occupied</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="BL">Saint Barthelemy</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="MF">Saint Martin</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="CS">Serbia and Montenegro</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG" selected>Singapore</option>
                                    <option value="SX">Sint Maarten</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syrian Arab Republic</option>
                                    <option value="TW">Taiwan, Province of China</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania, United Republic of</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States</option>
                                    <option value="UM">United States Minor Outlying Islands</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Viet Nam</option>
                                    <option value="VG">Virgin Islands, British</option>
                                    <option value="VI">Virgin Islands, U.s.</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                                <label for="country" style="color:grey; font-size:12px;" class="col-form-label" style="font-weight:bold;">Country</label>
                            </div>
                        </div>
                        @error('streetAddress')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('postalCode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="referral_code" class="col-form-label" style="font-weight:bold;">Application Code</label><span style="color:red;"> *</span>
			<input id="referral_code" type="text" class="form-control" name="referral_code" value="{{ old('referral_code') }}" required autocomplete="referral_code" autofocus minlength="7" maxlength="7">
			<label for="number" style="color:grey; font-size:12px;" class="col-form-label" style="font-weight:bold;">Kindly request the application code from administrator</label>
                    </div>
                    
                    <div class="mb-3">
                        <label for="resume" class="col-form-label" style="font-weight:bold;">{{ __('Upload Resume') }}</label><span style="color:red;"> *</span>
                        <input id="resume" type="file" class="form-control @error('resume') is-invalid @enderror" name="resume" accept=".pdf,.doc,.docx,.jpeg,.png,.jpg" required>
                        @error('resume')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <h1 style="padding:5px; font-weight:bold;">II. Job Questionnaire:</h1>
                    <div class="mb-3">
                        <label for="join" class="col-form-label" style="font-weight:bold;">You want to join JobCraft Workshop as</label><span style="color:red;"> *</span>
                        <div class="form-check">
                            <input id="joinRemoteAdmin" type="radio" class="form-check-input" name="join" value="Remote Admin" required>
                            <label class="form-check-label" for="joinRemoteAdmin">Remote Admin</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="connection" class="col-form-label" style="font-weight:bold;">Do you have a stable high-speed connection?</label><span style="color:red;"> *</span>
                        <div class="form-check">
                            <input id="yes" type="radio" class="form-check-input" name="connect" value="Yes" required>
                            <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="form-check">
                        <input id="no" type="radio" class="form-check-input" name="connect" value="No" required>
                            <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="connection" class="col-form-label" style="font-weight:bold;">How do you rate your writing skill in English?</label><span style="color:red;"> *</span>
                        <div class="form-check">
                            <select required>
                                <option value="" selected disabled>Please Select</option>
                                <option value="1">Proficient</option>
                                <option value="1">Intermediate</option>
                                <option value="1">Beginner</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="responsibility" class="col-form-label" style="font-weight:bold;">I am ____ to learning new skills and taking on more responsibility. <span style="color:red;"> *</span></label>
                        <div class="form-check">
                            <input id="very" type="radio" class="form-check-input" name="interest" value="Very" required>
                            <label class="form-check-label" for="very">Very interested</label>
                        </div>
                        <div class="form-check">
                            <input id="interested" type="radio" class="form-check-input" name="interest" value="Interested">
                            <label class="form-check-label" for="interested">Kind of interested</label>
                        </div>
                        <div class="form-check">
                            <input id="not" type="radio" class="form-check-input" name="interest" value="Not Interested">
                            <label class="form-check-label" for="not">Not interested</label>
                        </div>
                    </div>
                    <h1 style="padding-left:5px; font-weight:bold">III. Applicant's E-Signature:</h1>
                    <p style="padding:5px; color:#979FA5; margin-bottom:5px;">By signing in the space below, you are certifying that all the information is correct and that you are the person completing this application. When you press the submit button, you will receive an email confirmation that your application was received. Please keep it for your records and retain them as verification of your application.</p>
                    <div class="mb-3">
                        <label for="date" class="col-form-label" style="font-weight:bold;">{{ __('Date') }}</label><span style="color:red;"> *</span>
                        @php
                            $currentDate = date('d/m/Y');
                        @endphp
                        <input id="date" readonly type="text" class="form-control @error('name') is-invalid @enderror" name="currentDate" value="{{ $currentDate }}" autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="signature" class="col-form-label" style="font-weight:bold;">Signature</label><span style="color:red;"> *</span>
                        <div id="signature-pad">
                            <canvas id="signature-canvas" width="300" height="150"></canvas>
                        </div>
                        <button type="button" id="clearSignature" class="btn btn-danger mt-2">Clear</button>
                        <input type="hidden" name="signature" id="signature" value="" required style="opacity:0">
                        

                    </div>
                    <div class="mb-0">
                        <button type="submit" class="btn btn-primary" style="width:100% !important; background-color:#00AF68 !important; border:#00AF68; font-size:18px;">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('signature-canvas');
    const signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)', // Background color
        penColor: 'rgb(0, 0, 0)', // Pen color
    });

    const clearSignatureButton = document.getElementById('clearSignature');
    clearSignatureButton.addEventListener('click', function () {
        signaturePad.clear();
        document.getElementById('signature').value = ''; // Clear the hidden input
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        if (signaturePad.isEmpty()) {
            event.preventDefault(); // Prevent form submission
            alert('Please provide a signature.');
        } else {
            // Signature is present, proceed with form submission
            form.submit();
        }
    });
});
</script>

@endsection
