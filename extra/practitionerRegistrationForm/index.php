<?php
    
    $firstNameError = "";
    $lastNameError = "";
    $emailError = "";
    $phoneNumberError = "";
    $passwordError = "";
    $addressLine1Error = "";
    $addressLine2Error = "";
    $countryError = "";
    $postalCodeError = "";
    $describeYourselfError = "";
    $howToTouchError = "";
    $imageError = "";
    $certificateError = "";
    $displayTable = false;

    if(isset($_POST['btnSubmit'])){
        $firstName = $_POST['txtFirstName'];
        $lastName = $_POST['txtLastName'];
        $email = $_POST['txtEmail'];
        $phoneNumber = $_POST['txtPhoneNumber'];
        $password = $_POST['txtPassword'];
        $confirmPassword = $_POST['txtConfirmPassword'];
        $addressLine1 = $_POST['txtAddressLine1'];
        $addressLine2 = $_POST['txtAddressLine2'];
        $postalCode = $_POST['txtPostalCode'];
        $describeYourself = $_POST['txtareaDescribeYourself'];

        $certificateName = $_FILES['fileCertificatePDF']['name'];
        $certificateType = $_FILES['fileCertificatePDF']['type'];

        $profileImageName = $_FILES['fileProfileImage']['name'];
        $profileImageType = $_FILES['fileProfileImage']['type'];
        
        $certificateExtension = strtolower(substr($certificateName, strpos($certificateName, '.') + 1));
        $profilePicExtension = strtolower(substr($profileImageName, strpos($profileImageName, '.') + 1));

        if(!empty($firstName) || !empty($lastName) || !empty($email) ||
            !empty($phoneNumber) || !empty($password) || !empty($addressLine1) ||
            !empty($addressLine2) || !empty($country) || !empty($postalCode) ||
            !empty($describeYourself) || !empty($howToTouch)){

            if(!preg_match('/^[a-zA-Z\s]+$/', $firstName)){
                $firstNameError = "Please Enter Valid FirstName";
            }
            if(!preg_match('/^[a-zA-Z\s]+$/', $lastName)){
                $lastNameError = "Please Enter Valid LastName";
            }
            if(!preg_match("/[a-zA-Z0-9._-]+\@[a-zA-Z]+\.[a-zA-Z.]{2,5}/", $email)) {
                $emailError = "Please Enter Valid Email"; 
            }
            if(!preg_match("/^[6-9][0-9]{9}$/", $phoneNumber)){
                $phoneNumberError = "Please Enter a Valid 10-digit Number";
            }
            if($password != $confirmPassword){
                $passwordError = "Please make sure your password and confirm password both match";
            }
            if($addressLine1 == ""){
                $addressLine1Error = "Please enter Address Line 1";
            }
            if($addressLine2 == ""){
                $addressLine2Error = "Please enter Address Line 2";
            }
            if(@$_POST['selectCountry'] == ""){
                $countryError = "Please enter a select a Country";
            }
            if($postalCode == ""){
                $postalCodeError = "Please enter a Valid Postal Code";
            }
            if($describeYourself == ""){
                $describeYourselfError = "Please enter Describe Yourself";
            }
            if(@$_POST['checkboxTouch'] == ""){
                $howToTouchError = "Please select how would you like to get in touch with us";
            }
    
            if(!empty($certificateName) && ($certificateExtension == "pdf")){
                $location = "uploaded/";
                if(move_uploaded_file($_FILES['fileCertificatePDF']['tmp_name'], $location.$certificateName)){
                }
            }
            else{
                $certificateError = "Please Choose an PDF file only";
            }

            if(!empty($profileImageName) && ($profilePicExtension == "jpg") || ($profilePicExtension == "jpeg") || ($profilePicExtension == "png")){
                $location = "uploaded/";
                if(move_uploaded_file($_FILES['fileProfileImage']['tmp_name'], $location.$profileImageName)){
                }
            }
            else{
                $imageError = "Please Choose an Image file(JPG/JPEG/PNG) only";
            }

            if($firstNameError == "" && $lastNameError == "" && $emailError == "" && $phoneNumberError == "" 
            && $passwordError == "" && $addressLine1Error == "" && $addressLine2Error =="" && $countryError == ""
            && $postalCodeError == "" && $describeYourselfError == "" && $howToTouchError == "" && $imageError == "" && $certificateError == ""){
                $displayTable = true;
            }

        }
        else{
            echo "Red * is mandatory";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practitioner Registration Form</title>
    <style>
        .error{
            color:red;
        }
        th, .td1{
            border:1px solid black;
        }
    </style>
</head>
<body>
    <form method="POST" action="index.php" enctype="multipart/form-data">
    <div id="mainContainer">
        <h1>Practitioner Registration Form</h1>
        <span class='error'> * is a required field.<br></span>
        <fieldset>
            <legend><strong>Account Details</strong></legend>
            <table>
                <tr>
                    <td>Prefix</td>
                    <td>
                        <select name="selectPrefix">
                            <option disabled>Select Prefix</option>
                            <option value="Mr" <?php if(isset($_POST['btnSubmit'])){if($_POST['selectPrefix'] == "Mr"){echo "selected";}} ?>>Mr</option>
                            <option value="Miss" <?php if(isset($_POST['btnSubmit'])){if($_POST['selectPrefix'] == "Miss"){echo "selected";}} ?>>Miss</option>
                            <option value="Ms" <?php if(isset($_POST['btnSubmit'])){if($_POST['selectPrefix'] == "Ms"){echo "selected";}} ?>>Ms</option>
                            <option value="Mrs" <?php if(isset($_POST['btnSubmit'])){if($_POST['selectPrefix'] == "Mrs"){echo "selected";}} ?>>Mrs</option>
                            <option value="Dr" <?php if(isset($_POST['btnSubmit'])){if($_POST['selectPrefix'] == "Dr"){echo "selected";}} ?>>Dr</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>FirstName</td>
                    <td>
                        <input type="text" id="txtFirstName" name="txtFirstName" value="<?php if(isset($_POST['btnSubmit'])){echo $firstName;}?>">
                        <span class = "error">* <?php if(isset($_POST['btnSubmit'])){echo $firstNameError;}?></span>
                    </td>
                </tr>
                <tr>
                    <td>LastName</td>
                    <td>
                        <input type="text" id="txtLastName" name="txtLastName" value="<?php if(isset($_POST['btnSubmit'])){echo $lastName;}?>">
                        <span class = "error">* <?php if(isset($_POST['btnSubmit'])){echo $lastNameError;}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><input type="date" name="dateDOB" value="<?php if(isset($_POST['btnSubmit'])){echo $_POST['dateDOB'];}?>"></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>
                        <input type="text" name="txtPhoneNumber" value="<?php if(isset($_POST['btnSubmit'])){echo $_POST['txtPhoneNumber'];}?>">
                        <span class = "error">* <?php if(isset($_POST['btnSubmit'])){echo $phoneNumberError;}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="txtEmail" value="<?php if(isset($_POST['btnSubmit'])){echo $_POST['txtEmail'];}?>">
                        <span class = "error">* <?php if(isset($_POST['btnSubmit'])){echo $emailError;}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="txtPassword" value="<?php if(isset($_POST['btnSubmit'])){echo $_POST['txtPassword'];}?>"></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="text" name="txtConfirmPassword" value="<?php if(isset($_POST['btnSubmit'])){echo $_POST['txtConfirmPassword'];}?>">
                        <span class = "error">* <?php if(isset($_POST['btnSubmit'])){echo $passwordError;}?></span>
                    </td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend><strong>Address Information</strong></legend>
            <table>
                <tr>
                    <td>Address Line 1</td>
                    <td>
                        <input type="text" name="txtAddressLine1" value="<?php if(isset($_POST['btnSubmit'])){echo $_POST['txtAddressLine1'];}?>">
                        <span class = "error">* <?php if(isset($_POST['btnSubmit'])){echo $addressLine1Error;}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Address Line 2</td>
                    <td>
                        <input type="text" name="txtAddressLine2" value="<?php if(isset($_POST['btnSubmit'])){echo $_POST['txtAddressLine2'];}?>">
                        <span class = "error">* <?php if(isset($_POST['btnSubmit'])){echo $addressLine2Error;}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Company</td>
                    <td><input type="text" name="txtCompany" value="<?php if(isset($_POST['btnSubmit'])){echo $_POST['txtCompany'];}?>"></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="txtCity" value="<?php if(isset($_POST['btnSubmit'])){echo $_POST['txtCity'];}?>"></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><input type="text" name="txtState" value="<?php if(isset($_POST['btnSubmit'])){echo $_POST['txtState'];}?>"></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>
                        <select name="selectCountry">
                            <option disabled selected>Select Country</option>
                            <option value="India" <?php if(isset($_POST['btnSubmit'])){if($_POST['selectCountry'] == "India"){echo "selected";}} ?>>India</option>
                            <option value="UK" <?php if(isset($_POST['btnSubmit'])){if($_POST['selectCountry'] == "UK"){echo "selected";}} ?>>UK</option>
                            <option value="USA" <?php if(isset($_POST['btnSubmit'])){if($_POST['selectCountry'] == "USA"){echo "selected";}} ?>>USA</option>
                            <option value="Brazil" <?php if(isset($_POST['btnSubmit'])){if($_POST['selectCountry'] == "Brazil"){echo "selected";}} ?>>Brazil</option>
                            <option value="Japan" <?php if(isset($_POST['btnSubmit'])){if($_POST['selectCountry'] == "Japan"){echo "selected";}} ?>>Japan</option>
                        </select>
                        <span class = "error">* <?php if(isset($_POST['btnSubmit'])){echo $countryError;}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Postal Code</td>
                    <td>
                        <input type="text" name="txtPostalCode" value="<?php if(isset($_POST['btnSubmit'])){echo $_POST['txtPostalCode'];}?>">
                        <span class = "error">* <?php if(isset($_POST['btnSubmit'])){echo $postalCodeError;}?></span>
                    </td>
                </tr>
            </table>
        </fieldset>

        <input type="checkbox" name="checkboxShowOtherInfo" id="checkboxShowOtherInfo" onclick="toggleOtherInfo()" value="otherToggle"> Show Other Information<br>
        <div id="otherInfo" style="display:none">
        <fieldset>
            <legend><strong>Other Information</strong></legend>
            <table>
                <tr>
                    <td>Describe Yourself</td>
                    <td>
                        <textarea name="txtareaDescribeYourself" rows="5" cols="30"><?php if(isset($_POST['btnSubmit'])){echo $_POST['txtareaDescribeYourself'];}?></textarea>
                        <span class = "error">* <?php if(isset($_POST['btnSubmit'])){echo $describeYourselfError;}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Profile Image</td>
                    <td>
                        <input type="file" name="fileProfileImage">
                        <span class = "error"><?php if(isset($_POST['btnSubmit'])){echo $imageError;}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Certificate Upload</td>
                    <td>
                        <input type="file" name="fileCertificatePDF">
                        <span class = "error"><?php if(isset($_POST['btnSubmit'])){echo $certificateError;}?></span>
                    </td>
                </tr>
                <tr>
                    <td>How long have you been in business?</td>
                    <td>
                        <input type="radio" name="radioBusiness" value="Under 1 Year" <?php if(isset($_POST['btnSubmit'])){if($_POST['radioBusiness'] == "Under 1 Year"){echo "checked";}} ?>> Under 1 Year<br>
                        <input type="radio" name="radioBusiness" value="1-2 Years" <?php if(isset($_POST['btnSubmit'])){if($_POST['radioBusiness'] == "1-2 Years"){echo "checked";}} ?>> 1-2 Years<br>
                        <input type="radio" name="radioBusiness" value="2-5 Years" <?php if(isset($_POST['btnSubmit'])){if($_POST['radioBusiness'] == "2-5 Years"){echo "checked";}} ?>> 2-5 Years<br>
                        <input type="radio" name="radioBusiness" value="5-10 Years" <?php if(isset($_POST['btnSubmit'])){if($_POST['radioBusiness'] == "5-10 Years"){echo "checked";}} ?>> 5-10 Years<br>
                        <input type="radio" name="radioBusiness" value="Over 10 Years" <?php if(isset($_POST['btnSubmit'])){if($_POST['radioBusiness'] == "Over 10 Years"){echo "checked";}} ?>> Over 10 Years
                    </td>
                </tr>
                <tr>
                    <td>Number of unique clients you see each week?</td>
                    <td>
                        <select name="selectNoOfClients">
                            <option value="1-5" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['selectNoOfClients'] == "1-5"){echo "selected";}} ?>>1-5</option>
                            <option value="6-10" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['selectNoOfClients'] == "6-10"){echo "selected";}} ?>>6-10</option>
                            <option value="11-15" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['selectNoOfClients'] == "11-15"){echo "selected";}} ?>>11-15</option>
                            <option value="15+" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['selectNoOfClients'] == "15+"){echo "selected";}} ?>>15+</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>How do you like us to get in touch with you?</td>
                    <td>
                        <input type="checkbox" name="checkboxTouch[]" value="Post" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['checkboxTouch'] == "Post"){echo "checked";}} ?>> Post
                        <input type="checkbox" name="checkboxTouch[]" value="Email" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['checkboxTouch'] == "Email"){echo "checked";}} ?>> Email
                        <input type="checkbox" name="checkboxTouch[]" value="SMS" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['checkboxTouch'] == "SMS"){echo "checked";}} ?>> SMS
                        <input type="checkbox" name="checkboxTouch[]" value="Phone" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['checkboxTouch'] == "Phone"){echo "checked";}} ?>> Phone
                        <span class = "error">* <?php if(isset($_POST['btnSubmit'])){echo $howToTouchError;}?></span>
                    </td>
                </tr>
                <tr>
                    <td>Hobbies</td>
                    <td>
                        <select name="selectHobbies[]" multiple>
                            <option value="Listening to Music" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['selectHobbies'] == "Listening to Music"){echo "selected";}} ?>>Listening to Music</option>
                            <option value="Travelling" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['selectHobbies'] == "Travelling"){echo "selected";}} ?>>Travelling</option>
                            <option value="Blogging " <?php if(isset($_POST['btnSubmit'])){if(@$_POST['selectHobbies'] == "Blogging"){echo "selected";}} ?>>Blogging </option>
                            <option value="Sports" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['selectHobbies'] == "Sports"){echo "selected";}} ?>>Sports</option>
                            <option value="Art" <?php if(isset($_POST['btnSubmit'])){if(@$_POST['selectHobbies'] == "Art"){echo "selected";}} ?>>Art</option>
                        </select>
                    </td>
                </tr>
            </table>
        </fieldset>
        </div>
        <input type="submit" name="btnSubmit">
    </div>
