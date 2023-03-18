<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import Card from '@/components/UI/Card.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineProps({
    departments: Array
})

const form = useForm({
    name: '',
    username: '',
    email: '',
    password: '',
    is_admin: 0,
    active: 1,
    department: 1
})

const createAgent = () => {
    console.log('Create Agent', form)
    form.post(route('agent.store'))
}

</script>

<template>
    <MainLayout>
        <div class="page-heading">
            <h2 class="page-title">New User</h2>
        </div>

        <div class="mt-6">
            <form @submit.prevent="createAgent">
                <Card>
                    <template #heading>
                        <h3 class="card-title">Create New User</h3>
                    </template>
    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter full name..." v-model="form.name">
                            <div v-if="form.errors.name" class="input-error">
                                {{ form.errors.name }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Enter username..." v-model="form.username">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="text" class="form-control" placeholder="Enter email address..." v-model="form.email">
                            <div v-if="form.errors.email" class="input-error">
                                {{ form.errors.email }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Enter password..." v-model="form.password">
                            <div v-if="form.errors.password" class="input-error">
                                {{ form.errors.password }}
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group">
                            <label class="form-label">Department</label>
                            <select class="form-control" v-model.number="form.department">
                                <option v-for="department in departments" :value="department.id">{{ department.name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <select class="form-control" v-model.number="form.is_admin">
                                <option :value="0">Agent</option>
                                <option :value="1">Administrator</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" v-model.number="form.active">
                                <option :value="1">Active</option>
                                <option :value="0">Locked</option>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="form-label">Assigned Departments</label>
                        <div class="form-check">
                            <input type="checkbox" value="" class="form-check-input" checked>
                            <label class="form-check-label">
                                General
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" value="" class="form-check-input">
                            <label class="form-check-label">
                                Support
                            </label>
                        </div>
                    </div> -->
    
                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Create Agent</button>
                        <Link :href="route('agent.index')" class="btn-md btn-secondary ml-2">Go back</Link>
                    </template>
                </Card>
            </form>
        </div>
    </MainLayout>
</template>