<script lang="ts">
import { defineComponent } from 'vue';
export default defineComponent({
  name: 'App',
  data() {
    return {
      scrollPosition: null as unknown as number,
    }
  },
  methods: {
    onClick(path: string) {

    }
  },
  mounted() {
    window.addEventListener('scroll', () => {
      this.scrollPosition = window.scrollY;
    });
  }
});
</script>

<template>
  <div class="p-relative">
    <nav :class="['navBar', 'fixed', {'bg': scrollPosition > 50}]">
      <div class="navBar-container">
        <ul class="navBar-list">
          <li class="navBar-item">
            <a href="#home" class="navBar-link">Home</a>
          </li>
          <li class="navBar-item">
            <a href="#about" class="navBar-link">About</a>
          </li>
          <li class="navBar-item">
            <a href="#contact" class="navBar-link">Contact</a>
          </li>
          <li class="navBar-item">
            <a href="/student" class="navBar-link">Student</a>
          </li>
          <li class="navBar-item">
            <a href="/business" class="navBar-link">Business</a>
          </li>
          <li class="navBar-item">
            <a href="/institution" class="navBar-link">Institution</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <RouterView />
</template>

<style scoped>
.bg {
  color: black !important;
  background-color: white !important;
  box-shadow: 0 0 5px rgb(0 0 0 / 31%);
}
.bg > .navBar-link {
  color: inherit !important;
}
.navBar-link {
  color: inherit;
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
  color:white;
}
</style>
