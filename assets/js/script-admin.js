'use strict';

const hidenCards = document.querySelector('#btn-hidden-cards');
const cards = document.querySelectorAll('.card');

hidenCards.addEventListener('click', () => {
    cards.forEach((card) => {
        card.classList.toggle('hidden');
        if(card.classList.contains('hidden')) {
            hidenCards.classList.remove('btn-secondary');
            hidenCards.classList.add('btn-warning');
            hidenCards.textContent = 'Открыть карточки';
        } else {
            hidenCards.classList.remove('btn-warning');
            hidenCards.classList.add('btn-secondary');
            hidenCards.textContent = 'Спрятать карточки';
        } 
    });
});

