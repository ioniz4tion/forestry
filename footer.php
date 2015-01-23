			<footer>

				<!--<div class="max-width">-->

				<h1>Get Connected</h1>

				<div>

					<a href="https://www.facebook.com/pages/Rocky-Mountain-Forestry/123719971018402" target="_blank"><img src="images/icons/facebook.png"></a>

					<a href="http://www.twitter.com/#" target="_blank"><img src="images/icons/twitter.png"></a>

					<a href="http://plus.google.com/#" target="_blank"><img src="images/icons/google-plus.png"></a>

				</div>

				<!--</div>-->

			</footer>

			<div id="copy">

				<!--<div class="max-width">-->

				<p>&copy; 2014 Insert Name Here. All Rights Reserved.</p>

				<!--</div>-->

			</div>

		</div>

		<script src="js/bootstrap.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/jquery.slides.js"></script>
		<script src="js/scripts.js"></script>
		<script>

			// Slideshow
			$(function() {
				$('#slides').slidesjs({
					width: 1366,
					height: 478,
					navigation: {active: false},
					pagination: {active: false},
					play: {auto: true}
				});
			});


			// Navbar
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),		/*menuTop = document.getElementById( 'cbp-spmenu-s3' ),
				showLeft = document.getElementById( 'showLeft' ),
				showTop = document.getElementById( 'showTop' ),*/
				body = document.body;

			showLeft.onclick = function() {
				//classie.toggle( this, 'active' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				classie.toggle( arrow, 'lines-active' );
				//disableOther( 'showLeft' );
			};
			/*showTop.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuTop, 'cbp-spmenu-open' );
				disableOther( 'showTop' );
			};*/

			function disableOther( button ) {
				if( button !== 'showLeft' ) {
					classie.toggle( showLeft, 'disabled' );
				}
				/*if( button !== 'showTop' ) {
					classie.toggle( showTop, 'disabled' );
				}*/
			}

		</script>

	</body>
</html>