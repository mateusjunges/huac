<template>
    <div class="border border-success">
        <div class="col-md-8 col-md-pull-2 col-md-push-2">
            <form action="">
                <div class="form-group">
                    <label for="reason">Selecione o motivo:</label>
                    <select name=""
                            v-model="reason"
                            class="form-control"
                            id="reason">
                        <option v-for="option in options" :value="option.id">{{ option.name }}</option>
                    </select>
                </div>
                <div class="form-group" v-if="reason === 2">
                    <label for="observation">O motivo "outro" requer que você especifique abaixo:</label>
                    <textarea name=""
                              v-model="observation"
                              id="observation"
                              class="form-control"
                              cols="30"
                              rows="5"></textarea>
                </div>
            </form>
            <router-link :to="{name:'events.start'}">
                <button class="btn btn-default">Cancelar</button>
            </router-link>
            <button class="btn btn-success pull-right"
                    @click.prevent="submit"
                    id="save"
                    :disabled="this.saving">
                Salvar
            </button>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    const HTTP_OK = 200;

    export default {
        name: "Intercurrence",
        data() {
            return {
                reason: null,
                observation: "",
                saving: false,
                options: [
                    {
                        id: 1,
                        name: 'Óbito',
                    },
                    {
                        id: 2,
                        name: 'Outro'
                    }
                ]
            }
        },
        methods: {
            submit() {
                this.saving = true;
                let data = {
                    reason: this.reason,
                    observation: this.observation,
                };

                let surgery = this.$route.params.surgery;

                axios.post(`/api/surgeries/manage/${surgery}/intercurrence`, data)
                    .then((response) => {
                        let _response = response.data.data;
                        swal({
                            icon: _response.swal.icon,
                            title: _response.swal.title,
                            text: _response.swal.text,
                            timer: _response.swal.timer
                        });

                        if (response.status === HTTP_OK) {
                           this.$root.$emit('has-intercurrence', true);
                           this.reason = null;
                           this.observation = null;
                        }
                    }).then(() => this.saving = false)
                    .then(() => {
                        this.$router.push({
                            name: 'events.start',
                            params: {surgery: this.$route.params.surgery}
                        });
                    }).catch(error => {
                        console.log(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>
