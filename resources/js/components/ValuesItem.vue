<template>
    <div v-if="isNotObject" class="flex items-center key-value-item">
        <div class="flex flex-grow border-b border-gray-200 dark:border-gray-700 key-value-fields"
        >
                <textarea
                    :dusk="`key-value-key-${index}`"
                    v-model="item.key"
                    @focus="handleKeyFieldFocus"
                    ref="keyField"
                    rows="1"
                    type="text"
                    class="font-mono text-xs block w-full px-3 py-3 text-90 dark:text-gray-400"
                    :readonly="!isEditable || readOnlyKeys"
                    style="background-clip: border-box"
                    :class="{
                        'bg-white dark:bg-gray-800 focus:outline-none': !isEditable,
                        'hover:bg-20 focus:bg-white dark:bg-gray-900 dark:focus:bg-gray-900 focus:outline-none focus:ring focus:ring-inset':
                        isEditable,
                    }"
                />
        </div>

        <div
            v-if="isEditable && canDeleteRow"
            class="flex items-center h-11 w-11 absolute -right-[50px]"
        >
            <Button
                @click="$emit('remove-row', item.id)"
                :dusk="`remove-key-value-${index}`"
                variant="link"
                size="small"
                state="danger"
                type="button"
                tabindex="0"
                :title="__('Delete')"
                icon="minus-circle"
            />
        </div>
    </div>
</template>

<script>
import autosize from 'autosize'
import { Button } from 'laravel-nova-ui'

export default {
    components: {
        Button,
    },

    emits: ['remove-row'],

    props: {
        index: Number,
        item: Object,
        disabled: {
            type: Boolean,
            default: false,
        },
        readOnly: {
            type: Boolean,
            default: false,
        },
        readOnlyKeys: {
            type: Boolean,
            default: false,
        },
        canDeleteRow: {
            type: Boolean,
            default: true,
        },
    },

    mounted() {
        autosize(this.$refs.keyField)
    },

    methods: {
        handleKeyFieldFocus() {
            this.$refs.keyField.select()
        },
    },

    computed: {
        isNotObject() {
            return !(this.item.key instanceof Object)
        },
        isEditable() {
            return !this.readOnly && !this.disabled
        },
    },
}
</script>
