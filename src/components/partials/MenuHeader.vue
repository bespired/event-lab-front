<template>
    <div class="menu-header center" v-if="labmode">
        <a href="dashboard"  :class="isActive('dashboard')" ><span />
            <prime-icon name="qrcode"    /> Dashboard  </a>
        <a href="profile"    :class="isActive('profile')"   ><span />
            <prime-icon name="user"      /> Profiles   </a>
        <a href="group"      :class="isActive('group')"     ><span />
            <prime-icon name="users"     /> Groups     </a>
        <a href="automation" :class="isActive('automation')"><span />
            <prime-icon name="microchip" /> Automation </a>
        <a href="mail"       :class="isActive('mail')"      ><span />
            <prime-icon name="send"      /> Mail       </a>
        <a href="website"    :class="isActive('website')"   ><span />
            <prime-icon name="globe"     /> Website    </a>
    </div>
    <div class="menu-header lefter" v-if="docmode">
        <crum-path />
<!--         <link-button label="Home"          url="/" icon="home" /> /
        <link-button label="documentation" url="/documentation" icon="book" /> /
        <link-button label="lifecycle"     url="/documentation/lifecycle" icon="book" />
 -->    </div>
</template>

<script>
export default {
    data() {
        return {
            labmode: document.location.pathname.substr(0,14) !== '/documentation',
            docmode: document.location.pathname.substr(0,14) === '/documentation'
        }
    },
    methods: {
        isActive(when) {
            const regex = new RegExp(`${when}`);
            return document.location.href.match(regex) ? 'focus' : ''
        }
    }
}
</script>

<style>
    .menu-header {
        display: flex;
        user-select: none;
        position: fixed;
        left:0; right:0;
        top:52px; height: 40px;
        padding: 0 14px;
        background-color: white;
        z-index: 9;
        box-shadow: 0 0 8px #0000002e;
        font-weight: 300;
        font-size: 13px;
        align-items: center;
    }

    .menu-header.center {
        justify-content: center;
    }

    .menu-header a {
        padding: 4px 16px;
        display: flex;
        align-self: center;
        align-items: center;
        transition: background-color 200ms;
        color: inherit;
        border-radius: 4px;
        margin: 0 1px;
    }

    .menu-header a.focus:hover,
    .menu-header a.focus {
        background-color: #92b536;
        color: white;
        font-weight: 500;
    }

    .menu-header a:hover {
        background-color: #92b53640;
        color: #213547;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 900;
    }

    .menu-header .link-button {
        padding: 4px 4px;
    }
</style>
