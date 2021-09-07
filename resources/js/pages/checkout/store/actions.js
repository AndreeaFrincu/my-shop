export default{
    setCheckout({commit}) {
        //retrieve data
        let country = 'default'

        //set data
        commit('setCountry', country)
    }
}
