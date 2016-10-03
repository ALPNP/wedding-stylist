'use strict'

function Recaptcha() {
    
    this.rec = document.getElementById('recapt');
    
    console.log(this.rec);

};

Recaptcha.prototype.eventCapClick = function(elem) {
    
        console.log('Был кликл');
    
//    console.log(elem);
    
//    console.log(event.target);
    
};

let recapt = new Recaptcha();

console.log(recapt);
//
let rec = document.getElementById('recapt');

//console.log(rec);