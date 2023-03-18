<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import { reactive } from 'vue';
import Card from '@/components/UI/Card.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    ip_addresses: '',
    status: 1
})

const createApi = () => {
    console.log('Create API', form)
    form.post(route('settings.api.store'))
}

</script>

<template>
    <MainLayout>
        <div class="page-heading">
            <h2 class="page-title">New API</h2>
        </div>

        <div class="mt-6">
            <form @submit.prevent="createApi">
                <Card>
                    <div class="form-group">
                        <label class="form-label">API Name</label>
                        <input type="text" class="form-control" placeholder="Enter API name..." v-model="form.name">
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">IP addresses allowed (separated by commas)</label>
                        <input type="text" class="form-control" placeholder="Enter allowed IP addresses..." v-model="form.ip_addresses">
                        <p class="help-text text-sm text-gray-400">Leave empty to accept any IP or like this: 127.0.0.1, 127.0.0.*, 201.127.*.*</p>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" v-model.number="form.status">
                            <option :value="1">Enable</option>
                            <option :value="0">Disable</option>
                        </select>
                    </div>
    
                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Create API</button>
                        <Link :href="route('settings.api')" class="btn-md btn-secondary ml-2">Go back</Link>
                    </template>
                </Card>
            </form>
        </div>
    </MainLayout>
</template>