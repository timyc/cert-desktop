<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <div class="p-relative">
    <nav class="navBar fixed">
      <div class="navBar-container">
        <ul class="navBar-list">
          <li class="navBar-item">
            <RouterLink to="/" class="navBar-link">Home</RouterLink>
          </li>
          <li class="navBar-item">
            <RouterLink to="/" class="navBar-link">About</RouterLink>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <RouterView />
</template>

<style scoped>
.navBar-link {
  color: white !important;
  text-decoration: none;
}

.active {
  color: #42b983 !important;
}

.navBar-item {
  font-size: 16px;
  padding: .75em 15px;
  letter-spacing: 1px;
  position: relative;
  font-weight: 700;
}

.navBar-list {
  display: flex;
  flex-direction: row;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}

.navBar-container {
  display: flex !important;
  flex-basis: auto;
  flex-grow: 1;
  align-items: center;
  justify-content: right;
}

.navBar {
  background-color: transparent;
  height: 94px;
  display: flex !important;
  transition: all .6s ease;
}
</style>
