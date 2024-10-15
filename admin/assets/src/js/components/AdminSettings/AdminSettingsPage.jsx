import { __ } from '@wordpress/i18n'

import {
	PanelBody,
	PanelRow,
	Button,
	ToggleControl,
	TextareaControl,
	__experimentalHStack as HStack
} from '@wordpress/components'

import {
	Fragment,
	useState,
} from '@wordpress/element'

import {
	useDispatch
} from '@wordpress/data'

import {
	store as noticesStore
} from '@wordpress/notices'

import { useSettings } from '../../hooks/useSettings'
import Notices from '../Notices/Notices'

const AdminSettingsPage = () => {
	const [ apiSaving, setAPISaving ] = useState( false )

    const { createSuccessNotice } = useDispatch( noticesStore )

	const {
        enableInternationalShippingNotice,
        updateEnableInternationalShippingNotice,
        internationalShippingNoticeMessage,
        updateInternationalShippingNoticeMessage,
		saveSettings,
    } = useSettings()

	const updateSettings = async ( event ) => {
		event.preventDefault()

		setAPISaving( true )

		saveSettings()
			.then( () => {
				setAPISaving( false )

				createSuccessNotice(
					__( 'Settings saved.', 'max-marine-international-shipping-enhancements' )
				)
			} )
	}

	return (
		<Fragment>
			<div className="settings-header">
				<div className="settings-container">
					<div className="settings-logo">
						<h1>{ __( 'Max Marine - International Shipping Enhancements', 'max-marine-international-shipping-enhancements' ) }</h1>
					</div>
				</div>
			</div>

			<div className="settings-main">
				<Fragment>
					<Notices />

					<PanelBody title={ __( 'General', 'max-marine-international-shipping-enhancements' ) }>
						<PanelRow className="field-row">
							<ToggleControl
								label={ __( 'Enabled', 'max-marine-international-shipping-enhancements' ) }
								checked={ enableInternationalShippingNotice }
								onChange={ updateEnableInternationalShippingNotice }
							/>
						</PanelRow>
						{ enableInternationalShippingNotice ? (
							<PanelRow className="field-row">
								<TextareaControl
									label={ __( 'Message', 'max-marine-international-shipping-enhancements' ) }
									value={ internationalShippingNoticeMessage }
									onChange={ updateInternationalShippingNoticeMessage }
									__nextHasNoMarginBottom
								/>
							</PanelRow>
						) : null }
					</PanelBody>
					<HStack
						alignment="center"
					>
						<Button
							variant="primary"
							isBusy={ apiSaving }
							isLarge
							target="_blank"
							href="#"
							onClick={ updateSettings }
						>
							{ __( 'Save', 'max-marine-international-shipping-enhancements' ) }
						</Button>
					</HStack>

				</Fragment>
			</div>
		</Fragment>
	)
}

export default AdminSettingsPage
