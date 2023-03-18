<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import Card from '@/components/UI/Card.vue';
import Editor from '@tinymce/tinymce-vue';
import { useForm } from '@inertiajs/vue3';

defineProps({
    departments: Array
})

const form = useForm({
    name: '',
    email: '',
    department: '',
    priority: '',
    status: '',
    subject: '',
    message: '',
    attachment: []
})

const createTicket = () => {
    console.log('Create Ticket', form)
    form.post(route('ticket.store'))
}

</script>

<template>
    <MainLayout>
        <div class="page-heading">
            <h2 class="page-title">New Ticket</h2>
        </div>

        <div class="mt-6">
            <form @submit.prevent="createTicket">
                <Card>
                    <!-- <template #heading>
                        <h3 class="card-title">Create New Ticket</h3>
                    </template> -->
    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter customer full name..." v-model="form.name">
                            <div v-if="form.errors.name" class="input-error">
                                {{ form.errors.name }}
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="text" class="form-control" placeholder="Enter customer email address..." v-model="form.email">
                            <div v-if="form.errors.email" class="input-error">
                                {{ form.errors.email }}
                            </div>
                        </div>
                    </div>
    
                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group">
                            <label class="form-label">Department</label>
                            <select class="form-control" v-model="form.department">
                                <option value="">Select Department</option>
                                <option v-for="department in departments" :value="department.id" :key="department.id">{{ department.name }}</option>
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label class="form-label">Priority</label>
                            <select class="form-control" v-model="form.priority">
                                <option value="">Select Priority</option>
                                <option value="LOW">Low</option>
                                <option value="MEDIUM">Medium</option>
                                <option value="HIGH">High</option>
                                <option value="URGENT">Urgent</option>
                                <option value="EMERGENCY">Emergency</option>
                                <option value="CRITICAL">Critical</option>
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" v-model="form.status">
                                <option value="">Select Status</option>
                                <option value="OPEN">Open</option>
                                <option value="INPROGRESS">In Progress</option>
                                <option value="CLOSED">Closed</option>
                            </select>
                            <div v-if="form.errors.status" class="input-error">
                                {{ form.errors.status }}
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Subject</label>
                        <input type="text" class="form-control" placeholder="Enter subject..." v-model="form.subject">
                        <div v-if="form.errors.subject" class="input-error">
                            {{ form.errors.subject }}
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label hidden">Message</label>
                        <editor
                            :init="{
                                height: 300,
                                menubar: false,
                                plugins: [
                                    'advlist autolink lists link image charmap print preview anchor',
                                    'searchreplace visualblocks code fullscreen',
                                    'insertdatetime media table paste code help wordcount'
                                ],
                                toolbar: [
                                    'undo redo | formatselect | bold italic backcolor | \
                                    alignleft aligncenter alignright alignjustify | \
                                    bullist numlist outdent indent | removeformat | help'
                                ]
                            }"
                            v-model="form.message"
                        ></editor>
                        <div v-if="form.errors.message" class="input-error">
                            {{ form.errors.message }}
                        </div>
                    </div>
    
                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Create Ticket</button>
                    </template>
                </Card>
            </form>
        </div>
    </MainLayout>
</template>