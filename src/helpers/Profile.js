const Profile = {

    loadProfiles(state) {

        let object = {
            // filter stuff, start page etc...
        }

        let headers = {
            "Content-Type": "application/json",
            "X-Auth-Token": localStorage.getItem('token')
        }

        let http = document.location.protocol
        let host = document.location.hostname

        let url = `${http}//${host}/--/profile/0/profiles/list`

        // note the missing project Id ...
        // server will try to figure that out via hostname
        // let url = "https://eventlab.com/--/profile/0/profiles/list"

        fetch(url, {
            method: "POST",
            headers: headers,
            body: JSON.stringify(object),
        })
        .then(response=>response.json())
        .then(json=> {
            if (json.hasOwnProperty('success')) state.profiles = json.message
        });


    },

    loadProfile(state) {

        let object = {
            profile: state.phandle
        }

        let headers = {
            "Content-Type": "application/json",
            "X-Auth-Token": localStorage.getItem('token')
        }

        let http = document.location.protocol
        let host = document.location.hostname

        let url = `${http}//${host}/--/profile/0/profiles/handle`

        fetch(url, {
            method: "POST",
            headers: headers,
            body: JSON.stringify(object),
        })
        .then(response=>response.json())
        .then(json=> {
            if (json.hasOwnProperty('success')) state.profile = json.message
        });


    }

}

export default Profile;
