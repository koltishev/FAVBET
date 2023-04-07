<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vlad
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
	<div class="logo">
		<svg xmlns="http://www.w3.org/2000/svg" width="400" height="70" viewBox="0 0 400 70" fill="none">
			<path d="M400 0H0V70H400V0Z" fill="#FF267E"/>
			<path d="M129.439 33.6451H105.613V26.8709H134.479V17.6128H91.6381V52.6128H105.613V43.1289H129.439V33.6451Z" fill="#000055"/>
			<path d="M205.04 40.8709L192.44 17.6128H176.632L197.251 52.6128H212.829L233.448 17.6128H217.869L205.04 40.8709Z" fill="#000055"/>
			<path d="M277.663 34.7741C280.871 33.6451 282.932 30.4838 282.932 27.3225C282.932 21.6773 277.892 17.6128 268.27 17.6128H237.113V52.6128H268.958C279.267 52.6128 284.078 48.5483 284.078 42.6773C284.078 39.2902 282.016 36.3547 277.663 34.7741ZM250.63 25.9676H265.979C267.354 25.7418 268.729 26.8709 268.958 28.4515C269.187 29.8063 268.041 31.1612 266.438 31.387C266.208 31.387 266.208 31.387 265.979 31.387H250.63V25.9676ZM267.125 44.258H250.63V38.8386H267.125C268.499 38.6128 269.874 39.7418 270.103 41.3225C270.332 42.6773 269.187 44.0321 267.583 44.258C267.583 44.258 267.354 44.258 267.125 44.258Z" fill="#000055"/>
			<path d="M304.467 38.8386H328.293V31.1612H304.467V26.8709H330.813V17.6128H290.722V52.6128H331.501V43.1289H304.467V38.8386Z" fill="#000055"/>
			<path d="M337.228 17.6128V26.8709H352.577V52.6128H366.552V26.8709H382.131V17.6128H337.228Z" fill="#000055"/>
			<path d="M150.516 17.6128L129.897 52.6128H144.559L147.308 47.4192H169.301L172.05 52.6128H187.4L166.781 17.6128H150.516ZM152.348 38.387L158.534 27.0967L164.719 38.387H152.348Z" fill="#000055"/>
			<path d="M17.8694 31.3871L30.2405 52.613H45.819L33.6769 31.3871H17.8694Z" fill="#000055"/>
			<path d="M58.1902 31.3871L45.819 52.613H61.6266L73.7686 31.3871H58.1902Z" fill="#000055"/>
			<path d="M45.819 9.93549L33.677 31.3871H58.1902L45.819 9.93549Z" fill="#000055"/>
		</svg>
	</div>
	</header><!-- #masthead -->
