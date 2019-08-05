<template>
    <div class="">
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text"
                               name="name"
                               v-model="name"
                               :class="nameClass"
                               placeholder="Informe o nome do usuário"
                               class="form-control"
                               id="name">
                        <small class="text-danger">{{ this.nameErrors }}</small>
                    </div>
                    <div class="form-group">
                        <label for="username">Nome de usuário:</label>
                        <input type="text"
                               name="username"
                               id="username"
                               placeholder="Informe o nome de usuário"
                               :class="usernameClass"
                               v-model="username"
                               class="form-control">
                        <small class="text-danger">{{ this.usernameErrors }}</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email"
                               name="email"
                               v-model="email"
                               :class="emailClass"
                               placeholder="Informe o email do usuário:"
                               class="form-control"
                               id="email">
                        <small class="text-danger">{{ this.emailErrors }}</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="text"
                               class="form-control"
                               :class="passwordClass"
                               placeholder="Escolha uma senha:"
                               v-model="password"
                               id="password">
                        <small class="text-danger">{{ this.passwordErrors }}</small>
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">Confirme sua senha:</label>
                        <input type="password"
                               v-model="passwordConfirmation"
                               :class="passwordConfirmationClass"
                               name=" password_confirmation"
                               class="form-control"
                               id="password-confirmation">
                        <small class="text-danger">{{ this.passwordConfirmationErrors }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateUsersComponent",
        props: {

        },
        data() {
            return {
                name: '',
                nameErrors: '',
                username: '',
                usernameErrors: '',
                email: '',
                emailErrors: '',
                password: '',
                passwordErrors: '',
                passwordConfirmation: '',
                passwordConfirmationErrors: '',
            }
        },
        methods: {

        },
        computed: {
            nameClass() {
                return 'validated';
            },

            usernameClass() {

            },

            passwordClass() {

            },

            passwordConfirmationClass() {

            },

            emailClass() {

            }
        }
    }
</script>

<style scoped lang="scss">
    $valid: #00a65a;
    $invalid: #ff0000;

    .validation-error {
        border: solid 1px $invalid;
    }
    .validated {
        border: solid 1px $valid;
    }
</style>
