<template>
    <div class="docker">
        <window-head class="docker-blue" label="Docker"/>
        <div class="sidebar">
            <div class="selected">
                <prime-icon name="package-box" /> Containers</div>
            <div>
                <prime-icon name="container" /> Images</div>
            <div>
                <prime-icon name="server-box" /> Volumnes</div>
            <div>
                <prime-icon name="wrench" /> Builds</div>
            <div>
                <prime-icon name="puzzle-piece" /> Extensions</div>
        </div>
        <div class="contents">
            <table>
                <tbody>
                    <tr>
                        <td><prime-icon name="checkbox-box"/></td>
                        <td></td>
                        <td></td>
                        <td>Name</td>
                        <td>Container ID</td>
                        <td>Image</td>
                        <td>Port(s)</td>
                        <td>Actions</td>
                    </tr>
                    <tr v-for="item in items">
                        <td><prime-icon name="checkbox-box"/></td>
                        <td></td>
                        <td><prime-icon name="radio-checked" v-if="item.on" /></td>
                        <td :class="item.id==='-'?'':'indent'">
                            {{ item.name    }}
                        </td>
                        <td>{{ item.id      }}</td>
                        <td>{{ item.image   }}</td>
                        <td>{{ item.ports   }}</td>
                        <td class="actions">
                            <prime-icon name="stop"  v-if="item.on" />
                            <prime-icon name="trash"  />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>
<script>
export default {
    props: {
        items: { type: Array, default: [] },
    },
}

</script>
<style>
.docker{
    margin: 12px;
    box-shadow: 0 0 0 8px;
    max-width: 880px;
    font-size: 12px;
    border-radius: 12px;
    box-shadow: 0 0 8px 0px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}
.docker .sidebar {
    padding: 10px;
    background-color: #EEE;
    width: 200px;
    line-height: 2;
}
.docker .contents {
    padding: 10px;
    width: calc(100% - 200px);
}
.docker .contents table{
    width: 100%;
}

.docker .icon-radio-checked {
    color: green;
}

.docker .actions {
    text-align: right;
}
.docker .actions .icon {
    padding-left: 8px;
}

.docker .sidebar .icon {
    margin-right: 6px;
}

.docker .indent {
    padding-left: 12px ;
}

.docker .sidebar .selected {
    background-color:#DDD;
    border-radius: 6px;
}

.docker .sidebar > div{
    padding: 2px 8px;
}
</style>
