<template>
  <Line :data="chartData" :options="chartOptions" />
</template>

<script>
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend,
} from "chart.js";

import { Line } from "vue-chartjs";

ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
);


export default {
  name: "LineChart",
  components: {
    Line,
  },
  props: {
    questionAverages: Array
  },
  data() {
    return {
      chartData: {
        labels: [
          "Question 1",
          "Question 2",
          "Question 3",
          "Question 4",
          "Question 5",
          "Question 6",
          "Question 7",
          "Question 4",
          "Question 8",
          "Question 9",
          "Question 10",
        ],
        datasets: [
          {
            label: "Average Responses",
            backgroundColor: "rgb(255, 99, 132)",
            borderColor: "rgb(255, 99, 132)",
            data: this.questionAverages
          },
        ],
      },
      chartOptions: {
        responsive: true,
        maintainAspectRatio: true,
      },
    };
  },
};
</script>
