<?php

error_reporting(0);
session_start();
// session_destroy();

if($_SESSION['message'])
{
    $message=$_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message'); 
    </script>";
}
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }
?>

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="AdmissionNew.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--<title>Responsive Regisration Form </title>--> 
</head>
<body>
<div class="overlay">
    <div class="container">
        <header>STUDENT APPLICATION FORM</header>

        <!-- Added Encryption tag to support file uploads -->
        <form method="POST" action="Adata_check.php" enctype="multipart/form-data">
    <div class="details ID">
        <span class="title">STUDENT INFORMATION</span>
        <hr>

        <div class="input-field">
            <label>REF NO (auto-generated)</label>
            <input type="hidden" name="RefNo" value="<?php echo uniqid(); ?>">
        </div>

        <div class="input-field">
            <label>Please indicate how you got to know about Britannia</label>
            <br>
            <select required name="about">
                <option disabled selected>Select</option>
                <option>Agent</option>
                <option>Internet/ social media</option>
                <option>Event/ fair</option>
                <option>Newspaper</option>
                <option>Friend</option>
                <option>School/ Counselor</option>
            </select>
        </div>

        <div class="details personal">
            <div class="fields">
                <div class="input-field">
                    <label>Name as per Passport/ ID</label>
                    <input type="text" required name="studentName">
                </div>

                <div class="input-field">
                    <label>Gender</label>
                    <select required name="Gender">
                        <option disabled selected>Select</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div class="input-field">
                    <label>Marital Status</label>
                    <select required name="Martials">
                        <option disabled selected>Select</option>
                        <option>Single</option>
                        <option>Married</option>
                    </select>
                </div>
                    </div> 
                </div>
                <div class="fields">
                         <div class="input-field">
                                <label>Nationality</label>
                                <select required name="studentNationality">
        <option value="">-- select one --</option>
        <option value="AFGHAN">AFGHAN</option>
