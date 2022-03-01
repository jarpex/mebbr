<?php
wp_deregister_script('jquery');
wp_head();
?>
<!DOCTYPE html>
{html_lang}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="twitter:creator" content="{twitter:creator}">
    <link rel="alternate" type="application/rss+xml" title={RSS:Title} href="{RSS:href}">
    <link rel="next" href="{site:url}">
    {index:link:preconnect}
    {site_icon}
    <title><?php the_title();?></title>
    {article:stylesheet}
    {article:preload}
    {article:dns-prefetch}
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
        #footer,
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

        #main, #related {
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

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
        #main ul{
            list-style-type: disclosure-closed;
        }

        #main ol {
            counter-reset: item;
            padding-inline-start: 20px;
        }

        #main > ol{
            padding-inline-start: 0px;
        }

        #main > ul{
            padding-inline-start: 20px;
        }

        #main ol li {
            display: block;
        }

        #main ol li:before {
            content: counters(item, ".") " ";
            counter-increment: item;
        }

        #main h2,  #main h3, #main h4, #main h5, #main h6 {
            text-align: center;
        }

        #related {
            border-top: solid var(--text) 5px;
            padding: 0px 5vw;
            box-sizing: border-box;
            margin-top: 2em;
        }

        #related-header {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            font-size: .85em;
        }

        .rel-title {
            font-size: .75em;
            margin: 1.4em 0;
            color: var(--text);
            display: block;
        }

        footer{
            background: var(--border);
        }
        /*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
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
                margin: 2em 0 0;
            }
            #main p {
                font-size: 21px;
                line-height: 32px;
                margin-top: 2em;
            }
            /* !!!!!!!!!!!!!!!!!!!!!!!!!*/
            #main ul{
                margin-left: 0;
            }
            #main > ul{
                padding-inline-start: 0px;
            }
            #related {
                padding: 0px 2vw;
            }
            /* !!!!!!!!!!!!!!!!!!!!!!!!!!!*/
        }
    </style>
</head>
<body>
	<header>
        <div id="menu_combo">
            <a id="logo" href="{site:url}">{site:name}</a>
            {article:menu}
        </div>
        <form class="search_form" role="search" method="get" id="searchform" action="{site:url}" autocomplete="off">
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
            <h2>Мы не смогли ничего найти по твоему запросу :с</h2>
        <?php endif; ?>
    </article>
    <div id="related">
        <?php
            $categories = get_the_category($post->ID);
            if ($categories) {
                $category_ids = array();
                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                $args=array(
                    'category__in' => $category_ids,
                    'post__not_in' => array($post->ID),
                    'showposts'=>4,
                    'orderby'=>rand,
                    'caller_get_posts'=>1);
                $my_query = new wp_query($args);
                if( $my_query->have_posts() ) {
                    echo '<div id="related-header"><h2>Читайте также</h2><img draggable="false" role="img" class="emoji" alt="🧐" src="//static.mebbr.ru/fonts/mebbr/1f9d0.svg"></div>';
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        ?>
                            <a class="rel-title" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        <?php
                    }
                }
                wp_reset_query();
            }
        ?>
    </div>
    <footer>
        <div id="footer">
            {article:footer_combo}
            {article:social_icons}
        </div>
    </footer>
    <button id="gotop" onclick="window.scroll({ top: 0, left: 0, behavior: 'smooth' })"></button>
    <?php wp_footer()?>
</body>
{article:js}
<script type="text/javascript">
    window.onload = function(){
        const sp = document.getElementsByClassName('spotlight');
        const length = sp.length;
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches){
            for (let i = 0; i < length; ++i){
                sp[i].setAttribute('data-theme',"dark");
            }      
        }else{
            for (let i = 0; i < length; ++i){
                sp[i].setAttribute('data-theme',"white");
            }   
        }
    }
</script>
</html>