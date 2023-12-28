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
    <link rel="stylesheet" href="style22.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Offer Letter form</title> 
</head>
<body>
<div class="overlay">
    <div class="container">
        <header>Finance Statement</header>

        <form action="Fdatacheck.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    

                    <div class="fields">
                    <div class="input-field">
                        <label>REF NO</label>
                        <input type="hidden" name="Ref" value="<?php echo uniqid(); ?>">
                        </div>
                        <div class="input-field">
                            <label>Student Name</label>
                            <input type="text" required name="studentName">
                        </div>
                        <div class="input-field">
                            <label>Student ID</label>
                            <input type="text"required name="studentID">
                        </div>
                        <div class="input-field">
                        <div><label>Nationalty</label></div>
                         <select required name="studentNationality">
  <option value="">-- select one --</option>
  <option value="Afghan">Afghan</option>
<option value="Albanian">Albanian</option>
<option value="Algerian">Algerian</option>
<option value="American">American</option>
<option value="Andorran">Andorran</option>
<option value="Angolan">Angolan</option>
<option value="Antiguans">Antiguans</option>
<option value="Argentinean">Argentinean</option>
<option value="Armenian">Armenian</option>
<option value="Australian">Australian</option>
<option value="Austrian">Austrian</option>
<option value="Azerbaijani">Azerbaijani</option>
<option value="Bahamian">Bahamian</option>
<option value="Bahraini">Bahraini</option>
<option value="Bangladeshi">Bangladeshi</option>
<option value="Barbadian">Barbadian</option>
<option value="Barbudans">Barbudans</option>
<option value="Batswana">Batswana</option>
<option value="Belarusian">Belarusian</option>
<option value="Belgian">Belgian</option>
<option value="Belizean">Belizean</option>
<option value="Beninese">Beninese</option>
<option value="Bhutanese">Bhutanese</option>
<option value="Bolivian">Bolivian</option>
<option value="Bosnian">Bosnian</option>
<option value="Brazilian">Brazilian</option>
<option value="British">British</option>
<option value="Bruneian">Bruneian</option>
<option value="Bulgarian">Bulgarian</option>
<option value="Burkinabe">Burkinabe</option>
<option value="Burmese">Burmese</option>
<option value="Burundian">Burundian</option>
<option value="Cambodian">Cambodian</option>
<option value="Cameroonian">Cameroonian</option>
<option value="Canadian">Canadian</option>
<option value="Cape Verdean">Cape Verdean</option>
<option value="Central African">Central African</option>
<option value="Chadian">Chadian</option>
<option value="Chilean">Chilean</option>
<option value="Chinese">Chinese</option>
<option value="Colombian">Colombian</option>
<option value="Comoran">Comoran</option>
<option value="Congolese">Congolese</option>
<option value="Costa Rican">Costa Rican</option>
<option value="Croatian">Croatian</option>
<option value="Cuban">Cuban</option>
<option value="Cypriot">Cypriot</option>
<option value="Czech">Czech</option>
<option value="Danish">Danish</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominican">Dominican</option>
<option value="Dutch">Dutch</option>
<option value="East Timorese">East Timorese</option>
<option value="Ecuadorean">Ecuadorean</option>
<option value="Egyptian">Egyptian</option>
<option value="Emirian">Emirian</option>
<option value="Equatorial Guinean">Equatorial Guinean</option>
<option value="Eritrean">Eritrean</option>
<option value="Estonian">Estonian</option>
<option value="Ethiopian">Ethiopian</option>
  <option value="Fijian">Fijian</option>
  <option value="Filipino">Filipino</option>
  <option value="Finnish">Finnish</option>
  <option value="French">French</option>
  <option value="Gabonese">Gabonese</option>
  <option value="Gambian">Gambian</option>
  <option value="Georgian">Georgian</option>
  <option value="German">German</option>
  <option value="Ghanaian">Ghanaian</option>
  <option value="Greek">Greek</option>
  <option value="Grenadian">Grenadian</option>
  <option value="Guatemalan">Guatemalan</option>
  <option value="Guinea-Bissauan">Guinea-Bissauan</option>
  <option value="Guinean">Guinean</option>
  <option value="Guyanese">Guyanese</option>
  <option value="Haitian">Haitian</option>
  <option value="Herzegovinian">Herzegovinian</option>
  <option value="Honduran">Honduran</option>
  <option value="Hungarian">Hungarian</option>
  <option value="Icelander">Icelander</option>
  <option value="Indian">Indian</option>
  <option value="Indonesian">Indonesian</option>
  <option value="Iranian">Iranian</option>
  <option value="Iraqi">Iraqi</option>
  <option value="Irish">Irish</option>
  <option value="Israeli">Israeli</option>
  <option value="Italian">Italian</option>
  <option value="Ivorian">Ivorian</option>
  <option value="Jamaican">Jamaican</option>
  <option value="Japanese">Japanese</option>
  <option value="Jordanian">Jordanian</option>
  <option value="Kazakhstani">Kazakhstani</option>
  <option value="Kenyan">Kenyan</option>
  <option value="Kittian and Nevisian">Kittian and Nevisian</option>
  <option value="Kuwaiti">Kuwaiti</option>
  <option value="Kyrgyz">Kyrgyz</option>
  <option value="Laotian">Laotian</option>
  <option value="Latvian">Latvian</option>
  <option value="Lebanese">Lebanese</option>
  <option value="Liberian">Liberian</option>
  <option value="Libyan">Libyan</option>
  <option value="Liechtensteiner">Liechtensteiner</option>
  <option value="Lithuanian">Lithuanian</option>
  <option value="Luxembourger">Luxembourger</option>
  <option value="Macedonian">Macedonian</option>
  <option value="Malagasy">Malagasy</option>
  <option value="Malawian">Malawian</option>
  <option value="Malaysian">Malaysian</option>
  <option value="Maldivan">Maldivan</option>
  <option value="Malian">Malian</option>
  <option value="Maltese">Maltese</option>
  <option value="Marshallese">Marshallese</option>
  <option value="Mauritanian">Mauritanian</option>
  <option value="Mauritian">Mauritian</option>
  <option value="Mexican">Mexican</option>
  <option value="Micronesian">Micronesian</option>
  <option value="Moldovan">Moldovan</option>
  <option value="Monacan">Monacan</option>
  <option value="Mongolian">Mongolian</option>
  <option value="Moroccan">Moroccan</option>
  <option value="Mosotho">Mosotho</option>
  <option value="Motswana">Motswana</option>
  <option value="Mozambican">Mozambican</option>
  <option value="Namibian">Namibian</option>
  <option value="Nauruan">Nauruan</option>
  <option value="Nepalese">Nepalese</option>
  <option value="New Zealander">New Zealander</option>
  <option value="Ni-Vanuatu">Ni-Vanuatu</option>
  <option value="Nicaraguan">Nicaraguan</option>
  <option value="Nigerien">Nigerien</option>
  <option value="North Korean">North Korean</option>
  <option value="Northern Irish">Northern Irish</option>
  <option value="Norwegian">Norwegian</option>
  <option value="Omani">Omani</option>
  <option value="Pakistani">Pakistani</option>
  <option value="Palauan">Palauan</option>
