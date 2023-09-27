// import axios from 'axios';

// export const news = () => {
//   const loadNews = $('#load-more');

//   if (loadNews.length > 0) {
//     $('#load-more').on('click', function () {
//       const offset = $('article:not(.preview)').length;

//       $(this).addClass('active');

//       axios
//         .get(`/wp-json/v1/news/offset/${offset}`)
//         .then((response) => {
//           const news = response.data.data.news;
//           const count = response.data.data.count;
//           $('#append-newspp').append(news);

//           $(this).removeClass('active');

//           if (count == $(this).data('total')) {
//             $(this).addClass('d-none');
//           }
//         })
//         .catch((error) => {
//           setToastMessage('Error loading news, please try again.');
//           $(this).removeClass('active');
//         });
//     });
//   }
// };
