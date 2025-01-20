import FormBuilder from "@/helpers/FormBuilder.js"

export default {

	namespaced: true,

	state: {
		layouts: [],
		designs: [],
		fields:  [],
	},

	getters: {
		getLayouts:  (state) => state.layouts,
		getDesigns:  (state) => state.designs,
		getFields:   (state) => state.fields,
	},

	mutations: {
	},

	actions: {
		loadFormBuilder(context) {
			FormBuilder.loadBuilder(context.state)
		},
	},

}
