<template>
    <div class="scroll-content">
        <console-wrap>
        ~ % cd Projects/event-lab --
        event-lab % cd event-lab-front --
        event-lab-front % {z}npm run dev{/} --
        --
        > frontend@1.0.0 dev --
        > vite --
         --
        Using basepath: --
        --
          {g}VITE v5.4.10{/}  ready in {z}610 ms{/} --
        --
          ➜  {z}Network:{/} {t}https://eventlab.com:5180/{/} --
          ➜  press {z}h + enter{/} to show help --
        </console-wrap>

        <docker-wrap :items="items" />
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: [
                { on: true, name: 'event-lab-server', id: '-', image: '-', ports: '-', actions: '-' },
                { on: true, name:'docker.redis',   id:'06d5fa2388cd', image:'bitname/redis:latest',     ports:'6379:6379' },
                { on: true, name:'docker.traefik', id:'43ad21a6498d', image:'traefik:v3',               ports:'443:443, 80:80...' },
                { on: true, name:'docker.mysql',   id:'1e5a97b90aaf', image:'arm64v8/mysql:latest',     ports:'3306:3306' },
                { on: true, name:'docker.admin',   id:'626a95dce99d', image:'event-lab-server-admin',   ports:'-' },
                { on: true, name:'docker.public',  id:'f8ddde0d248b', image:'event-lab-server-public',  ports:'-' },
                { on: true, name:'docker.profile', id:'d21dd457bb18', image:'event-lab-server-profile', ports:'-' },
                { on: true, name:'docker.tracker', id:'9c3f87b0731b', image:'event-lab-server-tracker', ports:'-' },
                { on: true, name:'docker.ratchet', id:'987265604370', image:'event-lab-server-ratchet', ports:'9001:9001' }
            ]
        }
    }
}
</script>





