<template>
    <div class="profile-box"
        :class="isSelected()"
        @click="show()">
        <div class="leftbox" :class="device">
            <img :src="`/svg/${device}.svg`" />
        </div>
        <div class="midbox">
            <div class="midrow">
                <div class="inSegment">
                   {{ profile.pagecount }}
                </div>
                <div class="inSegment">
                    <prime-icon name="user--color" />
                </div>
                <div class="inSegment">
                    <prime-icon name="user--color" />
                </div>
            </div>
        </div>
        <div class="rightbox">
            <div class="lastvisit">
                {{ profile.lastvistdate }}
            </div>

            <div class="namebox contact" v-if="profile.is_contact == 1">
                {{ profile.firstname }} {{ profile.lastname }}
            </div>
            <div class="namebox email" v-if="profile.is_contact == 1">
                {{ profile.email }}
            </div>
            <div class="namebox visitor" v-if="profile.is_contact != 1">
                 visitor from {{ profile.country_name_1 }}
            </div>

        </div>
    </div>
</template>
<script>
export default {

    props: {
        profile: { type: Object, default: null },
    },

    computed: {
        device() {
            // console.log(this.profile)
            if (!this.profile.lastdevice) return 'empty'
            return this.profile.lastdevice
        },
    },

    methods: {
        isSelected() {
            let current = document.location.pathname.split('/').at(-1)
            return  current === this.profile.handle ? 'isSelected' : ''
        },

        show() {
            let development = (import.meta.env.MODE === 'development')
            let origin = document.location.origin
            let root = development ? '' : `${origin}/--/admin/`
            let href = `${root}/visitors/${this.profile.handle}`

            history.pushState({}, null, href);
        }
    }

}
</script>
<style>
.profile-box {
    background-color: #f0f0f0;
    border-bottom: 1px solid var(--color-border);
    min-height: 54px;
    display: flex;
    flex-direction: row;
    font-size: 13px;
    user-select: none;
    transition: background-color 300ms;
    padding-right: 8px;
}

.profile-box.isSelected {
    min-height: 53px;
    background-color: #d0dcb4;
    border-bottom: 1px solid #92b536;
    box-shadow: inset 0 1px #92b536;
}

.profile-box img{
    width: 32px;
    height: 32px;
    background-color: white;
    border-radius: 4px;
    padding: 4px;
}

.profile-box:hover {
    background-color: aliceblue;
    cursor: pointer;
}

.profile-box.isSelected:hover {
    background-color: #d0dcb4;
    cursor: pointer;
}

.inSegment {
    position: relative;
    background-color: white;
    width: 32px; height: 32px;
    border-radius: 4px;
    border: 1px solid var(--color-border);
}

.inSegment ~ .inSegment {
    margin-left: 2px;
}

.profile-box .colorbox {
    position: absolute;
    background-color: #a5cbd6;
    mix-blend-mode: multiply;
}

.colorpill,
.colorball {
    position: absolute;
    top: 7px;
    left: 12px;
    width: 6px;
    height: 6px;
    border-radius: 4px;
    background-color: #a5cbd6;
    mix-blend-mode: multiply;
}
.colorpill {
    top: 16px;
    left: 8px;
    width: 14px;
}


/*.profile-box .leftbox.desktop .colorbox {
    top: 10px;
    left: 16px;
    width: 30px;
    height: 21px;
}

.profile-box .leftbox.mobile .colorbox {
    top: 10px;
    left: 22px;
    width: 18px;
    height: 29px;
}*/

.midrow {
    display: flex;
    flex-direction: row;
}
.lowrow {
    text-align: right;
    font-size: 8px;
}

.midbox {
    font-size: 10px;
}

.inSegment {
    align-content: center;
    text-align: center;
    font-size: 14px;
}

.profile-box .leftbox {
    position: relative;
    display: flex;
    align-self: center;
    justify-content: center;
    padding: 0 2px 0 6px;
}

.leftbox .pi {
    font-size: 35px;
    padding: 6px;
    border: 1px solid #e2e4e3;
    border-radius: 4px;
    background: white;
/*    color: #34619b;*/
}

.profile-box .midbox {
    align-self: flex-end;
    padding-bottom: 6px;
}

.profile-box .rightbox {
    align-self: center;
    display: flex;
    flex-direction: column;
    margin-left: auto;
    padding-right: 8px;
}

.profile-box .lastvisit {
    font-size: 10px;
    text-align: right;
    color: #505355
}

.profile-box .namebox {
    text-align: right;
}

.namebox.email {
    color: #505355;
    font-size: 12px;
    user-select: all;
}

.profile-box .namebox.contact {
    font-weight: 900;
    font-size: 15px;
    line-height: 1;
}
</style>