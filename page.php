<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#111">
    <link rel="apple-touch-icon" sizes="180x180" href="//static.mebbr.ru/apple-touch-icon.png?v=gAdP3v0QAo">
    <link rel="icon" type="image/png" sizes="32x32" href="//static.mebbr.ru/favicon-32x32.png?v=gAdP3v0QAo">
    <link rel="icon" type="image/png" sizes="16x16" href="//static.mebbr.ru/favicon-16x16.png?v=gAdP3v0QAo">
    <link rel="manifest" href="//static.mebbr.ru/site.webmanifest?v=gAdP3v0QAo">
    <link rel="mask-icon" href="//static.mebbr.ru/safari-pinned-tab.svg?v=gAdP3v0QAo" color="#111111">
    <link rel="shortcut icon" href="//static.mebbr.ru/favicon.ico?v=gAdP3v0QAo">
    <meta name="msapplication-TileColor" content="#111111">
    <meta name="msapplication-config" content="//static.mebbr.ru/browserconfig.xml?v=gAdP3v0QAo">
    <meta name="theme-color" content="#111111">
    <meta name="twitter:creator" content="@DefaultJarpex">
    <link rel="canonical" href="<?php get_page_link(); ?>">
    <link rel="alternate" type="application/rss+xml" title="MEBBR » Лента" href="//mebbr.ru/feed/">
    <link rel="next" href="//mebbr.ru/">
    <link rel="preconnect" href="//static.mebbr.ru">
    <link rel="preload" href="//mebbr.ru/fonts/mebbr.woff2" as="font" type="font/woff2" crossorigin="">
    <link rel="dns-prefetch" href="//mc.yandex.ru">
    <link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
    <link rel="dns-prefetch" href="//adservice.google.ru">
    <link rel="dns-prefetch" href="//stats.g.doubleclick.net">
    <link rel="dns-prefetch" href="//adservice.google.com">
    <link rel="dns-prefetch" href="//googleads.g.doubleclick.net">
    <!--
    /**
    * @license
    * MyFonts Webfont Build ID 3797926, 2019-08-16T04:16:53-0400
    * 
    * The fonts listed in this notice are subject to the End User License
    * Agreement(s) entered into by the website owner. All other parties are 
    * explicitly restricted from using the Licensed Webfonts(s).
    * 
    * You may obtain a valid license at the URLs below.
    * 
    * Webfont: Mont-Regular by Fontfabric
    * URL: https://www.myfonts.com/fonts/font-fabric/mont/regular/
    * Copyright: Modern and elegant sans serif font family.
    * Licensed pageviews: 10,000
    * 
    * 
    * License: https://www.myfonts.com/viewlicense?type=web&buildid=3797926
    * 
    * © 2019 MyFonts Inc
    */

    -->

    <script type="text/javascript">
    //uncomment and change this to false if you're having trouble with WOFFs
    //var woffEnabled = true;
    //to place your webfonts in a custom directory 
    //uncomment this and set it to where your webfonts are.
    var customPath = "//static.mebbr.ru/fonts";
    </script>
    <script type="text/javascript" src="//static.mebbr.ru/fonts/MEBBR_Crossdomain_Fix.js"></script>
    <title><?php the_title();?></title>
    <style>
        /*Переменные цвета:*/
        :root{
                --text: #111;
                --bg: #fff;
                /*--border: #ddd;*/
                --border: #e9e9e9;
                --hover: #ccc;
        }
        /*Все, что касается шрифтов.*/
        @font-face {
            font-family: 'mebbr';
            src: url('//mebbr.ru/fonts/mebbr.woff2') format('woff2'),
                 url('//mebbr.ru/fonts/mebbr.woff')  format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: block;
        }
        /*Универсальные параметры*/
        body{
            color: var(--text);
            background-color: var(--bg);
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            text-rendering: optimizelegibility;
            margin: 0;
        }
        .content{
            width: 90%;
            max-width: 720px;
            font-size: 18px;
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            margin: 0 auto;
        }
        
        h1 {
            font-size: 28px;
            margin: 20px 0 -20px 0;
            word-wrap: break-word;
        }
        h3 {
            font-size: 24px;
        }
        h2 {
            font-size: 24px;
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            font-weight: 700;
        }
        h1, h3, .timer {
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            font-weight: 700;
            color: var(--text);
        }
        .timer {
            font-size: 12px;
            text-align: right;
            margin-bottom: -10px;
        }
        .timer a{
            color: var(--text);
        }
        .content blockquote{
            margin: 22px 8%;
            padding-left: 10px;
            border-left: 3px solid var(--text);
        }
        .content img:not(.avatar), .content figure img{
            display: block;
            max-width: 100%;
            max-height: 100%;
            margin: 20px auto;
        }
        .p_link a {
            color: var(--text);
            text-decoration: underline;
        }
        .content article ul li a {
            color: var(--text);
            text-decoration: underline;
        }
        .content  article a:not(.button,.timer){
            color: var(--text);
            margin-bottom: 30px;
            text-decoration: none;
            text-shadow: var(--bg) -1px -1px 0px, var(--bg) 1px -1px 0px, var(--bg) 1px 0px 0px, var(--bg) 0px 1px 0px, var(--bg) -1px 1px 0px, var(--bg) 1px 1px 0px;
            background-image: -webkit-linear-gradient(bottom, var(--text), var(--text) 1px, transparent 1px, transparent);
            background-image: -o-linear-gradient(bottom, var(--text), var(--text) 1px, transparent 1px, transparent);
            background-image: linear-gradient(to top, var(--text), var(--text) 1px, transparent 1px, transparent);
            background-position: 0 1.28em;
        }
        
        .button {
            margin: 20px auto;
            font-family: Mont-Regular, 'Open Sans', 'Lato', 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            max-width: 150px;
            font-size: 16px;
            padding: 5px 20px;
            background-color: var(--border);
            text-decoration: none;
            border: none;
            border-radius: 5px;
            color: var(--text);
            display: block;
            text-align: center;
            -webkit-transition: .4s;
            -o-transition: .4s;
            transition: .4s;
        }
        .button:hover, #submit:hover {
            background-color: var(--hover);
        }
        .content article a::-moz-selection{
            text-shadow: none;
        }
        .content article a::selection{
            text-shadow: none;
        }
        .search_icon, .menu_icon, .theme_icon, .social_icons, .pc_scroll, .comments_button, .pocket, .mobile_scroll{
            font-family: mebbr;
            opacity: .7;
            text-decoration: none;
            cursor: pointer;
        }
        .search_icon::selection, .menu_icon::selection, .theme_icon::selection, .social_icons::selection, .pc_scroll::selection, .comments_button::selection, .pocket::selection, .mobile_scroll::selection {
            background: var(--bg);
            color: var(--text);
        }
        ::-moz-selection {
            background: var(--text);
            color: var(--bg);
            }
        ::selection {
            background: var(--text);
            color: var(--bg);
        }
        .wrapper_bg{
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 100vw;
            background-color: #000;
            display: none;
            opacity: 0;
            z-index: 49;
            -webkit-transition: .4s;
            -o-transition: .4s;
            transition: .4s;
        }
        .wrapper{
            position: fixed;
            height: 100%;
            z-index: 50;
            background: var(--bg);
            -webkit-box-shadow: 2px 0px 15px 0 rgba(0,0,0,.2);
                    box-shadow: 2px 0px 15px 0 rgba(0,0,0,.2);
            -webkit-transition: all .3s ease, background-color .5s ease;
                 -o-transition: all .3s ease, background-color .5s ease;
                    transition: all .3s ease, background-color .5s ease;
        }
        .wrapper_close{
            transform-origin: 0% 0%;
            transform: translate(-100%, 0);
            -webkit-transition: all .3s ease-out 0s, -webkit-box-shadow .6s;
            transition: all .3s ease-out 0s, -webkit-box-shadow .6s;
            -o-transition: all .3s ease-out 0s, box-shadow .6s;
            transition: all .3s ease-out 0s, box-shadow .6s;
            transition: all .3s ease-out 0s, box-shadow .6s, -webkit-box-shadow .6s;
            box-shadow: none;
        }
        .wrapper_open{
            left: 0;
        }
        .search_form{
            border-bottom: 1px solid var(--border);
            padding: 20px 16px;
        }
        .search{
            position: relative;
        }
        .searchbox{
            font-family: Mont-Regular;
            user-select: auto;
            background-color: var(--bg);
            border: 1px solid var(--border);
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
            color: var(--text);
            display: block;
            font-size: 14px;
            line-height: 1.5;
            margin: 0;
            min-height: 40px;
            outline: 0;
            padding: 0 29px 0 14px;
            -webkit-transition: border-color .2s linear,-webkit-box-shadow .2s linear;
                    transition: border-color .2s linear,-webkit-box-shadow .2s linear;
                 -o-transition: border-color .2s linear,box-shadow .2s linear;
                    transition: border-color .2s linear,box-shadow .2s linear;
                    transition: border-color .2s linear,box-shadow .2s linear,-webkit-box-shadow .2s linear;
            width: 100%;
        }
        .searchbox:focus {
            outline: none;
            -webkit-box-shadow: none;
                    box-shadow: none;
            border-color: #a3c4e2;
        }
        .search_icon {
            font-family: mebbr;
            color: var(--text);
            opacity: .7;
            font-size: 15px;
            right: 2px;
            line-height: 40px;
            position: absolute;
            top: 0;
            border-style: none;
            background-color: transparent;
        }
        .menu a{
            display: block;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
            font-size: 18px;
            font-weight: normal;
            text-decoration: none;
            color: var(--text);
            text-align: left;
        }
        .menu a:hover{
           text-decoration: underline;
        }
        .social_icons{
            font-size: 18px;
            -ms-flex-pack: distribute;
               justify-content: space-around;
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
             -webkit-box-align: center;
                -ms-flex-align: center;
                   align-items: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%;
            position: absolute;
            bottom: 0;
            padding: 18px 0;
        }
        .social_icons a{
            text-decoration: none;
            color: var(--text);
        }
        .header {
            background-color: var(--bg);
            -webkit-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1);
                    box-shadow: 0 2px 3px 0 rgba(0,0,0,.1);
            position: relative;
            z-index: 30;
        }
        .header_container {
            -webkit-box-align: center;
               -ms-flex-align: center;
                  align-items: center;
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            height: 60px;
            -webkit-box-pack: justify;
               -ms-flex-pack: justify;
             justify-content: space-between;
            margin: 0 auto;
            max-width: 780px;
            min-width: 320px;
            padding: 0 16px;
        }
        .menu_icon {
            color: var(--text);
            opacity: .7;
            left: 0;
            width: 20px;
            font-family: mebbr;
            cursor: pointer;
            font-size: 22px;
            -moz-transform: scale(1.2, 1);
            -webkit-transform: scale(1.2, 1);
            -ms-transform: scale(1.2, 1);
            transform: scale(1.2, 1);
            padding: 10px;
        }
        .logo {
            color: var(--text);
            font-family: Mont-Regular;
            display: inline-block;
            text-decoration: none;
            font-size: 31px;
            outline: none !important;
            padding: 5px;
        }
        .theme_icon {
            color: var(--text);
            opacity: .7;
            height: 20px;
            right: 0;
            width: 20px;
            font-family: mebbr;
            cursor: pointer;
            font-size: 20px;
            margin-top: -3px;
            padding: 10px;
        }
        /*Запрет на выделения*/
        .pc_scroll, .header, .wrapper, .footer{
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        /*Фикс выдеделения при нажатии*/
        .searchbox:hover, .search_icon:hover, .menu_icon:hover, .social_icons:hover, .header:hover, .footer:hover, .pc_scroll:hover, #comment:hover, #comment:focus, .comment-form-author input:hover, .comment-form-email input:hover, .comment-form-author input:focus, .comment-form-email input:focus {
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0) !important; 
            -webkit-focus-ring-color: rgba(255, 255, 255, 0) !important; 
            outline: none !important;
        }
        /*Группировка настроек анимации*/
        body, .content  article a, .header, .menu_icon, .logo, .theme_icon, .search_form, .searchbox, .menu a, .social_icons, .pc_scroll, .comments_button, .pocket, .mobile_scroll{
            -webkit-transition: all .5s ease;
            -o-transition: all .5s ease;
            transition: all .5s ease;
        }
        .content blockquote{
            -webkit-transition: border-color .5s ease;
            -o-transition: border-color .5s ease;
            transition: border-color .5s ease;
        }
        /*Комментарии*/
        .comment-body{
            border-top: solid var(--border) 1px;
            padding-top: 10px; 
            font-family: 'Open Sans';
            font-size: 19px;
        }
        .comments ul{
            list-style: none;
        }
        .comments article {
            display: flex;
            flex-direction: column;
        }
        .comment-meta {
            display: flex;
        }
        .comment-author {
            display: flex;
        }
        .avatar {
            margin-right: 10px;
            width: 64px;
            height: 64px;
        }
        .comment-metadata {
            order: 999;
            margin-left: auto;
            display: flex;
            flex-direction: column;
        }
        .comment-metadata a:not(.comment-edit-link) {
            flex: 1;
            text-shadow: none !important;
            text-decoration: none !important;
            background-image: none !important;
        }
        .edit-link {
            flex: 2;
            margin-top: -30px;
            text-align: right;
        }
        .edit-link a{
            background-position: 0 1.3em !important;
        }
        .comment-content {
            flex: 2;
            margin: -10px 0 -30px 0;
            word-break: break-all;
        }
        .reply {
            flex: 3;
            margin: 20px 0;
            text-align: left;
        }
        .reply a{
            background-position: 0 1.3em !important;
        }
        .logged-in-as a{
            text-decoration: none !important;
            color: var(--text) !important;
            text-decoration: none;
            color: var(--text);
            font-family: 'Open Sans';
            font-size: 19px;
        }
        .required {
            margin: -3px 10px 0 2px;
            color: red;
            font-size: 14px;
        }
        .comment-form-comment {
            display: flex;
            flex-direction: column;
        }
        .comment-form{
            font-family: Mont-Regular,'Open Sans','Lato','Roboto',-apple-system,BlinkMacSystemFont,'Segoe UI',Oxygen,Ubuntu,Cantarell,'Helvetica Neue',sans-serif;
            font-size: 19px;
        }
        .comment-form-comment label {
            margin-bottom: 10px;
        }
        #comment{
            border: none;
            background-color: var(--border);
            color: var(--text);
            border-radius: 10px;
        }
        .comment-form-author{
            display: flex;
            flex-direction: row;
        }
        .comment-form-author label, .comment-form-email label{
            display: flex;
            width: 100px;
        }
        #commentform input{
            font-family: 'Open Sans';
            font-size: 19px;
            border: none;
            background-color: var(--border);
            color: var(--text);
            width: 100%;
            padding: 2px 5px;
            border-radius: 5px;
        }
        .comment-form-email{
            display: flex;
            flex-direction: row;
        }
        .form-submit {
            text-align: center;
        }
        #submit {
            border-radius: 5px;
            padding: 10px 0 !important;
            cursor: pointer;
            text-decoration: none;
            max-width: 300px;
            text-align: center;
            margin: 20px 0;
            -webkit-transition: .4s;
            -o-transition: .4s;
            transition: .4s;
        }
        .comment-notes{
            font-size: 13px;
            margin: 5px 0 -15px 0;
        }
        .comment-reply-title a, #cancel-comment-reply-link{
            color: var(--text);
        }
        .comment-reply-title a:not(#cancel-comment-reply-link)::after{
            content: '.';
        }
        .comment-reply-title small{
            float: right;
        }
       
        /*Подсветка кода*/
        .depth-5 {
            margin-bottom: 25px;
        }
        .hljs {
        margin: 0;
        display: block;
        overflow-x: auto;
        padding: .5em;
        background: #282a36;
        font-family: Hack, Terminus, monospace;
        font-size: 14px;
        word-spacing: 0;
        letter-spacing: .8px;
        line-height: 1.5em;
        }

        .hljs-keyword,
        .hljs-selector-tag,
        .hljs-literal,
        .hljs-section,
        .hljs-link {
        color: #8be9fd;
        }

        .hljs-function .hljs-keyword {
        color: #ff79c6;
        }

        .hljs,
        .hljs-subst {
        color: #f8f8f2;
        }

        .hljs-string,
        .hljs-title,
        .hljs-name,
        .hljs-type,
        .hljs-attribute,
        .hljs-symbol,
        .hljs-bullet,
        .hljs-addition,
        .hljs-variable,
        .hljs-template-tag,
        .hljs-template-variable {
        color: #f1fa8c;
        }

        .hljs-comment,
        .hljs-quote,
        .hljs-deletion,
        .hljs-meta {
        color: #6272a4;
        }

        .hljs-emphasis {
        font-style: italic;
        }
        .wp-block-table{
            border: 1px solid var(--border);
        }
        .wp-block-table TD, TH{
            border: 1px solid var(--border);
            padding: 10px;
        }
        @media screen and (min-width: 1201px) and (orientation: landscape) {
            .wrapper {
                width: 20%;
            }
            .content{
                font-size: 18px;
            }
            .content p:not(.timer) {
                margin-bottom: 1.5em;
            }
            .content h1{
                font-size: 32px;
				margin: 30px 0 10px 0;
            }
            .timer {
                font-size: 16px;
                font-weight: Normal;
                padding-bottom: 5px;
            }
            .content h3 {
                font-size: 26px;
                margin-bottom: 1em;
            }
            blockquote p{
                margin: 30px 0;
            }
            .button {
                margin: 20px auto;
            }
            .content img, .content figure img {
                padding: 5px 0;
            }
            .footer_container {
                display: none;
            }
            .pc_scroll {
                position: fixed;
                font-size: 36px;
                right: 5vw;
                bottom: 5vw;
                font-style: mebbr;
                cursor: pointer;
                background-color: transparent;
                font-style: none;
                color: var(--text);
                opacity: .2;
                border-style: none;
            }
            .pc_scroll:hover {
                opacity: .9;
            }
            #comment{
                max-width: 698px;
                width: 827px;
                font-size: 19px;
                font-family: Mont-Regular, "Open Sans";
                padding: 10px;
                min-height: 227px;
                min-width: 698px;
            }
        }
        @media screen and (orientation: portrait), screen and (orientation: landscape) and (max-width: 1200px){
            .wrapper {
                width: 70%;
            }
            .content:not(.hljs) {
                width: 90%;
                font-size: 19px;
                line-height: 1.4em;
            }
            .content h1 {
                font-size: 24px;
                line-height: 1.5em;
                font-weight: 800;
            }
            .content h3 {
                font-size: 21px;
                line-height: 1.4em;
                font-weight: 800;
                margin: -7px 0;
            }
            .content h2{
                font-size: 22px;
                line-height: 1.4em;
                font-weight: 800;
                margin: 45px 0 -5px 0;
            }
            .timer {
                font-size: 14px;
                word-spacing: -1px;
                margin: 20px 0 -10px 0;
            }
            .rel_button:hover {
                opacity: .7;
            }
            .pc_scroll {
                display: none;
            }
            .footer {
                z-index: 31;
                background-color: var(--bg);
                height: 50px;
                width: 100%;
                position: fixed;
                left: 0px;
                /*border-top: 1px solid var(--border);*/
                -webkit-box-shadow: 0 -2px 3px 0 rgba(0,0,0,.1);
                        box-shadow: 0 -2px 3px 0 rgba(0,0,0,.1);
                text-decoration: none;
                background-color: var(--bg);
                -webkit-transition: all .2s ease-out 0s, background-color .5s ease;
                -o-transition: all .2s ease-out 0s, background-color .5s ease;
                transition: all .2s ease-out 0s, background-color .5s ease;
            }
            .fixed-top {
                bottom: 0px;
            }
            .fixed-bottom{
                bottom: -55px;
            }
            .footer_container {
                -webkit-box-align: center;
                    -ms-flex-align: center;
                        align-items: center;
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                height: 50px;
                -webkit-box-pack: justify;
                    -ms-flex-pack: justify;
                        justify-content: space-between;
                margin: 0 auto;
                max-width: 780px;
                min-width: 320px;
                padding: 0 16px;
                font-family: mebbr;
            }
            .footer_container button:focus {
                outline: none;
            }
            .comments_button {
                color: var(--text);
                opacity: .7;
                left: 0;
                padding: 10px;
                cursor: pointer;
                font-size: 22px;
                text-decoration: none;
                border: none;
                background: transparent;
            }
            .pocket {
                color: var(--text);
                padding: 10px;
                display: inline-block;
                text-decoration: none;
                font-size: 18px;
                text-decoration: none;
                border: none;
                background: transparent;
            }
            .mobile_scroll {
                color: var(--text);
                opacity: .7;
                padding: 10px;
                right: 0px;
                cursor: pointer;
                font-size: 22px;
                text-decoration: none;
                border: none;
                background: transparent;
            }
            #comments-list {
                margin-top: 30px;
            }
            .comments-title{
                font-size: 20px;
            }
            #comments-list ul {
                padding-left: 0px;
            }
            .children {
                margin-left: 3%;
            }
            .comment-meta{
                margin-bottom: -20px;
            }
            .comment-metadata{
                font-size: 16px;
            }
            .comment-body{
                font-size: 16px;
            }
            .avatar-64 {
                width: 32px !important;
                height: 32px !important;
            }
            .comment-form-author label, .comment-form-email label{
                width: 120px;
            }
            .comment-notes{
                margin-top: 20px;
                font-size: 16px;
                line-height: 1.4em;
            }
            #comment{
                padding: 10px;
                font-size: 19px;
            }
        }
        @media print {
            body{
                color: #000;
                background: transparent !important;
                -webkit-box-shadow: none !important;
                box-shadow: none !important;
                text-shadow: none !important;
            }
            @page {
                size: auto;
                margin: 0;
            }
            .wrapper_bg, .wrapper, .header, .adsbygoogle, .related, .comments, .pc_scroll, .footer{
                display: none;
            }
            .content {
                margin: 5mm 0;
                width: auto; margin: 15mm; 
	            padding: 0; 
	            border: 0; 
	            float: none !important; 
	            color: black; 
	            background: transparent; 
                font-size: 21px;
                line-height: 1.3em;
            }
            .content blockquote {
                margin: -4mm 8%;
                border: none;
            }
            .content blockquote p {
                border-left: 3px solid #000;
                padding-left: 10px;
            }
            .content a, a:visited {
                color: #000 !important;
                text-shadow: none !important;
                text-decoration: underline !important;
            }
            .content a:not(.button)[href]:after {
                content: " —"open-quote"Адрес ссылки: " attr(href) close-quote;
            }
            .content .button{
                border: 1px solid #000;
                max-width: 10cm;
                text-decoration: none !important;
            }
            .content .button::after{
                content:  " — "open-quote attr(href) close-quote;
                font-size: 10px;
            }
            .content abbr[title]:after {
                content: " — "open-quote"Аббревиатура: " attr(title) close-quote;
            }
            .content a[href^="#"]:after, a[href^="javascript:"]:after {
                content: "";
            }
            .content rel, .content  blockquote, .content tr, .content img, .content figure img{
                display: inline-block;
            }
            .content code {
                white-space: pre-wrap !important;
                border: 1px solid #000;
                margin: 1mm 0 4mm 0;
            }
            .content thead {
                display: table-header-group;
            }
            .content tr, .content img, .content figure img, .content  blockquote {
                page-break-inside: avoid
            }
            .content p, .content h1, .content h3 {
                orphans: 3;
                widows: 3;
            }
            .content h1, .content h3 {
                page-break-after: avoid;
            }
            .content img, .content figure img{
                page-break-before: avoid;
            }
            .content h1{
                font-size: 27px;
                margin-bottom: 7mm;
            }
            .content h3{
                font-size: 21px;
                font-weight: 600;
            }
            .timer {
                font-size: 16px;
                word-spacing: -1px;
            }
        }
        @media tty {
            .wrapper_bg, .wrapper, .header, .adsbygoogle, .pc_scroll, .footer, .content img, .content figure img{
                display: none;
            }
            .content a, a:visited {
                text-decoration: underline !important;
            }
        }
        /*Fix для кнопок соц сетей при маленькой высоте экрана*/
        @media (max-height: 450px) {
            .wrapper {
                width: 70%;
            }
            .social_icons {
                display: none;
            }
        }
        #author {
            max-width: 70vw;
        }
        #email {
            max-width: 70vw;
        }
        .ytcontainer {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
        }
        .video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <?php wp_head()?>
    <div onclick='MenuClose()' class="wrapper_bg"></div>
    <div class="wrapper wrapper_close">
        <form class="search_form" role="search" method="get" id="searchform" action="//mebbr.ru">
            <div class="search">
                <input name="s" class="searchbox" placeholder="Поиск" type="text" maxlength="100"/>
                <input type="submit" id="searchsubmit" class="search_icon" value="">
            </div>
        </form>
        <div class="menu">
            <a href="//mebbr.ru/lifehacks/">Лайфхаки</a>
            <a href="//mebbr.ru/internet/">Интернет</a>
            <a href="//mebbr.ru/software/">Программы</a>
            <a href="//mebbr.ru/hardware/">Железо</a>
            <a href="//mebbr.ru/education/">Образование</a>
        </div>
        <div class="social_icons">
            <a href="//twitter.com/RU_MEBBR/"></a>
            <a href="//vk.com/mebbr"></a>
            <a href="//www.youtube.com/playlist?list=PLJ52LZ9E-uowOubcIPh3yDGKKcryQ5-Mm"></a>
            <a href="//t.me/RU_MEBBR/"></a>
            <a href="//mebbr.ru/feed/"></a>
        </div>
    </div>
    <header class="header">
        <div class="header_container">
            <span onclick='MenuOpen()' class="menu_icon"></span>
            <a class="logo" href="//mebbr.ru">MEBBR</a>
            <a onclick='Toggle()' class="theme_icon"></a>
        </div>
    </header>
    <div class="content">
        <article id="main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <?php endwhile; else : ?>
            <h2>Записи не найдены.</h2>
            <?php endif; ?>
        </article>
        <!--<div class="related">
            Когда-нибудь позже
        </div>-->
        <div class="comments">
            <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
        </div>
        <button class="pc_scroll" onclick="Move_To ()"></button>
    <footer class="footer fixed-top">
        <div class="footer_container">
            <button class="comments_button" onclick="Move_To_Comments()"></button>
            <button target='_blank' class="pocket"></button>
            <button class="mobile_scroll" onclick='Move_To ()'></button>
        </div>
    </footer>
    <?php wp_footer()?>
</body>
<script async src='//static.mebbr.ru/js/mebbr.js'></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<link rel='stylesheet' href='//cdn.jsdelivr.net/npm/hack-font@3.3.0/build/web/hack.css' media="none" onload="if(media!='all')media='all'">
</html>