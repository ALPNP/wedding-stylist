// My small libraly

'use strict'

// Берёт из аргумента детей с тэгом DIV, валидирует длинну текста.
// Эл. формы должен быть 2 - 1 в массиве детей.
function AxelFormValid(form) {
    
    let devCount = 0;

    let f = form;
    let valid = [];
    let fDiv = f.getElementsByTagName('div');
    
    for (let i = 0; i < fDiv.length; i++) {

        let formCheck = fDiv[i].children[1].value;
        let elemError = fDiv[i].children[1];
        let lenParams = [];
        let formElem = fDiv[i];
        
        elemError.onfocus = function() {
            elemError.style.borderColor = 'violet';
            
            if (elemError.nextElementSibling) {
                
                if (elemError.nextElementSibling.tagName === "SPAN") {
                    formElem.removeChild(elemError.nextElementSibling);
                }
            }
        }

        if (elemError.tagName == "TEXTAREA") {
            lenParams = [10, 1000];
        }
        
        if (elemError.tagName == "SELECT") {
            lenParams = [0, 40];
        }
        
        if (elemError.tagName == "INPUT") {
            lenParams = [10, 40];
        }

        //В баг трекере есть, ПРАВЬ КОГДА БУДЕТ ВРЕМЯ не критично, но непонятно как может вести себя file в таком случае
        if (elemError.type == "file") {
            lenParams = [0, 50];
//            console.log(elemError.value.length);
//            if (elemError.value.length === 0) {
//                let parentElem = elemError.parentNode;
//                console.log(parentElem);
//                parentElem.removeChild(elemError);
//                console.log(elemError);
//            }
        }
        
        console.log(formCheck);
        
        let res = (formCheck.length < lenParams[0]) || (formCheck.length > lenParams[1]);
        
        if (res === true) {
            
            if (!elemError.nextElementSibling) {
                
                let status = "Нужно указать от " + lenParams[0] + " до " + lenParams[1] + " символов, У вас " + elemError.value.length;
                let infoSpan = document.createElement('span');
                
                elemError.style.borderColor = "red";
                
                infoSpan.innerHTML = status;
                infoSpan.style.color = "red";
                
                formElem.insertBefore(infoSpan, elemError[0]);
            }
        }
        
        valid.push(res);
    }
    // Конец цикла
    
    let result = valid.filter(function(bool){
        return bool === true;
    });
    
    console.log(result.length);
    
    if (result.length === 0) {
        f.submit();
    }
};

// 
// Класс для работы с input / file, смотрит onchange формы и добавляет доп.поля
function AxelFileBuild(maxCount) {
    this.mc = maxCount;
    this.count = 2;
}

AxelFileBuild.prototype.inputFileFinder = function(input) {
    let inp = input;
    return inp;
};

AxelFileBuild.prototype.newInput = function(input) {
    
    let inpFile = this.inputFileFinder(input);
    let inpClassName = inpFile.className;
    let divClassName = input.parentNode.className;
    let labelClassName = input.previousElementSibling.className;

    //Это просто ахтунг, нужно переобдумать и переписать.
    let ind = inpFile.onchange + '';
    let ind2 = ind.slice(29, -1);
    
    let newAttrName = "foto" + this.count;
    let newInput = document.createElement('input');
    let newDiv = document.createElement('div');
    let newLabel = document.createElement('label');
    
    let labelContent = input.previousElementSibling.childNodes[0].nodeValue;
    
    newInput.setAttribute('class', inpClassName);
    newInput.setAttribute('type', 'file');
    newInput.setAttribute('name', newAttrName);
    newInput.setAttribute('accept', 'image/*');
    newInput.setAttribute('onchange', ind2);
    
    newDiv.setAttribute('class', divClassName);
    
    newLabel.setAttribute('class', labelClassName);
    newLabel.setAttribute('for', newAttrName);
    newLabel.innerHTML = labelContent;

    if (!input.nextElementSibling) {
        
        if (this.count < this.mc + 1) {
            
            if (input.value != '') {
                
                let parentElem = input.parentNode;
                let mainFormElem = parentElem.parentNode;
                let tarElem = mainFormElem.insertBefore(newDiv, parentElem.nextSibling);
                
                tarElem.appendChild(newLabel);
                tarElem.appendChild(newInput);
                this.count++;
            }
        }
    }
};
// Берёт timestamp из PHP и превращает в дату.
function DateParse(date){
    
    let res = date * 1000;
    let newDate = new Date(res);

    this.day = newDate.getDate();
    this.month = newDate.getMonth();
    this.year = newDate.getFullYear();
};
// А теперь найди за то это отвечает ))), как найдеш, убери отсюда это.

//let inputFotoStates = new AxelFileBuild(3);