</form>

<?php
if($displayTable){
?>
<br><br>
<table class='output'>
<tr>
    <th>Field</th>
    <th>Value</th>
<tr>
    <td class="td1"><b>Full Name: </b></td>
    <td class="td1"><?php echo $firstName.' '.$lastName; ?></td>
</tr>
<tr>
    <td class="td1"><b>Date of Birth: </b></td>
    <td class="td1"><?php echo $_POST['dateDOB']; ?></td>
</tr>
<tr>
    <td class="td1"><b>Phone Number:</b> </td>
    <td class="td1"><?php echo $_POST['txtPhoneNumber']; ?></td>
</tr>
<tr>
    <td class="td1"><b>Email: </b></td>
    <td class="td1"><?php echo $_POST['txtEmail']; ?></td>
</tr>
<tr>
    <td class="td1"><b>Address Line 1: </b></td>
    <td class="td1"><?php echo $_POST['txtAddressLine1']; ?></td>
</tr>
<tr>
    <td class="td1"><b>Address Line 2: </b></td>
    <td class="td1"><?php echo $_POST['txtAddressLine2']; ?></td>
</tr>
<tr>
    <td class="td1"><b>Company: </b></td>
    <td class="td1"><?php echo $_POST['txtCompany']; ?></td>
</tr>
<tr>
    <td class="td1"><b>City: </b></td>
    <td class="td1"><?php echo $_POST['txtCity']; ?></td>
</tr>
<tr>
    <td class="td1"><b>State: </b></td>
    <td class="td1"><?php echo $_POST['txtState']; ?></td>
</tr>
<tr>
    <td class="td1"><b>Country:</b> </td>
    <td class="td1"><?php echo $_POST['selectCountry']; ?></td>
</tr>
<tr>
    <td class="td1"><b>Postal Code:</b> </td>
    <td class="td1"><?php echo $_POST['txtPostalCode']; ?></td>
</tr>
<tr>
    <td class="td1"><b>Describe Yourself: </b></td>
    <td class="td1"><?php echo $_POST['txtareaDescribeYourself']; ?></td>
</tr>
<tr>
    <td class="td1"><b>Profile Image: </b></td>
    <td class="td1"><?php echo $profileImageName; ?></td>
</tr>
<tr>
    <td class="td1"><b>Certificate Upload: </b></td>
    <td class="td1"><?php echo $certificateName; ?></td>
</tr>
<tr>
    <td class="td1"><b>How long have you<br> been in business?: </b></td>
    <td class="td1"><?php echo $_POST['radioBusiness']; ?></td>
</tr>
<tr>
    <td class="td1"><b>Number of unique clients you see each week?: </b></td>
    <td class="td1"><?php echo $_POST['selectNoOfClients']; ?></td>
</tr>
<tr>
    <td class="td1"><b>How do you like us to get in touch with you?: </b></td>
    <td class="td1">
        <?php 
            foreach($_POST['checkboxTouch'] as $selected){
                echo $selected."</br>";
            }
        ?>
    </td>
</tr>
<tr>
    <td class="td1"><b>Hobbies: </b></td>
    <td class="td1">
        <?php 
            foreach($_POST['selectHobbies'] as $selected){
                echo $selected."</br>";
            }
        ?>
    </td>
</tr>
</table>
<?php
}

?>

<script src="practitioner.js"></script>
</body>
</html>