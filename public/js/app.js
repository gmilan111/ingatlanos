/*import '@/bootstrap.js';*/

/*import { Navbar, Dropdown, initMDB } from "mdb-ui-kit";

initMDB({ Navbar, Dropdown });*/

$(document).ready(function(){
    $("button.plusbtn").on("click",function(){
        $("#plus").append("" +
            "<input class=\"form-control\" type=\"file\" id=\"main_img\" name=\"main_img\">");
    });
});

$(document).ready(function(){
    $("button.plusbtn2").on("click",function(){
        $("#plus2").append("" +
            "<input class=\"form-control\" type=\"file\" id=\"formFile\" name=\"images[]\" multiple>");
    });
});

function hidebtn(x){
    x.style.display='none';
}

function plusinfo () {
    if(document.getElementById("ingatlanos").checked){
        document.getElementById("plus_agent").style.display = "block";
        document.getElementById("plus_user").style.display = "none";

    }else{
        document.getElementById("plus_agent").style.display = "none";
        document.getElementById("plus_user").style.display = "block";
    }
}

function salerent() {
    if (document.getElementById("rent").checked) {
        document.getElementById("rent_part").style.display = "flex";
    } else {
        document.getElementById("rent_part").style.display = "none"
    }
}

function auctions(){
    if(document.getElementById('auction').checked){
        document.getElementById('auctions_info').style.display = "flex";
        document.getElementById('starting_price').style.display = "flex";
        document.getElementById('price').style.display = "none";
    }else{
        document.getElementById('auctions_info').style.display = "none";
        document.getElementById('starting_price').style.display = "none";
        document.getElementById('price').style.display = "flex";
    }
}

