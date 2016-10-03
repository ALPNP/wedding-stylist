'use strict'

function MenuRender() {

    let location = window.location;
    this.locationPath = location.pathname;
}

MenuRender.prototype.menuSetClass = function(domElem) {
    
    let lP = this.locationPath;

    if (lP === "/") {
        domElem.children[0].className = "active";
    } else {

        for (let i = 0; i <= domElem.children.length; i++) {

            let iE = domElem.children[i];
            
            let href = iE.children[0].href;
            href.toString;

            if (href.indexOf(lP) > -1) {
                domElem.children[i].className = "active";
            }
        }
    }
};

let menuRender = new MenuRender();
let menu = document.getElementById('navbar-content');

menuRender.menuSetClass(menu);