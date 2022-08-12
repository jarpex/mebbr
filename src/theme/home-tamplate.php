<?php
/*
Template Name: Home
*/
?>
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
            --text: rgba(232, 230, 227, 0.999);
            --bg: rgba(14, 15, 15, 0.999);
            --button: rgba(255, 255, 255, 0.999);
            --border: #353535;
            --selection: rgba(53, 59, 72, 0.99);
            --primary: #6d5dfc;
            color: var(--text);
            background-color: var(--bg);
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            text-rendering: optimizeLegibility;
            margin: 0;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-content: center;
            justify-content: center;
            align-items: center;
            height: 100%;
            user-select: none;
        }

        @media (prefers-color-scheme: dark) {
            body {
                --text: rgba(232, 230, 227, 0.999);
                --bg: rgba(14, 15, 15, 0.999);
                --button: rgba(255, 255, 255, 0.999);
                --border: #353535;
                --selection: rgba(53, 59, 72, 0.99);
                --primary: #6d5dfc;
            }
        }

        @media (prefers-color-scheme: light) {
            body {
                --text: rgba(18, 18, 18, 0.999);
                --button: rgba(0, 0, 0);
                --border: #e9e9e9;
                --bg: rgba(255, 255, 255, 0.999);
                --selection: rgba(254, 235, 239, 0.99);
                --primary: #6d5dfc;
            }
        }

        h1 {
          display: block;
          font-size: 10vw;
          width: 100%;
          text-align: center;
          margin: 0;
        }

        p {
          font-size: 1.5vw;
          margin: -1.5vw 0 0 0;
        }

        #searchBox {
          margin: 5vw 0 0 0;
          border-radius: 0.65vw;
          border-color: transparent;
          background-color: var(--border);
          display: flex;
          box-sizing: border-box;
          transition: background-color 0.1s linear, border-color 0.1s linear,
            box-shadow 0.1s linear, -webkit-box-shadow 0.1s linear;
        }

        #searchBox__label {
          width: 100%;
          position: relative;
          display: flex;
          align-items: center;
        }

        #searchBox__input {
          width: 25vw;
          padding: 0.5vw 0 0.5vw 1vw;
          border: 0;
          line-height: 1;
          color: var(--text);
          font: inherit;
          background-color: transparent;
          outline: none;
          appearance: none;
          box-shadow: none;
          box-sizing: border-box;
        }

        .focused {
          outline: solid .1vw var(--primary)
        }

        #searchsubmit {
          background-color: transparent;
          border: none;
          cursor: pointer;
          padding: 0.5vw 1vw;
          opacity: 40%;
        }

        #searchsubmit:hover {
          opacity: 100%;
        }

        #searchsubmit svg {
          width: 1vw;
        }

        #searchsubmit svg path {
          fill: var(--button);
        }

        #category {
          margin-top: 2.5vw;
          padding: 0;
          display: flex;
          list-style: none;
          flex-direction: row;
          flex-wrap: wrap;
          align-content: center;
          justify-content: center;
          align-items: center;
        }

        #category li {
          margin: 1vw;
        }

        #category a{
          font-size: 1.5vw;
          color: var(--text);
          text-decoration: none;
        }

        #category a:hover {
          text-decoration: underline;
        }
      
        @media (max-width: 1199px) and (orientation: portrait) {
          body {
            margin-top: -15vh;
          }
          h1 {
            font-size: 20vw;
          }
          p {
            font-size: 4.5vw;
          }
          #searchBox {
            margin: 15vw 0 0 0;
            border-radius: 3vw;
          }

          #searchBox__input {
            width: 70vw;
            padding: 1.5vw 0 1.5vw 2vw;
          }

          #searchsubmit {
            padding: 3.5vw 4vw;
          }

          #searchsubmit svg {
            width: 4vw;
          }

          #category {
            margin-top: 20vw;
          }

          #category a {
            font-size: 5vw;
          }
        }
    </style>
  
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
        style.setProperty("--border", "rgba(255, 255, 255, 0.1)");
        style.setProperty("--primary", "#6d5dfc");
      };

      const setLight = () => {
        style.setProperty("--text", "rgba(41, 41, 41, 0.999)");
        style.setProperty("--bg", "rgba(255, 255, 255, 0.999)");
        style.setProperty("--selection", "rgba(254, 235, 239, 0.99)");
        style.setProperty("--button", "rgba(0, 0, 0)");
        style.setProperty("--border", "rgba(0, 0, 0, 0.1)");
        style.setProperty("--primary", "#6d5dfc");
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
  <h1 href="{site:url}" class="logo">
    {site:name}
  </h1>
  <p class="header_desc">
    {site_description}
  </p>
  <form
    id="searchBox"
    class="inputBox"
    role="search"
    method="get"
    id="searchform"
    action="{site:url}"
    autocomplete="off"
  >
    <label id="searchBox__label" class="inputBox__label">
      <input
        name="s"
        type="text"
        placeholder="Поиск по сайту"
        minlength="1"
        maxlength="150"
        required
        class="inputBox__input"
        id="searchBox__input"
        autofocus
      />
      <button type="submit" id="searchsubmit" class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path
            d="m23.707 22.293-5.969-5.969a10.016 10.016 0 1 0-1.414 1.414l5.969 5.969a1 1 0 0 0 1.414-1.414ZM10 18a8 8 0 1 1 8-8 8.009 8.009 0 0 1-8 8Z"
          />
        </svg>
      </button>
    </label>
  </form>
  <ul id="category"><?php wp_list_categories('include=2,6&title_li='); ?></ul>
</body>
<script>
  document.getElementById('searchBox__input').addEventListener('focus', function(){
    document.getElementById('searchBox').classList.add("focused");
  });
  document.getElementById('searchBox__input').addEventListener('focusout', function(){
    document.getElementById('searchBox').classList.remove("focused");
  });
</script>
{index:js}
</html>