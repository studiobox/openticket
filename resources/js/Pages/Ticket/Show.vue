<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import dayjs from 'dayjs';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import Card from '@/components/UI/Card.vue';
import Editor from '@tinymce/tinymce-vue';
import { CalendarDaysIcon, UserCircleIcon, XMarkIcon } from '@heroicons/vue/24/outline';
import { ref } from 'vue';

const props = defineProps({
    ticket: Object,
    departments: Array
})

const form = useForm({
    department_id: props.ticket.department_id,
    priority: props.ticket.priority,
    status: props.ticket.status
})

const updateTicketInfo = () => {
    console.log('Ticket Info', form)
    form.patch(route('ticket.update', { ticket: props.ticket.id }))
}

const formatDate = (dateString) => {
    const date = dayjs(dateString);
    // Then specify how you want your dates to be formatted
    return date.format('D MMMM YYYY hh:mm A');
}

const replyWindow = ref(false);

const replyForm = useForm({
    ticket_id: props.ticket.id,
    agent_id: usePage().props.user.id,
    customer_id: null,
    message: ''
})

const sendReply = () => {
    console.log('Send Reply', replyForm)
    replyForm.post(route('ticket-message.store'))
}
</script>

<template>
    <MainLayout>
        <div class="page-heading">
            <h2 class="page-title">[#{{ ticket.id }}] {{ ticket.subject }}</h2>
            <!-- <Link :href="route('ticket.create')" class="btn btn-primary flex items-center">
                <PencilSquareIcon class="w-4 h-4 mr-2" />
                Add New Ticket
            </Link> -->
        </div>

        <div class="mt-6">
            <form @submit.prevent="updateTicketInfo">
                <Card header-class="bg-gray-100">
                    <template #heading>
                        <h3 class="card-title">Ticket Information</h3>
                    </template>
    
                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group">
                            <label class="form-label">Department</label>
                            <select class="form-control" v-model.number="form.department_id">
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
    
                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Save</button>
                    </template>
                </Card>
            </form>
        </div>

        <div class="w-full flex flex-col mt-4">
            <button class="btn btn-primary ml-auto mb-2" @click="() => replyWindow = !replyWindow">
                <XMarkIcon class="w-4" v-if="replyWindow" />
                <span v-if="!replyWindow">Send Reply</span>
            </button>

            <form @submit.prevent="sendReply">
                <Card header-class="bg-gray-100" v-if="replyWindow">
                    <!-- <template #heading>
                        <h3 class="card-title">Ticket Information</h3>
                    </template> -->

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
                            v-model="replyForm.message"
                        ></editor>
                        <div v-if="form.errors.message" class="input-error">
                            {{ form.errors.message }}
                        </div>
                    </div>

                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Reply</button>
                    </template>
                </Card>
            </form>
        </div>

        <div class="w-full mt-4 flex flex-col gap-2">
            <Card v-for="message in ticket.ticket_messages" :key="message.id" class=" !bg-indigo-50">
                <div class="flex">
                    <div class="w-28 flex flex-col items-center justify-center">
                        <UserCircleIcon class=" w-12" />
                        <h2 class="text-lg font-semibold">{{ (message.agent_id) ? 'Staff' : 'Customer' }}</h2>
                    </div>
                    <div class="message flex flex-col items-start">
                        <h6 class="text-sm font-normal text-slate-400 flex gap-2 items-center">
                            <CalendarDaysIcon class="w-5" />
                            {{ formatDate(message.created_at) }}
                        </h6>
                        <div class="message-body py-4" v-html="message.message"></div>
                    </div>
                </div>
            </Card>
        </div>
    </MainLayout>
</template>

<!-- <style scoped>
.message-body p {
    @apply py-8
}
</style> -->