<option value="ALBANIAN">ALBANIAN</option>
<option value="ALGERIAN">ALGERIAN</option>
<option value="AMERICAN">AMERICAN</option>
<option value="ANDORRAN">ANDORRAN</option>
<option value="ANGOLAN">ANGOLAN</option>
<option value="ANTIGUANS">ANTIGUANS</option>
<option value="ARGENTINEAN">ARGENTINEAN</option>
<option value="ARMENIAN">ARMENIAN</option>
<option value="AUSTRALIAN">AUSTRALIAN</option>
<option value="AUSTRIAN">AUSTRIAN</option>
<option value="AZERBAIJANI">AZERBAIJANI</option>
<option value="BAHAMIAN">BAHAMIAN</option>
<option value="BAHRAINI">BAHRAINI</option>
<option value="BANGLADESHI">BANGLADESHI</option>
<option value="BARBADIAN">BARBADIAN</option>
<option value="BARBUDANS">BARBUDANS</option>
<option value="BATSWANA">BATSWANA</option>
<option value="BELARUSIAN">BELARUSIAN</option>
<option value="BELGIAN">BELGIAN</option>
<option value="BELIZEAN">BELIZEAN</option>
<option value="BENINESE">BENINESE</option>
<option value="BHUTANESE">BHUTANESE</option>
<option value="BOLIVIAN">BOLIVIAN</option>
<option value="BOSNIAN">BOSNIAN</option>
<option value="BRAZILIAN">BRAZILIAN</option>
<option value="BRITISH">BRITISH</option>
<option value="BRUNEIAN">BRUNEIAN</option>
<option value="BULGARIAN">BULGARIAN</option>
<option value="BURKINABE">BURKINABE</option>
<option value="BURMESE">BURMESE</option>
<option value="BURUNDIAN">BURUNDIAN</option>
<option value="CAMBODIAN">CAMBODIAN</option>
<option value="CAMEROONIAN">CAMEROONIAN</option>
<option value="CANADIAN">CANADIAN</option>
<option value="CAPE VERDEAN">CAPE VERDEAN</option>
<option value="CENTRAL AFRICAN">CENTRAL AFRICAN</option>
<option value="CHADIAN">CHADIAN</option>
<option value="CHILEAN">CHILEAN</option>
<option value="CHINESE">CHINESE</option>
<option value="COLOMBIAN">COLOMBIAN</option>
<option value="COMORAN">COMORAN</option>
<option value="CONGOLESE">CONGOLESE</option>
<option value="COSTA RICAN">COSTA RICAN</option>
<option value="CROATIAN">CROATIAN</option>
<option value="CUBAN">CUBAN</option>
<option value="CYPRIOT">CYPRIOT</option>
<option value="CZECH">CZECH</option>
<option value="DANISH">DANISH</option>
<option value="DJIBOUTI">DJIBOUTI</option>
<option value="DOMINICAN">DOMINICAN</option>
<option value="DUTCH">DUTCH</option>
<option value="EAST TIMORESE">EAST TIMORESE</option>
<option value="ECUADOREAN">ECUADOREAN</option>
<option value="EGYPTIAN">EGYPTIAN</option>
<option value="EMIRIAN">EMIRIAN</option>
<option value="EQUATORIAL GUINEAN">EQUATORIAL GUINEAN</option>
<option value="ERITREAN">ERITREAN</option>
<option value="ESTONIAN">ESTONIAN</option>
<option value="ETHIOPIAN">ETHIOPIAN</option>
<option value="FIJIAN">FIJIAN</option>
<option value="FILIPINO">FILIPINO</option>
<option value="FINNISH">FINNISH</option>
<option value="FRENCH">FRENCH</option>
<option value="GABONESE">GABONESE</option>
<option value="GAMBIAN">GAMBIAN</option>
<option value="GEORGIAN">GEORGIAN</option>
<option value="GERMAN">GERMAN</option>
<option value="GHANAIAN">GHANAIAN</option>
<option value="GREEK">GREEK</option>
<option value="GRENADIAN">GRENADIAN</option>
<option value="GUATEMALAN">GUATEMALAN</option>
<option value="GUINEA-BISSAUAN">GUINEA-BISSAUAN</option>
<option value="GUINEAN">GUINEAN</option>
<option value="GUYANESE">GUYANESE</option>
<option value="HAITIAN">HAITIAN</option>
<option value="HERZEGOVINIAN">HERZEGOVINIAN</option>
<option value="HONDURAN">HONDURAN</option>
<option value="HUNGARIAN">HUNGARIAN</option>
<option value="ICELANDER">ICELANDER</option>
<option value="INDIAN">INDIAN</option>
<option value="INDONESIAN">INDONESIAN</option>
<option value="IRANIAN">IRANIAN</option>
<option value="IRAQI">IRAQI</option>
<option value="IRISH">IRISH</option>
<option value="ISRAELI">ISRAELI</option>
<option value="ITALIAN">ITALIAN</option>
<option value="IVORIAN">IVORIAN</option>
<option value="JAMAICAN">JAMAICAN</option>
<option value="JAPANESE">JAPANESE</option>
<option value="JORDANIAN">JORDANIAN</option>
<option value="KAZAKHSTANI">KAZAKHSTANI</option>
<option value="KENYAN">KENYAN</option>
<option value="KITTIAN AND NEVISIAN">KITTIAN AND NEVISIAN</option>
<option value="KUWAITI">KUWAITI</option>
<option value="KYRGYZ">KYRGYZ</option>
<option value="LAOTIAN">LAOTIAN</option>
<option value="LATVIAN">LATVIAN</option>
<option value="LEBANESE">LEBANESE</option>
<option value="LIBERIAN">LIBERIAN</option>
<option value="LIBYAN">LIBYAN</option>
<option value="LIECHTENSTEINER">LIECHTENSTEINER</option>
<option value="LITHUANIAN">LITHUANIAN</option>
<option value="LUXEMBOURGER">LUXEMBOURGER</option>
<option value="MACEDONIAN">MACEDONIAN</option>
<option value="MALAGASY">MALAGASY</option>
<option value="MALAWIAN">MALAWIAN</option>
<option value="MALAYSIAN">MALAYSIAN</option>
<option value="MALDIVAN">MALDIVAN</option>
<option value="MALIAN">MALIAN</option>
<option value="MALTESE">MALTESE</option>
<option value="MARSHALLESE">MARSHALLESE</option>
<option value="MAURITANIAN">MAURITANIAN</option>
<option value="MAURITIAN">MAURITIAN</option>
<option value="MEXICAN">MEXICAN</option>
<option value="MICRONESIAN">MICRONESIAN</option>
<option value="MOLDOVAN">MOLDOVAN</option>
<option value="MONACAN">MONACAN</option>
<option value="MONGOLIAN">MONGOLIAN</option>
<option value="MOROCCAN">MOROCCAN</option>
<option value="MOSOTHO">MOSOTHO</option>
<option value="MOTSWANA">MOTSWANA</option>
<option value="MOZAMBICAN">MOZAMBICAN</option>
<option value="NAMIBIAN">NAMIBIAN</option>
<option value="NAURUAN">NAURUAN</option>
<option value="NEPALESE">NEPALESE</option>
<option value="NEW ZEALANDER">NEW ZEALANDER</option>
<option value="NI-VANUATU">NI-VANUATU</option>
<option value="NICARAGUAN">NICARAGUAN</option>
<option value="NIGERIEN">NIGERIEN</option>
<option value="NORTH KOREAN">NORTH KOREAN</option>
<option value="NORTHERN IRISH">NORTHERN IRISH</option>
<option value="NORWEGIAN">NORWEGIAN</option>
<option value="OMANI">OMANI</option>
<option value="PAKISTANI">PAKISTANI</option>
<option value="PALAUAN">PALAUAN</option>
<option value="PANAMANIAN">PANAMANIAN</option>
<option value="PAPUA NEW GUINEAN">PAPUA NEW GUINEAN</option>
<option value="PARAGUAYAN">PARAGUAYAN</option>
<option value="PERUVIAN">PERUVIAN</option>
<option value="POLISH">POLISH</option>
<option value="PORTUGUESE">PORTUGUESE</option>
<option value="QATARI">QATARI</option>
<option value="ROMANIAN">ROMANIAN</option>
<option value="RUSSIAN">RUSSIAN</option>
<option value="RWANDAN">RWANDAN</option>
<option value="SAINT LUCIAN">SAINT LUCIAN</option>
<option value="SALVADORAN">SALVADORAN</option>
<option value="SAMOAN">SAMOAN</option>
<option value="SAN MARINESE">SAN MARINESE</option>
<option value="SAO TOMEAN">SAO TOMEAN</option>
<option value="SAUDI">SAUDI</option>
<option value="SCOTTISH">SCOTTISH</option>
<option value="SENEGALESE">SENEGALESE</option>
<option value="SERBIAN">SERBIAN</option>
<option value="SEYCHELLOIS">SEYCHELLOIS</option>
<option value="SIERRA LEONEAN">SIERRA LEONEAN</option>
<option value="SINGAPOREAN">SINGAPOREAN</option>
<option value="SLOVAKIAN">SLOVAKIAN</option>
<option value="SLOVENIAN">SLOVENIAN</option>
<option value="SOLOMON ISLANDER">SOLOMON ISLANDER</option>
<option value="SOMALI">SOMALI</option>
<option value="SOUTH AFRICAN">SOUTH AFRICAN</option>
<option value="SOUTH KOREAN">SOUTH KOREAN</option>
<option value="SPANISH">SPANISH</option>
<option value="SRI LANKAN">SRI LANKAN</option>
<option value="SUDANESE">SUDANESE</option>
<option value="SURINAMER">SURINAMER</option>
<option value="SWAZI">SWAZI</option>
<option value="SWEDISH">SWEDISH</option>
<option value="SWISS">SWISS</option>
<option value="SYRIAN">SYRIAN</option>
<option value="TAIWANESE">TAIWANESE</option>
<option value="TAJIK">TAJIK</option>
<option value="TANZANIAN">TANZANIAN</option>
<option value="THAI">THAI</option>
<option value="TOGOLESE">TOGOLESE</option>
<option value="TONGAN">TONGAN</option>
<option value="TRINIDADIAN OR TOBAGONIAN">TRINIDADIAN OR TOBAGONIAN</option>
<option value="TUNISIAN">TUNISIAN</option>
<option value="TURKISH">TURKISH</option>
<option value="TUVALUAN">TUVALUAN</option>
<option value="UGANDAN">UGANDAN</option>
<option value="UKRAINIAN">UKRAINIAN</option>
<option value="URUGUAYAN">URUGUAYAN</option>
<option value="UZBEKISTANI">UZBEKISTANI</option>
<option value="VENEZUELAN">VENEZUELAN</option>
<option value="VIETNAMESE">VIETNAMESE</option>
<option value="WELSH">WELSH</option>
<option value="YEMENI">YEMENI</option>
<option value="ZAMBIAN">ZAMBIAN</option>
<option value="ZIMBABWEAN">ZIMBABWEAN</option>
</select>
                           
                            </div> 
                            
                            <div class="input-field">
                    <label>Date of Birth</label>
                    <input type="date" required name="studentDateOfBirth">
                </div>

                            <div class="input-field">
                            <label>IC No (for Malaysian Students Only)</label>
                            <input type="text" name="IC">
                            </div>

                            <div class="input-field">
                          <label>Passport No. (for International Students Only)</label>
                            <input type="text" name="PassportNo">
                            </div>


                        
                        <br>
                        <div class="details ID">
                        <span class="title">ADDRESS</span>
                        <hr></hr>
                        <div class="fields">
    <div class="input-field">
        <label>Correspondence Address</label>
        <input type="text" required name="Address">
    </div>

    <div class="input-field">
        <label>House No</label>
        <input type="text" name="HouseNo">
    </div>

    <div class="input-field">
        <label>City</label>
        <input type="text" required name="City">
    </div>
    <div class="input-field">
                        <label>postcode</label>
                        <input type="text"name="postcode">
                    </div>

                <div class="input-field">
                    <label>State</label>
                    <input type="text"name="State">
                </div>
    <!-- Removed unnecessary <div> here -->
    <div class="input-field">
        <label>Country</label>
        <select name="studentCountry">
            <option value="">-- select one --</option>
            <option value="AFGHANISTAN">AFGHANISTAN</option>
