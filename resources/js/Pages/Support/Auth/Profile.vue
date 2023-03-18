<script setup>
import SupportLayout from '@/layouts/SupportLayout.vue';
import Card from '@/components/UI/Card.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: Object
})

const generalDetailsForm = useForm({
    name: props.user.name,
    email: props.user.email,
})

const changePasswordForm = useForm({
    currentPassword: '',
    password: '',
    password_confirmation: ''
})

const submitGeneralDetailsForm = () => {
    console.log('General Details Form:', generalDetailsForm)
    generalDetailsForm.put(route('support.profile.generalDetails', { user: props.user.id }))
}

const submitChangePasswordForm = () => {
    console.log('Change Password Form:', changePasswordForm)
    changePasswordForm.put(route('support.profile.changePassword', { user: props.user.id }))
}

</script>

<template>
    <SupportLayout>
        <h1 class="text-4xl font-light mb-6">Your Profile</h1>

        <div class="mt-6 flex flex-col gap-10">
            <form @submit.prevent="submitGeneralDetailsForm">
                <h2 class="text-2xl mb-2">General Details</h2>

                <Card>
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter full name..." v-model="generalDetailsForm.name">
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control" placeholder="Enter email address..." v-model="generalDetailsForm.email">
                    </div>
    
                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Save</button>
                    </template>
                </Card>
            </form>

            <form @submit.prevent="submitChangePasswordForm">
                <h2 class="text-2xl mb-2">Change Password</h2>
                <Card>
                    <!-- <template #heading>
                        <h3 class="card-title">Change Password</h3>
                    </template> -->
    
                    <div class="form-group">
                        <label class="form-label">Existing Password</label>
                        <input type="password" class="form-control" placeholder="Enter current password..." v-model="changePasswordForm.currentPassword">
                        <div class="input-error" v-if="changePasswordForm.errors.currentPassword">
                            {{ changePasswordForm.errors.currentPassword }}
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" placeholder="Enter new password..." v-model="changePasswordForm.password">
                        <div class="input-error" v-if="changePasswordForm.errors.password">
                            {{ changePasswordForm.errors.password }}
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" placeholder="Confirm new password..." v-model="changePasswordForm.password_confirmation">
                    </div>
    
                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Save</button>
                    </template>
                </Card>
            </form>
        </div>
    </SupportLayout>
</template>