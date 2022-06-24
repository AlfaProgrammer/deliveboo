import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

const myChart = document.getElementById('myChart').getContext('2d');

const graph = new Chart(myChart, {
    type: 'bar',
    data: {
        labels: [
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
            'Dicembre'
        ],
        datasets: [{
            label: 'Ordini',
            data: [30, 27, 31, 30, 31, 30, 31,74,12,45,66,32],
            backgroundColor: [
                'rgba(0, 204, 188, 0.6)',
                'rgba(127, 22, 224, 0.6)',
                'rgba(0, 224, 206, 0.6)',
                'rgba(224, 88, 22, 0.6)',
                'rgba(217, 224, 11, 0.6)',
                'rgba(68, 0, 99, 0.6)',
                'rgba(224, 106, 22, 0.6)',
                'rgba(153, 0, 224, 0.6)',
                'rgba(175, 224, 22, 0.6)',
                'rgba(11, 207, 224, 0.6)',
                'rgba(206, 223, 242, 0.6)',
                'rgba(12, 247, 124, 0.6)'
            ],
            borderColor: [
                'rgb(0, 204, 188)',
                'rgb(127, 22, 224)',
                'rgb(0, 224, 206)',
                'rgb(224, 88, 22)',
                'rgb(217, 224, 11)',
                'rgb(68, 0, 99)',
                'rgb(224, 106, 22)',
                'rgb(153, 0, 224)',
                'rgb(175, 224, 22)',
                'rgb(11, 207, 224)',
                'rgb(206, 223, 242)',
                'rgb(12, 247, 124)'
            ],
            borderWidth: 2,
            borderRadius: 4,
        }]
    },
    options: {}
});

console.log(myChart);