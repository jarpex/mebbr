<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MEBBR
 * 
 * Template Name: Главная страница
 */

get_header();
?>
<link rel="preload" href="<?php echo home_url('/wp-content/themes/mebbr-b/css/min/home.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo home_url('/wp-content/themes/mebbr-b/css/min/home.css'); ?>"></noscript>  
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
            margin: 0;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-content: center;
            justify-content: center;
            align-items: center;
            height: 100%;
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

        #searchsubmit {
          background-color: transparent;
          border: none;
          cursor: pointer;
          padding: 0.5vw 1vw;
          opacity: 40%;
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
<main id="primary" class="site-main">
  <header>
    <div class="header__left-box">
      <div class="logo">
        <?php echo get_custom_logo(); ?>
      </div>
      <h1 class="site-name">
        <?php echo get_bloginfo('name'); ?> 
      </h1>
      <h2 class="site-description">
        <?php echo get_bloginfo('description'); ?> 
      </h2>
    </div>
    <div class="header__right-box">
      <?php 
      if ( is_user_logged_in() ) {
        if ( current_user_can( 'edit_posts' ) ){
          if( current_user_can( 'manage_options' ) ){ 
            echo '
              <button onclick="location.href=\''.site_url()."/wp-admin/post-new.php".'\'" type="button">
                Новый пост
              </button>
              <button onclick="location.href=\''.site_url()."/wp-admin/".'\'" type="button">
                Админка
              </button>
              <button onclick="location.href=\''.wp_logout_url().'\'" type="button">
                Выход
              </button>
            '; 
          } else {
            echo '<p>не админ</p>';
          }
        } else {
          echo '
            <p>не может писать</p>
            <button onclick="location.href=\''.wp_logout_url().'\'" type="button">
              Выход
            </button>
          ';  
        }
      }
      else {
        echo '
          <button onclick="location.href=\''.wp_login_url().'\'" type="button">
            Войти
          </button>
        ';
      }
      ?>
    </div>
  </header>
  
  
  <form
    id="searchBox"
    class="inputBox"
    role="search"
    method="get"
    id="searchform"
    action="<?php echo home_url(); ?>"
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
        onkeyup="suggestions()"
        autofocus
      />
      <div id="datafetch">Search results will appear here</div>
      <button type="submit" id="searchsubmit" class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path
            d="m23.707 22.293-5.969-5.969a10.016 10.016 0 1 0-1.414 1.414l5.969 5.969a1 1 0 0 0 1.414-1.414ZM10 18a8 8 0 1 1 8-8 8.009 8.009 0 0 1-8 8Z"
          />
        </svg>
      </button>
    </label>
  </form>
  <ul id="category"><?php wp_list_categories('title_li='); ?></ul>
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
</html>
