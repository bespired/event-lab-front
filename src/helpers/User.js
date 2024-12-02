const User = {

    loadUser(state) {

        let object = {
            // user is in JWT
        }

        let headers = {
            "Content-Type": "application/json",
            "X-Auth-Token": localStorage.getItem('token')
        }

        let http = document.location.protocol
        let host = document.location.hostname

        let url = `${http}//${host}/--/profile/user/backend`

        // note the missing project Id ...
        // server will try to figure that out via hostname
        // let url = "https://eventlab.com/--/profile/0/user/backend"

        fetch(url, {
            method: "POST",
            headers: headers,
            body: JSON.stringify(object),
        })
        .then(response=>response.json())
        .then(json=> {
            state.user = json.message
            if (json.hasOwnProperty('success')) state.user = json.message
        });

    	// return {
    	// 	name: "Joeri Kassenaar",
    	// 	role: "bespired",
    	// 	settings: {
    	// 		colorscheme: "light"
    	// 	}
    	// }
    }

}

export default User;
