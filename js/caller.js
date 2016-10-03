'use scrict'

function Call(elem, classname, setClass) {
    
    let min = 1500;
    let max = 5000;
    
    let moonPhase = Math.floor(Math.random() * (max - min + 1)) + min;
    
    let interval1 = setInterval(function(){
        
        if (elem.className === classname) {
            elem.className = setClass;
        } else {
            elem.className = "wowjs-shake";
        }
        
    }, moonPhase);
};

{
    let viberElem = document.getElementById('viber');
    let whatsElem = document.getElementById('whats');

    let viber = new Call(viberElem, 'wowjs-shake', 'animated tada');
    let whats = new Call(whatsElem, 'wowjs-shake', 'animated tada');
}