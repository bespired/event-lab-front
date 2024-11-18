<template>
    <div class="scroll-content">
        Dashboard prototype <br><br>
        <dashboard-grid>
            <dash-panel :data="data[0]" />
            <dash-panel :data="data[1]" />
            <dash-panel :data="data[0]" />
            <dash-panel :data="data[1]" />
            <dash-panel :data="data[0]" />
        </dashboard-grid>
    </div>
</template>
<script>
export default {

    data() {
        return {
            data: [
                {
                    theme: "blue",
                    label: "Visitors",
                    link: "#",
                    number: 87323,
                    bars: [3, 6, 5, 3, 6, 8],
                    differ: 55,
                    note: "visitors",
                }, {
                    theme: "violet",
                    label: "Contacts",
                    link: "#",
                    number: 7323,
                    bars: [3, 5, 3, 6, 8, 5],
                    differ: -34,
                    note: "contacts",
                }, {
                    theme: "aqua",
                    label: "MQL",
                    link: "#",
                    number: 323,
                    bars: [3, 6, 3, 6, 8, 5],
                    differ: 25,
                    note: "mq leads",
                }
            ]
        }
    }

}
</script>
