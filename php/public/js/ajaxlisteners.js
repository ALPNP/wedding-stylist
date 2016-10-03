'use strict'

function funcSuccess(data) {
        
    let elem = document.getElementById("podcatrender");
    
    if (elem.length > 0) {
        
        let childCount = elem.children.length;
        
        for (let i = 0; i < childCount; i++) {
            
            elem.removeChild(elem.children[0]);
        }
    }

    for (let i = 0; i < data.length; i++) {
        
        let opt = document.createElement('option');

        opt.setAttribute('value', data[i]);
        opt.setAttribute('label', data[i]);

        elem.appendChild(opt);
    };
};

$(document).ready(function() {
    
    let elem = document.getElementById('podcatsort');
    
    let v = elem.value;
    
    $.ajax({
        url: '../app/emitters/podcatsorter.php',
        type: "POST",
        data: ({
            cat: v
        }),
        dataType: "json",
        success: funcSuccess
    });
    
    $("#podcatsort").bind("change", function() {
        
        let elem = document.getElementById("podcatsort");
        let v = elem.value;
        
        $.ajax({
            url: '../app/emitters/podcatsorter.php',
            type: "POST",
            data: ({
                cat: v
            }),
            dataType: "json",
            success: funcSuccess
        });
    });
});