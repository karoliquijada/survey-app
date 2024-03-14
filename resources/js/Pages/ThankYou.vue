<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";


</script>

<template>
    <Head title="Thankyou" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Hey! Thank you for taking the survey!
            </h2>
        
        </template>
    </AuthenticatedLayout>
</template>
