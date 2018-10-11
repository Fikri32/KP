import VueRouter from 'vue-router'
import Vue from 'vue';

import singlePD from './components/project_manager.vue'
import Project from './components/project_staff.vue'
import projectSetting from './components/project_adActions.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    mode:'history',
    routes: [
        {
            path:"/project",
            components:Project,
            props:true
        },

        {
            path:'/project/:id',
            component:singlePD,
            props:true
        },

        {
            path:'/setting/:id',
            component:projectSetting,
            props:true
        },
    ]
});

router.beforeEach((to,from,next) => {

})

export default router