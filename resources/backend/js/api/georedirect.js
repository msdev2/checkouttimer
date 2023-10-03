export default {
    index(){
        return window.$GLOBALS.processRequest('GET api/redirectrule')
    },
    insert(data){
        return window.$GLOBALS.processRequest('POST api/redirectrule', data)
    },
    get(id){
        return window.$GLOBALS.processRequest('GET api/redirectrule/' + id)
    },
    delete(id){
        return window.$GLOBALS.processRequest('DELETE api/redirectrule/' + id)
    }
}