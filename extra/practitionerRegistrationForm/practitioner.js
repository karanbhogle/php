function toggleOtherInfo(){
    var otherInfoDiv = document.getElementById('otherInfo');
    var otherInfoCheckbox = document.getElementById('checkboxShowOtherInfo');

    if(otherInfoCheckbox.checked == true){
        otherInfoDiv.style.display = "block";
    }
    else{
        otherInfoDiv.style.display = "none";
    }
}
