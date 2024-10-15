import {
	useState,
	useEffect
} from '@wordpress/element'

import apiFetch from '@wordpress/api-fetch'

export const useSettings = () => {
    const [ settingsLoaded, updateSettingsLoaded ] = useState( false )
    const [ enableInternationalShippingNotice, updateEnableInternationalShippingNotice ] = useState( false )
    const [ internationalShippingNoticeMessage, updateInternationalShippingNoticeMessage ] = useState( 'Example message' )

	useEffect( () => {

        apiFetch( {
			path: '/wp/v2/settings'
		} ).then( ( settings ) => {
            updateEnableInternationalShippingNotice( settings.max_marine_international_shipping_enhancements_plugin_settings.enabled )
            updateInternationalShippingNoticeMessage( settings.max_marine_international_shipping_enhancements_plugin_settings.message )

			updateSettingsLoaded( true )
        } )
    }, [] )

	const saveSettings = async () => {
        return await apiFetch( {
            path: '/wp/v2/settings',
            method: 'POST',
            data: {
                max_marine_international_shipping_enhancements_plugin_settings: {
                    enabled: enableInternationalShippingNotice,
                    message: internationalShippingNoticeMessage,
                },
            },
        } )
    }

    return {
		settingsLoaded,
		updateSettingsLoaded,
        enableInternationalShippingNotice,
        updateEnableInternationalShippingNotice,
        internationalShippingNoticeMessage,
        updateInternationalShippingNoticeMessage,
		saveSettings,
    }
}