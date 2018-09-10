<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage prdxn
 * @since prdxn 1.0
 */
?>

		</div><!-- .site-content -->
		<!-- Footer structure started -->
		<footer id="footer" class="site_footer" role="contentinfo">
			<!-- Footer left content structure started which contains logo and primary nevigation -->

			<div class="footer_left-content cf">
				<div class="footer_logo">
					<?php
        				echo '<a href="' . get_site_url() . '" title="PRDXN"><img src="'. get_option('footerlogo') . '" alt="PRDXN logo"></a>';
        			?>
				</div>
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<div class="footer_navigation-primary" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'prdxn' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'footer_navigation-primary-menu',
						 ) );
					?>
				</div>
				<?php endif; ?>
				<!-- primary-navigation end -->
			</div>
			<!-- Footer right content structure started which contains contact info and social widgets -->
			<div class="footer_right-content cf">
				<div class="footer_contactinfo">
					<ul>
						<li>
							<a href="http://maps.google.com/?q=<?php echo get_option('address1_redirect'); ?>" title="Visit Us: <?php echo get_option('address1') ?>" target="_blank" class="address"><?php echo get_option('address1'); ?>
							</a>
						</li>
						<li>
							<a href="tel:<?php echo get_option('contact1'); ?>" title="Call Us At: <?php echo get_option('contact1') ?>" class="phone">
								<?php echo get_option('contact1'); ?>	
							</a>
						</li>
						<li>
							<a href="http://maps.google.com/?q=<?php echo get_option('address2_redirect'); ?>" title="Visit Us: <?php echo get_option('address2') ?>" target="_blank" class="address"><?php echo get_option('address2'); ?>
							</a>
						</li>
						<li>
							<a href="tel:<?php echo get_option('contact2'); ?>" title="Call Us At: <?php echo get_option('contact2') ?>" class="phone">
								<?php echo get_option('contact2'); ?>
							</a>
						</li>
						<li><a target="_self" href="mailto:<?php echo get_option('email'); ?>" title="Mail Us On: <?php echo get_option('email') ?>" class="mail"><?php echo get_option('email'); ?></a></li>
					</ul>
				</div>
				<!-- contact info end -->				
				<div class="hiring-social">
					<div class="hiring">
						<a href="http://prdxnstaging2.com/prdxn/careers/" class="positions" title="Check out our available positions">we're hiring</a>
					</div>
					<?php if ( has_nav_menu( 'social' ) ) : ?>
					<div class="footer_navigation-social" role="navigation" aria-label="	<?php esc_attr_e( 'Footer Social Links Menu', 'prdxn' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'footer_navigation-social-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
							) );
						?>
					</div>
					<!-- social-navigation end -->
					<?php endif; ?>
				</div>
			</div>
		</footer><!-- site-footer end -->
	<?php
		# Footer Call
		wp_footer();
	?>

	<!-- start Mixpanel --><script type="text/javascript">(function(e,a){if(!a.__SV){var b=window;try{var c,l,i,j=b.location,g=j.hash;c=function(a,b){return(l=a.match(RegExp(b+"=([^&]*)")))?l[1]:null};g&&c(g,"state")&&(i=JSON.parse(decodeURIComponent(c(g,"state"))),"mpeditor"===i.action&&(b.sessionStorage.setItem("_mpcehash",g),history.replaceState(i.desiredHash||"",e.title,j.pathname+j.search)))}catch(m){}var k,h;window.mixpanel=a;a._i=[];a.init=function(b,c,f){function e(b,a){var c=a.split(".");2==c.length&&(b=b[c[0]],a=c[1]);b[a]=function(){b.push([a].concat(Array.prototype.slice.call(arguments,
0)))}}var d=a;"undefined"!==typeof f?d=a[f]=[]:f="mixpanel";d.people=d.people||[];d.toString=function(b){var a="mixpanel";"mixpanel"!==f&&(a+="."+f);b||(a+=" (stub)");return a};d.people.toString=function(){return d.toString(1)+".people (stub)"};k="disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config reset people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
for(h=0;h<k.length;h++)e(d,k[h]);a._i.push([b,c,f])};a.__SV=1.2;b=e.createElement("script");b.type="text/javascript";b.async=!0;b.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"file:"===e.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";c=e.getElementsByTagName("script")[0];c.parentNode.insertBefore(b,c)}})(document,window.mixpanel||[]);
mixpanel.init("6962b310890ea9634b9e6a66737bd4bd");</script><!-- end Mixpanel -->
	</body>
</html>
