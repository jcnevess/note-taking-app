<script setup lang="ts">
import NotesList from '@/components/notes/NotesList.vue';
import NoteViewer from '@/components/notes/NoteViewer.vue';
import PageHeader from '@/components/notes/PageHeader.vue';
import SidebarNav from '@/components/notes/SidebarNav.vue';
import { Note, Tag } from '@/types/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const TEXT_ALL_NOTES = 'All Notes';
const TEXT_ARCHIVED_NOTES = 'Archived Notes';
const TEXT_FILTERED_BY_TAG = 'Notes tagged with';

const { notes, tags } = defineProps<{
  notes: Note[];
  tags: Tag[];
}>();

const filteredNotes = ref(notes.filter((note) => !note.archived));

const selectedNote = ref<Note | undefined>(notes.length > 0 ? notes[0] : undefined);

const headerText = ref(TEXT_ALL_NOTES);

function filterNotArchived() {
  filteredNotes.value = notes.filter((note) => !note.archived);
  headerText.value = TEXT_ALL_NOTES;
}

function filterArchived() {
  filteredNotes.value = notes.filter((note) => note.archived);
  headerText.value = TEXT_ARCHIVED_NOTES;
}

function filterByTag(tagId: number) {
  filteredNotes.value = notes.filter(
    (note) => note.tags.findIndex((tag) => tag.id === tagId) !== -1,
  );
  headerText.value = TEXT_FILTERED_BY_TAG + ` '${tags.find((tag) => tag.id === tagId)?.name}'`;
}

function changeSelectedNote(noteId: number) {
  selectedNote.value = notes.find((note) => note.id === noteId);
}
</script>

<template>
  <Head title="Notes"></Head>
  <div class="flex dark:bg-gray-950">
    <SidebarNav
      :tags
      class="min-w-[300px]"
      @select-show-all="filterNotArchived()"
      @select-show-archived="filterArchived()"
      @select-tag="(tagId) => filterByTag(tagId)"
    />
    <div class="content grow">
      <PageHeader :headerText />
      <div class="flex">
        <NotesList :notes="filteredNotes" @select-note="(noteId) => changeSelectedNote(noteId)" />
        <NoteViewer :note="selectedNote" />
      </div>
    </div>
  </div>
</template>

<style scoped></style>
