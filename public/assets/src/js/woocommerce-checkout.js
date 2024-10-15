/* global MMISE */
( function( $ ) {
	$( function( $ ) {
		const $shipping_country  = $( 'select#shipping_country' )
		const $billing_country   = $( 'select#billing_country' )

		const $ship_to_different = $( '#ship-to-different-address-checkbox' )

		const noticeContainer = $( '#max-marine-international-shipping-enhancements-notice-container' )

		const maybeShowInternationalShippingNotice = () => {
			if ( ! noticeContainer ) {
				return
			}

			const domesticCountries = MMISE.DOMESTIC_COUNTRY_CODES

			const has_shipping_address = $ship_to_different.is( ':checked' )

			let shippingCountry

			if ( has_shipping_address ) {
				shippingCountry = $shipping_country.val()
			} else {
				shippingCountry = $billing_country.val()
			}

			if ( domesticCountries.includes( shippingCountry ) ) {
				noticeContainer.addClass( 'hidden' )
			} else {
				noticeContainer.removeClass( 'hidden' )
			}
		}

		$shipping_country.on( 'change', () => {
			maybeShowInternationalShippingNotice()
		} )

		$billing_country.on( 'change', () => {
			maybeShowInternationalShippingNotice()
		} )

		$ship_to_different.on( 'change', () => {
			maybeShowInternationalShippingNotice()
		} )

		maybeShowInternationalShippingNotice()

		$( document.body ).on( 'updated_checkout', function(){
			maybeShowInternationalShippingNotice()
		} )
	} )
} )( jQuery )
