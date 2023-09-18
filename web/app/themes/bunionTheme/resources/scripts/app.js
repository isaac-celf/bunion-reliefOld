import {clippingParents} from '@popperjs/core';
import {get} from '@roots/bud/instance';
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

  btnSingle.addEventListener('click', function () {
    surgeonTitleBox.setAttribute('value', surgeonTitle);
  });

  console.log(btnSingle);

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

        getTouchBtn?.addEventListener('click', function () {
          surgeonTitleBox.setAttribute('value', surgeonTitle);
        });
      });
    });
    observer.observe(storeList, config);

    for (let i = 0; i < changeIndex.length; i++) {
      let qPercent = Math.round(((i + 1) / changeIndex.length) * 100) + '%';

      changeIndex[i].innerHTML = qPercent;

      console.log(qPercent);
    }
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
