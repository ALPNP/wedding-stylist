'use strict';

function AnchorUp() {

    this.icon = document.createElement('i');
    this.div = document.createElement('div');

    let anchor = document.createElement('a'),
        body = document.body;

    this.div.className = "anchorup hide";
    
    this.icon.setAttribute("aria-hidden", "true");
    this.icon.style.cssText = "transition: all 0.3s ease-out 0.1s; -webkit-transition: all 0.3s ease-out 0.1s; \
    -moz-transition: all 0.3s ease-out 0.1s; border-radius: 50%; text-align: center;";
    
    anchor.setAttribute("href", "#navbar");
    anchor.style.color = "#ff4f53";

    anchor.appendChild(this.icon);
    this.div.appendChild(anchor);
    body.appendChild(this.div);
};

AnchorUp.prototype.events = function() {

    let body = document.body,
        self = this;

    const ud = 4096,
          bd = 1920,
          ld = 1200,
          md = 768,
          sd = 480;
        
    // Adaptive
    onload = function() {
        if ((body.clientWidth < ud) && (body.clientWidth > bd)) {
            self.icon.className = "fa fa-3x fa-angle-double-up";
            self.icon.style.width = "50px";
            self.icon.style.height = "50px";
        } else if ((body.clientWidth < bd) && (body.clientWidth > ld)) {
            self.icon.className = "fa fa-4x fa-angle-double-up";
            self.icon.style.width = "60px";
            self.icon.style.height = "60px";
        } else if (body.clientWidth < ld) {
            self.icon.className = "fa fa-5x fa-angle-double-up";
            self.icon.style.width = "75px";
            self.icon.style.height = "75px";
        }
    };

    // Responsive    
    onresize = function() {
        if ((body.clientWidth < ud) && (body.clientWidth > bd)) {
            self.icon.className = "fa fa-3x fa-angle-double-up";
            self.icon.style.width = "50px";
            self.icon.style.height = "50px";
        } else if ((body.clientWidth < bd) && (body.clientWidth > ld)) {
            self.icon.className = "fa fa-4x fa-angle-double-up";
            self.icon.style.width = "60px";
            self.icon.style.height = "60px";
        } else if (body.clientWidth < ld) {
            self.icon.className = "fa fa-5x fa-angle-double-up";
            self.icon.style.width = "75px";
            self.icon.style.height = "75px";
        }
    };

    // onmouseover
    self.icon.onmouseover = function() {
        self.icon.style.background = "rgba(176, 245, 241, 0.9)";
    };

    // onmouseout
    self.icon.onmouseout = function() {
        self.icon.style.background = "";
    };
};

AnchorUp.prototype.showHide = function() {

    let self = this;

    onscroll = function() {

        let scrolled = pageYOffset || document.documentElement.scrollTop;

        if (scrolled > 500) {
            self.div.className = "anchorup";
        } else if (scrolled < 500) {
            self.div.className = "anchorup hide";
        }
    };
};

AnchorUp.prototype.goUp = function() {

    $(document).ready(function() {
        $('a[href^="#navbar"]').click(function() {
            $('body').animate({
                scrollTop: 0
            }, 850);
        });
    });
};

let anchorUp = new AnchorUp();

anchorUp.events();
anchorUp.showHide();
anchorUp.goUp();