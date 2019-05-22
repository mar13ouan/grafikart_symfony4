/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import Places from 'places.js'
import Map from './modules/map'
import 'slick-carousel'
import 'slick-carousel/slick/slick.css'
import 'slick-carousel/slick/slick-theme.css'
let $ = require('jquery');

// MAP 
Map.init()
//// Field Autocomplete
let inputAdress = document.querySelector('#adress');
if (inputAdress !== null) {
    console.log('pas null')
    let place = Places({
        container: inputAdress
    })
    place.on('change', e => {
        document.querySelector('input#city').value = e.suggestion.city
        document.querySelector('input#postal_code').value = e.suggestion.postcode
        document.querySelector('input#lat').value = e.suggestion.latlng.lat
        document.querySelector('input#lng').value = e.suggestion.latlng.lng
    })
}
//// SearchField Autocomplete
let searchAdress = document.querySelector('#searchAdress');
if (searchAdress !== null) {
    console.log('pas null')
    let place = Places({
        container: searchAdress
    })
    place.on('change', e => {
        document.querySelector('input#property_search_lat').value = e.suggestion.latlng.lat
        document.querySelector('input#property_search_lng').value = e.suggestion.latlng.lng
    })
}
// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.


require('select2');
$('select').select2();

//Slick Carroussel
$('[data-slider]').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear'
})

//  $('.selectOptions').select2();

let contactButton = $('#contactButton');
contactButton.click(e => {
    e.preventDefault()
    $('#contactForm').slideDown();
    $('#contactButton').slideUp();
})

//suppression des éléments
document.querySelectorAll('[data-delete]').forEach(a => 
    {
    a.addEventListener('click', e => {
        e.preventDefault()
        fetch(a.getAttribute('href'), {
            method: 'DELETE',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ '_token': a.dataset.token })
        }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    a.parentNode.parentNode.removeChild(a.parentNode);
                } else {
                    alert(data.error)
                }
            }).catch(e => alert(e))
    })
})
