


    var count;
    function No_of_requests() {
    var count = [];
    $.ajax({
    url: "http://localhost/charitAble/Stat_bens/No_of_requests",
    method: 'GET',
    dataType: 'JSON',
    success: function (response) {
    count= response.title;
    console.log(response);


}
})
}

    const ctx = document.getElementById('myChart');
    const ctp = document.getElementById('myPie');
    const ctr = document.getElementById('myLine');


    // setup block

    const data={
    labels: [count, 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
    label: 'title',
    data: [12, 19, 3, 5, 2, 3, 5, 8, 10, 13, 2, 6],
    borderWidth: 1
}]
};
    //config block
    const config = {
    type: 'bar',
    data,
    options: {
    scales: {
    y: {
    beginAtZero: true
}
}
}
};
    //Render block
    const myChart = new Chart(
    document.getElementById('myChart'),
    config
    );



    new Chart(ctp, {

    type: 'pie',
    data: {
    labels: [count, 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
    label: 'No. of Donations',
    data: [12, 19, 3, 5, 2, 3, 5, 8, 10, 13, 2, 6],
    borderWidth: 1
}]
},
    options: {
    scales: {
    y: {
    beginAtZero: true
}
}
}
});

    new Chart(ctr, {
    type: 'line',
    data: {
    labels: [count, 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
    label: 'No. of Donations',
    data: [12, 19, 3, 5, 2, 3, 5, 8, 10, 13, 2, 6],
    borderWidth: 1
}]
},
    options: {
    scales: {
    y: {
    beginAtZero: true
}
}
}
});


    No_of_requests();
