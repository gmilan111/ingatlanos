import '@/bootstrap.js';

import { Navbar, Dropdown, initMDB } from "mdb-ui-kit";

initMDB({ Navbar, Dropdown });

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

