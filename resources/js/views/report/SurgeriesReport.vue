<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <h1>Cirurgias</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-pull-2 col-md-push-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="report-starts-at">Início em:</label>
                            <input type="date"
                                   v-model="filter.starting_at"
                                   v-on:blur="changedStartingAt"
                                   id="report-starts-at"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="report-ends-at">Término em:</label>
                            <input type="date"
                                   v-model="filter.ending_at"
                                   id="report-ends-at"
                                   v-on:blur="changedEndingAt"
                                   class="form-control">
                        </div>
                    </div>
                </div>
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
    import axios from 'axios'

    const HTTP_OK = 200;
    let c = null;

    export default {
        name: "SurgeriesReport",
        props: {
            finishedSurgeries: Number,
            scheduledSurgeries: Number,
            surgeriesWithComplications: Number,
            surgeriesToBeScheduled: Number
        },
        data() {
            return {
                chart: {
                    finished: 0,
                    scheduled: 0,
                    withComplications: 0,
                    toBeScheduled: 0
                },
                filter: {
                    starting_at: '',
                    ending_at: ''
                }
            }
        },

        methods: {
            changedStartingAt() {
                axios.get(`/api/reports/`, {
                    starting_at: this.filter.starting_at,
                    ending_at: this.filter.ending_at,
                })
                    .then(response => {
                        if (response.status === HTTP_OK) {
                            this.chart.finished = response.data.chart.finished;
                            this.chart.scheduled = response.data.chart.scheduled;
                            this.chart.toBeScheduled = response.data.chart.to_be_scheduled;
                            this.chart.withComplications = response.data.chart.with_complications;
                        }
                    });
                c.update();
            },

            changedEndingAt() {
                console.log('ok');
            }
        },
        computed: {

        },
        created() {
            this.chart.finished = this.finishedSurgeries;
            this.chart.scheduled = this.scheduledSurgeries;
            this.chart.withComplications = this.surgeriesWithComplications;
            this.chart.toBeScheduled = this.surgeriesToBeScheduled;
        },
        mounted() {
            c = new Chart('surgeriesChart', {
                type: 'pie',
                data: {
                    labels: ['Cirurgias concluídas', 'Cirurgias agendadas', 'Intercorrências cirúrgicas', 'Aguardando agendamento'],
                    datasets: [
                        { // one line graph
                            label: 'Surgeries',
                            //data: Cirurgias concluídas, cirurgias agendadas, intercorrencias, a ser agendado
                            data: [this.chart.finished, this.chart.scheduled, this.chart.withComplications, this.chart.toBeScheduled],
                            backgroundColor: [
                                'rgba(48, 145, 19, .5)', //Green
                                'rgba(66, 135, 255, .5)', //Blue
                                'rgba(255, 17, 0, .5)', //Red
                                'rgba(255, 222, 56, .5)', //Yellow
                            ],
                            borderColor: [
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
