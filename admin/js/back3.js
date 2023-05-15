

$(document).ready(function() {

  
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date-part').html(momentNow.format('DD/MM/YYYY'));
    $('#time-part').html(momentNow.format('HH:mm:ss'));
}, 100);


$("#overlay-wait").click(function(e) 
{

    var container = $(".addcart");
    
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        $("#overlay-wait").toggle("slow");
    }
});

$("#overlay-check").click(function(e) 
{

    var container = $(".addcart");
    
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        $("#overlay-check").toggle("slow");
    }
});

$("#overlay-send").click(function(e) 
{

    var container = $(".addcart");
    
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        $("#overlay-send").toggle("slow");
    }
});



$(".st-wait").click(function(){

      var data = this.getAttribute('data-panda');

      document.getElementById('code_wait').value = data;

    $("#overlay-wait").toggle("slow");

});

$(".st-checking").click(function(){

      var data = this.getAttribute('data-panda');

      document.getElementById('code_check').value = data;
    $("#overlay-check").toggle("slow");

});

$(".st-sending").click(function(){
      var data = this.getAttribute('data-panda');

      document.getElementById('code_send').value = data;
    $("#overlay-send").toggle("slow");

});


$(".exit-wait").click(function(){
    //alert('ok');
    $("#overlay-wait").toggle("slow");
    
    
});
$(".exit-check").click(function(){
    //alert('ok');
    $("#overlay-check").toggle("slow");
    
    
});
$(".exit-send").click(function(){
    //alert('ok');
    $("#overlay-send").toggle("slow");
    
    
});


$(".yes-wait").click(function(){

    $("#overlay-wait").toggle("slow");
    //  var data = this.getAttribute('data-panda');

    //  document.getElementById('code-wait').value = data;

    //$("#overlay-wait").toggle("slow");
    
    
    var myform = document.forms.namedItem("form-wait");
    
    var code = myform.code_wait.value;
    window.open('../confirm_manufacturing.php?order='+code, '_blank');
    
    

});


$(".cancel-wait").click(function(){

    $("#overlay-wait").toggle("slow");
    
    
    
    var myform = document.forms.namedItem("form-wait");
    
    var code = myform.code_wait.value;
    
    update_status(code,'cancel');
    
    
    
    

});





$(".yes-check").click(function(){

    $("#overlay-check").toggle("slow");
    
    
    
    var myform = document.forms.namedItem("form-check");
    
    var code = myform.code_check.value;
    //alert(code);
    
    update_status(code,'complete');
    
    
    
    

});
$(".cancel-check").click(function(){

    $("#overlay-check").toggle("slow");
    
    
    
    var myform = document.forms.namedItem("form-check");
    
    var code = myform.code_check.value;
    //alert(code);
    
    update_status(code,'cancel');
    
    
    
    

});



$(".yes-send").click(function(){

    $("#overlay-send").toggle("slow");
    
    
    
    var myform = document.forms.namedItem("form-send");
    
    var code = myform.code_send.value;
    //alert(code);
    
    update_status(code,'complete');
    
    
    
    

});
$(".cancel-send").click(function(){

    $("#overlay-send").toggle("slow");
    
    
    
    var myform = document.forms.namedItem("form-send");
    
    var code = myform.code_send.value;
    //alert(code);
    
    update_status(code,'cancel');
    
    
    
    

});


var fx = 0;
$(".glr2").click(function(){


if(fx==0){
          document.m2.big1.value = null;
          document.m2.small1.value = null;
          document.m2.big2.value = null;
          document.m2.small2.value = null;
          document.m2.big3.value = null;
          document.m2.small3.value = null;
          document.m2.big4.value = null;
          document.m2.small4.value = null;
          document.m2.big5.value = null;
          document.m2.small5.value = null;

document.getElementById('glr').innerHTML = '';


fx++;
}
    
    
    $("#drop a").click();
    
    
    
    

});






}); //end document


function update_status(code,status){
  $.post("update_status_manufacuring.php?y="+Math.floor(Math.random()*1000),
    {
        code: code,
        status: status
    },
    function(data, status){
    
    
          
          if(data.trim()=='wait'){        
          
        document.getElementById('bill_'+code).innerHTML = '<a href="#" class="st-wait" onclick="return false;" data-panda="'+code+'">ยังไม่ได้ส่งหลักฐาน</a>';
        
          }else
          if(data.trim()=='checking'){        
          
        document.getElementById('bill_'+code).innerHTML = '<a href="#" class="st-checking" onclick="return false;" data-panda="'+code+'">รอตรวจสอบ</a>';
        
          }else
          if(data.trim()=='sending'){        
          
        document.getElementById('bill_'+code).innerHTML = '<a href="#" class="st-sending" onclick="return false;" data-panda="'+code+'">ดำเนินการจัดส่ง</a>';
        
          }else
          if(data.trim()=='cancel'){        
          
        document.getElementById('bill_'+code).innerHTML = '<font color="#880000">ยกเลิกแล้ว</font>';
        
          }else
          if(data.trim()=='complete'){        
          
        document.getElementById('bill_'+code).innerHTML = '<font color="#008800">สำเร็จ</font>';
        
          }else{
        document.getElementById('bill_'+code).innerHTML = 'การอัพเดทล้มเหลว';
          
          
          }
        
        
        
    
    });

}//end update sts

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
  //myDropdown.toggle(false);

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



function update_howto(title,des,key,h1,content){
var ok = "no";
//alert('hmm');
  $.post("howto_update.php?y="+Math.floor(Math.random()*1000),
    {
        title : title,
        des : des,
        key : key,
        h1 : h1,
        content : content
    },
    function(data, status){
    
          
          //alert('ok');
          
          if(data.trim()=='ok'){        
          //alert('ok');
          ok = "ok";
        //document.getElementById('bill_'+code).innerHTML = '<a href="#" class="st-wait" onclick="return false;" data-panda="'+code+'">ยังไม่ได้ส่งหลักฐาน</a>';
        
          }else{
          
          ok = "no";
          }
        
        
        
    
    });
    return ok;

}//end update howto

