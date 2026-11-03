<script setup lang="ts">
import type { PageLink } from "../interfaces/Pagination";

defineProps<{
  links: PageLink[];
}>();

const emit = defineEmits<{
  navigate: [url: string];
}>();
</script>

<template>
  <nav v-if="links.length" aria-label="List pages">
    <ul class="pagination pagination-sm mb-0">
      <li v-for="(link, index) in links" :key="`${index}-${link.label}`" class="page-item" :class="{ active: link.active, disabled: !link.url }">
        <button
          type="button"
          class="page-link"
          :disabled="!link.url"
          :aria-current="link.active ? 'page' : undefined"
          @click="link.url && emit('navigate', link.url)"
          v-html="link.label"
        ></button>
      </li>
    </ul>
  </nav>
</template>
