'use strict';

let date = new Date();
let mesiI = date.getMonth();

let year = date.getFullYear();
let calendar = document.getElementById('calendar');
//let selectedDate = this.innerText;
let selectedButtons = [];
let mesi = [
    {
        name: 'Gennaio',
        days: 31,
    },

    {
        name: 'Febbraio',
        days: 28,
    },

    {
        name: 'Marzo',
        days: 31,
    },

    {
        name: 'Aprile',
        days: 30,
    },

    {
        name: 'Maggio',
        days: 31,
    },

    {
        name: 'Giugno',
        days: 30,
    },

    {
        name: 'Luglio',
        days: 31,
    },

    {
        name: 'Agosto',
        days: 31,
    },

    {
        name: 'Settembre',
        days: 30,
    },

    {
        name: 'Ottobre',
        days: 31,
    },

    {
        name: 'Novembre',
        days: 31,
    },

    {
        name: 'Dicembre',
        days: 31,
    },
];
let weekdays = [
    'luned' + String.fromCharCode(236),
    'marted' + String.fromCharCode(236),
    'mercoled' + String.fromCharCode(236),
    'gioved' + String.fromCharCode(236),
    'venerd' + String.fromCharCode(236), 
    'sabato',
    'domenica',
];

let wI = date.getDay() - 1;

// function createColumns() {
//     for(let weekday of weekdays) {
//         let div = document.createElement('div');
//         div.innerText = weekday;
//         div.classList.add('weekdays');
//         calendar.appendChild(div);
//     }
// }

function createMonth() { //no bugs here
    //createColumns();
    //alert(wI);
    for(let i = 0; i < mesi[mesiI].days; i++) { // for every day creates a button
        let btn = document.createElement('button');
        btn.setAttribute('onclick', 'select(this)');
        btn.setAttribute('data-weekday', weekdays[wI]);
        btn.classList.add('day');
        btn.innerText = i + 1;
        calendar.appendChild(btn);
        wI++;
        if(wI >= 7){
            wI = 0;
        }
    }
    wI = date.getDay() - 1;
    //alert(wI);
}

function changeMonth(incOrDec) {
    let mese = document.getElementById('meseDisplay'); //gets month title

    if(incOrDec == 1) { //if it has to increment...
        if(mesiI >= mesi.length - 1){ //dunno y length is 1 more than indexes, >= is bc it changes after the click
            year = year + 1;
            mesiI = 0;
            mese.innerText = mesi[mesiI].name + ' ' + year;
        } else {
            mesiI += 1;
            mese.innerText = mesi[mesiI].name + ' ' + year;
        }

    } else if (incOrDec == 0) { //...or to decrement
        if(mesiI <= 0) { //same reason as >=
            year = year - 1;
            mesiI = 11;
            mese.innerText = mesi[mesiI].name + ' ' + year;
        } else {
            mesiI = mesiI - 1;
            mese.innerText = mesi[mesiI].name + ' ' + year;
        }

    } else if (incOrDec == 2) {
        mese.innerText = mesi[mesiI].name + ' ' + year;
    }

    calendar.innerHTML = '';
    
    createMonth();
}

window.onload = changeMonth(2); //2 is for setup command otherwise it'll show up blank january

function select(btn) {
    document.getElementById('weekday').innerHTML = btn.getAttribute('data-weekday');
    let value = btn.innerText + ' ' + document.getElementById('meseDisplay').innerText;
    btn.classList.add('bckfwdbuttonFocused');
    selectedButtons.push(btn);

    if(selectedButtons.length > 1) {
        selectedButtons[0].classList.remove('bckfwdbuttonFocused');
        selectedButtons.shift();
    }

    let datefield = document.getElementById('date');
    datefield.setAttribute('value', value);
    //TODO submit $value
}

function submitDate() {
    alert(document.getElementById('date').value);
}