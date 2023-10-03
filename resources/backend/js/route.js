import { createWebHistory, createRouter } from "vue-router";
// import store from './store'
const routeoptions = [
    {pageName : 'NotFound', name: 'NotFound', path: '/:pathMatch(.*)*'},
    {pageName : 'Dashboard', name: 'Dashboard', path: '/'},
    {pageName : 'GeoRedirect', name: 'GeoRedirect', path: '/geo-redirect'},
    {pageName : 'GeoRedirectAdd', name: 'GeoRedirectAdd', path: '/geo-redirect/add'},
    {pageName : 'GeoRedirectAdd', name: 'GeoRedirectEdit', path: '/geo-redirect/edit/:id'},
    {pageName : 'GeoBlocker', name: 'GeoBlocker', path: '/geo-blocker'},
    {pageName : 'Setting', name: 'Setting', path: '/setting'}
]
const routes = routeoptions.map(route => {
    return {
        ...route,
        component: ()=> route.pageName ? import(/* webpackChunkName: "[request]" */ `@/views/pages/${route.pageName}.vue`) : ''
    }
})

window.router = createRouter({
    history: createWebHistory(),
    routes
});
router.beforeEach((to, from, next) =>{
    if (to.name) {
        // Start the route progress bar.
        shopify.loading(true);
    }
    next()
    
})
router.afterEach(() => {
    window.scrollTo(0,0);
    shopify.loading(false);
})
export default router;
