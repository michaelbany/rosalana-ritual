<script setup lang="ts">
import { LucideCheckCircle2, LucideChevronDown } from 'lucide-vue-next';
import Button from './ui/button/Button.vue';
import { ref } from 'vue';

const checked = ref(false);
</script>
<template>
    <div class="flex flex-col items-center relative rounded-3xl bg-white/90 p-4 shadow-lg" @click="checked = !checked">
        <div v-if="checked" class="absolute inset-0 bg-green-500 rounded-3xl flex items-center justify-center">
            <component :is="LucideCheckCircle2" class="size-10 text-white" />
        </div>

        <div class="bg-orange-200 w-[60px] h-[60px] rounded-lg" />

        <h2 class="mt-2 text-xl font-bold text-gray-800">Ritual</h2>
        <p class="text-sm">Fitness & Health</p>

        <Button size="sm" class="bg-orange-200 text-orange-500 rounded-full gap-3 mt-3 font-extrabold">
            1
            <component :is="LucideChevronDown" class="w-4 h-4 ml-1" />
        </Button>
    </div>
</template>
