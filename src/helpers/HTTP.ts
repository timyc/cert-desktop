import axios from "axios";
import ls from "@/helpers/Storage";

let apiClient = axios.create({
    baseURL: import.meta.env.VITE_API,
    withCredentials: true,
    headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
        "Authorization": `Bearer ${ls.get("jwt") || ""}`,
    },
    timeout: 10000,
});

export function reset() {
    apiClient = axios.create({
        baseURL: import.meta.env.VITE_API,
        withCredentials: true,
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            "Authorization": `Bearer ${ls.get("jwt") || ""}`,
        },
        timeout: 10000,
    });
}

export default {
    // sample GET request
    /*
    getThing(a: string, b: number) {
        return apiClient.get("PATH", {params: {p: a, q: b}});
    }
    */
    search(query: string, limit: number) {
        return apiClient.get("search", { params: { query: query, limit: limit } });
    },
    // sample POST request
    /*
    postThing(a: string, b: number) {
        return apiClient.post("PATH", {p: a, q: b});
    }
    */
    signInUser(token: string) {
        return apiClient.post("login", { token: token });
    },
    retrieveProfileInfo() {
        return apiClient.post("profile");
    },
    signInUniversity(uni_id: number) {
        return apiClient.post("shibboleth", { universityId: uni_id })
    },
    getLinks() {
        return apiClient.post("links")
    }
}