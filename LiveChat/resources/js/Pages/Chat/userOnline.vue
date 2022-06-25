<template>
    <div v-for="(user,index) in users">
        <span>{{ user.name }}</span>
    </div>
</template>

<script>
export default {
    name: "userOnline",
    props: ['users'],
}
</script>

<style scoped>

</style>
