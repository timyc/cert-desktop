import { defineStore } from "pinia";
import { onAuthStateChanged } from 'firebase/auth';
import HTTP, { reset } from '@/helpers/HTTP';
import ls from '@/helpers/Storage';
import type { User } from 'firebase/auth';
import { auth } from '@/firebase/config';

export const firebaseStore = defineStore("userStore", {
    state: () => {
        return {
            user: undefined as unknown as User,
            loggedIn: false, // conditional for rendering templates
            loading: false, // may be useful for a spinner
        }
    },
    actions: {
        setUser() { // initializes the listener for auth state changes
            this.loading = true;
            onAuthStateChanged(auth, async (user: any) => {
                if (user) {
                    console.log('User is signed in with token', user.accessToken);
                    if (!this.user) {
                        await auth.currentUser?.getIdToken(true); // FORCE refresh the token or else displayName is null for email/password signins
                        await HTTP.signInUser(user.accessToken).then((response) => {
                            if (response.data.code === "success") {
                                this.user = user;
                                ls.set("jwt", response.data.msg.token);
                                reset(); // vue-ls is not reactive, so we need to reset the HTTP instance to use the new token
                                this.loggedIn = true;
                                this.loading = false;
                            }
                        }).catch((err) => {
                            console.log(err);
                        });
                    }
                } else {
                    console.log('User is signed out');
                    this.user = undefined as unknown as User;
                    ls.remove("jwt");
                    this.loggedIn = false;
                    this.loading = false;
                }
            });
        },
    },
});
