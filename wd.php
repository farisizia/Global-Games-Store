<?php 
session_start();
require 'functions.php';

$id = $_GET["id"];




$result = mysqli_query($conn,"SELECT * FROM user WHERE id = $id ");

$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$balance_avail = $row['balance_avail'];


if( isset($_POST['wd'])){

  if( wd_balance($_POST) > 0 )  {
    echo "<script>
          alert('account successfully registered')
         </script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <script>
      $(document).ready(function () {
        //Menu Toggle Script
        $("#menu-toggle").click(function (e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });

        // For highlighting activated tabs
        $("#tab1").click(function () {
          $(".tabs").removeClass("active1");
          $(".tabs").addClass("bg-light");
          $("#tab1").addClass("active1");
          $("#tab1").removeClass("bg-light");
        });
        $("#tab2").click(function () {
          $(".tabs").removeClass("active1");
          $(".tabs").addClass("bg-light");
          $("#tab2").addClass("active1");
          $("#tab2").removeClass("bg-light");
        });
        $("#tab3").click(function () {
          $(".tabs").removeClass("active1");
          $(".tabs").addClass("bg-light");
          $("#tab3").addClass("active1");
          $("#tab3").removeClass("bg-light");
        });
      });
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />

    <title>Pay</title>
  </head>
  <body>
    <style type="text/css">
      * {
        margin: 0;
        padding: 0;
      }

      body {
        overflow-x: hidden;
        background: #000000;
      }

      #bg-div {
        margin: 0;
        margin-top: 100px;
        margin-bottom: 100px;
      }

      #border-btm {
        padding-bottom: 20px;
        margin-bottom: 0px;
        box-shadow: 0px 35px 2px -35px lightgray;
      }

      #test {
        margin-top: 0px;
        margin-bottom: 40px;
        border: 1px solid #ffe082;
        border-radius: 0.25rem;
        width: 60px;
        height: 30px;
        background-color: #ffecb3;
      }

      .active1 {
        color: #00c853 !important;
        font-weight: bold;
      }

      .bar4 {
        width: 35px;
        height: 5px;
        background-color: #ffffff;
        margin: 6px 0;
      }

      .list-group .tabs {
        color: #000000;
      }

      #menu-toggle {
        height: 50px;
      }

      #new-label {
        padding: 2px;
        font-size: 10px;
        font-weight: bold;
        background-color: red;
        color: #ffffff;
        border-radius: 5px;
        margin-left: 5px;
      }

      #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin 0.25s ease-out;
        -moz-transition: margin 0.25s ease-out;
        -o-transition: margin 0.25s ease-out;
        transition: margin 0.25s ease-out;
      }

      #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
      }

      #sidebar-wrapper .list-group {
        width: 15rem;
      }

      #page-content-wrapper {
        min-width: 100vw;
        padding-left: 20px;
        padding-right: 20px;
      }

      #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
      }

      .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #fff !important;
        border-color: #fff !important;
      }

      @media (min-width: 768px) {
        #sidebar-wrapper {
          margin-left: 0;
        }

        #page-content-wrapper {
          min-width: 0;
          width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
          margin-left: -15rem;
          display: none;
        }
      }

      .card0 {
        margin-top: 10px;
        margin-bottom: 10px;
      }

      .top-highlight {
        color: #00c853;
        font-weight: bold;
        font-size: 20px;
      }

      .form-card input,
      .form-card textarea {
        padding: 10px 15px 5px 15px;
        border: none;
        border: 1px solid lightgrey;
        border-radius: 6px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: arial;
        color: #2c3e50;
        font-size: 14px;
        letter-spacing: 1px;
      }

      .form-card input:focus,
      .form-card textarea:focus {
        -moz-box-shadow: 0px 0px 0px 1.5px skyblue !important;
        -webkit-box-shadow: 0px 0px 0px 1.5px skyblue !important;
        box-shadow: 0px 0px 0px 1.5px skyblue !important;
        font-weight: bold;
        border: 1px solid skyblue;
        outline-width: 0;
      }

      input.btn-success {
        height: 50px;
        color: #ffffff;
        opacity: 0.9;
      }

      #below-btn a {
        font-weight: bold;
        color: #000000;
      }

      .input-group {
        position: relative;
        width: 100%;
        overflow: hidden;
      }

      .input-group input {
        position: relative;
        height: 90px;
        margin-left: 1px;
        margin-right: 1px;
        border-radius: 6px;
        padding-top: 30px;
        padding-left: 25px;
      }

      .input-group label {
        position: absolute;
        height: 24px;
        background: none;
        border-radius: 6px;
        line-height: 48px;
        font-size: 15px;
        color: gray;
        width: 100%;
        font-weight: 100;
        padding-left: 25px;
      }

      input:focus + label {
        color: #1e88e5;
      }

      #qr {
        margin-bottom: 150px;
        margin-top: 50px;
      }
    </style>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
    <div class="container-fluid px-0" id="bg-div">
      <div class="row justify-content-center">
        <div class="col-lg-9 col-12">
          <div class="card card0">
            <div class="d-flex" id="wrapper">
              <!-- Sidebar -->
              <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading pt-5 pb-4"><strong>PAY WITH</strong></div>
                <div class="list-group list-group-flush">
                  <a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item active1">
                    <div class="list-div my-2">
                      <div class="fa fa-credit-card"></div>
                      &nbsp;&nbsp; Withdraw
                    </div>
                  </a>
                </div>
              </div>
              <!-- Page Content -->
              <div id="page-content-wrapper">
                <div class="row pt-3" id="border-btm">
                  <div class="col-4">
                    <button class="btn btn-success mt-4 ml-3 mb-3" id="menu-toggle">
                      <div class="bar4"></div>
                      <div class="bar4"></div>
                      <div class="bar4"></div>
                    </button>
                  </div>
                  <div class="col-8">
                    <div class="row justify-content-right">
                      <div class="col-12">
                        <p class="mb-0 mr-4 mt-4 text-right"><?= $username ?></p>
                      </div>
                    </div>
                    <div class="row justify-content-right">
                      <div class="col-12">
                        <p class="mb-0 mr-4 text-right">Pay <span class="top-highlight">$<?= $balance_avail ?></span></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="text-center" id="test">Wd</div>
                </div>
    
                  <div id="menu2" class="tab-pane in active">
                    <div class="row justify-content-center">
                      <div class="col-11">
                        <div class="form-card">
                        <h3 class="mt-0 mb-4 text-center">Enter your paypal account</h3>
                          <form onsubmit="event.preventDefault()">
                            <div class="row">
                              <div class="col-12">
                                <div class="input-group"><input type="text" id="bk_nm" placeholder="Your paypal email" /> <label>Email paypal</label></div>
                              </div>
                            </div>
                            <form action=" " method="post">
                            <div class="row">
                              <div class="col-12">
                                <div class="input-group"><input type="text" name="ben_nm" id="ben-nm" placeholder="$"  name="amount" /> <label>Withdrawal amount</label></div>
                                <input type="hidden" name="id" value="$id">
                                <input type="hidden" name="balance_avail" value="$balance_avail">

                                <select id="country" name="country"  class="input-group">
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                
                              </div>
                              <!-- <div class="col-12">
                                <div class="input-group"><input type="text" name="scode" placeholder="ABCDAB1S" class="placeicon" minlength="8" maxlength="11" /> <label>SWIFT CODE</label></div>
                              </div> -->
                            </div></br></br>
                            <div class="row">

                              <div class="col-md-12"><button  class="btn btn-primary placeicon"   name="wd"> Withdraw</button></div>
                            </div></form>
                            <div class="row">
                              <div class="col-md-12">
                                <!-- <p class="text-center mb-5" id="below-btn"><a href="#">Use a test card</a></p> -->
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>