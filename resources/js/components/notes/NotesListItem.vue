<script setup lang="ts">
import { formatDate } from '@/lib/utils';
import { Note } from '@/types/types';

const { note, isSelected = false } = defineProps<{
  note: Note;
  isSelected?: boolean;
}>();
</script>

<template>
  <div
    class="flex cursor-pointer flex-col gap-2 rounded-md p-2 hover:bg-gray-200"
    :class="{ 'bg-gray-200 dark:bg-gray-800': isSelected }"
  >
    <div class="note-title font-bold capitalize">{{ note.title }}</div>
    <div class="note-tags flex flex-wrap gap-2">
      <div
        v-for="tag of note.tags"
        :key="tag.id"
        class="note-tag rounded-sm bg-gray-300 px-2 py-0.5 text-xs capitalize dark:bg-gray-600"
      >
        {{ tag.name }}
      </div>
    </div>
    <div class="note-last-edit text-xs text-gray-600">
      {{ formatDate(note.updated_at!) }}
    </div>
  </div>
</template>

<style scoped></style>
