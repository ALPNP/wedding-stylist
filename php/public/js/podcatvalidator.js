'use sctrict'

function validator(input) {
    
    let button = document.getElementById('podcatbtn');
    
    if ((input.value.length >= 5) && (input.value.length <= 40)) {
        button.disabled = false;
    } else {
        button.disabled = true;
    }
};