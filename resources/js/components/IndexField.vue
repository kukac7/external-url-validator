<template>
    <a :href="field.value" v-if="field.value" target="_blank" class="no-underline font-bold dim text-primary whitespace-no-wrap text-left">{{ field.value }}</a>
    <span v-else class="whitespace-no-wrap text-left">-</span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
