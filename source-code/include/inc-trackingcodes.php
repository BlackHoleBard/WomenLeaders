<div style="display:none !important;">
	<?php if ($ga!="" && $gatype!="") { ?>
		<!-- Google Analytics Code -->
		<?php if ($gatype=="new") { ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga; ?>"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', '<?php echo $ga; ?>');
		</script>
		<?php } else if ($gatype=="old") { ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', '<?php echo $ga; ?>', 'auto');
		  ga('require', 'displayfeatures');
		  ga('send', 'pageview');
		</script>
		<?php } ?>
	<!-- End Google Analytics Code -->
	<?php } ?>
	<?php if ($grmid!="") { ?>
	<!-- Google Code for Remarketing Tag -->
	<!--
	Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
	-->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = <?php echo $grmid; ?>;
	var google_conversion_label = "<?php echo $grmlabel; ?>";
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/<?php echo $grmid; ?>/?value=1.00&amp;label=<?php echo $grmlabel; ?>&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>
	<!-- End Google Code for Remarketing Tag -->
	<?php } ?>
	<?php if ($fbpixel!="") { ?>
	<!-- Facebook Pixel Code -->
	<script>
	  !function(f,b,e,v,n,t,s)
	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	  n.queue=[];t=b.createElement(e);t.async=!0;
	  t.src=v;s=b.getElementsByTagName(e)[0];
	  s.parentNode.insertBefore(t,s)}(window, document,'script',
	  'https://connect.facebook.net/en_US/fbevents.js');
	  fbq('init', '<?php echo $fbpixel; ?>');
	  fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $fbpixel; ?>&amp;ev=PageView&amp;noscript=1"/></noscript>
	<!-- End Facebook Pixel Code -->
	<?php } ?>
	<?php if ($tcampaign!="") { ?>
	<!-- Taboola Code -->
	<img src="<?php echo $timg; ?><?php echo $siteurl; ?>" width="0" height="0" />
	<script type="text/javascript">
	    window._tfa = window._tfa || [];
	    _tfa.push({ notify: 'mark',type: '<?php echo $tcampaign; ?>' });
	</script>
	<script src="<?php echo $tfa; ?>"></script>
	<!-- End Taboola Code -->
	<?php } ?>
	<?php if ($page=="thankyou") { ?>
		<?php if ($glcid!=""){ ?>
			<!-- Google Code for Conversion -->
			<script type="text/javascript">
				/* <![CDATA[ */
				var google_conversion_id = <?php echo $glcid; ?>;
				var google_conversion_language = "en";
				var google_conversion_format = "3";
				var google_conversion_color = "ffffff";
				var google_conversion_label = "<?php echo $glclabel; ?>";
				var google_remarketing_only = false;
				/* ]]> */
			</script>
			<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
			<noscript><div style="display:inline;"><img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/<?php echo $glcid; ?>/?label=<?php echo $glclabel; ?>&amp;guid=ON&amp;script=0"/></div>
			</noscript>
			<!-- End Google Code for Conversion -->
		<?php } ?>
		<?php if ($fbpixel!="") { ?>
			<!-- Facebook Pixel Code for Conversion -->
			<script>
				!function(f,b,e,v,n,t,s)
				{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
				if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
				n.queue=[];t=b.createElement(e);t.async=!0;
				t.src=v;s=b.getElementsByTagName(e)[0];
				s.parentNode.insertBefore(t,s)}(window, document,'script',
				'https://connect.facebook.net/en_US/fbevents.js');
				fbq('init', '<?php echo $fbpixel; ?>');
				fbq('track', 'CompleteRegistration');
			</script>
			<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $fbpixel; ?>&amp;ev=PageView&amp;noscript=1"/></noscript>
			<!-- End Facebook Pixel Code for Conversion -->
		<?php } ?>
		<?php if ($tcampaign!="") { ?>
			<!-- Taboola Conversion Code -->
			<img src="<?php echo $tcimg; ?><?php echo $siteurl; ?>" width="0" height="0" />
			<script type="text/javascript">
			    window._tfa = window._tfa || [];
			    _tfa.push({ notify: 'action',name: '<?php echo $tcampaign; ?>' });
			</script>
			<script src="<?php echo $tfa; ?>"></script>
			<!-- End Taboola Conversion Code -->
		<?php } ?>
	<?php } ?>
</div>