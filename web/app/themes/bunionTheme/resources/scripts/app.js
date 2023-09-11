import { clippingParents } from '@popperjs/core';
import domReady from '@roots/sage/client/dom-ready';
import 'bootstrap';

/**
 * Application entrypoint
 */
domReady(async () => {

    const listItems = document.querySelectorAll('.acf-checkbox-list li');
    const changeIndex = document.querySelectorAll('.af-page-button .title');

    // listItems.forEach(item => {
    //     item.classList.add('col');
    // });


    for(let i =0; i < changeIndex.length; i++) {
        let qPercent = Math.round(((i + 1)/ changeIndex.length) * 100) + "%";
        
        changeIndex.innerHTML = qPercent;

        console.log(qPercent);
    }


    document.addEventListener('DOMContentLoaded', function() { 
        if (acf) {
            acf.addAction( 'af/form/page_changed', function( newPage, previousPage, form ) {

                console.log(form);
                console.log("Changed page from %d to %d", previousPage, newPage)

            });
        }
    })



});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
