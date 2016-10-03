'use strict'

function Validate() {
    this.stopWord = ["<script>", "<p>", "body", "<?php", "<?", "<br>", "<div>"];
    this.formats = [".xls", ".doc", ".xlsx", ".docx", ".zip", ".exe", ".hta"];
}

Validate.prototype.handler = function(form) {
    
    let name = form.name.value,
        review = form.review.value,
        foto = form.foto.value,
        nameRes = this.nameHandler(name),
        reviewRes = this.reviewHandler(review),
        fotoRes = this.fotoHandler(foto),
        formName,
        formReview,
        formFoto;
    
    if (nameRes === true) {
        
        if (form.name.previousSibling.className == "error") {
            this.resetError(form, form.name);
        }    
    formName = true;
        
    } else if (typeof nameRes == "string") {
        this.showError(form.name, nameRes);
        formName = false;
    }
    
    if (reviewRes === true) {
        
        if (form.review.previousSibling.className == "error") {
            this.resetError(form, form.review);
        }
    formReview = true;
        
    } else if (typeof reviewRes == "string") {
        this.showError(form.review, reviewRes);
        formReview = false;
    }
    
    if (fotoRes === true) {
        
        if (form.foto.previousSibling.className == "error") {
            this.resetError(form, form.foto);
        }
    formFoto = true;
        
    } else if (typeof fotoRes == "string") {
        this.showError(form.foto, fotoRes);
    }
    
    if ((formName === true) && (formReview === true) && (formFoto === true)) {
        form.submit();
    } else {
        return false;
    }
};

Validate.prototype.nameHandler = function(name) {
    
    let result;
    
    if (name === ""){
        return "Введите Ваше имя";
    } else if (name.length <= 1) {
        return "Минимальная длина имени 2 символа. Длина Вашего имени составляет: " + name.length;
    } else if (name.length >= 40) {
        return "Максимальная длина имени 40 символов. Длина Вашего имени составляет: " + name.length;
    } else if (this.stopWord) {
        for (let i = 0; i < this.stopWord.length; i++) {

            let findWord = name.indexOf(this.stopWord[i]);

            if (findWord >= 0) {
                result = "Ошибка обработки";
                break;
            } else {
                for (let i = 0; i < this.stopWord.length; i++) {
                    
                    let findWord = name.indexOf(this.stopWord[i]);
                    
                    if (findWord < 0) {
                        result = true;
                        break;
                    }
                }
            }   
        }
    }
    return result;
};

Validate.prototype.reviewHandler = function(review) {
    
    let result;
    
    if (review === ""){
        return "Вы не оставили отзыв";
    } else if (review.length <= 10) {
        return "Минимальная длина отзыва 10 символов. Длина Вашего отзыва составляет: " + review.length;
    } else if (review.length >= 1000) {
        return "Максимальная длина отзыва 1000 символов. Длина Вашего отзыва составляет: " + review.length;
    } else if (this.stopWord) {
        for (let i = 0; i < this.stopWord.length; i++) {
            
            let findWord = review.indexOf(this.stopWord[i]);
            
            if (findWord >= 0) {
                result = "Ошибка обработки";
                break;
            } else {
                for (let i = 0; i < this.stopWord.length; i++) {
                    
                    let findWord = review.indexOf(this.stopWord[i]);
                    
                    if (findWord < 0) {
                        result = true;
                        break;
                    }
                }
            }   
        }
    }
    return result;
};

Validate.prototype.fotoHandler = function(foto) {
    
    let result;
    
    for (let i = 0; i < this.formats.length; i++) {
        
        let findFormat = foto.indexOf(this.formats[i]);
        
        if (findFormat >= 0) {
            result = "Тип файла не поддерживается";
            break;
        } else {
            for (let i = 0; i < this.formats.length; i++) {
                
                let findFormat = foto.indexOf(this.formats[i]);
                
                if (findFormat < 0) {
                    result = true;
                    break;
                }
            }
        }
    }
    return result;
};

Validate.prototype.showError = function(container, errorMessage) {
    
    if (container.previousSibling.className == "error") {
        this.resetError(form, container);
    }
    
    let msgElem = document.createElement('span');
    
    msgElem.className = "error";
    
    msgElem.style.cssText = "color: red;";
    msgElem.innerHTML = errorMessage;
    form.insertBefore(msgElem, container);
    msgElem.nextSibling.style.cssText = "border-color: red;";
};

Validate.prototype.resetError = function(form, container) {
    
    form.removeChild(container.previousSibling);
    container.style.cssText = "";
};

let validate = new Validate();