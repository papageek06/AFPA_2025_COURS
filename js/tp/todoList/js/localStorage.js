class LocalStorage {

   static update(key , value){
    localStorage.setItem(key, JSON.stringify(value))
    }

   static findAll(key){
        return JSON.parse(localStorage.getItem(key)) || [];
    }
}

export default LocalStorage