<?php
	if ( ! defined( 'ABSPATH' ) ) {
		die( "Can't load this file directly" );
	}
?>

<style type="text/css">
	.logo-showcase-main-section-<?php echo esc_attr( $postid ); ?>{
		transition: all 0.5s;
	}
	.logo-showcase-main-section-<?php echo esc_attr( $postid ); ?> .lsw-logo-items{
		background: <?php echo esc_attr( $logo_showcase_items_background_color ) ?>;
		border: <?php echo esc_attr( $logo_showcase_item_roderwidth ); ?>px solid <?php echo esc_attr( $logo_showcase_columns_border_color ) ?>;
		width: 100%;
		height: 100%;
		transition: all 0.5s;
		display: flex;
		align-items: center;
		overflow: hidden;
	}
	.logo-showcase-main-section-<?php echo esc_attr( $postid ); ?> .lsw-logo-items:hover{
		background: <?php echo esc_attr( $logo_showcase_items_hover_background ) ?>;
		border: <?php echo esc_attr( $logo_showcase_item_roderwidth ); ?>px solid <?php echo esc_attr( $logo_showcase_columns_border_hover_color ) ?>;
	}
	.logo-showcase-main-section-<?php echo esc_attr( $postid ); ?> .lsw-logo-items-thumb{
		text-align: center;
	    padding: <?php echo esc_attr( $logo_showcase_item_padding ); ?>px;
	    position: relative;
	    overflow: hidden;
	}
	<?php if( $logo_showcase_columns_image_effect == 1 ){ ?>
		.logo-showcase-main-section-<?php echo esc_attr( $postid ); ?> .lsw-logo-items-thumb img{
		    filter:grayscale(0);
			transition: 0.3s;
		}
	<?php } ?>
	<?php if( $logo_showcase_columns_image_effect_hover == 1 ){ ?>
		.logo-showcase-main-section-<?php echo esc_attr( $postid ); ?> .lsw-logo-items-thumb img:hover{
		    filter:grayscale(0);
			transition: 0.3s;
		}
	<?php } ?>
	<?php if( $logo_showcase_columns_hover_effect == 1 ){ ?>
		.logo-showcase-main-section-<?php echo esc_attr( $postid ); ?> .lsw-logo-items:hover img{
		    -webkit-transform: scale(1.10);
		    -moz-transform: scale(1.10);
		    transform: scale(1.10);
		}
	<?php }elseif ( $logo_showcase_columns_hover_effect == 2 ) { ?>
		.logo-showcase-main-section-<?php echo esc_attr( $postid ); ?> .lsw-logo-items img{
			-webkit-transform: scale(1.1);
		    transform: scale(1.1);
		    -webkit-transition: .3s ease-in-out;
		    transition: .3s ease-in-out;
		}
		.logo-showcase-main-section-<?php echo esc_attr( $postid ); ?> .lsw-logo-items:hover img{
			-webkit-transform: scale(1);
		    transform: scale(1);
		}
	<?php }elseif ( $logo_showcase_columns_hover_effect == 3 ) { ?>
		.logo-showcase-main-section-<?php echo esc_attr( $postid ); ?> .lsw-logo-items:hover{
		    transform:translateY(-0.3rem);
		}
	<?php } ?>
	<?php if ( $logo_showcase_free_show_title_hide == 1 ) { ?>
		.logo-showcase-main-section-<?php echo esc_attr( $postid ); ?> .lsw-logo-items .lsw-logo-items-title{
			text-align: center;
			font-size: <?php echo esc_attr( $logo_showcase_columns_title_font_size ); ?>px;
			font-style:<?php echo esc_attr( $logo_showcase_free_title_font_style ); ?>;
			color:<?php echo esc_attr( $logo_showcase_columns_title_font_color ); ?>;
			margin-bottom: 10px;
		}
	<?php } ?>
	<?php if ( $logo_showcase_navigation == 'true' ) { ?>
	#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav {}
	#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-next,
	#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-prev {
		position: absolute;
	    top: 0;
	    left: auto;
	    right: 0;
		width: 30px;
		height: 30px;
		line-height: 30px;
		text-align:center;
		background: <?php echo $logo_showcase_navigation_bg_color ?> none repeat scroll 0 0;
		color: <?php echo $logo_showcase_navigation_text_color ?>;
		border: 1px solid <?php echo $logo_showcase_navigation_bg_color ?>;
		border-radius: 0%;
	}
	#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-next{
		right: 35px;
	}
	#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-prev{ }
	<?php if ( $logo_showcase_navigation_position == 'topleft' ){ ?>
		#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?>{
			padding-top:50px;
		}
		#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-next{
			right: auto;
		}
		#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-prev{
			left:35px;
		}
	<?php }elseif ( $logo_showcase_navigation_position == 'centred' ){ ?>
		#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-next{
		    top: 50%;
		    transform: translateY(-50%);
		    left:-15px;
		}
		#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-prev{
		    top: 50%;
		    transform: translateY(-50%);
		    right:-15px;
		}
	<?php }elseif ( $logo_showcase_navigation_position == 'topright' ){ ?>
		#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?>{
			padding-top:50px;
		}
	<?php } ?>
	#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-prev{}
	#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-next:hover,
	#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-nav .owl-prev:hover {
		color: <?php echo $logo_showcase_navigation_hover_text_color ?>;
		background: <?php echo $logo_showcase_navigation_hover_bg_color ?> none repeat scroll 0 0;
		border: 1px solid <?php echo $logo_showcase_navigation_hover_bg_color ?>;
	}
	<?php } if ( $logo_showcase_pagination == 'true' ) { ?>
	#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-dots {
	    display: block;
	  	text-align: center;
	    width: 100%;
	    overflow: hidden;
	    margin: 0;
	    margin-top: 10px;
	    padding: 0;
	}
	<?php if( $logo_showcase_pagination_style == 1 ){ ?>
		#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-dots .owl-dot {
			width: 10px;
			height: 10px;
			display: inline-block;
			position: relative;
			background: <?php echo $logo_showcase_pagination_bg_color ?>;
			margin: 0px 4px;
			border-radius: 50%;
		}
	<?php }elseif( $logo_showcase_pagination_style == 2 ){ ?>
		#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-dots .owl-dot {
			width: 10px;
			height: 10px;
			display: inline-block;
			position: relative;
			background: <?php echo $logo_showcase_pagination_bg_color ?>;
			margin: 0px 4px;
			border-radius: 0%;
		}
	<?php }elseif( $logo_showcase_pagination_style == 3 ){ ?>
		#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-dots .owl-dot {
			width: 25px;
			height: 6px;
			display: inline-block;
			position: relative;
			background: <?php echo $logo_showcase_pagination_bg_color ?>;
			margin: 0px 4px;
			border-radius: 50px;
		}
	<?php } ?>
	#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?> .owl-dots .owl-dot.active {
		background: <?php echo $logo_showcase_pagination_active_bg_color ?>;
	}
	<?php } ?>
