'use strict'

function funcSuccess(data) {
    
    let content = data;
    
    // div.shit
    // Без комментариев
    let shit = document.createElement('div');
    shit.id = "shit";
    
    let stateZone = document.getElementById('stlist');
    stateZone.appendChild(shit);

    for (let i = 0; i < content.length; i++){
        
        let id = +content[i].id;
        let cat = content[i].cat;
        let podcat = content[i].podcat;
        let header = content[i].header;
        let img = content[i].images;
        let text = content[i].text;
        let view = content[i].view;
        
        
        // div.column
        let columnDiv = document.createElement('div');
        columnDiv.className = "column col-xs-12";
        // Создаём тело нашей статьи
        let stateFotoDiv = document.createElement('div');
        stateFotoDiv.className = 'fotodiv col-xs-12';
        
        stateFotoDiv.style.background = "black url('" + img + "')";
        stateFotoDiv.style.backgroundSize = "100%";
        stateFotoDiv.style.boxShadow = "0px 0px 15px rgba(255, 192, 203, 0.7)";

        let stateBody = document.createElement('div');
        stateBody.className = 'statebody col-xs-12';

        // Вставляем тело в DOM
        columnDiv.appendChild(stateFotoDiv);
        stateFotoDiv.appendChild(stateBody);
        shit.appendChild(columnDiv);
        
        // Создаём DIV для заголовка статьи
        let stateHeader = document.createElement('div');
        stateHeader.className = 'stateheader col-xs-12';
        
        let textHeaderDiv = document.createElement('div');
        textHeaderDiv.className = 'col-xs-10';
        let textHeader = document.createElement('b');
        textHeader.className = 'text textheader';
        textHeader.innerHTML = header;
        textHeaderDiv.appendChild(textHeader);
        stateHeader.appendChild(textHeaderDiv);
        
        let viewCountDiv = document.createElement('div');
        viewCountDiv.className = 'col-xs-2 countdiv';
        let viewCount = document.createElement('p');
        viewCount.className = "text viewcount";
        let countImg = document.createElement('i');
        countImg.className = "fa fa-eye viewimg";
        countImg.setAttribute("aria-hidden","true");
        viewCount.innerHTML = view;
        viewCountDiv.appendChild(viewCount);
        viewCount.insertBefore(countImg, viewCount.firstChild);
        
        stateHeader.appendChild(viewCountDiv);
        
        stateBody.appendChild(stateHeader);
        
        // Создаём DIV и вставляем в него дату
        
        let timeDiv = document.createElement('div');
        timeDiv.className = "col-xs-12";
        
        let time = document.createElement('p');
        time.className = "text timep";
        time.setAttribute('name', "timep");
        let dateParse = new DateParse(id);
        let formatTime = dateParse.day + "." + dateParse.month + "." + dateParse.year;
        time.innerHTML = formatTime;
        
        timeDiv.appendChild(time);
        stateHeader.appendChild(timeDiv);
        
        let stContent = document.createElement('div');
        stContent.className = "state__content col-xs-12";
        let stText = document.createElement('div');
        stText.className = "text sttext";
        stText.innerHTML = text;
        
        stateBody.appendChild(stContent);
        stContent.appendChild(stText);
        
        $(stText).readmore({
            speed: 1000, //скорость раскрытия скрытого текста (в миллисекундах)
            maxHeight: 500, //высота раскрытой области текста (в пикселях)
            heightMargin: 16, //избегание ломания блоков, которые больше maxHeight (в пикселях)
            moreLink: '<a href="#" class="btn btn-pink statebutton" data=' + id + '>Подробнее</a>', //ссылка "Читать далее", можно переименовать
            lessLink: '<a href="#" hidden>Свернуть</a>' //ссылка "Скрыть", можно переименовать
//            blockCSS: 'display: block; width: 100%;'
//            lessLink: '<a href="#">Read less</a>'
        });
    }
    
    let elemCollection = document.getElementsByClassName("statebutton");
    
    $('.statebutton').bind('click', function(){
        
        let et = event.target;
        let id = +$(et).attr("data");
        
            $.ajax({
                url: '../../php/modules/viewcounter.php',
                type: "POST",
                data: ({
                    id: id
                }),
                dataType: "json",
                success: function(data) {
//                    console.log(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
    })
};

$(document).ready(function() {
    
    $.ajax({
        url: '../../php/modules/stateparser.php',
        type: "POST",
        data: ({
            respid: "get_start"
        }),
        dataType: "json",
        success: funcSuccess,
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
});

function lassar(elem) {
    
    let funcRender = function(data) {        
        
        let content = data;
    
        if (document.getElementById('shit')) {

                let parentElem = document.getElementById('stlist');
            
                parentElem.removeChild(document.getElementById('shit'));

        }
        
    // div.shit
    // Без комментариев
    let shit = document.createElement('div');
    shit.id = "shit";
    
    let stateZone = document.getElementById('stlist');
    stateZone.appendChild(shit);

        for (let i = 0; i < content.length; i++){

        let id = +content[i].id;
        let cat = content[i].cat;
        let podcat = content[i].podcat;
        let header = content[i].header;
        let img = content[i].images;
        let text = content[i].text;
        let view = content[i].view;

        // div.column
        let columnDiv = document.createElement('div');
        columnDiv.className = "column col-xs-12";
        // Создаём тело нашей статьи
        let stateFotoDiv = document.createElement('div');
        stateFotoDiv.className = 'fotodiv col-xs-12';

        stateFotoDiv.style.background = "black url('" + img + "')";
        stateFotoDiv.style.backgroundSize = "100%";
        stateFotoDiv.style.boxShadow = "0px 0px 15px rgba(255, 192, 203, 0.7)";

        let stateBody = document.createElement('div');
        stateBody.className = 'statebody col-xs-12';
        let stateZone = document.getElementById('stlist');

        // Вставляем тело в DOM
        // Вставляем тело в DOM
        columnDiv.appendChild(stateFotoDiv);
        stateFotoDiv.appendChild(stateBody);
        shit.appendChild(columnDiv);

        // Создаём DIV для заголовка статьи
        let stateHeader = document.createElement('div');
        stateHeader.className = 'stateheader col-xs-12';

        let textHeaderDiv = document.createElement('div');
        textHeaderDiv.className = 'col-xs-10';
        let textHeader = document.createElement('b');
        textHeader.className = 'text textheader';
        textHeader.innerHTML = header;
        textHeaderDiv.appendChild(textHeader);
        stateHeader.appendChild(textHeaderDiv);

        let viewCountDiv = document.createElement('div');
        viewCountDiv.className = 'col-xs-2 countdiv';
        let viewCount = document.createElement('p');
        viewCount.className = "text viewcount";
        let countImg = document.createElement('i');
        countImg.className = "fa fa-eye viewimg";
        countImg.setAttribute("aria-hidden","true");
        viewCount.innerHTML = view;
        viewCountDiv.appendChild(viewCount);
        viewCount.insertBefore(countImg, viewCount.firstChild);

        stateHeader.appendChild(viewCountDiv);

        stateBody.appendChild(stateHeader);

        // Создаём DIV и вставляем в него дату

        let timeDiv =document.createElement('div');
        timeDiv.className = "col-xs-12";

        let time = document.createElement('p');
        time.className = "text timep";
        time.setAttribute('name', "timep");
        let dateParse = new DateParse(id);
        let formatTime = dateParse.day + "." + dateParse.month + "." + dateParse.year;
        time.innerHTML = formatTime;

        timeDiv.appendChild(time);
        stateHeader.appendChild(timeDiv);

        let stContent = document.createElement('div');
        stContent.className = "state__content col-xs-12";
        let stText = document.createElement('div');
        stText.className = "text sttext";
        stText.innerHTML = text;

        stateBody.appendChild(stContent);
        stContent.appendChild(stText);

        $(stText).readmore({
            speed: 1000, //скорость раскрытия скрытого текста (в миллисекундах)
            maxHeight: 500, //высота раскрытой области текста (в пикселях)
            heightMargin: 16, //избегание ломания блоков, которые больше maxHeight (в пикселях)
            moreLink: '<a href="#" class="btn btn-pink statebutton" data=' + id + '>Подробнее</a>', //ссылка "Читать далее", можно переименовать
            lessLink: '<a href="#" hidden>Свернуть</a>' //ссылка "Скрыть", можно переименовать
//            blockCSS: 'display: block; width: 100%;'
//            lessLink: '<a href="#">Read less</a>'
        });
        }

        let elemCollection = document.getElementsByClassName("statebutton");

        $('.statebutton').bind('click', function(){

            let et = event.target;
            let id = +$(et).attr("data");

                $.ajax({
                    url: '../../php/modules/viewcounter.php',
                    type: "POST",
                    data: ({
                        id: id
                    }),
                    dataType: "json",
                    success: function(data) {
    //                    console.log(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
                });
        })


        }

        let getStates = elem.getAttribute("data");

        $.ajax({
            url: '../../php/modules/stateparser.php',
            type: "POST",
            data: ({
                respid: getStates
            }),
            dataType: "json",
            success: funcRender,
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
};