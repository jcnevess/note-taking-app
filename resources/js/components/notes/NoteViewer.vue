<script setup lang="ts">
import { formatDate } from '@/lib/utils';
import { Note } from '@/types/types';

const { note } = defineProps<{ note?: Note }>();
</script>

<template>
  <div v-if="note !== undefined" class="flex">
    <section class="note-main flex flex-col gap-4 border-x-1 border-gray-200 p-4">
      <div class="note-header flex flex-col gap-4">
        <h2 class="text-2xl font-bold capitalize">{{ note.title }}</h2>
        <div
          class="note-info grid grow-0 grid-cols-[auto_1fr] grid-rows-2 items-center gap-4 text-sm"
        >
          <div class="flex items-center gap-2">
            <img src="/images/icon-tag.svg" alt="Tags" class="h-[18px] w-[18px]" />
            <span>Tags</span>
          </div>
          <div>
            <span v-for="tag of note.tags" :key="tag.id" class="tag capitalize">{{
              tag.name
            }}</span>
          </div>
          <div class="flex items-center gap-2">
            <img src="/images/icon-clock.svg" alt="Last edited" class="h-[18px] w-[18px]" />
            <span>Last edited</span>
          </div>
          <div>{{ formatDate(note.updated_at!) }}</div>
        </div>
      </div>

      <hr />

      <div class="note-body">
        {{ note.content }}
      </div>

      <hr />

      <div class="note-footer flex gap-2">
        <button
          class="bg-blue cursor-pointer rounded-lg bg-blue-500 px-4 py-2 text-sm font-bold text-white"
        >
          Save Note
        </button>
        <button
          class="cursor-pointer rounded-lg border-1 border-gray-400 px-4 py-2 text-sm font-bold"
        >
          Cancel
        </button>
      </div>
    </section>

    <section class="note-controls flex shrink-0 flex-col gap-2 p-4 text-sm">
      <button
        class="flex cursor-pointer items-center gap-2 rounded-md border-1 border-gray-400 p-2"
      >
        <img src="/images/icon-archive.svg" alt="Archive" /><span>Archive Note</span>
      </button>
      <button
        class="flex cursor-pointer items-center gap-2 rounded-md border-1 border-gray-400 p-2"
      >
        <img src="/images/icon-delete.svg" alt="Delete" /><span>Delete Note</span>
      </button>
    </section>
  </div>
</template>

<style scoped>
.tag:not(:last-of-type)::after {
  content: ', ';
}
</style>
