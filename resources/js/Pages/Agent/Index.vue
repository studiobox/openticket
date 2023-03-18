<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import { PlusIcon } from '@heroicons/vue/24/solid';
import { Link } from '@inertiajs/vue3';
import { PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline';

defineProps({
    agents: Array
})

</script>

<template>
    <MainLayout>
        <div class="page-heading">
            <h2 class="page-title">Agents</h2>
            <Link :href="route('agent.create')" class="btn btn-primary flex items-center">
                <PlusIcon class="w-4 h-4 mr-2" />
                Add New Agent
            </Link>
        </div>

        <div class="w-full mt-4">
            <!-- <TableCard title="Users" :columns="tableColumns" :data="departments" /> -->
            <div class="table-card">
                <!-- <div class="table-card-heading" v-if="title">
                    <h2 class="table-card-title">{{ title }}</h2>
                </div> -->
                <table class="table-card-table">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-2">Full Name</th>
                            <th scope="col" class="px-6 py-2">Username</th>
                            <th scope="col" class="px-6 py-2">Email Address</th>
                            <th scope="col" class="px-6 py-2">Department</th>
                            <th scope="col" class="px-6 py-2">Type</th>
                            <th scope="col" class="px-6 py-2">Status</th>
                            <th scope="col" class="px-6 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="!agents.length">
                            <td colspan="6"><div class="w-full text-center text-xl py-4 text-orange-700">NO DATA</div></td>
                        </tr>
                        <tr v-for="agent, index in agents" :key="index">
                            <td scope="row" class="px-6 py-4">{{ agent.name }}</td>
                            <td scope="row" class="px-6 py-4">{{ agent.username ?? '-' }}</td>
                            <td scope="row" class="px-6 py-4">{{ agent.email }}</td>
                            <td scope="row" class="px-6 py-4">{{ agent.department.name }}</td>
                            <td scope="row" class="px-6 py-4">{{ agent.is_admin ? 'Admin' : 'Staff' }}</td>
                            <td scope="row" class="px-6 py-4">{{ agent.active ? 'Active' : 'InActive' }}</td>
                            <td scope="row" class="px-6 py-4 w-20">
                                <div class="flex gap-2">
                                    <Link :href="route('agent.edit', { agent: agent.id })" class="" as="button">
                                        <PencilSquareIcon class="w-5 text-green-600 hover:text-green-500" />
                                    </Link>
                                    <Link :href="route('agent.destroy', { agent: agent.id })" class="" as="button" method="DELETE">
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