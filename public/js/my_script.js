let toggle = document.querySelector('.side-toggle');
let navToggle = document.querySelector('.nav-toggle');
let sidebar = document.querySelector('.admin-sidebar');
let navBar = document.querySelector('.navbar-items');
let state = false;
toggle.addEventListener('click',()=> {
    sidebar.classList.toggle('collapse');
    state = !state;
});
sidebar.addEventListener('mouseover',()=> {
    if(state) {
        sidebar.classList.remove('collapse');
    }
})
sidebar.addEventListener('mouseleave',()=> {
    if(state) {
        sidebar.classList.add('collapse');
    }
})
navToggle.addEventListener('click',()=> {
    navBar.classList.toggle('navbar-collapse')
})

// GEt wilayas

const getWilayas = async () => {
    let response = await axios.get('/wilayas')
    return response.data.data
}
const getCity = async (wilaya) => {
    let response = await axios.get(`/wilayas/${wilaya}`)
    return response.data.data
}

let wilayasField = document.getElementById('state_of_residence')
let citiesField = document.getElementById('city_of_residence')

wilayasField && document.addEventListener('DOMContentLoaded', async function() {
    const wilayas = await getWilayas();
    wilayas?.forEach(wilaya => {
        const option = document.createElement('option');
        option.setAttribute('value',wilaya.id)
        option.textContent = wilaya.name
        wilayasField?.append(option)
    })
})

wilayasField?.addEventListener('change', async function(e) {
    citiesField.innerHTML = ''
    const cities = await getCity(e.target.value)
    cities.forEach(city => {
        const option = document.createElement('option');
        option.setAttribute('value',city.id)
        option.textContent = city.name
        citiesField.append(option)
    })
})
