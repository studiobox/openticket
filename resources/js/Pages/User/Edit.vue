<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import Card from '@/components/UI/Card.vue';
import { Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: Object
})

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    type: props.user.type,
    status: props.user.status,
    sendEmailNotification: true
})

const updateUser = () => {
    console.log('Edit User', form)
    form.put(route('user.update', { user: props.user.id }))
}

</script>

<template>
    <MainLayout>
        <div class="page-heading">
            <h2 class="page-title">Edit User</h2>
        </div>

        <div class="mt-6">
            <form @submit.prevent="updateUser">
                <Card>
                    <!-- <template #heading>
                        <h3 class="card-title">Create New User</h3>
                    </template> -->
    
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter full name..." v-model="form.name">
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control" placeholder="Enter email address..." v-model="form.email">
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
    
                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Update User</button>
                        <Link :href="route('user.index')" class="btn-md btn-secondary ml-2">Go back</Link>
                    </template>
                </Card>
            </form>
        </div>
    </MainLayout>
</template>