<option value="ALBANIA">ALBANIA</option>
<option value="ALGERIA">ALGERIA</option>
<option value="AMERICAN SAMOA">AMERICAN SAMOA</option>
<option value="ANDORRA">ANDORRA</option>
<option value="ANGOLA">ANGOLA</option>
<option value="ANGUILLA">ANGUILLA</option>
<option value="ANTARCTICA">ANTARCTICA</option>
<option value="ANTIGUA AND BARBUDA">ANTIGUA AND BARBUDA</option>
<option value="ARGENTINA">ARGENTINA</option>
<option value="ARMENIA">ARMENIA</option>
<option value="ARUBA">ARUBA</option>
<option value="AUSTRALIA">AUSTRALIA</option>
<option value="AUSTRIA">AUSTRIA</option>
<option value="AZERBAIJAN">AZERBAIJAN</option>
<option value="BAHAMAS">BAHAMAS</option>
<option value="BAHRAIN">BAHRAIN</option>
<option value="BANGLADESH">BANGLADESH</option>
<option value="BARBADOS">BARBADOS</option>
<option value="BELARUS">BELARUS</option>
<option value="BELGIUM">BELGIUM</option>
<option value="BELIZE">BELIZE</option>
<option value="BENIN">BENIN</option>
<option value="BERMUDA">BERMUDA</option>
<option value="BHUTAN">BHUTAN</option>
<option value="BOLIVIA">BOLIVIA</option>
<option value="BOSNIA AND HERZEGOVINA">BOSNIA AND HERZEGOVINA</option>
<option value="BOTSWANA">BOTSWANA</option>
<option value="BOUVET ISLAND">BOUVET ISLAND</option>
<option value="BRAZIL">BRAZIL</option>
<option value="BRITISH INDIAN OCEAN TERRITORY">BRITISH INDIAN OCEAN TERRITORY</option>
<option value="BRUNEI DARUSSALAM">BRUNEI DARUSSALAM</option>
<option value="BULGARIA">BULGARIA</option>
<option value="BURKINA FASO">BURKINA FASO</option>
<option value="BURUNDI">BURUNDI</option>
<option value="CAMBODIA">CAMBODIA</option>
<option value="CAMEROON">CAMEROON</option>
<option value="CANADA">CANADA</option>
<option value="CAPE VERDE">CAPE VERDE</option>
<option value="CAYMAN ISLANDS">CAYMAN ISLANDS</option>
<option value="CENTRAL AFRICAN REPUBLIC">CENTRAL AFRICAN REPUBLIC</option>
<option value="CHAD">CHAD</option>
<option value="CHILE">CHILE</option>
<option value="CHINA">CHINA</option>
<option value="CHRISTMAS ISLAND">CHRISTMAS ISLAND</option>
<option value="COCOS (KEELING) ISLANDS">COCOS (KEELING) ISLANDS</option>
<option value="COLOMBIA">COLOMBIA</option>
<option value="COMOROS">COMOROS</option>
<option value="CONGO">CONGO</option>
<option value="COSTA RICA">COSTA RICA</option>
<option value="CROATIA">CROATIA</option>
<option value="CUBA">CUBA</option>
<option value="CYPRUS">CYPRUS</option>
<option value="CZECH REPUBLIC">CZECH REPUBLIC</option>
<option value="DENMARK">DENMARK</option>
<option value="DJIBOUTI">DJIBOUTI</option>
<option value="DOMINICAN REPUBLIC">DOMINICAN REPUBLIC</option>
<option value="NETHERLANDS">NETHERLANDS</option>
<option value="EAST TIMOR">EAST TIMOR</option>
<option value="ECUADOR">ECUADOR</option>
<option value="EGYPT">EGYPT</option>
<option value="UNITED ARAB EMIRATES">UNITED ARAB EMIRATES</option>
<option value="EQUATORIAL GUINEA">EQUATORIAL GUINEA</option>
<option value="ERITREA">ERITREA</option>
<option value="ESTONIA">ESTONIA</option>
<option value="ETHIOPIA">ETHIOPIA</option>
<option value="FIJI">FIJI</option>
<option value="PHILIPPINES">PHILIPPINES</option>
<option value="FINLAND">FINLAND</option>
<option value="FRANCE">FRANCE</option>
<option value="GABON">GABON</option>
<option value="GAMBIA">GAMBIA</option>
<option value="GEORGIA">GEORGIA</option>
<option value="GERMANY">GERMANY</option>
<option value="GHANA">GHANA</option>
<option value="GREECE">GREECE</option>
<option value="GRENADA">GRENADA</option>
<option value="GUATEMALA">GUATEMALA</option>
<option value="GUINEA-BISSAU">GUINEA-BISSAU</option>
<option value="GUINEA">GUINEA</option>
<option value="GUYANA">GUYANA</option>
<option value="HAITI">HAITI</option>
<option value="BOSNIA AND HERZEGOVINA">BOSNIA AND HERZEGOVINA</option>
<option value="HONDURAS">HONDURAS</option>
<option value="HUNGARY">HUNGARY</option>
<option value="ICELAND">ICELAND</option>
<option value="INDIA">INDIA</option>
<option value="INDONESIA">INDONESIA</option>
<option value="IRAN">IRAN</option>
<option value="IRAQ">IRAQ</option>
<option value="IRELAND">IRELAND</option>
<option value="ISRAEL">ISRAEL</option>
<option value="ITALY">ITALY</option>
<option value="IVORY COAST">IVORY COAST</option>
<option value="JAMAICA">JAMAICA</option>
<option value="JAPAN">JAPAN</option>
<option value="JORDAN">JORDAN</option>
<option value="KAZAKHSTAN">KAZAKHSTAN</option>
<option value="KENYA">KENYA</option>
<option value="SAINT KITTS AND NEVIS">SAINT KITTS AND NEVIS</option>
<option value="KUWAIT">KUWAIT</option>
<option value="KYRGYZSTAN">KYRGYZSTAN</option>
<option value="LAOS">LAOS</option>
<option value="LATVIA">LATVIA</option>
<option value="LEBANON">LEBANON</option>
<option value="LIBERIA">LIBERIA</option>
<option value="LIBYA">LIBYA</option>
<option value="LIECHTENSTEIN">LIECHTENSTEIN</option>
<option value="LITHUANIA">LITHUANIA</option>
<option value="LUXEMBOURG">LUXEMBOURG</option>
<option value="NORTH MACEDONIA">NORTH MACEDONIA</option>
<option value="MADAGASCAR">MADAGASCAR</option>
<option value="MALAWI">MALAWI</option>
<option value="MALAYSIA">MALAYSIA</option>
<option value="MALDIVES">MALDIVES</option>
<option value="MALI">MALI</option>
<option value="MALTA">MALTA</option>
<option value="MARSHALL ISLANDS">MARSHALL ISLANDS</option>
<option value="MAURITANIA">MAURITANIA</option>
<option value="MAURITIUS">MAURITIUS</option>
<option value="MEXICO">MEXICO</option>
<option value="MICRONESIA">MICRONESIA</option>
<option value="MOLDOVA">MOLDOVA</option>
<option value="MONACO">MONACO</option>
<option value="MONGOLIA">MONGOLIA</option>
<option value="MOROCCO">MOROCCO</option>
<option value="LESOTHO">LESOTHO</option>
<option value="BOTSWANA">BOTSWANA</option>
<option value="MOZAMBIQUE">MOZAMBIQUE</option>
<option value="NAMIBIA">NAMIBIA</option>
<option value="NAURU">NAURU</option>
<option value="NEPAL">NEPAL</option>
<option value="NEW ZEALAND">NEW ZEALAND</option>
<option value="VANUATU">VANUATU</option>
<option value="NICARAGUA">NICARAGUA</option>
<option value="NIGER">NIGER</option>
<option value="SOUTH KOREA">SOUTH KOREA</option>
<option value="NORTHERN IRELAND">NORTHERN IRELAND</option>
<option value="NORWAY">NORWAY</option>
<option value="OMAN">OMAN</option>
<option value="PAKISTAN">PAKISTAN</option>
<option value="PALAU">PALAU</option>
<option value="PANAMA">PANAMA</option>
<option value="PAPUA NEW GUINEA">PAPUA NEW GUINEA</option>
<option value="PARAGUAY">PARAGUAY</option>
<option value="PERU">PERU</option>
<option value="POLAND">POLAND</option>
<option value="PORTUGAL">PORTUGAL</option>
<option value="QATAR">QATAR</option>
<option value="ROMANIA">ROMANIA</option>
<option value="RUSSIA">RUSSIA</option>
<option value="RWANDA">RWANDA</option>
<option value="SAINT LUCIA">SAINT LUCIA</option>
<option value="EL SALVADOR">EL SALVADOR</option>
<option value="SAMOA">SAMOA</option>
<option value="SAN MARINO">SAN MARINO</option>
<option value="SAO TOME AND PRINCIPE">SAO TOME AND PRINCIPE</option>
<option value="SAUDI ARABIA">SAUDI ARABIA</option>
<option value="SCOTTISH">SCOTLAND</option>
<option value="SENEGALESE">SENEGAL</option>
<option value="SERBIAN">SERBIA</option>
<option value="SEYCHELLOIS">SEYCHELLES</option>
<option value="SIERRA LEONEAN">SIERRA LEONE</option>
<option value="SINGAPOREAN">SINGAPORE</option>
<option value="SLOVAKIAN">SLOVAKIA</option>
<option value="SLOVENIAN">SLOVENIA</option>
<option value="SOLOMON ISLANDER">SOLOMON ISLANDS</option>
<option value="SOMALI">SOMALIA</option>
<option value="SOUTH AFRICAN">SOUTH AFRICA</option>
<option value="SOUTH KOREAN">SOUTH KOREA</option>
<option value="SPANISH">SPAIN</option>
<option value="SRI LANKAN">SRI LANKA</option>
<option value="SUDANESE">SUDAN</option>
<option value="SURINAMER">SURINAME</option>
<option value="SWAZI">ESWATINI</option>
<option value="SWEDISH">SWEDEN</option>
<option value="SWISS">SWITZERLAND</option>
<option value="SYRIAN">SYRIA</option>
<option value="TAIWANESE">TAIWAN</option>
<option value="TAJIK">TAJIKISTAN</option>
<option value="TANZANIAN">TANZANIA</option>
<option value="THAI">THAILAND</option>
<option value="TOGOLESE">TOGO</option>
<option value="TONGAN">TONGA</option>
<option value="TRINIDADIAN OR TOBAGONIAN">TRINIDAD AND TOBAGO</option>
<option value="TUNISIAN">TUNISIA</option>
<option value="TURKISH">TURKEY</option>
<option value="TUVALUAN">TUVALU</option>
<option value="UGANDAN">UGANDA</option>
<option value="UKRAINIAN">UKRAINE</option>
<option value="URUGUAYAN">URUGUAY</option>
<option value="UZBEKISTANI">UZBEKISTAN</option>
<option value="VENEZUELAN">VENEZUELA</option>
<option value="VIETNAMESE">VIETNAM</option>
<option value="WELSH">WALES</option>
<option value="YEMENITE">YEMEN</option>
<option value="ZAMBIAN">ZAMBIA</option>
<option value="ZIMBABWEAN">ZIMBABWE</option>
</select>
                        <!-- </div> -->
                        
                        </div>
                        <!-- <div class="fields"> -->
                        <div class="input-field">
                            <label>Telephone No/ WhatsApp No</label>
                            <input type="tel"required name="TelephoneNo">
                        </div>
                       
                        <div class="input-field">
                        <label>Student Email address</label>
                        <input type="email"name="Email">
                        </div>
                    
                        <div class="input-field">
                        <label>Partent's Email address</label>
                        <input type="email"name="PEmail" >
                        
                        </div>
                </div>
