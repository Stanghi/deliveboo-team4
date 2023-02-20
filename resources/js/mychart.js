import Chart from "chart.js/auto";

if (
    typeof labels !== "undefined" &&
    typeof sales !== "undefined" &&
    labels !== undefined &&
    sales !== undefined
) {
    const data = {
        labels: labels,
        datasets: [
            {
                label: "Fatturato Mensile",
                backgroundColor: "rgb(22, 40, 88)",
                borderColor: "rgb(240, 5, 32)",
                data: sales,
            },
        ],
    };

    const config = {
        type: "line",
        data: data,
        options: {},
    };

    new Chart(document.getElementById("myChart"), config);
}
