<template>
    <a :href="field.value" target="_blank" class="no-underline font-bold dim text-primary">{{ field.value }}</a>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
