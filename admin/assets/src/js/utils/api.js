/* global mmise */
export const fetchGetOptions = () => {
	return {
		headers: {
			"X-WP-Nonce": mmise.NONCES.REST,
		},
	};
}

export const fetchPostOptions = ( postData ) => {
	return {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
			"X-WP-Nonce": mmise.NONCES.REST,
		},
		body: JSON.stringify(postData),
	};
}

export const fetchPostFileUploadOptions = ( formData ) => {
	return {
		method: 'POST',
		headers: {
			'X-WP-Nonce': MM_ELC.NONCES.REST,
		},
		body: formData,
	}
}

export const apiGetSettings = async () => {
	const response = await fetch(
		`${mmise.REST_URL}/plugin-settings`,
		fetchGetOptions()
	);

	return response.json()
}

export const apiSaveSettings = async ( settings ) => {
	const response = await fetch(
		`${mmise.REST_URL}/plugin-settings`,
		fetchPostOptions({ settings })
	);

	return response.json()
}
