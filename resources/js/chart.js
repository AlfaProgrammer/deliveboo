import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

const myChart = document.getElementById('myChart').getContext('2d');

const graph = new Chart(myChart, {
    type: 'bar',
    data: {
        labels: [
            'gennaio', 
            'febbraio', 
            'marzo', 
            'aprile',
            'maggio',
            'giugno',
            'luglio',
        ],
        datasets: [{
            labels: 'day',
            data: [30, 27, 31, 30, 31, 30, 31],
        }]
    },
    options: {}
});

console.log(myChart);