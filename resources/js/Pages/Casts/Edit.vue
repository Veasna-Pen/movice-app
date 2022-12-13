<template>
    <admin-layout title="Update Cast">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Casts
            </h2>
        </template>

        <div class="py-3">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-4">
                        <form @submit.prevent="updateCast" class="p-4">
                            <div>
                                <InputLabel for="name" value="Name" />
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus
                                    autocomplete="Name" />
                                <InputError class="mt-2" :message="$page.props.errors.name" />
                            </div>

                            <div>
                                <InputLabel for="name" value="Poster" />
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.poster_path" autofocus
                                    autocomplete="Name" />
                                <InputError class="mt-2" :message="$page.props.errors.poster_path" />
                            </div>



                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Update
                                </PrimaryButton>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, watch, defineProps } from "vue";
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    cast: Object,
});

const form = useForm({
    name: props.cast.name,
    poster_path: props.cast.poster_path,
});

const updateCast = () => {
    form.put("/admin/casts/" + props.cast.id);
}
</script>
