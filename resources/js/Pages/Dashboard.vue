<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    uncompletedUsers: Array,
});


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Hey, admin! ❤️
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white-k dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Users who did not complete the survey
                    </div>
                    <div class="p-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="user in uncompletedUsers"
                                    :key="user.id"
                                    class="mb-2"
                                >
                                    <td scope="row">{{ user.id }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
