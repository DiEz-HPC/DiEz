const graphs = [...document.getElementsByTagName('canvas')];

graphs.map( async (graph) => {
    const data = await JSON.parse(graph.dataset.view);
    console.log(data)
    const myChart = new Chart(graph, data);
})

