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
        html {
            font: 17px Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
        }
        body {
            --text: rgba(18, 18, 18, 0.999);
            --bg: rgba(255, 255, 255, 0.999);
            --hover: rgba(0, 0, 0, 0.3);
            --button: rgba(0, 0, 0);
            --progress: #dbdbdb;
            --popupbg: rgba(0, 0, 0, 0.5);
            --border: rgba(0, 0, 0, 0.1);
            --primary: #6d5dfc;
            --greyLight-1: #e4ebf5;
            --greyLight-2: #c8d0e7;
            --greyDark: #9baacf;
            --selection: rgba(254, 235, 239, 0.99);
            --box: #edeef0;
            --codeselection: rgba(53, 59, 72, 0.99);
            width: 100%;
            color: var(--text);
            background-color: var(--bg);
            text-rendering: optimizeLegibility;
            margin: 0;
            text-align: left;
        }

        @media (prefers-color-scheme: dark) {
            body {
                --text: rgba(232, 230, 227, 0.999);
                --bg: rgba(14, 15, 15, 0.999);
                --hover: #454545;
                --selection: rgba(53, 59, 72, 0.99);
                --button: rgba(255, 255, 255, 0.999);
                --progress: #dbdbdb;
                --popupbg: rgba(0, 0, 0, 0.5);
                --border: rgba(255, 255, 255, 0.1);
                --primary: #e0e0e0;
                --greyLight-1: #1f2227;
                --greyLight-2: #090913;
                --greyDark: #b7b7b7;
                --box: rgb(33, 36, 37);
                --codeselection: rgba(254, 235, 239, 0.99);
            }
        }

        @media screen and (prefers-color-scheme: light) {
            body {
                --text: rgba(18, 18, 18, 0.999);
                --bg: rgba(255, 255, 255, 0.999);
                --hover: rgba(0, 0, 0, 0.3);
                --selection: rgba(254, 235, 239, 0.99);
                --button: rgba(0, 0, 0);
                --progress: #dbdbdb;
                --popupbg: rgba(0, 0, 0, 0.5);
                --border: rgba(0, 0, 0, 0.1);
                --primary: #6d5dfc;
                --greyLight-1: #e4ebf5;
                --greyLight-2: #c8d0e7;
                --greyDark: #9baacf;
                --box: #edeef0;
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
            max-width: 650px;
            margin: 0 auto;
        }

        #main #autor_card {
            margin: 1.175em 0 0;
            display: flex;
            align-items: center;
        }

        #main .post_meta {
            margin: 0 0 0 0.647rem;
            font-size: 0;
        }

        #main .avatar {
            border-radius: 50%;
            display: inline-block;
        }

        #main #autor_url {
            display: block;
            text-decoration: none;
            font-size: 15px;
            margin: 0;
        }

        #autor_card .post_date, #autor_card .reading_time {
            color: var(--gray_400);
            font-size: 13px;
        }

        #autor_card .reading_time::before{
            content: '\2022';
            padding: 0 0.412rem;
        }

        #main h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'PT Serif', serif;
            font-weight: 700;
            text-align: left;
            margin: 2.35rem 0 0;
            line-height: 1.2em;
            word-break: break-word;
        }

        #main h1 {
            margin-top: 2.647rem;
            font-size: 2.235rem;
        }
        #main h2 {
            font-size: 1.294rem;
            margin: 4.06rem 0 -1.47rem;
        }

        #main h3 {
            font-size: 1.176rem;
            margin: 2.79rem 0 -1.47rem;
        }
        #main h4 {
            font-size: 1.625rem;
        }
        #main h5 {
            font-size: 1.4rem;
        }
        #main h6 {
            font-size: 1.25rem;
        }

        /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
        /* .hide {
            display: none;
        } */
        #main ul, #main ol{
            margin: 2.35rem 0 0;
            padding: 0;
        }

        #main li {
            margin: 1.34rem 0 -0.54rem 1.764rem;
        }
        
        #article_tags {
            margin: 2.35rem 0 0;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: center;
            justify-content: flex-start;
            align-items: center;
        }

        #article_tags a {
            color: var(--bg) !important; 
            /* Убрать импортант доработав #main a:not(.spotlight) в #main a:not(.spotlight):not(#article_tags) */
            background-color: var(--text);
            text-decoration: none;
            padding: 0.1rem 0.8rem;
            margin: 0.5rem 0.4rem 0 0;
        }

        /* Объединить с .hljs */
        #main pre code {
            display: block;
            overflow-x: auto;
            padding: 0.5em 1em;
            background: #282a36;
            color: #f8f8f2;
            border-radius: 0.75em;
            font-family: PTMonoWebRegular,monospace!important;
        }
        #main .wp-block-quote {
            margin: 2.35rem 0 0 -1.2rem !important;
        }

        #main .wp-block-quote p {
            border-left: solid var(--text) 3px !important;
            padding-left: calc(1.2rem - 3px) !important;
            box-sizing: border-box;
        }

        #related {
            border-top: solid var(--text) 5px;
            padding: 0px 5vw;
            box-sizing: border-box;
            margin-top: 2.35rem;
        }

        #related-header {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            font-size: 1em;
        }

        #related-header h2 {
            margin-top: 1em;
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
            
            #main p {
                font-size: 17px;
                line-height: 1.6em;
                margin: 2.35rem 0 0;
            }
            /* !!!!!!!!!!!!!!!!!!!!!!!!!*/
            #related {
                padding: 0px 2vw;
            }
            
            #related-container {
                margin-bottom: 2.5em;
            }
            /* !!!!!!!!!!!!!!!!!!!!!!!!!!!*/
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
        style.setProperty("--hover", "#454545");
        style.setProperty("--selection", "rgba(53, 59, 72, 0.99)");
        style.setProperty("--button", "rgba(255, 255, 255, 0.999)");
        style.setProperty("--progress", "#dbdbdb");
        style.setProperty("--popupbg", "rgba(0, 0, 0, 0.5)");
        style.setProperty("--border", "rgba(255, 255, 255, 0.1)");
        style.setProperty("--primary", "#e0e0e0");
        style.setProperty("--greyLight-1", "#1f2227 ");
        style.setProperty("--greyLight-2", "#090913");
        style.setProperty("--greyDark", "#b7b7b7");
      };

      const setLight = () => {
        style.setProperty("--text", "rgba(18, 18, 18, 0.999)");
        style.setProperty("--bg", "rgba(255, 255, 255, 0.999)");
        style.setProperty("--hover", "rgba(0, 0, 0, 0.3)");
        style.setProperty("--selection", "rgba(254, 235, 239, 0.99)");
        style.setProperty("--button", "rgba(0, 0, 0)");
        style.setProperty("--progress", "#dbdbdb");
        style.setProperty("--popupbg", "rgba(0, 0, 0, 0.5)");
        style.setProperty("--border", "rgba(0, 0, 0, 0.1)");
        style.setProperty("--primary", "#6d5dfc");
        style.setProperty("--greyLight-1", "#e4ebf5");
        style.setProperty("--greyLight-2", "#c8d0e7");
        style.setProperty("--greyDark", "#9baacf");
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
	<!-- <header>
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
    </header> -->
    <div id="progress">
      <div id="progress-bar"></div>
    </div>
    <div id="search-popup" class="cd-popup" role="alert">
      <div id="search-popup__bg" class="cd-popup-container">
        <figure class="cd-popup-mobile icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
              d="M23.707.293a1 1 0 0 0-1.414 0L12 10.586 1.707.293a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414L10.586 12 .293 22.293a1 1 0 0 0 0 1.414 1 1 0 0 0 1.414 0L12 13.414l10.293 10.293a1 1 0 0 0 1.414 0 1 1 0 0 0 0-1.414L13.414 12 23.707 1.707a1 1 0 0 0 0-1.414Z"
            />
          </svg>
        </figure>
        <form
          id="searchBox"
          class="inputBox"
          role="search"
          method="get"
          id="searchform"
          action="//mebbr.ru"
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
      </div>
    </div>
    <div id="category-popup" class="cd-popup" role="alert">
      <div id="category-popup__bg" class="cd-popup-container">
        <figure class="cd-popup-mobile icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
              d="M23.707.293a1 1 0 0 0-1.414 0L12 10.586 1.707.293a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414L10.586 12 .293 22.293a1 1 0 0 0 0 1.414 1 1 0 0 0 1.414 0L12 13.414l10.293 10.293a1 1 0 0 0 1.414 0 1 1 0 0 0 0-1.414L13.414 12 23.707 1.707a1 1 0 0 0 0-1.414Z"
            />
          </svg>
        </figure>
        <a href="//mebbr.ru" class="logo"> MEBBR </a>
        <p class="header_desc">Всё самое интересное из мира IT, и не только.</p>
        <div class="nav_flex">
          <nav class="nav" role="navigation">
            <a class="nav_href" href="//mebbr.ru/software/"
              ><img
                draggable="false"
                role="img"
                class="emoji"
                alt="💾"
                width="32"
                height="32"
                src="//static.mebbr.ru/fonts/mebbr/1f4be.svg"
              /><span class="nav_span">Программы</span></a
            >
            <a class="nav_href" href="//mebbr.ru/hardware/"
              ><img
                draggable="false"
                role="img"
                class="emoji"
                alt="🔩"
                width="32"
                height="32"
                src="//static.mebbr.ru/fonts/mebbr/1f529.svg"
              /><span class="nav_span">Железо</span></a
            >
            <a class="nav_href" href="//mebbr.ru/internet/"
              ><img
                draggable="false"
                role="img"
                class="emoji"
                alt="🌍"
                width="32"
                height="32"
                src="//static.mebbr.ru/fonts/mebbr/1f30d.svg"
              /><span class="nav_span">Интернет</span></a
            >
            <a class="nav_href" href="//mebbr.ru/lifehacks/"
              ><img
                draggable="false"
                role="img"
                class="emoji"
                alt="💡"
                width="32"
                height="32"
                src="//static.mebbr.ru/fonts/mebbr/1f4a1.svg"
              /><span class="nav_span">Лайфхаки</span></a
            >
          </nav>
        </div>
      </div>
    </div>
    <div id="settings-popup" class="cd-popup" role="alert">
      <div id="settings-popup__bg" class="cd-popup-container">
        <figure class="cd-popup-mobile icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
              d="M23.707.293a1 1 0 0 0-1.414 0L12 10.586 1.707.293a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414L10.586 12 .293 22.293a1 1 0 0 0 0 1.414 1 1 0 0 0 1.414 0L12 13.414l10.293 10.293a1 1 0 0 0 1.414 0 1 1 0 0 0 0-1.414L13.414 12 23.707 1.707a1 1 0 0 0 0-1.414Z"
            />
          </svg>
        </figure>
        <a href="//mebbr.ru" class="logo"> MEBBR </a>
        <p class="header_desc">Всё самое интересное из мира IT, и не только.</p>
        <p class="settings-popup__bg-heading">🌙 Выбор темы:</p>
        <form name="theme" class="segmented-control" id="theme-switcher">
          <input
            type="radio"
            name="radio2"
            value="system"
            id="tab-1"
            checked=""
          />
          <label for="tab-1" class="segmented-control__1">
            <p>💻 Системная</p></label
          >

          <input type="radio" name="radio2" value="light" id="tab-2" />
          <label for="tab-2" class="segmented-control__2">
            <p>🌞 Светлая</p></label
          >

          <input type="radio" name="radio2" value="dark" id="tab-3" />
          <label for="tab-3" class="segmented-control__3">
            <p>🌚 Темная</p></label
          >

          <div class="segmented-control__color"></div>
        </form>
        <p class="settings-popup__bg-heading">🪪 Авторизация:</p>
        <form
          name="loginform"
          id="loginform"
          action="https://mebbr.ru/wp-login.php"
          method="post"
        >
          <div id="loginform__inputs">
            <input type="text" name="log" id="user_login" placeholder="Логин" />
            <input
              type="password"
              name="pwd"
              id="user_pass"
              placeholder="Пароль"
            />
          </div>
          <div id="loginform__actions">
            <figure>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                  d="M12 12a6 6 0 1 0-6-6 6.006 6.006 0 0 0 6 6Zm0-10a4 4 0 1 1-4 4 4 4 0 0 1 4-4Zm0 12a9.01 9.01 0 0 0-9 9 1 1 0 0 0 2 0 7 7 0 0 1 14 0 1 1 0 0 0 2 0 9.01 9.01 0 0 0-9-9Z"
                />
              </svg>
            </figure>
            <input
              type="submit"
              name="wp-submit"
              id="wp-submit"
              value="Войти"
            />
            <input
              type="hidden"
              name="redirect_to"
              value="https://mebbr.ru/wp-admin/"
            />
            <input type="hidden" name="testcookie" value="1" />
          </div>
        </form>
      </div>
    </div>
    <nav id="navigation">
      <div class="tooltip-box">
        <figure id="navigation__home" class="icon" onclick="goHome()">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
              d="m23.121 9.069-7.585-7.586a5.008 5.008 0 0 0-7.072 0L.879 9.069A2.978 2.978 0 0 0 0 11.19v9.817a3 3 0 0 0 3 3h18a3 3 0 0 0 3-3V11.19a2.978 2.978 0 0 0-.879-2.121ZM15 22.007H9v-3.934a3 3 0 0 1 6 0Zm7-1a1 1 0 0 1-1 1h-4v-3.934a5 5 0 0 0-10 0v3.934H3a1 1 0 0 1-1-1V11.19a1.008 1.008 0 0 1 .293-.707L9.878 2.9a3.008 3.008 0 0 1 4.244 0l7.585 7.586a1.008 1.008 0 0 1 .293.704Z"
            />
          </svg>
        </figure>
        <span class="tooltip">🏡 Главная страница</span>
      </div>
      <div class="tooltip-box">
        <figure id="navigation__search" class="icon" onclick="goSearch()">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
              d="m23.707 22.293-5.969-5.969a10.016 10.016 0 1 0-1.414 1.414l5.969 5.969a1 1 0 0 0 1.414-1.414ZM10 18a8 8 0 1 1 8-8 8.009 8.009 0 0 1-8 8Z"
            />
          </svg>
        </figure>
        <span class="tooltip">🔍 Поиск по сайту</span>
      </div>
      <div class="tooltip-box">
        <figure id="navigation__category" class="icon" onclick="goCategory()">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
              d="M7 0H4a4 4 0 0 0-4 4v3a4 4 0 0 0 4 4h3a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4Zm2 7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2Zm11-7h-3a4 4 0 0 0-4 4v3a4 4 0 0 0 4 4h3a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4Zm2 7a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2ZM7 13H4a4 4 0 0 0-4 4v3a4 4 0 0 0 4 4h3a4 4 0 0 0 4-4v-3a4 4 0 0 0-4-4Zm2 7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2Zm11-7h-3a4 4 0 0 0-4 4v3a4 4 0 0 0 4 4h3a4 4 0 0 0 4-4v-3a4 4 0 0 0-4-4Zm2 7a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2Z"
            />
          </svg>
        </figure>
        <span class="tooltip">📃 Список категорий</span>
      </div>
      <figure id="navigation__gotop-mobile" class="icon" onclick="goTop()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path
            d="m23.71 16.29-8.17-8.17a5 5 0 0 0-7.08 0L.29 16.29a1 1 0 0 0 1.42 1.42l8.17-8.17a3 3 0 0 1 4.24 0l8.17 8.17a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42Z"
          />
        </svg>
      </figure>
      <div class="tooltip-box">
        <figure id="navigation__menu" class="icon" onclick="goSettings()">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <circle cx="12" cy="2" r="2" />
            <circle cx="12" cy="12" r="2" />
            <circle cx="12" cy="22" r="2" />
          </svg>
        </figure>
        <span class="tooltip">📐 Настройки</span>
      </div>
    </nav>
    <div class="tooltip-box">
      <figure id="navigation__gotop-desktop" class="icon" onclick="goTop()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path
            d="m23.71 16.29-8.17-8.17a5 5 0 0 0-7.08 0L.29 16.29a1 1 0 0 0 1.42 1.42l8.17-8.17a3 3 0 0 1 4.24 0l8.17 8.17a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42Z"
          />
        </svg>
      </figure>
      <span class="tooltip">☝🏻 Подняться в начало</span>
    </div>
    <article id="main" class="hyphenate">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div id="autor_card">
                <a href="<?php echo get_the_author_meta('url'); ?>" target="_blank"><?php echo get_avatar( get_the_author_meta('user_email'), 50 ); ?></a>
                <div class="post_meta">
                    <a id="autor_url" href="<?php echo get_the_author_meta('url'); ?>" target="_blank"><?php the_author(); ?></a>
                    <span class="post_date"><?php
                        $pdate = get_the_date("Y", $echo = false);
                        $cdate = date("Y");
                        if ($pdate == $cdate){
                            echo get_the_date("d F", $echo = false);
                        }else{
                            the_date();
                        }
                    ?></span>
                    <span class="reading_time"><?php _e( '🕑', ' ' ); ?> <?php echo gp_read_time(); ?> <?php _e( 'мин', ' ' ); ?></span>
                </div>
            </div>
            <h1><?php the_title(); ?></h1>
            
            <?php the_content(); ?>
            <?php endwhile; else : ?>
            <h2>Мы не смогли ничего найти по твоему запросу :с</h2>
        <?php endif; ?>
        <?php if( has_tag() ) :  ?>
            <div id="article_tags">
                <?php 
                    $posttags = get_the_tags();
                    $html = "";
                    if( $posttags ){
                        foreach( $posttags as $tag ){
                            $html .= '<a href="' . esc_attr( get_tag_link( $tag->term_id ) ) . '">' . "#" . $tag->name . '</a>';
                        }
                        echo $html;
                    }
                ?>
            </div>
        <?php  endif;  ?>
    </article>
    
        <?php
            $categories = get_the_category($post->ID);
            if ($categories) {
                echo '<div id="related">';
                $category_ids = array();
                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                $args=array(
                    'category__in' => $category_ids,
                    'post__not_in' => array($post->ID),
                    'showposts'=>4,
                    'orderby'=>rand(),
                    'caller_get_posts'=>1);
                $my_query = new wp_query($args);
                if( $my_query->have_posts() ) {
                    echo '<div id="related-header"><h2>Читайте также</h2><img draggable="false" role="img" class="emoji" alt="🧐" src="//static.mebbr.ru/fonts/mebbr/1f9d0.svg"></div><div id="related-container">';
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
                echo '</div></div>';
            }
        ?>
    <footer>
        <div id="footer">
            {article:footer_combo}
            {article:social_icons}
        </div>
    </footer>
    <?php wp_footer()?>
</body>
{article:js}
<script>
    let lastKnownScrollPosition = 0;
    let ticking = false;
    let progressBar = document.getElementById("progress-bar");
    let main = document.getElementById("main");
    let searchPopup = document.getElementById("search-popup");
    let searchPopupExit =
      searchPopup.getElementsByClassName("cd-popup-mobile")[0];
    let categoryPopup = document.getElementById("category-popup");
    let categoryPopupExit =
      categoryPopup.getElementsByClassName("cd-popup-mobile")[0];
    let settingsPopup = document.getElementById("settings-popup");
    let settingsPopupExit =
      settingsPopup.getElementsByClassName("cd-popup-mobile")[0];

    const doSomething = (scrollPos) => {
      let percent =
        ((scrollPos + window.innerHeight - main.offsetTop) /
          main.clientHeight) *
        100;
      if (percent <= 0.5) {
        progressBar.style.width = "0%";
      } else if (percent >= 100) {
        progressBar.style.width = "100%";
      } else {
        progressBar.style.width = percent + "%";
      }
    };

    document.addEventListener("scroll", function (e) {
      lastKnownScrollPosition = window.scrollY;

      if (!ticking) {
        window.requestAnimationFrame(function () {
          doSomething(lastKnownScrollPosition);
          ticking = false;
        });

        ticking = true;
      }
    });

    const goHome = () => {
      window.location.href = "//mebbr.ru";
    };

    const preventScroll = () => {
      let stylePosition = document.body.style.position;
      if (stylePosition != "fixed") {
        let position = window.scrollY;
        let scrollBarWidth = parseFloat(window.innerWidth - document.documentElement.clientWidth) / 2;   
        document.body.style.position = "fixed";
        document.body.style.top = `-${position}px`;
        document.body.style.left = `-${scrollBarWidth}px`;
      }
    };

    const allowScroll = () => {
      const scrollY = document.body.style.top;
      document.body.style.position = "";
      document.body.style.top = "";
      document.body.style.left = "";
      window.scrollTo(0, parseInt(scrollY || "0") * -1);
        // window.scrollTo(0, beforeHide);
    };

    // var beforeHide = 0;
    // const hideAds = () => {
    //     beforeHide = window.scrollY;
    //     let ads = document.getElementsByClassName("advert");
    //     for (let i = 0; i < ads.length; i++){
    //         ads[i].classList.add("hide")
    //     }
    // }

    // const showAds = () => {
    //     let ads = document.getElementsByClassName("advert");
    //     for (let i = 0; i < ads.length; i++){
    //         ads[i].classList.remove("hide")
    //     }
    // }

    const goSearch = () => {
      if (searchPopup) {
        if (searchPopup.classList.contains("is-visible")) {
          searchPopup.classList.remove("is-visible");
          // showAds();
          searchPopup.removeEventListener("click", closeSearch);
          searchPopupExit.removeEventListener("click", goSearch);
          allowScroll();
        } else {
          preventScroll();
          settingsPopup.classList.remove("is-visible");
          categoryPopup.classList.remove("is-visible");
          searchPopup.classList.add("is-visible");
          searchPopup.addEventListener("click", closeSearch);
          // goSearch используется для обхода проверки на нажатие child элементов внутри closeSearch
          searchPopupExit.addEventListener("click", goSearch);
          document.addEventListener('keydown', function(e) {
              const key = e.key;
              if (key === "Escape") {
                  closeSearch();
                  this.removeEventListener('keydown', arguments.callee);
              }
          });
          // hideAds();
        }
      }
      document.getElementById("searchBox__input").focus();
    };

    const closeSearch = (e) => {
      if(e){
        if (e.target !== searchPopup) {
          return;
        }
      }
      
      if (searchPopup) {
        searchPopup.classList.remove("is-visible");
        // showAds();
        searchPopup.removeEventListener("click", closeSearch);
        allowScroll();
      }
    };

    const goCategory = () => {
      if (categoryPopup) {
        if (categoryPopup.classList.contains("is-visible")) {
          categoryPopup.classList.remove("is-visible");
          // showAds();
          categoryPopup.removeEventListener("click", closeCategory);
          categoryPopupExit.removeEventListener("click", goCategory);
          allowScroll();
        } else {
          preventScroll();
          settingsPopup.classList.remove("is-visible");
          searchPopup.classList.remove("is-visible");
          categoryPopup.classList.add("is-visible");
          categoryPopup.addEventListener("click", closeCategory);
          // goCategory используется для обхода проверки на нажатие child элементов внутри closeSearch
          categoryPopupExit.addEventListener("click", goCategory);
          document.addEventListener('keydown', function(e) {
              const key = e.key;
              if (key === "Escape") {
                  closeCategory();
                  this.removeEventListener('keydown', arguments.callee);
              }
          });
          // hideAds();
        }
      }
    };

    const closeCategory = (e) => {
      if(e){
        if (e.target !== e.currentTarget){
          return;
        } 
      }
      if (categoryPopup) {
        categoryPopup.classList.remove("is-visible");
        // showAds();
        categoryPopup.removeEventListener("click", closeCategory);
        allowScroll();
      }
    };

    const goSettings = () => {
      if (settingsPopup) {
        if (settingsPopup.classList.contains("is-visible")) {
          settingsPopup.classList.remove("is-visible");
          // showAds();
          settingsPopup.removeEventListener("click", closeSettings);
          settingsPopupExit.removeEventListener("click", goSettings);
          allowScroll();
        } else {
          preventScroll();
          categoryPopup.classList.remove("is-visible");
          searchPopup.classList.remove("is-visible");
          settingsPopup.classList.add("is-visible");
          settingsPopup.addEventListener("click", closeSettings);
          // goSettings используется для обхода проверки на нажатие child элементов внутри closeSearch
          settingsPopupExit.addEventListener("click", goSettings);
          document.addEventListener('keydown', function(e) {
              const key = e.key;
              if (key === "Escape") {
                  closeSettings();
                  this.removeEventListener('keydown', arguments.callee);
              }
          });
          // hideAds();
        }
      }
    };

    const closeSettings = (e) => {
      if(e){
        if (e.target !== e.currentTarget){
          return;
        } 
      }
      if (settingsPopup) {
        settingsPopup.classList.remove("is-visible");
        // showAds();
        settingsPopup.removeEventListener("click", closeSettings);
        allowScroll();
      }
    };

    const goTop = () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    };

    const showTooltip = (e) => {
      let tooltip =
        e.currentTarget.parentElement.getElementsByClassName("tooltip")[0];
      if (e.clientX > window.innerWidth / 2) {
        tooltip.style.left = e.clientX - tooltip.offsetWidth - 35 + "px";
      } else {
        tooltip.style.left = e.clientX + 35 + "px";
      }
      if (e.clientY < window.innerHeight - 100) {
        tooltip.style.top = e.clientY + "px";
      } else {
        tooltip.style.top = e.clientY - tooltip.offsetHeight / 2 + "px";
      }

      tooltip.style.opacity = "100%";
    };

    const tooltipOpacity = (e) => {
      let tooltip =
        e.currentTarget.parentElement.getElementsByClassName("tooltip")[0];
      tooltip.style.opacity = "0%";
    };

    // const showTooltip = (e) => {
    //   var x = e.clientX;
    //   var y = e.clientY;
    //   document.getElementByClassName("tooltip")[0].style.left = x ++ "px";
    //   document.getElementByClassName("tooltip")[0].style.top = y + "px";
    // };

    let tooltips = document.getElementsByClassName("tooltip");
    if (tooltips) {
      for (let i = 0; i < tooltips.length; i++) {
        tooltips[i].parentElement
          .getElementsByClassName("icon")[0]
          .addEventListener("mousemove", showTooltip);
        tooltips[i].parentElement
          .getElementsByClassName("icon")[0]
          .addEventListener("mouseout", tooltipOpacity);
      }
    }

    let radios = document
      .getElementById("theme-switcher")
      .getElementsByTagName("input");
    for (let i = 0; i < radios.length; i++) {
      radios[i].onclick = function () {
        if (this.value === "dark") {
          localStorage.setItem("theme", "dark");
          setDark();
        } else if (this.value === "light") {
          localStorage.setItem("theme", "light");
          setLight();
        } else {
          localStorage.removeItem("theme");
          if (
            window.matchMedia &&
            window.matchMedia("(prefers-color-scheme: dark)").matches
          ) {
            setDark();
          } else {
            setLight();
          }
        }
      };
    }

    if (theme) {
      if (theme === "dark") {
        document.getElementById("tab-3").checked = true;
      } else if (theme === "light") {
        document.getElementById("tab-2").checked = true;
      }
    }
  </script>
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