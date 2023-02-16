import Chart from 'chart.js/auto';


const labels = [
    'Gennaio',
    'Febbraio',
    'Marzo',
    'Aprile',
    'Maggio',
    'Giugno',
    'Luglio',
    'Agosto',
    'Settembre',
    'Ottobre',
    'Novembre',
    'Dicembre',
];

  const data = {
      labels: labels,
      datasets: [{
          label: 'Fatturato Mensile',
          backgroundColor: 'rgb(22, 40, 88)',
          borderColor: 'rgb(240, 5, 32)',
          data: [0, 10, 5, 2, 20, 30, 45, 50, 67, 80, 14, 27],
      }]
  };

  const config = {
      type: 'line',
       data: data,
      options: {}
   };

// const config = {
//     type: 'bar',
//     data: {
//       datasets: [{
//         data: [{x: 'Sales', y: 20}, {x: 'Revenue', y: 10}]
//       }]
//     }
//   }

// const data = [{x: 'Jan', net: 100, cogs: 50, gm: 50}, {x: 'Feb', net: 120, cogs: 55, gm: 75}, {x: 'March', net: 120, cogs: 55, gm: 75}];
//   type: 'bar',
//   const config = {
//     data: {
//       labels: ['Jan', 'Feb'],
//       datasets: [{
//         label: 'Net sales',
//         data: data,
//         parsing: {
//           yAxisKey: 'net'
//         }
//       }, {
//         label: 'Cost of goods sold',
//         data: data,
//         parsing: {
//           yAxisKey: 'cogs'
//         }
//       }, {
//         label: 'Gross margin',
//         data: data,
//        parsing: {
//           yAxisKey: 'gm'
//         }
//       }]
//     },
//   };

new Chart(
    document.getElementById('myChart'),
    config
);
