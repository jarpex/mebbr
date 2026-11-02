<?php
/*
Template Name: Home
*/
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
    {index:link:preload}
    {index:dns:prefetch}
    <title>{site_title}</title>
    {home:style}
    <?php wp_head(); ?>
</head>
<body>
  <script>
      var style = document.documentElement.style;
      var style = document.getElementsByTagName("body")[0].style;

      const setDark = () => {
        style.setProperty("--bg", "#121214");
        style.setProperty("--text", "#f2f2ee");
        style.setProperty("--text-muted", "#848480");
        style.setProperty("--border", "#262629");
        style.setProperty("--border-hover", "#48484d");
        style.setProperty("--border-focus", "#f2f2ee");
        style.setProperty("--input-bg", "#18181b");
        style.setProperty("--selection", "#2f3036");
      };

      const setLight = () => {
        style.setProperty("--bg", "#f7f6f2");
        style.setProperty("--text", "#121212");
        style.setProperty("--text-muted", "#6e6d68");
        style.setProperty("--border", "#dcd9d0");
        style.setProperty("--border-hover", "#98968d");
        style.setProperty("--border-focus", "#121212");
        style.setProperty("--input-bg", "#ffffff");
        style.setProperty("--selection", "#dedbd2");
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
  <main class="home-hero">
    <header class="home-header">
      <h1 class="logo"><a href="{site:url}">{site:name}</a></h1>
      <p class="header_desc">{site_description}</p>
    </header>
    <form
      id="searchBox"
      class="inputBox"
      role="search"
      method="get"
      action="{site:url}"
      autocomplete="off"
    >
      <div class="search-icon-wrap" aria-hidden="true">
        <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
      </div>
      <label id="searchBox__label" class="inputBox__label" for="searchBox__input">
        <input
          name="s"
          type="text"
          placeholder="Поиск по сайту..."
          minlength="1"
          maxlength="150"
          required
          class="inputBox__input"
          id="searchBox__input"
          autofocus
        />
      </label>
      <button type="submit" id="searchsubmit" class="search-kbd" aria-label="Поиск" title="Нажмите Enter для поиска">
        <span>↵</span>
      </button>
    </form>
    <div class="home-categories-wrap">
      <div class="home-categories__title">Рубрики</div>
      <ul id="category"><?php wp_list_categories('title_li='); ?></ul>
    </div>
  </main>
  <script>
    document.getElementById('searchBox__input').addEventListener('focus', function(){
      document.getElementById('searchBox').classList.add("focused");
    });
    document.getElementById('searchBox__input').addEventListener('focusout', function(){
      document.getElementById('searchBox').classList.remove("focused");
    });
  </script>
  <?php wp_footer(); ?>
</body>
{index:js}
</html>