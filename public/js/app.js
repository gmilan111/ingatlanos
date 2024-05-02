/*import '@/bootstrap.js';

import { Navbar, Dropdown, initMDB } from "mdb-ui-kit";

initMDB({ Navbar, Dropdown });*/


$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        }
    }
})
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
        document.getElementById("auction_div").style.display = "none";
        document.getElementById('auctions_info').style.display = "none"
    } else {
        document.getElementById("rent_part").style.display = "none";
        document.getElementById("auction_div").style.display = "flex";
    }
}

function auctions(){
    if(document.getElementById('auction').checked){
        document.getElementById('auctions_info').style.display = "flex";
    }else{
        document.getElementById('auctions_info').style.display = "none";
    }
}

function newsletter(){
    if(document.getElementById('email_notification').checked){
        document.getElementById('county').style.display = "block";
    }else{
        document.getElementById('county').style.display = "none";
    }
}


