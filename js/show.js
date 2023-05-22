$(document).ready(function() {

        
    $(".customerusername , .customerpassword").on('keyup', function (e) {
        if (e.keyCode === 13) {
            $('.loginsubmit').trigger('click');
        }
    });
    
    $('.loginsubmit').click(function(){
        
        $('.loginstatus').fadeIn("slow");
        
        var username = $('.customerusername');
        var password = $('.customerpassword');

        if(username.val()==""){
            
            username.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            username.focus();
        }else 
        if(password.val()==""){
            
            password.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            password.focus();
        }else{
        
        var iloading = '<div class="oniloading"><div class="loadingio-spinner-ellipsis-lvpyd3q8q8"><div class="ldio-a1f8bukrxv7"><div></div><div></div><div></div><div></div><div></div></div></div> </div>';
            $.ajax({
               type: "POST",
               url: 'customer_login.php',
               data: {user: username.val(), pass: password.val()},
               success: function(data)
               {
                  if (data.trim() === 'ok') {

                                $('.loginstatus').html(iloading+'กำลังเข้าสู่ระบบ');
                                setTimeout(function() { 
                                    window.location = './';
                                }, 2000);
                  }else if (data.trim() === 'inactive') {
                    $('.loginstatus').html('ชื่อผู้ใช้นี้ <u>ปิดการใช้งาน</u> กรุณาติดต่อผู้ดูแลระบบ');
                    // $('.loginstatus').text(''+data);
                                username.focus();

                  }else {
                    $('.loginstatus').text('Username และ/หรือ Password ไม่ถูกต้อง!');
                    // $('.loginstatus').text(''+data);
                                username.focus();
                  }
               }
      
        
                }); 
        }//end check empty


        }); // end login submit







        
    
    $('.regissubmit').click(function(){
        
        $('.regisstatus').fadeIn("slow");
        
        var username = $('.regisuser');
        var password = $('.regispass');
        var confirm = $('.regisconfirm');

        var fullname = $('.regisfullname');
        var address = $('.regisaddress');
        var tel = $('.registel');

        if(username.val()==""){
            
            username.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            username.focus();
        }else 
        if(password.val()==""){
            
            password.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            password.focus();
        }else 
        if(confirm.val()==""){
            
            confirm.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            confirm.focus();
        }else 
        if(fullname.val()==""){
            
            fullname.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            fullname.focus();
        }else 
        if(address.val()==""){
            
            address.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            address.focus();
        }else

        if (isNaN(tel.val())) {
          } else if (tel.val() == "") {
                tel.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
                tel.focus();
              }else if(!tel.val().Math(/^([0-9])+$/i)){
                $('.registel').text('กรุณากรอกตัวเลขเบอร์โทร')
              }
        else 
        if(password.val()!=confirm.val()){
            
            $('.regisstatus').text('ยืนยันรหัสผ่านไม่ตรงกัน');
            confirm.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            confirm.focus();
        }else{
        
            var iloading = '<div class="oniloading"><div class="loadingio-spinner-ellipsis-lvpyd3q8q8"><div class="ldio-a1f8bukrxv7"><div></div><div></div><div></div><div></div><div></div></div></div> </div>';
            $.ajax({
               type: "POST",
               url: 'customer_regis.php',
               data: {myuser: username.val(), mypass: password.val(), myconf: confirm.val(), myfull: fullname.val(), myaddr: address.val(),mytel: tel.val()},
               success: function(data)
               {
                  if (data.trim() === 'ok') {
                    $('.regisstatus').html(iloading+'สมัครสมาชิกสำเร็จ กำลังเข้าสู่ระบบ. .');

                    $('.customerusername').val(''+username.val());
                    $('.customerpassword').val(''+password.val());
                                setTimeout(function() { 
                                    $('.loginsubmit').trigger('click');
                                }, 3000);
                  }
                  else {
                    $('.regisstatus').text('Username และ/หรือ Password ไม่ถูกต้อง!');
                    // $('.loginstatus').text(''+data);
                                username.focus();
                  }
               }
      
        
                }); 
        }//end check empty


        }); // end regis submit





        
    
    $('.settingsubmit').click(function(){
        
        $('.settingstatus').fadeIn("slow");
        
        var username = $('.settinguser');
        var password = $('.settingpass');
        var confirm = $('.settingconfirm');

        var fullname = $('.settingfullname');
        var address = $('.settingaddress');
        var tel = $('.settingtel');
        


        // if(username.val()==""){
            
        //     username.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
        //     username.focus();
        // }else 
        // if(password.val()==""){
            
        //     password.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
        //     password.focus();
        // }else 
        // if(confirm.val()==""){
            
        //     confirm.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
        //     confirm.focus();
        // }else 

        
        if(fullname.val()==""){
            
            fullname.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            fullname.focus();
        }else 
        if(address.val()==""){
            
            address.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            address.focus();
        }else 
        if(tel.val()==""){
            
            tel.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            tel.focus();
        }else 
        if(password.val()!=confirm.val()){
            
            $('.settingstatus').text('ยืนยันรหัสผ่านไม่ตรงกัน');
            confirm.fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
            confirm.focus();
        }else{
        
            var iloading = '<div class="oniloading"><div class="loadingio-spinner-ellipsis-lvpyd3q8q8"><div class="ldio-a1f8bukrxv7"><div></div><div></div><div></div><div></div><div></div></div></div> </div>';
            $.ajax({
               type: "POST",
               url: 'customer_setting.php',
               data: {myuser: username.val(), mypass: password.val(), myconf: confirm.val(), myfull: fullname.val(), myaddr: address.val(),mytel: tel.val()},
               success: function(data)
               {
                  if (data.trim() === 'ok') {
                    $('.settingstatus').html(iloading+'ตั้งค่าสมาชิกสำเร็จ รอสักครู่. .');

                            if(username.val()!='' && password.val()!=''){                                
                                $('.customerusername').val(''+username.val());
                                $('.customerpassword').val(''+password.val());
                                setTimeout(function() { 
                                    $('.loginsubmit').trigger('click');
                                }, 3000);
                            }else{
                                setTimeout(function() { 
                                    window.location = './';
                                }, 2000);
                            }
                  }
                  else {
                    $('.settingstatus').text('Username และ/หรือ Password ไม่ถูกต้อง!');
                    // $('.loginstatus').text(''+data);
                                username.focus();
                  }
               }
      
        
                }); 
        }
        //end check empty


        }); // end setting submit


    

        $('.precheckout').click(function(){
        
            
            $('.gologin').trigger('click');
            
           }); 



    $('.gologin').click(function(){
        
        $(".loginbox").fadeIn('slow');
        $('.loginform').fadeIn('slow');
        $('body').trigger('click');
        
        $('.customerusername').focus();

           
           
       }); //end gologin
       
       $('.logincancel').click(function(){
       $('.loginbox,.loginform').hide();
           
       }); // end login cancel



       
    $('.goregis').click(function(){
        
        $(".regisbox").fadeIn('slow');
        $('.regisform').fadeIn('slow');
        $('body').trigger('click');
        
        $('.customerusernameregis').focus();

           
           
       }); //end goregis
       
       $('.regiscancel').click(function(){
       $('.regisbox,.regisform').hide();
           
       }); // end regis cancel



       
       
    $('.gosetting').click(function(){
        
        $(".settingbox").fadeIn('slow');
        $('.settingform').fadeIn('slow');
        $('body').trigger('click');
        
        $('.customerusernamesetting').focus();

        

           
           
       }); //end gosetting
       
       $('.settingcancel').click(function(){
       $('.settingbox,.settingform').hide();
           
       }); // end setting cancel

       






$("#overlay").click(function(e) 
{
//alert('ok');
    var container = $(".addcart");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        $("#overlay").toggle("slow");
    }
});

$('.loginbox').click(function(e){ 
    var container = $(".loginform");

    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        
        $(".loginbox").toggle("slow");
        $(".logincancel").trigger("click");
    }
});



