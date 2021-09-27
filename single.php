<?php
remove_filter( 'the_title', 'wptexturize' );
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_excerpt', 'wptexturize' );
wp_deregister_script('jquery');
wp_head();
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
    <link rel="preload" href="//static.mebbr.ru/css/mebbr.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="//static.mebbr.ru/css/mebbr.css"></noscript>
    <style>
        body {
            --text: rgba(18, 18, 18, 0.999);
            --bg: rgba(255, 255, 255, 0.999);
            --border: #e9e9e9;
            --hover: #ccc;
            --box: #edeef0;
            --selection: rgba(254, 235, 239, 0.99);
            --codeselection: rgba(53, 59, 72, 0.99);
            margin: 0;
            color: var(--text);
            background-color: var(--bg);
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            text-rendering: optimizeSpeed;
            margin: 0;
            text-align: justify;
            font-size: 21px;
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
        #menu_combo,
        header {
            align-items: center;
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
        }
        #searchform {
            padding-top: 20px;
        }

        .search {
            position: relative;
        }
        .searchbox {
            min-width: 60vw;
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
    </style>
</head>
<body>
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
<script async type="text/javascript" src="//static.mebbr.ru/js/spotlight.bundle.js"></script>
<script async type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(43402149, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/43402149" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
</html>