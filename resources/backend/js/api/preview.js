export default {
    index(){
        return window.$GLOBALS.processRequest('GET api/previews')
    },
    save(data){
        return window.$GLOBALS.processRequest('POST api/previews',data)
    }
}