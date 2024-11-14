const JWT = {

    notExpired() {
    	let token = localStorage.getItem('token')
    	if (!token) return false

    	let payload = null
    	try {
    		payload = JSON.parse(atob(token.split('.')[1]))
    		if (!payload.hasOwnProperty('exp')) return false

    	} catch (e) {
    		return false
    	}
    	let now = new Date()
    	return now.getTime() < (payload.exp * 1000)
	},

}

export default JWT;
