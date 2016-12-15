function addEvent(obj, evType, fn) {
    if (obj.addEventListener) {
           obj.addEventListener(evType, fn, false);
           return true;
    } else if (obj.attachEvent) {
           var r = obj.attachEvent("on"+evType, fn);
           return r;
    } else {
           return false;
    }
}
  
function isChanged (el) {

    var id_input = el.id.substring(3);
    var price = document.getElementById("pu" + id_input).innerHTML;
    if(isNumeric(price)) {
        document.getElementById("total" + id_input).innerHTML = (price * el.value).toFixed(2);
    }
    sumPurchase();
}

function sumPurchase() {

    var sum = 0;

    var totals = document.getElementsByName('total');

    for(i=0;i<totals.length;i++) {
        if(isNumeric(totals[i].innerHTML)) {
            sum += parseFloat(totals[i].innerHTML);
        }
    }

    document.getElementById('total-final').innerHTML = sum;
}


function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}


function inputHandler() {
    if(!document.getElementsByTagName) return;
        var inputs, i;

    inputs = document.getElementsByTagName('input');
    for(i=0;i<inputs.length;i++) {
        if(!(/submit/).test(inputs[i].getAttribute("type"))) {
            inputs[i].onchange = function(){isChanged(this)};
        }
    }
}

addEvent(window, 'load', inputHandler);