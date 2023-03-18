<script setup>
import MainLayout from '@/layouts/MainLayout.vue'
import Card from '@/components/UI/Card.vue';
import Count from '@/components/UI/Count.vue';
import TableCard from '@/components/UI/TableCard.vue';
import { reactive } from 'vue';
import dayjs from 'dayjs';

defineProps({
  activeTicketsCount: Number,
  closedTicketsCount: Number,
  unassignedTicketsCount: Number,
  recentlyAdded: Array,
  recentlyClosed: Array
})

const recentlyAddedTickets = reactive([
  { date: new Date(), subject: 'Some subject text', lastReply: new Date(), department: 'General', assignedTo: 'Admin', status: 'OPEN' },
  { date: new Date(), subject: 'Some subject text', lastReply: new Date(), department: 'General', assignedTo: 'Admin', status: 'OPEN' },
  { date: new Date(), subject: 'Some subject text', lastReply: new Date(), department: 'General', assignedTo: 'Admin', status: 'OPEN' },
  { date: new Date(), subject: 'Some subject text', lastReply: new Date(), department: 'General', assignedTo: 'Admin', status: 'OPEN' },
  { date: new Date(), subject: 'Some subject text', lastReply: new Date(), department: 'General', assignedTo: 'Admin', status: 'OPEN' }
])

const recentlyClosedTickets = reactive([])

const tableColumns = reactive([
  { field: 'date', text: 'Date', type: 'date' },
  { field: 'subject', text: 'Subject' },
  { field: 'lastReply', text: 'Last Reply', type: 'date' },
  { field: 'department', text: 'Department' },
  { field: 'assignedTo', text: 'Assigned To' },
  // { field: 'status', text: 'Status' },
])

const formatDate = (dateString) => {
    const date = dayjs(dateString);
    // Then specify how you want your dates to be formatted
    return date.format('DD/MM/YYYY');
} 
</script>

<template>
  <MainLayout>
    <div class="page-heading">
      <h2 class="page-title">Dashboard</h2>  
    </div>

    <div class="mt-6 grid grid-cols-3 gap-4">
      <Card>
        <template #heading>
          <h3 class="card-title">Active Tickets</h3>
        </template>
        <Count tag="tickets">{{ activeTicketsCount }}</Count>
      </Card>
      <Card>
        <template #heading>
          <h3 class="card-title">Closed Tickets</h3>
        </template>
        <Count tag="tickets">{{ closedTicketsCount }}</Count>
      </Card>
      <Card>
        <template #heading>
          <h3 class="card-title">UnAssigned Tickets</h3>
        </template>
        <Count tag="tickets">{{ unassignedTicketsCount }}</Count>
      </Card>
    </div>

    <div class="mt-6 grid grid-cols-2 gap-4">
      <!-- TABLE -->
      <!-- <TableCard title="Recently Added Tickets" :columns="tableColumns" :data="recentlyAddedTickets" /> -->
      <div class="table-card">
          <div class="table-card-heading">
              <h2 class="table-card-title">Recently Added Tickets</h2>
          </div>
          <table class="table-card-table">
              <thead>
                  <tr>
                      <th scope="col" class="px-6 py-2">Date</th>
                      <th scope="col" class="px-6 py-2">Subject</th>
                      <th scope="col" class="px-6 py-2">Department</th>
                      <th scope="col" class="px-6 py-2">Status</th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-if="!recentlyAdded.length">
                      <td colspan="4"><div class="w-full text-center text-xl py-4 text-orange-700">NO DATA</div></td>
                  </tr>
                  <tr v-for="ticket in recentlyAdded" :key="ticket.id">
                      <td scope="row" class="px-6 py-4">{{ formatDate(ticket.created_at) }}</td>
                      <td scope="row" class="px-6 py-4">{{ ticket.subject }}</td>
                      <td scope="row" class="px-6 py-4">{{ ticket.department }}</td>
                      <td scope="row" class="px-6 py-4">{{ ticket.status }}</td>
                  </tr>
              </tbody>
          </table>
      </div>
      <!-- END OF TABLE -->

      <!-- TABLE -->
      <!-- <TableCard title="Recently Completed Tickets" :columns="tableColumns" :data="recentlyClosedTickets" /> -->
      <div class="table-card">
          <div class="table-card-heading">
              <h2 class="table-card-title">Recently Closed Tickets</h2>
          </div>
          <table class="table-card-table">
              <thead>
                  <tr>
                      <th scope="col" class="px-6 py-2">Date</th>
                      <th scope="col" class="px-6 py-2">Subject</th>
                      <th scope="col" class="px-6 py-2">Department</th>
                      <th scope="col" class="px-6 py-2">Status</th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-if="!recentlyClosed.length">
                      <td colspan="4"><div class="w-full text-center text-xl py-4 text-orange-700">NO DATA</div></td>
                  </tr>
                  <tr v-for="ticket in recentlyClosed" :key="ticket.id">
                      <td scope="row" class="px-6 py-4">{{ formatDate(ticket.created_at) }}</td>
                      <td scope="row" class="px-6 py-4">{{ ticket.subject }}</td>
                      <td scope="row" class="px-6 py-4">{{ ticket.department }}</td>
                      <td scope="row" class="px-6 py-4">{{ ticket.status }}</td>
                  </tr>
              </tbody>
          </table>
      </div>
      <!-- END OF TABLE -->
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