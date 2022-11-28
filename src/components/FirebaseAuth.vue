<script lang="ts">
import { auth } from '@/firebase/config';
import firebase from "firebase/compat/app";
// VSCode may suggest to remove the asterisk BUT IT WILL BREAK EVERYTHING !!11
import * as firebaseui from "firebaseui";
import { defineComponent, onUnmounted } from 'vue';
import "firebaseui/dist/firebaseui.css";
import router from '@/router';
export default defineComponent({
    setup() {
        // Initialize the FirebaseUI
        const ui = new firebaseui.auth.AuthUI(auth);
        return { ui };
    },
    mounted() {
        // 2 Login Methods: Google and Plaintext email/password
        const uiConfig = {
            signInOptions: [firebase.auth.GoogleAuthProvider.PROVIDER_ID, firebase.auth.EmailAuthProvider.PROVIDER_ID],
            signInFlow: 'popup',
            callbacks: {
                signInSuccessWithAuthResult: function (authResult: any) {
                    router.push('/dashboard');
                    return false;
                }
            }
        };
        this.ui.start("#firebaseui-auth-container", uiConfig);
    },
    beforeUnmount() {
        // Because the next time this page is visited, ui.start will be called again
        this.ui.delete();
    }

});
</script>
<template>
    <section id="firebaseui-auth-container"></section>
</template>