$('.regisbox').click(function(e){ 
    var container = $(".regisform");

    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        
        $(".regisbox").toggle("slow");
        $(".regiscancel").trigger("click");
    }
});




$('.settingbox').click(function(e){ 
    var container = $(".settingform");

    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        
        $(".settingbox").toggle("slow");
        $(".settingcancel").trigger("click");
    }
});




$("#showmobile").click(function(){
    //alert('ok');
    $(this).toggle("slow");
    $(".inheader").toggle("slow");
});

$(".hidmenu").click(function(){
    //alert('ok');
    $(".inheader").toggle("slow");
    $("#showmobile").toggle("slow");
});

 

$(".buy").click(function(){


    $("#overlay").toggle("slow");

var data = this.getAttribute('data-panda');
var myname = this.getAttribute('data-myname');
var type = this.getAttribute('data-type');
var price = this.getAttribute('data-price');
var mydes = this.getAttribute('data-mydes');
var dprice = this.getAttribute('data-dprice');
var redprice = this.getAttribute('data-redprice');
var allprice = ' ราคา <span class="del">'+numberWithCommas(dprice)+'</span> ลดเหลือ  <span class="redprice">'+numberWithCommas(redprice)+'  บาท</span>';
//alert(price);
var img = this.getAttribute('data-img');
document.getElementById('showitem1').innerHTML = '<b>'+myname+'</b><br /><img src="img/thumbnails_'+img+'" style="width:90px;border-radius:5px;" ><br />'+allprice;


//document.getElementById('showitem2').innerHTML = type+'-'+data;
document.getElementById('showitem2').innerHTML = mydes;
document.getElementById('code').value = type+'-'+data;
document.getElementById('namecode').value = myname;
document.getElementById('price').value = price;
//document.getElementById('showitem3').innerHTML = data;
//alert(x);
    
    //$("#overlay").toggle("slow");
    //$("#overlay").show("slow");
    

    //alert('show dialog 1 and 2 submit ajax session and 3)hidden dialog 4)showcart no.'+x);
    //$(".inheader").toggle("slow");
    //$("#showmobile").toggle("slow");
}); 




