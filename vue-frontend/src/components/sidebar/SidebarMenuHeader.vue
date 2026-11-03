<script setup lang="ts">
defineProps<{
  label: string;
}>();
</script>
<template>
  <li class="menu-header small text-uppercase">
    <span class="menu-header-text">{{ label }}</span>
  </li>
</template>
