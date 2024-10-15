/* global wp */
const {
	createRoot
} = wp.element

const domReady = wp.domReady

import AdminSettingsPage from './components/AdminSettings/AdminSettingsPage.jsx'

domReady( () => {
	const root = createRoot(
		document.getElementById( 'max-marine-international-shipping-enhancements-plugin-settings' )
	)

	root.render( <AdminSettingsPage /> )
} )
