<script setup>
import dayjs from 'dayjs';

defineProps({
    title: String,
    columns: { type: Array, default: [] },
    data: { type: Array, default: [] }
})

const formatDate = (dateString) => {
    const date = dayjs(dateString);
    // Then specify how you want your dates to be formatted
    return date.format('DD/MM/YYYY');
} 
</script>

<template>
    <div class="table-card">
        <div class="table-card-heading" v-if="title">
            <h2 class="table-card-title">{{ title }}</h2>
        </div>
        <table class="table-card-table">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-2" v-for="column, index in columns" :key="index">{{ column.text }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="!data.length">
                    <td :colspan="columns.length"><div class="w-full text-center text-xl py-4 text-orange-700">NO DATA</div></td>
                </tr>
                <tr v-for="item, index in data" :key="index">
                    <td scope="row" class="px-6 py-4" v-for="cell, i in columns" :key="i">{{ (cell.type === 'date') ? formatDate(item[cell.field]) : item[cell.field] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
.table-card {
    @apply border border-gray-100 rounded-md shadow-md overflow-hidden
}

.table-card-heading {
    @apply p-4 bg-slate-50
}

.table-card-title {
    @apply  text-xl
}

.table-card-table {
    @apply table table-auto w-full text-left
}

.table-card-table > thead {
    @apply table-header-group bg-slate-200
}
</style>