<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MEBBR
 */

?>

<style>
.message {
	position: absolute;
	top: 30%;
	margin: -3em 5vw 0 0;
}
.message_title {
    text-align: center;
    font-size: 3em;
	margin: 0 0 5vw;
}
.message_content {
	font-size: 1.5em;
	width: 80%;
    margin: 0 auto;
}
.message_img {
	width: 15vw;
	position: fixed;
	bottom: 3vw;
	right: 3vw;
	z-index: -1;
	-webkit-user-select: none; /* Safari */
 	-ms-user-select: none; /* IE 10+ */
  	user-select: none;
}
@media (max-width: 1199px) and (orientation: portrait) {
	.message{
		position: relative;
		margin: 2em 0 0 0;
	}
	.message_title {
		font-size: 12em;
	}
	.message_img {
		position: relative;
		width: 50%;
		margin: 0 auto;
		display: block;
	}
	.message_content {
		font-size: 7em;
	}
}
</style>
<section class="message">
	<h1 class="message_title">Ничего не&nbsp;найдено :с</h1>
	<img class="message_img" src="//static.mebbr.ru/img/crying.webp">
	<div class="message_content">
		<p>Я&nbsp;очень хотела тебе помочь, но&nbsp;похоже у&nbsp;меня нету такой страницы &gt;_&lt;. Ты&nbsp;же не&nbsp;плохой человек и&nbsp;не&nbsp;пытался заставить меня искать&nbsp;то, чего не&nbsp;существует, правда?</p>
	</div>
</section>
