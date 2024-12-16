
# event-lab frontend
### On Vue 3 + Vite + Vuex

This is the frontend on my new hobby project Event Lab.   
For now it runs with my Docker project "event-lab-server"

`npm i` to install on first download   
`npm run dev` to run the vite app

Edit your hostfile to point localhost to eventlab.com   
`> nano /etc/hosts`   
`127.0.0.1 eventlab.com` 

Add a SSL certificate to your system to trust the https connections.


`> php php/glyphs-to-font.php` to create new iconfont file out of glyphs   
located in ~/event-lab/event-lab-front/src/iconfont/glyphs  
view them here `https://eventlab.com:5180/documentation/views/icons`

`> php php/build.php` to create a build in [event-lab-server](https://github.com/bespired/event-lab-server)