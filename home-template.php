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
 */

get_header();
?>

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
            -webkit-user-select: none; /* Safari */
            -ms-user-select: none; /* IE 10+ */
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
<main id="primary" class="site-main">
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
  <h1 href="//suckless.ru" class="logo">
    suckless
  </h1>
  <p class="header_desc">
    База знаний в сфере IT.
  </p>
  <form
    id="searchBox"
    class="inputBox"
    role="search"
    method="get"
    id="searchform"
    action="//suckless.ru"
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