</style>

<script type="text/javascript">
	jQuery(document).ready(function($) {
	  	$("#logo-showcase-wrap-<?php echo esc_attr( $postid ); ?>").owlCarousel({
			lazyLoad		  : true,
			loop			  : <?php echo $loop ?>,
			margin			  : <?php echo $margin ?>,
			autoplay 		  : <?php echo $logo_showcase_columns_show_auto_play ?>,
			autoplaySpeed	  : <?php echo $logo_showcase_columns_show_slide_speed ?>,
			autoplayTimeout	  : <?php echo $autoplaytimeout ?>,
			autoplayHoverPause: <?php echo $stop_hover_play ?>,
			nav 			  : <?php echo $logo_showcase_navigation ?>,
			dots			  : <?php echo $logo_showcase_pagination ?>,
			navText           : ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
			smartSpeed		  : 450,
			clone			  :true,
			responsive		  :{
				0:{
				  items:<?php echo $itemsmobile ?>,
				},
				678:{
				  items:<?php echo $itemsdesktopsmall ?>,
				},
				980:{
				  items:<?php echo $itemsdesktop ?>,
				},
				1199:{
				  items:<?php echo $logo_showcase_columns_show_items ?>,
				}
			}
	  	});
	  	<?php if( $logo_showcase_columns_show_hide_tooltips ==1 ){ ?> 
			$(".img-tipso-<?php echo esc_attr( $postid ); ?>").tipso({
			  useTitle : false,
			  width : 150,
			  position : "<?php echo $logo_showcase_tooltips_positions;?>",
			  color : "<?php echo $logo_showcase_tooltips_color;?>",
			  background : "<?php echo $logo_showcase_tooltips_bgcolor;?>",
			  delay : 200,
			  speed : 400,
			});
	  	<?php } ?>
	});	
</script>

<div class="logo-showcase-main-section-<?php echo esc_attr( $postid ); ?>">
	<div id="logo-showcase-wrap-<?php echo esc_attr( $postid ); ?>" class="owl-carousel">
		<?php
		$i = 0;
		foreach ( $featuress as $feature ) {
			$logothumb = wp_get_attachment_image( $feature['logo_showcase_uploader'], 'thumb-full', false );
			?>
			<?php if( $logo_showcase_columns_show_hide_tooltips == 1 ){ ?>
				<div class="lsw-logo-items <?php if( !empty( $feature['logo_showcase_title'] ) ){ ?> img-tipso-<?php echo esc_attr( $postid ); ?> tipso_style" data-tipso="<?php echo $feature['logo_showcase_title']; ?><?php } ?>">
				<?php }else{ ?>
					<div class="lsw-logo-items">
				<?php } ?>
				<div class="lsw-logo-items-thumb">
					<?php if( empty( $feature['logo_showcase_link_url'] ) ){ ?> 
						<?php echo $logothumb; ?>
					<?php }else{ ?>
						<a href="<?php echo $feature['logo_showcase_link_url']; ?>"> <?php echo $logothumb; ?></a>
					<?php } ?>
					<?php if( $logo_showcase_free_show_title_hide == 1 ){
						if( !empty( $feature['logo_showcase_title'] ) ){ ?>
							<div class="lsw-logo-items-title"> <?php echo $feature['logo_showcase_title']; ?> </div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		<?php $i++; if( $i == 8 ){ break; } ?>
		<?php } ?>
	</div>
</div>