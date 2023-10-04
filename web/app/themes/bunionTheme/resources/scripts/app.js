import {clippingParents} from '@popperjs/core';
import domReady from '@roots/sage/client/dom-ready';
import 'bootstrap';
import loadMore from './loadMore';

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
  const searchSurgeonBtn = document.getElementById('wpsl-search-btn');

  // Single Surgeon Auto Populate Name > Form
  if (btnSingle) {
    btnSingle.addEventListener('click', function () {
      surgeonTitleBox.setAttribute('value', surgeonTitle);
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    // Multiple Surgeon page, populate Name > Form
    const storeList = document.querySelector('#wpsl-stores ul');
    const config = {attributes: true, childList: true, subtree: true};

    const observer = new MutationObserver(function () {
      const storeListItems = storeList.querySelectorAll('li');

      storeListItems.forEach(function (listItem) {
        const dataKey = listItem.getAttribute('data-key');

        console.log(listItem);
        const surgeonTitle = listItem.querySelector(
          '.store-single-title',
        )?.innerHTML;
        const surgeonTitleBox = document.querySelector(
          '#iTouchModal-' + dataKey + ' #acf-field_65044e3b06428',
        );

        const getTouchBtn = listItem.querySelector('.btnTouch');

        if (getTouchBtn && surgeonTitleBox) {
          getTouchBtn?.addEventListener('click', function () {
            surgeonTitleBox.setAttribute('value', surgeonTitle);
          });
        }
      });
    });

    if (storeList) {
      observer.observe(storeList, config);
    }
  });

  /**
  Symptom checker progress bar
  */
  for (let i = 0; i < changeIndex.length; i++) {
    let qPercent = Math.round(((i + 1) / changeIndex.length) * 100) + '%';

    changeIndex[i].innerHTML = qPercent;

    console.log(qPercent);
  }

  /**
  result - inject Zip Code > URL > redirect searchx
  */
  const queryZipCode = window.location.search;
  const urlParams = new URLSearchParams(queryZipCode);
  const zipCode = urlParams.get('zip_code');

  const authorizeClick = function () {
    searchSurgeonBtn.click();
  };

  if (zipCode) {
    searchBox.setAttribute('value', zipCode);
    window.onload = function () {
      authorizeClick();
    };
  }
});

loadMore();

/**
Stepper
*/
const stepperSingle = document.querySelectorAll('.stepper-single');
const stepperImage = document.querySelectorAll('.stepper-img');
const stepperIndicator = document.querySelectorAll('.stepper-indicator');
const stepperContent = document.querySelectorAll('.stepper-content');

/**
default state
*/
stepperContent.forEach((el) => {
  el.classList.add('opacity-50');
});

stepperSingle[0].firstElementChild.classList.add('activeStep');
stepperImage[0].classList.remove('d-none');
stepperContent[0].classList.remove('opacity-50');

stepperSingle.forEach(function (el, index) {
  el.addEventListener('click', function () {
    console.log(el.dataset.image);
    // Indicator
    stepperIndicator.forEach(function (indicator) {
      indicator.classList.remove('activeStep');
    });
    el.firstElementChild.classList.add('activeStep');

    // Image
    stepperImage.forEach(function (img) {
      img.classList.add('d-none');
    });
    stepperImage[index].classList.remove('d-none');

    // Step
    stepperContent.forEach(function (step) {
      step.classList.add('opacity-50');
    });
    stepperContent[index].classList.remove('opacity-50');
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
