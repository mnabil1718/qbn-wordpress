<?php
	if ( ! defined( 'ABSPATH' ) ) {
		die( "Can't load this file directly" );
	}
?>

<div class="wraper doc-suport">
	<div class="doc-support-header">
		<h1><?php _e( 'Logo Showcase', 'logoshowcase' ); ?> </h1>
		<p><?php _e( 'Do you have any questions or need assistance? We\'re here to help!', 'logoshowcase' ); ?> </p>
	</div>
	<div class="doc-support-content">
		<ul class="items-area">
			<li class="list-item">
				<h3><?php _e( 'Check Documentation', 'logoshowcase' ); ?></h3>
				<p>We developed plugins by maintaining WordPress standards. our docs will help you to understand the basic & advanced usage.</p>
				<div class="tps-btn"><a target="_blank" href="https://themepoints.com/logoshowcase/documentation/"><?php _e( 'Documentation', 'logoshowcase' ); ?></a></div>
			</li>
			<li class="list-item">
				<h3><?php _e( 'Show Your Love', 'logoshowcase' ); ?></h3>
				<p>We would greatly appreciate it if you could spare a moment to rate and review our plugin. Your feedback is invaluable to us as it helps us enhance and deliver the best possible experience for our customers.</p>
				<div class="tps-btn"><a target="_blank" href="https://wordpress.org/support/plugin/logo-showcase/reviews/"><?php _e( 'Rate Us Now', 'logoshowcase' ); ?></a></div>
			</li>
			<li class="list-item">
				<h3><?php _e( 'Get Customer Support', 'logoshowcase' ); ?></h3>
				<p>We're delighted to assist you with any questions or issues you may have regarding our plugin. We eagerly anticipate the opportunity to help you.</p>
				<div class="tps-btn"><a target="_blank" href="https://www.themepoints.com/questions-answer/"><?php _e( 'Get Support', 'logoshowcase' ); ?></a></div>
			</li>
			<li class="list-item">
				<h3><?php _e( 'Buy Us A Coffee', 'logoshowcase' ); ?></h3>
				<p>We hope you're enjoying our plugin! We put a lot of effort into providing the best experience possible. If you're feeling generous and would like to show your appreciation, we'd be thrilled if you could consider buying us a coffee as a way of saying thank you.</p>
				<div class="tps-btn"><a target="_blank" href="https://www.themepoints.com/shop/logo-showcase-pro/"><?php _e( 'Donate Now', 'logoshowcase' ); ?></a></div>
			</li>
		</ul>
	</div>
</div>

<style>
.wraper.doc-suport {
	margin:10px 20px 0 2px;
	background-color: #fff;
	padding: 30px;
	border-radius: 10px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
	max-width: 1140px;
}
.doc-support-header {
    background-image: linear-gradient(to right, #495aff 0%, #0acffe 100%);
    padding: 50px;
    margin-bottom: 50px;
    border-radius: 20px;
}
.wraper.doc-suport h1{
	color: #fff;
	font-size: 30px;
	font-weight: 700;
	line-height: 1.2;
	margin: 0;
	padding: 0;
}
.doc-support-header p {
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    text-transform: capitalize;
    margin-bottom: 0;
}
ul.items-area {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-justify-content: space-around;
    justify-content: center;
    margin-left: -15px;
    margin-right: -15px;
}
.doc-support-content {
	border-radius: 10px;
    column-count: 2;
    column-gap: 20px;
}
.doc-support-content .items-area {
	list-style-type: none;
	padding: 0;
	margin: 0;
}
.doc-support-content .list-item {
    margin-bottom: 20px;
    background: #fff;
    color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 15px 40px 0 rgba(0,0,0,.08);
	min-height: 175px;
	display: flex;
	flex-direction: column;
	justify-content: center;
}
.doc-support-content .list-item h3 {
  	font-size: 20px;
  	color: #333;
  	margin-top: 0;
  	margin-bottom: 5px;
}
.doc-support-content .list-item p {
	color:#333;
	font-size:15px;
}
.tps-btn a {
    display: inline-flex;
    font-size: 15px;
    font-weight: 400;
    margin-top: 0000;
    padding: 7px 15px;
    box-shadow: none;
    background: #0acffe ;
    color: #fff;
    text-decoration: none;
    outline: none;
    border-radius: 7px;
}

/* Media query for small devices */
@media screen and (max-width: 767px) {
	.doc-support-header {
		padding:40px;
	}
	.doc-support-content {
		column-count: 1; /* Change to a single column layout */
	}
	.doc-support-content .list-item {
		width: 100%; /* Make each item take up 100% width */
	}
}
</style>