/* global wp */
const {
	createRoot
} = wp.element

import AdminSettingsPage from './components/AdminSettings/AdminSettingsPage.jsx'

const root = createRoot( document.getElementById( 'max-marine-international-shipping-enhancements-plugin-settings' ) )
root.render( <AdminSettingsPage /> )
