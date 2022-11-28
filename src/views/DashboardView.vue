
<script lang="ts">
import { defineComponent, computed } from 'vue';
import { firebaseStore } from '@/stores/firebase';
import HTTP from '@/helpers/HTTP';

export default defineComponent({
    data() {
        return {
            results: [] as any,
            clicked: false,
            dialogVisible: false,
        }
    },
    setup() {
        const userStore = firebaseStore();
        const user = computed(() => userStore.user);
        console.log(user);
        return { user };
    },
    mounted() {
        HTTP.getLinks().then(response => {
            this.results = response.data.msg;
            console.log(this.results[0]);
        }).catch(error => {
            console.log(error);
        });
    },
    methods: {
        handleClose(done: () => void) {
            done();
        }
    }
});
</script>

<template>
<ul id="example-1">
  <li v-for="item in results" :key="item.name">
    {{ item.name}}
    {{item.url}}
    {{item.expires}}
  </li>
</ul>
</template>