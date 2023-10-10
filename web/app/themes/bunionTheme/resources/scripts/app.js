import {clippingParents} from '@popperjs/core';
import domReady from '@roots/sage/client/dom-ready';
import 'bootstrap';
import loadMore from './loadMore';
import Swiper from 'swiper';
import {
  Autoplay,
  FreeMode,
  Navigation,
  Pagination,
  Thumbs,
  HashNavigation,
} from 'swiper/modules';

/**
 * Application entrypoint
 */
domReady(async () => {
  const blockStepper = document.querySelector('.wp-block-stepper');

  if (blockStepper) {
    const swiperStepper = new Swiper('.stepperSlider', {
      on: {
        init: function () {
          activateStep(this.activeIndex);
        },
      },
      modules: [Pagination, HashNavigation, Navigation],
      direction: 'vertical',
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      hashNavigation: {
        watchState: true,
      },
    });

    function activateStep(slideID) {
      const stepperSingle = document.querySelectorAll('.stepper-single');

      stepperSingle.forEach((curStep, index) => {
        if (slideID == index) {
          curStep.classList.remove('opacity-50');
        } else {
          curStep.classList.add('opacity-50');
        }
      });
    }

    swiperStepper.on('slideChange', function () {
      activateStep(this.activeIndex);
    });
  }

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
  result - inject Zip Code > URL > redirect search
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
// const stepper = document.querySelectorAll('.stepper-container');
// const stepperImage = document.querySelectorAll('.stepper-img-box');

// console.log(stepper);
// stepper.forEach((step) => {
//   const stepperSingle = step.querySelectorAll('.stepper-single');
//   const stepperImage = step.querySelectorAll('.stepper-img-box');

//   stepperSingle.forEach((step) => {
//     step.classList.add('opacity-50');
//   });

//   stepperImage.forEach((image) => {
//     const dataHash = image.getAttribute('data-hash');

//     console.log(image.classList);

//     if (image.classList.contains('swiper-slide-active')) {
//       stepperSingle.forEach((step) => {
//         const dataImage = step.getAttribute('data-image');

//         console.log(dataHash, dataImage);

//         if (dataImage === dataHash) {
//           step.classList.remove('opacity-50');
//         }
//       });
//     }
//   });
// });

/**
1. create js function to handle active state of the slide
*/

/**
Swiper for Stepper
*/

/**
Tabs
*/
const tabBlock = document.querySelectorAll('.tabs');

tabBlock.forEach(function (tab) {
  const singleTab = tab.querySelectorAll('.tab');
  const tabTitles = tab.querySelectorAll('.btnTab');
  const tabBody = tab.querySelectorAll('.tab-body');

  /**
  default Tab state
  */
  tabBody.forEach(function (body) {
    body.classList.add('invisible');
  });
  tabBody[0].classList.remove('invisible');

  /**
  Tab Buttons
  */
  tabTitles.forEach(function (el, index) {
    if (index == 0) {
      el.classList.add('activeTab');
    }

    /**
    Each Button
    */
    el.addEventListener('click', function () {
      tabTitles.forEach(function (btn) {
        btn.classList.remove('activeTab');
      });
      el.classList.add('activeTab');

      /**
      Full Tab
      */
      singleTab.forEach(function (tab) {
        tab.classList.add('pe-auto');
      });
      singleTab[index].classList.replace('pe-auto', 'pe-none');

      /**
      Tab Content
      */
      tabBody.forEach(function (body) {
        body.classList.add('invisible');
      });

      tabBody[index].classList.remove('invisible');
    });
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
