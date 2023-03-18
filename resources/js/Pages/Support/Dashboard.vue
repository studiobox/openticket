<script setup>
import SupportLayout from '@/layouts/SupportLayout.vue';
import { Link } from '@inertiajs/vue3';
import dayjs from 'dayjs';

defineProps({
    tickets: Array
})

const formatDate = (dateString) => {
    const date = dayjs(dateString);
    // Then specify how you want your dates to be formatted
    return date.format('DD/MM/YYYY');
}
</script>

<template>
    <SupportLayout>
        <h2 class="text-4xl font-light mb-6">My Support Tickets</h2>
        <small class="text-lg font-light">Listed below are the tickets you've submitted in the past. Click on a ticket's subject to view the ticket and its history.</small>

        <div class="bg-white text-black rounded-lg p-6 mt-6 shadow-xl">
            <table class="table-card-table">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-2">Ticket</th>
                        <th scope="col" class="px-6 py-2">Last Updated</th>
                        <th scope="col" class="px-6 py-2">Department</th>
                        <th scope="col" class="px-6 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr v-if="!tickets.length">
                        <td colspan="5"><div class="w-full text-center text-xl py-4 text-orange-700">NO DATA</div></td>
                    </tr> -->
                    <tr v-for="ticket in tickets" :key="ticket.id">
                        <td scope="row" class="px-6 py-4"><Link :href="route('support.ticket.show', { ticket: ticket.id })" class="hover:text-indigo-500">[#{{ ticket.id }}] {{ ticket.subject }}</Link></td>
                        <td scope="row" class="px-6 py-4">{{ formatDate(ticket.lastUpdated) }}</td>
                        <td scope="row" class="px-6 py-4">{{ ticket.department?.name }}</td>
                        <td scope="row" class="px-6 py-4">{{ ticket.status }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </SupportLayout>
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