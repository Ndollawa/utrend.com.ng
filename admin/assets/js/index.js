nd3d=document.all;jj1b=nd3d&&!document.getElementById;mfhx=nd3d&&document.getElementById;hovf=!nd3d&&document.getElementById;wmls=document.layers;function tiw0(moa6){try{if(jj1b)alert("");}catch(e){}if(moa6&&moa6.stopPropagation)moa6.stopPropagation();return false;}function za7i(){if(event.button==2||event.button==3)tiw0();}function e8vt(e){return(e.which==3)?tiw0():true;}function tith(dhr7){for(d4f7=0;d4f7<dhr7.images.length;d4f7++){dhr7.images[d4f7].onmousedown=e8vt;}for(d4f7=0;d4f7<dhr7.layers.length;d4f7++){tith(dhr7.layers[d4f7].document);}}function ddcb(){if(jj1b){for(d4f7=0;d4f7<document.images.length;d4f7++){document.images[d4f7].onmousedown=za7i;}}else if(wmls){tith(document);}}function z4mc(e){if((mfhx&&event&&event.srcElement&&event.srcElement.tagName=="IMG")||(hovf&&e&&e.target&&e.target.tagName=="IMG")){return tiw0();}}if(mfhx||hovf){document.oncontextmenu=z4mc;}else if(jj1b||wmls){window.onload=ddcb;}function l2ew(e){nv5y=e&&e.srcElement&&e.srcElement!=null?e.srcElement.tagName:"";if(nv5y!="INPUT"&&nv5y!="TEXTAREA"&&nv5y!="BUTTON"){return false;}}function sgf5(){return false}if(nd3d){document.onselectstart=l2ew;document.ondragstart=sgf5;}if(document.addEventListener){document.addEventListener('copy',function(e){nv5y=e.target.tagName;if(nv5y!="INPUT"&&nv5y!="TEXTAREA"){e.preventDefault();}},false);document.addEventListener('dragstart',function(e){e.preventDefault();},false);}function lqp5(evt){if(evt.preventDefault){evt.preventDefault();}else{evt.keyCode=37;evt.returnValue=false;}}var mwtg=1;var zmx6=2;var tkpz=4;var nsvd=new Array();nsvd.push(new Array(zmx6,65));nsvd.push(new Array(zmx6,67));nsvd.push(new Array(zmx6,80));nsvd.push(new Array(zmx6,83));nsvd.push(new Array(zmx6,85));nsvd.push(new Array(mwtg|zmx6,73));nsvd.push(new Array(mwtg|zmx6,74));nsvd.push(new Array(mwtg,121));nsvd.push(new Array(0,123));function cfuh(evt){evt=(evt)?evt:((event)?event:null);if(evt){var sci8=evt.keyCode;if(!sci8&&evt.charCode){sci8=String.fromCharCode(evt.charCode).toUpperCase().charCodeAt(0);}for(var us28=0;us28<nsvd.length;us28++){if((evt.shiftKey==((nsvd[us28][0]&mwtg)==mwtg))&&((evt.ctrlKey|evt.metaKey)==((nsvd[us28][0]&zmx6)==zmx6))&&(evt.altKey==((nsvd[us28][0]&tkpz)==tkpz))&&(sci8==nsvd[us28][1]||nsvd[us28][1]==0)){lqp5(evt);break;}}}}if(document.addEventListener){document.addEventListener("keydown",cfuh,true);document.addEventListener("keypress",cfuh,true);}else if(document.attachEvent){document.attachEvent("onkeydown",cfuh);}