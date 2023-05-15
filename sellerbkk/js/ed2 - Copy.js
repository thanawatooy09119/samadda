var textarea;

var content;

document.write("<link href=\"editor/styles.css\" rel=\"stylesheet\" type=\"text/css\">");





function edToolbar(obj) {

   

	document.write("<img class=\"button\" src=\"editor/images/bold.gif\" name=\"btnBold\" title=\"Bold\" onClick=\"doAddTags('<b>','</b>','" + obj + "')\">");

    document.write("<img class=\"button\" src=\"editor/images/italic.gif\" name=\"btnItalic\" title=\"Italic\" onClick=\"doAddTags('<i>','</i>','" + obj + "')\">");

	document.write("<img class=\"button\" src=\"editor/images/underline.gif\" name=\"btnUnderline\" title=\"Underline\" onClick=\"doAddTags('<u>','</u>','" + obj + "')\">");

	document.write("<img class=\"button\" src=\"editor/images/link.gif\" name=\"btnLink\" title=\"Insert Link\" onClick=\"doURL('" + obj + "')\">");

	document.write("<img class=\"button\" src=\"editor/images/image.gif\" name=\"btnPicture\" title=\"Insert Picture\" onClick=\"doImage('" + obj + "')\">");

	document.write("<img class=\"button\" src=\"editor/images/ordered.gif\" name=\"btnList\" title=\"Ordered List\" onClick=\"doList('<li>','</li>','" + obj + "')\">");

	document.write("<img class=\"button\" src=\"editor/images/unordered.gif\" name=\"btnList\" title=\"Unordered List\" onClick=\"doList('<ul>','</ul>','" + obj + "')\">");

	document.write("<img class=\"button\" src=\"editor/images/quote.gif\" name=\"btnQuote\" title=\"Quote\" onClick=\"doAddTags('<blockquote>','</blockquote>','" + obj + "')\">"); 

  document.write("<img class=\"button\" src=\"editor/images/div.gif\" name=\"btnQuote\" title=\"Quote\" onClick=\"doStart('" + obj + "')\">"); 

 document.write("<img class=\"button\" src=\"editor/images/h1.gif\" name=\"btnQuote\" title=\"H1\" onClick=\"doAddTags('<h1>','</h1>','" + obj + "')\">"); 

 document.write("<img class=\"button\" src=\"editor/images/h2.gif\" name=\"btnQuote\" title=\"H2\" onClick=\"doAddTags('<h2>','</h2>','" + obj + "')\">"); 

	 

	 

	  document.write("<br>");



	//document.write("<textarea id=\""+ obj +"\" name = \"" + obj + "\" cols=\"" + width + "\" rows=\"" + height + "\"></textarea>");

	

	

			}

		



		



function doImage(obj)

{

textarea = document.getElementById(obj);

var url = prompt('Enter the Image URL:','http://');



var scrollTop = textarea.scrollTop;

var scrollLeft = textarea.scrollLeft;



if (url != '' && url != null) {



	if (document.selection) 

			{

				textarea.focus();

				var sel = document.selection.createRange();

				sel.text = '<img src="' + url + '" >';

			}

   else 

    {

		var len = textarea.value.length;

	    var start = textarea.selectionStart;

		var end = textarea.selectionEnd;

		

        var sel = textarea.value.substring(start, end);

	    //alert(sel);

		var rep = '<img src="' + url + '" alt="" />';

        textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);

		textarea.scrollTop = scrollTop;

		textarea.scrollLeft = scrollLeft;

	}

 }

}



//### Make DIV START



function doStart(obj)

