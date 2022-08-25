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
            --text: rgba(41, 41, 41, 0.999);
            --bg: rgba(255, 255, 255, 0.999);
            --hover: rgba(0, 0, 0, 0.3);
            --button: rgba(0, 0, 0);
            --progress: #dbdbdb;
            --popupbg: rgba(0, 0, 0, 0.5);
            --border: rgba(0, 0, 0, 0.1);
            --primary: #6d5dfc;
            --greyLight-1: #e4ebf5;
            --greyLight-2: #c8d0e7;
            --grey400: #939393;
            --greyDark: #9baacf;
            --selection: rgba(254, 235, 239, 0.99);
            --box: #f9f9f9;
            --codeselection: rgba(53, 59, 72, 0.99);
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
                --grey400: #939393;
                --greyDark: #b7b7b7;
                --box: rgb(33, 36, 37);
                --codeselection: rgba(254, 235, 239, 0.99);
            }
        }

        @media screen and (prefers-color-scheme: light) {
            body {
                --text: rgba(41, 41, 41, 0.999);
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
                --grey400: #939393;
                --greyDark: #9baacf;
                --box: #f9f9f9;
                --codeselection: rgba(53, 59, 72, 0.99);
            }
        }

        .cd-popup {
          visibility: hidden;
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
        style.setProperty("--box", "rgb(33, 36, 37)");
      };

      const setLight = () => {
        style.setProperty("--text", "rgba(41, 41, 41, 0.999)");
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
        style.setProperty("--box", "#f9f9f9");
      };
      var theme = localStorage.getItem("theme");
      if (theme) {
        if (theme == "dark") {
          setDark();
        } else if (theme == "light") {
          setLight();
        }
      }

      const notify = ({type,title,content,link,src}) => {
      let notificationArea = document.getElementById("notification-area");
      if (type === "text"){
        if (title && content) {
          let html = `<div class="notification notification-text slide-in-right">
                        <div class="notification-header--box">
                          <span data-nosnippet class="notification-header">${title}</span>
                          <figure class="icon" onclick="remove(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M23.707.293a1 1 0 0 0-1.414 0L12 10.586 1.707.293a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414L10.586 12 .293 22.293a1 1 0 0 0 0 1.414 1 1 0 0 0 1.414 0L12 13.414l10.293 10.293a1 1 0 0 0 1.414 0 1 1 0 0 0 0-1.414L13.414 12 23.707 1.707a1 1 0 0 0 0-1.414Z"></path>
                            </svg>
                          </figure>
                        </div>
                        <p data-nosnippet class="notification-content">${content}</p>
                    </div>`
          notificationArea.insertAdjacentHTML( 'afterbegin', html);
        } else {
          throw "Произошла ошибка при вызове уведомления 😣";
        }
      } else if (type === "video"){
        if (link && src) {
          let html = `<div class="notification notification-video slide-in-right">
                        <div class="notification-header--box">
                          <span data-nosnippet class="notification-header">📺 По этой статье я сняла видео!</span>
                          <figure class="icon" onclick="remove(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M23.707.293a1 1 0 0 0-1.414 0L12 10.586 1.707.293a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414L10.586 12 .293 22.293a1 1 0 0 0 0 1.414 1 1 0 0 0 1.414 0L12 13.414l10.293 10.293a1 1 0 0 0 1.414 0 1 1 0 0 0 0-1.414L13.414 12 23.707 1.707a1 1 0 0 0 0-1.414Z"></path>
                            </svg>
                          </figure>
                        </div>
                        <a href="${link}" class="notification-link" target="_blank"><img src="${src}" /></a>
                    </div>`
          notificationArea.insertAdjacentHTML( 'afterbegin', html);
        } else {
          throw "Произошла ошибка при вызове уведомления 😣";
        }
      } else if (type === "audio") {
        if (src) {
          let html = `<div class="notification notification-audio slide-in-right">
                        <div class="notification-header--box">
                          <span data-nosnippet class="notification-header">🎵 Эту статью можно прослушать!</span>
                          <figure class="icon" onclick="remove(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M23.707.293a1 1 0 0 0-1.414 0L12 10.586 1.707.293a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414L10.586 12 .293 22.293a1 1 0 0 0 0 1.414 1 1 0 0 0 1.414 0L12 13.414l10.293 10.293a1 1 0 0 0 1.414 0 1 1 0 0 0 0-1.414L13.414 12 23.707 1.707a1 1 0 0 0 0-1.414Z"></path>
                            </svg>
                          </figure>
                        </div>
                        <audio controls controlsList="nodownload noplaybackrate" src="${src}">
            Ваш браузер устарел 😣
        </audio>
                    </div>`
          notificationArea.insertAdjacentHTML( 'afterbegin', html);
        } else {
          throw "Произошла ошибка при вызове уведомления 😣";
        }
      }else {
        throw "Произошла ошибка при вызове уведомления 😣";
      }
    }
    </script>
    <div id="progress">
      <div id="progress-bar"></div>
    </div>
    <div id="notification-area">
      <!-- <div class="notification notification-text">
        <div class="notification-header--box">
          <span data-nosnippet class="notification-header">Тестовое сообщение</span>
          <figure class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M23.707.293a1 1 0 0 0-1.414 0L12 10.586 1.707.293a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414L10.586 12 .293 22.293a1 1 0 0 0 0 1.414 1 1 0 0 0 1.414 0L12 13.414l10.293 10.293a1 1 0 0 0 1.414 0 1 1 0 0 0 0-1.414L13.414 12 23.707 1.707a1 1 0 0 0 0-1.414Z"></path>
            </svg>
          </figure>
        </div>
        <p data-nosnippet class="notification-content">Всем пиривет :3 Сегодня мы с вами протестируем работу системы оповещаний на прекрасном сайтике https://mebbr.ru</p>
      </div>
      <div class="notification notification-video">
        <div class="notification-header--box">
          <span span data-nosnippet class="notification-header">📺 По этой статье я сняла видео!</span>
          <figure class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M23.707.293a1 1 0 0 0-1.414 0L12 10.586 1.707.293a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414L10.586 12 .293 22.293a1 1 0 0 0 0 1.414 1 1 0 0 0 1.414 0L12 13.414l10.293 10.293a1 1 0 0 0 1.414 0 1 1 0 0 0 0-1.414L13.414 12 23.707 1.707a1 1 0 0 0 0-1.414Z"></path>
            </svg>
          </figure>
        </div>
        <a href="//youtube.com/DefaultJarpex" class="notification-link"><img src="https://cdn.mebbr.ru/wp-content/uploads/2020/07/Обзор-монитора-Samsung-S32R750QEI.webp" /></a>
      </div>
      <div class="notification notification-audio">
        <div class="notification-header--box">
          <span data-nosnippet class="notification-header">🎵 Эту статью можно прослушать!</span>
          <figure class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M23.707.293a1 1 0 0 0-1.414 0L12 10.586 1.707.293a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414L10.586 12 .293 22.293a1 1 0 0 0 0 1.414 1 1 0 0 0 1.414 0L12 13.414l10.293 10.293a1 1 0 0 0 1.414 0 1 1 0 0 0 0-1.414L13.414 12 23.707 1.707a1 1 0 0 0 0-1.414Z"></path>
            </svg>
          </figure>
        </div>
        <audio controls controlsList="nodownload noplaybackrate" src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3">
            Ваш браузер устарел 😣
        </audio>
      </div> -->
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
        <a href="{site:url}" class="logo"> {site:name} </a>
        <p class="header_desc">{site_description}</p>
        <div class="nav_flex">
          <nav class="nav" role="navigation">
            <ul style="list-style:none;padding:0;"><?php wp_list_categories('title_li='); ?></ul>
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
        <a href="{site:url}" class="logo"> {site:name} </a>
        <p class="header_desc">{site_description}</p>
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
          action="https://{site:domain}/wp-login.php"
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
              value="https://{site:domain}/wp-admin/"
            />
            <input type="hidden" name="testcookie" value="1" />
          </div>
        </form>
      </div>
    </div>
    <nav id="navigation">
      <div class="tooltip-box">
        <a href="{site:url}" id="navigation__home" class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
              d="m23.121 9.069-7.585-7.586a5.008 5.008 0 0 0-7.072 0L.879 9.069A2.978 2.978 0 0 0 0 11.19v9.817a3 3 0 0 0 3 3h18a3 3 0 0 0 3-3V11.19a2.978 2.978 0 0 0-.879-2.121ZM15 22.007H9v-3.934a3 3 0 0 1 6 0Zm7-1a1 1 0 0 1-1 1h-4v-3.934a5 5 0 0 0-10 0v3.934H3a1 1 0 0 1-1-1V11.19a1.008 1.008 0 0 1 .293-.707L9.878 2.9a3.008 3.008 0 0 1 4.244 0l7.585 7.586a1.008 1.008 0 0 1 .293.704Z"
            />
          </svg>
        </a>
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
                    'showposts'=>5,
                    'orderby'=>rand(),
                    'caller_get_posts'=>1);
                $my_query = new wp_query($args);
                if( $my_query->have_posts() ) {
                    echo '<div id="related-header"><h2>Материалы по теме</h2><img draggable="false" role="img" class="emoji" alt="🔮" src="//static.mebbr.ru/fonts/mebbr/1f52e.svg"></div><div id="related-container"><ul>';
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        ?>
                          <?php if( ! empty( $post->post_title ) ) : ?>
                            <li><a class="rel-title" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a></li>
                          <?php endif; ?>
                        <?php
                    }
                }
                wp_reset_query();
                echo '</ul></div><hr>';
            }
        ?>
        <?php if( has_tag() ) :  ?>
            <div id="article_tags">
                <?php 
                    $posttags = get_the_tags();
                    $html = "";
                    if( $posttags ){
                        foreach( $posttags as $tag ){
                            $html .= '<a href="' . esc_attr( get_tag_link( $tag->term_id ) ) . '">' . $tag->name . '</a>';
                        }
                        echo $html;
                    }
                ?>
            </div>
        <?php  endif;  ?>
        <?php  echo '</div>'; ?>
        <div id="comments-box">
          <?php
            $comments = get_comments();
            if( get_comments_number() ){ ?>
              <div id="comments">
                <ol>
                  <?php
                    wp_list_comments(
                      array(
                        'style' => 'ol', // формировать список элементов для тега <ol>
                        'per_page' => 0, // количество комментариев на странице
                        'page' => 1,
                        'avatar_size' => 50, // размер аватара пользователя
                        )
                    );
                  ?>
                </ol>
                </div>
              <?php }?> 
              <?php  if( get_comments_number() > 10){ the_comments_pagination(); }?> 
          <?php comment_form(); ?>
        </div>
        

        
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
    let progressAllowed = true;
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

    const vw = (v) => {
      let w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
      return (v * w) / 100;
    }

    const progressBarUpdate = (scrollPos) => {
      if (progressAllowed){
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
      }
    };

    document.addEventListener("scroll", function (e) {
      lastKnownScrollPosition = window.scrollY;

      if (!ticking) {
        window.requestAnimationFrame(function () {
          progressBarUpdate(lastKnownScrollPosition);
          ticking = false;
        });

        ticking = true;
      }
    });

    const preventScroll = () => {
      let stylePosition = document.body.style.position;
      progressAllowed = false;
      if (window.matchMedia("(min-width: 1200px) and (orientation: landscape)").matches){
        document.getElementById("progress").style.maxWidth = `${document.documentElement.clientWidth - vw(3)}px`;
      }
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
      document.getElementById("progress").style.maxWidth = "";
      window.scrollTo(0, parseInt(scrollY || "0") * -1);
      progressAllowed = true;
    };

    const remove = (el) => {
      el.parentNode.parentNode.classList.add("slide-out-bck-center");
      setTimeout(function(){
        el.parentNode.parentNode.remove();
      }, 500);
    }

    const goSearch = () => {
      if (searchPopup) {
        if (searchPopup.classList.contains("is-visible")) {
          searchPopup.classList.remove("is-visible");
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
        searchPopup.removeEventListener("click", closeSearch);
        allowScroll();
      }
    };

    const goCategory = () => {
      if (categoryPopup) {
        if (categoryPopup.classList.contains("is-visible")) {
          categoryPopup.classList.remove("is-visible");
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
        categoryPopup.removeEventListener("click", closeCategory);
        allowScroll();
      }
    };

    const goSettings = () => {
      if (settingsPopup) {
        if (settingsPopup.classList.contains("is-visible")) {
          settingsPopup.classList.remove("is-visible");
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

    // let everyNotification = notificationArea.getElementsByClassName("notification");
    // for (let i = 0; i < everyNotification.length; i++) {
    //   everyNotification[i].getElementsByClassName("icon")[0].onClick = function () {
    //     this.parentNode.parentNode
    //   }
    // }
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