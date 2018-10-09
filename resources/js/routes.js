import VueRouter from 'vue-router'
import Vue from 'vue';

import singlePD from './components/project_manager.vue'
import Project from './components/project_staff.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    mode:'history',
    routes: [
        {
            path:"/project",
            component:Project,
            props:true
        },

        {
            path:'/project/:id',
            component:singlePD,
            props:true
        },

    ]
})

export default router