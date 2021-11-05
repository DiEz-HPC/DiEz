import '@symfony/ux-chartjs/src/controller';
const graphs = [...document.getElementsByTagName('canvas')];

graphs.map( async (graph) => {
    const data = await JSON.parse(graph.dataset.view);
    const myChart = new Chart(graph, data);
})

