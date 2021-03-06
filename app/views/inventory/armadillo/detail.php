<?php

	$sale_class = str_replace( ' ' , '%20' , $inventory->saleclass );
	setlocale( LC_MONETARY , 'en_US' );
	$prices = $inventory->prices;
	$use_was_now = $prices->{ 'use_was_now?' };
	$use_price_strike_through = $prices->{ 'use_price_strike_through?' };
	$on_sale = $prices->{ 'on_sale?' };
	$sale_price = isset( $prices->sale_price ) ? $prices->sale_price : NULL;
	$retail_price = $prices->retail_price;
	$default_price_text = $prices->default_price_text;
	$asking_price = $prices->asking_price;
	$vin = $inventory->vin;
	$odometer = empty( $inventory->odometer ) || $inventory->odometer <= 0 ? 'N/A' : $inventory->odometer;
	$stock_number = $inventory->stock_number;
	$exterior_color = empty( $inventory->exterior_color ) ? 'N/A' : $inventory->exterior_color;
	$engine = $inventory->engine;
	$transmission = $inventory->transmission;
	$drivetrain = $inventory->drive_train;
	$dealer_options = $inventory->dealer_options;
	$standard_equipment = $inventory->standard_equipment;
	$year = $inventory->year;
	$make = $inventory->make;
	$model = $inventory->model_name;
	$trim = $inventory->trim;
	$year_make_model = $year . ' ' . $make . ' ' . $model;
	$description = $inventory->description;
	$doors = $inventory->doors;
	$icons = $inventory->icons;
	$fuel_economy = $inventory->fuel_economy;
	$headline = $inventory->headline;
	$body_style = $inventory->body_style;
	$drive_train = $inventory->drive_train;
	$video_url = isset( $inventory->video_url ) ? $inventory->video_url : false;
	$carfax = isset( $inventory->carfax ) ? $inventory->carfax->url : false;
	$contact_information = $inventory->contact_info;

?>

<script>
function video_popup(url , title) {
	if (! window.focus) return true;
	var href;
	if (typeof(url) == 'string') {
		href=url;
	} else {
		href=url.href;
		window.open(href, title, 'width=640,height=480,scrollbars=no');
		return false;
	}
}
</script>

