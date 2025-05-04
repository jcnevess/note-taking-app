<script setup lang="ts">
import { Note } from '@/types/types';
import { ref, watch } from 'vue';
import NotesListItem from './NotesListItem.vue';

const { notes } = defineProps<{
  notes: Note[];
}>();

const emit = defineEmits<{
  selectNote: [selectedNoteId: number];
}>();

const selectedNoteId = ref(notes.length > 0 ? notes[0].id : undefined);

function selectNote(noteId: number) {
  selectedNoteId.value = noteId;
  emit('selectNote', selectedNoteId.value);
}

watch(
  () => notes,
  () => {
    if (notes.length > 0) {
      selectNote(notes[0].id);
    } else {
      selectedNoteId.value = undefined;
    }
  },
);
</script>

<template>
  <div class="flex w-[260px] shrink-0 flex-col gap-4 p-4">
    <button
      class="text-bold cursor-pointer rounded-md bg-blue-500 p-2 text-sm font-medium text-white"
    >
      + Create New Note
    </button>
    <div class="flex flex-col">
      <NotesListItem
        v-for="note of notes"
        :key="note.id"
        class="list-single-item"
        :note
        :is-selected="selectedNoteId === note.id"
        @click="selectNote(note.id)"
      />
    </div>
  </div>
</template>

<style scoped>
.list-single-item:not(:last-of-type) {
  border-bottom: 1px solid var(--color-gray-200);
}
</style>
