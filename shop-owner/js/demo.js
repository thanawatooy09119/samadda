
$(document).ready(function() {


// start save rang
var zss_editor = {};

// The current selection
zss_editor.currentSelection;

zss_editor.backuprange = function(){
    var selection = window.getSelection();
    var range = selection.getRangeAt(0);
    zss_editor.currentSelection = {"startContainer": range.startContainer, "startOffset":range.startOffset,"endContainer":range.endContainer, "endOffset":range.endOffset};

}

zss_editor.restorerange = function(){
    var selection = window.getSelection();
    selection.removeAllRanges();
    var range = document.createRange();
    range.setStart(zss_editor.currentSelection.startContainer, zss_editor.currentSelection.startOffset);
    range.setEnd(zss_editor.currentSelection.endContainer, zss_editor.currentSelection.endOffset);
    selection.addRange(range);
    console.log(range);
}

zss_editor.setTextColor = function(color) {
    zss_editor.restorerange();
    document.execCommand("styleWithCSS", null, true);
    document.execCommand('foreColor', false, color);
    document.execCommand("styleWithCSS", null, false);
}

zss_editor.setBackgroundColor = function(color) {
    zss_editor.restorerange();
    document.execCommand("styleWithCSS", null, true);
    document.execCommand('hiliteColor', false, color);
    document.execCommand("styleWithCSS", null, false);
}






$( "#setimage2" ).click(function() {
//$(".animateBoth").bind("click", function(e){
    //$(".c1:not(:first)").animateAuto("height", 1000, alertMe); 
//});
var theme = document.getElementById('theme').value;
	$(".loader").fadeIn("slow");
	$(".loader").fadeOut("slow");	
$('#desk').remove();
$('#tabl').remove();
$('#mobi').remove();
 $(this).stop(true).fadeTo(200,1);
	$('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', './css/desktop.css.php?theme='+theme).attr('id', 'desk') );
//document.getElementById("basic_content").InnerHTML = 'ok';
//$("basiccontent").text("ok");
basiccontent(theme);
        //document.getElementById('basiccontent').innerHTML = 'okokokokok';



      $('#ontheme').toggle('slow');
$('#mymenu').show('slow');
$('#myall').show('slow');
$( this ).fadeTo( "slow", 1 );
$( '#tablet' ).stop(true).fadeTo( "slow", 0.5 );
$( '#mobile' ).stop(true).fadeTo( "slow", 0.5 );
});



//$(".hidmenu").click(function() {
          
//            $('#mymobile').show('slow');
            //$('#mymenu').remove().fadeTo( "slow", 0.5 );
        
//  return false;
//});

//document.getElementById("editor").addEventListener(".c1", function() {
//    alert("input event fired");
//}, false);

    //$( "#mycontent .c1" ).mouseup(function(){
    //      $( this ).attr("contentEditable",true);
    //});
   
//function myremove(){
//alert('ok');
//$(this).closest("div").remove();
//} 

//    $( ".c2 .rm" ).mouseup(function(){
            //alert('ok');
//$(this).closest("div").remove();
          //$( this ).attr("contentEditable",true);
//    });
   
   
//$(".removeme").click(function(){
//alert('ok');
    //$(this).parent().parent().remove();
//});
   
   
   
   
   
                
  $(".btn-bold").click(function(){
          document.execCommand('Bold');
  });
  $(".btn-italic").click(function(){
          document.execCommand('italic');
  });
  $(".btn-underline").click(function(){
          document.execCommand('underline');
  });
  
  $(".btn-link").click(function(){
        
         createLink(url = prompt('Enter the URL:','http://www.softexpedient.com'));
  });
  $(".btn-unlink").click(function(){
        
         
          document.execCommand('unlink');
  });
    $(".btn-youtube").click(function(){        
         
      iVideo();
  });
      $(".btn-map").click(function(){        
         
      iMap();
  });
  
    $(".btn-code").click(function(){        
         var code = '&nbsp;<div class="lined" name="lined" rows="10" cols="86" wrap="hard" onkeyup="alert(\'ok\');">Write here</div>&nbsp;';
      document.execCommand("Inserthtml", false, code);
  });
  
      $(".btn-paragraph").click(function(){        
         var code = '&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;';
      document.execCommand("Inserthtml", false, code);
  });
  
  $(".btn-h2").click(function(){
        //var text =  $.trim(getSelected().toString());
        //alert('asdf'+text);
            //var para = document.createElement("H1");
            //var t = document.createTextNode("This is a paragraph.");
            //para.appendChild(t);
            //document.getElementById("myDIV").appendChild(para);
    var savedSel = $.trim(saveSelection());
    var embed;
    if((savedSel==null)||(savedSel=='')){
        embed = '<h2>Soft eXpedient</h2>';  
    }else{
        embed = '<h2>'+savedSel+'</h2>';  
    }  
    if(embed != null){

    document.execCommand("Inserthtml", false, embed);

    }
          
          
           
  }); //end h2
  
  
    $(".btn-image2").click(function(){
        //var text =  $.trim(getSelected().toString());
        //alert('asdf'+text);
            //var para = document.createElement("H1");
            //var t = document.createTextNode("This is a paragraph.");
            //para.appendChild(t);
            //document.getElementById("myDIV").appendChild(para);
            
    zss_editor.backuprange();
            
    var savedSel = $.trim(saveSelection());
    var embed;
    //if((savedSel==null)||(savedSel=='')){
    //    embed = '<img src="../img/myicon.png" />';  
    //}else{
    //    embed = '<p><img src="../img/myicon.png" /><br />'+savedSel+'</p>';  
    //}  
    
    
    //var myupload = 'click to upload';
    var myupload = document.getElementById("onprofileimage2").innerHTML;
    
    swal({   title: myupload,   text: "URL image(web address):",   type: "input",   showCancelButton: true,   closeOnConfirm: false,   animation: "slide-from-top",   inputPlaceholder: "http://www.softexpedient.com/img/myicon.png", html: true ,imageUrl: "img/myicon.png"}, function(inputValue){  
   
    // if (inputValue === false) return false;      if (inputValue === "") {     swal.showInputError("You need to write something!");     return false   }else{
    //embed = '<img src="'+inputValue+'" />';
    embed = '<img src="http://www.softexpedient.com/img/myicon.png" />';
          swal("Nice!", "You wrote: " + inputValue, "success");
    
    //}
    
    //############### Insert URL
    // embed = '<img src="../img/myicon.png" />';  
    //if(embed != null){

    //document.execCommand("Inserthtml", false, embed);

    //}
    
    //alert('ok'+embed); 
    zss_editor.restorerange();
    document.execCommand("Inserthtml", false, embed);
     });
    
    
          
          
           
  }); //end h2
 $(".btn-image").click(function(){ 
 
           
    zss_editor.backuprange();
$('#onprofileimage2').toggle('slow');
  $("#artimage").focus();
 
 }); //end h2
  
   
   
   
   
$('#profileimage2').click(function(){
 //var x = document.getElementById("sleeker2").name;
 //var informationObj = {userId : 0};
$('#clk').trigger('click'); 


// ajaxUpload(container,'ajaxupload_image_cat.php?filename=name&amp;typeName=picture&amp;maxSize=9999999999&amp;maxW=600&amp;fullPath=../img/&amp;relPath=../img/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=600','profileimage2','&lt;img src=\'img/loading.gif\' width=\'120\' border=\'0\' /&gt;','&lt;img src=\'img/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.');



  });
  $('#setimage').click(function(){
  var myimage = document.getElementById("artimage").value;
  //var myimage = $("#artimage").val;
      //myimage = $.trim(myimage);
      
      var len = myimage.length;
      //alert(len);
                
 if(len!=0){
 

      //alert(myimage);
 
    zss_editor.restorerange();
    document.execCommand("Inserthtml", false, '<img src="'+myimage+'" class="myimage" >');    
 $('#onprofileimage2').toggle('slow');
    
 }else{
 alert('no');
 }
      
      
  }); 
  
  
  $('#canimage').click(function(){
       var myimage = document.getElementById("artimage").value;
  //var myimage = $("#artimage").val;
      //myimage = $.trim(myimage);
      
      var len = myimage.length;
      //alert(len);
                
           if(len==0){
      $('#onprofileimage2').toggle('slow');
           
           }else{
                document.getElementById("profileimage2").innerHTML = '<img src="img/bangkok2.jpg" id="clk2">   Click to upload image /   Input URL image    <br><input type="text" name="artimage" id="artimage" value="" placeholder="http://www.softexpedient.com/img/myicon.png" tabindex="0" />';   
                }      
  });
  
  
  $('#canimage2').click(function(){
       //var myimage = document.getElementById("artimage").value;
       
       
      //var len = myimage.length;
      
                
           //if(len==0){
      $('#ontheme').toggle('slow');
           
           //}else{
           //     document.getElementById("profileimage2").innerHTML = '<img src="img/bangkok2.jpg" id="clk2">   Click to upload image /   Input URL image    <br><input type="text" name="artimage" id="artimage" value="" placeholder="http://www.softexpedient.com/img/myicon.png" tabindex="0" />';   
           //     }      
  });
  
  
  $('.theme').click(function(){
       //var myimage = document.getElementById("artimage").value;
       

  //$( "b" ).css( "color", "blue" );       
      //var len = myimage.length;
      
                
           //if(len==0){
      $('#ontheme').toggle('slow');
           
           //}else{
           //     document.getElementById("profileimage2").innerHTML = '<img src="img/bangkok2.jpg" id="clk2">   Click to upload image /   Input URL image    <br><input type="text" name="artimage" id="artimage" value="" placeholder="http://www.softexpedient.com/img/myicon.png" tabindex="0" />';   
           //     }      
  });
  
  
  



  $("#but_upload").click(function(){

    var fd = new FormData();

    var files = $('#file')[0].files[0];

    fd.append('file',files);

    $.ajax({
        url:'new_upload.php?rand='+Math.random(),
        type:'post',
        data:fd,
        contentType: false,
        processData: false,
        success:function(response){
            if(response != 0){
                $("#clk2").attr("src",response);
                $("#artimage").val(response);
                // $('.preview img').show();
            }else{
                alert('File not uploaded');
            }
        }
    });
}); //end but_upload

$( "#file" ).change(function() {
            $( "#but_upload" ).trigger( "click" );
    });

    
$( "#clk2" ).click(function() {
            $( "#file" ).trigger( "click" );
    });

  
  
  
  
  
    
    
    
    
    
    
    
    


 
  
  
  
  
  
  
  
   
});
// END Ready