{

var sel;

textarea = document.getElementById(obj);

var url = 'start';

var scrollTop = textarea.scrollTop;

var scrollLeft = textarea.scrollLeft;



if (url != '' && url != null) {



	if (document.selection) 

			{

				textarea.focus();

				var sel = document.selection.createRange();

				

				if(sel.text==""){

					sel.text = '<div id="' + url + '">' + url + '</div>';

					} else {

					sel.text = '<div id="' + url + '">' + sel.text + '</div>';

					}

				//alert(sel.text);

				

			}

   else 

    {

		var len = textarea.value.length;

	    var start = textarea.selectionStart;

		var end = textarea.selectionEnd;

		

		var sel = textarea.value.substring(start, end);

		

		if(sel==""){

		sel=url; 

		} else

		{

        var sel = textarea.value.substring(start, end);

		}

	    //alert(sel);

		

		

		var rep = '<div id="' + url + '">' + sel + '</div>';;

        textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);

		textarea.scrollTop = scrollTop;

		textarea.scrollLeft = scrollLeft;

	}

 }

}













//###











function doURL(obj)

{

var sel;

textarea = document.getElementById(obj);

var url = prompt('Enter the URL:','http://');

var scrollTop = textarea.scrollTop;

var scrollLeft = textarea.scrollLeft;



if (url != '' && url != null) {



	if (document.selection) 

			{

				textarea.focus();

				var sel = document.selection.createRange();

				

				if(sel.text==""){

					sel.text = '<a href="' + url + '">' + url + '</a>';

					} else {

					sel.text = '<a href="' + url + '">' + sel.text + '</a>';

					}

				//alert(sel.text);

				

			}

   else 

    {

		var len = textarea.value.length;

	    var start = textarea.selectionStart;

		var end = textarea.selectionEnd;

		

		var sel = textarea.value.substring(start, end);

		

		if(sel==""){

		sel=url; 

		} else

		{

        var sel = textarea.value.substring(start, end);

		}

	    //alert(sel);

		

		

		var rep = '<a href="' + url + '">' + sel + '</a>';;

        textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);

		textarea.scrollTop = scrollTop;

		textarea.scrollLeft = scrollLeft;

	}

 }

}



function doAddTags(tag1,tag2,obj)

{

textarea = document.getElementById(obj);

	// Code for IE

		if (document.selection) 

			{

				textarea.focus();

				var sel = document.selection.createRange();

				//alert(sel.text);

				sel.text = tag1 + sel.text + tag2;

			}

   else 

    {  // Code for Mozilla Firefox

		var len = textarea.value.length;

	    var start = textarea.selectionStart;

		var end = textarea.selectionEnd;

		

		var scrollTop = textarea.scrollTop;

		var scrollLeft = textarea.scrollLeft;

		

        var sel = textarea.value.substring(start, end);

	    //alert(sel);

		var rep = tag1 + sel + tag2;

        textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);

		

		textarea.scrollTop = scrollTop;

		textarea.scrollLeft = scrollLeft;

	}

}



function doList(tag1,tag2,obj){

textarea = document.getElementById(obj);



// Code for IE

		if (document.selection) 

			{

				textarea.focus();

				var sel = document.selection.createRange();

				var list = sel.text.split('\n');

		

				for(i=0;i<list.length;i++) 

				{

				list[i] = '<li>' + list[i] + '</li>';

				}

				//alert(list.join("\n"));

				sel.text = tag1 + '\n' + list.join("\n") + '\n' + tag2;

				

			} else

			// Code for Firefox

			{



		var len = textarea.value.length;

	    var start = textarea.selectionStart;

		var end = textarea.selectionEnd;

		var i;

		

		var scrollTop = textarea.scrollTop;

		var scrollLeft = textarea.scrollLeft;



		

        var sel = textarea.value.substring(start, end);

	    //alert(sel);

		

		var list = sel.split('\n');

		

		for(i=0;i<list.length;i++) 

		{

		list[i] = '<li>' + list[i] + '</li>';

		}

		//alert(list.join("<br>"));

        

		

		var rep = tag1 + '\n' + list.join("\n") + '\n' +tag2;

		textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);

		

		textarea.scrollTop = scrollTop;

		textarea.scrollLeft = scrollLeft;

 }

}



