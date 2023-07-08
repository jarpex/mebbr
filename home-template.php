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
        }

        .preload * {
          -webkit-transition: none !important;
          -moz-transition: none !important;
          -ms-transition: none !important;
          -o-transition: none !important;
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
    </style>
</head>
<main id="primary" class="site-main preload">
  <header id="header">
    <div id="header__left-box" aria-hidden="true">
      <div id="logo" title="На главную">
        <?php echo get_custom_logo(); ?>
      </div>
      <div id="header__naming">
        <h1 id="site-name">
          <?php echo get_bloginfo('name'); ?> 
        </h1>
        <h2 id="site-description">
          <?php echo get_bloginfo('description'); ?> 
        </h2>
      </div>
    </div>
    <div id="header__right-box">
      <?php 
      if ( is_user_logged_in() ) {
        if ( current_user_can( 'edit_posts' ) ){
          if( current_user_can( 'manage_options' ) ){ 
            echo '
              <button class="header__button icon" title="Создать пост" aria-label="Создать пост" onclick="location.href=\''.site_url()."/wp-admin/post-new.php".'\'" type="button">
                <img src="'.get_template_directory_uri().'/svg/square-rounded-plus.svg" alt="">
              </button>
              <button class="header__button icon" title="Управление сайтом" aria-label="Управление сайтом" onclick="location.href=\''.site_url()."/wp-admin/".'\'" type="button">
                <img src="'.get_template_directory_uri().'/svg/braces.svg" alt="">
              </button>
              <button class="header__button text" onclick="location.href=\''.wp_logout_url().'\'" type="button">
                Выйти
              </button>
            '; 
          } else {
            echo '<p>не админ</p>';
          }
        } else {
          echo '
            <p>не может писать</p>
            <button class="header__button text" onclick="location.href=\''.wp_logout_url().'\'" type="button">
              Выйти
            </button>
          ';  
        }
      }
      else {
        echo '
          <button class="header__button text" onclick="location.href=\''.wp_login_url().'\'" type="button">
            Войти
          </button>
        ';
      }
      ?>
    </div>
  </header>
  
  <div id="wrapper">
    <button class="wrapper__button icon" onclick="searchHide();" type="button">
      <?php echo '<img src="'.get_template_directory_uri().'/svg/x.svg" title="Закрыть" aria-label="Закрыть">'; ?>
    </button>
  </div>
  <form
    id="searchBox"
    class="inputBox"
    role="search"
    method="get"
    id="searchform"
    action="<?php echo home_url(); ?>"
    autocomplete="off"
  >
    <label id="searchBox__label" class="inputBox__label" title="Поиск по сайту" aria-label="Поиск по сайту">
      <input
        name="s"
        type="search"
        minlength="1"
        maxlength="150"
        required
        class="inputBox__input"
        id="searchBox__input"
        onkeyup="searchResolver()"
        pattern="^(?!^\s+$).*"
        autofocus
        aria-hidden
      />
      <button type="submit" id="searchsubmit" class="icon" title="Найти" aria-label="Найти">
        <img src="<?php echo get_template_directory_uri().'/svg/search.svg'; ?>" alt="Иконка поиска">
      </button>
      <div id="datafetch">
        <span aria-disabled="true">Здесь будут результаты поиска</span>
      </div>
    </label>
  </form>
  <ul id="category"><?php wp_list_categories('title_li='); ?></ul>
    </main>
<script>
  var searchWrapper = false; 

  const searchHide = () => {
    allowScroll();
    searchWrapper = false; 
    document.getElementById('wrapper').classList.remove("focused");
    document.getElementById('searchBox').classList.remove("focused");
    document.getElementById('searchBox__label').classList.remove("focused");
    if (document.getElementById('searchBox__input').value !="") {
        document.getElementById('searchBox__input').value = "";
    }
    suggestions();
  }

  const searchOpen = () => {
    preventScroll();
    searchWrapper = true;
    document.getElementById('wrapper').classList.add("focused");
    document.getElementById('searchBox').classList.add("focused");
    document.getElementById('searchBox__label').classList.add("focused");
  }

  const preventScroll = () => {
      let stylePosition = document.body.style.position;
      progressAllowed = false;
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
      progressAllowed = true;
    };

  // TODO: Remove Event Listeners
    document.getElementById('searchBox__input').addEventListener('click', function(){
      searchOpen();
    });

    document.getElementById('searchBox__input').addEventListener('keydown', evt => {
        if (evt.key === 'Escape') {
            document.getElementById('searchBox__input').blur();
            searchHide();
        }
    });

    document.getElementById('wrapper').addEventListener('click', function(){
      searchHide();
    });


    const searchResolver = () => {
      suggestions();

      if (!searchWrapper) {
        searchOpen();
      }
    }
</script>
<script>
  window.onload = (event) => {
    document.getElementById('primary').classList.remove("preload");
  };
</script>

<?php wp_footer(); ?>

</body>
</html>
