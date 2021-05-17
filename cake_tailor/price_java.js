//3d 커스텀 실시간 가격 책정

var counter = 0;
window.setInterval("refreshDiv()", 1000);

/*
window.setInterval("refreshDiv()", 3000);
function refreshDiv() {
    counter = sum1(0);
    
    document.getElementById("test").innerHTML = "총 결제금액 : " + counter;
}
*/

function sum1(value){
    if (typeof total == 'undefined'){
        total = 0;
    }
    var chk1 = document.getElementById("deco");
    
    if(chk1.checked){
        total=total+value;
    }else{
        total=total-value;
    }
    counter = total;
    //alert(total);
    sum(0);
    return total;
}
function sum2(value){
    if (typeof total == 'undefined'){
        total = 0;
    }
    var chk2 = document.getElementById("lettering");

    if(chk2.checked){
        total=total+value;
    }else{
        total=total-value;
    }
    counter = total;
    //alert(total);
    sum(0);
    return total;
}
function sum3(value){
    if (typeof total == 'undefined'){
        total = 0;
    }
    var chk3 = document.getElementById("sheet");
    
    if(chk3.checked){
        total=total+value;
    }else{
        total=total-value;
    }
    counter = total;
    //alert(total);
    sum(0);
    return total;
}
function sum5(value){
    if (typeof total == 'undefined'){
        total = 0;
    }
    var chk5 = document.getElementById("shape");
    
    if(value!=0){
        total=total+value;
        if(total>10000) {
            total=10000;
        }
    }else{
        total=0;
    }
    counter = total;
    //alert(total);
    sum(0);
    return total;
}
function sum(value){
    if (typeof total == 'undefined'){
        total = 0;
    }
    total = total + value;
    document.getElementById("test").innerHTML = "총 결제금액 : " + counter + " 원";
    return total;
}