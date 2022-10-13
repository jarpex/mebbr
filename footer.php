<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MEBBR
 */

?>

	<footer id="colophon" class="site-footer">
		<div id="footer">
            <div id="footer_combo">
				<a href="//suckless.ru/terms">Terms of use</a>
				<a href="//suckless.ru/privacy">Privacy</a>
			</div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<script async type="text/javascript" src="//static.mebbr.ru/js/mebbr_hyphen.js"></script>
<script async type="text/javascript" src="//static.mebbr.ru/js/mebbr_highlight.js"></script>
<script async type="text/javascript" src="//static.mebbr.ru/js/spotlight.bundle.js"></script>
<script async type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(89928388, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/89928388" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
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

<?php wp_footer(); ?>

</body>
</html>
