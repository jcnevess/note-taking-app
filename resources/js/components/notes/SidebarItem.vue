<script setup lang="ts">
const {
  iconUri,
  title,
  isSelected = false,
} = defineProps<{
  iconUri: string;
  title: string;
  isSelected?: boolean;
}>();
</script>

<template>
  <div
    class="flex cursor-pointer items-center gap-2 rounded-md p-2 hover:bg-gray-200 hover:dark:bg-gray-800"
    :class="{ 'bg-gray-200 dark:bg-gray-800': isSelected }"
  >
    <img :src="iconUri" :alt="title" />
    <span class="block grow capitalize">{{ title }}</span>
    <div v-show="isSelected"><img src="/images/icon-chevron-right.svg" /></div>
  </div>
</template>

<style scoped></style>
