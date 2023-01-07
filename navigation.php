<header id="masthead" class="site-header">
	    <div id="progress">
			<div id="progress-bar"></div>
		</div>
		<div id="notification-area"></div>
		<div id="search-popup" class="cd-popup" role="alert">
			<div id="search-popup__bg" class="cd-popup-container">
				<figure class="cd-popup-mobile icon">
					<img src="//static.mebbr.ru/img/exit.svg" width="30" height="30" />
				</figure>
				<form id="searchBox" class="inputBox" role="search" method="get" id="searchform" action="<?php echo home_url(); ?>"
					autocomplete="off">
					<label id="searchBox__label" class="inputBox__label">
						<input name="s" type="text" placeholder="Поиск по сайту" minlength="1" maxlength="150" required
							class="inputBox__input" id="searchBox__input" />
						<button type="submit" id="searchsubmit" class="icon">
							<img src="//static.mebbr.ru/img/search.svg" width="30" height="30" />
						</button>
					</label>
				</form>
			</div>
		</div>
		<div id="category-popup" class="cd-popup" role="alert">
			<div id="category-popup__bg" class="cd-popup-container">
				<figure class="cd-popup-mobile icon">
					<img src="//static.mebbr.ru/img/exit.svg" width="30" height="30" />
				</figure>
				<a href="<?php echo home_url(); ?>" class="logo">
					<?php echo get_bloginfo('name'); ?>
				</a>
				<p class="header_desc">
					<?php echo get_bloginfo('description'); ?>
				</p>
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
					<img src="//static.mebbr.ru/img/exit.svg" width="30" height="30" />
				</figure>
				<a href="<?php echo home_url(); ?>" class="logo">
					<?php echo get_bloginfo('name'); ?>
				</a>
				<p class="header_desc">
					<?php echo get_bloginfo('description'); ?>
				</p>
				<p class="settings-popup__bg-heading">🌙 Выбор темы:</p>
				<form name="theme" class="segmented-control" id="theme-switcher">
					<input type="radio" name="radio2" value="system" id="tab-1" checked="" />
					<label for="tab-1" class="segmented-control__1">
						<p>💻 Системная</p>
					</label>

					<input type="radio" name="radio2" value="light" id="tab-2" />
					<label for="tab-2" class="segmented-control__2">
						<p>🌞 Светлая</p>
					</label>

					<input type="radio" name="radio2" value="dark" id="tab-3" />
					<label for="tab-3" class="segmented-control__3">
						<p>🌚 Темная</p>
					</label>

					<div class="segmented-control__color"></div>
				</form>
				<p class="settings-popup__bg-heading">🪪 Авторизация:</p>
				<form name="loginform" id="loginform" action="<?php echo home_url("/wp-login.php"); ?>" method="post">
					<div id="loginform__inputs">
						<input type="text" name="log" id="user_login" placeholder="Логин" />
						<input type="password" name="pwd" id="user_pass" placeholder="Пароль" />
					</div>
					<div id="loginform__actions">
						<figure>
							<img src="//static.mebbr.ru/img/account.svg" width="30" height="30" />
						</figure>
						<input type="submit" name="wp-submit" id="wp-submit" value="Войти" />
						<input type="hidden" name="redirect_to" value="<?php echo home_url("/wp-admin/"); ?>" />
						<input type="hidden" name="testcookie" value="1" />
					</div>
				</form>
			</div>
		</div>
		<nav id="navigation">
			<div class="tooltip-box">
				<a href="<?php echo home_url(); ?>" id="navigation__home" class="icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30">
						<path
							d="m23.121 9.069-7.585-7.586a5.008 5.008 0 0 0-7.072 0L.879 9.069A2.978 2.978 0 0 0 0 11.19v9.817a3 3 0 0 0 3 3h18a3 3 0 0 0 3-3V11.19a2.978 2.978 0 0 0-.879-2.121ZM15 22.007H9v-3.934a3 3 0 0 1 6 0Zm7-1a1 1 0 0 1-1 1h-4v-3.934a5 5 0 0 0-10 0v3.934H3a1 1 0 0 1-1-1V11.19a1.008 1.008 0 0 1 .293-.707L9.878 2.9a3.008 3.008 0 0 1 4.244 0l7.585 7.586a1.008 1.008 0 0 1 .293.704Z" />
					</svg>
				</a>
				<span class="tooltip">🏡 Главная страница</span>
			</div>
			<div class="tooltip-box">
				<figure id="navigation__search" class="icon" onclick="goSearch()">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30">
						<path
							d="m23.707 22.293-5.969-5.969a10.016 10.016 0 1 0-1.414 1.414l5.969 5.969a1 1 0 0 0 1.414-1.414ZM10 18a8 8 0 1 1 8-8 8.009 8.009 0 0 1-8 8Z" />
					</svg>
				</figure>
				<span class="tooltip">🔍 Поиск по сайту</span>
			</div>
			<div class="tooltip-box">
				<figure id="navigation__category" class="icon" onclick="goCategory()">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30">
						<path
							d="M7 0H4a4 4 0 0 0-4 4v3a4 4 0 0 0 4 4h3a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4Zm2 7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2Zm11-7h-3a4 4 0 0 0-4 4v3a4 4 0 0 0 4 4h3a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4Zm2 7a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2ZM7 13H4a4 4 0 0 0-4 4v3a4 4 0 0 0 4 4h3a4 4 0 0 0 4-4v-3a4 4 0 0 0-4-4Zm2 7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2Zm11-7h-3a4 4 0 0 0-4 4v3a4 4 0 0 0 4 4h3a4 4 0 0 0 4-4v-3a4 4 0 0 0-4-4Zm2 7a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2Z" />
					</svg>
				</figure>
				<span class="tooltip">📃 Список категорий</span>
			</div>
			<figure id="navigation__gotop-mobile" class="icon" onclick="goTop()">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30">
					<path
						d="m23.71 16.29-8.17-8.17a5 5 0 0 0-7.08 0L.29 16.29a1 1 0 0 0 1.42 1.42l8.17-8.17a3 3 0 0 1 4.24 0l8.17 8.17a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42Z" />
				</svg>
			</figure>
			<div class="tooltip-box">
				<figure id="navigation__menu" class="icon" onclick="goSettings()">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30">
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
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30">
					<path
						d="m23.71 16.29-8.17-8.17a5 5 0 0 0-7.08 0L.29 16.29a1 1 0 0 0 1.42 1.42l8.17-8.17a3 3 0 0 1 4.24 0l8.17 8.17a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42Z" />
				</svg>
			</figure>
			<span class="tooltip">☝🏻 Подняться в начало</span>
		</div>
	</header>