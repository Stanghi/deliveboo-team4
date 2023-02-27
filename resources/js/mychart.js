import Chart from "chart.js/auto";

if (
    typeof ordersByMonth !== "undefined" &&
    typeof salesByMonth !== "undefined" &&
    ordersByMonth !== undefined &&
    salesByMonth !== undefined
) {
    const dataOrders = {
        labels: ordersByMonth.months,
        datasets: [
            {
                label: "Ordini ricevuti mensilmente",
                backgroundColor: "rgb(22, 40, 88)",
                borderColor: "#5eba7d",
                data: ordersByMonth.total,
            },
        ],
    };

    const dataSales = {
        labels: salesByMonth.months,
        datasets: [
            {
                label: "Fatturato Mensile",
                backgroundColor: "rgb(22, 40, 88)",
                borderColor: "rgb(240, 5, 32)",
                data: salesByMonth.sales,
            },
        ],
    };

    const configOrders = {
        type: "bar",
        data: dataOrders,
        options: {},
    };

    const configSales = {
        type: "bar",
        data: dataSales,
        options: {},
    };

    new Chart(document.getElementById("chartOrders"), configOrders);
    new Chart(document.getElementById("chartSales"), configSales);
}
