<?php
/**
 * Title: Brandy simple contact form
 * Slug: brandy/simple-contact-form
 * Categories: brandy
 * Viewport width: 1000
 */
?>

<div class="brandy-sample-contact-form">
<style>.brandy-sample-contact-form {
	width: 70%;
}

@media screen and (max-width: 1200px) {
	.brandy-sample-contact-form {
		width: 80%;
	}
}

@media screen and (max-width: 1000px) {
	.brandy-sample-contact-form {
		width: 90%;
	}
}
.brandy-sample-contact-form label {
	display: inline-block;
	margin-bottom: 7px;
}
.brandy-sample-contact-form button[type="submit"] {
	display: block !important;
	margin: auto;
	padding: 13px 40px !important;
}
.brandy-sample-contact-form-line {
		display: flex;
		align-items: center;
		justify-content: space-between;
		gap: 30px;
		margin-bottom: 27px;
		flex-wrap: wrap;
	}

	.brandy-sample-contact-form-line > * {
		flex: 1;
	}

	@media screen and (max-width: 600px) {

		.brandy-sample-contact-form-line {
			gap: 27px
		}
		.brandy-sample-contact-form-line >* {
			flex: auto;
		}
	}</style>
	<form action="#" method="post">
		<div class="brandy-sample-contact-form-line">
		<div>
			<label for="full_name"><?php echo esc_html__( 'Full Name', 'brandy' ); ?>:</label>
			<input type="text" id="full_name" name="full_name" placeholder="<?php echo esc_html__( 'Enter full name', 'brandy' ); ?>" required>
		</div>
		<div>
			<label for="phone_number"><?php echo esc_html__( 'Phone Number', 'brandy' ); ?>:</label>
			<input type="tel" id="phone_number" name="phone_number" placeholder="<?php echo esc_html__( 'Enter phone number', 'brandy' ); ?>" required>
		</div>
		</div>
		<div class="brandy-sample-contact-form-line">
		<div>
			<label for="email"><?php echo esc_html__( 'Email Address', 'brandy' ); ?>:</label>
			<input type="email" id="email" name="email" placeholder="<?php echo esc_html__( 'Enter email', 'brandy' ); ?>" required>
			</div>
			<div>
				<label for="subject"><?php echo esc_html__( 'Subject', 'brandy' ); ?>:</label>
				<input type="text" id="subject" name="subject" placeholder="<?php echo esc_html__( 'Enter subject', 'brandy' ); ?>" required>
			</div>
		</div>

		<div class="brandy-sample-contact-form-line">
		<div>
				<label for="message"><?php echo esc_html__( 'Message', 'brandy' ); ?>:</label>
				<textarea id="message" name="message" rows="4" placeholder="<?php echo esc_html__( 'Enter your message', 'brandy' ); ?>" required></textarea>
			</div>
		</div>

		<button class="wp-element-button" type="submit"><?php echo esc_html__( 'Submit', 'brandy' ); ?></button>
	</form>
</div>
