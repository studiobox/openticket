<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import Card from '@/components/UI/Card.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    private: 0
})

const createDepartment = () => {
    console.log('Create Department', form)
    form.post(route('department.store'))
}

</script>

<template>
    <MainLayout>
        <div class="page-heading">
            <h2 class="page-title">New Department</h2>
        </div>

        <div class="mt-6">
            <form @submit.prevent="createDepartment">
                <Card>
                    <template #heading>
                        <h3 class="card-title">Create New Ticket</h3>
                    </template>
    
                    <div class="form-group">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control" placeholder="Enter department name..." v-model="form.name">
                        <div v-if="form.errors.name" class="input-error">
                            {{ form.errors.name }}
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Type</label>
                        <select class="form-control" v-model.number="form.private">
                            <option :value="0">Public</option>
                            <option :value="1">Private</option>
                        </select>
                    </div>
    
                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Create Department</button>
                        <Link :href="route('department.index')" class="btn-md btn-secondary ml-2">Go back</Link>
                    </template>
                </Card>
            </form>
        </div>
    </MainLayout>
</template>