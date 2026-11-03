<script setup lang="ts">

import { RouterLink, useRoute } from 'vue-router';

const route = useRoute();
defineProps<{
  to: string;
  label: string;
  iconClasses: string;
}>();
</script>
<template>
  <li class="menu-item" :class="{ active: route.path == to}">
    <router-link :to="to" class="menu-link">
      <i class="menu-icon" :class="iconClasses"></i>
      <div>{{ label }}</div>
      <slot></slot>
    </router-link>
  </li>
</template>
