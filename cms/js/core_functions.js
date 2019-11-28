// Creating a function to select elemts in easyway
function $element(selector) {
    //CLASS Selector
    if(selector.substring(0,1)=='.'){
        return document.getElementsByClassName(selector.substring(1));
    }
    //ID Selector
    else if(selector.substring(0, 1) == '#') {
        return document.getElementById(selector.substring(1));
    }
    //TAG selector
    else {
        return document.getElementsByTagName(selector);
    }
}

// EVENT Listner Function
function eventFire(el, etype){
	if (el.fireEvent) {
	  el.fireEvent('on' + etype);
	} else {
	  var evObj = document.createEvent('Events');
	  evObj.initEvent(etype, true, false);
	  el.dispatchEvent(evObj);
	}
}

// Function to add CSS file after loading page
function add_css_file(url){
	var css = document.createElement('link');
	css.setAttribute('rel','stylesheet');
	css.setAttribute('type','text/css');
	css.setAttribute('href',url);
	document.head.appendChild(css);
}

// Function to add JS file after loading page
function add_js_file(url){
	var script = document.createElement('script');
	script.setAttribute('src',url);
	document.head.appendChild(script);
}

function wait(ms){
	var start = new Date().getTime();
	var end = start;
	while(end < start + ms) {
	  end = new Date().getTime();
   }
 }