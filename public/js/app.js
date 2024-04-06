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

function igen () {
    if(document.getElementById("ingatlanos").checked){
        document.getElementById("plus_agent").style.display = "block";

    }else{
        document.getElementById("plus_agent").style.display = "none";

    }
}

/*$(document).ready(function () {
    $("input#ingatlanos").click(function () {
        document.getElementById("desc").style.display = "block";
    })
})

$(document).ready(function () {
    $("input#user").click(function () {
        document.getElementById("desc").style.display = "none";
    })
})*/

/*document.getElementById("ingatlanos").addEventListener("click", function (event){
    if(event.target.value() === "i"){
        $("#form").append("<div class=\"mt-4\">\n" +
            "                <div class=\"col\">\n" +
            "                    <x-label for=\"descrpition\" value=\"{{__('Leírás: ')}}\"/>\n" +
            "                    <textarea class=\"block mt-1 w-full rounded border-gray-300\" id=\"descrpition\" name=\"description\" required ></textarea>\n" +
            "                </div>\n" +
            "            </div>");
    }
});*/


