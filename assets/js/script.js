'use strict';

// Отображение двух карточек на мобильной версии сайта
const card = document.querySelectorAll('.card');

for(let i = 2; i < card.length; i++) {
    card[i].classList.add('hide');
};

const btnSeeMore = document.querySelector('#btn-see-more');

btnSeeMore.addEventListener('click', () => {
     card.forEach(element => {
        element.classList.remove('hide');       
    });   

    btnSeeMore.style.display = 'none';
    btnSeeMore.classList.remove('btn-see-more');
});

// Обработка поля ввода телефона заказа
const phoneInput = document.querySelectorAll('.phone-input');
phoneInput.forEach((phoneInputs) => {
    phoneInputs.addEventListener('input', () => {
        phoneInputs.value = phoneInputs.value.replace(/\D/g, '');
    });
});

