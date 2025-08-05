<script setup lang="ts">
import { LucideMenu } from 'lucide-vue-next';

</script>
<template>
    <div class="bg-orange-500 h-screen p-3">

        <!-- nav -->
        <div class="flex justify-between items-center p-4">
            <component :is="LucideMenu" class="w-6 h-6 text-white" />
        </div>



        <div class="flex justify-center h-full mt-3">
            <h1 class="text-4xl font-extrabold text-white">Ritual <span class="text-black">Today</span></h1>

            <div>

            </div>
        </div>
    </div>
</template>