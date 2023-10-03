<template>
    <Layout>
        <header class="myheader">
            <h1>Welcome to Checkout Countdown</h1>
            <h2>You can manage redirect or block unwanted country</h2>
        </header>
        <section class="mt-20" v-if="!extensionEnabled">
            <div class="column twelve">
                <div class="alert info">
                    <dl>
                        <dt>You are in "Checkout Countdown" app  </dt>
                        <dd>Add app from  theme customize</dd>
                    </dl>
                    <a class="button" target="_blank" :href="'https://'+shop+'/admin/settings/checkout/editor?page=information&extensionPicker=true'">Enable It</a>
                </div>
            </div>
        </section>
        <article class="mt-20"></article>  
        <section class="m-20">
            <aside>
                <h2>Enable countdown</h2>
                <p>you can enable this app from theme customize</p>
            </aside>
            <article>
                <div class="card">
                    <h5>Do you want to enable this app?</h5>
                    <p>Please click on <code>Add app block</code> from bottom left cornet of  theme customize</p>
                    <div class="alert notice"> <dl><dt>Please follow bottom instructions</dt></dl></div>
                    <ul>
                        <li>After click on Add app block select "Pro Checkout Countdown"</li>
                        <li>Then fill your detail </li>
                        <li>Click on save button</li>
                    </ul>
                </div>
            </article>
        </section>
    </Layout>
</template>
<script>
export default {
    data() {
        return {
            themeId: window.$GLOBALS.themeId,
            extensionEnabled: window.$GLOBALS.extensionEnabled,
            extensionId: window.$GLOBALS.extensionId,
            appName: window.$GLOBALS.appName,
            shop: window.SHOP,
        }
    },
    mounted(){
      
    },
    methods: {
       
    }
}
</script>