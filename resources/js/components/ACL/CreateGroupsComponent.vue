<template>
    <div>
        <div class="box box-success">
            <div class="box-header">
                <div class="form-group">
                    <label for="name">Nome do grupo:</label>
                    <input type="text"
                           id="name"
                           :class="nameClass"
                           class="form-control">
                    <small class="text-danger">{{ error_group_name }}</small>
                </div>
                <div class="form-group">
                    <label for="group-permissions">Selecione as permissões:</label>
                    <select name=""
                            id="group-permissions"
                            class="form-control">
                        <option v-for="permission in permissions"
                                :value="permission.id">
                            {{ permission.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="box-body">

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateGroupsComponent",
        props: {
            group: Object,
            permissions: Object,
        },
        data() {
            return {
                group_name: '',
                error_group_name: '',
            }
        },
        computed: {
            nameClass() {
                return 'validated';
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
