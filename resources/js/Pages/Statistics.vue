<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import LineChart from "@/Components/LineChart.vue";

const props = defineProps({
    average: Array,
});

const averages = props.average.map(value => parseFloat(value));
</script>

<template>
    <Head title="Stastistics" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Statistics
            </h2>
            <LineChart :questionAverages="averages"/>
        </template>
    </AuthenticatedLayout>
</template>