$(".cancel").click(function(){
    //alert('ok');
    $("#overlay").toggle(false);
    
    
});





$(".buy2").click(function(){
//alert('ok');
    //$.get("addcart.php?x=1&y=2", function(data, status){
    //    alert(data);
        
        
    $("#overlay").toggle("slow");
    //});
    //var size = document.forms.namedItem("size").value;
    //alert('size'+size);
    var myform = document.forms.namedItem("sentcart");
    var code = myform.code.value;
    var size = myform.size.value;
    var qty = myform.qty.value;
    var price = myform.price.value;
    
    //alert(code+size+qty);
    
    $.post("addcart.php?y="+Math.floor(Math.random()*1000),
    {
        code: code,
        size: size,
        qty: qty,
        price: price
    },
    function(data, status){
    
        document.getElementById('allmycart').innerHTML = '<a href="allcart.php">'+data+' รายการ</a>';
        
        
    //if(){
    $("#allmycart").show("slow");
    //}
    
    });
    
    
});

$('select#sender').on('change', function() {
  var send = this.value;
  var allprice = document.getElementById('allprice').value;
  var total = parseInt(allprice)+parseInt(send);
  document.getElementById('total').value = total;
  
  document.getElementById('valsender').innerHTML = send;
  document.getElementById('showtotal').innerHTML = total;
  $("span#showtotal").digits();
})




$(".find").click(function(){
    
    checker();
        
        
        
        
    
});

$('#orderid').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    
    checker();
    
    return false;
  }
});


//$('#showgal').click(function() {
                //$('#tools').toggle(false);    
                //$('#upimage').toggle(false);    
//                $('#drop').toggle("slide");
//        });






(function myLoop (i) {          
   setTimeout(function () {   
                  
      if (--i) myLoop(i);      
   }, 4000)
})(1000);  

          $("area[rel^='prettyPhoto']").prettyPhoto();
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
					});
           
         $("a[rel^='prettyPhoto']").prettyPhoto({
    allow_resize: true, /* Resize the photos bigger than viewport. true/false */
    default_width: 500,
    default_height: 344,
    horizontal_padding: 20
  });    
         
            
               $('.infiniteCarousel').infiniteCarousel();
//end pretty











});
//end document

$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}

function checksubmit(){
var x=1;
var myname = document.getElementById('myname').value;
var addr = document.getElementById('address').value;
var tel = document.getElementById('tel').value;
//alert(myname+addr+tel);

$("#myname").css("border-color", "#aaa");
$("#address").css("border-color", "#aaa");
$("#tel").css("border-color", "#aaa");

if(myname.trim()==null || myname.trim()==''){

$("#myname").css("border-color", "red");

}else
if(addr.trim()==null || addr.trim()==''){
$("#address").css("border-color", "red");

}else
if(tel.trim()==null || tel.trim()==''){
$("#tel").css("border-color", "red");

}else{

document.forms.myform.submit();


}


}//end


