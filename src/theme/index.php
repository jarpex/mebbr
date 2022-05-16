<?php
wp_deregister_script('jquery');
wp_head();
?>
<!DOCTYPE html>
{html_lang}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {site_icon}
    {site_manifest}
    {msapplication-TileColor}
    {msapplication-config}
    <meta name="description" content="{site_description}" />
    <meta property="og:title" content="{site_title}" />
    <meta property="og:description" content="{site_description}" />
    <meta property="og:image" content="{og:image}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https:{site:url}" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{site_title}">
    <meta name="twitter:description" content="{site_description}">
    <meta name="twitter:url" content="https:{site:url}">
    <meta name="twitter:image" content="{og:image}" />
    <meta name="twitter:domain" content="{site:domain}">
    <meta name="twitter:site" content="{twitter:site}">
    <meta name="twitter:creator" content="{twitter:creator}">
    <link rel="canonical" href="https:{site:url}">
    <link rel="alternate" type="application/rss+xml" title={RSS:Title} href="{RSS:href}">
    <link rel="next" href="<?php the_permalink(); ?>">
    {index:link:preconnect}
    <link rel="preload" href="{index:stylesheet}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{index:stylesheet}"></noscript>
    {index:link:preload}
    {index:dns:prefetch}
    <title>{site_title}</title>
    <style>
        body {
            --text: rgba(18, 18, 18, 0.999);
            --box: rgba(255, 255, 255, 0.999);
            --border: #e9e9e9;
            --hover: #ccc;
            --bg: #edeef0;
            --selection: rgba(254, 235, 239, 0.99);
            --codeselection: rgba(53, 59, 72, 0.99);
            --searchbox_shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
            --header_shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
            color: var(--text);
            background-color: var(--bg);
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            text-rendering: optimizeLegibility;
            margin: 0;
            display: flex;
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
                --svg_filter: brightness(0) saturate(100%) invert(86%) sepia(36%) saturate(15%) hue-rotate(357deg) brightness(94%) contrast(108%);
            }
        }

        @media (prefers-color-scheme: light) {
            body {
                --text: rgba(18, 18, 18, 0.999);
                --box: rgba(255, 255, 255, 0.999);
                --border: #e9e9e9;
                --hover: #ccc;
                --bg: #edeef0;
                --selection: rgba(254, 235, 239, 0.99);
                --codeselection: rgba(53, 59, 72, 0.99);
            }
        }

        html{
            font-size: .85vw;
        }

        a {
            color: var(--text);
            text-decoration: none;
        }

        .header {
            width: calc(100vw / 3);
            background: var(--box);
            position: fixed;
            height: 100vw;
            padding: 5vw;
            box-sizing: border-box;
            box-shadow: var(--header_shadow);
        }

        .logo {
            text-decoration: none;
            color: var(--text);
            font-size: 5.75em;
            line-height: 1em;
            display: block;
            text-align: center;
            margin: .1em 0 0 0;
        }

        .header_desc {
            text-align: center;
            font-size: 1.02em;
            margin: 1.12em 0 2.35em 0;
        }

        .header_flex {
            display: flex;
            flex-direction: column;
        }

        .search {
            position: relative;
        }

        .searchbox {
            width: 94.75%;
            background-color: var(--bg);
            border-radius: .5em;
            margin: 0.725em auto 2.6em auto;
            border: 0;
            color: var(--text);
            display: block;
            font-size: 1em;
            line-height: 2.6em;
            min-height: 2.6em;
            outline: 0;
            padding: 0 1.4em 0 1.75em;
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            box-shadow: var(--searchbox_shadow);

        }

        .search_icon {
            position: absolute;
            top: 0.8em;
            right: 1.8em;
            color: var(--text);
            opacity: .7;
            height: 1em;
        }
        img.emoji{
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
        .nav_flex {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nav {
            width: fit-content;
            font-size: 1.65em;
        }

        .nav_href {
            display: flex;
            align-items: center;
            margin: 0.7em 0 -0.2em;
        }

        .nav_span {
            margin-left: .775em;
        }

        .social_icons {
            font-size: 1.2em;
            width: calc(100vw / 3);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: "mebbr";
            padding: 2.125em 5em;
            position: fixed;
            bottom: 0;
            left: 0;
            box-sizing: border-box;
        }

        .social_icons a img {
            height: 1.2em;
            filter: var(--svg_filter);
            opacity: .7;
        }

        .site-main {
            margin-left: calc(100vw / 3);
            width: calc((100vw / 3) * 2);
        }

        .blocks-wrapper {
            width: 55vw;
            margin: 0 auto;
            padding-bottom: 2.1em;
        }

        .card {
            background: var(--box);
            margin: 4.75em 0;
            display: flex;
            border-radius: .75em;
        }

        .card_img {
            width: 23vw;
            min-height: 100%;
            max-height: 25vw;
            object-fit: cover;
            border-radius: .75em 0 0 .75em;
        }

        .padding {
            padding: 2.4em 2.4em 1.92em 2.4em;
            box-sizing: border-box;
            width: -webkit-fill-available;
        }

        .title {
            font-size: 2.38em;
            margin: 0 0 .4em 0;
        }

        .post-categories {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 1.2em;
        }

        .padding p {
            font-size: 1.1em;
        }

        .more-link,
        .page-numbers {
            display: block;
            background: var(--border);
            border: none;
            border-radius: .5em;
            margin: 2.4em auto 0;
            max-width: 7.2em;
            padding: .45em 1em;
            text-align: center;
        }

        .more-box {
            margin-top: 2.1em;
            text-align: center;
        }

        .page-numbers {
            display: inline-block;
            margin: 0 .4em;
            padding: .6em 1.05em;
        }

        .navigation .current {
            background-color: var(--box);
        }

        @media (min-aspect-ratio: 21/8) {
            .social_icons {
                display: none;
            }
        }

        

        @media (max-width: 1199px) and (orientation: portrait) {
            body {
                flex-direction: column;
            }

            .header {
                position: relative;
                width: 100vw;
                height: auto;
                padding: 0 5vw;
            }

            .logo {
                margin: 1em 0 .5em 0;
                font-size: 48px;
                line-height: 48px;
            }

            .header_desc {
                display: none;
            }

            .header_flex {
                flex-direction: column-reverse;
            }

            .nav_flex {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .nav {
                width: fit-content;
                text-align: center;
                margin: 0 20px;
                font-size: 20px;
                line-height: 40px;
            }

            .nav_href {
                white-space: nowrap;
                display: inline;
            }

            .nav_span {
                margin: 0 0 0 .26em;
                line-height: 2em;
            }

            #searchform {
                padding-top: 20px;
                margin-bottom: 0;
            }

            .search {
                margin: 0 auto;
                width: fit-content;
            }

            .searchbox {
                border-radius: 0.5em;
                font-size: 4.5em;
                line-height: 2em;
                min-height: 3em;
                padding: 0 2.5em 0 1.5em;
                margin-bottom: 3em;
                width: auto;
                min-width: 75vw;
            }

            .search_icon {
                right: 1.25em;
                top: 1em;
                height: 1.5em;
            }

            .site-main {
                margin: 0;
                width: 100%;
                padding: 0 30px;
                box-sizing: border-box;
            }

            .blocks-wrapper {
                width: 100%;
            }

            .message {
                position: relative;
                margin-top: 3em;
            }

            .card {
                margin: 30px 0;
                flex-direction: column;
                border-radius: 3.75em;
            }

            .card_img {
                min-width: 100%;
                min-height: 200px;
                border-radius: 3.75em 3.75em 0 0;
            }

            .padding {
                padding: 5em 7.5vw 6em;
            }

            .title {
                font-size: 8em;
                margin: 0 0 7.5px 0;
            }

            .post-categories {
                font-size: 4.5em;
            }

            .category {
                font-size: 14px;
            }

            .padding p {
                font-size: 14px;
            }

            .more-link {
                margin: 1.5em auto 0;
                font-size: 4.5em;
            }

            .page-numbers{
                margin: 0 .5em;
                font-size: 5em;
                padding: .55em 1em;
            }

            .more-box {
                padding-bottom: 8em;
            }

            .social_icons {
                display: none;
            }
        }
    </style>

</head>

<body>
    <aside class="header" role="complementary">
        <a href="{site:url}" class="logo">
            {site:name}
        </a>
        <p class="header_desc">
            {site_description}
        </p>
        <div class="header_flex">
            <form class="search_form" role="search" method="get" id="searchform" action="{site:url}" autocomplete="off">
                <div class="search">
                    <input name="s" class="searchbox" placeholder="Поиск" type="text" maxlength="100" required />
                    <input type="image" id="searchsubmit" class="search_icon" src="//mebbr.ru/img/search.svg">
                </div>
            </form>
            {index:navigation}
        </div>
        {index:social_icons}
    </aside>
    <main class="site-main" role="main">
        <div class="blocks-wrapper">
            <div class="cards">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="card">
                    <a href="<?php the_permalink(); ?>">
                        <img class="card_img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"
                            onerror="this.style.display = 'none'" />
                    </a>
                    <div class="padding">
                        <h2 class="title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        {index:category}
                        <?php the_content('Читать'); ?>
                    </div>
                </div>
                <?php endwhile; else :
                    get_template_part( 'content', 'none' );
                endif;
                ?>
            </div>
            <div class="more-box">
                <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
            </div>
        </div>
    </main>
    <?php wp_footer()?>
</body>
{index:js}
</html>