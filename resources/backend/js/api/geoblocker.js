export default {
    index(){
        return window.$GLOBALS.processRequest('GET api/geoblocker')
    },
    save(data){
        return window.$GLOBALS.processRequest('POST api/geoblocker',data)
    }
}