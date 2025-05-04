<script setup lang="ts">
const { headerText } = defineProps<{ headerText: string }>();
</script>

<template>
  <div id="background" class="border-b-1 border-gray-200 p-4">
    <div id="logo" class="lg:hidden">
      <img src="/images/logo.svg" alt="Notes" />
    </div>
    <div
      id="content"
      class="hidden lg:flex lg:items-center lg:justify-between lg:gap-6"
    >
      <h1 class="grow text-xl font-bold capitalize xl:text-2xl">
        {{ headerText }}
      </h1>
      <form action="#" id="searchbar" class="relative">
        <input
          type="search"
          name="search"
          id="search"
          class="w-[320px] appearance-none rounded-lg border-1 border-gray-400 p-2 pl-10"
          placeholder="Search by title, content or tags..."
          autocomplete="false"
        />
        <img
          src="/images/icon-search.svg"
          class="absolute top-[50%] left-2 h-[18px] w-[18px] -translate-y-[50%]"
        />
      </form>
      <button class="cursor-pointer appearance-none">
        <img src="/images/icon-settings.svg" alt="Settings" />
      </button>
    </div>
  </div>
</template>

<style scoped>
.background {
  padding: clamp(
    1rem,
    calc(0.523rem + 2.036vw),
    1.5rem
  ); /* min: 16px, max: 24px */
}
</style>
