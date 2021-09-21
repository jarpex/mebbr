<?php
remove_filter( 'the_title', 'wptexturize' );
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_excerpt', 'wptexturize' );
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="twitter:creator" content="@DefaultJarpex">
    <link rel="canonical" href="<?php get_page_link(); ?>">
    <link rel="alternate" type="application/rss+xml" title="MEBBR » Feed" href="//mebbr.ru/feed/">
    <link rel="next" href="//mebbr.ru/">
    <link rel="preconnect" href="//static.mebbr.ru">
    <link rel="icon" href="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%2016%2016'%3E%3Ctext%20x='0'%20y='14'%3E🔥%3C/text%3E%3C/svg%3E" type="image/svg+xml" />
    <title><?php the_title();?></title>
    <link rel="preload" href="//592422.selcdn.ru/static/css/mebbr.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="//static.mebbr.ru/css/mebbr.css"></noscript>
    <style>
        @media (prefers-color-scheme: dark) {
            body{
                --text: rgba(232, 230, 227, 0.999);
                --bg: rgba(14, 15, 15, 0.999);
                --border: #353535;
                --hover: #454545;
                --box: rgb(33, 36, 37);
                --selection: rgba(53, 59, 72, 0.99);
                --codeselection: rgba(254, 235, 239, 0.99);
            }
        }
        @media screen and (prefers-color-scheme: light) {
            body{
                --text: rgba(18, 18, 18, 0.999);
                --bg: rgba(255, 255, 255, 0.999);
                --border: #e9e9e9;
                --hover: #ccc;
                --box: #edeef0;
                --selection: rgba(254, 235, 239, 0.99);
                --codeselection:  rgba(53, 59, 72, 0.99);
            }
        }
    </style>
    <style> 
       /* 
        body {
            color: var(--text);
            background-color: var(--bg);
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            text-rendering: optimizelegibility;
            margin: 0;
            text-align: justify;
            font-size: 21px;
        }
        header, #menu_combo, footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #logo {
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            text-decoration: none;
            color: var(--text);
            font-size: 48px;
            margin: 1vw;
            line-height: 48px;
        }
        .menu a {
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            text-decoration: none;
            color: var(--text);
        }
        #logo:hover, .menu a:hover {
            -webkit-text-decoration-skip: ink;
            text-decoration-skip: ink;
            text-decoration: underline;
        }
        .search{
            position: relative;
        }
        .searchbox{
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            user-select: auto;
            background-color: var(--box);
            border-radius: 8px;
            margin: 0;
            border: 0;
            color: var(--text);
            display: block;
            font-size: 14px;
            line-height: 1.5;
            min-height: 40px;
            outline: 0;
            padding: 0 29px 0 14px;
            min-width: 30vw;
            max-width: 50vw;
        }
        .searchbox:focus {
            outline: none;
            -webkit-box-shadow: none;
                    box-shadow: none;
            border-color: #a3c4e2;
        }
        .search_icon {
            font-family: "mebbr20";
            color: var(--text);
            opacity: .7;
            font-size: 15px;
            right: 7px;
            line-height: 40px;
            position: absolute;
            top: 0;
            border-style: none;
            background-color: transparent;
        }
        #main {
            width: 90%;
            max-width: 720px;
			margin: 0 auto;
        }
        #main h1,h2,h3,h4,h5,h6{
            font-family: 'PT Serif', serif;
            font-weight: 400;
            text-align: left;
        }
        #main h1{
            font-size: 48px;
        }
        #main h2{
            font-size: 28px;
            margin: 2em 0 -1em 0;
        }
        #main h3{
            font-size: 25px;
        }
        #main p{
            line-height: 32px;
            margin-top: 2em;
        }
        #main a:not(.dark-theme) {
            color: var(--text);
        }
        #main pre{
            margin: 1.5em 0 .5em 0;
            line-height: 28px;
        }
        #main pre code{
            text-align: left;
        }
        #main .wp-block-embed{
            margin: 2em 0 0 0;
        }
        #main .wp-video-shortcode{
            width: 100%;
            height: auto;
        }
        #main .wp-video{
            width: 100% !important;
        }
        .mebbr-image{
            margin: 30px 0;
            text-align: center;
        }
        article img{
            max-width: 100%;
            height: auto;
        }
        #main .lyte-wrapper, .wp-block-embed-youtube{
            margin: 0 !important;
        }
        #main .wp-block-embed-youtube{
            padding-top:2.5em;
        }
        #main figcaption{
            text-align: center;
            font-size: 17px;
            margin-top: 10px;
		}
		#main .overflow{
			overflow-x: scroll;
		}
        #main .wp-block-table{
            border-collapse: collapse;
            width: 100%;
            white-space: nowrap;
            text-align: center;
        }
        #main .wp-block-table td, #main .wp-block-table th{
            border: 1px solid var(--border);
            padding: 8px;
        }
        #main .wp-block-table tr:nth-child(even){background-color: var(--box);}
        #main .wp-block-table tr:hover {background-color: var(--hover);}
        #main .wp-block-table th{
            padding-top: 12px;
            padding-bottom: 12px;
            font-weight: normal;
            background-color: var(--selection);
        }
        #main .wp-block-quote {
            margin: 3em 0 0 2em;
        }
        #main .wp-block-quote p{
            border-left: solid var(--text) 5px;
            padding-left: 35px;
        }
        body:not(.dark-theme) ::selection, #main a:not(.spotlight){
            background: var(--selection);
        }
        .dark-theme ::selection, .dark-theme #main a:not(.spotlight){
            background:  var(--selection);
            color: var(--text);
        }
        .hljs::selection, .hljs span::selection{
            background: var(--codeselection) !important;
            color: var(--bg);
        }
        #gotop{
            position: fixed;
            right: 3vw;
            bottom: 3vw;                  
        }
        #gotop{
            color: var(--text);
            font-family: "mebbr20";
            text-decoration: none;
            cursor: pointer;
            border-style: none;          
            font-size: 1.5em;
            opacity: .3;
            background-color: transparent;
            outline: none;     
        }
        #gotop:hover, .search_icon:hover{
            opacity: 1;  
        }
        #gotop,.search_icon{
            transition: opacity 0.5s ease-in-out 0s;
        }
        /*Запрет на выделения*/
        #gotop, #menu_combo, #footer_combo, .social_icons{
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;            
        }
        /*Фикс выдеделения при нажатии*/
        #gotop:hover {
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0) !important; 
            -webkit-focus-ring-color: rgba(255, 255, 255, 0) !important; 
            outline: none !important;
        }
        /*lists*/
        #main li a{
            background: none !important;
        }
        #main ol{
            margin: 0 0 0 -2em;
            line-height: 32px;
            list-style-type: upper-roman;
        }
        /*footer*/
        footer {
            flex-direction: column;
            max-width: 720px;
            margin: 4em auto 0 auto;
            align-items: start;
        }
        footer a{
            color: var(--text);
        }
        #footer_combo a{
            margin-right: 1em;
        }
        .social_icons{            
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: "mebbr20";
            margin: 2em 0 5em 0;
        }
        .social_icons a{
            text-decoration: none;
        }
        
        @media print {
            header, footer, #gotop{
                display:none;
            }
        }
    </style>
