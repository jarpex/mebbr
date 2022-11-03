<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MEBBR
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="//static.mebbr.ru">
	<link rel="preconnect" href="//cdn.suckless.ru">
    <link rel="preload" href="//static.mebbr.ru/fonts/mebbr/PTSerif.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="//static.mebbr.ru/fonts/mebbr/Mont.woff2" as="font"type="font/woff2" crossorigin>
	<link rel="preload" href="//static.mebbr.ru/fonts/mebbr/PT-Mono_Regular.woff2" as="font"type="font/woff2" crossorigin>
    <link rel="dns-prefetch" href="//mc.yandex.ru">
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
        
        .tooltip {
          opacity: 0;
        }
    </style>
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mebbr' ); ?></a>
	<!-- #masthead -->
 