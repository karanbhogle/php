function toggleTermsAndConditions(){
    let buttonRegister = document.getElementById('btnRegister');
    let checkboxTermsAndConditions = document.getElementById('checkboxTerms&Conditions');

    if(checkboxTermsAndConditions.checked == true){
        buttonRegister.style.display = "block";
    }
    else{
        buttonRegister.style.display = "none";
    }
}