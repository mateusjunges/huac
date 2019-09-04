<template>
    <div>
        <div class="alert" role="alert" :class="alert">
            {{ this.message }}
        </div>
    </div>
</template>

<script>
    export default {
        name: "Alert",
        props: {
            alert: String,
            message: String,
        }
    }
</script>

<style scoped>

</style>
