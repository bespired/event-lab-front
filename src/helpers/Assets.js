const Assets = {

    loadAssets(state) {

        let assetType = state.assetType
        let object = {
          assetType: state.assetType
          // filter stuff, start page etc...
        }

        let headers = {
            "Content-Type": "application/json",
            "X-Auth-Token": localStorage.getItem('token')
        }

        let http = document.location.protocol
        let host = document.location.hostname

        let url = `${http}//${host}/--/profile/0/assets/list`

        // note the missing project Id ...
        // server will try to figure that out via hostname
        // let url = "https://eventlab.com/--/profile/0/assets/list"

        fetch(url, {
            method: "POST",
            headers: headers,
            body: JSON.stringify(object),
        })
        .then(response=>response.json())
        .then(json=> {
            if (json.hasOwnProperty('success')) state.assets[assetType] = json.message
        });


    }

}

export default Assets;