//function runscript(object){
//var target = document.getElementsByClassName(object);
  //$(this).closest("div").remove();
  
//}



    //function removeme(){        
    //alert('xx');
    //$(this).parent().parent().remove();
    //}

function RandNumber(){
return Math.floor((Math.random() * 100000000) + 1);
}


function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}


// Remove Me
$.fn.iremove = function(ev) { 
    $(ev).parent().parent().remove();
};
function removeme(ev){
 if (confirm('Are you sure?')) {
        $.fn.iremove(ev);
    }
}

//Auto Height Width
jQuery.fn.animateAutoMobile = function(prop, speed, callback){
    var elem, height, width;
    return this.each(function(i, el){
        el = jQuery(el), elem = el.clone().css({"height":"auto","max-width":"460px"}).appendTo("body");
        height = elem.css("height"),
        width = elem.css("width"),
        elem.remove();
        
        if(prop === "height")
            el.animate({"height":height}, speed, callback);
        else if(prop === "width")
            el.animate({"width":width}, speed, callback);  
        else if(prop === "both")
            el.animate({"width":width,"height":height}, speed, callback);
    });  
}

function alertMe() {
   return true;
};



  function addFields(){
            // Number of inputs to create
            var number = document.getElementById("member").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode("Member " + (i+1)));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "text";
                input.name = "member" + i;
                container.appendChild(input);
                // Append a line break 
                container.appendChild(document.createElement("br"));
            }
        }
        
        
          function sleep(delay) {
        var start = new Date().getTime();
        while (new Date().getTime() < start + delay);
      }
      
      function settheme(id){
      
       document.getElementById('theme').value = id;
       
          $(this).addClass( "curent" );
          
    //$(this).css('border', '3px solid black');
          //$(this).closest( "div" ).css( "background-color", "red" );
      }


$(function() {
    $('.itheme').on('click', function() {
        var $partType = $(this).closest('div.itheme');
        var id = $partType.find('span.id').text();        
        var myname = $partType.find('span.name').text();   
        document.getElementById('theme').value = id;
        //alert(id+'and'+myname);
        document.getElementById('makename').innerHTML = myname;
        
        $('.itheme').removeClass('curent');
        $(this).addClass('curent');
    });
});



function basiccontent(theme){
    
    
        //$.post("reservice.php?x=123456789&fqdn="+fqdn+"&rand="+getRandomInt(),
        $.post("js/basic_content.php?x=12345678&theme="+theme,
        {
          name: "Donald Duck",
          city: "Duckburg",
          //mybill: $("#cur").val()
        },
        function(data,status){
            //alert(data + "\nStatus: " + status);
            
                //alert('reload');
            if(status=="success"){
            
                        var str = '';
                        var spt = data;
                        str = spt;
            $("#myall").html(str);
            }//end nested
        });
        
    } //end do action
    
    
    
    
    

