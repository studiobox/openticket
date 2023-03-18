<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import { reactive } from 'vue';
import Card from '@/components/UI/Card.vue';
import Editor from '@tinymce/tinymce-vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    configuration: Object
})

const generalForm = useForm({
    site_name: props.configuration.siten_name,
    window_title: props.configuration.window_title,
    page_size: props.configuration.page_size,
    date_format: props.configuration.date_format
})

const updateGeneral = () => {
    console.log('General Details', generalForm)
}

const maintenanceForm = useForm({
    maintenance: props.configuration.maintenance,
    maintenance_message: props.configuration.maintenance_message,
})

const updateMaintenance = () => {
    console.log('Maintenance Details', maintenanceForm)
}

</script>

<template>
    <MainLayout>
        <div class="page-heading">
            <h2 class="page-title">General Settings</h2>
        </div>

        <div class="mt-6 grid grid-cols-2 gap-6">
            <form @submit.prevent="updateGeneral">
                <Card>
                    <template #heading>
                        <h3 class="card-title">General Settings</h3>
                    </template>
    
                    <div class="form-group">
                        <label class="form-label">Brand Name</label>
                        <input type="text" class="form-control" placeholder="Enter your brand name..." v-model="generalForm.site_name">
                        <p class="help-text text-sm text-gray-400">The company name will be used to brand the support center and outgoing emails. For example: OpenTicket Inc.</p>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Window Title</label>
                        <input type="text" class="form-control" placeholder="Enter window title..." v-model="generalForm.window_title">
                        <p class="help-text text-sm text-gray-400">This is the title that appears in the browser tab. If your helpdesk page is bookmarked, this will be the title/name of the site page.</p>
                    </div>
    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group">
                            <label class="form-label">Default Page Size</label>
                            <input type="text" class="form-control" placeholder="Enter default page size..." v-model="generalForm.page_size">
                            <p class="help-text text-sm text-gray-400">Choose the number of items shown per page.</p>
                        </div>
    
                        <div class="form-group">
                            <label class="form-label">Date format</label>
                            <input type="text" class="form-control" placeholder="Enter default date format..." v-model="generalForm.date_format">
                            <p class="help-text text-sm text-gray-400">Define the date format for clients. <a href="https://php.net/manual/en/function.date.php">See the PHP Date Formatting Table</a></p>
                        </div>
                    </div>
    
                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Save</button>
                    </template>
                </Card>
            </form>

            <form @submit.prevent="updateMaintenance">
                <Card>
                    <template #heading>
                        <h3 class="card-title">Maintenance Mode</h3>
                    </template>
    
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" v-model.number="maintenanceForm.maintenance">
                            <option :value="0">Disable</option>
                            <option :value="1">Enable</option>
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label hidden">Maintenance Message</label>
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
                            v-model="maintenanceForm.maintenance_message"
                        ></editor>
                    </div>
    
                    <template #footer>
                        <button type="submit" class="btn-md btn-primary">Save</button>
                    </template>
                </Card>
            </form>
        </div>
    </MainLayout>
</template>