function mrpandaman(txt,curent){

// get the selection range (or cursor     position)

var range = window.getSelection().getRangeAt(0); 

// create a span

var newElement = document.createElement(txt);

newElement.id = 'start';

if(curent==''){

newElement.innerHTML = '108like.com';

}else{



newElement.innerHTML = curent;

}

if(range.startContainer.parentNode.id=='editor'||range.startContainer.parentNode.id=='start') {

   // delete whatever is on the range

   range.deleteContents();

   // place your span

   range.insertNode(newElement);

}



}



function addDiv(){

// get the selection range (or cursor     position)

var range = window.getSelection().getRangeAt(0); 

// create a span

var newElement = document.createElement('div');

newElement.id = 'start';

newElement.innerHTML = '108like.com ��������Ңͧ�������س����� ��ǹ�������ǹ���س�е�ͧ�����¶֧�����Ңͧ�������ͧ�س����ʹ���ͧ�ѹ�Ѻ��Ǣ�ͧ͢����ͧ';

if(range.startContainer.parentNode.id=='editor') {

   // delete whatever is on the range

   range.deleteContents();

   // place your span

   range.insertNode(newElement);

}

}





function saveSelection() {

    if (window.getSelection) {

        sel = window.getSelection();

        if (sel.getRangeAt && sel.rangeCount) {

            var ranges = [];

            for (var i = 0, len = sel.rangeCount; i < len; ++i) {

                ranges.push(sel.getRangeAt(i));

            }

            return ranges;

        }

    } else if (document.selection && document.selection.createRange) {

        return document.selection.createRange();

    }

    return null;

}



function restoreSelection(savedSel) {

    if (savedSel) {

        if (window.getSelection) {

            sel = window.getSelection();

            sel.removeAllRanges();

            for (var i = 0, len = savedSel.length; i < len; ++i) {

                sel.addRange(savedSel[i]);

            }

        } else if (document.selection && savedSel.select) {

            savedSel.select();

        }

    }

}



function createLink(url) {

    // There's actually no need to save and restore the selection here. This is just an example.

    var savedSel = saveSelection();

    

    restoreSelection(savedSel);

    document.execCommand("CreateLink", false, url);

}

///end



function iVideo(){

    var urlPrompt = prompt("Enter Youtube Url:", "https://www.youtube.com/watch?v=GEvoXuFKSA0");

    var urlReplace = urlPrompt.replace("watch?v=", "embed/");

    var embed = '<iframe title="YouTube video player" src="'+urlReplace+'" allowfullscreen="true" frameborder="0" >';

    if(embed != null){

    document.execCommand("Inserthtml", false, embed);

    }

}//end video



function iMap(){

    var urlPrompt = prompt("Enter Youtube Url:", "http://");

    //var urlReplace = urlPrompt.replace("watch?v=", "embed/");

    var embed = urlPrompt;

  

    if(embed != null){

    document.execCommand("Inserthtml", false, embed);

    }

}//end iMap



function copyContent () {



var subm = false;

    document.getElementById("hidd").value =  

    document.getElementById("editor").innerHTML;

    var str = document.getElementById("artimage").value;

    var pieces = str.split(/[\s\/]+/);

    document.m2.image.value = pieces[pieces.length-1]; 

    

    //alert(document.m2.image.value);

    

    if((document.m2.title.value=='')||(document.m2.english.value=='')||(document.m2.description.value=='')||(document.m2.hidd.value=='')||(document.m2.key1.value=='')||(document.m2.heading1.value=='')||(document.m2.image.value=='')){

  alert('Please check some field that is empty.');

	subm = false;

}else{



var agree=confirm("Are you sure you wish to continue?");

if(agree){

	subm = true;;

}else{

	subm = false;

	}

}//end if value null  

    

   return subm; 

}//end copy content



//start blur

 function inputFocus(i){

    if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }

}

function inputBlur(i){

    if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }

}//end blur