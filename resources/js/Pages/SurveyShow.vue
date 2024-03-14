<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    survey: Object,
});


const currentPage = ref(1);

// Función para cambiar de página
const goToPage = (page) => {
  currentPage.value = page;
};

const form = useForm({
    answers: {},
});

const submit = () => {
    const unansweredQuestions = Object.entries(form.answers).length;
    console.log(unansweredQuestions);
    if (unansweredQuestions < 10) {
        alert("Please, all answers are required.");
        return;
    }

    form.post(route("submit-answers", { survey_id: props.survey.id }));
};
</script>

<template>
    <Head title="Survey" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Hey! Are you ready for it?
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white-k dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6">
                        <!-- Survey description -->
                        <div class="text-xl text-white font-semibold mb-2">
                            {{ props.survey.title }}
                        </div>
                        <div class="text-gray-500 mb-2">
                            {{ props.survey.description }}
                        </div>

                        <!-- Survey form -->
                        <form @submit.prevent="submit">
                            <!-- Questions -->

                            <!-- FUNCIONA!! 
                            <div
                                v-for="(question, index) in props.survey
                                    .questions"
                                :key="question.id"
                                class="mb-2"
                            >
                                <span class="text-gray-200">{{ question.text }}</span> 
                                <div class="mt-2">
                                    <label
                                        class="ml-2"
                                        v-for="value in [1, 2, 3, 4, 5]"
                                        :key="value"
                                    >
                                        <input
                                            :name="'question_' + index"
                                            type="radio"
                                            :value="value"
                                            v-model="form.answers[question.id]"
                                        />
                                        {{ value }}
                                    </label>
                                </div>
                            </div>
 -->

                            <!-- Primera página -->
                            <div v-if="currentPage === 1">
                                <div
                                    v-for="(
                                        question, index
                                    ) in props.survey.questions.slice(0, 5)"
                                    :key="question.id"
                                    class="mb-2"
                                >
                                    <span class="text-gray-200">{{
                                        question.text
                                    }}</span>
                                    <div class="mt-2">
                                        <label
                                            class="ml-2"
                                            v-for="value in [1, 2, 3, 4, 5]"
                                            :key="value"
                                        >
                                            <input
                                                :name="'question_' + index"
                                                type="radio"
                                                :value="value"
                                                v-model="
                                                    form.answers[question.id]
                                                "
                                            />
                                            {{ value }}
                                        </label>
                                    </div>
                                </div>
                                <button @click="currentPage++">Next</button>
                            </div>

                            <!-- Segunda página -->
                            <div v-else-if="currentPage === 2">
                                <div
                                    v-for="(
                                        question, index
                                    ) in props.survey.questions.slice(5)"
                                    :key="question.id"
                                    class="mb-2"
                                >
                                    <span class="text-gray-200">{{
                                        question.text
                                    }}</span>
                                    <div class="mt-2">
                                        <label
                                            class="ml-2"
                                            v-for="value in [1, 2, 3, 4, 5]"
                                            :key="value"
                                        >
                                            <input
                                                :name="'question_' + index"
                                                type="radio"
                                                :value="value"
                                                v-model="
                                                    form.answers[question.id]
                                                "
                                            />
                                            {{ value }}
                                        </label>
                                    </div>
                                </div>
                                <button @click="currentPage--">Previous</button>
                                <button @click="submitForm">Submit</button>
                            </div>

                            <!-- Back and forth button -->

                            <!-- Subtmit button -->
                            <PrimaryButton
                                class="ml-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Submit
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
