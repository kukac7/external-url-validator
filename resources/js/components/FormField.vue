<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <input
                :id="field.name"
                type="url"
                class="w-full form-control form-input form-input-bordered"
                :class="errorClasses"
                :placeholder="field.name"
                v-model.lazy="value"
            />
            <p v-if="Object.keys(status).length && status.success" class="my-2 text-success">Valid url.</p>
            <p v-if="Object.keys(status).length && !status.success" class="my-2 text-danger">Not valid url.</p>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    data() {
        return {
            status: {}
        }
    },

    watch: {
        value: function(val) {
            this.status = {};

            const isValidUrl = (string) => {
                try {
                    new URL(string);
                    return true;
                } catch (_) {
                    return false;
                }
            }

            if (isValidUrl(val)) {
                Nova.request().post(this.apiUrl, { url: val })
                .then((res) => {
                    console.log(res);
                    this.status = res.data.data;
                })
                .catch((err) => {
                    console.log(err);
                    this.status.success = false;
                })
            }
        }
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        }
    },

    computed: {
        apiUrl: function() {
            return this.field.apiUrl || '/nova-vendor/external-url-validator/validate';
        }
    }
}
</script>
