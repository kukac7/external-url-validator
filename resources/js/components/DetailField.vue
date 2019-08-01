<template>
    <panel-item :field="field">
        <template slot="value">
            <a :href="field.value" target="_blank" class="no-underline font-bold dim text-primary">{{ field.value }}</a>
        </template>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
