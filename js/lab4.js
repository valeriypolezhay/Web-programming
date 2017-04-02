$(document).ready(function() {
    $("#div1").hide();
        $("#hide1").click(function() {
        $("#div1").toggle();
    });

    $("#div2").hide();
    $("#hide2").click(function() {
        $("#div2").slideToggle();
    });

    $("#div3").hide();
    $("#hide3").click(function() {
        $("#div3").toggle("clip");
    });

    $("#div4").hide();
    $("#hide4").click(function() {
        $("#div4").toggle("slide");
    });

    $("#div5").hide();
    $("#hide5").click(function() {
        $("#div5").toggle("explode");
    });

    $("#div6").hide();
    $("#hide6").click(function() {
        $("#div6").toggle("scale");
    });

});