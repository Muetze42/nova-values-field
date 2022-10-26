<template>
    <div
        class="bg-gray-100 dark:bg-gray-800 rounded-t-lg flex border-b border-gray-300 dark:border-gray-700"
    >
        <div
            class="bg-clip w-48 uppercase font-bold text-xxs text-gray-500 tracking-wide px-3 py-2"
        >
            {{ valueLabel }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        valueLabel: {
            type: String,
        },
    },
}
</script>
