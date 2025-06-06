<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import { AnyNode } from "postcss";

interface Props {
    project: any;
}

const props = defineProps<Props>();
</script>

<template>
    <AppLayout title="Projects">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ props.project.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="flex flex-col gap-2 p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg"
                >
                    <div
                        v-for="comment in props.project.comments"
                        :key="comment.id"
                        class="px-4 py-2 rounded-md bg-neutral-100"
                    >
                        {{ comment.comments }}
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
