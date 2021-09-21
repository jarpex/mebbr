var Night = get_cookie('Night');
var style = document.documentElement.style;
var footer = document.querySelector('.footer');
var oldScrollY = 0;
var menu = document.querySelector('.wrapper');
var menu_bg = document.querySelector('.wrapper_bg');
var down = true;
var mobilescroll = document.querySelector('.mobile_scroll');
var pc_scroll = document.querySelector('.pc_scroll');
var pocket = document.querySelector('.pocket');
var comment_rect = document.getElementById('comment').getBoundingClientRect();
var comments_rect = document.getElementById('comments').getBoundingClientRect();
ChangeTheme();
pocket.setAttribute('onclick',"window.open('https://getpocket.com/edit?url="+document.URL+"%2F')");
function get_cookie (cookie_name){
    var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
    if (results){
        return (unescape(results[2]));
    }else{
        return 'false';
    }
}
function Toggle(){
    if (Night == 'true'){
      Night = 'false';
    } else {
      Night = 'true';
    }
    document.cookie = "Night=" + Night + "; expires=21600; path=/; secure";
    ChangeTheme();
}
function ChangeTheme(){
    if (Night == 'true'){
        style.setProperty('--text', '#fff');
        style.setProperty('--bg', '#151515');
        style.setProperty('--border', '#353535');
		style.setProperty('--hover', '#454545');
    }else{
        style.setProperty('--text', '#111');
        style.setProperty('--bg', '#fff');
        style.setProperty('--border', '#e9e9e9');
		style.setProperty('--hover', '#ccc');
    }
}

window.onscroll = function() {
    var scrolled = window.pageYOffset || document.documentElement.scrollTop;
    var dY = scrolled - oldScrollY;
    if (dY > 10){
        footer.className = "footer fixed-bottom";
    }else if (dY < -10){
        footer.className = "footer fixed-top";
    }
    if (scrolled > 500){
        down = false;
        pc_scroll.innerText = '';
        mobilescroll.innerText = '';
    }else{
        down = true;
        pc_scroll.innerText = '';
        mobilescroll.innerText = '';
    }
    oldScrollY = scrolled;
}

function MenuOpen(){
    menu.className = "wrapper wrapper_open";
    menu_bg.style.display = "block";
}
function MenuClose(){
    menu.className = "wrapper wrapper_close";
    menu_bg.style.display = "none";
}
function Move_To(){
    if (down){
        window.scroll({ top: comments_rect.top, left: 0, behavior: 'smooth' });
    }else{
        window.scroll({ top: 0, left: 0, behavior: 'smooth' });
    }
}
function Move_To_Comments(){
	window.scroll({ top: comment_rect.top, left: 0, behavior: 'smooth'});
}
