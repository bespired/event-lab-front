<template>

	<main-header />
	<menu-header />
	<!-- <button-row>
		<click-button label="Click me"       type="primary"   />
		<click-button label="Click me"       type="secondair" />
		<click-button label="Click info"     type="info"      />
		<click-button label="Click positive" type="positive"  />
		<click-button label="Click negative" type="negative"  />
		<click-button label="Click success"  type="success"   />
		<click-button label="Click warning"  type="warning"   />
		<click-button label="Click danger"   type="danger"    />
		<click-button label="Click error"    type="error"     />
		<click-button label="Click link"     type="link"      />
	</button-row> -->
	<!-- <click-button label="Click me" type="primary" @click="visible=true"  /> -->
	<top-bar-loader view="LoginPanel" :visible="visible" @completed="visible=false"/>

</template>

<script>
export default {
    data() {
        return {
            visible: false
        }
    },
}
</script>
