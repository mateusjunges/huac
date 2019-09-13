<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <h1>Cirurgias</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <canvas id="surgeriesChart"></canvas>
            </div>
        </div>
    </div>
</template>

<script>
    import Chart from 'chart.js'

    export default {
        name: "SurgeriesReport",
        props: {
            finishedSurgeries: Number,
            scheduledSurgeries: Number,
            surgeriesWithComplications: Number,
        },
        data() {
            return {
                chart: {
                    finished: 0,
                    scheduled: 0,
                    withComplications: 0
                }
            }
        },

        methods: {

        },
        created() {
            this.chart.finished = this.finishedSurgeries;
            this.chart.scheduled = this.scheduledSurgeries;
            this.chart.withComplications = this.surgeriesWithComplications;
        },
        mounted() {
            console.log(this.chart.finished);
            const c = new Chart('surgeriesChart', {
                type: 'pie',
                data: {
                    labels: ['Cirurgias concluídas', 'Cirurgias agendadas', 'Intercorrências cirúrgicas'],
                    datasets: [
                        { // one line graph
                            label: 'Number of Moons',
                            //data: Cirurgias concluídas, cirurgias agendadas, intercorrencias
                            data: [this.chart.finished, this.chart.scheduled, this.chart.withComplications],
                            backgroundColor: [
                                'rgba(48, 145, 19, .5)', // Blue
                                'rgba(66, 135, 255, .5)',
                                'rgba(255, 17, 0, .5)'
                            ],
                            borderColor: [
                                '#36495d',
                                '#36495d',
                                '#36495d',
                                '#36495d',
                                '#36495d',
                                '#36495d',
                                '#36495d',
                                '#36495d',
                            ],
                            borderWidth: 3
                        },
                    ]
                },
                options: {
                    responsive: true,
                    lineTension: 1,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                padding: 25,
                            }
                        }]
                    }
                }
            });
        }
    }
</script>

<style scoped>

</style>
