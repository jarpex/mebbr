<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MEBBR
 */

?>

<?php 
$post_types = get_post_types();
if( is_singular( $post_types ) ){
	get_template_part( 'navigation' );
}
?>

<article id="main" class="hyphenate">
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div id="autor_card">
				<a id="avatar_card--link" href="<?php echo get_the_author_meta('url'); ?>" target="_blank"><?php echo get_avatar( get_the_author_meta('user_email'), 50 ); ?></a>
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
			</div><!-- .entry-meta -->
		<?php endif; 
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mebbr' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mebbr' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article>
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
<!-- #post-<?php the_ID(); ?> -->
