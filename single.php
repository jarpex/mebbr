<?php
wp_deregister_script('jquery');
wp_head();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="twitter:creator" content="@DefaultJarpex">
    <link rel="alternate" type="application/rss+xml" title="MEBBR » Feed" href="//mebbr.ru/feed/">
    <link rel="next" href="//mebbr.ru/">
    <link rel="preconnect" href="//static.mebbr.ru">
    <link rel="preconnect" href="//cdn.mebbr.ru">
    <link rel="icon" href="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%2016%2016'%3E%3Ctext%20x='0'%20y='14'%3E🔥%3C/text%3E%3C/svg%3E" type="image/svg+xml" />
    <title><?php the_title();?></title>
    <link rel="preload" href="//static.mebbr.ru/css/mebbr.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="//static.mebbr.ru/css/mebbr.css"></noscript>
    <link rel="preload" href="//static.mebbr.ru/fonts/mebbr/mebbr.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="//static.mebbr.ru/fonts/mebbr/Inconsolata.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="//static.mebbr.ru/fonts/mebbr/PTSerif.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="//static.mebbr.ru/fonts/mebbr/Mont.woff2" as="font"type="font/woff2" crossorigin>
    <link rel="dns-prefetch" href="//googletagservices.com">
    <link rel="dns-prefetch" href="//mc.yandex.ru">
    <link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
    <style>
        body {
            --text: rgba(18, 18, 18, 0.999);
            --bg: rgba(255, 255, 255, 0.999);
            --border: #e9e9e9;
            --hover: #ccc;
            --box: #edeef0;
            --selection: rgba(254, 235, 239, 0.99);
            --codeselection: rgba(53, 59, 72, 0.99);
            color: var(--text);
            background-color: var(--bg);
            font: 21px Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            text-rendering: optimizeLegibility;
            margin: 0;
            text-align: justify;
        }

        @media (prefers-color-scheme: dark) {
            body {
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
            body {
                --text: rgba(18, 18, 18, 0.999);
                --bg: rgba(255, 255, 255, 0.999);
                --border: #e9e9e9;
                --hover: #ccc;
                --box: #edeef0;
                --selection: rgba(254, 235, 239, 0.99);
                --codeselection: rgba(53, 59, 72, 0.99);
            }
        }
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
        #menu_combo,
        header {
            align-items: center;
            background: var(--box);
        }

        #menu_combo,
        footer,
        header {
            flex-direction: column;
            display: flex;
            justify-content: space-between;
        }

        #logo {
            margin: 1em 0 .5em;
            text-decoration: none;
            color: var(--text);
            font-size: 48px;
            line-height: 48px;
        }

        #menu_combo {
            font-size: 20px;
        }

        .menu a {
            text-decoration: none;
            color: var(--text);
            white-space: nowrap;
        }
        #searchform {
            padding-top: 20px;
        }

        .search {
            position: relative;
        }
        .searchbox {
            min-width: 60vw;
            background-color: var(--bg);
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
        }
        .search_icon {
            font-family: "mebbr";
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

        #main h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'PT Serif', serif;
            font-weight: 400;
            text-align: left;
        }

        #main h1 {
            font-size: 35px;
        }

        @media (min-width: 1200px) and (orientation: landscape){
            header, #menu_combo {
                flex-direction: row;
                align-items: center;
            }
            #searchform{
                padding: 0;
                margin: 0;
            }
            .searchbox{
                max-width: 50vw;
                min-width: 30vw;
                margin: 1vw;
            }
            .search_icon {
                right: 30px;
            }
            #logo{
                margin: 1vw;
            }
            #menu_combo{
                font-size: 21px;
            }
            #menu_combo .menu{
                margin: 0;
            }
            .menu a{
                margin-right: 10px;
            }
            #main h1 {
                font-size: 48px;
            }
            #main h2 {
                margin: 2em 0 -1em;
            }
            #main p {
                font-size: 21px;
                line-height: 32px;
                margin-top: 2em;
            }
        }
    </style>
</head>
<body>
	<header>
        <div id="menu_combo">
            <a id="logo" href="//mebbr.ru">MEBBR</a>
            <div class="menu">
                <a href="//mebbr.ru/software/"> <img draggable="false" role="img" class="emoji" alt="💾" src="//static.mebbr.ru/fonts/mebbr/1f4be.svg">&nbsp;Программы</a>
                <a href="//mebbr.ru/hardware/"> <img draggable="false" role="img" class="emoji" alt="🔩" src="//static.mebbr.ru/fonts/mebbr/1f529.svg">&nbsp;Железо</a>
                <a href="//mebbr.ru/internet/"> <img draggable="false" role="img" class="emoji" alt="🌍" src="//static.mebbr.ru/fonts/mebbr/1f30d.svg">&nbsp;Интернет</a>
                <a href="//mebbr.ru/lifehacks/"> <img draggable="false" role="img" class="emoji" alt="💡" src="//static.mebbr.ru/fonts/mebbr/1f4a1.svg">&nbsp;Лайфхаки</a>
            </div>
        </div>
        <form class="search_form" role="search" method="get" id="searchform" action="//mebbr.ru" autocomplete="off">
            <div class="search">
                <input name="s" class="searchbox" placeholder="Поиск" type="text" maxlength="100" required/>
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
<script async type="text/javascript" src="//static.mebbr.ru/js/spotlight.bundle.js"></script>
<script async type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(43402149, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/43402149" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
</html>