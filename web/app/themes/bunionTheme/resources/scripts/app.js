import {clippingParents} from '@popperjs/core';
import domReady from '@roots/sage/client/dom-ready';
import 'bootstrap';

/**
 * Application entrypoint
 */
domReady(async () => {
  const listItems = document.querySelectorAll('.acf-checkbox-list li');
  const changeIndex = document.querySelectorAll('.af-page-button .title');
  const btnSingle = document.querySelector('.btnStoreSingle');
  const surgeonTitle = document.querySelector('.store-single-title')?.innerHTML;
  const surgeonTitleBox = document.querySelector('#acf-field_65044e3b06428');
  const searchBox = document.querySelector('#wpsl-search-input');

  console.log(searchBox);

  if (btnSingle) {
    btnSingle.addEventListener('click', function () {
      surgeonTitleBox.setAttribute('value', surgeonTitle);
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    const storeList = document.querySelector('#wpsl-stores ul');
    const config = {attributes: true, childList: true, subtree: true};

    const observer = new MutationObserver(function () {
      const storeListItems = storeList.querySelectorAll('li');
      console.log(storeListItems);

      storeListItems.forEach(function (listItem) {
        console.log(listItem);
        const surgeonTitle = listItem.querySelector(
          '.store-single-title',
        )?.innerHTML;
        const surgeonTitleBox = listItem.querySelector(
          '#acf-field_65044e3b06428',
        );
        const getTouchBtn = listItem.querySelector('.btnTouch');

        console.log(getTouchBtn);

        if (getTouchBtn) {
          getTouchBtn?.addEventListener('click', function () {
            surgeonTitleBox.setAttribute('value', surgeonTitle);
          });
        }
      });
    });

    if (storeList) {
      observer.observe(storeList, config);
    }

    for (let i = 0; i < changeIndex.length; i++) {
      let qPercent = Math.round(((i + 1) / changeIndex.length) * 100) + '%';

      changeIndex[i].innerHTML = qPercent;

      console.log(qPercent);
    }
  });

  const queryString = window.location.search;
  console.log(queryString);

  const urlParams = new URLSearchParams(queryString);
  const zipCode = urlParams.get('zip_code');

  console.log(zipCode);
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
