<template>
    <div class="menu-header">
        <a href="dashboard"  :class="isActive('dashboard')" ><span />Dashboard  </a>
        <a href="profile"    :class="isActive('profile')"   ><span />Profiles   </a>
        <a href="group"      :class="isActive('group')"     ><span />Groups     </a>
        <a href="automation" :class="isActive('automation')"><span />Automation </a>
        <a href="mail"       :class="isActive('mail')"      ><span />Mail       </a>
        <a href="website"    :class="isActive('website')"   ><span />Website    </a>
    </div>
</template>

<script>
export default {
    data() {
        return {

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
    z-index: 1;
    box-shadow: 0 0 8px #0000002e;
    font-weight: 300;
    font-size: 13px;
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
</style>
