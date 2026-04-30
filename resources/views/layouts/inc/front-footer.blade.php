	<footer>
		<div class="wrapper">
		<div class="row">
			<div class="column">
				   <h3>About us</h3>
				   <ul>
					   <li><a href="https://www.elitehavens.com/aboutus.aspx" title="About Elite Havens">About Elite Havens</a></li>
					   <li><a target="_blank" href="https://press.elitehavens.com/" title="In the Press">In the press</a></li>
					   <li><a href="https://www.elitehavens.com/villas/reviews.aspx" title="Recent Reviews">Recent reviews</a></li>                               
					   <li><a href="https://www.elitehavens.com/join.aspx" title="Join the Elite Club">Join the Elite Club</a></li>
					   <li><a href="https://www.elitehavens.com/contactus.aspx" title="Contact Elite Havens">Contact Us</a></li>
					   <li><a target="_blank" href="https://www.elitehavens.com/magazine/" title="Elite Magazine">Elite Magazine</a></li>
						<li><a target="_blank" href="https://www.elitehavens.com/destinations/" title="Our Destiantions">Our destinations</a></li>
						<li><a target="_blank" href="https://www.elitehavens.com/villas/" title="Our villas">Our villas</a></li>
				   </ul>
			</div>
			
			<div class="column">
				<h3>Booking enquiries</h3>
				<ul class="phone-numbers">
					<li><span>Australia</span><a href="tel:+61861020160">+61 8 6102 0160</a></li>
					<li><span>Bali</span><a href="tel:+62361737498">+62 361 737 498</a></li>
					<li><span>Hong Kong</span><a href="tel:+85281937366">+852 8193 7366</a></li>
					<li><span>Koh Samui</span><a href="tel:+6677374555">+66 65 979 9676</a></li>
					<li><span>Manila</span><a href="tel:+6328898261">+63 2 8889 8261</a></li>
					<li><span>Phuket</span><a href="tel:+66818932442">+66 81 893 2442</a></li>
					<li><span>Singapore</span><a href="tel:+6531634477">+65 3163 4477</a></li>
					<li><span>USA</span><a href="tel:+13122390677">+1 312 239 0677</a></li>
				</ul>
			</div>
			<div class="column">
				<h3>Get in touch</h3>
				<p>We're always here to help</p>  
				
				<div class="contacts">
					<p><a href="javascript:$zopim.livechat.window.show()">Chat</a></p>
					<p><a href="https://www.elitehavens.com/contactus.aspx">Call</a></p>
					<p><a href="https://www.elitehavens.com/contactus.aspx">Email</a></p>
				</div>
			</div>
			<div class="column">
				<h3>Connect with us</h3>
				<ul class="socials">
					<li><a href="https://www.facebook.com/elitehavens?ref_type=bookmark" class="socmed fb" target="_blank" data-title="Facebook"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="https://www.instagram.com/elitehavens" class="socmed in" target="_blank" data-title="Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
					 <li><a href="https://www.linkedin.com/company/elite-havens" class="socmed li" target="_blank" data-title="Linkedin"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
					<li><a href="https://www.pinterest.com/elitehavensall/" class="socmed pt" target="_blank" data-title="Pinterest"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
					<li><a href="https://www.youtube.com/channel/UC2fLFvrddDBUVvjhrRUrEUg" class="socmed yt" target="_blank" data-title="Youtube"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
					<li><a href="https://www.tiktok.com/@elitehavens?" class="socmed yt" target="_blank" data-title="Tiktok"><i class="fab fa-tiktok" aria-hidden="true"></i></a></li>
				</ul>         
				
				<div class="copyright">
					<div class="copy-row">
						<div class="copy-col"><p>Copyright © 2023 Elite Havens.</p></div>
						 <div class="copy-col"><p> All rights reserved.</p></div>
				  </div>
					<p><a href="https://www.elitehavens.com/terms.aspx">Terms and conditions</a></p>
					<p><a href="https://www.elitehavens.com/privacy.aspx">Privacy policy</a></p>
				</div>
			</div>
		</div>
		</div>
	</footer>
	<a class="top-arrow">BACK TO TOP</a>
	<script src="/resources/js/jquery-3.6.0.min.js"></script>
	<!-- <script src="/resources/js/jquery-ui.min.js"></script> -->
	<script src="/assets/js/site.js"></script>
	<script type="text/javascript">
		// back to index after search
		let url = document.URL;
		let targetURL = "https://press.elitehavens.com/main/search"; 
		if(targetURL == url) {
			document.querySelector('.back-to-home').style.display='block';
		}

		document.querySelector('.back-to-home').onclick = function() {
			window.location.href="https://press.elitehavens.com/";
		} 
		// end
		
		$.ajaxSetup({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});
		$(document).on('click', '#btnNewsLetter', function(e){
			e.preventDefault();
			var fname = $('input#fname').val();
			var lname = $('input#lname').val();
			var email = $('input#email').val();
			var cntry = $('select#drpCountry').val();
			$('span#newsLetterMessage').html('Submitting form...');

			$.ajax({
				type: "POST",
				dataType: "json",
				data: {'fname':fname,'lname':lname,'email':email,'country':cntry},
				//url: "{{ url('/main/subscribe') }}",
				url: "https://press.elitehavens.com/main/subscribe",
				success: function (data) {
					$('span#newsLetterMessage').empty().html(data.sub_message);
					setTimeout(function(){
						$('span#newsLetterMessage').fadeOut(500);
						window.location.href = '/';
					},2000);
				},
				error: function(e){
					$('span#newsLetterMessage').empty().html(e.responseText);
					setTimeout(function(){
						$('span#newsLetterMessage').fadeOut(500);
					},1500);
				}
			});
		});

		window.zEmbed || (function () {
			var queue = [];

			window.zEmbed = function () {
				queue.push(arguments);
			}
			window.zE = window.zE || window.zEmbed;       
			document.zEQueue = queue;
			window.zESettings = {
				webWidget: {
					color: { theme: '#CADDE3' },                
					contactOptions: {
						enabled: false,
						contactFormLabel: { '*': 'Message us' },
						chatLabelOnline: { '*': 'Live chat' },
						chatLabelOffline: { '*': 'Message us' }
					},
					launcher: {
						label: {'*': 'Message us' }
					},
					zIndex: 65,                               
					contactForm: {
						suppress: true
					},
					talk: {
						suppress: true
					},
					chat: {
						title:'How can we help?'
					}                
				}
			};
		}());

	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
	<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=0ebdd80a-f7d5-48ff-bfb4-c3613bdd7660"> </script>
</body>


</html>