</head>
<body>
    <?php wp_deregister_script('jquery'); wp_head(); ?>
	<header>
        <div id="menu_combo">
            <a id="logo" href="//mebbr.ru">MEBBR</a>
            <div class="menu">
                <a href="//mebbr.ru/software/"> 💾&nbsp;Software</a>
                <a href="//mebbr.ru/hardware/"> 🔩&nbsp;Hardware</a>
                <a href="//mebbr.ru/internet/"> 🌍&nbsp;Internet</a>
                <a href="//mebbr.ru/lifehacks/"> 💡&nbsp;Lifehacks</a>
            </div>
        </div>
        <form class="search_form" role="search" method="get" id="searchform" action="//mebbr.ru" autocomplete="off">
            <div class="search">
                <input name="s" class="searchbox" placeholder="Search" type="text" maxlength="100"/>
                <input type="submit" id="searchsubmit" class="search_icon" value="🔍">
            </div>
        </form>
    </header>
    <article id="main" class="hyphenate">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <?php endwhile; else : ?>
            <h2>There's nothing 2 see here, really.</h2>
        <?php endif; ?>
    </article>
    <footer>
        <div id="footer_combo">
            <a href="//mebbr.ru/terms">Terms of use</a>
            <a href="//mebbr.ru/privacy">Privacy</a>
        </div>
        <div class="social_icons">
            <a href="//twitter.com/RU_MEBBR/"></a>
            <a href="//vk.com/mebbr"></a>
            <a href="//www.youtube.com/playlist?list=PLJ52LZ9E-uowOubcIPh3yDGKKcryQ5-Mm"></a>
            <a href="//t.me/RU_MEBBR/"></a>
            <a href="//mebbr.ru/feed/"></a>
        </div>
    </footer>
    <button id="gotop" onclick="window.scroll({ top: 0, left: 0, behavior: 'smooth' })"></button>
    <?php wp_footer()?>
</body>
<script async type="text/javascript" src="//static.mebbr.ru/js/mebbr_hyphen.js"></script>
<script async type="text/javascript" src="//static.mebbr.ru/js/mebbr_highlight.js"></script>
<script async type="text/javascript" src="//592422.selcdn.ru/static/js/spotlight.bundle.js"></script>
<script async type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(43402149, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/43402149" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
</html>