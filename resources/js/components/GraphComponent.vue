<!--<template>-->
<!--    <div class="small">-->
<!--        <line-chart :chart-data="datacollection"></line-chart>-->
<!--        <button @click="fillData()">Randomize</button>-->
<!--    </div>-->
<!--</template>-->

<template>
    <CChartLine
        style="height:300px"
        :datasets="datasets"
        :labels="labels"
        :options="{ maintainAspectRatio: false }"
    />
</template>

<script>
    // import { Line as LineChart }  from "vue-chartjs";

    export default {
        name: "GraphComponent",
        data: () => ({
            datasets: [
                {
                    data: [],
                    backgroundColor: '#E55353',
                    label: 'value',
                }
            ],
            labels: [],
        }),
        mounted() {
            this.getData();
        },
        methods: {
            getData: function () {
                fetch('/get_graph/')
                    .then((response) => {
                        if (response.ok) {
                            return response.json();
                        }

                        throw new Error('Network response was not ok');
                    })
                    .then((json) => {
                        if (json) {
                            this.datasets[0].data = [];
                            json.forEach(value => {
                                this.datasets[0].data.push(value.value);
                                this.labels.push(value.dt);
                            });
                        }
                    })
                    .catch((error) => {

                        console.log(error);
                    })

            },
        }
    }
</script>

<style scoped>
    .small {
        max-width: 600px;
        margin: 150px auto;
    }
</style>
