<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practitioner 2</title>
    <style>
        .error{
            color:red;
        }
        .col-25{
            float: left;
            width: 25%;
            margin-top: 6px;
        }
        .col-75{
            float: left;
            width: 75%;
            margin-top: 6px;
        }
    </style>
</head>
<body>
<?php require_once 'regfunctions.php'; ?>

<form method="POST" action="index.php" enctype="multipart/form-data">
    <div id="mainContainer">
        <h1>Practitioner Registration Form</h1>
        <span class="error"> * is a required field.</span>
        
        <div id="divAccount">
            <fieldset>
                <legend><strong>Account Details</strong></legend>
                    <div class="col-25">
                        <label>Prefix</label>
                    </div>
                    <div class="col-75">
                        <select name="account[prefix]">
                        <?php $prefixArray = ["Mr", "Miss", "Mrs", "Ms", "Dr"];?>
                        <?php foreach($prefixArray as $prefix): ?>
                            <?php $selectedPrefix = in_array(getValue('account', 'prefix'),[$prefix]) ? "selected":""; ?>
                            <option value="<?= $prefix?>" <?= $selectedPrefix ?> ><?= $prefix?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>    
                    
                    <div class="col-25">
                        <label>FirstName</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="txtFirstName" name="account[txtFirstName]" value="<?php echo getValue('account', 'txtFirstName'); ?>">
                    </div>

                    <div>
                        <div class="col-25">
                            <label>LastName</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="txtLastName" name="account[txtLastName]" value="<?php echo getValue('account', 'txtLastName') ?>">
                        </div>    
                    </div>

                    <div>
                        <div class="col-25">
                            <label>Date of Birth</label>
                        </div>
                        <div class="col-75">
                            <input type="date" name="account[dateDOB]" value="<?php echo getValue('account', 'dateDOB') ?>">
                        </div>    
                    </div> 
                    
                    <div>
                        <div class="col-25">
                            <label>Phone Number</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="account[txtPhoneNumber]" value="<?php echo getValue('account', 'txtPhoneNumber') ?>">
                        </div>    
                    </div>

                    <div>
                        <div class="col-25">
                            <label>Email</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="account[txtEmail]" value="<?php echo getValue('account', 'txtEmail') ?>">
                        </div>    
                    </div>

                    <div>
                        <div class="col-25">
                            <label>Password</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="account[txtPassword]" value="<?php echo getValue('account', 'txtPassword') ?>">
                        </div>    
                    </div>

                    <div>
                        <div class="col-25">
                            <label>Confirm Password</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="account[txtConfirmPassword]" value="<?php echo getValue('account', 'txtConfirmPassword') ?>">
                        </div>    
                    </div>
            </fieldset>    
        </div>



        <div id="divAddress">
            <fieldset>
                <legend><strong>Address Information</strong></legend>
                    <div class="col-25">
                        <label>Address Line 1</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="address[txtAddressLine1]" value="<?php echo getValue('address', 'txtAddressLine1') ?>">
                    </div>    
                    
                    <div class="col-25">
                        <label>Address Line 2</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="address[txtAddressLine2]" value="<?php echo getValue('address', 'txtAddressLine2') ?>">
                    </div>

                    <div>
                        <div class="col-25">
                            <label>Company</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="address[txtCompany]" value="<?php echo getValue('address', 'txtCompany') ?>">
                        </div>    
                    </div>

                    <div>
                        <div class="col-25">
                            <label>City</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="address[txtCity]" value="<?php echo getValue('address', 'txtCity') ?>">
                        </div>    
                    </div> 
                    
                    <div>
                        <div class="col-25">
                            <label>State</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="address[txtState]" value="<?php echo getValue('address', 'txtState') ?>">
                        </div>    
                    </div>

                    <div>
                        <div class="col-25">
                            <label>Country</label>
                        </div>
                        <div class="col-75">
                            <select name="address[selectCountry]">
                            <?php $countryArray = ["India", "UK", "USA", "Brazil", "Japan"];?>
                            <?php foreach($countryArray as $country): ?>
                                <?php $selectedCountry = in_array(getValue('address', 'selectCountry'),[$country]) ? "selected":""; ?>
                                <option value="<?= $country?>" <?= $selectedCountry ?> ><?= $country?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>    
                    </div>

                    <div>
                        <div class="col-25">
                            <label>Postal Code</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="address[txtPostalCode]" value="<?php echo getValue('address', 'txtPostalCode') ?>">
                        </div>    
                    </div>
            </fieldset>    
        </div>
        
        <input type="checkbox" id="checkboxShowOtherInfo" onclick="toggleOtherInfo()"> Show Other Information<br>

        <div id="divOtherInfo" style="display:none">
            <fieldset>
                <legend><strong>Other Information</strong></legend>
                    <div class="col-25">
                        <label>Describe Yourself</label>
                    </div>
                    <div class="col-75">
                        <textarea name="otherInfo[txtareaDescribeYourself]" rows="5" cols="30"><?php echo getValue('otherInfo', 'txtareaDescribeYourself') ?></textarea>
                    </div>    
                    
                    <div class="col-25">
                        <label>Profile Image</label>
                    </div>
                    <div class="col-75">
                        <input type="file" name="otherInfo[fileProfileImage]">
                    </div>

                    <div>
                        <div class="col-25">
                            <label>Certificate Upload</label>
                        </div>
                        <div class="col-75">
                            <input type="file" name="otherInfo[fileCertificatePDF]">
                        </div>    
                    </div>

                    <div>
                        <div class="col-25">
                            <label>How long have you been in business?</label>
                        </div>
                        <div class="col-75">
                            <?php $businessExperiences = ["Under 1 Year", "1-2 Years", "2-5 Years", "5-10 Years", "Over 10 Years"];?>
                            <?php foreach($businessExperiences as $experience): ?>
                                <?php $selectedExperience = in_array(getValue('otherInfo', 'radioBusiness'),[$experience]) ? "checked":""; ?>
                                <input type="radio" name="otherInfo[radioBusiness]" value="<?= $experience?>" <?= $selectedExperience ?> ><?= $experience?>
                            <?php endforeach; ?>
                        </div>    
                    </div> 
                    
                    <div>
                        <div class="col-25">
                            <label>Number of unique clients you see each week?</label>
                        </div>
                        <div class="col-75">
                            <select name="otherInfo[selectNoOfClients]">
                            <?php $noOfClientArray = ["1-5", "6-10", "11-15", "15+"];?>
                            <?php foreach($noOfClientArray as $clients): ?>
                                <?php $selectedNoOfClients= in_array(getValue('otherInfo', 'selectNoOfClients'),[$clients]) ? "selected":""; ?>
                                <option value="<?= $clients?>" <?= $selectedNoOfClients ?> ><?= $clients?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>    
                    </div>

                    <div>
                        <div class="col-25">
                            <label>How do you like us to get in touch with you?</label>
                        </div>
                        <div class="col-75">
                            <?php $touchUsArray = ["Post", "Email", "SMS", "Phone"];?>
                            <?php foreach($touchUsArray as $touchMethod): ?>
                                <?php $selectedTouch = array_intersect(getValue('otherInfo', 'checkboxTouch', []),[$touchMethod]) ? "checked":""; ?>
                                <input type="checkbox" name="otherInfo[checkboxTouch][]" value="<?= $touchMethod?>" <?= $selectedTouch ?> ><?= $touchMethod?>
                                <?php endforeach; ?>
                        </div>    
                    </div>

                    <div>
                        <div class="col-25">
                            <label>Hobbies</label>
                        </div>
                        <div class="col-75">
                            <select multiple name="otherInfo[selectHobby][]">
                            <?php $hobbiesArray = ["Listening to Music", "Travelling", "Blogging", "Sports", "Art"];?>
                            <?php foreach($hobbiesArray as $hobby): ?>
                                <?php $selectedHobby = @array_intersect(getValue('otherInfo', 'selectHobby'),[$hobby]) ? "selected":""; ?>
                                <option value="<?= $hobby?>" <?= $selectedHobby ?> ><?= $hobby?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>    
                    </div>
            </fieldset>    
        </div>
    </div>
    <input type="submit" value="Register Now" name="btnSubmit">
</form>



<script src="practitioner.js"></script>
</body>
</html>