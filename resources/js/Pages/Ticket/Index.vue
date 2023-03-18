<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import { PencilSquareIcon } from '@heroicons/vue/24/solid';
import dayjs from 'dayjs';
import { Link } from '@inertiajs/vue3';

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
    <MainLayout>
        <div class="page-heading">
            <h2 class="page-title">Tickets</h2>
            <Link :href="route('ticket.create')" class="btn btn-primary flex items-center">
                <PencilSquareIcon class="w-4 h-4 mr-2" />
                Add New Ticket
            </Link>
            <!-- <button class="btn-primary flex items-center"><PencilSquareIcon class="w-4 h-4 mr-2" /> Add New Ticket</button> -->
        </div>

        <div class="flex mt-4 gap-2">
            <button class="btn btn-primary">Active</button>
            <button class="btn btn-outline-primary">Overdue</button>
            <button class="btn btn-outline-primary">Answered</button>
            <button class="btn btn-outline-primary">Closed</button>
        </div>

        <div class="w-full mt-4">
            <!-- <TableCard title="Recently Added Tickets" :columns="tableColumns" :data="recentlyAddedTickets" /> -->
            <div class="table-card">
                <!-- <div class="table-card-heading" v-if="title">
                    <h2 class="table-card-title">{{ title }}</h2>
                </div> -->
                <table class="table-card-table">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-2">Date</th>
                            <th scope="col" class="px-6 py-2">Subject</th>
                            <th scope="col" class="px-6 py-2">Last Reply</th>
                            <th scope="col" class="px-6 py-2">Department</th>
                            <th scope="col" class="px-6 py-2">Customer</th>
                            <th scope="col" class="px-6 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="!tickets.length">
                            <td colspan="5"><div class="w-full text-center text-xl py-4 text-orange-700">NO DATA</div></td>
                        </tr>
                        <tr v-for="ticket in tickets" :key="ticket.id">
                            <td scope="row" class="px-6 py-4">{{ formatDate(ticket.created_at) }}</td>
                            <td scope="row" class="px-6 py-4"><Link :href="route('ticket.show', { ticket: ticket.id })">{{ ticket.subject }}</Link></td>
                            <td scope="row" class="px-6 py-4">{{ formatDate(ticket.created_at) }}</td>
                            <td scope="row" class="px-6 py-4">{{ ticket.department?.name }}</td>
                            <td scope="row" class="px-6 py-4">{{ ticket.customer.name }}</td>
                            <td scope="row" class="px-6 py-4">{{ ticket.status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </MainLayout>
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