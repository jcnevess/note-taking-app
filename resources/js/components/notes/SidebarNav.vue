<script setup lang="ts">
import { Tag } from '@/types/types';
import { computed, ref } from 'vue';
import SidebarItem from './SidebarItem.vue';

const { tags } = defineProps<{ tags: Tag[] }>();

const emit = defineEmits<{
  selectShowAll: [];
  selectShowArchived: [];
  selectTag: [tagId: number];
}>();

const showingArchived = ref(false);
const selectedTagId = ref<number>();

const showingAll = computed(() => !showingArchived.value && selectedTagId.value === undefined);

function showAllNotes() {
  showingArchived.value = false;
  selectedTagId.value = undefined;
  emit('selectShowAll');
}

function showArchivedNotes() {
  showingArchived.value = true;
  selectedTagId.value = undefined;
  emit('selectShowArchived');
}

function selectTag(id: number) {
  showingArchived.value = false;
  selectedTagId.value = id;
  emit('selectTag', id);
}
</script>

<template>
  <div class="flex flex-col border-r-1 border-gray-200 p-4">
    <div>
      <div id="logo" class="p-2">
        <img src="/images/logo.svg" alt="Notes" />
      </div>
      <div class="flex flex-col gap-2 py-2">
        <SidebarItem
          icon-uri="/images/icon-home.svg"
          title="All Notes"
          :isSelected="showingAll"
          @click="showAllNotes()"
        />
        <SidebarItem
          icon-uri="/images/icon-archive.svg"
          title="Archived Notes"
          :isSelected="showingArchived"
          @click="showArchivedNotes()"
        />
      </div>
    </div>
    <div class="border-t-2 py-2">
      <span class="block p-2 text-gray-600">Tags</span>
      <div class="flex flex-col gap-2 overflow-y-auto">
        <SidebarItem
          v-for="tag of tags"
          :key="tag.id"
          icon-uri="/images/icon-tag.svg"
          :title="tag.name"
          :isSelected="selectedTagId === tag.id"
          @click="selectTag(tag.id)"
        />
      </div>
    </div>
  </div>
</template>

<style scoped></style>
