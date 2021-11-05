const graph = document.getElementById('1').getContext('2d');
const data = JSON.parse(graph.canvas.dataset.view);
const myChart = new Chart(graph, data);
