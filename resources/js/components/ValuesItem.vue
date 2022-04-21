<template>
    <div v-if="isNotObject" class="flex items-center key-value-item">
        <div class="flex flex-grow border-b border-gray-300 dark:border-gray-700 key-value-fields"
             :class="{ 'bg-gray-50': readOnlyKeys || !isEditable }"
        >
                <textarea
                    :dusk="`key-value-key-${index}`"
                    v-model="item.key"
                    @focus="handleKeyFieldFocus"
                    ref="keyField"
                    type="text"
                    class="font-mono text-sm resize-none block min-h-input w-full form-control form-input form-input-row py-4 text-90 dark:text-gray-400 bg-clip-border"
                    :disabled="!isEditable || readOnlyKeys"
                    style="background-clip: border-box"
                    :class="{
                    'bg-white dark:bg-gray-800': !isEditable || readOnlyKeys,
                    'hover:bg-20 focus:bg-white dark:bg-gray-900 dark:focus:bg-gray-900':
                      isEditable && !readOnlyKeys,
                  }"
                />
        </div>

        <div
            v-if="isEditable && canDeleteRow"
            class="flex justify-center h-11 w-11 absolute"
            style="right: -50px"
        >
            <BasicButton
                @click="$emit('remove-row', item.id)"
                :dusk="`remove-key-value-${index}`"
                type="button"
                tabindex="0"
                class="flex items-center appearance-none cursor-pointer text-red-500 hover:text-red-600 active:outline-none active:ring focus:outline-none focus:ring"
                title="Delete"
            >
                <Icon type="minus-circle"/>
            </BasicButton>
        </div>
    </div>
</template>

<script>
import autosize from 'autosize'

export default {
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
