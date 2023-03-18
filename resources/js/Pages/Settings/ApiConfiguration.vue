<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import TableCard from '@/components/UI/TableCard.vue';
import { PlusIcon } from '@heroicons/vue/24/solid';
import { reactive } from 'vue';
import { Link } from '@inertiajs/vue3';
import { TrashIcon } from '@heroicons/vue/24/outline';

defineProps({
    tokens: Array
})

const tableColumns = reactive([
  { field: 'name', text: 'API Name' },
  { field: 'token', text: 'API Token' },
  { field: 'status', text: 'Status' }
])

const departments = reactive([
  { name: 'General', token: 'Public', status: true }
])
</script>

<template>
    <MainLayout>
        <div class="page-heading">
            <h2 class="page-title">API Configuration</h2>
            <Link :href="route('settings.api.create')" class="btn btn-primary flex items-center">
                <PlusIcon class="w-4 h-4 mr-2" />
                Add New API
            </Link>
        </div>

        <div class="w-full mt-4">
            <!-- <TableCard title="Departments" :columns="tableColumns" :data="departments" /> -->
            <div class="table-card">
                <!-- <div class="table-card-heading" v-if="title">
                    <h2 class="table-card-title">{{ title }}</h2>
                </div> -->
                <table class="table-card-table">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-2">Name</th>
                            <th scope="col" class="px-6 py-2">Token</th>
                            <th scope="col" class="px-6 py-2">Status</th>
                            <th scope="col" class="px-6 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="!tokens.length">
                            <td colspan="3"><div class="w-full text-center text-xl py-4 text-orange-700">NO DATA</div></td>
                        </tr>
                        <tr v-for="token in tokens" :key="token.id">
                            <td scope="row" class="px-6 py-4">{{ token.name }}</td>
                            <td scope="row" class="px-6 py-4">{{ token.token }}</td>
                            <td scope="row" class="px-6 py-4">Active</td>
                            <td scope="row" class="px-6 py-4 w-20">
                                <div class="flex gap-2">
                                    <Link :href="route('settings.api.destroy', { id: token.id })" class="" as="button" method="DELETE">
                                        <TrashIcon class="w-5 text-red-600 hover:text-red-500" />
                                    </Link>
                                </div>
                            </td>
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