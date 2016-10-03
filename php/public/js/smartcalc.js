'use strict';

function WordForCalc() {

    this.inArrayWord = [];
    this.inArrayCell = [];
    
    let finalCost = 0;
}

WordForCalc.prototype.setPrice = function(wordObj) {
    
    this.wordObj = wordObj;
};

// Метод для сортировки услуг в таблицу
WordForCalc.prototype._arraySorter = function() {

    let obj = this.wordObj;

    for (let key in obj) {
        this.inArrayWord.push(key);
        this.inArrayCell.push(obj[key]);
    };
    
    this.inArrayCell.reverse();
    this.inArrayWord.reverse();
};

WordForCalc.prototype.createAppDiv = function(options) {
    
    this.appDiv = document.createElement('div');
    
    let parentElem = options.target,
        divShadow = options.shadow,
        divMargin = options.margin,
        divPadding = options.padding,
        divColor = options.color;
    
    // Устанавливаем стили для нашего приложения
    this.appDiv.style.boxShadow = divShadow;
    this.appDiv.style.margin = divMargin;
    this.appDiv.style.backgroundColor = divColor;
    this.appDiv.style.padding = divPadding;
    
    // Добавляем appDiv на страничку
    parentElem.appendChild(this.appDiv);
};
// Метод для заполнения таблицы данными и последующего рендера
// Принимает объект с CSS стилями
WordForCalc.prototype.renderTable = function(title, conclusion, catTitle) {

    let h4Title = document.createElement('h4'),
        h4Conclusion = document.createElement('h4'),
        h2CatTitle = document.createElement('h2');

    h4Title.innerHTML = title;
    h4Title.style.textAlign = 'left';
    h4Conclusion.innerHTML = conclusion;
    h2CatTitle.innerHTML = catTitle;
    
    if (catTitle) {
        this.appDiv.appendChild(h2CatTitle);
    };
    
    this.appDiv.appendChild(h4Title);
    this.table = document.createElement('table');
    this.table.className = 'table table-bordered';
    this.table.style.marginTop = '10px';

    // Добавляем динамическую таблицу на страничку
    this.appDiv.appendChild(this.table);
    // Циклы для создания динамической таблицы
    for (let i = 0; i < this.inArrayWord.length; i++) {

        let button = document.createElement('button'),
            tr = document.createElement('tr');

        tr.style.border = '2px solid #fff';
        tr.style.padding = '3px';
        // Каждую итерацию создаём и помещаем на страницу тег TR
        this.table.insertBefore(tr, this.table.firstChild);
        // Заполняем наш TR контентом из массива 
        for (let i2 = 0; i2 < 2; i2++) {

            let createButton = this.table.children[0].insertBefore(button, this.table.children[0].firstChild),
                td = document.createElement('td'),
                createCell = this.table.children[0].insertBefore(td, this.table.children[0].lastChild);

            td.style.border = '2px solid #fff';
            createCell.style.fontSize = '17px';
            createButton.innerHTML = "Выбрать";
            createButton.className = "btn btn-pink btn-block";
            createButton.style.borderRadius = "0px";
            createButton.style.fontSize = '17px';
            // Добавляем кнопке атрибут с ценой для последующей калькуляции
            createButton.setAttribute('cost', this.inArrayCell[i]);
            // Заполняем таблицу данными
            if (i2 === 0) {
                createCell.innerHTML = this.inArrayCell[i] + ' руб.';
            } else if (i2 === 1) {
                createCell.innerHTML = this.inArrayWord[i];
            }
        }
    };
    if (conclusion) {
        this.appDiv.appendChild(h4Conclusion);
    };
    
    // Очищаем данные в массиве
    this.inArrayCell.length = 0;
    this.inArrayWord.length = 0;
};

WordForCalc.prototype.createCost = function() {
    // Создаём поле с суммой
    let divCost = document.createElement('div');

    divCost.id = 'dynamicCost';
    // Стили панели с ценой
    divCost.style.textAlign = "center";
    divCost.style.fontSize = "23px";
    divCost.style.position = 'fixed';
    divCost.style.width = 'auto';
    divCost.style.margin = '1em';
    divCost.style.padding = '15px';
    divCost.style.overflow = 'visible';
    divCost.style.bottom = '0';
    divCost.style.right = '0';
    divCost.style.cursor = 'pointer';
    divCost.style.outline = 'none';
    divCost.style.zIndex = '99999';
    divCost.style.fontWeight = '400';
    divCost.style.background = '#C2E5E3';
    divCost.style.borderRadius = '15px';
    
    divCost.innerHTML = 'Стоимость услуг: ' + 0 + ' рублей.';
    
//    let addRule = (function (style) {
//    let sheet = document.head.appendChild(style).sheet;
//    return function (selector, css) {
//        let propText = "";
//        // Если передана строка, оставляем, как есть
//        if (typeof css === "string") {
//            propText = css;
//        } 
        // Если передан объект, обрабатываем каждый ключ
//        else {
//            propText = Object.keys(css).map(function (property) {
//                let value = "";
//                // Если попалось свойство "content",
//                // заключаем значение в кавычки
//                if (property === "content") {
//                    value = "'" + css[property] + "'";
//                // Иначе оставляем, как есть
//                } else {
//                    value = css[property];
//                }
//                // Склеиваем в строку пару "ключ" и "значение"
//                return property + ":" + value;
//            }).join(";"); // Склеиваем в строку все свойства
//        }
//        sheet.insertRule(selector + "{"+propText+"}", sheet.cssRules.length);
//    };
//})(document.createElement("style"));

// Передача CSS объектом
//addRule("#dynamicCost::before", {
//    "background": "#000",
//    "content": "''",
//    "display": "block",
//    "height": "10px",
//    "left": "5px",
//    "position": "absolute",
//    "top": "5px",
//    "width": "10px"
//});

// Передача CSS строкой
//addRule("#dynamicCost::after", ""
//        + "border: 3px solid #C2E5E3;"
//        + "animation: anim-effect-jelena 2s ease-out forwards;"
//        + "animation-iteration-count: 10000;"
//        + "position: absolute;"
//        + "top: 50%;"
//        + "left: 50%;"
//        + "width: 150px;"
//        + "height: 150px;"
//        + "content: '';"
//        
//);

    document.body.appendChild(divCost);
};

WordForCalc.prototype.events = function() {

    let counter = 0;

    this.appDiv.onclick = function(event) {

        let numCost = event.target.getAttribute('cost'),
            negativeCost = event.target.setAttribute('cost', -numCost);

        counter += +numCost;
        dynamicCost.innerHTML = 'Стоимость услуг: ' + counter + ' рублей.';

        if (event.target.getAttribute('cost') < 0) {
            event.target.className = 'btn btn-tiffany btn-block';
            event.target.nextSibling.style.backgroundColor = '#C2E5E3';
            event.target.nextSibling.nextSibling.style.backgroundColor = '#C2E5E3';
        } else if (event.target.className === 'btn btn-tiffany btn-block') {
            event.target.className = 'btn btn-pink btn-block';
            event.target.nextSibling.style.backgroundColor = '';
            event.target.nextSibling.nextSibling.style.backgroundColor = '';
        }
    }
};