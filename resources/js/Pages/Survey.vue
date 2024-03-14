<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({ surveys: Array });
</script>

<template>
    <Head title="Survey" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
            List of survey we have available for you! 
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6">
                        <ul>
                            <li
                                v-for="survey in surveys"
                                :key="survey.id"
                                class="mb-2"
                            >
                                <Link
                                    :href="`/survey/${survey.id}`"
                                    class="text-blue-500 hover:underline"
                                    >{{ survey.title }}</Link
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