<div class="dealertrend inventory wrapper">
	<div class="detail wrapper">
		<?php echo $breadcrumbs; ?>
		<div class="main-line">
			<h2><?php echo $year . ' ' . $make . ' ' . $model . ' ' . $trim . ' ' . $drive_train . ' ' . $body_style . ' ' . $transmission; ?></h2>
			<p><?php echo $headline; ?></p>
		</div>
		<div class="column-left">
			<div class="request-form">
				<div class="form">
					<div class="header">
						Make an Offer / Get Info
					</div>
					<form action="<?php echo $this->options[ 'vehicle_management_system' ][ 'host' ] . '/' . $this->options[ 'vehicle_management_system' ][ 'company_information' ][ 'id' ]; ?>/forms/create/<?php echo strtolower( $sale_class ); ?>_vehicle_inquiry" method="post" name="vehicle-inquiry">
						<input name="required_fields" type="hidden" value="name,email,privacy" />
						<input name="subject" type="hidden" value="Vehicle Inquiry - <?php echo $headline; ?>" />
						<input name="saleclass" type="hidden" value="<?php echo $sale_class; ?>" />
						<input name="vehicle" type="hidden" value="<?php echo $year_make_model; ?>" />
						<input name="year" type="hidden" value="<?php echo $year; ?>" />
						<input name="make" type="hidden" value="<?php echo $make; ?>" />
						<input name="model_name" type="hidden" value="<?php echo $model; ?>" />
						<input name="trim" type="hidden" value="<?php echo $trim; ?>" />
						<input name="stock" type="hidden" value="<?php echo $stock_number; ?>" />
						<input name="vin" type="hidden" value="<?php echo $vin; ?>" />
						<input name="inventory" type="hidden" value="<?php echo $inventory->id; ?>" />
						<input name="price" type="hidden" value="<?php echo $price; ?>" />
						<input name="name" type="hidden" value="" />
						<table>
							<tr>
								<td class="required">
									<label for="vehicle-inquiry-f-name">First Name</label>
									<input maxlength="70" id="vehicle-inquiry-f-name" name="f_name" tabindex="1" type="text" />
								</td>
							</tr>
							<tr>
								<td class="required">
									<label for="vehicle-inquiry-l-name">Last Name</label>
									<input maxlength="70" id="vehicle-inquiry-l-name" name="l_name" tabindex="2" type="text" />
								</td>
							</tr>
								<td class="required">
									<label for="vehicle-inquiry-email">Email Address</label>
									<input maxlength="255" id="vehicle-inquiry-email" name="email" tabindex="3" type="text" />
								</td>
							</tr>
							<tr>
								<td>
									<label for="vehicle-inquiry-phone">Phone Number</label>
									<input maxlength="256" name="phone" id="vehicle-inquiry-phone" tabindex="4" type="text" />
								</td>
							</tr>
							<tr>
								<td class="required">
									<label for="vehicle-inquiry-comments">Questions/Comments</label>
									<textarea name="comments" id="vehicle-inquiry-comments" rows="4" tabindex="5"></textarea>
								</td>
							</tr>
							<tr>
							<td>
									<div style="display:none">
										<input class="privacy" name="privacy" id="vehicle-inquiry-privacy" type="checkbox" value="Yes" />
										<input name="agree_sb" type="checkbox" value="Yes" /> I am a Spam Bot?
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<input onclick="document.forms['vehicle-inquiry']['name'].value = document.forms['vehicle-inquiry']['f_name'].value + ' ' + document.forms['vehicle-inquiry']['l_name'].value; document.forms['vehicle-inquiry']['privacy'].checked = true; document.forms['vehicle-inquiry'].submit();" type="button" value="Send Inquiry" class="submit" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<div class="contact-information">
				<div class="header">Contact Information</div>
				<?php
					echo '<p>' . $contact_information->greeting . ' <strong>' . $contact_information->dealer_name . '</strong></p>';
					echo '<p>Phone Number: <strong>' . $contact_information->phone . '</strong></p>';
				?>
			</div>
			<div class="helpful-links">
				<div class="header">
					Helpful Links
				</div>
				<a id="schedule" href="/schedule-test-drive/" target="_blank">Schedule Test Drive</a>
				<a id="trade" href="/trade-evaluation/" target="_blank">Trade Evaluation</a>
				<a id="facebook" href="http://www.addthis.com/bookmark.php?pub=dealertrend&amp;v=250&amp;source=tbx-250&amp;s=facebook&url=&amp;title=&amp;content=" target="_blank">Share on Facebook</a>
				<a id="approved" href="#" target="_blank">Get Approved Now</a>
				<a id="friend" href="#" target="_blank">Send to a Friend</a>
				<a id="calculate" href="#" target="_blank">Calculate Payments</a>
			</div>
			<?php
				if( $carfax ) {
					echo '<a href="' . $carfax . '" class="carfax">Carfax</a>';
				}
			?>
			<br class="clear" />
		</div>
		<div class="column-middle">
			<div class="vehicle-information">
				<div class="header">
					Vehicle Information
				</div>
				<div><span>Color:</span> <?php echo $exterior_color; ?></div>
				<div><span>Engine:</span> <?php echo $engine; ?></div>
				<div><span>Transmission:</span> <?php echo $transmission; ?></div>
				<div><span>Mileage:</span> <?php echo $odometer; ?></div>
				<div><span>Stock Number:</span> <?php echo $stock_number; ?></div>
				<div><span>VIN:</span> <?php echo $vin; ?></div>
				<div class="price">
				<?php
					if( $on_sale ) {
						$now_text = '<span>Price:</span> ';
						if( $use_was_now ) {
							$price_class = ( $use_price_strike_through ) ? 'strike-through asking-price' : 'asking-price';
							echo '<div class="' . $price_class . '"><span>Was:</span> ' . money_format( '%(#0n' , $asking_price ) . '</div>';
							$now_text = '<span>Now:</span> ';
						}
						echo '<div class="sale-price">' . $now_text . money_format( '%(#0n' , $sale_price ) . '</div>';
					} else {
						if( $asking_price > 0 ) {
							echo '<div class="asking-price"><span>Price:</span> ' . money_format( '%(#0n' , $asking_price ) . '</div>';
						} else {
							echo $default_price_text;
						}
					}
				?>
				</div>
			</div>
			<div class="fuel-economy">
				<?php
					$fuel_city = !empty( $fuel_economy ) && !empty( $fuel_economy->city ) ? $fuel_economy->city : '-';
					$fuel_highway = !empty( $fuel_economy ) && !empty( $fuel_economy->highway ) ? $fuel_economy->highway : '-';
				?>
				<div id="fuel-city">
					<p>City</p>
					<p><strong><?php echo $fuel_city; ?></strong></p>
				</div>
				<div id="fuel-highway">
					<p>Highway</p>
					<p><strong><?php echo $fuel_highway; ?></strong></p>
				</div>
				<p><small>Actual mileage will vary with options, driving conditions, driving habits and vehicle's condition.</small></p>
			</div>
			<div class="icons">
				<?php echo $icons; ?>
			</div>
			<div id="inventory-tabs">
				<ul>
					<li><a href="#options">Vehicle Details</a></li>
					<li><a href="#description">Comments</a></li>
				</ul>
				<div id="description">
					<?php echo '<p>' . $description . '</p>'; ?>
				</div>
				<div id="options">
					<ul>
					<?php
						foreach( $dealer_options as $option ) {
							echo '<li>' . $option . '</li>';
						}
					?>
					</ul>
				</div>
			</div>
			<div id="tabs">
				<div id="description">
				</div>
				<div id="equipment">
				</div>
			</div>
			<br class="clear" />
		</div>
		<div class="column-right">
			<div class="slideshow">
				<div class="images">
				<?php
					foreach( $inventory->photos as $photo ) {
						echo '<img src="' . str_replace( '&' , '&amp;' , $photo->medium ) . '" width="320" height="240" />';
					}
				?>
				</div>
				<?php
					if( $video_url ) {
						echo '<a onClick="return video_popup(this, \'' . $year_make_model . '\')" href="' . $video_url . '" class="video-button">Watch Video for this Vehicle</a>';
					}
					if( count( $inventory->photos > 1 ) ) {
						echo '<div class="navigation"></div>';
					}
				?>
			</div>
			<br class="clear" />
		</div>
		<div class="disclaimer">
			<p><?php echo $inventory->disclaimer; ?></p>
		</div>
	</div>
</div>
