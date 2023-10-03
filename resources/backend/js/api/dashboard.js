export default {
    index(){
        return window.$GLOBALS.processRequest('GET api/setting')
    },
    save(data){
        return window.$GLOBALS.processRequest('POST api/setting',data)
    }
}