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
    <link rel="alternate" type="application/rss+xml" title={RSS:Title} href="{RSS:href}">
    <link rel="next" href="<?php the_permalink(); ?>">
    {index:link:preconnect}
    {index:link:preload}
    {index:dns:prefetch}
    <title>{index:title}</title>
    {index:style}

</head>

<body>
<script>
      var style = document.documentElement.style;
      var style = document.getElementsByTagName("body")[0].style;

      const setDark = () => {
        style.setProperty("--text", "rgba(232, 230, 227, 0.999)");
        style.setProperty("--bg", "rgba(14, 15, 15, 0.999)");
        style.setProperty("--selection", "rgba(53, 59, 72, 0.99)");
        style.setProperty("--button", "rgba(255, 255, 255, 0.999)");
        style.setProperty("--border", "#353535");
        style.setProperty("--hover", "#454545");
        style.setProperty("--box", "rgb(33, 36, 37)");
        style.setProperty("--codeselection", "rgba(254, 235, 239, 0.99)");
        style.setProperty("--svg_filter", "brightness(0) saturate(100%) invert(86%) sepia(36%) saturate(15%) hue-rotate(357deg) brightness(94%) contrast(108%)");
      };

      const setLight = () => {
        style.setProperty("--text", "rgba(41, 41, 41, 0.999)");
        style.setProperty("--bg", "#edeef0");
        style.setProperty("--selection", "rgba(254, 235, 239, 0.99)");
        style.setProperty("--button", "rgba(0, 0, 0)");
        style.setProperty("--border", "rgba(0, 0, 0, 0.1)");
        style.setProperty("--hover", "#ccc");
        style.setProperty("--box", "rgba(255, 255, 255, 0.999)");
        style.setProperty("--codeselection", "rgba(53, 59, 72, 0.99)");
        style.setProperty("--svg_filter", "rgba(17, 17, 26, 0.1) 0px 0px 16px");
      };
      var theme = localStorage.getItem("theme");
      if (theme) {
        if (theme == "dark") {
          setDark();
        } else if (theme == "light") {
          setLight();
        }
      }
  </script>
    <aside class="header" role="complementary">
        <a href="{site:url}" class="logo">
            {site:name}
        </a>
        <p class="header_desc">
            {site_description}
        </p>
        {index:header_flex_open}
            <form class="search_form" role="search" method="get" id="searchform" action="{site:url}" autocomplete="off">
                <div class="search">
                    <input name="s" class="searchbox" placeholder="Поиск" type="text" maxlength="100" required />
                    <input type="image" id="searchsubmit" class="search_icon" src="//mebbr.ru/img/search.svg">
                </div>
            </form>
            {index:navigation}
        {index:header_flex_close}
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
        {index:mobile_footer}
    </main>
    <?php wp_footer()?>
</body>
{index:js}
</html>