'use strict'


function Starspinned(elem) {
    
    let spinOff = setTimeout(function(){
        
        let elem1 = elem[0];
        elem1.className = 'fa fa-star fa-1x fa-fw starspinned';
        
    }, 7200);
    
    let spinOff2 = setTimeout(function(){
        
        let elem1 = elem[1];
        elem1.className = 'fa fa-star fa-1x fa-fw starspinned';
        
    }, 7200);
};

let starspinned = new Starspinned(document.getElementsByClassName('starspinned'));