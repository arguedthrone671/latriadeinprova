'use strict';

let orderbg = document.getElementById('orderbg');
let orderCard = document.getElementById('order');
let orderCart = document.getElementById('orderToPut');
let orderList = [];
let canOrder = true;
let php = "<?php echo $panino['title'] ?>";

window.onscroll = function () {
    let self = document.getElementById('menuContainer');
    let top = window.scrollY;
    if(top < 150) {
        self.style.opacity = '0%';
    } else {
        self.style.opacity = '100%';
    }
}

function showMore(btn) {
    let description = btn.nextElementSibling;
    description.classList.toggle('hide');
    description.classList.toggle('blockRelative');

}

function showUnshowOrder() { //shows order so far
    orderbg.classList.toggle('hide'); //toggles if bg is visible
    orderbg.classList.toggle('orderbg');
    orderCard.classList.toggle('order'); //toggle order visibility
    orderCard.classList.toggle('hide');
    let i = 0;

    if(orderbg.classList.contains('hide')) {
        orderCart.innerHTML = '';
    } else {
        for(let element of orderList) {
            let div = document.createElement('div'); //around buttons, it makes the line up with X btn
            div.style.display = 'flex';
            div.style.flexFlow = 'row wrap';
            div.style.justifyContent = 'center';
            div.style.width = '100%';
            div.style.margin = '5px';
            div.style.padding = '5px';

            let removeBtn = document.createElement('button');
            removeBtn.style.borderRadius = '50%';
            removeBtn.style.width = '2rem';
            removeBtn.style.height = '2rem';
            removeBtn.style.backgroundColor = '#900603';
            removeBtn.style.color = 'white';
            removeBtn.style.fontWeight = 'bold';
            removeBtn.style.border = 'none';
            removeBtn.innerText = String.fromCharCode(215);
            removeBtn.setAttribute('onclick', 'removeFromOrder(this)');

            let btn = document.createElement('button');
            btn.classList.add('button1Ps');
            btn.style.width = '20%'; //modifica alla classe button1Ps
            btn.innerText = element;

            let divSepare = document.createElement('div');
            divSepare.style.minHeight = '1%';
            divSepare.style.minWidth = '75%';
            divSepare.style.border = '1px solid black';
            divSepare.style.alignSelf = 'center';
            divSepare.style.margin = '3px';

            div.appendChild(btn);
            div.appendChild(removeBtn);
            orderCart.appendChild(div);
            if(i >= orderList.length - 1) {

            } else {
                orderCart.appendChild(divSepare);
            }

            i++;
        }
    }
}

function order(txt, btn) {
    if(canOrder) {
        buttonAnimation(btn);
        btn.innerText = '+1';
        orderList.push(txt);
        orderList.sort();
        setTimeout(function() {btn.innerText = 'Ordina';}, 1000);
    }
}

function removeFromOrder(element) { // element è il BOTTONE CON LA X NON QUELLO DELL'ORDINE
    orderList.splice(orderList.indexOf(element.previousSibling.innerText), 1);
    element.parentNode.remove();

    orderCart.innerHTML = '';
    let i = 0;

    for(let element of orderList) {
        let div = document.createElement('div'); //around buttons, it makes the line up with X btn
        div.style.display = 'flex';
        div.style.flexFlow = 'row wrap';
        div.style.justifyContent = 'center';
        div.style.width = '100%';
        div.style.margin = '5px';
        div.style.padding = '5px';

        let removeBtn = document.createElement('button');
        removeBtn.style.borderRadius = '50%';
        removeBtn.style.width = '2rem';
        removeBtn.style.height = '2rem';
        removeBtn.style.backgroundColor = '#900603';
        removeBtn.style.color = 'white';
        removeBtn.style.fontWeight = 'bold';
        removeBtn.style.border = 'none';
        removeBtn.innerText = String.fromCharCode(215);
        removeBtn.setAttribute('onclick', 'removeFromOrder(this)');

        let btn = document.createElement('button');
        btn.classList.add('button1Ps');
        btn.style.width = '20%'; //modifica alla classe button1Ps
        btn.innerText = element;

        let divSepare = document.createElement('div');
        divSepare.classList.add('divSepare');
        divSepare.style.minHeight = '1%';
        divSepare.style.minWidth = '75%';
        divSepare.style.border = '1px solid black';
        divSepare.style.alignSelf = 'center';
        divSepare.style.margin = '3px';

        div.appendChild(btn);
        div.appendChild(removeBtn);
        orderCart.appendChild(div);
        if(i >= orderList.length - 1) {

        } else {
            orderCart.appendChild(divSepare);
        }

        i++;
    }
    orderList.sort();
}

function changeCanOrder() {
    canOrder = false;
}

function buttonAnimation(btn) {
    btn.classList.add('button2PsAnim');
    setTimeout(function(){btn.classList = changeClass('button2PsAnim', 'button2Ps', btn)}, 700);
}

function changeClass(firstClass, changeClass, btn) {
    btn.classList.remove(firstClass);
    btn.classList.add(changeClass);
    return btn.classList;
}

function checkDuplicates(arr, val) {
    let counter = 0;
      for(let element of arr) {
          if(element === val) {
              counter++;
              continue;
          } else {
              continue;
          }
      }
      return counter;
}

function checkPhoneNumber() {
    if(document.getElementById('phone').value.length == 10) {
        document.location.assign('prenotazioneconfirm.html');
    } else {
        alert('Immetti un numero di telefono valido');
        document.getElementById('phone').value = '';
    }
}

let personCounter = document.getElementById('counter');
let count = 2;
let maxP = 15;
function person(code) {
    if(code == 1) {
        if(count < maxP) {
            count++;
        } else {
            alert('Hai raggiunto il massimo delle persona per tavolo, prova a chiamarci!');
        }
    } else if(code == 0) {
        if(count < 2) {
            
        } else {
            count--;
        }
    }

    document.getElementById('persone').value = count.toString();
    document.getElementById('personCount').innerText = count;
}

function scrollToView(btn) {
    let obj = document.getElementById(btn.innerText.toLowerCase());
    btn.classList.add('button2PsAnim');
    setTimeout(function () {btn.classList.remove('button2PsAnim')}, 700);
    obj.scrollIntoView({behavior: "smooth"});
}

function adminEnter() {
    let user = document.getElementById('username').value;
    let pw = document.getElementById('password').value;

    if(user === "a" && pw === "1") {
        window.location.assign('areariservata.php');
    } else {
        alert('password o user errati');
    }
}

function animateMenuBtn(container) {
    container.classList.toggle('change');

    document.getElementById('altMenu') {
        
    }
}