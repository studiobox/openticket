<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import Card from '@/components/UI/Card.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    type: 'Guest',
    status: 1,
    sendEmailNotification: true
})

const createUser = () => {
    console.log('Create User', form)
    form.post(route('user.store'))
}

</script>

<template>
    <MainLayout>
        <div class="page-heading">
            <h2 class="page-title">New User</h2>
        </div>

        <div class="mt-6">
            <form @submit.prevent="createUser">
                <Card>
                    <template #heading>
                        <h3 class="card-title">Create New User</h3>
                    </template>
    
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter full name..." v-model="form.name">
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control" placeholder="Enter email address..." v-model="form.email">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter email address..." v-model="form.password">
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Type</label>
                        <select class="form-control" v-model="form.type">
                            <option value="Guest">Guest</option>
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" v-model.number="form.status">
                            <option :value="1">Active</option>
                            <option :value="0">Locked</option>
                        </select>
                    </div>
                    
                    <!-- <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" value="" class="form-check-input" v-model="form.sendEmailNotification">
                            <label class="form-check-label">
                                Send account information to user email
                            </label>
                        </div>
                    </div> -->
    
                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Create Agent</button>
                        <Link :href="route('user.index')" class="btn-md btn-secondary ml-2">Go back</Link>
                    </template>
                </Card>
            </form>
        </div>
    </MainLayout>
</template>