</div>
<br>
                <div class="details ID">
                    <span class="title">PROGRAMME ENROLMENT</span>
                    <hr></hr>
                    <div class="fields">
                        <div class="input-field">
                            <label>Program name</label>
                            <Select name="pname">
                            <option disabled selected>Select</option>
                            <option>GENERAL ENGLISH COURSE (GEC)</option>
                            <option>INTENSIVE ENGLISH COURSE (IEC)</option>
                            <option>IELTS PREPARATION COURSE (IELTS)</option>
                            <option>ENGLISH FOR KIDS (EFK)</option>
                        </select> 
                        </div>

                        <div class="input-field">
                            <label >Start month:</label>
                            <input type="date" name="Startmonth">
                        </div>

                        <div class="input-field">
                            <label >End month:</label>
                            <input type="date"  name="Endmonth">
                        </div>

                        <div class="input-field">
                            <label>Introducer</label>
                            <input type="text"name="Introducer">
                        </div>

                        <div class="input-field">
                            <label>Student Counselor</label>
                            <input type="text"name="StudentCounselor">
                        </div>
                        

                        <!-- <div class="container">
    <input required name="student_photo" type="file" accept="image/*">
    <div class="img-area" data-img="">
        <i class='bx bxs-cloud-upload icon'></i>
        <h3>Upload Image</h3>
        <p>Please attach passport size photo <span>2MB</span></p>
    </div>


    
</div> -->
<!-- Added code, commented for now -->
<div class="input-field">
    <label>Student Picture (271 px x 186 px)</label>
    <input type="file" name="studentPic" accept="image/*">
</div>

<div class="input-field">
                            <label>Course Status</label>
                            <Select name="Status">
                            <option disabled selected>Select</option>
                            <option>Active</option>
                            <option>Completed</option>
                            </Select>
                        </div>
                        </div>
                        <script src="Ascripts.js"></script>
                        <button class="sumbit" value="apply" name="apply">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            
        </form>
     
    </div>

</div>
<button class="submit" onclick="location.href='Admission.php'"> <i class="fas fa-arrow-left"></i> </button>
</body>
</html>
