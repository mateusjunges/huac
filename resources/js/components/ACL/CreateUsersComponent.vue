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
                        <input type="password"
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
                               placeholder="Confirme sua senha!"
                               class="form-control"
                               id="password-confirmation">
                        <small class="text-danger">{{ this.passwordConfirmationErrors }}</small>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-success"
                                :disabled="!validated"
                                @click.prevent="submit()"
                                :type="type">
                            {{ button }}
                        </button>
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
            button: String,
            route: String,
            type: String
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

                validated: true,
                username_class : '',
                email_class: '',
            }
        },
        methods: {
            clear() {
              this.name = "";
              this.email = "";
              this.password = "";
              this.username = "";
              this.passwordConfirmation = "";
            },
            submit() {
                axios.post('/api/users', {
                    name: this.name,
                    username: this.username,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.passwordConfirmation,
                }).then((response) => {
                    console.log(response.data);

                    if (response.data.code === 200)
                        this.clear();
                    swal({
                        icon: response.data.icon,
                        title: response.data.title,
                        text: response.data.text,
                        timer: response.data.timer
                    })
                }).catch((error) => {
                    let errors = error.response.data.errors;
                    if (errors.name)
                        this.nameErrors = errors.name[0];
                    else this.nameErrors = "";
                    if (errors.username)
                        this.usernameErrors = errors.username[0];
                    else this.usernameErrors = "";
                    if (errors.password)
                        this.passwordErrors = errors.password[0];
                    else this.passwordErrors = "";
                    if (errors.email)
                        this.emailErrors = errors.email[0];
                    else this.emailErrors = "";
                });
            },

            validateFullName(name){
                const regex = /^[a-zA-Z]+ [a-zA-Z]+.[a-zA-Z\s]*$/;
                return regex.test(name);
            },
            validateEmail(email) {
                var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return regex.test(String(email).toLowerCase());
            },

            isUniqueEmail(email) {
                return axios.get('/api/validation/email', {
                    params: {
                        email: email
                    }
                }).then((response) => {
                        return response.data <= 0;
                    });
            },

            isUniqueUsername(username) {
                return axios.get('/api/validation/username', {
                    params: {
                        username: username,
                    }
                }).then((response) => {
                    return response.data <= 0;
                });
            }
        },
        computed: {
            nameClass() {
                if (!this.validateFullName(this.name)) {
                    this.nameErrors = "Informe o nome completo!";
                    this.validated = false;
                    return 'validation-error';
                } else {
                    this.validated = true;
                    this.nameErrors = "";
                    return 'validated';
                }
            },

            usernameClass() {
                if (this.username.length < 3) {
                    this.validated = false;
                    this.usernameErrors = "Informe pelo menos 3 caracters!";
                    return 'validation-error';
                } else {
                    this.isUniqueUsername(this.username).then((response) => {
                        if (response === false) {
                            this.validated = false;
                            this.usernameErrors = "Este username já está em uso!";
                            this.username_class = 'validation-error';
                        } else {
                            this.usernameErrors = "";
                            this.validated = true;
                            this.username_class = 'validated';
                        }
                    });
                    console.log(this.username_class);
                    return this.username_class;
                }
            },

            passwordClass() {
                if (this.password.length < 6) {
                    this.validated = false;
                    this.passwordErrors = "Informe pelo menos 6 caracteres!";
                    return 'validation-error';
                } else {
                    if (this.password !== this.passwordConfirmation) {
                        this.validated = false;
                        this.passwordErrors = "As senhas não coincidem!";
                        return 'validation-error';
                    } else {
                        this.validated = true;
                        this.passwordErrors = "";
                        return 'validated';
                    }
                }
            },

            passwordConfirmationClass() {
                if (this.password !== this.passwordConfirmation) {
                    this.validated = false;
                    this.passwordConfirmationErrors = "As senhas não coincidem!";
                    return 'validation-error';
                } else {
                    this.validated = true;
                    this.passwordConfirmationErrors = "";
                    return 'validated';
                }
            },

            emailClass() {
                let email = this.email;
                if (!this.validateEmail(this.email)) {
                    this.validated = false;
                    this.emailErrors = "Informe um email válido! (exemplo: email@email.com)";
                    return 'validation-error';
                } else {
                    this.isUniqueEmail(email).then((response) => {
                        if (response === false) {
                            this.validated = false;
                            this.emailErrors = "Este email já está em uso!";
                            this.email_class = 'validation-error';
                        } else {
                            this.emailErrors = "";
                            this.validated = true;
                            this.email_class = 'validated';
                        }
                    });
                    console.log(this.email_class);
                    return this.email_class;
                }
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
