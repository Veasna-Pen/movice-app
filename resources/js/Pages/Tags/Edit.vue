<template>
    <admin-layout title="Update Tag">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tags
            </h2>
        </template>

        <div class="py-3">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-4">
                        <form @submit.prevent="updateTage">
                            <div class="mb-12">
                                <label for="Tage"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tage
                                    Name</label>
                                <input v-model="form.tagName" type="text" id="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                            <div class="text-right sm:px-1">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script setup>
import AdminLayout from '../../Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { defineProps } from "vue";

const props = defineProps({
    tag: Object,
});

const form = useForm({
    tagName: props.tag.tag_name,
})

const updateTage = () =>{
    form.put("/admin/tags/" + props.tag.id);
}
</script>