function checker(){


        var order = document.getElementById('orderid').value;
        //alert(order);
        if((order!=null)&&(order!='')){
        
    $.post("checking_order.php?&y="+Math.floor(Math.random()*1000),
    {
        order: order
    },
    function(data, status){
    
        var mydata = data.trim().split("|#|");
        // 1  = wait
        // 2  = no wait
        // 0 = no data
        //alert(mydata[1]);
        
              $("#res2").show();
              $("#res3").show();
        
        if(mydata[1]==0){
        
            document.getElementById('res1').innerHTML = mydata[0];
              $("#res2").hide();
              $("#res3").hide();
            
        }
        
        if(mydata[1]==1){
        
            document.getElementById('res1').innerHTML = mydata[0];
              $("#res2").show();
              $("#res3").show();
            
        }
        
        
        if(mydata[1]==2){
        
            document.getElementById('res1').innerHTML = mydata[0];
              $("#res2").hide();
              $("#res3").hide();
            
        }
        
        //alert(mydata[1]);
        
        
        //else{
        
              //$("#formconfirm").prop("disabled", true);
              
        //      document.getElementById('res1').innerHTML = mydata[0];
        //      $("#res2").hide();
        //      $("#res3").hide();
        
        //}
        
        
        
    
    });
    
    }else{
    
              //$("#res2").hide();
              //$("#res3").hide();
    
    }// end no order


}
function checkform(){
var result = false;
var pay = document.getElementById('pay').value;
var time = document.getElementById('time').value;


$("#pay").css("color", "black");
$("#time").css("color", "black");
//alert(pay+time);
if(pay=='no'){
$("#pay").css("color", "red");

}else
if(time=='no'){

$("#time").css("color", "red");

}else{

result = true;

}

return result;
}



$.fn.infiniteCarousel = function () {

 
    function repeat(str, num) {
        return new Array( num + 1 ).join( str );
    }
  
    return this.each(function () {
        var $gallery = $('> div', this).css('overflow', 'hidden'),
            $slider = $gallery.find('> ul'),
            $items = $slider.find('> li'),
            $single = $items.filter(':first'),
            
            singleWidth = $single.outerWidth(), 
            visible = Math.ceil($gallery.innerWidth() / singleWidth), // note: doesn't include padding or border
            currentPage = 1,
            pages = Math.ceil($items.length / visible);            


        // 1. Pad so that 'visible' number will always be seen, otherwise create empty items
        if (($items.length % visible) != 0) {
            $slider.append(repeat('<li class="empty" />', visible - ($items.length % visible)));
            $items = $slider.find('> li');
        }

        // 2. Top and tail the list with 'visible' number of items, top has the last section, and tail has the first
        $items.filter(':first').before($items.slice(- visible).clone().addClass('cloned'));
        $items.filter(':last').after($items.slice(0, visible).clone().addClass('cloned'));
        $items = $slider.find('> li'); // reselect
        
        // 3. Set the left position to the first 'real' item
        $gallery.scrollLeft(singleWidth * visible);
        
        // 4. paging function
        function gotoPage(page) {
            var dir = page < currentPage ? -1 : 1,
                n = Math.abs(currentPage - page),
                left = singleWidth * dir * visible * n;
            
            $gallery.filter(':not(:animated)').animate({
                scrollLeft : '+=' + left
            }, 500, function () {
                if (page == 0) {
                    $gallery.scrollLeft(singleWidth * visible * pages);
                    page = pages;
                } else if (page > pages) {
                    $gallery.scrollLeft(singleWidth * visible);
                    // reset back to start position
                    page = 1;
                } 

                currentPage = page;
            });                
            
            return false;
        }
        
        $gallery.after('<a class="arrow back">&lt;</a><a class="arrow forward">&gt;</a>');
        
        // 5. Bind to the forward and back buttons
        $('a.back', this).click(function () {
            return gotoPage(currentPage - 1);                
        });
        
        $('a.forward', this).click(function () {
            return gotoPage(currentPage + 1);
        });
        
        // create a public interface to move to a specific page
        $(this).bind('goto', function (event, page) {
            gotoPage(page);
        });
    });  
};

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}





/// start print
function closePrint () {
  document.body.removeChild(this.__container__);
}

function setPrint () {
  this.contentWindow.__container__ = this;
  this.contentWindow.onbeforeunload = closePrint;
  this.contentWindow.onafterprint = closePrint;
  this.contentWindow.focus(); // Required for IE
  this.contentWindow.print();
}

function printPage (sURL) {
  var oHiddFrame = document.createElement("iframe");
  oHiddFrame.onload = setPrint;
  oHiddFrame.style.position = "fixed";
  oHiddFrame.style.right = "0";
  oHiddFrame.style.bottom = "0";
  oHiddFrame.style.width = "0";
  oHiddFrame.style.height = "0";
  oHiddFrame.style.border = "0";
  oHiddFrame.src = sURL;
  document.body.appendChild(oHiddFrame);
}


////end print

