var player=document.getElementById("player");

var img= new Object();
img.src='';
var nextsong,mNumber, nextimg,playing;

function change(location,number) {
    console.log(playing);

if (mNumber!=Number(number)){
    playing=true;
    img.src="../play.png";
    player.src=location;
    player.play();
    console.log(number);
    mNumber=Number(number);
    nextsong=mNumber+1;
    img=document.getElementById("img"+number);
    console.log("img"+number)
    img.src="../pause.png";
        $.ajax({
            url: "scripts/increm.php",
            type: "POST",
            data: ({loc: location}),
            dataType: "html",
            beforeSend: function(){

            },
            success: function (data){

            }
        })
}else {
    if(playing==true){
    player.pause();
    img.src="../play.png";
    playing=false}
    else {
        player.play();
        img.src="../pause.png";
        playing=true;
    }
}}

player.addEventListener( "timeupdate", get);
function get() {
    if(player.currentTime==player.duration){
        next()
    }
}

function next() {
    img.src="../play.png";
    img=document.getElementById("img"+nextsong);
    img.src="../pause.png";
    nextsong=document.getElementById('song'+nextsong);
    console.log(nextsong.value);
    player.src=nextsong.value;
    mNumber++;
    nextsong=mNumber+1;
    console.log(mNumber);
    player.play();
}

$(document).ready(function () {
    $(".done").bind("click",function () {
        $('img', this).attr("src","done.png");
        $(this).attr("disabled","disabled");
        $.ajax({
            url: "scripts/join.php",
            type: "POST",
            data: ({id: $(this).val()}),
            dataType: "html",
        })
    })

    $("#crt_list").bind("click",function () {

        $('.modal-title').html('создать плейлист');
        $.ajax({
            url: "scripts/crt_list.php",
            type: "POST",
            data: ({}),
            dataType: "html",
            success: function (data){
                $('.modal-body').html(data);

            }
        })
    })









    $(".playlist").bind("click",function () {
        var id=$(this).attr('value');
        var name=$(this).find('h2').html();


        $('.modal-title').html(name);
        $.ajax({
            url: "scripts/playlistshow.php",
            type: "POST",
            data: ({id: id}),
            dataType: "html",
            success: function (data){
            $('.modal-body').html(data);

            }
        })
    })

})

function text(id,number) {
    var text;
    text='.p_lyr'+number;
        if ($(text).text()==''){
        $.ajax({
            url: "scripts/showLyric.php",
            type: "POST",
            data: ({id: id}),
            dataType: "html",
            success: function (data){

                $(text).text(data);
                $(text).show();
            }
        })
    }else{
        $(text).text('');
        $(text).hide();}
}