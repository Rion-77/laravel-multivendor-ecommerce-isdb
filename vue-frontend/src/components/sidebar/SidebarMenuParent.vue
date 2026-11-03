<script setup lang="ts">
import { computed } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();

const props = defineProps<{
  label: string;
  iconClasses: string;
  parentUrl: string | string[];
}>();

const isActive = computed(() => {
  const parentUrls = Array.isArray(props.parentUrl) ? props.parentUrl : [props.parentUrl];
  return parentUrls.some((parentUrl) => route.path.startsWith(parentUrl));
});
</script>
<template>
  <li class="menu-item" :class="{ active: isActive, open: isActive }">
        <a href="javascript:void(0);" class="menu-link menu-toggle"
          ><i class="menu-icon" :class="iconClasses"></i>
          <div>{{ label }}</div></a
        >
        <ul class="menu-sub">
          <slot></slot>
        </ul>
      </li>
</template>
