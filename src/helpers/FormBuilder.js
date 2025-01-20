const FormBuilder = {

    loadBuilder(state) {

        let object = {
        }

        let headers = {
            "Content-Type": "application/json",
            "X-Auth-Token": localStorage.getItem('token')
        }

        let http = document.location.protocol
        let host = document.location.hostname

        let url = `${http}//${host}/--/profile/0/formbuilder/builder`

        fetch(url, {
            method: "POST",
            headers: headers,
            body: JSON.stringify(object),
        })
        .then(response=>response.json())
        .then(json=> {
            if (json.hasOwnProperty('success')) {
                state.layouts = json.message.layouts
                state.designs = json.message.designs
                state.fields  = json.message.fields
            }
        });


    }

}

export default FormBuilder;