<option value="Panamanian">Panamanian</option>
<option value="Papua New Guinean">Papua New Guinean</option>
<option value="Paraguayan">Paraguayan</option>
<option value="Peruvian">Peruvian</option>
<option value="Polish">Polish</option>
<option value="Portuguese">Portuguese</option>
<option value="Qatari">Qatari</option>
<option value="Romanian">Romanian</option>
<option value="Russian">Russian</option>
<option value="Rwandan">Rwandan</option>
<option value="Saint Lucian">Saint Lucian</option>
<option value="Salvadoran">Salvadoran</option>
<option value="Samoan">Samoan</option>
<option value="San Marinese">San Marinese</option>
<option value="Sao Tomean">Sao Tomean</option>
<option value="Saudi">Saudi</option>
<option value="Scottish">Scottish</option>
<option value="Senegalese">Senegalese</option>
<option value="Serbian">Serbian</option>
<option value="Seychellois">Seychellois</option>
<option value="Sierra Leonean">Sierra Leonean</option>
<option value="Singaporean">Singaporean</option>
<option value="Slovakian">Slovakian</option>
<option value="Slovenian">Slovenian</option>
<option value="Solomon Islander">Solomon Islander</option>
<option value="Somali">Somali</option>
<option value="South African">South African</option>
<option value="South Korean">South Korean</option>
<option value="Spanish">Spanish</option>
<option value="Sri Lankan">Sri Lankan</option>
<option value="Sudanese">Sudanese</option>
<option value="Surinamer">Surinamer</option>
<option value="Swazi">Swazi</option>
<option value="Swedish">Swedish</option>
<option value="Swiss">Swiss</option>
<option value="Syrian">Syrian</option>
<option value="Taiwanese">Taiwanese</option>
<option value="Tajik">Tajik</option>
<option value="Tanzanian">Tanzanian</option>
<option value="Thai">Thai</option>
<option value="Togolese">Togolese</option>
<option value="Tongan">Tongan</option>
<option value="Trinidadian or Tobagonian">Trinidadian or Tobagonian</option>
<option value="Tunisian">Tunisian</option>
<option value="Turkish">Turkish</option>
<option value="Tuvaluan">Tuvaluan</option>
<option value="Ugandan">Ugandan</option>
<option value="Ukrainian">Ukrainian</option>
<option value="Uruguayan">Uruguayan</option>
<option value="Uzbekistani">Uzbekistani</option>
<option value="Venezuelan">Venezuelan</option>
<option value="Vietnamese">Vietnamese</option>
<option value="Welsh">Welsh</option>
<option value="Yemenite">Yemenite</option>
<option value="Zambian">Zambian</option>
<option value="Zimbabwean">Zimbabwean</option>
</select>
</div>

                        <div class="input-field">
                            <label>Intake</label>
                            <input type="text"required name= "intake" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11">
                        </div>
                        
                        <div class="input-field">
                            <label>Level</label>
                            <input type="text"required name= "Level">
                        </div>

                        <div class="input-field">
                            <label>Total Fees</label>
                            <input type="number"required name= "TotalFees" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11" 
                   size="50%">
                        </div>

                        <div class="input-field">
                            <label>Paid Fees</label>
                            <input type="number"name= "PaidFees" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11" 
                   size="50%">
                        </div>

                        <div class="input-field">
                            <label>Outstanding Fees</label>
                            <input type="number"name= "OutFees" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11" 
                   size="50%">
                        </div>
                        <div class="input-field">
                           <div><label>Types Of Fees</label></div>
                            <Select required name= "FeesType">
                            <option disabled selected>Select</option>
                            <option>Registration Fees</option>
                            <option>Visa Application Fees</option>
                            <option>Tuition fee</option>
                            <option>Special Pass</option>
                            <option>Shorten Pass Fees</option>
                            <option>Airport Clearnce Fees</option>
                            <option>Micsellaneous Fees</option>
                        </select>   
                        </div>
                        <div class="input-field">
                           <div><label>Payment Method</label></div>
                            <Select required name= "PaymentM">
                            <option disabled selected>Select</option>
                            <option>Cash</option>
                            <option>Credit/Debit Card</option>
                            <option>Paypal</option>
                            <option>TT</option>
                            <option>Local Bank Transfer</option>
                            <option>Westren Union</option>
                            <option>Cash Deposit</option>
                        </select>   
                        </div>
                        <div class="input-field">
                            <label>Date</label>
                            <input type="date"name= "Date" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11" 
                   size="50%">
                        </div>
                    </div>
                
                        
                        <button class="sumbit" value="fapply" name="fapply">
                            <span class="btnText">Issue Financial</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>