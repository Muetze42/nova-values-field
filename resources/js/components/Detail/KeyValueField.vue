<template>
    <PanelItem :index="index" :field="field">
        <template #value>
            <FormKeyValueTable
                v-if="theData.length > 0"
                :edit-mode="false"
                class="overflow-hidden"
            >
                <ValuesHeader
                    :key-label="field.keyLabel"
                    :value-label="field.valueLabel"
                />

                <div class="bg-white dark:bg-gray-800 overflow-hidden key-value-items">
                    <ValuesItem
                        v-for="(item, index) in theData"
                        :index="index"
                        :item="item"
                        :disabled="true"
                        :key="item.key"
                    />
                </div>
            </FormKeyValueTable>
        </template>
    </PanelItem>
</template>

<script>
import map from 'lodash/map'
import ValuesHeader from "../ValuesHeader";
import ValuesItem from "../ValuesItem";

export default {
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],

    components: {
        ValuesHeader,
        ValuesItem,
    },

    data: () => ({theData: []}),

    created() {
        this.theData = map(this.field.value || {}, (key, value) => ({
            key,
            value,
        }))
    },
}
</script>
