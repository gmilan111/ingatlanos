/*import '@/bootstrap.js';*/

/*import { Input, Dropdown, initMDB } from "mdb-ui-kit";

initMDB({ Input, Dropdown });*/

$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        820:{
            items:2,
            nav:false
        },
        1260:{
            items:3,
            nav:true,
            loop:false
        },
        1920:{
            items:4,
            nav:true,
            loop:false
        }
    }
});

/*$('[data-bs-toggle="collapse"]').on('click', function(){
    if ($(this).attr('aria-expanded') == 'true') {
        $(this).find('i').addClass('fa-chevron-up').removeClass('fa-chevron-down');
    } else {
        $(this).find('i').addClass('fa-chevron-down').removeClass('fa-chevron-up');
    }
});*/

/*$('.state').click(function() {
    $(this).find('i').toggleClass('fa-solid fa-chevron-down fa-solid fa-chevron-up');
});*/

$('.custom-dropdown').click(function() {
    $(this).find('i').toggleClass('fa-solid fa-chevron-down fa-solid fa-chevron-up');
});

/*document.addEventListener("click", function (e){
    if(e.target.ariaExpanded == 'true' && e.target.id == 'state'){
        const collection = document.getElementById('state').children;
        console.log(collection);
        collection.addClass('fa-chevron-right').removeClass('fa-chevron-down');/!*
        e.target.childNodes[2].addClass('fa-chevron-right').removeClass('fa-chevron-down');*!/
    }else{
        /!*e.target.firstChild.addClass('fa-chevron-down').removeClass('fa-chevron-right');*!/
    }
})*/

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


